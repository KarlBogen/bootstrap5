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

  require('includes/application_top.php');

  // include needed function
  require_once(DIR_FS_INC.'xtc_href_link_from_admin.inc.php');

  //display per page
  $cfg_max_display_results_key = 'MAX_DISPLAY_NEWSLETTER_RECIPIENTS_RESULTS';
  $page_max_display_results = xtc_cfg_save_max_display_results($cfg_max_display_results_key);

  $action = (isset($_GET['action']) ? $_GET['action'] : '');
  $page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
  $sorting = (isset($_GET['sorting']) ? $_GET['sorting'] : '');

  $customers_statuses_array = xtc_get_customers_statuses();
  $mail_statuses_array = array(
    array('id' => '', 'text' => TXT_ALL),
    array('id' => '1', 'text' => TXT_SUBSCRIBED),
    array('id' => '0', 'text' => TXT_UNCONFIRMED),
    array('id' => '2', 'text' => TXT_UNSUBSCRIBED),
  );

  if (xtc_not_null($sorting)) {
    switch ($sorting) {
      case 'email':
        $csort = 'customers_email_address ASC';
        break;
      case 'email-desc':
        $csort = 'customers_email_address DESC';
        break;
      case 'firstname':
        $csort = 'customers_firstname ASC';
        break;
      case 'firstname-desc':
        $csort = 'customers_firstname DESC';
        break;
      case 'lastname':
        $csort = 'customers_lastname ASC';
        break;
      case 'lastname-desc':
        $csort = 'customers_lastname DESC';
        break;
      case 'cstatus':
        $csort = 'customers_status_name ASC';
        break;
      case 'cstatus-desc':
        $csort = 'customers_status_name DESC';
        break;
      case 'status':
        $csort = 'mail_status ASC';
        break;
      case 'status-desc':
        $csort = 'mail_status DESC';
        break;
      case 'date_added':
        $csort = 'date_added ASC';
        break;
      case 'date_added-desc':
        $csort = 'date_added DESC';
        break;
      default:
        $csort = 'customers_email_address ASC';
        break;
    }
    $sort = " ORDER BY ".$csort.", mail_id ASC ";
  } else {
    $sort = " ORDER BY customers_email_address ASC, mail_id ";
  }

  $where = '';
  if (isset($_GET['cgroup']) && $_GET['cgroup'] != '') {
    $where .= " AND nr.customers_status = '".(int)$_GET['cgroup']."' ";
  }
  if (isset($_GET['status']) && $_GET['status'] != '') {
    $where .= " AND nr.mail_status = '".(int)$_GET['status']."' ";
  }
  if (isset($_GET['search']) && $_GET['search'] != '') {
    $where .= " AND (nr.customers_firstname LIKE '%".xtc_db_input($_GET['search'])."%'
                     OR nr.customers_lastname LIKE '%".xtc_db_input($_GET['search'])."%'
                     OR nr.customers_email_address LIKE '%".xtc_db_input($_GET['search'])."%')";
  }
  $where = strpos($where,' AND') !== false ? substr_replace($where,' WHERE',0,strlen(' AND')) : '';

  $reminder_query_raw = "SELECT nr.*,
                                  cs.customers_status_name
                             FROM ".TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS." nr
                        LEFT JOIN ".TABLE_CUSTOMERS_STATUS." cs
                                  ON cs.customers_status_id = nr.customers_status
                                     AND cs.language_id = '".(int)$_SESSION['languages_id']."'
                                  ".$where."
                                  ".$sort;

  if (xtc_not_null($action)) {
    switch ($action) {
      case 'remind':
        $mail = xtc_db_prepare_input($_GET['mail']);

        $check_mail_query = xtc_db_query("SELECT customers_email_address
                                            FROM ".TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS."
                                           WHERE MD5(customers_email_address) = '".xtc_db_input($mail)."'");
        if (xtc_db_num_rows($check_mail_query) > 0) {
          $check_mail = xtc_db_fetch_array($check_mail_query);

          require_once (DIR_FS_INC.'xtc_php_mail.inc.php');
          require_once (DIR_FS_CATALOG.DIR_WS_CLASSES.'bs5_class.customers_remind.php');
          $reminder = new bs5_customersremind();
          $reminder->AddUserAuto($check_mail['customers_email_address']);
          $messageStack->add_session($reminder->message, (($reminder->message_class == 'info') ? 'success' : $reminder->message_class));
        }
        xtc_redirect(xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action'))));
        break;

      case 'deleteconfirm':
        $mail = xtc_db_prepare_input($_GET['mail']);

        require_once (DIR_FS_CATALOG.DIR_WS_CLASSES.'bs5_class.customers_remind.php');
        $reminder = new bs5_customersremind();
        $reminder->remove = true;
        $reminder->RemoveFromList('', $mail);
        $messageStack->add_session($reminder->message, (($reminder->message_class == 'info') ? 'success' : $reminder->message_class));
        xtc_redirect(xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action'))));
        break;

      case 'export':
        $reminder_query = xtc_db_query($reminder_query_raw);
        if (xtc_db_num_rows($reminder_query) > 0) {
          header('Content-type: application/x-octet-stream');
          header('Content-disposition: attachment; filename=bs5_customers_remind_recipients.csv');

          $i = 0;
          while ($reminder = xtc_db_fetch_array($reminder_query)) {
            $reminder['customers_email_address_hash'] = md5($reminder['customers_email_address']);
            if ($i == 0) {
              $header = array();
              foreach ($reminder as $k => $v) {
                $header[] = $k;
              }
              echo implode(';', $header) . "\n";
            }
            echo implode(';', $reminder) . "\n";
            $i ++;
          }
          exit();
        }
        xtc_redirect(xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action'))));
        break;
    }
  }
  require (DIR_WS_INCLUDES.'head.php');
?>
</head>
<body>
  <!-- header //-->
  <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
  <!-- header_eof //-->
  <!-- body //-->
  <table class="tableBody">
    <tr>
      <?php //left_navigation
      if (USE_ADMIN_TOP_MENU == 'false') {
        echo '<td class="columnLeft2">'.PHP_EOL;
        echo '<!-- left_navigation //-->'.PHP_EOL;
        require_once(DIR_WS_INCLUDES . 'column_left.php');
        echo '<!-- left_navigation eof //-->'.PHP_EOL;
        echo '</td>'.PHP_EOL;
      }
      ?>
      <!-- body_text //-->
      <td class="boxCenter">
        <div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_news.png'); ?></div>
        <div class="pageHeading flt-l"><?php echo HEADING_TITLE; ?>
          <div class="main pdg2">Configuration</div>
        </div>

        <div class="main flt-l pdg2 mrg5" style="margin-left:20px;">
          <?php echo xtc_draw_form('cgroup', FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, '', 'get'); ?>
          <?php echo ENTRY_CUSTOMERS_STATUS . ' ' . xtc_draw_pull_down_menu('cgroup', array_merge(array (array ('id' => '', 'text' => TXT_ALL)), $customers_statuses_array), isset($_GET['cgroup']) ? $_GET['cgroup'] : '', 'onChange="this.form.submit();"'); ?>
          <?php echo ((isset($_GET['status']) && $_GET['status'] != '') ? xtc_draw_hidden_field('status', $_GET['status']) : '')?>
          <?php echo ((isset($_GET['search']) && $_GET['search'] != '') ? xtc_draw_hidden_field('search', $_GET['search']) : '')?>
          </form>
        </div>

        <div class="main flt-l pdg2 mrg5" style="margin-left:20px;">
          <?php echo xtc_draw_form('cgroup', FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, '', 'get'); ?>
          <?php echo ENTRY_MAIL_STATUS . ' ' . xtc_draw_pull_down_menu('status', $mail_statuses_array , isset($_GET['status']) ? $_GET['status'] : '', 'onChange="this.form.submit();"'); ?>
          <?php echo ((isset($_GET['cgroup']) && $_GET['cgroup'] != '') ? xtc_draw_hidden_field('cgroup', $_GET['cgroup']) : '')?>
          <?php echo ((isset($_GET['search']) && $_GET['search'] != '') ? xtc_draw_hidden_field('search', $_GET['search']) : '')?>
          </form>
        </div>

        <div class="main flt-l pdg2 mrg5" style="margin-left:20px;">
          <?php echo xtc_draw_form('search', FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, '', 'get'); ?>
          <?php echo ENTRY_SEARCH_CUSTOMER . ' ' . xtc_draw_input_field('search', isset($_GET['search']) ? $_GET['search'] : '', 'size="12"'); ?>
          <?php echo ((isset($_GET['status']) && $_GET['status'] != '') ? xtc_draw_hidden_field('status', $_GET['status']) : '')?>
          <?php echo ((isset($_GET['cgroup']) && $_GET['cgroup'] != '') ? xtc_draw_hidden_field('cgroup', $_GET['cgroup']) : '')?>
          </form>
        </div>

        <div class="main flt-l pdg2 mrg5" style="margin-left:20px;">
          <?php echo '<a class="button" style="margin-top:1px;" onclick="this.blur();" href="' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action')).'action=export') . '">' . BUTTON_EXPORT . '</a>'; ?>
        </div>

        <div class="clear"></div>
        <table class="tableCenter">
          <tr>
            <td class="boxCenterLeft">
              <table class="tableBoxCenter collapse">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_EMAIL.xtc_sorting(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, 'email'); ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_FIRSTNAME.xtc_sorting(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, 'firstname'); ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_LASTNAME.xtc_sorting(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, 'lastname'); ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CUSTOMERS_STATUS.xtc_sorting(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, 'cstatus'); ?></td>
                <td class="dataTableHeadingContent txta-c"><?php echo TABLE_HEADING_STATUS.xtc_sorting(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, 'status'); ?></td>
                <td class="dataTableHeadingContent txta-c"><?php echo TABLE_HEADING_DATE_ADDED.xtc_sorting(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, 'date_added'); ?></td>
                <td class="dataTableHeadingContent txta-r"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
              <?php
                $reminder_split = new splitPageResults($page, $page_max_display_results, $reminder_query_raw, $reminder_query_numrows);
                $reminder_query = xtc_db_query($reminder_query_raw);
                while ($reminder = xtc_db_fetch_array($reminder_query)) {
                  if ((!isset($_GET['mail']) || (isset($_GET['mail']) && $_GET['mail'] == md5($reminder['customers_email_address']))) && !isset($oInfo)) {
                    $oInfo = new objectInfo($reminder);
                  }

                  if (isset($oInfo) && is_object($oInfo) && ($reminder['customers_email_address'] == $oInfo->customers_email_address) ) {
                    echo '<tr class="dataTableRowSelected" onmouseover="this.style.cursor=\'pointer\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action','mail')).'mail=' . md5($oInfo->customers_email_address) . '&action=edit') . '\'">' . "\n";
                  } else {
                    echo '<tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'pointer\'" onmouseout="this.className=\'dataTableRow\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action','mail')).'mail=' . md5($reminder['customers_email_address'])) . '\'">' . "\n";
                  }
                  ?>
                  <td class="dataTableContent"><?php echo $reminder['customers_email_address']; ?></td>
                  <td class="dataTableContent"><?php echo $reminder['customers_firstname']; ?></td>
                  <td class="dataTableContent"><?php echo $reminder['customers_lastname']; ?></td>
                  <td class="dataTableContent"><?php echo $reminder['customers_status_name']; ?></td>
                  <td class="dataTableContent txta-c"><?php echo xtc_image(DIR_WS_ICONS.(($reminder['mail_status'] == '1') ? 'tick.gif' : (($reminder['mail_status'] == '2') ? 'cross.gif' : 'time_delete.png'))); ?></td>
                  <td class="dataTableContent txta-c"><?php echo xtc_date_short($reminder['date_added']); ?></td>
                  <td class="dataTableContent txta-r"><?php if (isset($oInfo) && is_object($oInfo) && ($reminder['customers_email_address'] == $oInfo->customers_email_address) ) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ICON_ARROW_RIGHT); } else { echo '<a href="' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, 'page=' . $page . '&mail=' . md5($reminder['customers_email_address'])) . '">' . xtc_image(DIR_WS_IMAGES . 'icon_arrow_grey.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
                </tr>
                <?php
                }
              ?>
            </table>

            <div class="smallText pdg2 flt-l"><?php echo $reminder_split->display_count($reminder_query_numrows, $page_max_display_results, $page, TEXT_DISPLAY_NUMBER_OF_CUSTOMERS_REMIND_RECIPIENTS); ?></div>
            <div class="smallText pdg2 flt-r"><?php echo $reminder_split->display_links($reminder_query_numrows, $page_max_display_results, MAX_DISPLAY_PAGE_LINKS, $page, xtc_get_all_get_params(array('page'))); ?></div>
            <?php echo draw_input_per_page($PHP_SELF,$cfg_max_display_results_key,$page_max_display_results); ?>
          </td>
          <?php
            $heading = array();
            $contents = array();
            switch ($action) {
              case 'delete':
                $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_CUSTOMER . '</b>');

                $contents = array('form' => xtc_draw_form('status', FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action','mail')).'mail=' . md5($oInfo->customers_email_address)  . '&action=deleteconfirm'));
                $contents[] = array('text' => TEXT_INFO_DELETE_INTRO);
                $contents[] = array('text' => '<br /><b>' . $oInfo->customers_email_address . '</b>');
                $contents[] = array('align' => 'center', 'text' => '<br /><input type="submit" class="button" onclick="this.blur();" value="' . BUTTON_UNSUBSCRIBE . '"/> <a class="button" onclick="this.blur();" href="' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action','mail')).'mail=' . md5($oInfo->customers_email_address)) . '">' . BUTTON_CANCEL . '</a>');
                break;

              default:
                if (isset($oInfo) && is_object($oInfo)) {
                  $heading[] = array('text' => '<b>' . $oInfo->customers_email_address . '</b>');

                  $contents[] = array('text' => '<b>' . TEXT_INFO_HISTORY_CUSTOMER . '</b>');
                  $reminder_history_string = '';
                  $reminder_history_query = xtc_db_query("SELECT *
                                                              FROM ".TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS_HISTORY."
                                                             WHERE customers_email_address = '".xtc_db_input($oInfo->customers_email_address)."'
                                                          ORDER BY date_added ASC");
                  if (xtc_db_num_rows($reminder_history_query) > 0) {
                    $reminder_history_string = '<table>';
                    while ($reminder_history = xtc_db_fetch_array($reminder_history_query)) {
                      $reminder_history_string .= '<tr>';
                      $reminder_history_string .= ' <td>'.xtc_date_short($reminder_history['date_added']).' '.date('H:i:s', strtotime($reminder_history['date_added'])).'</td>';
                      $reminder_history_string .= ' <td>'.$reminder_history['customers_action'].'</td>';
                      $reminder_history_string .= ' <td>'.$reminder_history['ip_address'].'</td>';
                      $reminder_history_string .= '</tr>';
                    }
                    $reminder_history_string .= '</table>';
                    $contents[] = array('text' => $reminder_history_string);
                  } else {
                    $contents[] = array('text' => TEXT_INFO_HISTORY_CUSTOMER_NONE);
                  }

                  if ($oInfo->mail_status == '1') {
                    $contents[] = array('align' => 'center', 'text' => '<a class="button" onclick="this.blur();" href="' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action','mail')).'mail=' . md5($oInfo->customers_email_address) . '&action=delete') . '">' . BUTTON_UNSUBSCRIBE . '</a>');
                  }

                  if ($oInfo->mail_status == '0') {
                    $contents[] = array('align' => 'center', 'text' => '<a class="button" onclick="this.blur();" href="' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action','mail')).'mail=' . md5($oInfo->customers_email_address) . '&action=remind') . '">' . BUTTON_REMIND . '</a>');
                    $contents[] = array('align' => 'center', 'text' => '<a class="button" onclick="this.blur();" href="' . xtc_href_link(FILENAME_BS5_CUSTOMERS_REMIND_RECIPIENTS, xtc_get_all_get_params(array('action','mail')).'mail=' . md5($oInfo->customers_email_address) . '&action=delete') . '">' . BUTTON_UNSUBSCRIBE . '</a>');
                  }
                }
                break;
            }

            if (xtc_not_null($heading) && xtc_not_null($contents)) {
              echo '            <td class="boxRight">' . "\n";
              $box = new box;
              echo $box->infoBox($heading, $contents);
              echo '            </td>' . "\n";
            }
          ?>
          </tr>
        </table>
      </td>
      <!-- body_text_eof //-->
    </tr>
  </table>
  <!-- body_eof //-->
  <!-- footer //-->
  <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
  <!-- footer_eof //-->
  <br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>