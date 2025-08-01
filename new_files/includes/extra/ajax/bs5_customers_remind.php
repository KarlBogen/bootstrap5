<?php
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


if (isset($_REQUEST['speed'])) {
  include_once(DIR_FS_CATALOG . 'includes/application_top_callback.php');
  require_once(DIR_FS_INC . 'db_functions_' . DB_MYSQL_TYPE . '.inc.php');
  require_once(DIR_FS_INC . 'db_functions.inc.php');
  require_once(DIR_WS_INCLUDES . 'database_tables.php');
  require_once (DIR_FS_INC.'xtc_date_short.inc.php');

  include_once(DIR_WS_INCLUDES . 'modules/bs5_customers_remind.php');
}


function bs5_customers_remind()
{

  xtc_db_connect() or die('Unable to connect to database server!');

  $prodId = isset($_REQUEST['prodId']) ? $_REQUEST['prodId'] : '';
  $mail = isset($_REQUEST['Mail']) ? $_REQUEST['Mail'] : '';

  sendremindmails($prodId, $mail);

  return true;
}
