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

define('REMINDER_REG_MAIL_ADMIN', false);

// include needed function
require_once (DIR_FS_INC.'ip_clearing.inc.php');

// include needed classes
require_once (DIR_FS_CATALOG.'includes/classes/modified_captcha.php');


class bs5_customersremind {
  var $message, $message_class;


  function __construct() {
    $this->auto = false;
    $this->remove = false;
    
    $captcha_class = CAPTCHA_MOD_CLASS;
    $this->mod_captcha = $captcha_class::getInstance();
  }


  function RemoveFromList($key, $mail) {
    if (!xtc_not_null($key) && $this->remove === false) {
      $this->message = TEXT_EMAIL_ACTIVE_ERROR;
      $this->message_class = 'error';
    } else {
      $where = '';
      if ($this->remove === false) {
        $where = " AND mail_key = '".xtc_db_input($key)."' ";
      }
      $check_mail_query = xtc_db_query("SELECT customers_email_address,
                                               customers_id,
                                               mail_key
                                          FROM ".TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS."
                                         WHERE MD5(customers_email_address) = '".xtc_db_input($mail)."'
                                               ".$where);
      if (xtc_db_num_rows($check_mail_query) > 0) {
        $check_mail = xtc_db_fetch_array($check_mail_query);
        $this->sendRequestMail($check_mail['customers_email_address'], 'unsubscribe');

        $sql_data_array = array (
          'mail_status' => '2',
          'mail_key' => '',
          'date_added' => '',
          'ip_date_added' => '',
          'date_confirmed' => '',
          'ip_date_confirmed' => '',
        );
        xtc_db_perform(TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS, $sql_data_array, 'update', "customers_email_address = '".xtc_db_input($check_mail['customers_email_address'])."'".$where);

				// Einträge Kundenerinnerung löschen
				$del_customers_reminds = "DELETE FROM
				                   bs5_customers_remind
				                 WHERE
				                   customers_email_address = '".xtc_db_input($check_mail['customers_email_address'])."'";

				xtc_db_query($del_customers_reminds);

        $this->message = BS5_TEXT_EMAIL_DEL_REMINDER;
        $this->message_class = 'info';
      } else {
        $this->message = TEXT_EMAIL_DEL_ERROR;
        $this->message_class = 'error';
      }
    }
  }


  function ActivateAddress($key, $mail) {
    if (!xtc_not_null($key)) {
      $this->message = TEXT_EMAIL_ACTIVE_ERROR;
      $this->message_class = 'error';
    } else {
      $check_mail_query = xtc_db_query("SELECT mail_key,
                                               mail_status,
                                               customers_email_address
                                          FROM ".TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS."
                                         WHERE MD5(customers_email_address) = '".xtc_db_input($mail)."'");
      if (xtc_db_num_rows($check_mail_query) > 0) {
        $check_mail = xtc_db_fetch_array($check_mail_query);
        if($check_mail['mail_status'] == '1') {
          $this->message = BS5_TEXT_EMAIL_EXIST_REMINDER;
          $this->message_class = 'error';
        } elseif ($check_mail['mail_key'] != $_GET['key']) {
          $this->message = TEXT_EMAIL_ACTIVE_ERROR;
          $this->message_class = 'error';
        } else {
          $sql_data_array = array(
            'mail_status' => '1',
            'date_confirmed' => 'now()',
            'ip_date_confirmed' => ip_clearing($_SESSION['tracking']['ip'])
          );
          xtc_db_perform(TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS, $sql_data_array, 'update', "customers_email_address = '".xtc_db_input($check_mail['customers_email_address'])."'");
          $this->sendRequestMail($check_mail['customers_email_address'], 'subscribe');
          $this->message = BS5_TEXT_EMAIL_ACTIVE_REMINDER;
          $this->message_class = 'info';          
        }
      } else {
        $this->message = TEXT_EMAIL_NOT_EXIST;
        $this->message_class = 'error';
      }
    }
  }


  function AddUserAuto($mail) {
    $this->auto = true;
    $this->AddUser('inp', '', $mail);
  }


  function AddUser($check, $postCode, $mail) {
    require_once (DIR_FS_INC.'xtc_validate_email.inc.php');

    if ($check != 'inp' && $check != 'del') {
      $this->message = ERROR_MAIL;
      $this->message_class = 'error';
    } elseif (xtc_validate_email($mail) == false) {
      $this->message = ENTRY_EMAIL_ADDRESS_CHECK_ERROR;
      $this->message_class = 'error';
    } else {
      $this->generateCode();
      if ($this->mod_captcha->validate($postCode) === true || $this->auto === true) {

        if ($check == 'inp') {
          $check_mail_query = xtc_db_query("SELECT customers_email_address,
                                                   mail_status 
                                              FROM ".TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS."
                                             WHERE customers_email_address = '".xtc_db_input($mail)."'");
          if (xtc_db_num_rows($check_mail_query) > 0) {

            $check_mail = xtc_db_fetch_array($check_mail_query);

            if ($check_mail['mail_status'] != '1') {

              if (SEND_EMAILS == 'true') {
                $sql_data_array = array(
                  'mail_key' => $this->vlCode,
                  'mail_status' => '0',
                  'date_added' => 'now()',
                  'ip_date_added' => ip_clearing($_SESSION['tracking']['ip'])
                );
                xtc_db_perform(TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS, $sql_data_array, 'update', "customers_email_address = '".xtc_db_input($mail)."'");
                $this->sendRequestMail($mail);
	              $this->message = BS5_TEXT_EMAIL_EXIST_NO_REMINDER;
	              $this->message_class = 'info';
              }

            } else {
							// Email registriert
              $this->message = BS5_TEXT_EMAIL_EXIST_REMINDER;
              $this->message_class = 'success';
            }
          } else {
            $check_customer_mail_query = xtc_db_query("SELECT customers_id,
                                                              customers_status,
                                                              customers_firstname,
                                                              customers_lastname,
                                                              customers_email_address
                                                         FROM ".TABLE_CUSTOMERS."
                                                        WHERE customers_email_address = '".xtc_db_input($mail)."'");
            if (xtc_db_num_rows($check_customer_mail_query) > 0) {
              $check_customer = xtc_db_fetch_array($check_customer_mail_query);
              $customers_id = $check_customer['customers_id'];
              $customers_status = $check_customer['customers_status'];
              $customers_firstname = $check_customer['customers_firstname'];
              $customers_lastname = $check_customer['customers_lastname'];
            } else {
              $customers_id = '0';
              $customers_status = '1';
              $customers_firstname = TEXT_CUSTOMER_GUEST;
              $customers_lastname = '';
            }

            $sql_data_array = array(
              'customers_email_address' => $mail,
              'customers_id' => $customers_id,
              'customers_status' => $customers_status,
              'customers_firstname' => $customers_firstname,
              'customers_lastname' => $customers_lastname,
              'mail_status' => '0',
              'mail_key' => $this->vlCode,
              'date_added' => 'now()',
              'ip_date_added' => ip_clearing($_SESSION['tracking']['ip'])
            );
            xtc_db_perform(TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS, $sql_data_array);

            if (SEND_EMAILS == 'true') {
              $this->sendRequestMail($mail);
	            $this->message = BS5_TEXT_EMAIL_INPUT_REMINDER;
	            $this->message_class = 'info';
            }
          }
        }

        if ($check == 'del') {
          $this->remove = true;
          $this->RemoveFromList('', md5($mail));
        }

      } else {
        $this->message = TEXT_WRONG_CODE;
        $this->message_class = 'error';
      }
    }
  }


  function sendRequestMail($mail, $action = 'opt_in') {
    
    $sendmail = false;
    $smarty = new Smarty();
    
    $function = 'xtc_href_link';
    if (function_exists('xtc_href_link_from_admin')) {
      $function = 'xtc_href_link_from_admin';
    }

    $sql_data_array = array(
      'customers_email_address' => $mail,
      'customers_action' => $action,
      'ip_address' => ((defined('RUN_MODE_ADMIN')) ? 'Admin' : ip_clearing($_SESSION['tracking']['ip'])),
      'date_added' => 'now()'
    );
    xtc_db_perform(TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS_HISTORY, $sql_data_array);
    
    switch ($action) {
      case 'opt_in':
        $sendmail = true;
        $link = $function(FILENAME_BS5_CUSTOMERS_REMIND, 'action=activate&language='.$_SESSION['language_code'].'&email='.md5($mail).'&key='.$this->vlCode, 'NONSSL', false);
        $smarty->assign('EMAIL', xtc_db_input($mail));
        $smarty->assign('LINK', $link);
        
        //foreach(auto_include(DIR_FS_CATALOG.'includes/extra/newsletter/opt_in/','php') as $file) require_once ($file);
        break;
      
      case 'unsubscribe':
        //foreach(auto_include(DIR_FS_CATALOG.'includes/extra/newsletter/unsubscribe/','php') as $file) require_once ($file);
        break;
        
      case 'subscribe':
        
        //foreach(auto_include(DIR_FS_CATALOG.'includes/extra/newsletter/subscribe/','php') as $file) require_once ($file);
        break;
    }
    
    if ($sendmail === true) {
      $smarty->assign('language', $_SESSION['language']);
      $smarty->assign('tpl_path', HTTP_SERVER.DIR_WS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/');
      $smarty->assign('logo_path', HTTP_SERVER.DIR_WS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/img/');
      
      $smarty->caching = 0;
      $html_mail = $smarty->fetch(CURRENT_TEMPLATE.'/mail/'.$_SESSION['language'].'/remind_activate_mail.html');
      $txt_mail = $smarty->fetch(CURRENT_TEMPLATE.'/mail/'.$_SESSION['language'].'/remind_activate_mail.txt');
      
      xtc_php_mail(EMAIL_SUPPORT_ADDRESS,
                   EMAIL_SUPPORT_NAME,
                   xtc_db_input($mail),
                   '',
                   '',
                   EMAIL_SUPPORT_REPLY_ADDRESS,
                   EMAIL_SUPPORT_REPLY_ADDRESS_NAME,
                   REMINDER_REG_MAIL_ADMIN === true ? EMAIL_SUPPORT_ADDRESS : '',
                   REMINDER_REG_MAIL_ADMIN === true ? EMAIL_SUPPORT_NAME : '',
                   BS5_TEXT_EMAIL_SUBJECT_REMINDER,
                   $html_mail,
                   $txt_mail
                   );
    }
  }


  function generateCode() {
    require_once (DIR_FS_INC.'xtc_random_charcode.inc.php');
    $this->vlCode = xtc_random_charcode(32);
  }

}
