<?php
/* -----------------------------------------------------------------------------------------
		Formvalidation for Account
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

	if ($messageStack->size('create_account') > 0) {
		$errs = $_SESSION['messageToStack']['create_account']['error'];
		$err_defs = array(
			array('text' => constant('ENTRY_GENDER_ERROR'), 'field' => 'gender'),
			array('text' => constant('ENTRY_FIRST_NAME_ERROR'), 'field' => 'firstname'),
			array('text' => constant('ENTRY_LAST_NAME_ERROR'), 'field' => 'lastname'),
			array('text' => constant('ENTRY_DATE_OF_BIRTH_ERROR'), 'field' => 'dob'),
			array('text' => constant('ENTRY_VAT_ERROR'), 'field' => 'vat'),
			array('text' => constant('ENTRY_EMAIL_ADDRESS_ERROR'), 'field' => 'email_address'),
			array('text' => constant('ENTRY_EMAIL_ADDRESS_CHECK_ERROR'), 'field' => 'email_address'),
			array('text' => constant('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS'), 'field' => 'email_address'),
			array('text' => constant('ENTRY_EMAIL_ERROR_NOT_MATCHING'), 'field' => 'confirm_email_address'),
			array('text' => constant('ENTRY_STREET_ADDRESS_ERROR'), 'field' => 'street_address'),
			array('text' => constant('ENTRY_POST_CODE_ERROR'), 'field' => 'postcode'),
			array('text' => constant('ENTRY_CITY_ERROR'), 'field' => 'city'),
			array('text' => constant('ENTRY_COUNTRY_ERROR'), 'field' => 'country'),
			array('text' => constant('ENTRY_STATE_ERROR_SELECT'), 'field' => 'state'),
			array('text' => constant('ENTRY_STATE_ERROR'), 'field' => 'state'),
			array('text' => constant('ENTRY_TELEPHONE_NUMBER_ERROR'), 'field' => 'telephone'),
			array('text' => sprintf(constant('ENTRY_PASSWORD_ERROR'), constant('ENTRY_PASSWORD_MIN_LENGTH')), 'field' => 'password'),
			array('text' => sprintf(constant('ENTRY_PASSWORD_ERROR_MIN_LOWER'), constant('POLICY_MIN_LOWER_CHARS')), 'field' => 'password'),
			array('text' => sprintf(constant('ENTRY_PASSWORD_ERROR_MIN_UPPER'), constant('POLICY_MIN_UPPER_CHARS')), 'field' => 'password'),
			array('text' => sprintf(constant('ENTRY_PASSWORD_ERROR_MIN_NUM'), constant('POLICY_MIN_NUMERIC_CHARS')), 'field' => 'password'),
			array('text' => sprintf(constant('ENTRY_PASSWORD_ERROR_MIN_CHAR'), constant('POLICY_MIN_SPECIAL_CHARS')), 'field' => 'password'),
			array('text' => constant('ENTRY_PASSWORD_CURRENT_ERROR'), 'field' => 'password'),
			array('text' => sprintf(constant('ENTRY_PASSWORD_NEW_ERROR'), constant('ENTRY_PASSWORD_MIN_LENGTH')), 'field' => 'password'),
			array('text' => constant('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING'), 'field' => 'password'),
			array('text' => constant('ENTRY_PASSWORD_ERROR_NOT_MATCHING'), 'field' => 'confirmation'),
			array('text' => constant('ENTRY_PRIVACY_ERROR'), 'field' => 'privacy'),
			array('text' => strip_tags(constant('ERROR_VVCODE'), '<b><strong>'), 'field' => 'vvcode'),
		);
		$formerrs = array();
		foreach ($errs as $key => $value) {
			for($i = 0; $i < sizeof($err_defs);$i++) {
				if (strpos($err_defs[$i]['text'], $value) !== false) {
					$formerrs[$err_defs[$i]['field']] = $err_defs[$i]['text'];
					unset($_SESSION['messageToStack']['create_account']['error'][$key]);
				}
			}
		}
		$smarty->assign('formerrs', $formerrs);
	}
