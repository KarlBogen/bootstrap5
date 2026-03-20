<?php
/* ------------------------------------------------------------
  Module "Bootstrap 5 Template-Manager" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */
if (basename($PHP_SELF) == FILENAME_PRODUCT_REVIEWS) {
  if (defined('BS5_SENDMAIL_IF_NEW_REVIEW') && BS5_SENDMAIL_IF_NEW_REVIEW == 'true') {
    if (isset($_GET['newreview']) && $_GET['newreview'] == 'saved') {
      unset($_GET['newreview']);
      if (isset($_GET['products_id'])) {

        $create_html_body = '<h3>' . STORE_NAME . '</h3>';
        $create_html_body .= '<h4>' . BS5_TEXT_EMAIL_REVIEW_SUBJECT . '</h4>';
        $create_html_body .= "<br><br>" . sprintf(BS5_TEXT_EMAIL_REVIEW_BODY, (int)$_GET['products_id']) . "<br><br>";

        $create_text_body = STORE_NAME . "\n\n";
        $create_text_body .= BS5_TEXT_EMAIL_REVIEW_SUBJECT . ":\n--------------------\n";
        $create_text_body .= "\n\n" . sprintf(BS5_TEXT_EMAIL_REVIEW_BODY, (int)$_GET['products_id']) . "\n\n";

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
          BS5_TEXT_EMAIL_REVIEW_SUBJECT, //emailbetreff
          $create_html_body, // htmlnachricht
          $create_text_body, // textnachricht
          2
        );
      }
      xtc_redirect(xtc_href_link(FILENAME_PRODUCT_REVIEWS, 'products_id=' . (int)$_GET['products_id']));
    }
  }
}
