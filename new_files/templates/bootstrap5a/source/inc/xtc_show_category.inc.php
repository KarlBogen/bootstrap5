<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_show_category.inc.php 16761 2026-01-09 10:52:59Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/


  function mod_count_products_in_category($categories_id, $product_counts = null) {
  if (!defined('BS5_HIDE_EMPTY_CATEGORIES') || BS5_HIDE_EMPTY_CATEGORIES == 'false') {
      return 1;
    }
    
    // callers without prefetched counts still need a working count
    if (!is_array($product_counts)) {
      return xtc_count_products_in_category($categories_id);
    }
    
    return isset($product_counts[$categories_id]) ? $product_counts[$categories_id] : 0;
  }
  
  
  function xtc_get_category_tree_array($parent_id = 0, $max_depth = BS5_CATEGORIESMENU_MAXLEVEL == 'false' ? 100 : BS5_CATEGORIESMENU_MAXLEVEL, $level = 1, $category_tree_array = array()) {
    $categories_data_array = xtc_get_categories_tree_data($parent_id, $level);

    if (!empty($categories_data_array)) {
      $category_tree_array[$parent_id] =  $categories_data_array;
      
      foreach ($categories_data_array as $categories_data) {
        $category_tree_array[$parent_id][$categories_data['id']]['level'] = $level;
        
        if ($categories_data['level'] < $max_depth) {
          $category_tree_array = xtc_get_category_tree_array($categories_data['id'], $max_depth, $level + 1, $category_tree_array);
        }
      }
    }
    
    return $category_tree_array;
  }


  function xtc_get_categories_tree_data($parent_id, $level) {
    static $category_data_array = null;
    
    if ($category_data_array === null) {
      $category_data_array = array();
      
      $categories_query = xtDBquery("SELECT c.categories_id,
                                            cd.categories_name,
                                            c.parent_id
                                       FROM ".TABLE_CATEGORIES." c
                                       JOIN ".TABLE_CATEGORIES_DESCRIPTION." cd
                                            ON cd.categories_id = c.categories_id
                                               AND cd.language_id = '".(int)$_SESSION['languages_id']."'
                                               AND trim(cd.categories_name) != ''
                                      WHERE c.categories_status = '1'
                                            ".CATEGORIES_CONDITIONS_C."
                                   ORDER BY c.sort_order, cd.categories_name");

      while ($categories = xtc_db_fetch_array($categories_query, true)) {
        $category_data_array[$categories['parent_id']][$categories['categories_id']] = array(
          'name' => $categories['categories_name'],
          'parent' => $categories['parent_id'],
          'id' => $categories['categories_id'],
        );
      }
    }
        
    $result = array();
    if (isset($category_data_array[$parent_id])) {
      foreach ($category_data_array[$parent_id] as $id => $category) {
        $category['level'] = $level;
        $result[$id] = $category;
      }
    }
    
    return $result;
  }
  
  
  function xtc_get_category_product_counts($category_tree_array) {
    global $modified_cache;

    if ((!defined('BS5_HIDE_EMPTY_CATEGORIES') || BS5_HIDE_EMPTY_CATEGORIES === false)
        && SHOW_COUNTS != 'true'
        )
    {
      return array();
    }

    $displayed_category_ids = array();
    foreach ($category_tree_array as $categories) {
      foreach ($categories as $category) {
        $displayed_category_ids[(int)$category['id']] = true;
      }
    }

    if (empty($displayed_category_ids)) {
      return array();
    }

    $cache_enabled = defined('DB_CACHE') && DB_CACHE == 'true';
    if ($cache_enabled && !is_object($modified_cache)) {
      include(DIR_FS_CATALOG.'includes/modified_cache.php');
    }

    if ($cache_enabled) {
      $aggregate_cache_id = 'category_product_totals_'.md5(
        'language:'.(int)$_SESSION['languages_id']
        .'|product_conditions:'.PRODUCTS_CONDITIONS_P
        .'|category_conditions:'.CATEGORIES_CONDITIONS_C
      );
      $modified_cache->setId($aggregate_cache_id);
      if ($modified_cache->isHit() === true) {
        $all_product_counts = $modified_cache->get();
        if (is_array($all_product_counts)) {
          $product_counts = array();
          foreach ($displayed_category_ids as $category_id => $unused) {
            $product_counts[$category_id] = isset($all_product_counts[$category_id])
              ? $all_product_counts[$category_id]
              : 0;
          }

          return $product_counts;
        }
      }
    }

    // the counts add up all descendants that carry a name and are allowed for
    // the customer group, deactivated ones included, the same way
    // xtc_count_products_in_category() walks the tree
    $child_categories_array = array();
    $child_categories_query = xtDBquery(
      "SELECT c.categories_id,
              c.parent_id
         FROM ".TABLE_CATEGORIES." c
         JOIN ".TABLE_CATEGORIES_DESCRIPTION." cd
              ON cd.categories_id = c.categories_id
                 AND cd.language_id = '".(int)$_SESSION['languages_id']."'
                 AND trim(cd.categories_name) != ''
        WHERE 1 = 1
              ".CATEGORIES_CONDITIONS_C
    );
    while ($child_categories = xtc_db_fetch_array($child_categories_query, true)) {
      $child_categories_array[(int)$child_categories['parent_id']][] = (int)$child_categories['categories_id'];
    }

    $counted_category_ids = array();
    $category_parent_ids = array();
    $category_depths = array();
    $pending_categories = array(
      array(
        'parent_id' => 0,
        'depth' => 0,
      ),
    );

    while (!empty($pending_categories)) {
      $pending = array_pop($pending_categories);

      if (!isset($child_categories_array[$pending['parent_id']])) {
        continue;
      }

      foreach ($child_categories_array[$pending['parent_id']] as $category_id) {
        if (isset($counted_category_ids[$category_id])) {
          continue;
        }

        $counted_category_ids[$category_id] = true;
        $category_parent_ids[$category_id] = $pending['parent_id'];
        $category_depths[$category_id] = $pending['depth'] + 1;
        $pending_categories[] = array(
          'parent_id' => $category_id,
          'depth' => $pending['depth'] + 1,
        );
      }
    }

    $direct_product_counts = array();
    $counts_cached = false;

    if ($cache_enabled) {
      $cache_id = 'category_product_counts_'.md5(
        'language:'.(int)$_SESSION['languages_id']
        .'|product_conditions:'.PRODUCTS_CONDITIONS_P
      );
      $modified_cache->setId($cache_id);
      if ($modified_cache->isHit() === true) {
        $direct_product_counts = $modified_cache->get();
        $counts_cached = is_array($direct_product_counts);
      }
    }

    if ($counts_cached === false) {
      $direct_product_counts = array();
      $products_query = xtDBquery(
        "SELECT p2c.categories_id,
                COUNT(*) AS total
           FROM ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
  STRAIGHT_JOIN ".TABLE_PRODUCTS." p
             ON p.products_id = p2c.products_id
            AND p.products_status = '1'
  STRAIGHT_JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
             ON pd.products_id = p.products_id
            AND pd.language_id = '".(int)$_SESSION['languages_id']."'
            AND TRIM(pd.products_name) != ''
          WHERE 1 = 1
                ".PRODUCTS_CONDITIONS_P."
       GROUP BY p2c.categories_id"
      );
      while ($category = xtc_db_fetch_array($products_query, true)) {
        $direct_product_counts[(int)$category['categories_id']] = (int)$category['total'];
      }

      if ($cache_enabled) {
        $modified_cache->setId($cache_id);
        $modified_cache->set($direct_product_counts);
      }
    }

    $all_product_counts = array();
    foreach ($counted_category_ids as $category_id => $unused) {
      $all_product_counts[$category_id] = isset($direct_product_counts[$category_id])
        ? $direct_product_counts[$category_id]
        : 0;
    }

    arsort($category_depths);
    foreach ($category_depths as $category_id => $depth) {
      $parent_id = $category_parent_ids[$category_id];
      if ($parent_id > 0 && isset($all_product_counts[$parent_id])) {
        $all_product_counts[$parent_id] += $all_product_counts[$category_id];
      }
    }

    if ($cache_enabled) {
      $modified_cache->setId($aggregate_cache_id);
      $modified_cache->set($all_product_counts);
    }

    $product_counts = array();
    foreach ($displayed_category_ids as $category_id => $unused) {
      $product_counts[$category_id] = isset($all_product_counts[$category_id])
        ? $all_product_counts[$category_id]
        : 0;
    }

    return $product_counts;
  }
  
  
  function xtc_show_category($parent_id = 0, $path = '', $category_tree_array = array(), $product_counts = null) {
    global $categories_string, $cPath;
    
    if ($product_counts === null) {
      $product_counts = xtc_get_category_product_counts($category_tree_array);
    }

  $li_class_bs5 = $a_class_bs5 = '';
  if (defined('SITEMAP_CASE') && SITEMAP_CASE === 3) {
    $li_class_bs5 = " nav-item";
    $a_class_bs5 = "nav-link";
  }

    foreach ($category_tree_array[$parent_id] as $categories) {
      if (mod_count_products_in_category($categories['id'], $product_counts) > 0) {
        $level = $categories['level'];
        $tab = str_repeat("\t", $level);
        $category_path = explode('_', $cPath);
        $link_path = $path . (($path != '') ? '_' : '') . $categories['id'];      
        $link = xtc_href_link(FILENAME_DEFAULT, 'cPath='.$link_path, 'NONSSL');
        
        $cat_active = '';
        if (end($category_path) == $categories['id']) {
          // Selected for mmenulight
          $cat_active = " Selected active";
        } elseif (in_array($categories['id'], $category_path)) {
          $cat_active = " active parent";
        }

        // mark subs
      $hasSubs = $hasSubsClass = '';
        $children = xtc_get_categories_tree_data($categories['id'], $level + 1);
        $count_children = !empty($children);
        if (defined('CATEGORIES_CHECK_SUBS') && (CATEGORIES_CHECK_SUBS == true)) {
          if($count_children === true) {
          $hasSubs = ' hassub';
          }
        }
        $categories_string .= $tab . '<li class="level' . $level . $cat_active . $hasSubs . $li_class_bs5 . '">';
        $categories_string .= '<a class="' . $a_class_bs5 . $cat_active . $hasSubsClass . '" href="' . $link . '" title="' . encode_htmlentities(strip_tags($categories['name'])) . '">';

        $categories_string .= $categories['name'];
        if (SHOW_COUNTS == 'true') {
          $products_in_category = isset($product_counts[$categories['id']]) ? $product_counts[$categories['id']] : 0;
          if ($products_in_category > 0) {
            $categories_string .= '<span class="counts small">&nbsp;(' . $products_in_category . ')</span>';
          }
        }  

        $categories_string .= '</a>';
        if (isset($category_tree_array[$categories['id']])) {
          if ($count_children === true) {
            $categories_string .= "\n";
            xtc_show_sub_category($level, true);

            $categories_string .= "\n";
            xtc_show_category($categories['id'], $link_path, $category_tree_array, $product_counts);
            xtc_show_sub_category($level, false);
            $categories_string .= "\n".$tab;            
          }
        }
        $categories_string .= '</li>';
        $categories_string .= "\n";
      }
    }
  }
  
  
  function xtc_show_sub_category($level, $open = true) {
    global $categories_string, $tab;

  if ($open === true) {
    $categories_string .= $tab . '<ul>';
  } else {
    $categories_string .= $tab . '</ul>';
  }
}

function bs5_xtc_show_category($parent_id = 0, $path = '', $category_tree_array = array(), $link_title = '', $product_counts = null)
{
  global $categories_string;

    if ($product_counts === null) {
      $product_counts = xtc_get_category_product_counts($category_tree_array);
    }

  foreach ($category_tree_array[$parent_id] as $categories) {
    if (mod_count_products_in_category($categories['id'], $product_counts) > 0) {
      $level = $categories['level'];
      $tab = str_repeat("\t", $level);

      $cat_active_parent = $categories['active_parent'];
      $in_path = $categories['active_parent'] != '' ? true : false; //Testen, ob aktuelle Kategorie ID im Kategoriepfad enthalten ist

      $cat_active = $categories['active'];

      // mark subs
      $subcategories_class = $subcategories_button = '';
      if ($categories['hasSubs'] == 1) {
        if (($level < BS5_CATEGORIESMENU_MAXLEVEL || BS5_CATEGORIESMENU_MAXLEVEL == 'false')) {
          $subcategories_class = ' category_li';
          $subcategories_button = '<button type="button" class="category_button focus-ring p-0" title="' . ($link_title != '' ? $link_title : BS5_SHOW_MORE_CATEGORIES) . '" aria-expanded="' . ($in_path ? 'true' : 'false') . '" data-value="' . ($categories['path']) . '"><i class="fa fa-' . ($in_path ? 'chevron-up' : 'chevron-right') . '"></i></button>';
        }
      }
      $categories_string .= $tab . '<li class="nav-item border-bottom level' . $level . $subcategories_class . $cat_active . '">';
      $categories_string .= '<a class="nav-link' . $cat_active_parent . $cat_active . '" href="' . $categories['link'] . '" title="' . encode_htmlentities(strip_tags($categories['name'])) . '">';

      // Kategoriename einrücken
      $space = $sign = '';
      for ($i = 2; $i <= $level; $i++) {
        $space .= '&nbsp;';
        $sign .= '&rsaquo;';
      }
      if ($sign != '') $categories_string .= $space . $sign . '&nbsp;';

      $categories_string .= $categories['name'];

      if (SHOW_COUNTS == 'true') {
        $products_in_category = isset($product_counts[$categories['id']]) ? $product_counts[$categories['id']] : 0;
        if ($products_in_category > 0) {
          $categories_string .= '<span class="counts small">&nbsp;(' . $products_in_category . ')</span>';
        }
      }

      $categories_string .= '</a>' . $subcategories_button;

      if (isset($category_tree_array[$categories['id']])) {
        if ($categories['hasSubs'] == 1) {
          $categories_string .= "\n";
          bs5_xtc_show_sub_category(true);
          bs5_xtc_show_category($categories['id'], '', $category_tree_array, '', $product_counts);
          bs5_xtc_show_sub_category(false);
          $categories_string .= "\n" . $tab;
        }
      }
      $categories_string .= '</li>';
      $categories_string .= "\n";
    }
  }
  return $categories_string;
}


function bs5_xtc_show_sub_category($open = true)
{
  global $categories_string, $tab;

  if ($open === true) {
    $categories_string .= $tab . '<ul class="navbar-nav flex-column">';
  } else {
    $categories_string .= $tab . '</ul>';
  }
}

// Herstellerlinks (d-none wird für Ajax-Call gebraucht)
function bs5_show_manufacturers($d_none = false)
{
  $manufacturers_query = xtDBquery("SELECT m.*
                                      FROM ".TABLE_MANUFACTURERS." as m
                                      WHERE m.manufacturers_status = 1
                                        AND EXISTS (
                                              SELECT 1
                                                FROM ".TABLE_PRODUCTS." p
                                                JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                                  ON pd.products_id = p.products_id
                                                AND pd.language_id = '".(int)$_SESSION['languages_id']."'
                                                AND trim(pd.products_name) != ''
                                                JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
                                                  ON p2c.products_id = p.products_id
                                                JOIN ".TABLE_CATEGORIES." c
                                                  ON c.categories_id = p2c.categories_id
                                                AND c.categories_status = 1
                                                    ".CATEGORIES_CONDITIONS_C."
                                              WHERE p.manufacturers_id = m.manufacturers_id
                                                AND p.products_status = '1'
                                                    ".PRODUCTS_CONDITIONS_P."
                                            )
                                  ORDER BY m.sort_order, m.manufacturers_name ASC");

  if (xtc_db_num_rows($manufacturers_query, true) > 0) {
    $manufacturers_string = '<ul class="navbar-nav flex-column"' . ($d_none === true ? ' style="display: none;"' : '') . '>' . "\n";
    while ($manufacturers = xtc_db_fetch_array($manufacturers_query, true)) {
      $name = $manufacturers['manufacturers_name'];
      $link = xtc_href_link(FILENAME_DEFAULT, xtc_manufacturer_link($manufacturers['manufacturers_id'], $manufacturers['manufacturers_name']));
      $active = ((isset($_GET['manufacturers_id']) && (int)$_GET['manufacturers_id'] == $manufacturers['manufacturers_id']) ? ' active" aria-current="page' : '');

      $manufacturers_string .= '<li class="nav-item border-bottom level2">';
      $manufacturers_string .= '<a class="nav-link' . $active . '" href="' . $link . '" title="' . $name . '">&nbsp;&rsaquo;&nbsp;' . $name . '</a>';
      $manufacturers_string .= '</li>';
    }
    $manufacturers_string .= '</ul>' . "\n";
  }
  return $manufacturers_string;
}
