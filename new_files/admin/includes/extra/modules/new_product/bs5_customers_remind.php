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

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

if (defined('BS5_CUSTOMERS_REMIND') && BS5_CUSTOMERS_REMIND == 'true' && BS5_CUSTOMERS_REMIND_SENDMAIL_MINSTOCK_STATUS == 'true') {

  // berücksichtigt werden nur Kunden deren Mailadresse aktiviert wurde
  $minstockQuery = "SELECT count(cr.customers_st) as count, sum(cr.customers_st) as stock, cr.products_id
                        FROM ".TABLE_BS5_CUSTOMERS_REMIND." cr
                        JOIN ".TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS." crr
                          ON crr.mail_status = '1'
                          AND crr.customers_email_address = cr.customers_email_address
                        WHERE cr.products_id = " . $pInfo->products_id;

  $resminstockQuery = xtc_db_query($minstockQuery);
  $minstock = xtc_db_fetch_array($resminstockQuery);
  $sendstock = round((int)$minstock['stock'] * (int)BS5_CUSTOMERS_REMIND_SENDMAIL_MINSTOCK / 100);

  if ($minstock['count'] > 1 && $minstock['stock'] >= $sendstock && $pInfo->products_quantity < $sendstock) {
?>


    <table class="tableInput border0">
      <tr>
        <td colspan="2" class="error_message">
          <span class="c_remind"><u><?php echo BS5_BOX_CUSTOMERS_REMIND_SUB1 . ':</u>' . sprintf(BS5_CUSTOMERS_REMIND_MINSTOCK_INFO, $minstock['count'], $minstock['stock'], $sendstock); ?></span><br>
          <span class="pdg2">
            <input type="button" class="sendremindmails button but_red" title="<?php echo BS5_CUSTOMERS_REMIND_START_SENDING; ?>" value="<?php echo BS5_CUSTOMERS_REMIND_START_SENDING; ?>">
            <a class="button flt-r" style="font-size:10px;" onclick="this.blur();" href="<?php echo xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND); ?>"><?php echo BS5_BOX_CUSTOMERS_REMIND_SUB1; ?></a>
          </span>
        </td>
      </tr>
    </table>

    <script>
      $(document).ready(function() {
        $(".c_remind").closest("tr").detach().insertAfter($("[name='products_quantity']").closest("tr"));

        $('.sendremindmails').on('click', function() {
          $.confirm({
            title: 'Information',
            content: '<?php echo BS5_CUSTOMERS_REMIND_CONFIRMSEND; ?>',
            confirmButton: js_button_yes,
            cancelButton: js_button_cancel,
            columnClass: 'jalert-width',
            animation: 'none',
            confirm: function() {
              var $this = $(this);
              $.get('../ajax.php', {
                ext: 'bs5_customers_remind',
                prodId: <?php echo $pInfo->products_id; ?>,
                speed: 1
              }, function(data) {
                if (data != '' && data != undefined) {
                  $this.after('<?php echo xtc_image(DIR_WS_ICONS . ('tick.gif')); ?>');
                } else {
                  $this.after('AJAX-FEHLER');
                }
              });
            }
          });
          return false;
        });
      });
    </script>


<?php
  }
}
