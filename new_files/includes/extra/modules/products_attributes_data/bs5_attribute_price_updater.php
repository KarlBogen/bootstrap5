<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

/*
 * --------------------------------------------------------------------------
 * @file      web0null_attribute_price_updater.php
 * @date      18.10.17
 *
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
if (defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT') && BS5_MODULFUX_ATTRIBUTES_DEFAULT == 'true') {

  defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT_DROPDOWN') or define('BS5_MODULFUX_ATTRIBUTES_DEFAULT_DROPDOWN', 'true');
  defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT_DROPDOWN_CHECKED') or define('BS5_MODULFUX_ATTRIBUTES_DEFAULT_DROPDOWN_CHECKED', 'true');

  $opt_tpl = 'DROPDOWN';
  switch ($product->data['options_template']) {
    case 'product_options_v1_select.html':
      $opt_tpl = 'DROPDOWN';
      break;

    case 'product_options_v3_button.html':
      $opt_tpl = 'RADIO';
      break;

    case 'product_options_v2_table.html':
      $opt_tpl = 'TABLE';
      break;
  }
  if (constant('BS5_MODULFUX_ATTRIBUTES_DEFAULT_'.$opt_tpl) == 'true') {



  if ($col == 0) {
	  $attr_default_data[$row]= [
	      'ID'      => '0_' . $products_options_data[$row]['DATA'][$col]['ID'],
	      'TEXT'    => BS5_MODULFUX_PULL_DOWN_DEFAULT,
	      'CHECKED' => isset($attrib_checked_array[$products_options_name['products_options_id']]) ? '0' : '1'
	    ];
	    if (defined('BS5_ATTR_PRICE_UPDATER') && BS5_ATTR_PRICE_UPDATER == 'true') {
	      $attr_default_data[$row]['JSON_ATTRDATA'] = str_replace('"', '&quot;', json_encode(
	        [
	          'pid'          => (int)$product->data['products_id'],
	          'gprice'       => $products_price,
	          'oprice'       => isset($productDataArray["PRODUCTS_PRICE_OLD_PRICE_PLAIN"]) ? floatval(str_replace(',', '.', $productDataArray["PRODUCTS_PRICE_OLD_PRICE_PLAIN"])) : $products_price,
	          'cleft'        => $xtPrice->currencies[$_SESSION['currency']]['symbol_left'],
	          'cright'       => $xtPrice->currencies[$_SESSION['currency']]['symbol_right'],
	          'prefix'       => isset($products_options['price_prefix']) ? $products_options['price_prefix'] : '',
	          'aprice'       => 0,
	          'vpetext'      => encode_htmlentities($product->data['products_vpe'] != '0' ? xtc_get_vpe_name($product->data['products_vpe']) : BS5_TEXT_PRODUCTS_VPE),
	          'vpevalue'     => (($product->data['products_vpe_status'] && (double)$product->data['products_vpe_value']) ? (double)$product->data['products_vpe_value'] : 0),
	          'attrvpevalue' => 0,
	          'onlytext'     => isset($json_onlytext) ? $json_onlytext : BS5_TXT_ONLY,
	          'protext'      => isset($json_protext) ? $json_protext : TXT_PER,
	          'insteadtext'  => isset($json_insteadtext) ? $json_insteadtext : BS5_TXT_INSTEAD,
	        ]
	      ));
	    }
	}

  } else {
    if (constant('BS5_MODULFUX_ATTRIBUTES_DEFAULT_'.$opt_tpl.'_CHECKED') != 'true') {
      if (!isset($attrib_checked_array[$products_options_name['products_options_id']])) $products_options_data[$row]['DATA'][$col]['CHECKED'] = '0';
    }
  }
}


//BOF - web0null_attribute_price_updater
if (defined('BS5_ATTR_PRICE_UPDATER') && BS5_ATTR_PRICE_UPDATER == 'true') {

  // Attribut-VPE-Wert wird mit Hilfe des Gewichts-Prefix berechnet
  // das JavaScript rechnet immer Artikel-VPE-Wert + Attribut-VPE-Wert
  $attr_vpe_value = $products_options['attributes_vpe_value'];
  switch ($products_options['weight_prefix']) {
    case '-':
      $attr_vpe_value = -1 * abs($products_options['attributes_vpe_value']);
      break;
    case '=':
      $attr_vpe_value = $products_options['attributes_vpe_value'] - $product->data['products_vpe_value'];
      break;
  }

  $products_options_data[$row]['DATA'][$col]['JSON_ATTRDATA'] = str_replace(
    '"', '&quot;', json_encode(
      [
        'pid'          => (int)$product->data['products_id'],
        'gprice'       => $products_price,
        'oprice'       => isset($productDataArray["PRODUCTS_PRICE_OLD_PRICE_PLAIN"]) ? floatval(str_replace(',', '.', $productDataArray["PRODUCTS_PRICE_OLD_PRICE_PLAIN"])) : $products_price,
        'cleft'        => $xtPrice->currencies[$_SESSION['currency']]['symbol_left'],
        'cright'       => $xtPrice->currencies[$_SESSION['currency']]['symbol_right'],
        'prefix'       => $products_options['price_prefix'],
        'aprice'       => $xtPrice->xtcFormat($price, false),
        'vpetext'      => encode_htmlentities($product->data['products_vpe'] != '0' ? xtc_get_vpe_name($product->data['products_vpe']) : BS5_TEXT_PRODUCTS_VPE),
        'vpevalue'     => (($product->data['products_vpe_status'] && (double)$product->data['products_vpe_value']) ? (double)$product->data['products_vpe_value'] : 0),
        'attrvpevalue' => (($product->data['products_vpe_status'] && (double)$attr_vpe_value) ? (double)$attr_vpe_value : 0),
        'onlytext'     => isset($json_onlytext) ? $json_onlytext : BS5_TXT_ONLY,
        'protext'      => isset($json_protext) ? $json_protext : TXT_PER,
        'insteadtext'  => isset($json_insteadtext) ? $json_insteadtext : BS5_TXT_INSTEAD,
      ]
    )
  );
}
//EOF - web0null_attribute_price_updater