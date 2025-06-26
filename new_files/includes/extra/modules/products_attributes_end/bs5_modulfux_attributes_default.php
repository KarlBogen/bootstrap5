<?php
/*
 * --------------------------------------------------------------------------
 * @file      modulfux_attributes_default.php
 * @date      16.10.17
 *
 * @copyright modulfux https://www.modulfux.de
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
if (defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT') && BS5_MODULFUX_ATTRIBUTES_DEFAULT == 'true' && constant('BS5_MODULFUX_ATTRIBUTES_DEFAULT_'.$opt_tpl) == 'true') {
  for ($i=0, $n=count($products_options_data); $i<$n; $i++) {
      array_unshift($products_options_data[$i]['DATA'], $attr_default_data[$i]);
      if ($attr_default_data[$i]['CHECKED'] == '1') {
        $products_options_data[$i]['DATA'][1]['CHECKED'] = '0';
      }
  }
  $module_smarty->assign('options', $products_options_data);
}
