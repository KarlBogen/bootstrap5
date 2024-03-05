<?php
/*-----------------------------------------------------------
   $Id: general_bottom.js.php 13771 2021-10-15 13:35:43Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
  -----------------------------------------------------------
   based on: (c) 2003 - 2006 XT-Commerce (general.js.php)
  -----------------------------------------------------------
   Released under the GNU General Public License
   -----------------------------------------------------------
*/
// this javascriptfile get includes at the BOTTOM of every template page in shop
// you can add your template specific js scripts here
defined('DIR_TMPL_JS') OR define('DIR_TMPL_JS', DIR_TMPL.'javascript/');
?>

<script src="<?php echo DIR_WS_BASE.DIR_TMPL_JS; ?>jquery.min.js"></script>
<?php

$script_array = array(
	DIR_TMPL_JS.'bootstrap.bundle.min.js',
	DIR_TMPL_JS.'jquery.resCarousel.min.js',
	DIR_TMPL_JS.'jquery.lazysizes.min.js',
);

$script_array_defer = array(
	DIR_TMPL_JS.'jquery.mmenulight.js',
	DIR_TMPL_JS.'jquery.alertable.min.js',
);

// https://github.com/fengyuanchen/viewerjs
if (BS5_USE_VIEWERJS == 'true') {
	$script_array_defer[] = DIR_TMPL_JS .'jquery.viewer.min.js';
}

// Bootstrap5
$script_array[] = DIR_TMPL_JS .'bs5.min.js';

$script_min = DIR_TMPL_JS.'tpl_plugins.min.js';

$this_f_time = filemtime(DIR_FS_CATALOG.DIR_TMPL_JS.'general_bottom.js.php');

if (COMPRESS_JAVASCRIPT == 'true') {
	require_once(DIR_FS_BOXES_INC.'combine_files.inc.php');
	$script_array = combine_files($script_array,$script_min,false,$this_f_time);
}

foreach ($script_array as $script) {
	$script .= strpos($script,$script_min) === false ? '?v=' . filemtime(DIR_FS_CATALOG.$script) : '';
	echo '<script src="'.DIR_WS_BASE.$script.'"></script>'.PHP_EOL;
}
foreach ($script_array_defer as $script) {
	echo '<script src="'.DIR_WS_BASE.$script.'" defer></script>'.PHP_EOL;
}

ob_start();
foreach(auto_include(DIR_FS_CATALOG.DIR_TMPL_JS.'/extra/','php') as $file) require ($file);
$javascript = ob_get_clean();
if (COMPRESS_JAVASCRIPT == 'true') {
  require_once(DIR_TMPL.'source/external/compactor/compactor.php');
  $compactor = new BS5_Compactor(array('strip_php_comments' => false, 'compress_css' => false, 'compress_scripts' => true));
  $javascript = $compactor->squeeze($javascript);
}
echo $javascript.PHP_EOL;