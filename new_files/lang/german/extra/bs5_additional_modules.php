<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

define('BS5_CUSTOMERS_REMIND_TITLE' , 'Kundenerinnerung');
define('BS5_NAVBAR_TITLE_CUSTOMERS_REMIND' , 'Kundenerinnerung');
define('BS5_CUSTOMERS_REMIND_NOTE' , 'Artikel zur Zeit nicht auf Lager!');
define('BS5_CUSTOMERS_REMIND_LINK_TEXT', 'Benachrichtigung bei Wiederverf&uuml;gbarkeit');
define('BS5_CUSTOMERS_REMIND_EMAIL_HEADING', 'Kundenerinnerungen bei erneutem Eintreffen von Artikeln');
define('BS5_CUSTOMERS_REMIND_EMAIL_1', 'hat sich f&uuml;r diesen Artikel eingetragen:');

define('BS5_TEXT_EMAIL_SUBJECT_REMINDER','Ihre Kundenerinnerungs-Anmeldung');
define('BS5_TEXT_EMAIL_INPUT_REMINDER','<h1>Bitte beachten!</h1><p>Ihre E-Mail-Adresse wurde in unser System eingetragen.<br><br>Gleichzeitig wurde Ihnen vom System eine E-Mail mit einem Aktivierungslink geschickt.<br><br>Bitte klicken Sie nach dem Erhalt der E-Mail auf den Link, um Ihre Eintragung zu best&auml;tigen.<br>Ansonsten bekommen Sie keine Verf&uuml;gbarkeitsnachricht von uns zugestellt!</p>');
define('BS5_TEXT_EMAIL_DEL_REMINDER','Ihre E-Mail-Adresse wurde aus unserer Datenbank gel&ouml;scht.');
define('BS5_TEXT_EMAIL_ACTIVE_REMINDER','Ihre E-Mail-Adresse wurde erfolgreich f&uuml;r den Empfang der Kundenerinnerung freigeschaltet!');
define('BS5_TEXT_EMAIL_EXIST_NO_REMINDER','<h1>Bitte beachten!</h1><p>Diese E-Mail-Adresse existiert bereits in unserer Datenbank, ist aber noch nicht f&uuml;r den Empfang der Kundenerinnerung freigeschaltet!<br><br>Es wurde Ihnen vom System eine E-Mail mit einem Aktivierungslink geschickt.<br>Bitte klicken Sie nach dem Erhalt der E-Mail auf den Link, um Ihre Eintragung zu best&auml;tigen.<br>Ansonsten bekommen Sie keine Verf&uuml;gbarkeitsnachricht von uns zugestellt!</p>');
define('BS5_TEXT_EMAIL_EXIST_REMINDER','Diese E-Mail-Adresse ist f&uuml;r den Empfang der Kundenerinnerung bereits freigeschaltet!');

define('BS5_CONTACT_SUBJECT_0', '-- Bitte w&auml;hlen -- ');
define('BS5_CONTACT_SUBJECT_4', 'Preisanfrage');
define('BS5_TEXT_PRODUCTS_CHEAPLY', 'Billiger gesehen?');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NAME', 'Artikelname: ');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NUMBER', 'Art-Nr.: ');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NOTE', 'Ich interessiere mich für den Artikel: ');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NOTE2', 'Jedoch habe ich diesen Artikel zu einem günstigen Preis bei einem Ihrer Mitbewerber gesehen. Bitte teilen Sie mir mit, ob Sie den oben genanten Artikel unterbieten können.');
define('BS5_ENTRY_COMPETITORURL_CHECK_ERROR', 'Bitte geben Sie die Mitbewerber-URL ein!');
define('BS5_ENTRY_COMPETITORURL_VALIDATION_ERROR', 'Die Mitbewerber-URL ist keine valide URL!');
define('BS5_ENTRY_COMPETITORPRICE_CHECK_ERROR', 'Bitte geben Sie den Mitbewerber-Preis ein!');
define('BS5_NAVBAR_TITLE_CHEAPLY_SEE','Billiger gesehen');
define('BS5_CHEAPLY_SEE_HEADING_FORMULAR','Preisanfrage Formular');
define('BS5_CHEAPLY_SEE_TO_PRODUCT', 'Zum Produkt');
define('BS5_ENTRY_VVCODE_CHECK_ERROR', 'Bitte geben Sie den Spamschutzcode ein!');
define('BS5_EMAIL', 'E-Mail: ');
define('BS5_PHONE', 'Telefon: ');
define('BS5_COMPETITORURL', 'Mitbewerber-URL: ');
define('BS5_COMPETITORPRICE', 'Mitbewerber-Preis: ');
define('BS5_SUBJECT', 'Betreff: ');

