<?php
/* -----------------------------------------------------------------------------------------
   $Id: search.php 15418 2023-08-13 10:41:42Z Markus $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  // include smarty
  include(DIR_FS_BOXES_INC . 'smarty_default.php');

  // include needed functions
  require_once (DIR_FS_INC.'xtc_get_categories.inc.php');

  $popup_params = $main->getPopupParams();

  if (defined('SEARCH_AC_CATEGORIES')
      && SEARCH_AC_CATEGORIES == 'true'
      )
  {
    $box_smarty->assign('CATEGORIES', xtc_draw_pull_down_menu('categories_id', xtc_get_categories(array(array('id' => '', 'text' => TEXT_AC_ALL_CATEGORIES)), 0, false), isset($_GET['categories_id']) ? (int)$_GET['categories_id'] : '', 'class="form-select bg-body-tertiary" aria-label="'.TEXT_ALL_CATEGORIES.'" id="cat_search"').xtc_draw_hidden_field('inc_subcat', '1'));
  }
  $box_smarty->assign('popup_params', $popup_params);
  $box_smarty->assign('FORM_ACTION', xtc_draw_form('quick_find', xtc_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', $request_type, false), 'get', 'class="box-search m-2"') . xtc_hide_session_id());
  $box_smarty->assign('INPUT_SEARCH', xtc_draw_input_field('keywords', '', 'placeholder="'.IMAGE_BUTTON_SEARCH.'" id="inputString" class="form-control" aria-label="search keywords" maxlength="30" autocomplete="off"'));
  $box_smarty->assign('BUTTON_SUBMIT', xtc_image_submit('button_quick_find.gif', IMAGE_BUTTON_SEARCH, 'id="inputStringSubmit"'));
  $box_smarty->assign('FORM_END', '</form>');
  $box_smarty->assign('LINK_ADVANCED', xtc_href_link(FILENAME_ADVANCED_SEARCH));
  $box_smarty->assign('HELP_LINK', xtc_href_link(FILENAME_POPUP_SEARCH_HELP, $popup_params['link_parameters'], $request_type));

  if (defined('MODULE_SEMKNOX_SYSTEM_STATUS')
      && MODULE_SEMKNOX_SYSTEM_STATUS == 'true'
      && defined('MODULE_SEMKNOX_SYSTEM_PROJECT_'.$_SESSION['languages_id'])
      && constant('MODULE_SEMKNOX_SYSTEM_PROJECT_'.$_SESSION['languages_id']) != ''
      )
  {  
    $box_smarty->clear_assign('HELP_LINK');
  }
  
  $box_smarty->caching = 0;
  $box_search = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_search.html');

  $smarty->assign('box_SEARCH',$box_search);
