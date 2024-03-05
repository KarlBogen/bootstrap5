<?php
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
	include_once (DIR_WS_MODULES.'bs5_customers_remind.php');
}

/*
 * --------------------------------------------------------------------------
 * @file      modulfux_attributes_default.php
 * @date      15.10.17
 *
 * @copyright modulfux https://www.modulfux.de
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */

if (defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT') && BS5_MODULFUX_ATTRIBUTES_DEFAULT == 'true') {
  if (basename($PHP_SELF) == FILENAME_PRODUCT_INFO) {
    if (isset($_GET['error']) && $_GET['error'] == 'attributecheck') {
      ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('<div class="alert alert-danger"><?php echo BS5_MODULFUX_ATTRIBUTES_ERROR; ?></div>').insertBefore($('div[id^="optionen"]'));
					$('div[id^="optionen"]').find('input, select').filter(':visible:first').focus();
        });
      </script>
      <?php
    }
  }
}
?>