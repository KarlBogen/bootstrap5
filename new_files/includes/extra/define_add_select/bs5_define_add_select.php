<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

	if (defined('MODULE_BS5_TPL_MANAGER_STATUS') && MODULE_BS5_TPL_MANAGER_STATUS == 'true') {
		if (MODULE_BANNER_MANAGER_STATUS == 'true') {
		  $add_select_categories[] = 'c.bs5_banner_ids';
		  $add_select_categories[] = 'c.bs5_banner_settings';
		}
	}
	$add_select_default[] = 'p.products_startpage';
	$add_select_search[] = 'p.products_startpage';
	$add_select_product[] = 'p.products_startpage';
