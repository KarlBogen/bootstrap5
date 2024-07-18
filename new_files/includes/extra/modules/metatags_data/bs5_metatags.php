<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// diese Daten werden für die SEO-Bewertung benötigt

  // create meta array
  switch(basename($PHP_SELF)) {

    case FILENAME_SPECIALS :
      $metadata_array_plus = array(
        'description' => defined('BS5_METATAG_SPECIALS_DESC') ? BS5_METATAG_SPECIALS_DESC : '',
        'keywords' => defined('BS5_METATAG_SPECIALS_KEYWORDS') ? BS5_METATAG_SPECIALS_KEYWORDS : '',
      );

			$metadata_array = array_merge($metadata_array, $metadata_array_plus);
      break;

    case FILENAME_PRODUCTS_NEW :
      $metadata_array_plus = array(
        'description' => defined('BS5_METATAG_NEWPRODS_DESC') ? BS5_METATAG_NEWPRODS_DESC : '',
        'keywords' => defined('BS5_METATAG_NEWPRODS_KEYWORDS') ? BS5_METATAG_NEWPRODS_KEYWORDS : '',
      );

			$metadata_array = array_merge($metadata_array, $metadata_array_plus);
      break;

  }
