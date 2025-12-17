<?php
/* -----------------------------------------------------------------------------------------
	$Id: config.php 14256 2022-04-01 14:43:10Z Tomcraft $

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Copyright (c) 2009 - 2013 [www.modified-shop.org]
	-----------------------------------------------------------------------------------------
	Released under the GNU General Public License
	---------------------------------------------------------------------------------------*/

/*
	*  template specific defines
	*/

// laden der config, falls Systemmodul deaktiviert

// Topleiste
defined('BS5_SHOW_TOP1') or define('BS5_SHOW_TOP1', 'true'); // Soll Top1 angezeigt werden? anzeigen = true, ansonsten false
defined('BS5_SHOW_TOP2') or define('BS5_SHOW_TOP2', 'true'); // Hinweis: In der Topleiste können vier Spalteneinträge angezeigt werden. Damit diese Spalten auch mehrsprachig genutzt werden können, sind die Texte in eine Sprachdatei ausgelagert. Die Texte können in der Datei "templates/bootstrap5/lang/lang_german.custom" geändert werden (Englisch -> "lang_english.custom").
defined('BS5_SHOW_TOP3') or define('BS5_SHOW_TOP3', 'true');
defined('BS5_SHOW_TOP4') or define('BS5_SHOW_TOP4', 'true');
// Javascript im Browser deaktiviert
defined('BS5_SHOW_JS_DISABLED') or define('BS5_SHOW_JS_DISABLED', 'true'); // Hinweis anzeigen = true, ansonsten false
// logo
defined('BS5_SHOP_LOGO') or define('BS5_SHOP_LOGO', 'img/logo_head.png'); // Dieses Logo wird im Template gezeigt z.B. shoproot/templates/bootstrap5/img/logo_head.png -> 'img/logo_head.png'
// Icon-Leiste
defined('BS5_SHOW_ICON_WITH_NAMES') or define('BS5_SHOW_ICON_WITH_NAMES', 'true'); // Soll auf breiten Bildschirmen der Name zum Icon angezeigt werden? - anzeigen = true, ansonsten false

// Superfishmenü
defined('BS5_MENUCASE') or define('BS5_MENUCASE', 1);   // Menu - 1 = Megamenu, 2 = Dropdown
defined('BS5_SHOW_HOMEBUTTON_IN_TOPCATMENU') or define('BS5_SHOW_HOMEBUTTON_IN_TOPCATMENU', 'true'); // true zeigt den Button / false zeigt ihn nicht
defined('BS5_ADD_LINK_IN_TOPCATMENU_LAST') or define('BS5_ADD_LINK_IN_TOPCATMENU_LAST', ''); 	// Zusätzliche Links im Menü z.B. 'https://www.mein_shop.com/shop_content.php?coID=3|Service,https://www.modified-shop.org|Modified'.
// Für Mehrsprachigkeit wird z.B. 'https://www.example.com|BS5_Linktext' eingetragen - wichtig ist das "BS5_" am Beginn!
// Zusätzlich muss in der Datei "templates/bootstrap5/lang/lang_german.custom" eine Sprachvariable angelegt werden - BS5_Linktext = 'Mein Link'
// KK-Megamenü
defined('BS5_KK_MEGAS') or define('BS5_KK_MEGAS', ''); // Standard "" - falls gewünscht, hier die Kategorien und Anzahl der Reihen gem. den Beispielen eintragen
/*
	Beispiele KK-Megamenü:

	Alle Kategorien sollen als Mega-Menü mit 3 Spalten dargestellt werden.
	defined('BS5_KK_MEGAS') or define('BS5_KK_MEGAS', 'main-3');
	Eingetragen wird die ID der Navbar 'main', dahinter die Anzahl der Spalten.
	Alle Kategorien sollen als Mega-Menü mit 3 Spalten dargestellt werden, ab dem 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingefügt werden.
	defined('BS5_KK_MEGAS') or define('BS5_KK_MEGAS', 'main-3-5');
	Eingetragen wird die ID der Navbar 'main', dahinter die Anzahl der Spalten und die Stelle an der der Link eingefügt werden soll.

	Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Menü dargestellt werden.
	defined('BS5_KK_MEGAS') or define('BS5_KK_MEGAS', 'li5-3,li22-4');
	Eingetragen werden die ID's der Kategorienlinks 'li5' und 'li22' - die Schreibweise ist hier wichtig, dahinter die Anzahl der Spalten.
	Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Menü dargestellt werden, ab dem 4. bzw. 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingefügt werden.
	defined('BS5_KK_MEGAS') or define('BS5_KK_MEGAS', 'li5-3-4,li22-4-5');
	Eingetragen werden die ID's der Kategorienlinks 'li5' und 'li22' - die Schreibweise ist hier wichtig, dahinter die Anzahl der Spalten.

	 */
