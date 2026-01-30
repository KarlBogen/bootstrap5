<?php
/* -----------------------------------------------------------------------------------------
   $Id: config.php 16797 2026-01-26 09:35:21Z GTB $

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Copyright (c) 2009 - 2013 [www.modified-shop.org]
  -----------------------------------------------------------------------------------------
  Released under the GNU General Public License
  ---------------------------------------------------------------------------------------*/

/*
  *  template specific defines
  */

// laden der templatespezifischen Sprachdatei (dadurch entfallen die Dateien lang/jeweilige_sprache/extra/bs5_template.php
require_once(DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/lang/template_' . $_SESSION['language'] . '.php');

if (!defined('MODULE_BS5_TPL_MANAGER_STATUS') || MODULE_BS5_TPL_MANAGER_STATUS != 'true' || !defined('BS5_SCALE_IMGAGES_ON_HOVER')) {
  // laden der config, falls Systemmodul deaktiviert oder neueste Konstante noch nicht definiert wurde
  require_once('defines.php');
}

// Produktdetailansicht
defined('BS5_PROD_DETAIL_FULLCONTENT') or define('BS5_PROD_DETAIL_FULLCONTENT', 'false'); // 'true' Zeigt in der Produktdetailseite das Kategoriemenü in der linken Spalte. Nur für das Template "bootstrap5a"!

// KK-Megamenü
$KK_MEGAS = array(); // Variable wird definiert - hier nichts eintragen
if (BS5_KK_MEGAS != '') {
  $KK_MEGAS = explode(',', trim(BS5_KK_MEGAS));
}
// Ende KK-Megamenü

defined('BS5_PRODUCT_LIST_BOX') or define('BS5_PRODUCT_LIST_BOX', ((isset($_SESSION['listbox'])) ? $_SESSION['listbox'] : BS5_PROD_LIST_BOX));

// check specials
if (BS5_SPECIALS_CATEGORIES == 'true') {
  require_once(DIR_FS_INC . 'check_specials.inc.php');
  defined('SPECIALS_EXISTS') or define('SPECIALS_EXISTS', check_specials());
}

// check whats new
if (BS5_WHATSNEW_CATEGORIES == 'true') {
  require_once(DIR_FS_INC . 'check_whatsnew.inc.php');
  defined('WHATSNEW_EXISTS') or define('WHATSNEW_EXISTS', check_whatsnew());
}

//   Wird eingestellt in Erw. Konfiguration -> Bootstrap 5 Template Manager -> BS5 Konfiguration Tab "Verschiedenes" - Wert Artikel-Thumbnails
//	Seit Shopversion 2.0.6.0 besteht die Möglichkeit Artikelbilder in zusätzlichen Größen (Mini, Midi) zu speichern.
//	In Konfiguration -> Bild Optionen sind die Maße einzustellen, für bereits vorhanden Bilder muss evtl. das Systemmodul "Bilder Prozessing" ausgeführt werden.
$pictureset_active = false;
if (defined('DIR_WS_MINI_IMAGES')) {
  $pictureset_active = (defined('BS5_PICTURESET_ACTIVE') && constant('BS5_PICTURESET_ACTIVE') == 'true') ? true : false;
}
// picture set listing box - neu in Shopversion 2.0.6.0
define('PICTURESET_ACTIVE', $pictureset_active);
define('PICTURESET_BOX', '575.98:midi,767.98:thumbnail,1199.98:midi');
define('PICTURESET_ROW', '767.98:thumbnail');

// -----------------------------------------------------------------------------------
// 	Ab hier nichts ändern
// -----------------------------------------------------------------------------------
// paths
define('DIR_FS_BOXES', DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/source/boxes/');
define('DIR_FS_BOXES_INC', DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/source/inc/');

// popup
define('TPL_POPUP_SHIPPING_LINK_PARAMETERS', '');
define('TPL_POPUP_SHIPPING_LINK_CLASS', 'iframe');
define('TPL_POPUP_CONTENT_LINK_PARAMETERS', '');
define('TPL_POPUP_CONTENT_LINK_CLASS', 'iframe');
define('TPL_POPUP_PRODUCT_LINK_PARAMETERS', '');
define('TPL_POPUP_PRODUCT_LINK_CLASS', 'iframe');
define('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS', '');
define('TPL_POPUP_COUPON_HELP_LINK_CLASS', 'iframe');
define('TPL_POPUP_PRODUCT_PRINT_SIZE', '');
define('TPL_POPUP_PRINT_ORDER_SIZE', '');

// template output
define('TEMPLATE_ENGINE', 'smarty_4'); // 'smarty_4' oder 'smarty_3' oder 'smarty_2' -> Nicht ändern! (Nur "smarty_4" oder "smarty_3" unterstützt die custom Sprachdateien (lang_english.custom & lang_german.custom) aus dem Ordner "../lang/" des Templates!)
define('TEMPLATE_HTML_ENGINE', 'html5'); // 'html5' oder 'xhtml' -> Nicht ändern!
define('TEMPLATE_RESPONSIVE', 'true'); // 'true' oder 'false' -> Nicht ändern!
define('TEMPLATE_PAGINATION', 'true'); // 'true' oder 'false' -> Nicht ändern!
defined('COMPRESS_JAVASCRIPT') or define('COMPRESS_JAVASCRIPT', 'false'); // 'true' kombiniert & komprimiert die zusätzliche JS-Dateien / 'false' bindet alle JS-Dateien einzeln ein

// set base
defined('DIR_WS_BASE') or define('DIR_WS_BASE', xtc_href_link('', '', $request_type, false, false));

// css buttons
if (is_file(DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/source/inc/css_button.inc.php')) {
  require_once(DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/source/inc/css_button.inc.php');
}
