<?php
  /* -----------------------------------------------------------------------------------------
   $Id: xtc_show_category.inc.php 12822 2020-07-09 06:24:46Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(categories.php,v 1.23 2002/11/12); www.oscommerce.com
   (c) 2003   nextcommerce (xtc_show_category.inc.php,v 1.4 2003/08/13); www.nextcommerce.org 
   (c) 2010  web28 (xtc_show_category.inc.php, v 2.1 2010/11/12); www.rpa-com.de

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/   

  function xtc_show_category($counter, $oldlevel=1) {
    global $foo, $categories_string, $id, $cPath;

    $level = $foo[$counter]['level']+1;

    //BOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++
    $ul = $tab = '';
    for ($i = 1; $i <= $level; $i++) {
      $tab .= "\t";
    }

    if ($level > $oldlevel) { //neue Unterebene
      $ul = "\n" . $tab. '<ul id="'.$foo[$counter]['id'].'" class="navbar-nav flex-column" data-level="'.$level.'">'. "\n";
      $categories_string = rtrim($categories_string, "\n"); //Zeilenumbruch entfernen
      $categories_string = substr($categories_string, 0, -5);  //letztes  </li>  entfernen
    } elseif ($level < $oldlevel) { //zurück zur höheren Ebene
      $ul = close_ul_tags($level,$oldlevel);
    }
    //EOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++

    //BOF +++ Kategorien markieren +++
    $category_path = explode('_',$cPath); //Kategoriepfad in Array einlesen

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

    // Meine Änderung Zeichen für Kategorie mit Unterkategorie einfügen
    $subcategories_class = $subcategories_button = '';
    if ($foo[$counter]['hassubcat'] == true) {
      if (BS5_HIDE_EMPTY_CATEGORIES != 'true' || (bs5_count_products_in_category($counter) != $products_in_category)) {
        if (($level < BS5_CATEGORIESMENU_MAXLEVEL || BS5_CATEGORIESMENU_MAXLEVEL == 'false')) {
          $subcategories_class = ' category_li';
          $subcategories_button = '<button type="button" class="category_button focus-ring p-0" title="'.BS5_SHOW_MORE_CATEGORIES.'" aria-expanded="'.($in_path ? 'true' : 'false').'" data-value="'.($foo[$counter]['path']).'"><i class="fa fa-' . ($in_path ? 'chevron-up' : 'chevron-right') . '"></i></button>';
        }
        $subcategories_class2 = ' hassub';
      }
    }

    //BOF +++ Kategorie Linkerstellung +++
    if (trim($categories_string == '')) $categories_string = "\n"; //Zeilenschaltung Codedarstellung
    $categories_string .= $ul; //UL LI Versschachtelung
    if ((BS5_HIDE_EMPTY_CATEGORIES == 'true' && $products_in_category > 0) || BS5_HIDE_EMPTY_CATEGORIES != 'true') {
      $categories_string .= $tab; //Tabulator Codedarstellung
      $categories_string .= '<li class="nav-item level'.$level.$subcategories_class.$cat_active.'">';
      $categories_string .= '<a class="nav-link border-bottom'.$cat_active_parent.$cat_active.'" href="'.$foo[$counter]['link'].'" title="'. $foo[$counter]['name'] . '">';
      $sign = '';
      for ($i = 2; $i <= $level; $i++) {
        $space .= '&nbsp;';
        $sign .= '&rsaquo;';
      }
      if ($sign != '') $categories_string .= $space.$sign.'&nbsp;';
      $categories_string .= $foo[$counter]['name'];
      //Anzeige Anzahl der Produkte in Kategorie, für bessere Performance im Admin deaktivieren
      if (SHOW_COUNTS == 'true') {
        if ($products_in_category > 0) {
          $categories_string .= '<span class="counts small">&nbsp;(' . $products_in_category . ')</span>';
        }
      }
      $categories_string .= '</a>'.$subcategories_button.'</li>';
      $categories_string .= "\n"; //Zeilenschaltung Codedarstellung
	  }
    //EOF  +++ Kategorie Linkerstellung +++

    //Nächste Kategorie
    if ($foo[$counter]['next_id']) {
      xtc_show_category($foo[$counter]['next_id'], $level);
    } else {
      if (BS5_MANUFACTURERS_LINK == 'true' && $level == 1) {
        $categories_string .= '<li class="liman nav-item level1 category_li">';
        $categories_string .= '<a class="category_button nav-link border-bottom'. (isset($_GET['manufacturers_id']) ? ' active' : '') .'" role="button" aria-expanded="'.(isset($_GET['manufacturers_id']) ? 'true' : 'false').'" href="javascript:;" data-value="man" title="'. TEXT_FILTER_MANUFACTURERS_LABEL . '">';
        $categories_string .= TEXT_FILTER_MANUFACTURERS_LABEL .'<i class="fa fa-' . (isset($_GET['manufacturers_id']) ? 'chevron-up' : 'chevron-right') . '"></i></a>';
        if (isset($_GET['manufacturers_id'])) $categories_string .= bs5_show_manufacturers();
        $categories_string .= '</li>';
      }
      if ($level > 1) $categories_string .= close_ul_tags(1,$level);
		  // Replace empty UL-Tag
		  $categories_string = preg_replace("/<ul[^>]*>([\n\t]?)*<\\/ul[^>]*>/",'',$categories_string);
		  return;
    }
  }

  // Funktion zählt Unterkategorien nicht mit
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
    $manufacturers_query = xtDBquery("SELECT m.*
                                        FROM ".TABLE_MANUFACTURERS." as m
                                        JOIN ".TABLE_PRODUCTS." as p 
                                             ON m.manufacturers_id = p.manufacturers_id
                                                AND p.products_status = '1'
                                                    ".PRODUCTS_CONDITIONS_P."
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
      $manufacturers_string = '<ul class="navbar-nav flex-column">'. "\n";
      while ($manufacturers = xtc_db_fetch_array($manufacturers_query, true)) {
        $name = $manufacturers['manufacturers_name'];
        $link = xtc_href_link(FILENAME_DEFAULT, xtc_manufacturer_link($manufacturers['manufacturers_id'],$manufacturers['manufacturers_name']));
        $active = ((isset($_GET['manufacturers_id']) && (int)$_GET['manufacturers_id'] == $manufacturers['manufacturers_id']) ? ' active" aria-current="page' : '');

        $manufacturers_string .= '<li class="nav-item level2">';
        $manufacturers_string .= '<a class="nav-link border-bottom'.$active.'" href="'.$link.'" title="'. $name . '">&nbsp;&rsaquo;&nbsp;' . $name . '</a>';
        $manufacturers_string .= '</li>';

      }
      $manufacturers_string .= '</ul>'. "\n";
    }
    return $manufacturers_string;
  }
