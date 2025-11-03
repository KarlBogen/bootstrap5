UNRELEASED

- Update Bootstrap-Framework von 5.3.6 zu 5.3.8
- CSS-Animation hinzugefügt, damit werden Bilder beim Überfahren mit der Maus leicht skaliert / vergrößert
- JavaScript scroll-entrance.js hinzugefügt, damit werden einzelne Abschnitte animiert sobald sie in den sichtbaren Bereich kommen


1.1.16 [24.09.2025]
- Update zu Shopversion 3.1.6
- JavaScript "Bitte wählen" und "price Updater" verändert - betrifft Produkt-Optionen-Templatedateien

1.1.15 [01.08.2025]
- Update zu Shopversion 3.1.5
- Versionsnummer wird in der Tabelle "configuration" gespeichert
- Cookie Consent Popup-Links geändert zu rel="nofollow"
- Modul Kundenerinnerung aktualisiert
<br> --- aus der Erinnerungsliste kann direkt eine Erinnerung versandt werden
<br> --- Zusätzlich wird beim Produkt eine Info angezeigt, sobald sich mehrere Kunden in die Erinnerungsliste eingetragen haben
<br> --- Benachrichtigung ab prozentualem Mindestlagerbestand hinzugefügt
<br> --- Mailversand als "geplante Aufgabe" hinzugefügt
<br> --- Frontendtexte "Kundenerinnerung" in "Produkterinnerung" umbenannt

1.1.14 [26.06.2025]
- Automatische Attribute Preisberechnung und "Bitte wählen" aktualisiert
- Hinweis "Neue Einstellungen sind hinzugekommen..." wurde nicht ausgeblendet - behoben

1.1.13a [29.05.2025]
- Update Bootstrap-Framework zu Version 5.3.6
- Update PHP-Sass-Compiler zu Version 2.0.1
- alte Version des Sass-Compilers (für PHP-Version kleiner 8.1) wieder hinzugefügt

1.1.13 [26.05.2025] Release entfernt
- Update Bootstrap-Framework zu Version 5.3.6
- Update PHP-Sass-Compiler zu Version 2.0.1

1.1.12 [15.05.2025]
- Update zu Shopversion 3.1.4

1.1.11 [14.05.2025]

- PayPal-Button in Box Cart aktualisiert
- Captcha - Eingabelänge korrigiert
- Modul-Preisaktualisierung - JavaScript angepasst
- kleinere Änderungen

1.1.10 [29.03.2025]

- Modul "Automatische Preisberechnung" - Preisaktualisierung an Shopberechnung angepasst

1.1.9 [25.03.2025]
- Update zu Shopversion 3.1.3
- Theme "blau natur" hinzugefügt
- JS Price Updater geändert
- Barrierefreiheit - Focus-Anker in index.html verändert
- neue Option in der Konfiguration - PayPal Button in Box Warenkorb
- Update Box Cart für PayPal PLUS fuer Shopversion 3.1.2 rev 16207
- SQL-Abfrage für Box Hersteller und Hersteller-Menü aktualisiert
- kleinere Änderungen

1.1.8 [05.02.2025]

- Button BuyNow im Listing geändert
- Box Reviews geändert
- Focus für Screenreader nach Cookie Consent Auswahl gesetzt
- Anzeige Attributgesamtpreis in module/product_options/product_options_v1_select.html
- Attribute Price Updater geändert
- JavaScript Price Updater geändert
- JavaScript-Hinweis Hausnummer bei create_account und create_account_guest
- Templatedateien für PayPal-Express angepasst
- checkout_shipping_block.html - Icon hinzugefügt
- Font-Icons erweitert

1.1.7 [05.11.2024]

- Update zu Shopversion 3.1.2
- Versionsnummer aktualisiert
- bootstrap5a - Schalter soll Menü nach oben scrollen
- FSK18 Hinweis geändert
- Schalter für Anzeige Bannertitel hinzugefügt

1.1.6 [13.10.2024]

