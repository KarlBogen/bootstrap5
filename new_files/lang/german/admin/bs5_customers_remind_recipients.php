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

  define('HEADING_TITLE', 'Kundenerinnerungen Empf&auml;nger');

  define('TABLE_HEADING_EMAIL', 'E-Mail Adresse');
  define('TABLE_HEADING_FIRSTNAME', 'Vorname');
  define('TABLE_HEADING_LASTNAME', 'Nachname');
  define('TABLE_HEADING_CUSTOMERS_STATUS', 'Kundengruppe');
  define('TABLE_HEADING_STATUS', 'Status');
  define('TABLE_HEADING_ACTION', 'Aktion');
  define('TABLE_HEADING_DATE_ADDED', 'Hinzugef&uuml;gt');
  
  define('ENTRY_MAIL_STATUS', 'Status:');
  define('ENTRY_SEARCH_CUSTOMER', 'Suche:');

  define('TXT_SUBSCRIBED', 'abonniert');
  define('TXT_UNSUBSCRIBED', 'abgemeldet');
  define('TXT_UNCONFIRMED', 'unbest&auml;tigt');

  define('TEXT_INFO_HISTORY_CUSTOMER', 'Historie:');
  define('TEXT_INFO_HISTORY_CUSTOMER_NONE', 'keine Historie verf&uuml;gbar');
  define('TEXT_INFO_HEADING_DELETE_CUSTOMER', 'E-Mail Adresse abmelden');
  define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sicher, dass Sie diese E-Mail Adresse von der Kundenerinnerung abmelden m&ouml;chten?');

  define('BUTTON_UNSUBSCRIBE', 'E-Mail abmelden');
  define('BUTTON_REMIND', 'E-Mail opt-in');

  define('BS5_TEXT_EMAIL_SUBJECT_REMINDER','Ihre Kundenerinnerungs-Anmeldung');
  define('BS5_TEXT_EMAIL_DEL_REMINDER','Die E-Mail-Adresse wurde aus der Kundenerinnerungsdatenbank gel&ouml;scht.');
  define('TEXT_EMAIL_DEL_ERROR','Es ist ein Fehler aufgetreten, die E-Mail-Adresse wurde nicht gel&ouml;scht!');
  define('BS5_TEXT_EMAIL_EXIST_NO_REMINDER', 'Die Opt-in E-Mail wurde erneut versendet.');

  define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS_REMIND_RECIPIENTS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Registrierten Empf&auml;ngern)');
