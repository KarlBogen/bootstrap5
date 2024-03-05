<?php
/*
 * --------------------------------------------------------------------------
 * @file      modulfux_attributes_default.php
 * @date      13.10.17
 *
 * @copyright modulfux https://www.modulfux.de
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
if (defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT') && BS5_MODULFUX_ATTRIBUTES_DEFAULT == 'true') {
  if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $option => $value) {
      if ($value == 0) {
        xtc_redirect(xtc_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . (int)$_POST['products_id'] . '&error=attributecheck', 'NONSSL'));
      }
    }
  }
}
