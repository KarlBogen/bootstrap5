<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_show_category.inc.php 16761 2026-01-09 10:52:59Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/


  function xtc_count_products_in_category_array($parent_id, $category_tree_array) {
    $products_in_category = 0;
    if (mod_count_products_in_category($categories['id']) > 1) {
      foreach ($category_tree_array[$parent_id] as $categories) {
        $products_in_category += mod_count_products_in_category($categories['id']);
      }
    } else {
      $products_in_category = 1;
    }
    
    return $products_in_category;
  }
  
  
  function mod_count_products_in_category($categories_id) {
    if (!defined('BS5_HIDE_EMPTY_CATEGORIES') || BS5_HIDE_EMPTY_CATEGORIES === false) {
      return 1;
    }
    
    return xtc_count_products_in_category($categories_id);
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
  
  
function xtc_show_category($parent_id = 0, $path = '', $category_tree_array = array(), $bs5_type = '')
{
  global $categories_string, $cPath;

  $li_class_bs5 = $a_class_bs5 = $a_class_hassub_bs5 = '';
  if ($bs5_type == 'sub') {
    $li_class_bs5 = " nav-item border-bottom";
    $a_class_bs5 = "nav-link";
    $a_class_hassub_bs5 = " hstack";
  }
  if (defined('SITEMAP_CASE') && SITEMAP_CASE === 3) {
    $li_class_bs5 = " nav-item";
    $a_class_bs5 = "nav-link";
  }

  foreach ($category_tree_array[$parent_id] as $categories) {
    if (mod_count_products_in_category($categories['id']) > 0) {
      $level = $categories['level'];
      $tab = str_repeat("\t", $level);
      $category_path = explode('_', $cPath);
      $link_path = $path . (($path != '') ? '_' : '') . $categories['id'];
      $link = xtc_href_link(FILENAME_DEFAULT, 'cPath=' . $link_path, 'NONSSL');

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

      defined('CATEGORIES_CHECK_SUBS') or define('CATEGORIES_CHECK_SUBS', true);

      if (defined('CATEGORIES_CHECK_SUBS') && (CATEGORIES_CHECK_SUBS == true)) {
        if ($count_children === true) {
          $hasSubs = ' hassub';
          $hasSubsClass = $a_class_hassub_bs5;
        }
      }
      $categories_string .= $tab . '<li class="level' . $level . $cat_active . $hasSubs . $li_class_bs5 . '">';
      $categories_string .= '<a class="' . $a_class_bs5 . $cat_active . $hasSubsClass . '" href="' . $link . '" title="' . encode_htmlentities($categories['name']) . '">';

      $categories_string .= $categories['name'];
      if (SHOW_COUNTS == 'true') {
        $products_in_category = xtc_count_products_in_category($categories['id']);
        if ($products_in_category > 0) {
          $categories_string .= '<span class="counts small">&nbsp;(' . $products_in_category . ')</span>';
        }
      }

      if ($level == 1 && $bs5_type == 'sub') {
        if ($hasSubs != '') {
          $categories_string .= '<span class="fa fa-chevron-down ms-auto"></span>';
        }
      }

      $categories_string .= '</a>';
      if (isset($category_tree_array[$categories['id']])) {
        if ($count_children === true) {
          $categories_string .= "\n";
          xtc_show_sub_category($level, true);

          $categories_string .= "\n";
          xtc_show_category($categories['id'], $link_path, $category_tree_array);
          xtc_show_sub_category($level, false);
          $categories_string .= "\n" . $tab;
        }
      }
      $categories_string .= '</li>';
      $categories_string .= "\n";
    }
  }
}

function xtc_show_sub_category($level, $open = true)
{
  global $categories_string, $tab;

  if ($open === true) {
    $categories_string .= $tab . '<ul>';
  } else {
    $categories_string .= $tab . '</ul>';
  }
}

function bs5_xtc_show_category($parent_id = 0, $path = '', $category_tree_array = array(), $bs5_type = '')
{
  global $bs5_categories_string, $cPath;

  $li_class_mega = $li_class_hassub_mega = $a_class_mega = $a_class_hassub_mega = '';
  foreach ($category_tree_array[$parent_id] as $categories) {
    if (mod_count_products_in_category($categories['id']) > 0) {
      $level = $categories['level'];
      $tab = str_repeat("\t", $level);
      $category_path = explode('_', $cPath);
      $link_path = $path . (($path != '') ? '_' : '') . $categories['id'];
      $link = xtc_href_link(FILENAME_DEFAULT, 'cPath=' . $link_path, 'NONSSL');

      if ($level == 1) {
        if ($bs5_type == 'mega') {
          $li_class_mega = " nav-item kk-mega";
          $li_class_hassub_mega = " hassub dropdown";
          $a_class_mega = "nav-link";
          $a_class_hassub_mega = " dropdown-toggle";
        } elseif ($bs5_type == 'dropd') {
          $li_class_mega = " nav-item";
          $li_class_hassub_mega = " dropdown";
          $a_class_mega = "nav-link";
          $a_class_hassub_mega = " dropdown-toggle";
        }
      }

      $cat_active = $btn_role = '';
      if (end($category_path) == $categories['id']) {
        // Selected for mmenulight
        $cat_active = " Selected active";
      } elseif (in_array($categories['id'], $category_path)) {
        $cat_active = " active parent";
      }

      // mark subs
      $hasSubs = $hasSubsClass = '';
      defined('CATEGORIES_CHECK_SUBS') or define('CATEGORIES_CHECK_SUBS', true);
      $max_depth = BS5_CATEGORIESMENU_MAXLEVEL == 'false' ? 100 : BS5_CATEGORIESMENU_MAXLEVEL;
      if ($bs5_type == 'dropd' && $level > 1) {
        $li_class_mega = "";
        $li_class_hassub_mega = " dropdown";
        $a_class_mega = "dropdown-item";
        $a_class_hassub_mega = " dropdown-toggle";
      }
      if ($bs5_type == 'mega' && $level > 1) {
        $li_class_mega = " nav-item kk-mega";
        $li_class_hassub_mega = " hassub";
        $a_class_mega = "nav-link py-1";
        $a_class_hassub_mega = "";
      }

      $children = xtc_get_categories_tree_data($categories['id'], $level + 1);
      $count_children = !empty($children);
      if (defined('CATEGORIES_CHECK_SUBS') && (CATEGORIES_CHECK_SUBS == true)) {
        $close_li = false; // Link im Mega-Menü schließen
        // Use the cached tree data to check for children instead of a new DB query, benax, 12-2025
        if ($count_children === true) { //let's use our new var, noRiddle, 01-2026
          $hasSubs = $li_class_hassub_mega;
          $hasSubsClass = $a_class_hassub_mega;
          if ($bs5_type == 'mega') {
            if ($level == 1) $btn_role = '#/" data-href="' . $link . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false';
            if ($level > 1) $close_li = true;
          } elseif ($bs5_type == 'dropd') {
            $btn_role = '#/" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false';
          }
        }
      }
      $bs5_categories_string .= ($bs5_type == 'mega' && $level == 2) ? $tab . '<ul class="navbar-nav flex-column col" data-level="' . $level . '">' : '';

      $bs5_categories_string .= $tab . '<li id="li' . $categories['id'] . '" class="level' . $level . $cat_active . $hasSubs . $li_class_mega . '">';
      $bs5_categories_string .= '<a class="' . $a_class_mega . $cat_active . $hasSubsClass . '" href="' . ($href = $btn_role != '' ? $btn_role : $link) . '" title="' . encode_htmlentities($categories['name']) . '">';

      if ($bs5_type == 'mega' && $level > 1) {
        $sign = '';
        $sign = str_repeat('&rsaquo;', $level - 2);
        $bs5_categories_string .= $sign . ' ';
      }

      $bs5_categories_string .= $categories['name'];

      if (SHOW_COUNTS == 'true') {
        $products_in_category = xtc_count_products_in_category($categories['id']);
        if ($products_in_category > 0) {
          $bs5_categories_string .= '<span class="counts small">&nbsp;(' . $products_in_category . ')</span>';
        }
      }

      $bs5_categories_string .= '</a>';
      if (isset($category_tree_array[$categories['id']])) {
        //BOC make it a little bit more efficient, noRiddle, 12-2025
        //if (xtc_count_products_in_category_array($categories['id'], $category_tree_array) > 0) {
        if ($count_children === true) { //let's use our new var, noRiddle, 01-2026
          //BOC make it a littgle bit more efficient, noRiddle, 12-2025
          $bs5_categories_string .= "\n";
          bs5_xtc_show_sub_category($level, true);

          // show all
          if (BS5_MENUCASE == '1' && $level == 1) {
            $bs5_categories_string .= $tab . '<div class="overview border-bottom w-100 pb-2 mb-2">';
            $bs5_categories_string .= '<a class="btn btn-outline-secondary" href="' . $link . '" title="' . encode_htmlentities($categories['name']) . '">';
            $bs5_categories_string .= '<span class="small">' . TEXT_SHOW_CATEGORY . '</span><strong>  ' . $categories['name'];
            $bs5_categories_string .= '</strong><i class="fa fa-circle-right ms-3"></i></a>';
            $bs5_categories_string .= '</div>';
          }
          if (BS5_MENUCASE == '2') {
            $bs5_categories_string .= $tab . '<li class="overview level' . ($level) . $cat_active . '">';
            $bs5_categories_string .= '<a class="dropdown-item" href="' . $link . '" title="' . encode_htmlentities($categories['name']) . '">';
            $bs5_categories_string .= '<i class="fa fa-circle-right me-2"></i><span class="small">' . TEXT_SHOW_CATEGORY . '</span><br />' . $categories['name'];
            $bs5_categories_string .= '</a>';
            $bs5_categories_string .= '</li><li><hr class="dropdown-divider"></li>';
          }

          $bs5_categories_string .= "\n";
          if ($close_li) {
            $bs5_categories_string .= '</li>';
            $bs5_categories_string .= "\n";
          }
          bs5_xtc_show_category($categories['id'], $link_path, $category_tree_array, $bs5_type);
          bs5_xtc_show_sub_category($level, false);
          $bs5_categories_string .= "\n" . $tab;
        }
      }
      if (!$close_li) {
        $bs5_categories_string .= '</li>';
        $bs5_categories_string .= "\n";
      }
      $bs5_categories_string .= ($bs5_type == 'mega' && $level == 2) ? $tab . '</ul>' . "\n" : '';
    }
  }
}

function bs5_xtc_show_sub_category($level, $open = true)
{
  global $bs5_categories_string, $tab;

  // 1 = Megamenu, 2 = Dropdown
  switch (BS5_MENUCASE) {
    case '1':
      if ($level == 1) {
        if ($open === true) {
          $bs5_categories_string .= $tab . '<div class="row row-cols-1 row-cols-lg-3 dropdown-menu p-2 kk-mega">';
        } else {
          $bs5_categories_string .= $tab . '</div>';
        }
      }
      break;

    case '2':
      if ($open === true) {
        $bs5_categories_string .= $tab . '<ul class="dropdown-menu">';
      } else {
        $bs5_categories_string .= $tab . '</ul>';
      }
      break;

    default:
      if ($open === true) {
        $bs5_categories_string .= $tab . '<ul>';
      } else {
        $bs5_categories_string .= $tab . '</ul>';
      }
      break;
  }
}
