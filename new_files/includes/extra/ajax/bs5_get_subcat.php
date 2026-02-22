<?php

/**
 * $Id: bs5_get_subcat.php by Karl
 *
 * Karl Unterkategorien per Ajax laden
 *
 * Released under the GNU General Public License
 */

if (isset($_REQUEST['speed'])) {

  if (isset($_GET['cPath'])) unset($_GET['cPath']);
  include_once(DIR_FS_CATALOG . 'includes/application_top_callback.php');
  require_once(DIR_FS_INC . 'db_functions_' . DB_MYSQL_TYPE . '.inc.php');
  require_once(DIR_FS_INC . 'db_functions.inc.php');
  require_once(DIR_WS_INCLUDES . 'database_tables.php');
}

function bs5_get_subcat()
{

  xtc_db_connect() or die('Unable to connect to database server!');

  // get Variables
  $my_cPath = $_REQUEST['cPath'];

  // include needed functions
  require_once(DIR_FS_BOXES_INC . 'xtc_show_category.inc.php');
  require_once(DIR_FS_INC . 'xtc_count_products_in_category.inc.php');
  require_once(DIR_FS_INC . 'xtc_has_category_subcategories.inc.php');

  // Hersteller
  if ($my_cPath == 'man') return $manufacturers_string = bs5_show_manufacturers(true);

  $cPath_array = explode('_', $my_cPath);
  $category_tree_array = array();

  $new_cPath_array = $cPath_array;

  $count_new_cPath_arr = count($new_cPath_array);

  $path = $my_cPath;

  for ($i = $count_new_cPath_arr - 1; $i < $count_new_cPath_arr; $i++) {
    $categories_id = $new_cPath_array[$i];
    $subs = xtc_get_categories_tree_data($categories_id, $i);

    if (!empty($subs)) {
      $subs_level = $count_new_cPath_arr + 1;
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
    $categories_string .= xtc_show_category($categories_id, '', $category_tree_array, strip_tags($_REQUEST['title']));
  }

  return $categories_string;
}
