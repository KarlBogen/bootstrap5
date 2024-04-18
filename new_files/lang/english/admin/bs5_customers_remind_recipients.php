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

  define('HEADING_TITLE', 'Customers remind recipient');

  define('TABLE_HEADING_EMAIL', 'E-Mail Address');
  define('TABLE_HEADING_FIRSTNAME', 'Firstname');
  define('TABLE_HEADING_LASTNAME', 'Lastname');
  define('TABLE_HEADING_CUSTOMERS_STATUS', 'Customers status');
  define('TABLE_HEADING_STATUS', 'Status');
  define('TABLE_HEADING_ACTION', 'Action');
  define('TABLE_HEADING_DATE_ADDED', 'Added');

  define('ENTRY_MAIL_STATUS', 'Status:');
  define('ENTRY_SEARCH_CUSTOMER', 'Search:');
  
  define('TXT_SUBSCRIBED', 'subscribed');
  define('TXT_UNSUBSCRIBED', 'unsubscribed');
  define('TXT_UNCONFIRMED', 'unconfirmed');

  define('TEXT_INFO_HISTORY_CUSTOMER', 'History:');
  define('TEXT_INFO_HISTORY_CUSTOMER_NONE', 'no history available');
  define('TEXT_INFO_HEADING_DELETE_CUSTOMER', 'E-Mail Address unsubscribe');
  define('TEXT_INFO_DELETE_INTRO', 'Are you sure you want to unsubscribe this e-mail address?');

  define('BUTTON_UNSUBSCRIBE', 'E-Mail unsubscribe');
  define('BUTTON_REMIND', 'E-Mail opt-in');

  define('BS5_TEXT_EMAIL_SUBJECT_REMINDER','Your customers remind subscription');
  define('BS5_TEXT_EMAIL_DEL_REMINDER','E-Mail address was deleted successfully from customers remind database.');
  define('TEXT_EMAIL_DEL_ERROR','An Error occured, E-Mail address has not been removed from database!');
  define('BS5_TEXT_EMAIL_EXIST_NO_REMINDER', 'Opt-in E-Mail sent.');

define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS_REMIND_RECIPIENTS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> registered recipients)');
