<?php
/* ------------------------------------------------------------
  Module "Bootstrap 5 Template-Manager" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

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

$sendmail_asap = defined('BS5_CUSTOMERS_REMIND_SENDMAIL_ASAP') ? BS5_CUSTOMERS_REMIND_SENDMAIL_ASAP : 'false'; // true - wenn bei jedem Seitenaufruf die Tabelle "Kundenerinnerung" mit dem "Lagerbestand" abgeglichen werden soll

if ($sendmail_asap === 'true') {
  sendremindmails();
}

function sendremindmails($prodId = '', $mail = '')
{

  $and = $where = '';
  if ($prodId != '') $and = ' AND p.products_id = ' . (int)$prodId;
  if ($mail != '') $where = " WHERE cr.customers_email_address = '" . xtc_db_input($mail) . "' ";

  $strstockQuery = "SELECT cr.*,
                          p.products_id,
                          p.products_quantity,
                          p.products_model,
                          p.products_image
                    FROM " . TABLE_BS5_CUSTOMERS_REMIND . " cr
                    JOIN " . TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS . " crr
                          ON crr.mail_status = '1'
                          AND crr.customers_email_address = cr.customers_email_address
                    JOIN " . TABLE_PRODUCTS . " p
                          ON p.products_id = cr.products_id"
    . $and . "
                          AND p.products_quantity >= cr.customers_st"
    . $where;

  $resstockQuery = xtc_db_query($strstockQuery);

  if (xtc_db_num_rows($resstockQuery) > 0) {
    $objSmarty = new Smarty();
    $objSmarty->assign('tpl_path', 'templates/' . CURRENT_TEMPLATE . '/');
    $objSmarty->assign('logo_path', HTTP_SERVER . DIR_WS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/img/');
    $objSmarty->assign('STORE_NAME', STORE_NAME);
    $objSmarty->caching = false;

    if (BS5_CUSTOMERS_REMIND_SENDMAIL_MINSTOCK_STATUS == 'true' && $prodId == '' && $mail == '') {
      $minstockQuery = "SELECT sum(cr.customers_st) as stock, cr.products_id as products_id
                        FROM " . TABLE_BS5_CUSTOMERS_REMIND . " cr
                        JOIN " . TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS . " crr
                          ON crr.mail_status = '1'
                          AND crr.customers_email_address = cr.customers_email_address
                        GROUP BY products_id";

      $resminstockQuery = xtc_db_query($minstockQuery);
      $res = array();
      while ($minstock = xtc_db_fetch_array($resminstockQuery)) {
        $res[$minstock['products_id']] = round((int)$minstock['stock'] * (int)BS5_CUSTOMERS_REMIND_SENDMAIL_MINSTOCK / 100);
      }
    }

    while ($arrstock = xtc_db_fetch_array($resstockQuery)) {
      if (isset($res[$arrstock['products_id']]) && $arrstock['products_quantity'] < $res[$arrstock['products_id']]) continue;
      $objSmarty->assign('PRODUCTS_NAME', $arrstock['products_name']);
      $objSmarty->assign('PRODUCTS_MODEL', $arrstock['products_model']);
      $objSmarty->assign('CUSTOMERS_GENDER', $arrstock['customers_gender']);
      $objSmarty->assign('CUSTOMERS_FIRSTNAME', $arrstock['customers_firstname']);
      $objSmarty->assign('CUSTOMERS_LASTNAME', $arrstock['customers_lastname']);
      $objSmarty->assign('MAIL_HEAD1', $arrstock['mail_head1']);
      $objSmarty->assign('CUSTOMERS_LANGUAGE', $arrstock['customers_language']);
      $objSmarty->assign('CUSTOMERS_PRODUCTS_IMAGE', $arrstock['products_image']);

      $link = HTTP_SERVER . DIR_WS_CATALOG . FILENAME_PRODUCT_INFO . "?products_id=" . $arrstock['products_id'];
      $objSmarty->assign('LINK', $link);
      $objSmarty->assign('logo_path', HTTP_SERVER . DIR_WS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/img/');
      $objSmarty->assign('img_path', HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_THUMBNAIL_IMAGES . $arrstock['products_image']);

      $html_mail = $objSmarty->fetch(CURRENT_TEMPLATE . "/mail/" . $arrstock['customers_language'] . "/remind_mail.html");
      $txt_mail = $objSmarty->fetch(CURRENT_TEMPLATE . "/mail/" . $arrstock['customers_language'] . "/remind_mail.txt");

      $strMarkQuery = "DELETE FROM
                         " . TABLE_BS5_CUSTOMERS_REMIND . "
                       WHERE
                         remind_id = " . (int)$arrstock['remind_id'] . "
                       AND
                         customers_id = " . (int)$arrstock['customers_id'] . "
                       ";

      xtc_db_query($strMarkQuery);

      xtc_php_mail(
        EMAIL_SUPPORT_ADDRESS,
        EMAIL_SUPPORT_NAME, // from
        $arrstock['customers_email_address'],
        '', // to
        '', // bcc
        EMAIL_SUPPORT_REPLY_ADDRESS,
        EMAIL_SUPPORT_REPLY_ADDRESS_NAME, // reply-to
        '',
        '', // attachments
        STORE_NAME . ' - ' . $arrstock['mail_head1'], // subject
        $html_mail, // HTML content
        $txt_mail, // text-only content
        2
      );
    }
  }
  return true;
}

function sendactivationremindmails()
{
  $act_remind_query = xtc_db_query("SELECT customers_email_address,
                                           mail_key,
                                           date_added,
                                           act_remind
                                      FROM " . TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS . "
                                      WHERE mail_status = 0 AND act_remind < 2");
  if (xtc_db_num_rows($act_remind_query) > 0) {
    while ($act_remind = xtc_db_fetch_array($act_remind_query)) {

      if (($act_remind['act_remind'] == 0 && strtotime($act_remind['date_added']) < strtotime('-' . (int)BS5_CUSTOMERS_REMIND_ACTIVATION_REMIND . ' days'))
        || ($act_remind['act_remind'] == 1 && strtotime($act_remind['date_added']) < strtotime('-' . ((int)BS5_CUSTOMERS_REMIND_ACTIVATION_REMIND * 2) . ' days'))
      ) {
        $obj1Smarty = new Smarty();

        $link = xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND, 'action=activate&language=' . $_SESSION['language_code'] . '&email=' . md5($act_remind['customers_email_address']) . '&key=' . $act_remind['mail_key'], 'NONSSL', false);
        $obj1Smarty->assign('EMAIL', $act_remind['customers_email_address']);
        $obj1Smarty->assign('LINK', $link);
        $obj1Smarty->assign('language', $_SESSION['language']);
        $obj1Smarty->assign('tpl_path', HTTP_SERVER . DIR_WS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/');
        $obj1Smarty->assign('logo_path', HTTP_SERVER . DIR_WS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/img/');

        $obj1Smarty->caching = 0;
        $html_mail = $obj1Smarty->fetch(CURRENT_TEMPLATE . '/mail/' . $_SESSION['language'] . '/remind_activate_mail.html');
        $txt_mail = $obj1Smarty->fetch(CURRENT_TEMPLATE . '/mail/' . $_SESSION['language'] . '/remind_activate_mail.txt');

        if (!defined('BS5_TEXT_EMAIL_SUBJECT_REMINDER')) {
          require_once(DIR_FS_CATALOG . 'lang/' . $_SESSION['language'] . '/extra/bs5_additional_modules.php');
        }

        xtc_php_mail(
          EMAIL_SUPPORT_ADDRESS,
          EMAIL_SUPPORT_NAME,
          $act_remind['customers_email_address'],
          '',
          '',
          EMAIL_SUPPORT_REPLY_ADDRESS,
          EMAIL_SUPPORT_REPLY_ADDRESS_NAME,
          '',
          '',
          STORE_NAME . ' - ' . BS5_TEXT_EMAIL_SUBJECT_REMINDER,
          $html_mail,
          $txt_mail,
          2
        );

        xtc_db_query("UPDATE " . TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS . " 
                         SET act_remind = '" . ($act_remind['act_remind'] + 1) . "'
                       WHERE customers_email_address = '" . $act_remind['customers_email_address'] . "'");
      }
    }
  }
  return true;
}
