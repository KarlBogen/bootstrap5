<?php
/* -----------------------------------------------------------------------------------------
   $Id: sub_categories.php 16761 2026-01-09 10:52:59Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  // include smarty
  include(DIR_FS_BOXES_INC . 'smarty_default.php');

  // set cache id
  $cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'|cP:'.$cPath.(((defined('SPECIALS_CATEGORIES') && SPECIALS_CATEGORIES === true) || (defined('WHATSNEW_CATEGORIES') && WHATSNEW_CATEGORIES === true)) ? '|self:'.basename($PHP_SELF) : ''));

  if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_sub_categories.html', $cache_id) || !$cache) {

    // include needed functions
    require_once (DIR_FS_BOXES_INC.'xtc_show_category.inc.php');
    require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');
    require_once (DIR_FS_INC.'xtc_has_category_subcategories.inc.php');
  
    $category_tree_array = array();

    if (isset($cPath_array)
        && is_array($cPath_array)
        )
    {
      $new_cPath_array = $cPath_array;
      array_unshift($new_cPath_array, 0);

      $count_new_cPath_arr = count($new_cPath_array); //store count in var, noRiddle, 02-2026
      
      $path = '';
      //BOC profit by chached data in xtc_get_categories_tree_data(), noRiddle, 02-2026
      for($i = 0; $i < $count_new_cPath_arr; $i++) {
        $categories_id = $new_cPath_array[$i];
        $subs = xtc_get_categories_tree_data($categories_id, $i);
        $path = $path . (($path != '') ? '_' : '') . (($categories_id > 0) ? $categories_id : '');

        $data = array(
          'name' => '',
          'id' => 0,
          'link' => xtc_href_link(FILENAME_DEFAULT, '', 'NONSSL'),
          'active' => 0,
          'level' => 0,
        );
        if ($categories_id != 0) {
          $category_data = xtc_get_categories_tree_data($new_cPath_array[$i-1], $i);
          $data = array(
            'name' => $category_data[$categories_id]['name'],
            'id' => $category_data[$categories_id]['id'],
            'link' => xtc_href_link(FILENAME_DEFAULT, 'cPath='.$path, 'NONSSL'),
            'active' => ((end($cPath_array) == $category_data[$categories_id]['id']) ? 1 : 0),
            'level' => $i,
          );

          if (SHOW_COUNTS == 'true') {
            $products_in_category = xtc_count_products_in_category($category_data[$categories_id]['id']);
            if ($products_in_category > 0) {
              $data['count'] = $products_in_category;
            }
          }  
          
          if (defined('CATEGORIES_CHECK_SUBS') && (CATEGORIES_CHECK_SUBS == true)) {
            $data['hasSubs'] = 0;
            if(isset($subs) && !empty($subs)) {
              $data['hasSubs'] = 1;
            }
          }
        }

        if (!empty($subs)) {
          $subs_level = $i + 1;
          foreach ($subs as $subs_id => $subs_data) {
            $sub_subs = xtc_get_categories_tree_data($subs_id, 1);

            if (mod_count_products_in_category($subs_data['id']) > 0) {
              $link_path = $path . (($path != '') ? '_' : '') . $subs_data['id'];
              $subs[$subs_id]['link'] = xtc_href_link(FILENAME_DEFAULT, 'cPath='.$link_path, 'NONSSL');
              $subs[$subs_id]['active'] = ((end($cPath_array) == $subs_data['id']) ? 1 : 0);
              $subs[$subs_id]['level'] = $subs_level;
    
              if (SHOW_COUNTS == 'true') {
                $products_in_category = xtc_count_products_in_category($subs_data['id']);
                if ($products_in_category > 0) {
                  $subs[$subs_id]['count'] = $products_in_category;
                }
              }  
              
              if (defined('CATEGORIES_CHECK_SUBS') && (CATEGORIES_CHECK_SUBS == true)) {
                $subs[$subs_id]['hasSubs'] = 0;
                if(isset($sub_subs) && !empty($sub_subs)) {
                  $subs[$subs_id]['hasSubs'] = 1;
                }
              }
            } else {
              unset($subs[$subs_data['id']]);
            }
          }

          $category_tree_array[$categories_id] = array(
            'DATA' => $data,
            'SUBS' => $subs,
          );
        }
      }
      //EOC profit by chached data in xtc_get_categories_tree_data(), noRiddle, 02-2026
    }
        
    if(!empty($category_tree_array)) {
      $box_smarty->assign('BOX_CONTENT', array(array_pop($category_tree_array)));
      $box_smarty->assign('BOX_CONTENT_HOVER', $category_tree_array);
    }
  }

  $box_sub_categories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_sub_categories.html', $cache_id);

  $smarty->assign('box_SUB_CATEGORIES', $box_sub_categories);