- Update zu Shopversion 3.1.1
- Barrierefreiheit bei mehreren Produktbildern verändert
- "X" in Offcanvas stand nicht in rechter Ecke
- Breadcrumb-Divider in CSS-Datei angepasst
- Kundenerinnerung - Anpassung an Modulversion 1.0.4
- If-Abfrage Slidertitel (siehe Forum https://www.modified-shop.org/forum/index.php?topic=43489.msg406306#msg406306)
- Anpassung Templatedateien "product_info..." an Attribute Kombinations Manager
- kleinere Änderungen


1.1.5 [18.07.2024]

- Update zu Shopversion 3.1.0
- Update Bootstrap-Framework zu Version 5.3.3
- Update SCSS-Complier zu Version 1.12.1
- Fix missing span tag (thanks flth)
- Cookie consent - switcher style on focus
- In product_reviews_write review_count is always 0 - behoben



1.1.4 [09.06.2024]

- Kundenerinnerung Mailbetreff angepasst
- Warning in templates/bootstrap5a/source/inc/xtc_show_category.inc.php behoben
- Kontrollkästchen Datenschutz wurde in create_account und create_account_guest stets angezeigt - behoben
- Fehlerhafte Anzeige Button in templates/bootstrap5a/source/inc/xtc_show_category.inc.php behoben
- javascript/extra/cookieconsent.js.php angepasst an OIL.js Consent Management v1.43
- Mailversand Kundenerinnerung nur einmal täglich - Code geändert


1.1.3 [24.04.2024]

- Kundenerinnerung wurde auch ohne Opt-in versandt
- deutsche Selbstlaute in E-Mails

1.1.2 [19.04.2024]

- Modul Kundenerinnerung jetzt mit Opt-in
- Fehler Preload-Pfad für Schrift bei SEF-URLs - behoben
- Reviews werden trotz der Abschaltung in Kundengruppe in Produktinfo angezeigt - behoben
- Nicht definierter Array-Key in admin/bs5_tpl_manager_theme.php - behoben
- Fehler Shop offline behoben
- Durchgestrichene Preise in Info und Listing hinzugefügt
- Kleinunternehmerregelung Footertext - https://trac.modified-shop.org/changeset/15782/

1.1.1 [03.04.2024]

- Weisse Seite nach Update wegen fehlender Konstante - behoben
- css_button.inc.php Konstanten entfernt
- BS5_FILTERBORDERCOLOR_AKTIV war ohne Systemmodul nicht definiert
- Doppelte ID's im HTML - behoben
- Pfade zum Shoplogo auf manchen Systemen fehlerhaft - behoben
- BS5a - Kategoriemenü kann auch auf Produktinfoseite angezeigt werden
- BS5a - statt Kategorieüberschrift wird nur der Kategoriename im Menü angezeigt


1.1.0 [23.03.2024]

- Template "bootstrap5a" mit geänderter Navigation hinzugefügt
- Icon-Fehler bei Passwort anzeigen - behoben
- Link "Einstellungen" wird angezeigt, obwohl nur eine Sprache und ein Land aktiv ist - behoben
- Mailversand in "Kundenerinnerung", "Billiger gesehen" und "Frage zum Artikel" geändert - Fehlermeldung bei IONOS
- Weisse Seite bei Sub-Kategorielisting, wenn Kategoriebild leer, aber Listingbild belegt - behoben


1.0.1 [13.03.2024]

- BS5 Theme - Vorlagen ergänzt (alle Themes sind auf barrierefreie Farbkontraste getestet)
- BS5 Theme-Einstellungen überarbeitet
- BS5 Konfiguration aktualisiert
- bs5.css wird minimiert zu bs5.min.css
- alle Button im Template auf eine Bootstrap-CSS-Klasse umgestellt
- Sterne in Ansicht "Rezension schreiben" wurden nicht angzeigt


1.0.0 [05.03.2024]

- Übertragung der Dateien zu Github
