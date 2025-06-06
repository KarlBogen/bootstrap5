<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

if (defined('MODULE_BS5_TPL_MANAGER_STATUS') && MODULE_BS5_TPL_MANAGER_STATUS == 'true') {

	// Listenpunkt unter 'Erw. Konfiguration'
$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS5_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs5_tpl_manager_config',   //Eintrag fuer Adminrechte
    'filename' => '',        //Dateiname der neuen Admindatei
    'boxname' => MENU_BS5_TPL_MANAGER_MAIN,     //Anzeigename im Menue
    'parameters' => '',                 //zusaetzliche Parameter z.B. 'set=export'
    'ssl' => '',                         //SSL oder NONSSL, kein Eintrag = NONSSL
    'has_subs' => 1                     //wenn Menueeintrag Unterpunkte hat
  );


$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS5_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs5_tpl_manager_config',
    'filename' => FILENAME_BS5_TPL_MANAGER_CONFIG,
    'boxname' => MENU_BS5_TPL_MANAGER_SUB1,
    'parameters' => '',
    'ssl' => ''
  );

$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS5_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs5_tpl_manager_theme',
    'filename' => FILENAME_BS5_TPL_MANAGER_THEME,
    'boxname' => MENU_BS5_TPL_MANAGER_SUB2,
    'parameters' => '',
    'ssl' => ''
  );

$add_contents[BOX_HEADING_CONFIGURATION2][MENU_BS5_TPL_MANAGER_MAIN][] = array(
    'admin_access_name' => 'bs5_banner_manager',
    'filename' => FILENAME_BS5_BANNER_MANAGER,
    'boxname' => MENU_BS5_TPL_MANAGER_SUB3,
    'parameters' => '',
    'ssl' => ''
  );
}

if (defined('BS5_CUSTOMERS_REMIND') && BS5_CUSTOMERS_REMIND == 'true') {

/* ------------------------------------------------------------
	Module "Kundenerinnerung Modified Shop 3.0.2 mit Opt-in" made by Karl

	Based on: Kundenerinnerung_Multilingual_advanced_modified-shop-1.06
	Based on: xt-module.de customers remind
	erste Anpassung von: Fishnet Services - Gemsjäger 30.03.2012
	Zusatzfunktionen eingefügt sowie Fehler beseitigt von Ralph_84
	Aufgearbeitet für die Modified 1.06 rev4356 von Ralph_84

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

	// Listenpunkt unter 'Kunden'
	$add_contents[BOX_HEADING_CUSTOMERS][BS5_BOX_CUSTOMERS_REMIND][] = array(
    	'admin_access_name' => 'bs5_customers_remind',   //Eintrag fuer Adminrechte
    	'filename' => '',	//Dateiname der neuen Admindatei
    	'boxname' => BS5_BOX_CUSTOMERS_REMIND,     	//Anzeigename im Menue
    	'parameters' => '',                 	//zusaetzliche Parameter z.B. 'set=export'
    	'ssl' => '',                         	//SSL oder NONSSL, kein Eintrag = NONSSL
	    'has_subs' => 1                     //wenn Menueeintrag Unterpunkte hat
  	);

	$add_contents[BOX_HEADING_CUSTOMERS][BS5_BOX_CUSTOMERS_REMIND][] = array(
    	'admin_access_name' => 'bs5_customers_remind',   //Eintrag fuer Adminrechte
    	'filename' => FILENAME_BS5_CUSTOMERS_REMIND,	//Dateiname der neuen Admindatei
    	'boxname' => BS5_BOX_CUSTOMERS_REMIND_SUB1,     	//Anzeigename im Menue
    	'parameters' => '',                 	//zusaetzliche Parameter z.B. 'set=export'
    	'ssl' => ''                         	//SSL oder NONSSL, kein Eintrag = NONSSL
  	);

	$add_contents[BOX_HEADING_CUSTOMERS][BS5_BOX_CUSTOMERS_REMIND][] = array(
    	'admin_access_name' => 'bs5_customers_remind',   //Eintrag fuer Adminrechte
    	'filename' => FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS,	//Dateiname der neuen Admindatei
    	'boxname' => BS5_BOX_CUSTOMERS_REMIND_SUB2,     	//Anzeigename im Menue
    	'parameters' => '',                 	//zusaetzliche Parameter z.B. 'set=export'
    	'ssl' => ''                         	//SSL oder NONSSL, kein Eintrag = NONSSL
  	);

}