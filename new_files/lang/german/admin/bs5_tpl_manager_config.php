<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

$lang_array = array(
	'TEXT_BS5_TPL_MANAGER_CONFIG_UPDATE_SYSTEMMODULE_WARNING' => 'Neue Einstellungen sind hinzugekommen - vor der Nutzung muss ein Update des Systemmodules gemacht werden.<br>
		Der Link bringt Sie zum Systemmodul &nbsp;&nbsp;&nbsp;',
	'TEXT_BS5_TPL_MANAGER_CONFIG_HEADING_TITLE' => 'Bootstrap 5 Template Konfiguration',
	'TEXT_BS5_TPL_MANAGER_CONFIG_INFO' => 'Hier gemachte Einstellungen haben direkte Auswirkung auf den Shop!',

	'TEXT_BS5_TPL_MANAGER_CONFIG_COLOR_MODE' => '<h3>Farbmodus</h3>
		Bootstrap 5 hat mit der Unterst&uuml;tzung von Farbmodi begonnen - gestartet wird mit einem <u>dunklen Farbmodus</u>!<br><br>
		Um den dunklen Farbmodus im Shoptemplate zu aktivieren sind Codeanpassungen in der Datei <strong>"includes/header.php"</strong> notwendig.<br><br>
		Suchen nach:<br><br>
		<strong>&lt;html</strong><br><br>
		und am Ende der Zeile, noch vor dem schließenden, letzten ">" folgendes einf&uuml;gen:<br><br>
		<strong>&nbsp;data-bs-theme="dark"</strong><br><br>
		Achtung: Das Leerzeichen vor data-bs-theme="dark" nicht vergessen!<br>Mehr dazu finden Sie unter "Docs->Customize->Color Modes" auf der Seite "https://getbootstrap.com".<br>',
	'TEXT_BS5_TPL_MANAGER_CONFIG_COMPRESS_OPTIONS' => '<h3>Empfehlung "Komprimierung"</h3>
		Empfehlung f&uuml;r die Einstellungen in <em>Erw. Konfiguration -> Komprimierung</em><br>
		Nach zahllosen Test mit der Chromeerweiterung "Lighthouse" werden folgende Einstellungen empfohlen:<br><br>
		<strong><u>HTML Komprimierung</u>&nbsp;&nbsp;<span style="color:green">"Ja"</span></strong><br>
		<strong><u>CSS Komprimierung</u>&nbsp;&nbsp;<span style="color:red">"Nein"</span></strong><br>
		<strong><u>JavaScript Komprimierung</u>&nbsp;&nbsp;<span style="color:red">"Nein"</span></strong><br><br>
		Hinweis: <u>GZip Komprimierung einschalten</u> - Bitte selbst testen, bringt nicht zwingend ein Verbesserung.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_IMAGE_OPTIONS' => '<h3>Empfehlung "Bild Optionen"</h3>
		Empfehlung f&uuml;r die Einstellungen in <em>Konfiguration -> Bild Optionen</em> (Angabe in Pixel: Breite x Höhe)<br>
		Alle Beispielbilder stammen von <a href="https://unsplash.com/de" target=”_blank”>https://unsplash.com/de</a>!<br><br>
		<strong><u>Artikelbilder</u></strong><br>
		<strong>Artikel-Mini Bilder: </strong>100 x 100<br><strong>Artikel-Midi Bilder: </strong>200 x 200<br><strong>Artikel-Thumbnails: </strong>280 x 280<br><strong>Artikel-Info Bilder: </strong>600 x 600<br><strong>Artikel-Popup Bilder: </strong>1000 x 1000<br><strong>Hinweis: </strong>Originalbilder sollten min. 1000 x 1000 und im Seitenverh&auml;ltnis 1:1 sein.<br><br>
		<strong><u>Kategoriebilder - Kategoriebeschreibung unter dem Bild</u></strong> - trifft zu, wenn der Wert "Breite der Kategorie Bilder" gr&ouml;&szlig;er 900 ist.<br>
		<strong>Kategorie Bilder: </strong>1000 x ca. 300 (Breite: 1360px - sollte im Tab "Boxen" die Einstellung "Box Men&uuml; Unterkategorien" auf "Nein" eingestellt sein)<br><strong>Kategorie Bilder Mobil: </strong>550 x ca. 250<br><strong>Kategorie Bilder Listing: </strong>200 x 200<br><strong>Hinweis: </strong>Erzeugte Bilder sollten in der passenden Breite sein. Listingbilder sollten im Seitenverh&auml;ltnis 1:1 sein.<br><br>
		<strong><u>Kategoriebilder - Kategoriebeschreibung rechts neben dem Bild</u></strong> - trifft zu, wenn der Wert "Breite der Kategorie Bilder" kleiner 900 ist.<br>
		<strong>Kategorie Bilder: </strong>250 x ca. 200<br><strong>Kategorie Bilder Mobil: </strong>550 x ca. 250<br><strong>Kategorie Bilder Listing: </strong>200 x 200<br><strong>Hinweis: </strong>Erzeugte Bilder sollten in der passenden Breite sein. Listingbilder sollten im Seitenverh&auml;ltnis 1:1 sein.<br><br>
		<strong><u>Herstellerbilder</u></strong><br>
		<strong>Hersteller Bilder: </strong>200 x 200<br><strong>Hinweis: </strong>Originalbilder sollten 200 x 200 sein.<br><br>
		<strong><u>Bannerbilder - "Contentbreite"</u></strong><br>
		<strong>Banner Bilder: </strong>1360 x ca. 500<br><strong>Banner Bilder Mobil: </strong>530 x ca. 320<br><strong>Hinweis: </strong>Erzeugte Bilder sollten in der passenden Breite sein.<br><br>',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_CLASSES' => 'BS5 Themes / Farbklassen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_THEME' => 'BS5 Themes:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_THEME_INFO' => 'Hier k&ouml;nnen Sie eines der vorgefertigten Themes einstellen!<br>
		<strong>Hinweis:</strong><br>
		Im "BS5 Theme Manager" erstellte eigene Themes werden nur bei Einstellung "Bootstrap (bootstrap.min.css)" geladen.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CLASSES' => 'CSS-Klassen (Einstellungen wirken sich nur bei den Themes "Bootstrap" und "BS5 standard" aus)',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_BG' => 'TOP1 Hintergrund:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_BG_INFO' => 'Hintergrundklasse der Navbar ganz oben!<br>
		Mehr dazu finden Sie unter "Docs->Utilitis->Background" auf der Seite "https://getbootstrap.com"<br>
		Standard: bg-body-tertiary',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_TEXT' => 'TOP1 Schriftfarbe:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_TEXT_INFO' => 'Schrift-/ Textklasse der Navbar ganz oben!<br>
		Standard: text-body-secondary',
	'TEXT_BS5_TPL_MANAGER_CONFIG_LOGOBAR_TEXT' => 'Logobar Schriftfarbe:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_LOGOBAR_TEXT_INFO' => 'Schrift-/ Textklasse der Navigation rechts neben dem Logo!<br>
		Standard: text-secondary-emphasis',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_NAVBAR' => 'Main Navbar:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_NAVBAR_INFO' => 'Klasse der Hauptnavigation / des Superfishmen&uuml;s!<br>
		Standard: keine',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_BG' => 'Main Hintergrund:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_BG_INFO' => 'Hintergrundklasse der Hauptnavigation / des Superfishmen&uuml;s!<br>
		Standard: bg-body-tertiary',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_NAVBAR' => 'Footer Navbar:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_NAVBAR_INFO' => 'Klasse der Fu&szlig;-/ Footer-Navigation / des Footers!<br>
		Standard: keine',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_BG' => 'Footer Hintergrund:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_BG_INFO' => 'Hintergrundklasse der Fu&szlig;-/ Footer-Navigation / des Footers!<br>
		Standard: bg-body-tertiary',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_HEADER' => 'Header-Bereich',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1' => 'Top1:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_INFO' => 'Soll die Topleiste mit Top1 angezeigt werden?<br><br>
		<strong>Hinweis:</strong><br>In der Topleiste k&ouml;nnen vier Spalteneintr&auml;ge angezeigt werden.<br>
		Damit diese Spalten auch mehrsprachig genutzt werden k&ouml;nnen, sind die Texte in eine Sprachdatei ausgelagert.<br>
		Die Texte k&ouml;nnen in der Datei "templates/bootstrap5/lang/lang_german.custom" ge&auml;ndert werden (Englisch -> "lang_english.custom").<br>
		Sprachvariable "BS5_top1" in "templates/bootstrap5/lang/lang_german.custom".',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2' => 'Top2:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_INFO' => 'Soll Top2 angezeigt werden?<br><br>
		Sprachvariable "BS5_top2" in "templates/bootstrap5/lang/lang_german.custom".',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP3' => 'Top3:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP3_INFO' => 'Soll Top3 angezeigt werden?<br><br>
		Sprachvariable "BS5_top3" in "templates/bootstrap5/lang/lang_german.custom".',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP4' => 'Top4:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TOP4_INFO' => 'Soll Top4 angezeigt werden?<br><br>
		Sprachvariable "BS5_top4" in "templates/bootstrap5/lang/lang_german.custom".',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_JS_DISABLED' => 'JavaScript-Hinweis:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_JS_DISABLED_INFO' => 'Soll der JavaScript-Hinweis angezeigt werden?<br><br>
		<strong>Hinweis:</strong><br>
		Der Text ist nur sichtbar, wenn der Kunde im Browser JavaScript deaktiviert hat.<br><br>
		Sprachvariable "BS5_noscript" in "templates/bootstrap5/lang/lang_german.custom".',
	'TEXT_BS5_TPL_MANAGER_CONFIG_LOGO' => 'Logopfad:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_LOGO_INFO' => 'Relativer Pfad zum Shoplogo.<br><br>
		<strong>Hinweis:</strong><br>
		Logopfad relativ zum Ordner "shoproot/templates/bootstrap5/" - z.B. shoproot/templates/bootstrap5/img/logo_head.png -> "img/logo_head.png"',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_ICON_WITH_NAMES' => 'Icon-Leiste:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_ICON_WITH_NAMES_INFO' => 'Soll auf breiten Bildschirmen der Name zum Icon angezeigt werden?',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_SUPERFISH' => 'Men&uuml;s',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISHMENU' => 'Superfish-Men&uuml;',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MENUCASE' => 'Men&uuml;variante:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MENUCASE_INFO' => 'Welche Men&uuml;variante soll angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_ALL' => 'alle Level angezeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_1' => 'nur Level 1 wird angezeigt',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_2' => 'nur bis Level 2 angezeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_3' => 'nur bis Level 3 angezeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_4' => 'nur bis Level 4 angezeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_5' => 'nur bis Level 5 angezeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_6' => 'nur bis Level 6 angezeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_HOMEBUTTON' => 'Startseite-Icon:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_HOMEBUTTON_INFO' => 'Soll das Startseite-Icon (Home-Icon) angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ADD_LINK' => 'Zus&auml;tzliche Links:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ADD_LINK_INFO' => '<strong>Diese Option gilt auch f&uuml;r das Template "bootstrap5a"!</strong><br><br>Es k&ouml;nnen zus&auml;tzliche Links f&uuml;r das Men&uuml; erfasst werden!<br><br>
		<strong>Syntax:</strong><br>
		Linkziel1|Linkname1,Linkziel2|Linkname2,Linkziel3|Linkna...<br><br>
		<strong>Beispiel:</strong><br>
		Die Eingabe "https://www.mein_shop.com/shop_content.php?coID=3|Service,https://www.modified-shop.org|Modified" erzeugt zwei Links,<br>
		Link 1 mit dem Namen "Service" und dem Ziel "https://www.mein_shop.com/shop_content.php?coID=3"<br>
		Link 2 mit dem Namen "Modified" und dem Ziel "https://www.modified-shop.org"<br><br>
		F&uuml;r Mehrsprachigkeit wird z.B. "https://www.example.com|BS5_Linktext" eingetragen - wichtig ist das "BS5_" am Beginn!<br>
		Zus&auml;tzlich muss in der Datei "templates/bootstrap5/lang/lang_german.custom" eine Sprachvariable angelegt werden - "BS5_Linktext = \'Mein Link\'"',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MEGAS' => 'Mega-Men&uuml;:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MEGAS_INFO' => 'Hier kann das Mega-Men&uuml; individuell konfiguriert werden.<br><br>
		<strong>Ab Level 2 wird das Mega-Men&uuml; 3-spaltig dargestellt!<br>
		Wer daran nichts &auml;ndern m&ouml;chte sollte dieses Feld leer lassen!</strong><br><br>
		<strong>Beispiele:</strong><br>
		Alle Kategorien sollen als Mega-Men&uuml; mit 4 Spalten dargestellt werden.<br>
		Eingabe: "main-4" (ohne Anf&uuml;hrungszeichen)<br>
		Eingetragen wird die ID der Navbar "main", dahinter die Anzahl der Spalten.<br><br>
		Alle Kategorien sollen als Mega-Men&uuml; mit 3 Spalten dargestellt werden, ab dem 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingef&uuml;gt werden.<br>
		Eingabe: "main-3-5"<br>
		Eingetragen wird die ID der Navbar "main", dahinter die Anzahl der Spalten und die Stelle (5) an der der Link eingef&uuml;gt werden soll.<br><br>
		Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Men&uuml; dargestellt werden.<br>
		Eingabe: "li5-3,li22-4"<br>
		Eingetragen werden die ID\'s der Kategorielinks "li5" und "li22" - die Schreibweise ist hier wichtig - dahinter die Anzahl der Spalten.<br><br>
		Es sollen die Kategorien mit der ID 5 (3-spaltig) und ID 22 (4-spaltig) als Mega-Men&uuml; dargestellt werden, ab dem 4. bzw. 5. Link der untersten Kategorieebene soll ein Link "mehr anzeigen ..." eingef&uuml;gt werden.<br>
		Eingabe: "li5-3-4,li22-4-5"<br>
		Eingetragen werden die ID\'s der Kategorielinks "li5" und "li22" - die Schreibweise ist hier wichtig - dahinter die Anzahl der Spalten und die Stelle (4, 5) an der der Link eingef&uuml;gt werden soll.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL' => 'Anzeige bis Level:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL_INFO' => 'Bis zu welchem Level soll das Standard-Men&uuml; angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_NONE' => 'keine',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ALL_MENUS' => 'Gilt f&uuml;r alle Men&uuml;s',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MANUFACTURERS_LINK' => 'Link Hersteller:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MANUFACTURERS_LINK_INFO' => 'Soll der Link "Hersteller" im Men&uuml; angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SPECIALS' => 'Link Angebote:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SPECIALS_INFO' => 'Soll der Link "Angebote" im Men&uuml; angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW' => 'Link Neue Artikel:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_INFO' => 'Soll der Link "Neue Artikel" im Men&uuml; angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE' => 'Gro&szlig;schreibung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE_INFO' => 'Sollen die Links "Angebote" und "Neue Artikel" gro&szlig; geschrieben werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES' => 'Leere Kategorien ausblenden:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES_INFO' => 'Sollen leere Kategorien ausblendet werden?<br><br>
		<strong>Hinweis:</strong><br>
        Bei "Ja" wird sich die Seitenaufbauzeit verlangsamen, denn bei jedem Shopaufruf wird gepr&uuml;ft wieviele Produkte in den einzelnen Kategorien und deren Unterkategorien stecken.<br><br>
		Ausgeblendet werden die Kategorien wenn kein aktiver Artikel in der Kategorie selbst oder einer ihrer Unterkategorien enthalten ist.<br>
		Aus diesem Grund sollte im Adminbereich Konfiguration -> Lagerverwaltungs Optionen -> Bestellabschluß - Ausverkaufte Artikel deaktivieren auf "Ja" gestellt werden.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL' => 'Scrollen bei Unterkategorie-Klick:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL_INFO' => 'Soll nach dem Klick auf den Unterkategorie-Button die geklickte Kategorie nach oben gescrollt werden?',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_SLIDER' => 'Slider/Banner',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW' => 'Bilderslider:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_INFO' => 'Wo und wie breit soll der Slider auf der Startseite angezeigt werden?<br><br>
		<strong>Hinweis:</strong><br>
		Dieser Slider zeigt Bilder, die im "Banner Manager" der Banner-Gruppe "SLIDER" zugeordnet werden!<br>
		Beachten Sie, dass bei "gesamte Bildschirmbreite" und "Contentbreite" die Werte in "Konfiguration -> Bild Optionen" entsprechend angepasst werden m&uuml;ssen, oder das Bild, nach dem Speichern im Banner Manager, per FTP im Ordner "images/banner/" nochmals getauscht wird.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_NONE' => 'nicht anzeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SCREEN' => 'gesamte Bildschirmbreite',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SHOP' => 'Contentbreite',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_FADE' => 'Bilderslider:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_FADE_INFO' => 'Welcher Effekt soll genutzt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TITLE' => 'Bilderslider:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TITLE_INFO' => 'Soll der "Titel des Banners" bzw. der "Bild Titel" links unten angezeigt werden?<br>Hinweis: Der "Bild Titel" wird bevorzugt angezeigt!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TOP' => 'Topartikel:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TOP_INFO' => 'Sollen die Topartikel als Slider angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BANNER_TITLE' => 'Banner:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BANNER_TITLE_INFO' => 'Soll der "Titel des Banners" bzw. der "Bild Titel" links unten angezeigt werden?<br>Hinweis: Der "Bild Titel" wird bevorzugt angezeigt!',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_BOXES' => 'Boxen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOXES' => 'Boxen auf der Startseite',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_GREETING' => 'Box Begr&uuml;&szlig;ung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_GREETING_INFO' => 'Soll die Box Begr&uuml;&szlig;ung (Content Manager - Eintrag Index) auf der Startseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST' => 'Box Kategorieliste:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST_INFO' => 'Soll eine Kategorieliste (nur Hauptkategorien) auf der Startseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW' => 'Box Neue Artikel:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW_INFO' => 'Soll die Box Neue Artikel auf der Startseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS' => 'Box Angebote:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS_INFO' => 'Soll die Box Angebote auf der Startseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_UPCOME_PRODS' => 'Erwartete Artikel:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_UPCOME_PRODS_INFO' => 'Sollen Erwartete Artikel auf der Startseite angezeigt werden?<br>
		<strong>Hinweis:</strong><br>
		Bei "Nein" sollte aus Performance-Gr&uuml;nden in Konfiguration -> Maximum Werte bei "Erwartete Artikel Anzeigemodul" die Zahl "0" eingetragen werden!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_NEW_PRODS' => 'Top-Artikel:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_NEW_PRODS_INFO' => 'Sollen Top-Artikel auf der Startseite angezeigt werden?<br>
		<strong>Hinweis:</strong><br>
		Bei "Nein" sollte aus Performance-Gr&uuml;nden in Konfiguration -> Maximum Werte bei "Neue Artikel Anzeigemodul" die Zahl "0" eingetragen werden!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS' => 'Box Rezensionen:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS_INFO' => 'Soll die Box Rezensionen auf der Startseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_BESTSELLER' => 'Box Bestseller:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_BESTSELLER_INFO' => 'Soll die Box Bestseller auf der Startseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN' => 'Hersteller:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_INFO' => 'Sollen die Hersteller als Slider angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_NAME_LINES' => 'Hersteller:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_NAME_LINES_INFO' => 'Anzahl der Zeilen, die der Herstellername belegen soll (0 = auto).',
	'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOXES' => 'Boxen auf anderen Seiten (nicht auf der Startseite)',
	'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED' => 'Box Zuletzt angesehen:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED_INFO' => '<strong>Produktinfoseite</strong><br>Soll die Box Zuletzt angesehen auf der Produktinfoseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SUBCATEGORIES' => 'Box Men&uuml; Unterkategorien:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SUBCATEGORIES_INFO' => '<strong>Kategorielistingseite</strong><br>Soll die Box Unterkategoriemen&uuml; auf der Kategorielistingseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_BOXES' => 'Boxen allgemein',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MAX_PRODUCTS_BOX' => 'Max. Anzahl Produkte:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MAX_PRODUCTS_BOX_INFO' => '<strong>Boxen "Neue Artikel", "Angebote" und "Rezensionen"</strong><br>Wieviele Produkte sollen maximal in den Boxen "Neue Artikel", "Angebote" und "Rezensionen" angezeigt werden?<br>
		Standard: 10',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_ADD_QUICKIE' => 'Box Schnellkauf:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_ADD_QUICKIE_INFO' => '<strong>Box Schnellkauf innerhalb Box Warenkorb</strong><br>Soll die Box Schnellkauf innerhalb Box Warenkorb angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_INFO' => 'Box Info Kundengruppe:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_INFO_INFO' => '<strong>Box Info Kundengruppe innerhalb Box Account "Mein Konto"</strong><br>Soll die Box Info Kundengruppe innerhalb Box Account "Mein Konto" angezeigt werden?',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_VIEWS' => 'Ansichten',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_MOREIMAGES_AS_SLIDER' => 'Produktdetailseite:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_MOREIMAGES_AS_SLIDER_INFO' => 'Sollen auf der Produktdetailseite die kleinen weiteren Produktbilder als Slider angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT' => 'Produktdetailseite:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT_INFO' => 'Soll auf der Produktdetailseite das Kategoriemen&uuml; in der linken Spalte angezeigt werden? Nur f&uuml;r das Template "bootstrap5a"!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE' => 'Produktdetailseite:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE_INFO' => 'Soll auf der Produktdetailseite das Herstellerbild angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX' => 'Artikeldarstellung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_INFO' => 'Sollen Artikel in der Kategorieansicht (Produktlisten) als Boxen angezeigt werden?<br><br>
		<strong>Hinweis:</strong><br>
		 Bei "Nein" werden die Artikel in Listenform untereinander angezeigt!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX' => 'Artikeldarstellung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX_INFO' => 'Sollen Artikel im Reiter "Empfehlung" (Cross-Selling-, Reverse-Cross-Selling) und "Kunden-Tipp" (Also-Purchased) auf der Artikel-Detailseite als Boxen angezeigt werden?<br><br>
		<strong>Hinweis:</strong><br>
		 Bei "Nein" werden die Artikel in Listenform untereinander angezeigt!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_LINES' => 'Artikeldarstellung in Boxen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_NAME_LINES' => 'Produktboxen:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_NAME_LINES_INFO' => '<strong>Einstellung gilt f&uuml;r alle Produktboxen.</strong><br>Anzahl der Zeilen, die der Artikelname maximal belegen soll (0 = auto).',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_MODULES' => 'Module',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND' => 'Kundenerinnerung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_INFO' => 'Modul "Kundenerinnerung" aktivieren!<br>
		<strong>Hinweis:</strong><br>
		 Dieses Modul bietet Ihren angemeldeten Kunden die M&ouml;glichkeit, sich eine Erinnerungs-E-Mail schicken zu lassen, sobald ein Artikel wieder auf Lager ist.<br><br>
		 Sobald ein Artikel nicht mehr auf Lager ist, erscheint auf der Produktdetail-Seite ein Button, womit der Kunde sich in die Erinnerungsliste eintragen kann.<br><br>
		 <strong>Die Erinnerungsliste finden Sie im Adminbereich unter "Kunden -> Kundenerinnerungen".</strong><br><br>
		 Ist ein Artikel (in ausreichender Anzahl) wieder auf Lager, bekommt der Kunde automatisch eine Erinnerungsmail mit einem Link, der direkt zum Produkt im Shop f&uuml;hrt.<br>
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=12813.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=12813.0</a>',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_DOUBLE_OPT_IN' => 'Kundenerinnerung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_DOUBLE_OPT_IN_INFO' => '<strong>Double-Opt-In f&uuml;r Kundenerinnerung?</strong><br>Bei "Ja" wird eine E-Mail an den Kunden geschickt, in der die Anmeldung best&auml;tigt werden muss. Es muss hierf&uuml;r in den E-Mail Optionen das Senden von E-Mails aktiviert sein.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_ONLY_REGISTERED' => 'Kundenerinnerung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_ONLY_REGISTERED_INFO' => '<strong>Erinnerung nur f&uuml;r angemeldete Kunden?</strong><br>Diesen Dienst nur f&uuml;r angemeldete Kunden erlauben, dann stellen Sie diesen Schalter auf "Ja".',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_PRIVACY_CHECK_REGISTERED' => 'Kundenerinnerung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_PRIVACY_CHECK_REGISTERED_INFO' => '<strong>Unterzeichnen des Datenschutzes auch f&uuml;r angemeldete Kunden?</strong><br>Soll die Datenschutz-Checkbox auch Pflichtangabe f&uuml;r angemeldete Kunden sein, dann stellen Sie diesen Schalter auf "Ja".<br>(Gilt nur wenn Erw. Konfiguration -> Zusatzmodule - Unterzeichnen des Datenschutzes = "Ja"!)',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_ASAP' => 'Kundenerinnerung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_ASAP_INFO' => '<strong>Mailversand sofort?</strong><br>Abgleich der Tabelle "Kundenerinnerung" mit dem "Lagerbestand" und anschlie&szlig;ender <strong>Mailversand nur einmal t&auml;glich</strong>, dann Schalter auf "Nein" (empfohlene Einstellung).<br>Wenn bei jedem Seitenaufruf die Tabelle "Kundenerinnerung" mit dem "Lagerbestand" abgeglichen werden soll, dann stellen Sie diesen Schalter auf "Ja".',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL' => 'Kundenerinnerung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_INFO' => 'E-Mail an den Shopbetreiber (Kontakt - E-Mail-Adresse) senden, wenn sich ein Kunde in die Erinnerungsliste eintr&auml;gt?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CHEAPLY_SEE' => 'Billiger gesehen:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_CHEAPLY_SEE_INFO' => 'Modul "Billiger gesehen" aktivieren und den Link in der Produktdetailansicht anzeigen!<br>
		<strong>Hinweis:</strong><br>
		 Der im oberen Bereich angezeigte Text kann im Content Manager ge&auml;ndert werden!<br>
		 Link zum Originalmodul: Webseite "xtc-load.de" nicht mehr erreichbar.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY' => 'Frage zum Artikel:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY_INFO' => 'Modul "Frage zum Artikel" aktivieren und den Link in der Produktdetailansicht anzeigen!<br>
		<strong>Hinweis:</strong><br>
		 Der im oberen Bereich angezeigte Text kann im Content Manager ge&auml;ndert werden!<br>
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=2153.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=2153.0</a>',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT' => 'Attributauswahl als Pflichtfeld und vorbelegt mit "Bitte wählen":',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_TEXT' => '"Bitte wählen":',
	'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_INFO' => 'Modul "Attributauswahl als Pflichtfeld und vorbelegt mit (Bitte wählen)" aktivieren!<br>
		<strong>Hinweis:</strong><br>
		 Es handelt sich hier um das Modul MODULE_MODULFUX_ATTRIBUTES_DEFAULT.<br>
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=38117.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=38117.0</a>',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER' => 'Automatische Preisberechnung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_INFO' => 'Modul "Automatische Preisberechnung" aktivieren!<br>
		<strong>Hinweis:</strong><br>
		 Aufpreispflichtige Optionen/Attribute werden automatisch zum Artikelpreis hinzugerechnet.<br>
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=20125.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=20125.0</a>',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_UPDATE_PRICE_INFO' => 'Soll der gezeigte Preis aktualisiert werden?<br>
		 Bei "Ja" wird nicht nur ein Hinweis angezeigt, sondern der Artikelpreis per Javascript ersetzt.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART' => 'AGI: Anzahl im Warenkorb reduzieren:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_INFO' => 'Modul "AGI: Anzahl im Warenkorb reduzieren" aktivieren!<br>
		<strong>Hinweis:</strong><br>
		 Das Modul reduziert die Anzahl eines Artikels im Warenkorb auf die maximal verf&uuml;gbare Menge, wenn eine gr&ouml;&szlig;ere Anzahl bestellt werden sollte. Der Kunde wird direkt &uuml;ber die Anpassung informiert und muss die passende Anzahl nicht durch probieren herausfinden<br>&copy; andreas-guder.de.<br>
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=40416.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40416.0</a>',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_ACTIVATE' => 'Bitte aktivieren Sie: ',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_DEACTIVATE' => 'Bitte deaktivieren Sie: ',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_ALLOW_CHECKOUT' => 'Einkaufen nicht vorr&auml;tiger Ware erlauben',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_CHECK' => '&Uuml;berpr&uuml;fen des Warenbestandes',
	'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA' => 'AGI: Anzahl im Warenkorb reduzieren:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA_INFO' => 'Anzahl im Warenkorb anzeigen?<br>
		 Zeigt dem Kunden an, welche Anzahl er urspr&uuml;nglich wollte, und auf welche Anzahl reduziert wurde.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1' => 'Awids Rating Breakdown',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_2' => ' - Rezensionsaufgliederung nach vergebenen Sternen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_INFO' => 'Modul "Rezensionsaufgliederung nach vergebenen Sternen" aktivieren!<br>
		<strong>Hinweis:</strong><br>
		 Dieses Modul gliedert die vergebenen Bewertungen je Sterne-Anzahl in einzelne Progress-Bars auf, sodass der Kunde mit einem Blick erkennen kann, welche Bewertungen am h&auml;ufigsten vergeben wurden.<br>
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=40793.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40793.0</a>',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_PRODLIST_INFO' => 'Modul auch in Produktlisten anzeigen?<br>
		 Die erweiterte Bewertung kann auch in Produktlisten angezeigt werden.<br>
		 Bei den Bestseller, Neue Artikel und Top-Artikel ist teilweise nur eine einfache Darstellung m&ouml;glich.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS_INFO' => 'Sterne auch <u>ohne</u> gespeicherte Bewertung anzeigen?<br>
		 Damit ist es m&ouml;glich, dass Boxen in Produktlisten &auml;hnliche H&ouml;hen erhalten.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_URL_INFO' => 'Filter-PopUp aktivieren?<br>
		 Diese Einstellung erm&ouml;glicht es, die Bewertungen in einem PopUp anzuzeigen und nach Anzahl der vergebenen Sterne zu filtern.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS' => 'CSS Produkt- & Attributlagerampel',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_INFO' => 'Modul "CSS Produkt- & Attributlagerampel" aktivieren!<br>
		<strong>Hinweis:</strong><br>
		 Dieses Modul zeigt eine Produkt- und Attribut-Lagerampel, welche wahlweise eine grafische Lagerampel oder den Lagerbestand als Text abbildet.<br>
		 Link zum Originalmodul: <a href="https://www.modified-shop.org/forum/index.php?topic=37371.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=37371.0</a><br>
		 Texte können in der Datei "lang/german/extra/bs5_additional_modules.php" ge&auml;ndert werden (Englisch -> "lang/english/extra/bs5_additional_modules.php").',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_NONE' => 'nicht anzeigen',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_L' => 'nur Ampel',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LS' => 'Ampel und Bestand',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LT' => 'Ampel und Text ohne Bestand',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LTS' => 'Ampel, Text und Bestand',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_T' => 'nur Text',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_TS' => 'Text und Bestand',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODLIST_INFO' => '<strong>Lagerampel in Produktlisten:</strong><br>
		 Wie soll die Lagerampel im Produktlisting angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODINFO_INFO' => '<strong>Lagerampel auf der Produktdetailseite:</strong><br>
		 Wie soll die Lagerampel auf der Produktdetailseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODATTR_INFO' => '<strong>Lagerampel f&uuml;r Attribute auf der Produktdetailseite:</strong><br>
		 Wie soll die Lagerampel f&uuml;r Attribute auf der Produktdetailseite angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_RED_YELL_INFO' => 'Geben Sie hier den Minimum-Wert f&uuml;r die gelbe Ampel ein. Dieser Wert und alle Werte darunter werden mit einer roten Ampel versehen. Standard: 0',
	'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_GREEN_INFO' => 'Geben Sie hier den Wert ein, ab dem eine gr&uuml;ne Ampel anzeigt werden soll. Alle Werte darunter bis zum Minimum-Wert werden mit einer gelben Ampel versehen.',

	'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_MIXED' => 'Verschiedenes',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE' => 'Artikel-Thumbnails:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE_INFO' => 'Sollen Artikel-Thumbnails mit Mini- bzw. Midibildern ersetzt werden?<br><br>
		<strong>Hinweis:</strong><br>
		 Wenn Sie diese Option auf "Ja" setzen, werden Artikel-Thumbnails, abh&auml;ngig von der jeweiligen Ansicht, durch Mini- bzw. Midibildern ersetzt.<br><br>
		 Seit Shopversion 2.0.6.0 besteht die M&ouml;glichkeit Artikelbilder in zus&auml;tzlichen Gr&ouml;&szlig;en (Mini, Midi) zu speichern.<br>
		 In Konfiguration -> Bild Optionen sind die Ma&szlig;e einzustellen, f&uuml;r bereits vorhanden Bilder muss evtl. das Systemmodul "Bilder Prozessing" ausgeführt werden.',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_NEW' => 'Fahne/Farbband:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_NEW_INFO' => 'Soll das Farbband "Neu" angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_TOP' => 'Fahne/Farbband:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_TOP_INFO' => 'Soll das Farbband "Top" angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_SPECIAL' => 'Fahne/Farbband:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_SPECIAL_INFO' => 'Soll das Farbband "Angebot" angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_PERCENT' => 'Prozentbutton:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_PERCENT_INFO' => 'Soll der Prozentbutton (z.B. "25%") angezeigt werden?',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ADVANCED_VALIDATION' => 'Validierung:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_ADVANCED_VALIDATION_INFO' => 'Soll die erweiterte Validierung verwendet werden?<br><br>
		<strong>Hinweis:</strong><br>
		 Dadurch werden im Registrierungsformular Eingabefehlermeldungen direkt unter dem entsprechendem Eingabefeld angezeigt!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_USE_VIEWERJS' => 'JavaScript Bildbetrachter:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_USE_VIEWERJS_INFO' => 'Soll der Bildbetrachter in der Produktdetailansicht verwendet werden?<br><br>
		<strong>Hinweis:</strong><br>
		 Klickt man auf ein Produktbild &ouml;ffnet sich der Bildbetrachter und das Bild kann vergr&ouml;&szlig;ert werden (smartphonef&auml;hig)!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV' => 'Filterfarbe:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV_INFO' => 'Welche Hintergrundfarbklasse soll ein aktiver Filter erhalten?<br>Standard: keine<br><br>
		<strong>Hinweis:</strong><br>
		 In der Bootstrap 5 Dokumentation ("https://getbootstrap.com" Docs->Utilitis->Background) k&ouml;nnen die Farbklassen eingesehen werden!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERBORDERCOLOR_AKTIV' => 'Filterfarbe:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERBORDERCOLOR_AKTIV_INFO' => 'Welche Rahmenfarbklasse soll ein aktiver Filter erhalten?<br>Standard: border-primary<br><br>
		<strong>Hinweis:</strong><br>
		 In der Bootstrap 5 Dokumentation ("https://getbootstrap.com" Docs->Utilitis->Border) k&ouml;nnen die Farbklassen eingesehen werden!',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW' => 'Suchfeld:',
	'TEXT_BS5_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW_INFO' => 'Soll das Suchfeld einreihig angezeigt werden?<br><br>
		<strong>Hinweis:</strong><br>
		 Das zus&auml;tzliche Auswahlfeld f&uuml;r die Kategorie in der gesucht werden soll kann ein- oder zweireihig dargestellt werden, dadurch werden die Kategorienamen nicht abgeschnitten!',
);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}

?>