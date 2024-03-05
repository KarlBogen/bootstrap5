<?php
/* -----------------------------------------------------------------------------------------
   $Id: boxes.php 15351 2023-07-18 16:57:08Z Markus $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 XT-Commerce
   
   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   valid display modes: 

   account, category, checkout, contactus, content, cookieusage, createaccount, download 
   error, gv, home, listing, login, logoff, manufacturer, newsletter, password, productinfo 
   productsnew, reviews, shoppingcart, search, sitemap, specials, sslcheck, wishlist
   ---------------------------------------------------------------------------------------*/

  // -----------------------------------------------------------------------------------------
  //	Bootstrap5 Formvalidation
  // -----------------------------------------------------------------------------------------
	if ($display_mode == 'createaccount' && BS5_ADVANCED_VALIDATION == 'true'){
	  include(DIR_FS_BOXES_INC . 'formvalidation.php');
	}

  // -----------------------------------------------------------------------------------------
  //	default smarty
  // -----------------------------------------------------------------------------------------
  $smarty->assign('tpl_path', DIR_WS_BASE.'templates/'.CURRENT_TEMPLATE.'/');
  $smarty->assign('theme_color', ((defined('THEME_COLOR')) ? 'theme_'.THEME_COLOR : 'theme_default'));
  $smarty->assign('display_mode', $display_mode);
  $smarty->assign('content_size', 'small');

  // -----------------------------------------------------------------------------------------
  //	always visible
  // -----------------------------------------------------------------------------------------
  require_once(DIR_FS_BOXES . 'categories.php');
  require_once(DIR_FS_BOXES . 'topcategories.php');
  require_once(DIR_FS_BOXES . 'manufacturers.php');
  require_once(DIR_FS_BOXES . 'search.php');
  require_once(DIR_FS_BOXES . 'content.php');
  require_once(DIR_FS_BOXES . 'information.php');
  require_once(DIR_FS_BOXES . 'miscellaneous.php');
  if (BS5_SHOW_BOX_INFO == 'true') {
    require_once(DIR_FS_BOXES . 'infobox.php');
  }
  require_once(DIR_FS_BOXES . 'login.php');
  if (!defined('MODULE_NEWSLETTER_STATUS') 
      || MODULE_NEWSLETTER_STATUS == 'true'
      )
  {
    require_once(DIR_FS_BOXES . 'newsletter.php');
  }

  // -----------------------------------------------------------------------------------------
  //	only if show price
  // -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status_show_price'] == '1') {
    require_once(DIR_FS_BOXES . 'cart.php');
    if (defined('MODULE_WISHLIST_SYSTEM_STATUS') && MODULE_WISHLIST_SYSTEM_STATUS == 'true') {
      require_once(DIR_FS_BOXES . 'wishlist.php');
    }
  }

  // -----------------------------------------------------------------------------------------
  // additional boxes
  // -----------------------------------------------------------------------------------------
  if (in_array($display_mode, array('logoff', 'error', 'shoppingcart', 'newsletter')) 
      || basename($PHP_SELF) == FILENAME_CHECKOUT_SUCCESS
      )
  {
    require_once(DIR_FS_BOXES . 'last_viewed.php');
    require_once(DIR_FS_BOXES . 'whats_new.php');
    require_once(DIR_FS_BOXES . 'best_sellers.php');
    require_once(DIR_FS_BOXES . 'specials.php');
    require_once(DIR_FS_BOXES . 'xsell.php');
  }

  // -----------------------------------------------------------------------------------------
  //	hide during checkout
  // -----------------------------------------------------------------------------------------
  if ($display_mode != 'checkout') {
    require_once(DIR_FS_BOXES . 'currencies.php');
    require_once(DIR_FS_BOXES . 'shipping_country.php');
    require_once(DIR_FS_BOXES . 'languages.php'); 
  }

  // -----------------------------------------------------------------------------------------
  //	admins only
  // -----------------------------------------------------------------------------------------
  if ($_SESSION['customers_status']['customers_status'] == '0') {
    require_once(DIR_FS_BOXES . 'admin.php');
  }

  // -----------------------------------------------------------------------------------------
  //	display mode
  // -----------------------------------------------------------------------------------------
  switch ($display_mode) {
    case 'home':
      if (BS5_STARTPAGE_BOX_GREETING == 'true') {
        // greeting
        require_once(DIR_FS_BOXES . 'greeting.php');
      }
      if (BS5_STARTPAGE_SHOW_CATEGORYLIST == 'true') {
        // MODUL: Kategorien auf der Startseite anzeigen (c_list Modul)
        require_once(DIR_FS_BOXES . 'categories_list.php');
      }
      if (substr(basename($PHP_SELF), 0,8) != 'advanced' && BS5_STARTPAGE_BOX_WHATSNEW == 'true') {
        // whats_new
        require_once(DIR_FS_BOXES . 'whats_new.php'); 
      }
      if ($_SESSION['customers_status']['customers_status_specials'] == '1' && BS5_STARTPAGE_BOX_SPECIALS == 'true') {
        // specials
        require_once(DIR_FS_BOXES . 'specials.php');
      }
      if ($_SESSION['customers_status']['customers_status_read_reviews'] == '1' && BS5_STARTPAGE_BOX_REVIEWS == 'true') {
      // reviews
        require_once(DIR_FS_BOXES . 'reviews.php');
      }
      if (BS5_STARTPAGE_BOX_BESTSELLER == 'true') {
        // Bestseller
        require_once(DIR_FS_BOXES . 'best_sellers.php');
      }
      if (BS5_MANCAROUSEL_SHOW == 'true') {
        // Bootstrap5
        require_once(DIR_FS_BOXES . 'manufacturers_carousel.php');
      }
      // trustedshops
      if (defined('MODULE_TS_TRUSTEDSHOPS_ID') 
          && MODULE_TS_REVIEW_STICKER != '' 
          && MODULE_TS_REVIEW_STICKER_STATUS == '1'
          ) 
      {
        require_once(DIR_FS_BOXES . 'trustedshops.php');
      }
      break;
    
    case 'listing':
      if (BS5_NOT_STARTPAGE_BOX_SUBCATEGORIES == 'true') {
        // sub categories
        require_once(DIR_FS_BOXES . 'sub_categories.php');
      }
      break;

    case 'productinfo':
      if (BS5_NOT_STARTPAGE_BOX_LAST_VIEWED == 'true') {
        require_once(DIR_FS_BOXES . 'last_viewed.php');
      }
      break;

/* wird in Bootstrap5 nicht genutzt
      case 'category':
    case 'manufacturer':
    case 'search':
    case 'productsnew':
    case 'specials':
      // set big content for non cases in index.html
      $smarty->assign('content_size', 'big');
      Break;
*/
  }
