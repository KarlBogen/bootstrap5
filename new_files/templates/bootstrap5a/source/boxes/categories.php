<?php
/* -----------------------------------------------------------------------------------------
   $Id: sub_categories.php 16761 2026-01-09 10:52:59Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Datei geändert und genutzt für Template bootstrap5a als Datei
   categories.php
   ---------------------------------------------------------------------------------------*/

// include smarty
include(DIR_FS_BOXES_INC . 'smarty_default.php');

// set cache id
$cache_id = md5('lID:' . $_SESSION['language'] . '|csID:' . $_SESSION['customers_status']['customers_status_id'] . '|cP:' . $cPath . (((defined('SPECIALS_CATEGORIES') && SPECIALS_CATEGORIES === true) || (defined('WHATSNEW_CATEGORIES') && WHATSNEW_CATEGORIES === true)) ? '|self:' . basename($PHP_SELF) : ''));

if (!$box_smarty->is_cached(CURRENT_TEMPLATE . '/boxes/box_categories.html', $cache_id) || !$cache) {

  // include needed functions
  require_once(DIR_FS_BOXES_INC . 'xtc_show_category.inc.php');
  require_once(DIR_FS_INC . 'xtc_count_products_in_category.inc.php');
  require_once(DIR_FS_INC . 'xtc_has_category_subcategories.inc.php');

  $category_tree_array = array();

  if (!isset($cPath_array)) $cPath_array = array();
  $new_cPath_array = $cPath_array;
  array_unshift($new_cPath_array, 0);

  $count_new_cPath_arr = count($new_cPath_array);

  $path = '';
  for ($i = 0; $i < $count_new_cPath_arr; $i++) {
    $categories_id = $new_cPath_array[$i];
    $subs = xtc_get_categories_tree_data($categories_id, $i);
    $path = $path . (($path != '') ? '_' : '') . (($categories_id > 0) ? $categories_id : '');

    if (!empty($subs)) {
      $subs_level = $i + 1;
      foreach ($subs as $subs_id => $subs_data) {

        if (mod_count_products_in_category($subs_data['id']) > 0) {
          $link_path = $path . (($path != '') ? '_' : '') . $subs_data['id'];
          $subs[$subs_id]['path'] = $link_path;
          $subs[$subs_id]['link'] = xtc_href_link(FILENAME_DEFAULT, 'cPath=' . $link_path, 'NONSSL');
          $subs[$subs_id]['active'] = ((end($cPath_array) == $subs_data['id']) ? ' active" aria-current="page' : '');
          $subs[$subs_id]['active_parent'] = ((in_array($subs_data['id'], $cPath_array)) ? ' active parent' : '');
          $subs[$subs_id]['level'] = $subs_level;

          if (SHOW_COUNTS == 'true') {
            $products_in_category = xtc_count_products_in_category($subs_data['id']);
            if ($products_in_category > 0) {
              $subs[$subs_id]['count'] = $products_in_category;
            }
          }

          $subs[$subs_id]['hasSubs'] = 0;
          if (defined('CATEGORIES_CHECK_SUBS') && (CATEGORIES_CHECK_SUBS == true)) {
            $sub_subs = xtc_get_categories_tree_data($subs_id, 1);
            if (isset($sub_subs) && !empty($sub_subs)) {
              $subs[$subs_id]['hasSubs'] = 1;
            }
          }
        } else {
          unset($subs[$subs_data['id']]);
        }
      }

      $category_tree_array[$categories_id] =
        $subs;
    }
  }

  $categories_string = '';

  if (!empty($category_tree_array)) {
    bs5_xtc_show_category(0, $cPath_array, $category_tree_array);
  }

  if (BS5_MANUFACTURERS_LINK == 'true') {
    $categories_string .= '<li class="liman nav-item level1 category_li">';
    $categories_string .= '<a class="category_button nav-link border-bottom' . (isset($_GET['manufacturers_id']) ? ' active' : '') . '" role="button" aria-expanded="' . (isset($_GET['manufacturers_id']) ? 'true' : 'false') . '" data-value="man" title="' . TEXT_FILTER_MANUFACTURERS_LABEL . '">';
    $categories_string .= TEXT_FILTER_MANUFACTURERS_LABEL . '<i class="fa fa-' . (isset($_GET['manufacturers_id']) ? 'chevron-up' : 'chevron-right') . '"></i></a>';
    if (isset($_GET['manufacturers_id'])) $categories_string .= bs5_show_manufacturers();
    $categories_string .= '</li>';
  }

  $box_smarty->assign('BOX_CONTENT', $categories_string);
}

$box_categories = $box_smarty->fetch(CURRENT_TEMPLATE . '/boxes/box_categories.html', $cache_id);

$smarty->assign('box_CATEGORIES', $box_categories);
