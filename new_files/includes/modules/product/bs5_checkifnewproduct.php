<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

class bs5_checkifnewproduct
{  //Important same name as filename

  var $code;
  var $name;
  var $title;
  var $description;
  var $enabled;
  var $sort_order;
  var $translate;
  var $_check;

  //--- BEGIN DEFAULT CLASS METHODS ---//
  function __construct()
  {
    $this->code = 'bs5_checkifnewproduct'; //Important same name as class name
    $this->title = 'Check if new product';
    $this->description = 'Awids Rating Breakdown!';
    $this->name = 'MODULE_PRODUCT_' . strtoupper($this->code);
    $this->enabled = defined($this->name . '_STATUS') && constant($this->name . '_STATUS') == 'true' ? true : false;
    $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : '';

    $this->translate();
  }

  function translate()
  {
    switch ($_SESSION['language_code']) {
      case 'de':
        $this->description = '<strong>Dieses Modul geh&ouml;rt zum Systemmodul "BS5 Template Manager"</strong><br />Es wird automatisch konfiguriert mit dem Systemmodul.<br /><br /><strong>Dieses Modul ermittelt Daten f&uuml;r Awids Rating Breakdown ist und erweitert das Produkt-Array.</strong>';
        break;
      default:
        $this->description = '<strong>This module is part of the systemmodule "BS5 Template Manager"</strong><br />It is automatically configured with the system module.<br /><br /><strong>this module collects data for Awids Rating Breakdown and extend the products array.</strong>';
        break;
    }
  }

  function check()
  {
    if (!isset($this->_check)) {
      if (defined($this->name . '_STATUS')) {
        $this->_check = true;
      } else {
        $check_query = xtc_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = '" . $this->name . "_STATUS'");
        $this->_check = xtc_db_num_rows($check_query);
      }
    }
    return $this->_check;
  }

  function keys()
  {
    defined($this->name . '_STATUS_TITLE') or define($this->name . '_STATUS_TITLE', TEXT_DEFAULT_STATUS_TITLE);
    defined($this->name . '_STATUS_DESC') or define($this->name . '_STATUS_DESC', TEXT_DEFAULT_STATUS_DESC);
    defined($this->name . '_SORT_ORDER_TITLE') or define($this->name . '_SORT_ORDER_TITLE', TEXT_DEFAULT_SORT_ORDER_TITLE);
    defined($this->name . '_SORT_ORDER_DESC') or define($this->name . '_SORT_ORDER_DESC', TEXT_DEFAULT_SORT_ORDER_DESC);

    return array(
      //            $this->name.'_STATUS',
      $this->name . '_SORT_ORDER'
    );
  }

  function install() {}

  function remove() {}

    //--- BEGIN CUSTOM  CLASS METHODS ---//

  /**
   * buildDataArray
   *
   * @param array $array
   * @return array
   */
  function buildDataArray($productData, $array, $image = 'thumbnail')
  {

    if (defined('BS5_CUSTOMERS_REMIND') && BS5_CUSTOMERS_REMIND == 'true') {

      if ($array["products_quantity"] < 1) {

        $productData['PRODUCTS_BUTTON_BUY_NOW'] = '';
      }
    }
    if (defined('BS5_AWIDSRATINGBREAKDOWN') && BS5_AWIDSRATINGBREAKDOWN == 'true') {

      $sum_reviews = $this->getReviewsCount((int)$array['products_id']);
      $average = $this->getReviewsAverage((int)$array['products_id'], 1);
      $average_percent = number_format(($average * 100 / 5), 0, ',', '');

      $DataArray = array(
        'BS5_AWIDS_PRODUCTS_SUM_REVIEWS' => $sum_reviews,
        'BS5_AWIDS_PRODUCTS_AVERAGE' => $average,
        'BS5_AWIDS_PRODUCTS_AVERAGE_PERCENT' => $average_percent,
      );
      $productData = array_merge($productData, $DataArray);
    }

    if ($productData['PRODUCTS_IMAGE'] == '') {
      // falls Produktbild 1 nicht gesetzt ist
      if (defined('MODULE_BS5_TPL_MANAGER_STATUS') && MODULE_BS5_TPL_MANAGER_STATUS == 'true') {
        if (strpos($_SERVER['PHP_SELF'], 'product_info.php') === false) {

          global $product;

          require_once(DIR_FS_INC . 'xtc_get_products_mo_images.inc.php');
          // prüfen, ob weitere Bilder existieren
          $mo_images = xtc_get_products_mo_images($array['products_id']);
          if ($mo_images != false) {
            // erstes Bild auswählen
            $first_img = array_shift($mo_images);
            // Produktbild ersetzen
            $productData['PRODUCTS_IMAGE'] = $product->productImage($first_img['image_name'], 'thumbnail');
          }
        }
      }
    }


    return $productData;
  }

// Copy from class product
// language from query deleted

  /**
   * Query for reviews count
   *
   * @return integer
   */
  function getReviewsCount($pID = '')
  {
    if ($pID == '') {
      $pID = $this->pID;
    }
    $reviews_query = xtc_db_query("SELECT count(*) AS total
                                     FROM " . TABLE_REVIEWS . " r
                                     JOIN " . TABLE_REVIEWS_DESCRIPTION . " rd
                                          ON r.reviews_id = rd.reviews_id
                                             AND rd.reviews_text != ''
                                    WHERE r.products_id = '" . (int)$pID . "'
                                      AND r.reviews_status = '1'");
    $reviews = xtc_db_fetch_array($reviews_query);
    return $reviews['total'];
  }


  /**
   * getReviewsAverage
   *
   * @return string
   */
  function getReviewsAverage($pID = '', $precision = 0)
  {
    if ($pID == '') {
      $pID = $this->pID;
    }
    $avg_reviews_query = xtc_db_query("SELECT avg(reviews_rating) AS avg_rating
                                         FROM " . TABLE_REVIEWS . "
                                        WHERE products_id='" . (int)$pID . "'
                                          AND reviews_status = '1'");
    $avg_reviews = xtc_db_fetch_array($avg_reviews_query);

    return round($avg_reviews['avg_rating'] ?? 0, $precision);
  }
}
