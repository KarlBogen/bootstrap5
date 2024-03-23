<?php
/* ------------------------------------------------------------------------------------------------------------------
	$Id: function.traffic_light.php

	CSS Produkt- & Attributlagerampel v1.0(2017-04-22) Community Edition

	Authors:
	-------------------
		awids (www.awids.de)
		web28 (www.rpa-com.de)
		noRiddle (www.revilonetz.de)
		angepasst an 'bootstrap5' von Karl

	Calls:
	-------------------
		Community Edition:
		product_info:		{traffic_light stock=$PRODUCTS_QUANTITY modul='info'}
		product_listing:	{traffic_light stock=$module_data.PRODUCTS_QUANTITY modul='listing'}
		attributes:			{traffic_light stock=$item_data.STOCK modul='attributes'}
							only for select fields - insert a disabled option
                            {traffic_light stock=$item_data.STOCK modul='attributes' select='ots'} (o = option, t = text, s = stock)
	Styles:
		l = light
		ls = light and stock
		lt = light and text
		lts = light and text and stock
		t = text
		ts = text and stock

----------------------------------------------------------------------------------------------------------------*/

function smarty_function_traffic_light($params, &$smarty) {

	$modul = isset($params['modul']) ? $params['modul'] : '';
    
	$stock = isset($params['stock']) ? ($params['stock'] < 0 ? '0' : $params['stock']) : false;
	if ($stock === false) {
		return false;
	}
	$style = 'l';
	$show_qty = true;
	$show_stocktext = isset($params['show_stocktext']) ? $params['show_stocktext'] : true;

	if (defined('BS5_TRAFFIC_LIGHTS_PROD'.strtoupper($modul))) {
		$style = constant('BS5_TRAFFIC_LIGHTS_PROD'.strtoupper($modul));
	}

	if (isset($params['select'])) {
		$style = $params['select'];
	}

	if ($stock <= BS5_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL) {
		$stock_txt = BS5_MODULE_TRAFFIC_LIGHTS_QTY_RED. (strpos($style, 's') !== false ? '&nbsp;('. $stock . ')' : '');
		$lights = array('', '', ' bg-danger');
		$txtclass = 'danger';
	}
	elseif ($stock > BS5_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL && $stock < BS5_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN) {
		$stock_txt = BS5_MODULE_TRAFFIC_LIGHTS_QTY_YELL . (strpos($style, 's') !== false ? '&nbsp;('. $stock . ')' : '');
		$lights = array('', ' bg-warning', '');
		$txtclass = 'warning-emphasis';
	}
	elseif ($stock >= BS5_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN) {
		$stock_txt = BS5_MODULE_TRAFFIC_LIGHTS_QTY_GREEN. (strpos($style, 's') !== false ? '&nbsp;('. $stock . ')' : '');
		$lights = array(' bg-success', '', '');
		$txtclass = 'success-emphasis';
	}

	if (strpos($style, 'o') !== false) {
		$html = '<option disabled style="font-style:italic">&nbsp;&nbsp;'.BS5_MODULE_TRAFFIC_LIGHTS_STOCK.': ';
		if ($style == 'os') {
			$html .= '('.$stock.')';
		} else {
			$html .= $stock_txt;
		}
		$html .= '</option>';
		return $html;
	}

	$html = '<span class="traffic d-flex align-items-center" title="'.$stock_txt.'">'."\n";
	$html .= $show_stocktext ? ($modul === 'info' ? '<strong>'.BS5_MODULE_TRAFFIC_LIGHTS_STOCK.':&nbsp;</strong>' : BS5_MODULE_TRAFFIC_LIGHTS_STOCK.':&nbsp;') : '';
	if ($style != 't' && $style != 'ts') {
		foreach ($lights as $light) {
			$html .= '<span class="border border-secondary badge rounded-pill'.$light.'">&nbsp;</span>&nbsp;'."\n";
		}
	}
	if ($style == 'ls') {
		$html .= '<span class="small text-'.$txtclass.'">('.$stock.')</span>'."\n";
	}
	if ($style != 'l' && $style != 'ls') {
		$html .= '<span class="small text-'.$txtclass.'">'.$stock_txt.'</span>'."\n";
	}
	$html .= '</span>'."\n";

	return $html;

}
