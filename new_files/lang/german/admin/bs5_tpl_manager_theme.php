<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

$lang_array = array(
	'TEXT_BS5_TPL_MANAGER_THEME_HEADING_TITLE' => 'Bootstrap 5 Theme-Einstellungen',
	'TEXT_BS5_TPL_MANAGER_THEME_INFO' => 'Hier gemachte Einstellungen haben erst Auswirkung auf den Shop, wenn das Theme in den Shop &uuml;bernommen wird!<br>',
	'TEXT_BS5_TPL_MANAGER_THEME_PREVIEW_TITLE' => 'Vorschau des Themes - ',
	'TEXT_BS5_TPL_MANAGER_THEME_PREVIEW_INFO' => '<small><i>&nbsp;&nbsp;&nbsp;(Vorschau entspricht nicht zu 100% der Shopansicht)</i></small>',

	'TEXT_BS5_TPL_MANAGER_THEME_TAB_BASICS' => 'Allgemeines',
	'BUTTON_COPY_2_TEMPLATE' => 'Fertig - Theme ins Template &uuml;bernehmen',
	'TEXT_BS5_TPL_MANAGER_THEME_COPY_2_TEMPLATE_INFO' => 'Die auf dieser Seite gemachten Theme-Einstellungen werden ins Template &uuml;bernommen!',
	'BS5_COPY_2_TEMPLATE' => 'Einstellungen ins Template &uuml;bernehmen?<br><br>Ist der Pfad zum Bootstrap 5 - Template<br><br>&nbsp;&nbsp;&nbsp;"<strong>%s</strong>"<br><br>richtig?',
	'TEXT_BS5_TPL_MANAGER_THEME_PATHS' => 'Template- und Themepfade:',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_TEMPLATE' => 'BS5 Template:',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_TEMPLATE_INFO' => 'Pfad zum Bootstrap5-Template!<br>
		Die in den Theme-Einstellungen erstellte CSS-Datei wird in dieses Template kopiert.',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_TEMPLATE0' => 'Bitte w&auml;hlen ...',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_THEME' => 'BS5 Theme:',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_THEME_INFO' => 'W&auml;hlen Sie hier das Bootstrap-Theme das in der Vorschau gezeigt werden oder in den Shop kopiert werden soll!',
	'TEXT_BS5_BOOTSTRAP_THEME_COLOR_MODE' => 'Farbmodus Vorschau:',
	'TEXT_BS5_BOOTSTRAP_PREVIEW_COLOR_MODE' => 'Dunkler Farbmodus?<br><br><span style="color:red;">Neu im BS-Framework!</span>',
	'TEXT_BS5_BOOTSTRAP_PREVIEW_COLOR_MODE_INFO' => 'Hier kann der dunkle Farbmodus f&uuml;r die Vorschau aktiviert werden.<br>
		<strong>Hinweis: Dies ist nur f&uuml;r die Vorschau m&ouml;glich. Um den Farbmodus im Shoptemplate zu aktivieren sind Codeanpassungen in der Datei "includes/header.php" notwendig.<br>
		Genaueres dazu ist im Men&uuml;punkt BS5 Konfiguration zu finden!</strong>',
	'TEXT_BS5_TPL_MANAGER_THEME_CUSTOM1' => 'eigenes Theme 1',
	'TEXT_BS5_TPL_MANAGER_THEME_CUSTOM2' => 'eigenes Theme 2',
	'TEXT_BS5_TPL_MANAGER_THEME_BOOTSWATCH_INFO' => '<strong>Hinweis zu BS5 Theme:</strong><br>Die im Dropdown w&auml;hlbaren Themes werden von https://bootswatch.com frei zur Verf&uuml;gung gestellt. Bei Bootswatch sind Templatedemos und Dateien zum Herunterladen zu finden.<br>
		Bei einigen Templates werden externe Google-Fonts vorgeschlagen, entsprechende Codezeilen wurden entfernt, ein Import dieser Fonts findet nicht statt (diese k&ouml;nnen DSGVO-konform eingebunden werden, siehe hierzu auch den Reiter "Zusätzliche Schriftart").<br><br>
		<strong>Als Standardschrift ist f&uuml;r alle Themes die Schriftart "Roboto" vorinstalliert.</strong>',

	'TEXT_BS5_TPL_MANAGER_THEME_TAB_FONTS' => 'Zus&auml;tzliche Schriftart',
	'TEXT_BS5_TPL_MANAGER_FONTS_INFO' => '<span style="color:red;"><strong>Bitte die Neuerung Punkt 5. (Cumulative Layout Shift - CLS) beachten!</strong></span><br><br><span style="color:red;">Speicherort der Fontdateien "templates/bootstrap5/css/fonts/"!</span><br><br>Eine DSGVO-konform eingebundene Schriftart muss auf dem eigenen Server gespeichert werden.',
	'TEXT_BS5_TPL_MANAGER_THEME_FONTS_NAME' => 'Name der Schriftart:',
	'TEXT_BS5_TPL_MANAGER_THEME_FONTS_NAME_INFO' => 'Tragen Sie hier den Namen der Schriftart ein, die eingebunden werden soll, z.B. "Open Sans" (ohne Anf&uuml;hrungszeichen)!<br>
		<strong>Eine Anleitung finden Sie nachfolgend!</strong>',
	'TEXT_BS5_TPL_MANAGER_THEME_FONT_DEFINITION' => 'CSS-Anweisung der Schriftart:',
	'TEXT_BS5_TPL_MANAGER_THEME_FONT_DEFINITION_INFO' => 'Tragen Sie hier die CSS-Anweisung zum Einbinden der Schriftart ein!<br>
		<strong>Eine Anleitung finden Sie nachfolgend!</strong>',

	'TEXT_BS5_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1' => 'Themevorlage:',
	'TEXT_BS5_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1_INFO' => 'W&auml;hlen Sie hier die Vorlage die f&uuml;r dieses Theme verwendet werden soll!',
	'TEXT_BS5_TPL_MANAGER_THEME_THEMEMODEL_LOAD_INFO' => 'Klicken Sie hier um die oben gew&auml;hlte Vorlage zu laden!',
	'BUTTON_LOAD_THEMEMODEL' => 'Vorlage laden',
	'BS5_LOAD_THEMEMODEL' => 'Vorlage laden?<br><br>Bisher gemachte Einstellungen in diesem Theme gehen verloren!',
	'TEXT_BS5_TPL_MANAGER_THEME_COLOR' => 'Farbe: ',
	'TEXT_BS5_TPL_MANAGER_THEME_VAR' => '<br>Variable: ',
	'COLOR_0' => '$custom-bg',
	'COLOR_1' => '$custom-color',
	'COLOR_2' => 'wei&szlig;',
	'COLOR_3' => 'grau 100',
	'COLOR_4' => 'grau 200',
	'COLOR_5' => 'grau 300',
	'COLOR_6' => 'grau 400',
	'COLOR_7' => 'grau 500',
	'COLOR_8' => 'grau 600',
	'COLOR_9' => 'grau 700',
	'COLOR_10' => 'grau 800',
	'COLOR_11' => 'grau 900',
	'COLOR_12' => 'schwarz',
	'COLOR_13' => 'blau',
	'COLOR_14' => 'indigo',
	'COLOR_15' => 'lila',
	'COLOR_16' => 'rosa',
	'COLOR_17' => 'rot',
	'COLOR_18' => 'orange',
	'COLOR_19' => 'gelb',
	'COLOR_20' => 'gr&uuml;n',
	'COLOR_21' => 'petrol',
	'COLOR_22' => 't&uuml;rkisblau',
	'INHERIT' => 'vererbt',
	'TEXT_BS5_TPL_MANAGER_THEME_COLOR_VARS_STANDARD' => 'Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_23_INFO' => 'Hier werden die Standardfarben den Bootstrap-Hilfsklassen (text-primary, bg-secondary usw.) zugewiesen!<br>
		Mehr dazu finden Sie unter "Documentation->Utilitis->Colors" auf der Seite "https://getbootstrap.com"<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_0_INFO' => '<strong>Benutzerdefinierte Farbe!</strong><br>
		Diese Farb-Variable kann f&uuml;r eigene Themes genutzt werden.
		Wert aus Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_1_INFO' => '<strong>Benutzerdefinierte Farbe!</strong><br>
		Diese Farb-Variable kann f&uuml;r eigene Themes genutzt werden.<br>
		Wert aus Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_2_INFO' => '<strong>Grundfarben!</strong><br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_23' => 'Bootstrap Farbklassen:',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_31' => 'Body-Hintergrundfarbe',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_31_INFO' => 'Standardhintergrundfarbe des Templates!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_32' => 'Body-Schriftfarbe',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_32_INFO' => 'Standardschriftfarbe des Templates!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_33' => 'Linkfarbe',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_33_INFO' => 'Standardfarbe von Hyperlinks!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_34' => 'Link-Hover-Farbe',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_34_INFO' => 'Standardfarbe von Hyperlinks bei Mausber&uuml;hrung!<br>
		Es k&ouml;nnen alle Farbvariablen (z.B. $blue oder $danger), aber auch die Sass-Funktionen darken() (z.B. darken($danger, 20%) und lighten() (z.B. lighten($danger, 40%) genutzt werden.<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_35' => 'Rahmenbreite',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_35_INFO' => 'Standardbreite von Rahmen in Pixel (z.B. 2px)!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_36' => 'Rahmenfarbe',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_37' => 'Schriftfarbe aktiv',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_37_INFO' => 'Standardschriftfarbe von aktiven Elementen!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_38' => 'Hintergrundfarbe aktiv',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_38_INFO' => 'Standardhintergrundfarbe von aktiven Elementen!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_39' => 'Schriftgr&ouml;&szlig;e',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_39_INFO' => 'Standardschriftgr&ouml;&szlig;e, angegeben in "rem" (z.B. 0.8rem oder 1.1rem)!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_40' => 'Schriftgr&ouml;&szlig;e H1',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_40_INFO' => 'Schriftgr&ouml;&szlig;e H1, abh&auml;ngig von der Standardschriftgr&ouml;&szlig;e!<br>
		Sie sollten nur die letzte Zahlen &auml;ndern (z.B. 2.2 statt 2.5)!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_41' => 'Schriftgr&ouml;&szlig;e H2',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_42' => 'Schriftgr&ouml;&szlig;e H3',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_43' => 'Schriftgr&ouml;&szlig;e H4',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_44' => 'Schriftgr&ouml;&szlig;e H5',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_45' => 'Schriftfarbe H1-H5',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_45_INFO' => 'Standardschriftfarbe H1-H5!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_46' => 'Hintergrundfarbe Inputs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_46_INFO' => 'Hintergrundfarbe f&uuml;r Eingabefelder!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_47' => 'Schriftfarbe Inputs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_47_INFO' => 'Schriftfarbe f&uuml;r Eingabefelder!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_48' => 'Rahmenfarbe Inputs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_48_INFO' => 'Rahmenfarbe f&uuml;r Eingabefelder!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_49' => 'Hintergrundfarbe Input-Addons',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_49_INFO' => 'Hintergrundfarbe f&uuml;r Addons von Eingabefeldern!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_50' => 'Schriftfarbe Navbar-Dark',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_50_INFO' => 'Schriftfarbe f&uuml;r Navigationen mit der Klasse "navbar-dark"!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_51' => 'Schriftfarbe Navbar-Dark hover',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_51_INFO' => 'Schriftfarbe f&uuml;r Navigationen mit der Klasse "navbar-dark" bei Mausber&uuml;hrung!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_52' => 'Schriftfarbe Navbar-Dark aktiv',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_52_INFO' => 'Schriftfarbe f&uuml;r Navigationen mit der Klasse "navbar-dark" bei aktivem Link!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_53' => 'Schriftfarbe Navbar-Light',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_53_INFO' => 'Schriftfarbe f&uuml;r Navigationen mit der Klasse "navbar-light"!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_54' => 'Schriftfarbe Navbar-Light hover',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_54_INFO' => 'Schriftfarbe f&uuml;r Navigationen mit der Klasse "navbar-light" bei Mausber&uuml;hrung!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_55' => 'Schriftfarbe Navbar-Light aktiv',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_55_INFO' => 'Schriftfarbe f&uuml;r Navigationen mit der Klasse "navbar-light" bei aktivem Link!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_56' => 'Hintergrundfarbe Pagination',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_56_INFO' => 'Hintergrundfarbe der Seitennummern-Navigation!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_57' => 'Hintergrundfarbe Pagination hover',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_57_INFO' => 'Hintergrundfarbe der Seitennummern-Navigation bei Mausber&uuml;hrung!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_58' => 'Schriftfarbe Pagination',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_58_INFO' => 'Schriftfarbe der Links der Seitennummern-Navigation!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_59' => 'Rahmenfarbe Card',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_59_INFO' => 'Rahmenfarbe der Karten / Bl&auml;tter (z.B. Umrandung der &Uuml;berschriften oder der Artikelboxen)!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_60' => 'Hintergrundfarbe Card Header/Footer',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_60_INFO' => 'Hintergrundfarbe der Kopf- und Fu&szlig;teile von Karten / Bl&auml;ttern!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_61' => 'Hintergrundfarbe Card',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_61_INFO' => 'Hintergrundfarbe der Karten / Bl&auml;tter!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_62' => 'Hintergrundfarbe List-Group',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_62_INFO' => 'Hintergrundfarbe von Listengruppen - eher selten genutzt im Template!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_63' => 'Rahmenfarbe List-Group',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_63_INFO' => 'Rahmenfarbe von Listengruppen!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_64' => 'Hintergrundfarbe Modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_64_INFO' => 'Hintergrundfarbe der Modal Popupbox!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_65' => 'Rahmenfarbe Modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_65_INFO' => 'Rahmenfarbe der Modal Popupbox!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_66' => 'Textrahmenfarbe Modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_66_INFO' => 'Textrahmenfarbe der Modal Popupbox!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_67' => 'Farbe Close Modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_67_INFO' => 'Farbe des "X" in der Modal Popupbox!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_68' => 'Hintergrundfarbe Breadcrumbs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_68_INFO' => 'Hintergrundfarbe der Breadcrumbs-Navigation!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_69' => 'Hintergrundfarbe Dropdown',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_69_INFO' => 'Hintergrundfarbe Dropdown (bei Mausber&uuml;hrung des Superfish-Men&uuml;s werden weitere Level in einem Dropdown mit dieser Farbe ge&ouml;ffnet)!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_70' => 'Schriftfarbe Dropdown',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_70_INFO' => 'Schriftfarbe Dropdown!<br>
		Standard der Vorlage: ',
	'TEXT_BS5_TPL_MANAGER_THEME_VARS_ADD' => 'Zus&auml;tzliche Sass Variablen',
	'TEXT_BS5_TPL_MANAGER_THEME_VARS_ADD_INFO' => 'Hier k&ouml;nnen zus&auml;tzliche Variablen definiert (z.B. "$pagination-border-color: $gray-300 !default;") werden!<br>
		Welche Variablen f&uuml;r Bootstrap 5 m&ouml;glich sind finden Sie in der Datei "admin/includes/bs5_template_manager/themes/variables.scss".<br>
		<strong>Achten Sie auf die Schreibweise und das " !default" am Ende!</strong><br><br>
		<strong>Tip:</strong> Hier k&ouml;nnen auch andere CSS-Anweisungen definiert werden.<br>
		&Uuml;berschriften haben im Template die Zusatz-Klassen "card" und "bg-h".<br>
		Mit der Zeile ".card.bg-h{background-color:#c2c2c2;}" erhalten alle &Uuml;berschriften eine graue Hintergrundfarbe.<br>
		Auch Kombinationen wie<br>
		$link-hover-decoration: none !default;<br>
		.card.bg-h{background-color:#c2c2c2;}<br>
		sind m&ouml;glich.',

	'TEXT_BS5_TPL_MANAGER_THEME_TAB_BUTTON' => 'Buttons',
	'TEXT_BS5_TPL_MANAGER_THEME_BUTTONS' => 'Die Buttons k&ouml;nnen hier nicht ver&auml;ndert werden, da es zuviele Variationen gibt!<br><br>
		&Auml;nderungen k&ouml;nnen aber in der Datei <strong>templates/bootstrap5/source/inc/css_button.inc.php</strong> gemacht werden.<br><br>
		<strong>Beispiel:<br>
		Es soll der gr&uuml;ne Button "Kasse" im Warenkorb blau dargestellt werden und ein anderes Icon (Bild) erhalten.</strong><br><br>
		Das Modified Shopsystem sendet an das Template die Informationen - erstelle einen Button mit dem Bild "button_checkout.gif" und dem Sprachstring "IMAGE_BUTTON_CHECKOUT" (Kasse).<br>
		<strong>Tip:</strong> Um herauszufinden, welches Bild von Modified aufgrufen wird, kann man auf das Template "tpl_modified" umstellen und den Button mit einem Entwicklertool des Browsers untersuchen.<br><br>
		Die Modified Informationen werden in der css_button.inc.php in einen Bootstrap-Button umgewandelt.<br>
		In Zeile 35 befindet sich der Eintrag "button_checkout.gif".<br><br>
		Zuerst suchen wir bei <a href="https://fontawesome.com/icons?d=gallery&s=regular,solid&m=free" target="_blank">Font Awesome</a> ein anderes "checkout" Icon z.B. "money-bill-alt".<br>
		Nun &auml;ndern wird diesen Abschnitt \'icon\' => \'far fa-credit-card\' in \'icon\' => \'far fa-money-bill-alt\' (far steht f&uuml; regular, alternativ kann fa oder fas f&uuml;r solid verwendet werden).<br><br>
		Jetzt suchen wir bei <a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/" target="_blank">Bootstrap</a> unter Docs->Components->Buttons nach den CSS-Klassen, in unserem Fall "btn-primary".<br>
		Wir &auml;ndern diesen Abschnitt \'Class\' => \'btn btn-checkout btn-success btn-block\' in \'Class\' => \'btn btn-checkout btn-primary btn-block\'<br><br>
		Anschlie&szlig;end Caches leeren und Shop aktualisieren!<br><br>
		<strong>Hinweis:</strong> Manche Button werden an mehreren Stellen im Shop benutzt!',

	// Default Bootstrap 5 font-family
	'BS5_DEFAULT_FONT_FAMILY' => '$font-family-sans-serif: "%s", sans-serif !default;',

	// Meldungen
	'BS5_TPL_MANAGER_THEME_ERROR' => 'Der Bootstrap 5 Template-Manager kann nicht wie gew&uuml;nscht genutzt werden!<br>
		Dieser Fehler ist aufgetreten: ',
	'BOOTSTRAP_CSS_COMPILED' => 'CSS-Datei erstellt - Vorschau aktualisiert',
	'BS5_TPL_MANAGER_THEME_TPL_PATH_NOT_EXISTS' => 'Der Pfad zum Template ist fehlerhaft!',
	'BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_EXISTS' => 'Die CSS-Datei <strong>%s</strong> existiert nicht!',
	'BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_RENAMED' => 'Die CSS-Datei <strong>%s</strong> wurde umbenannt zu <strong>%s</strong>!',
	'BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_RENAMED' => 'Die CSS-Datei <strong>%s</strong> konnte nicht umbenannt werden!',
	'BS5_TPL_MANAGER_THEME_TPL_FILE_COPIED' => 'Die Datei <strong>%s</strong> wurde kopiert nach <strong>%s</strong>!',
	'BS5_TPL_MANAGER_THEME_TPL_FILE_NOT_COPIED' => 'Die Datei <strong>%s</strong> konnte nicht ins Template kopiert werden!<br>
		Die CSS-Datei <strong>%s</strong> wurde wieder umbenannt zu <strong>%s</strong>!',
	'BS5_TPL_MANAGER_THEME_TPL_FONT_FILE_NOT_COPIED' => 'Die Datei <strong>%s</strong> konnte nicht ins Template kopiert werden!<br>
		Die Datei muss mit einem FTP-Programm in den Ordner %s geladen werden!',
	'BS5_TPL_MANAGER_THEME_COPY_COMPLIED' => '<h3>Das Theme sollte nun im Shop zur Verf&uuml;gung stehen!</h3>',

);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}

?>