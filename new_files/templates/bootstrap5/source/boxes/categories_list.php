<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

	// MODUL: Kategorien auf der Startseite anzeigen (c_list Modul)
	// Anpassung an modified 1.x: sgei
	// Anpassung an modified 2.x: |Alex|
	// Quelle: xtc-load.de - Autor: unbekannt

	  // include smarty
		include(DIR_FS_BOXES_INC . 'smarty_default.php');

		// set cache id
		$cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id']);
	
		if (!$box_smarty->is_cached(CURRENT_TEMPLATE.'/boxes/categories_list.html', $cache_id) || !$cache) {

			$categories_query = "SELECT c.categories_id,
										c.categories_image,
										c.categories_image_list,
										c.categories_image_mobile,
										cd.categories_name,
										cd.categories_description,
										cd.categories_heading_title
									FROM ".TABLE_CATEGORIES." AS c,
										".TABLE_CATEGORIES_DESCRIPTION." AS cd
									WHERE c.categories_id = cd.categories_id
									AND c.parent_id = '0'
									AND	c.categories_status = '1'
									AND cd.language_id = '" .(int) $_SESSION['languages_id']. "'
									ORDER BY c.sort_order ASC";

									$categories_query = xtDBquery($categories_query);

			$box_content = array ();

			while($categories = xtc_db_fetch_array($categories_query, true)) {

				$cPath_new = xtc_category_link($categories['categories_id'],$categories['categories_name']);

				$image = $main->getImage($categories['categories_image']);
				$image_list = $main->getImage($categories['categories_image_list']);
				$image_mobile = $main->getImage($categories['categories_image_mobile']);

				$box_content[] = array (
							'CATEGORY_NAME' => $categories['categories_name'],
							'CATEGORY_HEADING_TITLE' => $categories['categories_heading_title'],
							'CATEGORY_IMAGE' => (($image != '') ? DIR_WS_BASE . $image : ''),
							'CATEGORY_IMAGE_LIST' => (($image_list != '') ? DIR_WS_BASE . $image_list : ''),
							'CATEGORY_IMAGE_MOBILE' => (($image_mobile != '') ? DIR_WS_BASE . $image_mobile : ''),
							'CATEGORY_LINK' => xtc_href_link(FILENAME_DEFAULT, $cPath_new),
							'CATEGORY_DESCRIPTION' => $categories['categories_description']
				);
			}

			$box_smarty->assign('BOX_CONTENT', $box_content);

		}

  
		$box_categories_list = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_categories_list.html', $cache_id);

		$smarty->assign('box_CATEGORIES_LIST', $box_categories_list);