define('BS5_TEXT_PRODUCT_INQUIRY', 'Frage zum Artikel');
define('BS5_ENTRY_MESSAGE_BODY_ERROR', 'Bitte geben Sie die Nachricht an uns ein!');

define('BS5_TOGGLE_PWFIELD_SHOW', 'Passwort anzeigen');
define('BS5_TOGGLE_PWFIELD_HIDE', 'Passwort verbergen');

//BOF - modulfux_attributes_default
define('BS5_MODULFUX_PULL_DOWN_DEFAULT', 'Bitte w&auml;hlen');
define('BS5_MODULFUX_ERROR', 'Fehler');
define('BS5_MODULFUX_ATTRIBUTES_ERROR', 'Bitte w&auml;hlen sie alle Optionen!');
//EOF - modulfux_attributes_default

/*
 * --------------------------------------------------------------------------
 * @file      web0null_attribute_price_updater.php
 * @date      18.10.17
 *
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
//BOF - web0null_attribute_price_updater
define('BS5_TEXT_PRODUCTS_VPE', 'VPE');
define('BS5_TEXT_ATTRIBUTE_PRICE_UPDATER_A', 'In dieser Ausf&uuml;hrung:');
define('BS5_TEXT_ATTRIBUTE_PRICE_UPDATER_B', 'Preis/Artikel');
define('BS5_TXT_ONLY', '<span class="small_price">Jetzt nur</span> ');
define('BS5_TXT_INSTEAD', '<span class="small_price">Unser bisheriger Preis</span> ');
define('BS5_TXT_CHOOSE_ATTR', 'alle Attribute m&uuml;ssen gew&auml;hlt sein');
//EOF - web0null_attribute_price_updater

/* ----------------------------------------------------------------------------------------------------
   Module:    Rezensionsaufgliederung nach vergebenen Sternen (rev. awidsRatingBreakdown_v1.1_20200210)
   Date:      2020-02-10
   Author:    awids
   --------------------------------------------------------------------------------------------------*/

define('BS5_AWIDSRATINGBREAKDOWN_ARROW_TITLE', 'Bewertung nach vergebenen Sternen');
define('BS5_AWIDSRATINGBREAKDOWN_DATE', '<strong>Datum:</strong>');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE1', 'Bewertungen mit 1 Stern');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE2', 'Bewertungen mit %s Sternen');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE3', 'Alle %s Bewertungen');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_ALL', 'Alle');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_1', '1 Stern');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_2', '2 Sterne');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_3', '3 Sterne');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_4', '4 Sterne');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_5', '5 Sterne');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE', 'Bewertung: %s von 5 ');
define('BS5_AWIDSRATINGBREAKDOWN_MY_LANG', 'nur meine Sprache anzeigen');
define('BS5_AWIDSRATINGBREAKDOWN_ALL_LANGS', 'alle Sprachen anzeigen');

/* ------------------------------------------------------------------------------------------------------------------
   CSS Produkt- & Attributlagerampel v1.0(2017-04-22)

   Authors:
   -------------------
     awids (www.awids.de)
     web28 (www.rpa-com.de)
     noRiddle (www.revilonetz.de)

   ----------------------------------------------------------------------------------------------------------------*/

define('BS5_MODULE_TRAFFIC_LIGHTS_STOCK','Bestand');
define('BS5_MODULE_TRAFFIC_LIGHTS_QTY_RED','nicht auf Lager');
define('BS5_MODULE_TRAFFIC_LIGHTS_QTY_YELL','wenige auf Lager');
define('BS5_MODULE_TRAFFIC_LIGHTS_QTY_GREEN','auf Lager');

/* Metatags für Angebote und Neue Artikel
	- werden von Modified nicht bereitgestellt, aber von Lighthouse als SEO-Mangel erkannt
	Keywords kommagetrennt erfassen
*/
define('BS5_METATAG_SPECIALS_DESC','Unsere Top-Angebote und alle aktuellen Aktionen, Schn&auml;ppchen und sonstigen Angebote.');
define('BS5_METATAG_SPECIALS_KEYWORDS','Angebote, Aktionen, Schn&auml;ppchen');
define('BS5_METATAG_NEWPRODS_DESC','Neue Artikel und eben eingetroffene Produkte die sie interessieren k&ouml;nnten.');
define('BS5_METATAG_NEWPRODS_KEYWORDS','Neu, Aktuell, News');

define('BS5_PAGINATION_LABEL', 'Seitennavigation');
define('BS5_PAGINATION_SCROLLTOP', 'Zum ersten Artikel scrollen');
define('BS5_PAGINATION_SCROLLBOTTOM', 'Zum letzten Artikel scrollen');
define('BS5_SHOW_MORE_CATEGORIES', 'Unterkategorien anzeigen!');