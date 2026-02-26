<?php
/* ------------------------------------------------------------
  Module "Bootstrap 5 Template-Manager" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

if (defined('BS5_SENDMAIL_IF_NEW_REVIEW') && BS5_SENDMAIL_IF_NEW_REVIEW == 'true') {
  if (isset($_POST['get_params'])) $_POST['get_params'] .= "&newreview=saved";
}
