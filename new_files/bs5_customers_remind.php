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

  * edited and tried to improve efficiency and logic, 06-2022, noRiddle *
-------------------------------------------------------------- */

include ('includes/application_top.php');

if(defined('BS5_CUSTOMERS_REMIND') && BS5_CUSTOMERS_REMIND == 'true') {

	// redirect contact form to SSL if available
	if (ENABLE_SSL == true && $request_type == 'NONSSL' && isset($_GET['view']) && $_GET['view'] == 'nonssl') {
		xtc_redirect(xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND, 'pID=' . (int) $_GET['pID'] . '&products_id=' . (int) $_GET['products_id'] . '&view=ssl', 'SSL'));
	}

	// captcha
	$use_captcha = array('reminder');
	defined('DISPLAY_PRIVACY_CHECK') or define('DISPLAY_PRIVACY_CHECK', 'true');
	defined('MODULE_CAPTCHA_CODE_LENGTH') or define('MODULE_CAPTCHA_CODE_LENGTH', 6);
	defined('MODULE_CAPTCHA_LOGGED_IN') or define('MODULE_CAPTCHA_LOGGED_IN', 'True');

	// include needed functions
  require_once (DIR_FS_INC.'xtc_validate_email.inc.php');
	require_once (DIR_FS_INC.'secure_form.inc.php');

	// include needed classes
	require_once (DIR_WS_CLASSES.'bs5_class.customers_remind.php');
	require_once (DIR_WS_CLASSES.'modified_captcha.php');

  $smarty = new Smarty;

	$error_message = '';
	$reminder = new bs5_customersremind();

		// include boxes
		$display_mode = 'bs5_reminder';
		require (DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/boxes.php');
		// include header
		require (DIR_WS_INCLUDES . 'header.php');

	// Accountaktivierung per Emaillink
	if (isset ($_GET['action']) && ($_GET['action'] == 'activate')) {
	  $reminder->ActivateAddress($_GET['key'], $_GET['email']);
	  unset($_GET['email']);
	  $error_message = $reminder->message;
	  if ($reminder->message_class == 'info') {
	    $smarty->assign('activated', true);
	  }
		// build breadcrumb
		$breadcrumb->add(BS5_NAVBAR_TITLE_CUSTOMERS_REMIND, xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND, '', 'SSL'));


		$smarty->assign('error_message', $error_message);
		$smarty->assign('message_class', $reminder->message_class);
	  $smarty->assign('language', $_SESSION['language']);
	  $smarty->caching = 0;
		$main_content = $smarty->fetch(CURRENT_TEMPLATE.'/module/reminder_activate.html');
		$smarty->assign('main_content', $main_content);
		if (!defined('RM'))
			$smarty->load_filter('output', 'note');
		$smarty->display(CURRENT_TEMPLATE.'/index.html');
		include ('includes/application_bottom.php');
	}
	else
	{

		$mod_captcha = $_mod_captcha_class::getInstance();
		$privacy = isset($_POST['privacy']) && $_POST['privacy'] == 'privacy' ? true : false;
		$error = false;

		if (isset($_GET['products_id'])) {
			require_once (DIR_FS_INC.'xtc_get_products_name.inc.php');
			$products_id = (int)$_GET['products_id'];
			$products_name = xtc_get_products_name($products_id);
			$smarty->assign('PRODUCTS_NAME', htmlentities($products_name));
		}

  	if(BS5_CUSTOMERS_REMIND_ONLY_REGISTERED == 'false' || (BS5_CUSTOMERS_REMIND_ONLY_REGISTERED == 'true' && isset($_SESSION['customer_id']))) {

			if (isset($_POST['action']) && $_POST['action'] == 'add_remind') {

				// Postcheck
				$valid_params = array(
					'customers_input_firstname',
					'customers_input_lastname',
					'customers_input_email',
					'customers_input_st',
				);
	
				// prepare variables
				foreach ($_POST as $key => $value) {
					if ((!isset(${$key}) || !is_object(${$key})) && in_array($key , $valid_params)) {
						${$key} = xtc_db_prepare_input($value);
					}
				}

				if (!isset($_SESSION['customer_email_address']) || (isset($_SESSION['customer_email_address']) && BS5_CUSTOMERS_REMIND_PRIVACY_CHECK_REGISTERED == 'true')) {
					if (DISPLAY_PRIVACY_CHECK == 'true' && empty($privacy)) {
						$error = true;
						$messageStack->add('bs5_customers_remind', ENTRY_PRIVACY_ERROR);
					}
				}
				if(strlen($customers_input_email) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
					$error = true;
					$messageStack->add('bs5_customers_remind', ENTRY_EMAIL_ADDRESS_ERROR);
				}
				elseif(xtc_validate_email($customers_input_email) == false) {
					$error = true;
					$messageStack->add('bs5_customers_remind', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
				}
				if (in_array('reminder', $use_captcha) && (!isset($_SESSION['customer_id']) || MODULE_CAPTCHA_LOGGED_IN == 'True')) {
					if ($mod_captcha->validate((isset($_POST['vvcode'])) ? $_POST['vvcode'] : '') !== true) {
						$error = true;
						$messageStack->add('bs5_customers_remind', TEXT_WRONG_CODE);
					}
				}
				if (check_secure_form($_POST) === false) {
					$error = true;
					$messageStack->add('bs5_customers_remind', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
				}
				$customers_input_st = intval($customers_input_st);
				if ($customers_input_st < 1) {
					$customers_input_st = 1;
				}
				// Fehlermeldung anzeigen
				if($messageStack->size('bs5_customers_remind') > 0) {
					$error_message = $messageStack->output('bs5_customers_remind');
					$message_class = 'error';
				}
			}


    	if(isset($_POST['action']) && $_POST['action'] == 'add_remind' && $error === false) {

	      $reminder->auto = true; //Captchaprüfung in PHP Klasse nicht mehr nötig
		    $reminder->AddUser('inp', '', $customers_input_email);
		    $error_message = $reminder->message;
        $message_class = $reminder->message_class;

		    $reg_query = xtc_db_query("SELECT * FROM bs5_customers_remind WHERE customers_email_address = '".$customers_input_email."' AND products_id = ".$products_id);
		    $registred = xtc_db_fetch_array($reg_query);

	      if(empty($registred)) {
	        $sql_data_array = array (
	          'customers_id' => (isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : '0'),
	          'products_id' => $product->data['products_id'],
	          'products_ean' => $product->data['products_ean'],
	          'products_name' => $product->data['products_name'],
	          'products_model' => $product->data['products_model'],
	          'products_image' => $product->data['products_image'],
	          'customers_gender' => (isset($_SESSION['customer_gender']) ? $_SESSION['customer_gender'] : ''),
	          'customers_firstname' => $customers_input_firstname,
	          'customers_lastname' => $customers_input_lastname,
	          'customers_email_address' => $customers_input_email,
	          'customers_language' => xtc_db_prepare_input($_POST['language_input']),
	          'customers_st' => $customers_input_st,
	          'mail_head1' => xtc_db_prepare_input($_POST['mail_input_head1']),
	          'remind_date_added' => 'now()'
	        );

	        xtc_db_perform('bs5_customers_remind', $sql_data_array);
	        $smarty->assign('SUCCESS_MESSAGE', '2');

					if (defined('BS5_CUSTOMERS_REMIND_SENDMAIL') && BS5_CUSTOMERS_REMIND_SENDMAIL == 'true') {

						$create_html_body = '<h3>' . STORE_NAME . '</h3>';
						$create_html_body .= '<h4>' . BS5_CUSTOMERS_REMIND_EMAIL_HEADING . '</h4>';
						$create_html_body .= $customers_input_firstname . "  " . $customers_input_lastname;
						if (isset($_SESSION['customer_id'])) $create_html_body .= " [" . $_SESSION['customer_id'] . "]";
						$create_html_body .= "<br>" . BS5_CUSTOMERS_REMIND_EMAIL_1 . "<br><br>";
						$create_html_body .= HEADER_ARTICLE . ": " . $product->data['products_name'] . "<br>";
						$create_html_body .= HEADER_MODEL . ": " . $product->data['products_model'] . "<br><br>";
						$create_html_body .= "Link: " . HTTP_SERVER . DIR_WS_CATALOG . FILENAME_PRODUCT_INFO . "?products_id=" . $product->data['products_id'] . "<br><br>";
		
						$create_text_body = STORE_NAME . "\n\n";
						$create_text_body .= BS5_CUSTOMERS_REMIND_EMAIL_HEADING . ":\n--------------------\n";
						$create_text_body .= $customers_input_firstname . "  " . $customers_input_lastname;
						if (isset($_SESSION['customer_id'])) $create_html_body .= " [" . $_SESSION['customer_id'] . "]";
						$create_text_body .= "\n" . BS5_CUSTOMERS_REMIND_EMAIL_1 . "\n\n";
						$create_text_body .= HEADER_ARTICLE . ": " . $product->data['products_name'] . "\n";
						$create_text_body .= HEADER_MODEL . ": " . $product->data['products_model'] . "\n\n";
						$create_text_body .= "Link: " . HTTP_SERVER . DIR_WS_CATALOG . FILENAME_PRODUCT_INFO . "?products_id=" . $product->data['products_id'] . "\n\n";
		
						// EMAIL GENERIEREN
						xtc_php_mail(
							EMAIL_SUPPORT_ADDRESS, //von emailadresse
							EMAIL_SUPPORT_NAME, //von emailname
							CONTACT_US_EMAIL_ADDRESS,  //an emailadresse
							CONTACT_US_NAME, //an emailname
							CONTACT_US_FORWARDING_STRING, //bcc
							'', //antwortadresse
							'', //antwortname
							'', //anhang 1
							'', //antwortname
							BS5_CUSTOMERS_REMIND_TITLE, //emailbetreff
							$create_html_body, // htmlnachricht
							$create_text_body // textnachricht
						);
					}

				} else {
	        $smarty->assign('SUCCESS_MESSAGE', '1');
	      }

	    } else {

				if (in_array('reminder', $use_captcha) && (!isset($_SESSION['customer_id']) || MODULE_CAPTCHA_LOGGED_IN == 'True')) {
					$smarty->assign('VVIMG', $mod_captcha->get_image_code());
					$smarty->assign('INPUT_CODE', $mod_captcha->get_input_code());
				}

				$idStr = '<input type="hidden" name="products_id" value="'.$products_id.'"/><input type="hidden" name="action" value="add_remind"/>';

				$smarty->assign('FORM_ACTION_REMIND', xtc_draw_form('bs5_customers_remind', xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND, xtc_get_all_get_params(array('action')), 'SSL'), 'post', 'class="form-horizontal"').secure_form('bs5_customers_remind').$idStr);

				$firstname = isset($_POST['customers_input_firstname']) ? xtc_db_prepare_input($_POST['customers_input_firstname']) : (isset($_SESSION['customer_first_name']) ? $_SESSION['customer_first_name'] : '');
				$lastname = isset($_POST['customers_input_lastname']) ? xtc_db_prepare_input($_POST['customers_input_lastname']) : (isset($_SESSION['customer_last_name']) ? $_SESSION['customer_last_name'] : '');
				$mail = isset($_POST['customers_input_email']) ? xtc_db_prepare_input($_POST['customers_input_email']) : (isset($_SESSION['customer_email_address']) ? $_SESSION['customer_email_address'] : '');
				$st = isset($_POST['customers_input_st']) ? xtc_db_prepare_input($_POST['customers_input_st']) : 1;

				$smarty->assign('CUSTOMERS_FIRSTNAME_INPUT', xtc_draw_input_field('customers_input_firstname', $firstname, 'id="firstname" class="form-control"'));
				$smarty->assign('CUSTOMERS_LASTNAME_INPUT', xtc_draw_input_field('customers_input_lastname', $lastname, 'id="lastname" class="form-control"'));
				$smarty->assign('CUSTOMERS_MAIL_INPUT', xtc_draw_input_field('customers_input_email', $mail, 'id="email" class="form-control"'));
				$smarty->assign('CUSTOMERS_INPUT_ST', xtc_draw_input_field('customers_input_st', $st, 'id="qty" class="form-control"'));

        $smarty->assign('FORM_END_REMIND', '</form>');
				if (DISPLAY_PRIVACY_CHECK == 'true') {
					if (!isset($_SESSION['customer_email_address']) || (isset($_SESSION['customer_email_address']) && BS5_CUSTOMERS_REMIND_PRIVACY_CHECK_REGISTERED == 'true')) {
						$smarty->assign('PRIVACY_CHECKBOX', xtc_draw_checkbox_field('privacy', 'privacy', $privacy, 'id="privacy" class="form-check-input"'));
					}
				}
				$smarty->assign('PRIVACY_LINK', $main->getContentLink(2, MORE_INFO, $request_type));

	      $smarty->assign('SUCCESS_MESSAGE', '0');
	      $smarty->assign('BUTTON_SUBMIT_REMIND', xtc_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
    	}

			$smarty->assign('error_message', $error_message);
			if (!empty($message_class)) {
				$smarty->assign('message_class', $message_class);
			}

		}

		$smarty->assign('language', $_SESSION['language']);
		$smarty->caching = 0;

		if (isset($_GET['view'])) {
			$products_link = xtc_href_link(FILENAME_PRODUCT_INFO, xtc_product_link($product->data['products_id'], $product->data['products_name']));
			$smarty->assign('BUTTON_BACK', '<a href="' . $products_link . '">' . xtc_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>');
			$smarty->assign('full', true);
			$main_content = $smarty->fetch(CURRENT_TEMPLATE . '/module/reminder.html');
			$smarty->assign('main_content', $main_content);
			$smarty->display(CURRENT_TEMPLATE . '/index.html');
			include('includes/application_bottom.php');
		} else {
			$smarty->display(CURRENT_TEMPLATE . '/module/reminder.html');
			include('includes/application_bottom.php');
		}
	
	}
}