// Ende KK-Megamenü

// categories - das Modified Standardmenü
defined('BS5_CATEGORIESMENU_MAXLEVEL') or define('BS5_CATEGORIESMENU_MAXLEVEL', 'false'); // Bis zu welcher Ebene soll der Kategorien-Baum standardmäßig aufklapptbar sein? // false, wenn er komplett ausgeklappt sein soll, ansonsten eine Zahl.
// gilt für alle Menüs
defined('BS5_MANUFACTURERS_LINK') or define('BS5_MANUFACTURERS_LINK', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_SPECIALS_CATEGORIES') or define('BS5_SPECIALS_CATEGORIES', 'true'); // 'true' zeigt den Link "Angebote" im Kategoriebaum / 'false' zeigt die "Angebote" als separate Box
defined('BS5_WHATSNEW_CATEGORIES') or define('BS5_WHATSNEW_CATEGORIES', 'true'); // 'true' zeigt den Link "Neue Artikel" im Kategoriebaum / 'false' zeigt die "Neue Artikel" als separate Box
defined('BS5_WHATSNEW_SPECIALS_UPPERCASE') or define('BS5_WHATSNEW_SPECIALS_UPPERCASE', 'true'); // Links "Angebote" und "Neue Artikel" in GROßBUCHSTABEN anzeigen = true, ansonsten false
defined('BS5_HIDE_EMPTY_CATEGORIES') or define('BS5_HIDE_EMPTY_CATEGORIES', 'false'); // Leere Kategorien ausblenden? - ausblenden = true, ansonsten false
defined('BS5_CATEGORIESMENU_AJAX_SCROLL') or define('BS5_CATEGORIESMENU_AJAX_SCROLL', 'false'); // Kategoriemenü bei Klick nach oben scrollen = true, ansonsten false

// Karusellslider
defined('BS5_CAROUSEL_SHOW') or define('BS5_CAROUSEL_SHOW', 'shop'); // Bilderslider auf Startseite / nicht anzeigen = 'false', Bildschirmbreite = 'screen', Shopbreite = 'shop'
defined('BS5_CAROUSEL_FADE') or define('BS5_CAROUSEL_FADE', 'true'); // Fadeeffekt = true, Slideeffekt = false
defined('BS5_CAROUSEL_TITLE') or define('BS5_CAROUSEL_TITLE', 'true'); // "Titel des Banners" bzw. der "Bild Titel" links unten angezeigen = true, Slideeffekt = false
// Top-Artikel als Slider anzeigen
defined('BS5_TOP_PROD_IN_SLIDER') or define('BS5_TOP_PROD_IN_SLIDER', 'true'); // Top-Artikel können auch als Slider angezeigt werden - anzeigen = true, ansonsten false
// Banner
defined('BS5_BANNER_TITLE') or define('BS5_BANNER_TITLE', 'true'); // "Titel des Banners" bzw. der "Bild Titel" links unten angezeigen = true, Slideeffekt = false

// Produktdetailansicht
defined('BS5_PROD_DETAIL_MI_AS_SLIDER') or define('BS5_PROD_DETAIL_MI_AS_SLIDER', 'false'); // 'true' zeigt die kleinen Produktbilder als Slider
defined('BS5_PROD_DETAIL_SHOW_MANUIMAGE') or define('BS5_PROD_DETAIL_SHOW_MANUIMAGE', 'true'); // 'true' zeigt Herstellerbild / 'false' zeigt Herstellerbild nicht

defined('BS5_PROD_LIST_BOX') or define('BS5_PROD_LIST_BOX', 'true'); // 'true' zeigt Artikel in Kategorie-Navigation (product_listing) als Box-Ansicht / 'false' zeigt Listen-Ansicht
defined('BS5_PRODUCT_INFO_BOX') or define('BS5_PRODUCT_INFO_BOX', 'true'); // 'true' zeigt Cross-Selling-, Reverse-Cross-Selling- & Also-Purchased-Artikel auf Artikel-Detailseite als Box-Ansicht / 'false' zeigt als Listen-Ansicht

// Animationen
defined('BS5_USE_SCROLL_ENTRANCE_JS') or define('BS5_USE_SCROLL_ENTRANCE_JS', 'false'); // 'true' einzelne Abschnitte werden animiert sobald sie in den sichtbaren Bereich kommen
defined('BS5_SCALE_IMGAGES_ON_HOVER') or define('BS5_SCALE_IMGAGES_ON_HOVER', 'false'); // 'true' Bilder werden beim Überfahren mit der Maus leicht skaliert / vergrößert
// Flag "Neu", "TOP" und "Sonderangebot"
defined('BS5_FLAG_NEW_SHOW') or define('BS5_FLAG_NEW_SHOW', 'true'); // true zeigt das Flag / false zeigt es nicht
defined('BS5_FLAG_TOP_SHOW') or define('BS5_FLAG_TOP_SHOW', 'true'); // true zeigt das Flag / false zeigt es nicht
defined('BS5_FLAG_SPECIAL_SHOW') or define('BS5_FLAG_SPECIAL_SHOW', 'true'); // true zeigt das Flag / false zeigt es nicht
defined('BS5_FLAG_PERCENT_SHOW') or define('BS5_FLAG_PERCENT_SHOW', 'true'); // true zeigt die Prozentzahl / false zeigt sie nicht
// Erweiterte Validation im Registrierungsformular - Fehlermeldungen werden direkt unter dem entsprechendem Eingabefeld angezeigt
defined('BS5_ADVANCED_VALIDATION') or define('BS5_ADVANCED_VALIDATION', 'true'); // benutzen = true, ansonsten false
// VIEWERJS
defined('BS5_USE_VIEWERJS') or define('BS5_USE_VIEWERJS', 'true'); // VIEWERJS-Bildbetrachter in der Produkt-Info-Ansicht verwenden = true, ansonsten false
// Filterfarbe, wenn aktiv
defined('BS5_FILTERCOLOR_AKTIV') or define('BS5_FILTERCOLOR_AKTIV', 'primary'); // primary, secondary, success, danger, warning, info, light oder dark
defined('BS5_FILTERBORDERCOLOR_AKTIV') or define('BS5_FILTERBORDERCOLOR_AKTIV', 'primary'); // primary, secondary, success, danger, warning, info, light oder dark
// Suchfeld, einreihig oder zweireihig
defined('BS5_SEARCHFIELD_ONE_ROW') or define('BS5_SEARCHFIELD_ONE_ROW', 'true'); // true einreihig / false zweireihig
// Artikelname in Produktboxen kürzen
defined('BS5_PRODBOX_NAME_LINES') or define('BS5_PRODBOX_NAME_LINES', 0); // Anzahl der Zeilen, die der Artikelname in allen Produktboxen maximal belegen soll (0 = auto)

// default classes
defined('BS5_THEME') or define('BS5_THEME', ''); // BS Themes , mögliche Werte '','default','blue','bluepure','darkblue','darkcyan','darkgreen','darkmagenta','darkred','gold','green','orange','red'
defined('BS5_TOP1_BG') or define('BS5_TOP1_BG', 'bg-body-tertiary');
defined('BS5_TOP1_TEXT') or define('BS5_TOP1_TEXT', 'text-body-secondary');
defined('BS5_LOGOBAR_TEXT') or define('BS5_LOGOBAR_TEXT', 'text-secondary-emphasis');
defined('BS5_TOP2_NAVBAR') or define('BS5_TOP2_NAVBAR', '');
defined('BS5_TOP2_BG') or define('BS5_TOP2_BG', 'body-tertiary');
defined('BS5_FOOTER_NAVBAR') or define('BS5_FOOTER_NAVBAR', '');
defined('BS5_FOOTER_BG') or define('BS5_FOOTER_BG', 'bg-body-tertiary');

// Module
defined('BS5_CUSTOMERS_REMIND') or define('BS5_CUSTOMERS_REMIND', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
/* Modul "Kundererinnerung" aktivieren!
		Hinweis:
		Dieses Modul bietet Ihren angemeldeten Kunden die Möglichkeit, sich eine Erinnerungs-E-Mail schicken zu lassen, sobald ein Artikel wieder auf Lager ist.
		Sobald ein Artikel nicht mehr auf Lager ist, erscheint auf der Produktdetail-Seite ein Button, womit der Kunde sich in die Erinnerungsliste eintragen kann.
		Die Erinnerungsliste finden Sie im Adminbereich unter "Kunden -> Kundenerinnerungen".
		Ist ein Artikel (in ausreichender Anzahl) wieder auf Lager, bekommt der Kunde automatisch eine Erinnerungsmail mit einem Link, der direkt zum Produkt im Shop führt.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=12813.0 */
defined('BS5_CUSTOMERS_REMIND_SENDMAIL') or define('BS5_CUSTOMERS_REMIND_SENDMAIL', 'false'); // 'true' = E-Mail an den Shopbetreiber (Kontakt - E-Mail-Adresse) senden, wenn sich ein Kunde in die Erinnerungsliste einträgt?
defined('BS5_CHEAPLY_SEE') or define('BS5_CHEAPLY_SEE', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_CHEAPLY_SEE_CONTENT_GROUP') or define('BS5_CHEAPLY_SEE_CONTENT_GROUP', '16'); // '' = es wird kein Content angezeigt / Group ID aus Content Manager eintragen
/* Modul "Billiger gesehen" aktivieren und den Link in der Produktdetailansicht anzeigen!
		Hinweis:
		Der im oberen Bereich angezeigte Text kann im Content Manager geändert werden!
		Link zum Originalmodul: http://www.xtc-load.de/2009/02/billiger-gesehen-by-southbridgede */
defined('BS5_PRODUCT_INQUIRY') or define('BS5_PRODUCT_INQUIRY', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_PRODUCT_INQUIRY_CONTENT_GROUP') or define('BS5_PRODUCT_INQUIRY_CONTENT_GROUP', '15'); // '' = es wird kein Content angezeigt / Group ID aus Content Manager eintragen
/* Modul "Frage zum Artikel" aktivieren und den Link in der Produktdetailansicht anzeigen!
		Hinweis:
		Der im oberen Bereich angezeigte Text kann im Content Manager geändert werden!
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=2153.0 */
defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT') or define('BS5_MODULFUX_ATTRIBUTES_DEFAULT', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT_TABLE') or define('BS5_MODULFUX_ATTRIBUTES_DEFAULT_TABLE', 'false'); // "Bitte wählen" Templatevorlage table - 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT_TABLE_CHECKED') or define('BS5_MODULFUX_ATTRIBUTES_DEFAULT_TABLE_CHECKED', 'false'); // Vorauswahl erste Option Templatevorlage table - 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT_RADIO') or define('BS5_MODULFUX_ATTRIBUTES_DEFAULT_RADIO', 'false'); // "Bitte wählen" Templatevorlage button - 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_MODULFUX_ATTRIBUTES_DEFAULT_RADIO_CHECKED') or define('BS5_MODULFUX_ATTRIBUTES_DEFAULT_RADIO_CHECKED', 'false'); // Vorauswahl erste Option Templatevorlage button - 'false' = deaktiviert / 'true' = aktiviert
/* Modul "Bitte wählen" aktivieren!
		Hinweis:
		Modul "Attributauswahl als Pflichtfeld und vorbelegt mit (Bitte wählen)" aktivieren!
		Es handelt sich hier um das Modul MODULE_MODULFUX_ATTRIBUTES_DEFAULT.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=38117.0 */
defined('BS5_ATTR_PRICE_UPDATER') or define('BS5_ATTR_PRICE_UPDATER', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_ATTR_PRICE_UPDATER_UPDATE_PRICE') or define('BS5_ATTR_PRICE_UPDATER_UPDATE_PRICE', 'true'); // der Artikelpreis wird automatisch angepasst - 'false' = deaktiviert / 'true' = aktiviert
/* Modul "Automatische Preisberechnung" aktivieren!
		Hinweis:
		Aufpreispflichtige Optionen/Attribute werden automatisch zum Artikelpreis hinzugerechnet.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=20125.0 */
defined('BS5_AGI_REDUCE_CART') or define('BS5_AGI_REDUCE_CART', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
/* Modul "AGI: Anzahl im Warenkorb reduzieren" aktivieren!
		Hinweis:
		Das Modul reduziert die Anzahl eines Artikels im Warenkorb auf die maximal verfügbare Menge, wenn eine größere Anzahl bestellt werden sollte. Der Kunde wird direkt über die Anpassung informiert und muss die passende Anzahl nicht durch probieren herausfinden
		© andreas-guder.de.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=40416.0 */
defined('BS5_AGI_REDUCE_CART_SHOW_AVAILABLE') or define('BS5_AGI_REDUCE_CART_SHOW_AVAILABLE', 'false'); // 'false' = nein / 'true' = ja / Anzahl im Warenkorb anzeigen? Zeigt dem Kunden an, welche Anzahl er ursprünglich wollte, und auf welche Anzahl reduziert wurde.
/* Modul "Rezensionsaufgliederung nach vergebenen Sternen" aktivieren!
		Hinweis:
		Dieses Modul gliedert die vergebenen Bewertungen je Sterne-Anzahl in einzelne Progress-Bars auf, sodass der Kunde mit einem Blick erkennen kann, welche Bewertungen am häufigsten vergeben wurden.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=40793.0 */
defined('BS5_AWIDSRATINGBREAKDOWN') or define('BS5_AWIDSRATINGBREAKDOWN', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_AWIDSRATINGBREAKDOWN_PRODLIST') or define('BS5_AWIDSRATINGBREAKDOWN_PRODLIST', 'true'); // Modul auch in Produktlisten anzeigen? 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS') or define('BS5_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS', 'true'); // Sterne auch ohne gespeicherte Bewertung anzeigen? 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_AWIDSRATINGBREAKDOWN_URL') or define('BS5_AWIDSRATINGBREAKDOWN_URL', 'true'); // Filter-PopUp aktivieren? Diese Einstellung ermöglicht es, die Bewertungen in einem PopUp anzuzeigen und nach Anzahl der vergebenen Sterne zu filtern. - 'false' = deaktiviert / 'true' = aktiviert
/* Modul "CSS Produkt- & Attributlagerampel" aktivieren!
		Hinweis:
		Dieses Modul zeigt eine Produkt- und Attribut-Lagerampel, welche wahlweise eine grafische Lagerampel oder den Lagerbestand als Text abbildet.
		Link zum Originalmodul: https://www.modified-shop.org/forum/index.php?topic=37371.0 */
defined('BS5_TRAFFIC_LIGHTS') or define('BS5_TRAFFIC_LIGHTS', 'false'); // 'false' = deaktiviert / 'true' = aktiviert
defined('BS5_TRAFFIC_LIGHTS_PRODLISTING') or define('BS5_TRAFFIC_LIGHTS_PRODLISTING', 'false'); // Anzeige im Listing 'false' = nicht anzeigen, 'l' = light, 'ls' = light and stock, 'lt' = light and text, 'lts' = light and text and stock, 't' = text, 'ts' = text and stock
defined('BS5_TRAFFIC_LIGHTS_PRODINFO') or define('BS5_TRAFFIC_LIGHTS_PRODINFO', 'false'); // Anzeige Produktdetailseite 'false' = nicht anzeigen, 'l' = light, 'ls' = light and stock, 'lt' = light and text, 'lts' = light and text and stock, 't' = text, 'ts' = text and stock
defined('BS5_TRAFFIC_LIGHTS_PRODATTRIBUTES') or define('BS5_TRAFFIC_LIGHTS_PRODATTRIBUTES', 'false'); // Anzeige Attribute 'false' = nicht anzeigen, 'l' = light, 'ls' = light and stock, 'lt' = light and text, 'lts' = light and text and stock, 't' = text, 'ts' = text and stock
defined('BS5_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL') or define('BS5_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL', 0); // Minimum-Wert für die gelbe Ampel ein. Dieser Wert und alle Werte darunter werden mit einer roten Ampel versehen.
defined('BS5_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN') or define('BS5_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN', 10); // Wert ab dem eine grüne Ampel anzeigt werden soll. Alle Werte darunter bis zum Minimum-Wert werden mit einer gelben Ampel versehen.

// Boxen auf der Startseite
defined('BS5_STARTPAGE_BOX_GREETING') or define('BS5_STARTPAGE_BOX_GREETING', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_STARTPAGE_SHOW_CATEGORYLIST') or define('BS5_STARTPAGE_SHOW_CATEGORYLIST', 'false'); // Kategorieliste auf Startseite (soll eine Liste der 1. Ebene angezeigt werden)
defined('BS5_STARTPAGE_BOX_WHATSNEW') or define('BS5_STARTPAGE_BOX_WHATSNEW', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_STARTPAGE_BOX_SPECIALS') or define('BS5_STARTPAGE_BOX_SPECIALS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_STARTPAGE_BOX_UPCOME_PRODS') or define('BS5_STARTPAGE_BOX_UPCOME_PRODS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_STARTPAGE_BOX_NEW_PRODS') or define('BS5_STARTPAGE_BOX_NEW_PRODS', 'true'); // Top-Artikel anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_STARTPAGE_BOX_REVIEWS') or define('BS5_STARTPAGE_BOX_REVIEWS', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_STARTPAGE_BOX_BESTSELLER') or define('BS5_STARTPAGE_BOX_BESTSELLER', 'true'); // anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_MANCAROUSEL_SHOW') or define('BS5_MANCAROUSEL_SHOW', 'true'); // Hersteller-Karusell anzeigen = true, ansonsten false
defined('BS5_MANCAROUSEL_NAME_LINES') or define('BS5_MANCAROUSEL_NAME_LINES', 0); // Anzahl der Zeilen, die der Artikelname belegen soll (0 = auto)

// Boxen auf anderen Seiten (nicht Startseite)
defined('BS5_NOT_STARTPAGE_BOX_LAST_VIEWED') or define('BS5_NOT_STARTPAGE_BOX_LAST_VIEWED', 'true'); // Produktinfoseite anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_NOT_STARTPAGE_BOX_SUBCATEGORIES') or define('BS5_NOT_STARTPAGE_BOX_SUBCATEGORIES', 'true'); // Kategorielistingseite anzeigen = 'true', nicht anzeigen = 'false'

// Boxen allgemein
defined('BS5_MAX_PRODUCTS_BOX') or define('BS5_MAX_PRODUCTS_BOX', '10'); // wieviele Artikel sollen maximal in den Boxen "Neue Artikel", "Angebote" und "Rezensionen" gezeigt werden?
defined('BS5_SHOW_BOX_ADD_QUICKIE') or define('BS5_SHOW_BOX_ADD_QUICKIE', 'true'); // Box Schnellkauf innerhalb Box Warenkorb anzeigen = 'true', nicht anzeigen = 'false'
defined('BS5_SHOW_PAYPAL_IN_BOX_CART') or define('BS5_SHOW_PAYPAL_IN_BOX_CART', 'true'); // 'true' Zeigt PayPal Button in Box Cart / Warenkorb!
defined('BS5_SHOW_BOX_INFO') or define('BS5_SHOW_BOX_INFO', 'true'); // Box Info Kundengruppe innerhalb Box Account Mein Konto anzeigen = 'true', nicht anzeigen = 'false'

// BS5 Banner Manger
defined('BS5_DEFAULT_BANNER_SETTINGS') or define('BS5_DEFAULT_BANNER_SETTINGS', 'j1,btn-outline-light,n,j1,bg-light,n,0'); // Standardwerteschema 'Controls(n,j1,j2),Controlsclass(Bootstrap-Btn-Klassen),Controlsrounded(n,j),Indicators(n,j1,j2),Indicatorsclass(Bootstrap-Btn-Klassen),Indicatorsrounded(n,j),Sliderduration(4000,5000... Millisekunden)'


// Bootstrap-Theme
defined('BS5_BOOTSTRAP_THEME') or define('BS5_BOOTSTRAP_THEME', 'default'); 	// Folgende Themes stehen dank https://bootswatch.com zur Verfügung (dort können Sie auch die Less- und Sass-Dateien finden):
																					// default, cerulean, cosmo, cyborg, darkly, flatly, journal, litera, lumen, lux, materia, minty, pulse, sandstone, simplex, sketchy, slate, solar, spacelab, superhero, united, yeti
																					// einfach den jeweiligen Name einsetzen z.B. "define('BS5_BOOTSTRAP_THEME', 'flatly');" steht für das Theme 'flatly'.
