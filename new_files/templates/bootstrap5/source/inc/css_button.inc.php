<?php

//require_once(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/lang/buttons_'.$_SESSION['language'].'.php');

function css_button($image, $alt, $parameters = '', $submit = false) {

    $name           = substr(basename($image), 0);
    $html           = '';
    $title          = $alt;
    $leer			= '';

    $products_review_link = defined('PRODUCTS_REVIEW_LINK_TITLE') ? PRODUCTS_REVIEW_LINK_TITLE : PRODUCTS_REVIEW_LINK;
    $printview_info = defined('PRINTVIEW_INFO_TITLE') ? PRINTVIEW_INFO_TITLE : PRINTVIEW_INFO;

    // Erklärung: es wird geprüft, welches Buttonbild von Modified aufgerufen wird. Dementsprechend werden neue Attribute zugewiesen.
    // z.B. dem Buttonbild 'button_checkout_express.gif' wird zugewiesen:
    //      'Text' => TEXT_CHECKOUT_EXPRESS_INFO_LINK (der Text der auf dem neuen Button angezeigt wird, in der Regel der Text der Modifiedvariablen '$alt', in unserem Beispiel der Text der in der Languagedatei 'TEXT_CHECKOUT_EXPRESS_INFO_LINK' zugewiesen wurde).
    //      'iconleft' => 'fa fa-cart-plus' (das Icon das im Button links angezeigt wird - in der Font Awesome Dokumentation unter 'https://fontawesome.com/icons?d=gallery&s=regular,solid' kann man diese aussuchen).
    //      'iconright' => 'fa fa-cart-plus' (das Icon das im Button rechts angezeigt wird - in der Font Awesome Dokumentation unter 'https://fontawesome.com/icons?d=gallery&s=regular,solid' kann man diese aussuchen).
    //      'Class' => '' (hier kann dem Button noch eine zusätzliche CSS-Klasse zugewiesen werden - zu finden in der Bootstrap 5 Dokumentation Abschnitt Buttons 'https://getbootstrap.com/docs/5.3/components/buttons/').
    //      'Title' => '' (hier kann dem Button noch eine zusätzlicher Titel zugewiesen werden).

	switch ($name) {
 
    case 'epaypal_'.$_SESSION['language_code'].'.gif':
    // PayPal
			$buttons = array('Text' => constant('BUTTON_EPAYPAL_'.strtoupper($_SESSION['language_code']).'_TEXT'), 'Class' => 'btn btn-paypal btn-sm btn-block mb-2');
      break;
	// Modified Button
    case 'button_add_address.gif':
		// Addressbuch
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-square-plus');
      break;
    case 'button_add_quick.gif':
		// Box Add a quickie
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-cart-shopping');
      break;
    case 'button_back.gif':
		// Mehrfachnutzung Account, Checkout, Bewertungen, Contentseiten
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-arrow-left');
      break;
    case 'button_buy_now.gif':
		// Mehrfachnutzung Produktseiten
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-cart-shopping', 'Title' => $alt);
      break;
    case 'button_change_address.gif':
		// Mehrfachnutzung Checkout Rechnungsadresse, Lieferadresse
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-pen-to-square');
      break;
    case 'button_checkout.gif':
		// Warenkorb
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-credit-card', 'iconright' => 'fa fa-arrow-right');
      break;
    case 'button_checkout_express.gif':
		// Mehrfachnutzung Nutzerkonto-Bestellhistorie, Produktdetailseiten, Warenkorb
			$buttons = array('Text' => TEXT_CHECKOUT_EXPRESS_INFO_LINK, 'iconleft' => 'fa fa-cart-plus');
      break;
    case 'button_confirm.gif':
		// Mehrfachnutzung Downloads-Login, Payone, PayPal
			$buttons = array('Text' => $alt, 'iconright' => 'fa fa-check', 'Class' => 'btn btn-secondary btn-sm');
      break;
    case 'button_confirm_order.gif':
		// Checkout -> Kaufen-Button
			$buttons = array('Text' => $alt, 'iconright' => 'fa fa-square-check', 'Class' => 'btn btn-success btn-lg');
      break;
    case 'button_continue.gif':
		// Mehrfachnutzung Account, Checkout, Downloads, Gutschein, Login, Logout, Bewertungen, Warenkorb, Merkzettel
			$buttons = array('Text' => $alt, 'iconright' => 'fa fa-arrow-right', 'iconposition' => 'right', 'Class' => '');
      break;
    case 'button_continue_shopping.gif':
		// Warenkorb
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-arrow-left');
      break;
    case 'button_delete.gif':
		// Addressbuch
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-xmark');
      break;
    case 'button_download.gif':
		// Produktseiten Downloads
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-download');
      break;
    case 'button_in_cart.gif':
		// Mehrfachnutzung Nutzerkonto-Bestellhistorie, Produktseiten, Produktdetailseiten, Bewertungen
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-cart-shopping');
      break;
    case 'button_in_wishlist.gif':
		// Mehrfachnutzung Produktseiten, Produktdetailseiten
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-heart');
      break;
    case 'button_login.gif':
		// Login
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-arrow-right-to-bracket');
      break;
    case 'button_login_newsletter.png':
		// Newsletteranmeldung
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-envelope fa-lg');
      break;
    case 'button_login_small.gif':
		// Box Login
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-arrow-right-to-bracket');
      break;
    case 'button_print.gif':
		// Nutzerkonto-Bestellhistorie
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-print');
      break;
    case 'button_product_more.gif':
		// Mehrfachnutzung Produktseiten, Bewertungen
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-eye');
      break;
    case 'button_quick_find.gif':
		// Box Suche
			$buttons = array('Text' => $alt, 'iconleft' => '');
      break;
    case 'button_redeem.gif':
		// Warenkorb-Guthabenkonto
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-gift', 'Title' => $alt);
      break;
    case 'button_results.gif':
		// Ergebnisse anzeigen
			$buttons = array('Text' => $alt, 'iconright' => 'fa fa-arrow-right');
      break;
    case 'button_save.gif':
		// Checkout Bestätigungsseite (Aktualisieren)
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-floppy-disk', 'Title' => $alt);
      break;
    case 'button_search.gif':
		// Erweiterte Suche
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-magnifying-glass');
      break;
    case 'button_send.gif':
		// Mehrfachnutzung Warenkorb -> Gutschein senden, Kontakt, Newsletteranmeldung
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-check');
      break;
    case 'button_update.gif':
		// Adressbuck
			$buttons = array('Text' => $alt, 'iconright' => 'fa fa-rotate');
      break;
    case 'button_view.gif':
		// Produktdetailseiten -> Downloads
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-magnifying-glass-plus');
      break;
    case 'button_write_review.gif':
		// Bewertung
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-pen-to-square');
      break;
    case 'cart_del.gif':
		// Mehrfachnutzung Merkzettel, Warenkorb, Box Warenkorb
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-trash');
      break;
    case 'print.gif':
		// Mehrfachnutzung Nutzerkonto-Bestellhistorie, Checkout 'fertig', Produktinfoseiten
			$buttons = array('Text' => TEXT_PRINT, 'iconleft' => 'fa fa-print');
      break;
    case 'small_cart.gif':
		// Mehrfachnutzung Nutzerkonto, Nutzerkonto-Bestellhistorie
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-cart-shopping');
      break;
    case 'small_delete.gif':
		// Mehrfachnutzung Adressbuch, Payone
			$buttons = array('Text' => $alt, 'iconright' => 'fa fa-xmark', 'Class' => 'btn btn-danger btn-sm');
      break;
    case 'small_edit.gif':
		// Adressbuch
			$buttons = array('Text' => $alt, 'iconleft' => 'fa fa-pen-to-square');
      break;
    case 'small_express.gif':
		// Mehrfachnutzung Nutzerkonto, Nutzerkonto-Bestellhistorie
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-cart-plus', 'Title' => $alt . ' - ' .IMAGE_BUTTON_CHECKOUT);
      break;
    case 'small_view.gif':
			$buttons = array('Text' => '', 'iconright' => 'fa fa-eye');
      break;
    case 'wishlist_del.gif':
		// Merkzettel
			$buttons = array('Text' => '', 'iconleft' => 'fa fa-trash', 'Title' => $alt);
      break;
		case 'small_continue.gif':
		// Checkout (Adresse aktualisieren)
			$buttons = array('Text' => constant('BUTTON_SMALL_CONTINUE_TEXT'), 'iconleft' => 'fa fa-square-check');
			break;
		case 'button_checkout_step2.gif':
		case 'button_checkout_step3.gif':
		// Checkout (Adresse aktualisieren)
			$buttons = array('Text' => $alt, 'iconright' => 'fa fa-arrow-right');
			break;

		default:
		// default
			$buttons = array('Text' => $alt, 'iconleft' => '', 'Class' => 'btn btn-secondary');

	}

   // kein Submitbutton
   if ($submit === false)
   {
		$html .= '<span';
		if (!empty($buttons['Class'])) {
			$html .= ' class="'.$buttons['Class'].'"';
		}
		if (!empty($buttons['Title'])) {
			$html .= ' title="'.$buttons['Title'].'"';
		}
		if (xtc_not_null($parameters)) {
			$html .= ' '.$parameters.'>';
		} else {
			$html .= '>';
		}
		if (!empty($buttons['iconleft'])) {
			$html .= '<span class="'.$buttons['iconleft'].'"></span>';
		}
		if  (!empty($buttons['Text'])) {
			$html .= '<span class="mx-3">'.$buttons['Text'].'</span>';
		}
		if (!empty($buttons['iconright'])) {
			$html .= '<span class="'.$buttons['iconright'].'"></span>';
		}
		$html .= '</span>';
	}
   else
   { // wenn Submitbutton
		$html .= '<button';
		if (!empty($buttons['Class'])) {
			$html .= ' class="'.$buttons['Class'].'"';
		}
		if (xtc_not_null($parameters)) {
			$html .= ' '.$parameters;
		}
		if ($submit <> true) {
			$html .= ' name="'.$submit.'"';
		}
		if ($submit == true || $submit == "submit"){
			$html .= ' type="submit"';
		}
		$html .= ' title="'.$title.'">';
		if (!empty($buttons['iconleft'])) {
			$html .= '<span class="'.$buttons['iconleft'].'"></span>';
		}
		if  (!empty($buttons['Text'])) {
			$html .= '<span class="mx-3">'.$buttons['Text'].'</span>';
		}
		if (!empty($buttons['iconright'])) {
			$html .= '<span class="'.$buttons['iconright'].'"></span>';
		}
		$html .= '</button>';
	}
	return $html;

}
