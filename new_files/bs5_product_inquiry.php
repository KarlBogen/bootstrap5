<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

/*
	Zusatzmodul Frage zum Artikel
*/

// Die Get-Variable "view" wird benutzt um die Ausgabe zu variieren.
// Läuft der Shop komplett auf "https", wird das Anfrageformular in der Modalbox geöffnet, ansonsten wird auf eine Contentseite weitergeleitet

require('includes/application_top.php');

if (!isset($_GET['pID'])) xtc_redirect(xtc_href_link(FILENAME_DEFAULT));

defined('DISPLAY_PRIVACY_CHECK') or define('DISPLAY_PRIVACY_CHECK', 'true');

// redirect contact form to SSL if available
if (ENABLE_SSL == true && $request_type == 'NONSSL' && isset($_GET['view']) && $_GET['view'] == 'nonssl') {
	xtc_redirect(xtc_href_link(BS5_FILENAME_PRODUCT_INQUIRY, 'pID=' . (int) $_GET['pID'] . '&products_id=' . (int) $_GET['products_id'] . '&view=ssl', 'SSL'));
}

//vvcode
require_once(DIR_WS_CLASSES . 'modified_captcha.php');
$mod_captcha = $_mod_captcha_class::getInstance();
defined('MODULE_CAPTCHA_CODE_LENGTH') or define('MODULE_CAPTCHA_CODE_LENGTH', 6);
defined('MODULE_CAPTCHA_LOGGED_IN') or define('MODULE_CAPTCHA_LOGGED_IN', 'True');

require_once(DIR_FS_INC . 'xtc_validate_email.inc.php');
require_once(DIR_FS_INC . 'get_customers_gender.inc.php');
require_once (DIR_FS_INC.'secure_form.inc.php');

$smarty = new Smarty();

