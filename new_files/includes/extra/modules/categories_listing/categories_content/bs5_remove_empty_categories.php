<?php
if (defined('BS5_HIDE_EMPTY_CATEGORIES') && BS5_HIDE_EMPTY_CATEGORIES == 'true') {

/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// Leere Kategorien kennzeichnen
require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');
$categories_content[$rows]['CATEGORIES_PRODUCTS'] = xtc_count_products_in_category($categories['categories_id']);

}
