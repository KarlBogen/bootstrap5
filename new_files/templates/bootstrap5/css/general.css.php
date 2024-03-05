<?php
/* -----------------------------------------------------------------------------------------
   $Id: general.css.php 10665 2017-04-06 18:13:26Z web28 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 XT-Commerce

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  define('DIR_TMPL', 'templates/'.CURRENT_TEMPLATE.'/');
  define('DIR_TMPL_CSS', DIR_TMPL.'css/');

  if ($_SESSION['customers_status']['customers_status'] == '0') {
    echo '<link rel="stylesheet" property="stylesheet" href="'.DIR_WS_BASE.DIR_TMPL_CSS.'adminbar.css" type="text/css" media="screen" />';
  }

	// preload font Cumulative Layout Shift (CLS)
	echo '<link rel="preload" href="'.DIR_TMPL_CSS.'fonts/open-sans-v40-latin-regular.woff2" as="font" crossorigin="anonymous">';

	$css_array = array();

	// include bootstrap
	$css_array[] = DIR_TMPL_CSS.'bootstrap/bootstrap.min.css';

	$css_array[] = DIR_TMPL_CSS.'bs5.css';

	$css_array[] = DIR_TMPL.'stylesheet.css';

  if (is_file(DIR_FS_CATALOG.DIR_TMPL_CSS.'tpl_custom.css')) {
    array_push($css_array, DIR_TMPL_CSS.'tpl_custom.css');
  }

 $css_min = DIR_TMPL_CSS.'stylesheet.min.css';

  $this_f_time = filemtime(DIR_FS_CATALOG.DIR_TMPL_CSS.'general.css.php');

  if (COMPRESS_STYLESHEET == 'true') {
    require_once(DIR_FS_BOXES_INC.'combine_files.inc.php');
    $css_array = combine_files($css_array,$css_min,true,$this_f_time);
  }

  // Put CSS-Inline-Definitions here, these CSS-files will be loaded at the TOP of every page
  
  foreach ($css_array as $css) {
    $css .= strpos($css,$css_min) === false ? '?v=' . filemtime(DIR_FS_CATALOG.$css) : '';
    echo '<link rel="stylesheet" href="'.DIR_WS_BASE.$css.'" type="text/css" media="screen">'.PHP_EOL;
  }

  echo '<style>'.PHP_EOL;
  echo '  .img_container {max-width: '.PRODUCT_IMAGE_THUMBNAIL_WIDTH.'px}'.PHP_EOL;
  echo '  .man_image.img_container {max-width: '.MANUFACTURER_IMAGE_WIDTH.'px}'.PHP_EOL;
  echo '</style>'.PHP_EOL;

?>