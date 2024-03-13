<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// Zusatzmodul Billiger gesehen
if (defined('BS5_CHEAPLY_SEE') && BS5_CHEAPLY_SEE == 'true') {
	if ($request_type == 'NONSSL') {
		$info_smarty->assign('PRODUCTS_CHEAPLY', '<a class="btn btn-sm btn-outline-secondary btn-block" title="'.TEXT_PRODUCTS_CHEAPLY.'" rel="nofollow" href="'.xtc_href_link(BS5_FILENAME_CHEAPLY_SEE, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name']).'&view=nonssl').'"><span><span class="fa fa-envelope me-2"></span><span>'.TEXT_PRODUCTS_CHEAPLY.'</span></span></a>');
	} else {
		$info_smarty->assign('PRODUCTS_CHEAPLY', '<a class="iframe btn btn-sm btn-outline-secondary btn-block" title="'.TEXT_PRODUCTS_CHEAPLY.'" href="'.xtc_href_link(BS5_FILENAME_CHEAPLY_SEE, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name'])).'"><span><span class="fa fa-envelope me-2"></span><span>'.TEXT_PRODUCTS_CHEAPLY.'</span></span></a>');
	}
}
// Zusatzmodul Frage zum Produkt
if (defined('BS5_PRODUCT_INQUIRY') && BS5_PRODUCT_INQUIRY == 'true') {
	if ($request_type == 'NONSSL') {
		$info_smarty->assign('PRODUCT_INQUIRY', '<a class="btn btn-sm btn-outline-secondary btn-block" title="'.TEXT_PRODUCT_INQUIRY.'" rel="nofollow" href="'.xtc_href_link(BS5_FILENAME_PRODUCT_INQUIRY, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name']).'&view=nonssl').'"><span><span class="fa fa-envelope me-2"></span><span>'.TEXT_PRODUCT_INQUIRY.'</span></span></a>');
	} else {
		$info_smarty->assign('PRODUCT_INQUIRY', '<a class="iframe btn btn-sm btn-outline-secondary btn-block" title="'.TEXT_PRODUCT_INQUIRY.'" href="'.xtc_href_link(BS5_FILENAME_PRODUCT_INQUIRY, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name'])).'"><span><span class="fa fa-envelope me-2"></span><span>'.TEXT_PRODUCT_INQUIRY.'</span></span></a>');
	}
}
/* ------------------------------------------------------------
	Module "Kundenerinnerung_Multilingual_advanced_modified-shop-2.0.3.0" made by Karl

	Based on: Kundenerinnerung_Multilingual_advanced_modified-shop-1.06
	Based on: xt-module.de customers remind
	erste Anpassung von: Fishnet Services - Gemsjäger 30.03.2012
	Zusatzfunktionen eingefügt sowie Fehler beseitigt von Ralph_84
	Aufgearbeitet für die Modified 1.06 rev4356 von Ralph_84

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

if (defined('BS5_CUSTOMERS_REMIND') && BS5_CUSTOMERS_REMIND == 'true') {

	if ($product->data['products_quantity'] <= 0) {

		$remindlink = '';
		$remindlink .= '<p class="text-danger mb-1">' . CUSTOMERS_REMIND_NOTE . '</p>'."\n";

		$products_qty = '<input type="hidden" value="1" name="products_qty">';

		if ($request_type == 'NONSSL') {
			$remindlink .= '<a class="btn btn-secondary btn-block" title="'.CUSTOMERS_REMIND_LINK_TEXT.'" rel="nofollow" href="'.xtc_href_link(BS5_FILENAME_CUSTOMERS_REMIND, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name']).'&view=nonssl').'"><span><span class="fa fa-envelope me-2"></span><span>'.CUSTOMERS_REMIND_LINK_TEXT.'</span></span></a>';
		} else {
			$remindlink .= '<a class="iframe btn btn-secondary btn-block" title="'.CUSTOMERS_REMIND_LINK_TEXT.'" href="'.xtc_href_link(BS5_FILENAME_CUSTOMERS_REMIND, 'pID='.$product->data['products_id'].'&'.xtc_product_link($product->data['products_id'],$product->data['products_name'])).'"><span><span class="fa fa-envelope me-2"></span><span>'.CUSTOMERS_REMIND_LINK_TEXT.'</span></span></a>';
		}

		$info_smarty->clear_assign('ADD_QTY');
		$info_smarty->clear_assign('ADD_CART_BUTTON');

		$info_smarty->assign('ADD_QTY', $products_qty . ' ' . $add_pid_to_qty);
		$info_smarty->assign('ADD_QTY_HIDDEN', true);
		$info_smarty->assign('ADD_CART_BUTTON', $remindlink);
	}
}
?>