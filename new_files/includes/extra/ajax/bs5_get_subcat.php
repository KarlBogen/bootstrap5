<?php
/**
 * $Id: bs5_get_subcat.php by Karl
 *
 * Karl Unterkategorien per Ajax laden
 *
 * Released under the GNU General Public License
 */

if (isset($_REQUEST['speed'])) {

	require_once (DIR_FS_INC.'db_functions_'.DB_MYSQL_TYPE.'.inc.php');
	require_once (DIR_FS_INC.'db_functions.inc.php');
	require_once (DIR_WS_INCLUDES.'database_tables.php');

}

function bs5_get_subcat() {

	xtc_db_connect() or die('Unable to connect to database server!');

	// get Variables
	$my_cPath = $_POST['cPath'];

    require_once (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/xtc_show_category.inc.php');
    require_once (DIR_FS_INC.'xtc_count_products_in_category.inc.php');


    $bs5_categories_string = '';

		$cPath_array = xtc_parse_category_path($my_cPath);
		$level = count($cPath_array) + 1;

    if (isset($cPath_array)
        && is_array($cPath_array)
        )
    {
      $new_cPath_array = $cPath_array;
      array_unshift($new_cPath_array, 0);

      $reverse_cPath_array = array_reverse($new_cPath_array);
      foreach ($reverse_cPath_array as $categories_id) {
        $category_tree_array = xtc_get_category_tree_array($categories_id, BS5_CATEGORIESMENU_MAXLEVEL, $level);

        if (count($category_tree_array) > 0) break;
        array_pop($new_cPath_array);
      }

      if (count($category_tree_array) > 0) {
        $new_cPath_array = array_filter($new_cPath_array);
        $new_cPath = implode('_', $new_cPath_array);

				if (BS5_MENUCASE == '2') {
					$bs5_categories_string .= '<ul class="dropdown-menu" data-level="'.$level.'">';
				} else {
					$bs5_categories_string .= '<div class="row row-cols-1 row-cols-lg-3 p-2 kk-mega" data-level="2" style="display:none;">';
				}

				// Show all
				if (BS5_MENUCASE == '1') {
					$my_link = xtc_href_link(FILENAME_DEFAULT, 'cPath='.$my_cPath, 'NONSSL');;
					$my_title = $_POST['title'];
					$bs5_categories_string .= $tab.'<div class="overview border-bottom w-100 pb-2 mb-2">';
					$bs5_categories_string .= '<a class="btn btn-outline-secondary" href="'.$my_link.'" title="'.encode_htmlentities($my_title).'">';
					$bs5_categories_string .= '<span class="small">' . TEXT_SHOW_CATEGORY . '</span><strong>  ' . $my_title;
					$bs5_categories_string .= '</strong><i class="fa fa-circle-right ms-3"></i></a>';
					$bs5_categories_string .= '</div>';
				}
				if (BS5_MENUCASE == '2') {
					$my_link = xtc_href_link(FILENAME_DEFAULT, 'cPath='.$my_cPath, 'NONSSL');;
					$my_title = $_POST['title'];
         	$bs5_categories_string .= $tab.'<li class="overview level'.($level + 1).$cat_active.'">';
         	$bs5_categories_string .= '<a class="dropdown-item" href="'.$my_link.'" title="'.encode_htmlentities($my_title).'">';
         	$bs5_categories_string .= '<i class="fa fa-circle-right me-2"></i><span class="small">' . TEXT_SHOW_CATEGORY . '</span><br />' . $my_title;
         	$bs5_categories_string .= '</a>';
         	$bs5_categories_string .= '</li><li><hr class="dropdown-divider"></li>';
				}

        $bs5_categories_string .= bs5_xtc_show_category($categories_id, $new_cPath, $category_tree_array);
				if (BS5_MENUCASE == '2') {
					$bs5_categories_string .= '</ul>';
				} else {
					$bs5_categories_string .= '</div>';
				}
      }
    }
		return $bs5_categories_string;
	}

  function bs5_xtc_show_category($parent_id = 0, $path = '', $category_tree_array = array()) {
    global $bs5_categories_string;

		$fPath = $_POST['fpath'];
		$func = $_POST['func'];

    $li_class_mega = $li_class_hassub_mega = $a_class_mega = $a_class_hassub_mega = '';

    foreach ($category_tree_array[$parent_id] as $categories) {
      if (mod_count_products_in_category($categories['id']) > 0) {
        $level = $categories['level'];
        $tab = str_repeat("\t", $level);
        $category_path = explode('_', $fPath);
        $link_path = $path . (($path != '') ? '_' : '') . $categories['id'];
        $link = xtc_href_link(FILENAME_DEFAULT, 'cPath='.$link_path, 'NONSSL');

        $cat_active = $btn_role = '';
        if (end($category_path) == $categories['id']) {
          // Selected for mmenulight
          $cat_active = " Selected active";
        }
        elseif (in_array($categories['id'], $category_path)) {
          $cat_active = " active parent";
        }

        // mark subs
        $hasSubs = $hasSubsClass = '';
        defined('CATEGORIES_CHECK_SUBS') OR define('CATEGORIES_CHECK_SUBS', true);

        if (defined('CATEGORIES_CHECK_SUBS') && (CATEGORIES_CHECK_SUBS == true)) {
	        if ($func == 'main' && $level > 1) {
      			$a_class_mega = "dropdown-item";
						$li_class_hassub_mega = " dropdown";
						$a_class_hassub_mega = " dropdown-toggle";
	        }
	        if ($func == 'mega' && $level > 1) {
      			$li_class_mega = " nav-item kk-mega";
      			$a_class_mega = "nav-link py-1";
						$li_class_hassub_mega = " hassub";
	        }
					else {
	          require_once (DIR_FS_INC . 'xtc_has_category_subcategories.inc.php');
	          $tmpCheck = xtc_has_category_subcategories($categories['id']);
	          if ($tmpCheck) {
	            $hasSubs = $li_class_hassub_mega;
	            $hasSubsClass = $a_class_hassub_mega;
            	if ($func == 'main') $btn_role = '#" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false';
	          }
					}
        }

				$bs5_categories_string .= ($func == 'mega' && $level == 2) ? $tab.'<ul class="navbar-nav flex-column col" data-level="'.$level.'">' : '';

        $bs5_categories_string .= $tab.'<li id="li'.$categories['id'].'" class="level'.$level.$cat_active.$hasSubs.$li_class_mega.'">';
       	$bs5_categories_string .= '<a class="'.$a_class_mega.$cat_active.$hasSubsClass.'" href="'.($href = $btn_role != '' ? $btn_role : $link).'" title="'.encode_htmlentities($categories['name']).'" data-value="'.$categories['id'].'">';

				if ($func == 'mega'){
					$sign = '';
			    $sign = str_repeat('&rsaquo;', $level-2);
				  $bs5_categories_string .= $sign.' ';
				}

        $bs5_categories_string .= $categories['name'];
        /* if ($level == 1) {
          if ($hasSubs != '') {
            $bs5_categories_string .= '<span class="sub_cats_arrow"></span>';
          }
        } */

        if (SHOW_COUNTS == 'true') {
          $products_in_category = xtc_count_products_in_category($categories['id']);
          if ($products_in_category > 0) {
            $bs5_categories_string .= '<span class="counts small"> (' . $products_in_category . ')</span>';
          }
        }

        $bs5_categories_string .= '</a>';
        if (isset($category_tree_array[$categories['id']])) {
          if (xtc_count_products_in_category_array($categories['id'], $category_tree_array) > 0) {
            $bs5_categories_string .= "\n";
            bs5_xtc_show_sub_category($level, true);

            // show all
						if (BS5_MENUCASE == '2') {
            	$bs5_categories_string .= $tab.'<li class="overview level'.($level + 1).$cat_active.'">';
            	$bs5_categories_string .= '<a class="dropdown-item" href="'.$link.'" title="'.encode_htmlentities($categories['name']).'">';
            	$bs5_categories_string .= '<i class="fa fa-circle-right me-2"></i><span class="small">' . TEXT_SHOW_CATEGORY . '</span><br/>' . $categories['name'];
            	$bs5_categories_string .= '</a>';
            	$bs5_categories_string .= '</li><li><hr class="dropdown-divider"></li>';
						}

            $bs5_categories_string .= "\n";
            bs5_xtc_show_category($categories['id'], $link_path, $category_tree_array);
            bs5_xtc_show_sub_category($level, false);
            $bs5_categories_string .= "\n".$tab;
          }
        }
        $bs5_categories_string .= '</li>';
        $bs5_categories_string .= "\n";
				$bs5_categories_string .= ($func == 'mega' && $level == 2) ? $tab.'</ul>'."\n" : '';
      }
    }
		return $bs5_categories_string;
  }

  function bs5_xtc_show_sub_category($level, $open = true) {
    global $bs5_categories_string, $tab;

    // 1 = Megamenu, 2 = Dropdown
    switch (BS5_MENUCASE) {
      case '1':
        /* if ($open === true) {
            $bs5_categories_string .= $tab.'<ul data-level="'.$level.'">';
        } else {
            $bs5_categories_string .= '</ul>';
        } */
        break;

      case '2':
        if ($open === true) {
          $bs5_categories_string .= $tab.'<ul class="dropdown-menu" data-level="'.($level+1).'">';
        } else {
          $bs5_categories_string .= $tab.'</ul>';
        }
        break;

      default:
        if ($open === true) {
          $bs5_categories_string .= $tab.'<ul>';
        } else {
          $bs5_categories_string .= $tab.'</ul>';
        }
        break;
    }
  }
