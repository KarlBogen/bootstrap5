<?php
/* -----------------------------------------------------------------------------------------
   $Id: categories.php 15291 2023-07-06 11:46:25Z GTB $

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

  if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/box_topcategories.html', $cache_id) || !$cache) {

    // include needed functions
    require_once (DIR_FS_BOXES_INC.'xtc_show_category.inc.php');
    require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');
  
    $bs5_categories_string = '';
		if (BS5_SHOW_HOMEBUTTON_IN_TOPCATMENU == 'true'){
			$bs5_categories_string .= '<li class="nav-item home level1"><a class="nav-link" href="' . xtc_href_link(FILENAME_DEFAULT) . '" aria-label="home"><span class="fa fa-house fa-lg"></span></a></li>'."\n";
		}
    $category_tree_array = xtc_get_category_tree_array();

    $bs5_type = BS5_MENUCASE == '2' ? 'dropd' : 'mega';
    //if (count($category_tree_array) > 0) {
    if(!empty($category_tree_array)) { //better and faster, noRiddle, 01-2026
      bs5_xtc_show_category(0, '', $category_tree_array, $bs5_type);    
    }

    $box_smarty->assign('BOX_CONTENT', $bs5_categories_string);

  }

  $box_topcategories = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_topcategories.html', $cache_id);

  $smarty->assign('box_TOPCATEGORIES', $box_topcategories);
