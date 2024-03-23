<?php
/**
 * $Id: bs5_get_subcat.php by Karl
 *
 * Karl Unterkategorien per Ajax laden
 *
 * Released under the GNU General Public License
 */

if (isset($_REQUEST['speed'])) {

	if (isset($_GET['cPath'])) unset($_GET['cPath']);
  include_once (DIR_FS_CATALOG.'includes/application_top_callback.php');
	require_once (DIR_FS_INC.'db_functions_'.DB_MYSQL_TYPE.'.inc.php');
	require_once (DIR_FS_INC.'db_functions.inc.php');
	require_once (DIR_WS_INCLUDES.'database_tables.php');

}

function bs5_get_subcat() {

	xtc_db_connect() or die('Unable to connect to database server!');

	// get Variables
	$my_cPath = $_REQUEST['cPath'];

	// Hersteller
	if ($my_cPath == 'man') return $manufacturers_string = bs5_show_manufacturers();

	require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');

	$my_foo = array();
	$my_categories_string = '';
	unset($prev_id);

	if ($my_cPath) {
		$new_path = '';
		$id = explode('_', $my_cPath);
		// we need only last cat_id
		$all_keys = array_keys($id);
		$last = array(end($all_keys) => end($id));
		foreach ($last as $key => $value) {
			unset ($prev_id);
			unset ($first_id);
			$categories_query = xtDBquery("SELECT c.categories_id,
                                              cd.categories_name,
                                              cd.categories_heading_title,
                                              c.parent_id
                                         FROM ".TABLE_CATEGORIES." c
                                         JOIN ".TABLE_CATEGORIES_DESCRIPTION." cd
                                              ON c.categories_id = cd.categories_id
                                                 AND cd.language_id='".(int)$_SESSION['languages_id']."'
                                                 AND trim(cd.categories_name) != ''
                                        WHERE c.categories_status = '1'
                                          AND c.parent_id = '".$value."'
                                              ".CATEGORIES_CONDITIONS_C."
                                     ORDER BY c.sort_order, cd.categories_name");

			if (xtc_db_num_rows($categories_query, true) > 0) {
				$new_path .= $value;
				while ($row = xtc_db_fetch_array($categories_query, true)) {
					$row['cat_link'] = xtc_href_link(FILENAME_DEFAULT, xtc_category_link($row['categories_id'], $row['categories_name']));
					$my_foo[$row['categories_id']] = array (
						'name' => $row['categories_heading_title'] != '' ? $row['categories_heading_title'] : $row['categories_name'],
						'link' => $row['cat_link'],
						'parent' => $row['parent_id'],
						'level' => $key +1,
						'path' => $new_path.'_'.$row['categories_id'],
						'next_id' => false
					);
          
					// prüfen ob erstes Element gesetzt und Unterkategorie vorhanden ist
						if (!isset ($first_element)) {
							$first_element = $value;
						}
						$hassubcat = bs5_has_category_subcat($row['categories_id']);
						$my_foo[$row['categories_id']]['hassubcat'] = $hassubcat === true ? true : false;
					// Ende Karl

					if (isset ($prev_id)) {
						$my_foo[$prev_id]['next_id'] = $row['categories_id'];
					}
					$prev_id = $row['categories_id'];
					if (!isset ($first_id)) {
						$first_id = $row['categories_id'];
					}
					$last_id = $row['categories_id'];
				}
				$my_foo[$last_id]['next_id'] = isset($my_foo[$value]['next_id']) ? $my_foo[$value]['next_id'] : 0;
				$my_foo[$value]['next_id'] = $first_id;
				$new_path .= '_';
			} else {
				break;
			}
		}
	}

	if (!empty($first_element)) {
		xtc_show_category($first_element, '' , $my_foo, $my_categories_string, $my_cPath);
	}

  return $my_categories_string;
}

function xtc_show_category($counter, $oldlevel=1, $my_foo, &$my_categories_string, $my_cPath) {
	$title = strip_tags($_REQUEST['title']);

	$level = isset($my_foo[$counter]['level']) ? $my_foo[$counter]['level']+1 : 1;

	//BOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++
    $ul = '';

    if ($level > $oldlevel) { //neue Unterebene
			$ul = "\n" . '<ul id="'.$counter.'" class="navbar-nav flex-column" data-level="'.$level.'" style="display: none;">'. "\n";
		  $my_categories_string = rtrim($my_categories_string, "\n"); //Zeilenumbruch entfernen
		  $my_categories_string = substr($my_categories_string, 0, strlen($my_categories_string) -5);  //letztes  </li>  entfernen
    } elseif ($level < $oldlevel) { //zurück zur höheren Ebene
		  $ul = '</ul>';
    }
    //EOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++

    //BOF +++ Kategorien markieren +++
    $category_path = explode('_',$my_cPath); //Kategoriepfad in Array einlesen

    //Aktive Kategorie markieren
    $cat_active = $cat_active_parent = '';

    //Elternkategorie markieren
    $in_path = in_array($counter, $category_path); //Testen, ob aktuelle Kategorie ID im Kategoriepfad enthalten ist
    $this_category = array_pop($category_path); //Letzter Eintrag im Array ist die aktuelle Kategorie

	if($this_category == $counter) {
		$cat_active = ' active" aria-current="page';
	} elseif($in_path) {
		$cat_active_parent = ' active parent';
	}
    //EOF +++ Kategorien markieren +++

	if (SHOW_COUNTS == 'true' || BS5_HIDE_EMPTY_CATEGORIES == 'true') {
		$products_in_category = xtc_count_products_in_category($counter);
	}

  $subcat_li_class = $subcat_button = '';
	if (isset($my_foo[$counter]['hassubcat']) && $my_foo[$counter]['hassubcat'] === true) {
		if (BS5_HIDE_EMPTY_CATEGORIES != 'true' || (bs5_count_products_in_category($counter) != $products_in_category)) {
			if ($level < BS5_CATEGORIESMENU_MAXLEVEL || BS5_CATEGORIESMENU_MAXLEVEL == 'false') {
    		$subcat_li_class = ' category_li hassub';
    		$subcat_button = '<button type="button" class="category_button focus-ring p-0" title="'.$title.'" aria-expanded="'.($in_path ? 'true' : 'false').'" data-value="'.($in_path ? ($my_foo[$counter-1]['path'] != '' ? $my_foo[$counter-1]['path'] : 0) : $my_foo[$counter]['path']).'"><i class="fa fa-' . ($in_path ? 'chevron-up' : 'chevron-right') . '"></i></button>';
			}
		}
	}

	if (isset($my_foo[$counter]['name']) && $my_foo[$counter]['name'] != '') {
    	$my_categories_string .= $ul; //UL LI Versschachtelung
		if ((BS5_HIDE_EMPTY_CATEGORIES == 'true' && $products_in_category > 0) || BS5_HIDE_EMPTY_CATEGORIES != 'true') {
			$my_categories_string .= '<li class="nav-item level'.$level.$cat_active.$subcat_li_class.'">';
    	$my_categories_string .= '<a class="nav-link border-bottom'.$cat_active_parent.$cat_active.'" href="'.$my_foo[$counter]['link'].'" title="'.str_replace(array('"', "'"), array('&quot;', '&apos;'), $my_foo[$counter]['name']).'">';

			$sign = '';
			for ($i = 2; $i <= $level; $i++) {
				$sign .= '&rsaquo;';
			}
			if ($sign != '') $my_categories_string .= $sign.' ';

		  $my_categories_string .= $my_foo[$counter]['name'];
		  //Anzeige Anzahl der Produkte in Kategorie, für bessere Performance im Admin deaktivieren
		  if (SHOW_COUNTS == 'true') {
				if ($products_in_category > 0) {
					$my_categories_string .= '<span class="counts small">&nbsp;(' . $products_in_category . ')</span>';
				}
		  }
		  $my_categories_string .= '</a>'.$subcat_button.'</li>';
		}
	}
	//EOF  +++ Kategorie Linkerstellung +++

  //Nächste Kategorie
	if ($my_foo[$counter]['next_id']) {
		xtc_show_category($my_foo[$counter]['next_id'], $level, $my_foo, $my_categories_string, $my_cPath);
  } else {
		$my_categories_string .= '</ul>';
		// Replace empty UL-Tag
		$my_categories_string = preg_replace("/<ul[^>]*>([\n\t]?)*<\\/ul[^>]*>/",'',$my_categories_string);
		return $my_categories_string;
	}
}

function bs5_has_category_subcat($category_id) {
	$child_category_query = "SELECT count(*) as count
								FROM " . TABLE_CATEGORIES . "
								WHERE parent_id = '" . (int)$category_id . "'
								AND categories_status = 1";
	$child_category_query = xtDBquery($child_category_query);
	$child_category = xtc_db_fetch_array($child_category_query,true);

	if ($child_category['count'] > 0) {
		return true;
	} else {
		return false;
	}
}

function bs5_count_products_in_category($category_id, $include_inactive = false) {
	static $products_count_array, $products_in_category_array;

	$active = (($include_inactive === false) ? 0 : 1);

	if (!is_array($products_count_array)) {
		$products_count_array = array();
	}

	if (!is_array($products_in_category_array)) {
		$products_in_category_array = array();
	}

	if (!isset($products_in_category_array[$active])) {
		$categories_query = xtDBquery("SELECT count(*) as total,
                                            p2c.categories_id
                                       FROM ".TABLE_PRODUCTS." p
                                       JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                            ON p.products_id = pd.products_id
                                               AND pd.language_id = '".(int)$_SESSION['languages_id']."'
                                               AND trim(pd.products_name) != ''
                                       JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
                                            ON p2c.products_id = p.products_id
                                      WHERE (p.products_status = '1'".(($include_inactive === true) ? " OR p.products_status = '0'" : '').")
                                            ".PRODUCTS_CONDITIONS_P."
                                   GROUP BY p2c.categories_id");
		if (xtc_db_num_rows($categories_query, true)) {
			while ($categories = xtc_db_fetch_array($categories_query, true)) {
				$products_in_category_array[$active][$categories['categories_id']] = $categories['total'];
			}
		}
	}

	if (!isset($products_count_array[$active][$category_id])) {
		$products_count_array[$active][$category_id] = 0;
		$products_count_array[$active][$category_id] += ((isset($products_in_category_array[$active][$category_id])) ? $products_in_category_array[$active][$category_id] : 0);
	}

	return $products_count_array[$active][$category_id];
}

// Herstellerlinks
function bs5_show_manufacturers() {
	$manufacturers_query = xtDBquery("SELECT m.*,mi.manufacturers_title
																			FROM ".TABLE_MANUFACTURERS." as m
																			JOIN ".TABLE_PRODUCTS." as p 
																						ON m.manufacturers_id = p.manufacturers_id
																							AND p.products_status = '1'
																									".PRODUCTS_CONDITIONS_P."
																				JOIN " . TABLE_MANUFACTURERS_INFO . " mi
																						ON m.manufacturers_id = mi.manufacturers_id
																							AND mi.languages_id = '" . (int)$_SESSION['languages_id'] . "'
																							JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
																						ON p.products_id = pd.products_id
																							AND pd.language_id = '".(int)$_SESSION['languages_id']."'
																							AND trim(pd.products_name) != ''
																			JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c 
																						ON p2c.products_id = pd.products_id
																			JOIN ".TABLE_CATEGORIES." c
																						ON c.categories_id = p2c.categories_id
																							AND c.categories_status = 1
																									".CATEGORIES_CONDITIONS_C."
																			WHERE m.manufacturers_status = 1
																	GROUP BY m.manufacturers_id 
																	ORDER BY m.sort_order, m.manufacturers_name ASC");

	if (xtc_db_num_rows($manufacturers_query, true) > 0) {
		$manufacturers_string = '<ul class="navbar-nav flex-column" style="display: none;">'. "\n";
		while ($manufacturers = xtc_db_fetch_array($manufacturers_query, true)) {
			$name = $manufacturers['manufacturers_title'] != '' ? $manufacturers['manufacturers_title'] : $manufacturers['manufacturers_name'];
			$link = xtc_href_link(FILENAME_DEFAULT, xtc_manufacturer_link($manufacturers['manufacturers_id'],$manufacturers['manufacturers_name']));

			$manufacturers_string .= '<li class="nav-item level2">';
			$manufacturers_string .= '<a class="nav-link border-bottom" href="'.$link.'" title="'. $name . '">&nbsp;&rsaquo;&nbsp;' . $name . '</a>';
			$manufacturers_string .= '</li>';

		}
		$manufacturers_string .= '</ul>'. "\n";
	}
	return $manufacturers_string;
}