// include boxes
$display_mode = 'bs5_product_inquiry';
require(DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/source/boxes.php');

// include header
require(DIR_WS_INCLUDES . 'header.php');

// load content
$shop_content_query = xtc_db_query("SELECT
		content_title,
		content_heading,
		content_text
		FROM " . TABLE_CONTENT_MANAGER . "
		WHERE content_group = " . BS5_PRODUCT_INQUIRY_CONTENT_GROUP . "
		AND languages_id = '" . (int)$_SESSION['languages_id'] . "'");

$shop_content_data = xtc_db_fetch_array($shop_content_query);

// load products data
$products = new product((int)$_GET['pID']);
if (!is_object($products) || $products->isProduct() === false) {
	// product not found in database
	xtc_redirect(xtc_href_link(FILENAME_DEFAULT, '', 'SSL'));
}

// TEMPLATE VARIABLES
$smarty->assign('TITLE', $shop_content_data['content_heading']);
$smarty->assign('tpl_path', HTTP_SERVER . DIR_WS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/');
$smarty->assign('CONTENT_HEADING', $shop_content_data['content_heading']);
$smarty->assign('CONTENT_TEXT', $shop_content_data['content_text']);
$smarty->assign('PRODUCTS_MODEL', $products->data['products_model']);
$smarty->assign('PRODUCTS_NAME', $products->data['products_name']);
$smarty->assign('PRODUCTS_SHORT_DESCRIPTION', stripslashes($products->data['products_short_description']));
$smarty->assign('HEADING_FORMULAR', BS5_TEXT_PRODUCT_INQUIRY);

$image = '';
if ($products->data['products_image'] != '') {
	$image = DIR_WS_INFO_IMAGES . $products->data['products_image'];
}
$smarty->assign('PRODUCTS_IMAGE', $image);

//-- FEHLERMELDUNG ERZEUGEN ----------------------------------------------------------------------------------
$privacy = isset($_POST['privacy']) && $_POST['privacy'] == 'privacy' ? true : false;
$error = false;
if (isset($_POST['action']) && ($_POST['action'] == 'send')) {

	$valid_params = array(
    'gender',
    'firstname',
    'lastname',
    'email',
    'phone',
    'message_body',
  );

  // prepare variables
  foreach ($_POST as $key => $value) {
    if ((!isset(${$key}) || !is_object(${$key})) && in_array($key , $valid_params)) {
      ${$key} = xtc_db_prepare_input($value);
    }
  }

	if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
		$error = true;
		$messageStack->add('product_inquiry', ENTRY_FIRST_NAME_ERROR);
	}
	if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
		$error = true;
		$messageStack->add('product_inquiry', ENTRY_LAST_NAME_ERROR);
	}
	if (strlen($email) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
		$error = true;
		$messageStack->add('product_inquiry', ENTRY_EMAIL_ADDRESS_ERROR);
	} elseif (xtc_validate_email($email) == false) {
		$error = true;
		$messageStack->add('product_inquiry', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
	}
	if (strlen($message_body) == 0) {
		$error = true;
		$messageStack->add('product_inquiry', BS5_ENTRY_MESSAGE_BODY_ERROR);
	}
	if (DISPLAY_PRIVACY_CHECK == 'true' && empty($privacy)) {
		$error = true;
		$messageStack->add('product_inquiry', ENTRY_PRIVACY_ERROR);
	}
	//vvcode
	if (!isset($_SESSION['customer_id']) || MODULE_CAPTCHA_LOGGED_IN == 'True') {
		if ($mod_captcha->validate((isset($_POST['vvcode'])) ? $_POST['vvcode'] : '') !== true) {
			$error = true;
			$messageStack->add('product_inquiry', BS5_ENTRY_VVCODE_CHECK_ERROR);
		}

	}
  if (check_secure_form($_POST) === false) {
    $error = true;
    $messageStack->add('product_inquiry', ENTRY_TOKEN_ERROR);
  }

	if ($error === false) {

		$post_gender = $gender;
		if ($post_gender == 'm') {
			$gender = GENDER_MALE;
		} elseif ($post_gender == 'f') {
			$gender = GENDER_FEMALE;
		} elseif ($post_gender == 'd') {
			$gender = GENDER_DIVERSE;
		}

		// Email bilden
		$create_name = $firstname . ' ' . $lastname;
		$create_subject = BS5_TEXT_PRODUCT_INQUIRY;
		$products_link = xtc_href_link(FILENAME_PRODUCT_INFO, xtc_product_link($product->data['products_id'], $product->data['products_name']));

		$create_html_body = '<h3>' . STORE_NAME . '</h3>';
		$create_html_body .= '<h4>' . BS5_TEXT_PRODUCT_INQUIRY . '</h4>';
		$create_html_body .= $gender . "<br>";
		$create_html_body .= $create_name . "<br>";
		$create_html_body .= BS5_EMAIL . $email . "<br>";
		$create_html_body .= BS5_PHONE . $phone . "<br><br>";
		$create_html_body .= HEADER_ARTICLE . ": " . $products->data['products_name'] . "<br>";
		$create_html_body .= HEADER_MODEL . ": " . $products->data['products_model'] . "<br>";
		$create_html_body .= "Link: " . $products_link . "<br><br>";
		$create_html_body .= BS5_SUBJECT . $create_subject . "<br><br>";
		$create_html_body .= nl2br($message_body) . "<br><br>";

		$create_text_body = STORE_NAME . "\n\n";
		$create_text_body .= BS5_TEXT_PRODUCT_INQUIRY . ":\n--------------------\n";
		$create_text_body .= $gender . "\n";
		$create_text_body .= $create_name . "\n";
		$create_text_body .= BS5_EMAIL . $email . "\n";
		$create_text_body .= BS5_PHONE . $phone . "\n\n";
		$create_text_body .= HEADER_ARTICLE . ": " . $products->data['products_name'] . "\n";
		$create_text_body .= HEADER_MODEL . ": " . $products->data['products_model'] . "\n";
		$create_text_body .= "Link: " . $products_link . "\n\n";
		$create_text_body .= BS5_SUBJECT . $create_subject . "\n\n";
		$create_text_body .= "\n--------------------\n" . $message_body . "\n\n";

		// EMAIL GENERIEREN
		xtc_php_mail(
			CONTACT_US_EMAIL_ADDRESS, //von emailadresse
			CONTACT_US_NAME, //von emailname
			CONTACT_US_EMAIL_ADDRESS,  //an emailadresse
			CONTACT_US_NAME, //an emailname
			CONTACT_US_FORWARDING_STRING, //bcc
			$email, //antwortadresse
			$create_name, //antwortname
			'', //anhang 1
			'', //anhang 2
			$create_subject, //emailbetreff
			$create_html_body, // htmlnachricht
			$create_text_body // textnachricht
		);

		$smarty->assign('success', '1');
	}
}

// Fehlermeldung anzeigen
if ($messageStack->size('product_inquiry') > 0) {
	$smarty->assign('error', $messageStack->output('product_inquiry'));
}

// ANREDE
$gender_selected = $error ? $gender : (isset($_SESSION["customer_gender"]) ? $_SESSION["customer_gender"] : '');
$select_gender = xtc_draw_pull_down_menu('gender', get_customers_gender(), $gender_selected, 'id="gender" class="form-select"');

// FORMULAR
$view = '';
if (isset($_GET['view'])) {
	$view = '&view=ssl';
}
$smarty->assign('FORM_ACTION', xtc_draw_form('product_inquiry', xtc_href_link(BS5_FILENAME_PRODUCT_INQUIRY, 'pID=' . $products->data['products_id'] . '&' . xtc_product_link($products->data['products_id'], $products->data['products_name']) . $view, 'SSL'), 'post', 'class="form-horizontal"').xtc_draw_hidden_field('action', 'send').secure_form('product_inquiry'));
if (!isset($_SESSION['customer_id']) || MODULE_CAPTCHA_LOGGED_IN == 'True') {
	$smarty->assign('VVIMG', $mod_captcha->get_image_code());
	$smarty->assign('INPUT_CODE', $mod_captcha->get_input_code());
}
$smarty->assign('SELECT_GENDER', $select_gender);
$smarty->assign('INPUT_FIRSTNAME', xtc_draw_input_field('firstname', ($error ? $_POST['firstname'] : (isset($_SESSION["customer_first_name"]) ? $_SESSION["customer_first_name"] : '')), 'id="firstname" class="form-control"'));
$smarty->assign('INPUT_LASTNAME', xtc_draw_input_field('lastname', ($error ? $_POST['lastname'] : (isset($_SESSION["customer_last_name"]) ? $_SESSION["customer_last_name"] : '')), 'id="lastname" class="form-control"'));
$smarty->assign('INPUT_EMAIL', xtc_draw_input_field('email', ($error ? $_POST['email'] : (isset($_SESSION["customer_email_address"]) ? $_SESSION["customer_email_address"] : '')), 'id="email" class="form-control"'));
$smarty->assign('INPUT_PHONE', xtc_draw_input_field('phone', ($error ? $_POST['phone'] : ''), 'id="phone" class="form-control"'));
$smarty->assign('SELECT_SUBJECT', xtc_draw_input_field('subject', BS5_TEXT_PRODUCT_INQUIRY, 'id="subject" class="form-control" disabled readonly'));
$smarty->assign('INPUT_TEXT', xtc_draw_textarea_field('message_body', 'soft', 50, 12, ($error ? $_POST['message_body'] : ''), 'class="form-control"'));
$smarty->assign('BUTTON_SUBMIT', xtc_image_submit('button_send.gif', IMAGE_BUTTON_SEND));
$smarty->assign('FORM_END', '</form>');

$smarty->assign('language', $_SESSION['language']);

$smarty->caching = 0;
// disable cache
$disable_smarty_cache = true;

if (DISPLAY_PRIVACY_CHECK == 'true') {
	$smarty->assign('PRIVACY_CHECKBOX', xtc_draw_checkbox_field('privacy', 'privacy', $privacy, 'id="privacy" class="form-check-input"'));
	$smarty->assign('PRIVACY_LINK', $main->getContentLink(2, MORE_INFO, $request_type));
}
if (isset($_GET['view'])) {
	$products_link = xtc_href_link(FILENAME_PRODUCT_INFO, xtc_product_link($product->data['products_id'], $product->data['products_name']));
	$smarty->assign('BUTTON_BACK', '<a href="' . $products_link . '">' . xtc_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>');
	$smarty->assign('full', true);
	$main_content = $smarty->fetch(CURRENT_TEMPLATE . '/module/product_inquiry.html');
	$smarty->assign('main_content', $main_content);
	$smarty->display(CURRENT_TEMPLATE . '/index.html');
	include('includes/application_bottom.php');
} else {
	$smarty->display(CURRENT_TEMPLATE . '/module/product_inquiry.html');
	include('includes/application_bottom.php');
}
