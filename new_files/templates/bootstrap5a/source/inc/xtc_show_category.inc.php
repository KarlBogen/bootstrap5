<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_show_category.inc.php 16761 2026-01-09 10:52:59Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/


function xtc_count_products_in_category_array($parent_id, $category_tree_array)
{
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


function mod_count_products_in_category($categories_id)
{
  if (!defined('BS5_HIDE_EMPTY_CATEGORIES') || BS5_HIDE_EMPTY_CATEGORIES == 'false') {
    return 1;
  }

  return xtc_count_products_in_category($categories_id);
}


function xtc_get_category_tree_array($parent_id = 0, $max_depth = CATEGORIES_MAX_DEPTH, $level = 1, $category_tree_array = array())
{
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


function xtc_get_categories_tree_data($parent_id, $level)
{
  static $category_data_array = null;

  if ($category_data_array === null) {
    $category_data_array = array();

    $categories_query = xtDBquery("SELECT c.categories_id,
                                            cd.categories_name,
                                            c.parent_id
                                       FROM " . TABLE_CATEGORIES . " c
                                       JOIN " . TABLE_CATEGORIES_DESCRIPTION . " cd
                                            ON cd.categories_id = c.categories_id
                                               AND cd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                               AND trim(cd.categories_name) != ''
                                      WHERE c.categories_status = '1'
                                            " . CATEGORIES_CONDITIONS_C . "
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


function xtc_show_category($parent_id = 0, $path = '', $category_tree_array = array(), $link_title = '')
{
  global $categories_string;

  foreach ($category_tree_array[$parent_id] as $categories) {
    if (mod_count_products_in_category($categories['id']) > 0) {
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
      $categories_string .= $tab . '<li class="nav-item level' . $level . $subcategories_class . $cat_active . '">';
      $categories_string .= '<a class="nav-link border-bottom' . $cat_active_parent . $cat_active . '" href="' . $categories['link'] . '" title="' . encode_htmlentities($categories['name']) . '">';

      // Kategoriename einrücken
      $space = $sign = '';
      for ($i = 2; $i <= $level; $i++) {
        $space .= '&nbsp;';
        $sign .= '&rsaquo;';
      }
      if ($sign != '') $categories_string .= $space . $sign . '&nbsp;';

      $categories_string .= $categories['name'];

      if (SHOW_COUNTS == 'true') {
        $products_in_category = xtc_count_products_in_category($categories['id']);
        if ($products_in_category > 0) {
          $categories_string .= '<span class="counts small">&nbsp;(' . $products_in_category . ')</span>';
        }
      }

      $categories_string .= '</a>' . $subcategories_button;

      if (isset($category_tree_array[$categories['id']])) {
        if ($categories['hasSubs'] == 1) {
          $categories_string .= "\n";
          xtc_show_sub_category(true);
          xtc_show_category($categories['id'], '', $category_tree_array);
          xtc_show_sub_category(false);
          $categories_string .= "\n" . $tab;
        }
      }
      $categories_string .= '</li>';
      $categories_string .= "\n";
    }
  }
  return $categories_string;
}


function xtc_show_sub_category($open = true)
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
                                        FROM " . TABLE_MANUFACTURERS . " as m
                                        JOIN " . TABLE_PRODUCTS . " as p 
                                             ON m.manufacturers_id = p.manufacturers_id
                                                AND p.products_status = '1'
                                                    " . PRODUCTS_CONDITIONS_P . "
                                        JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd
                                             ON p.products_id = pd.products_id
                                                AND pd.language_id = '" . (int)$_SESSION['languages_id'] . "'
                                                AND trim(pd.products_name) != ''
                                        JOIN " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c 
                                             ON p2c.products_id = pd.products_id
                                        JOIN " . TABLE_CATEGORIES . " c
                                             ON c.categories_id = p2c.categories_id
                                                AND c.categories_status = 1
                                                    " . CATEGORIES_CONDITIONS_C . "
                                       WHERE m.manufacturers_status = 1
                                    GROUP BY m.manufacturers_id 
                                    ORDER BY m.sort_order, m.manufacturers_name ASC");

  if (xtc_db_num_rows($manufacturers_query, true) > 0) {
    $manufacturers_string = '<ul class="navbar-nav flex-column"' . ($d_none === true ? ' style="display: none;"' : '') . '>' . "\n";
    while ($manufacturers = xtc_db_fetch_array($manufacturers_query, true)) {
      $name = $manufacturers['manufacturers_name'];
      $link = xtc_href_link(FILENAME_DEFAULT, xtc_manufacturer_link($manufacturers['manufacturers_id'], $manufacturers['manufacturers_name']));
      $active = ((isset($_GET['manufacturers_id']) && (int)$_GET['manufacturers_id'] == $manufacturers['manufacturers_id']) ? ' active" aria-current="page' : '');

      $manufacturers_string .= '<li class="nav-item level2">';
      $manufacturers_string .= '<a class="nav-link border-bottom' . $active . '" href="' . $link . '" title="' . $name . '">&nbsp;&rsaquo;&nbsp;' . $name . '</a>';
      $manufacturers_string .= '</li>';
    }
    $manufacturers_string .= '</ul>' . "\n";
  }
  return $manufacturers_string;
}
