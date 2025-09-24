<?php
/* ------------------------------------------------------------
  Module "Bootstrap 5 Template-Manager" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */


defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

class bs5_tpl_manager
{

  public $code;
  public $title;
  public $description;
  public $sort_order;
  public $enabled;
  public $_check;
  public $version;

  public function __construct()
  {
    $this->version = '1.1.16';
    // Wichtiger Hinweis: bei Versionsänderung muss die Versionsnummer auch in admin/bs5_tpl_manager_config.php Zeile 111 geändert werden.
    // Wichtiger Hinweis: neu hinzugekommene Konstante in "config/config.php" eintragen.
    // if (!defined('MODULE_BS5_TPL_MANAGER_STATUS') || MODULE_BS5_TPL_MANAGER_STATUS != 'true' || !defined('BS5_SHOW_PAYPAL_IN_BOX_CART')) {
    // Damit wird die Fehlermeldung zu einer fehlenden Konstante vermieden!
    $this->code = 'bs5_tpl_manager';
    $this->title = MODULE_BS5_TPL_MANAGER_TEXT_TITLE . ' © by <a href="https://github.com/KarlBogen" target="_blank" style="color: #e67e22; font-weight: bold;">Karl</a> - Version: ' . (defined('MODULE_BS5_TPL_MANAGER_VERSION') ? MODULE_BS5_TPL_MANAGER_VERSION : '');
    $this->description = '';
    if (defined('MODULE_BS5_TPL_MANAGER_STATUS') && (!defined('MODULE_BS5_TPL_MANAGER_VERSION') || version_compare(MODULE_BS5_TPL_MANAGER_VERSION, $this->version, '<')))
    {
        $this->description .= "<script>$('.main').after('" . sprintf(MODULE_BS5_TPL_MANAGER_VERSION_ERROR, $this->version) . "');</script>";
        $this->description .= '<a class="button btnbox but_green" style="text-align:center;" onclick="this.blur();" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=update') . '">Update</a><br /><br />';
    }
    $bs5_tpl = defined('BS5_CURRENT_TEMPLATE') && BS5_CURRENT_TEMPLATE != '' ? BS5_CURRENT_TEMPLATE : 'bootstrap5';
    $this->description .= '<a class="button btnbox but_red" style="text-align:center;" onclick="return confirmLink(\'' . sprintf(MODULE_BS5_TPL_MANAGER_DELETE_CONFIRM, $bs5_tpl) . '\', \'\' ,this);" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=custom') . '">' . MODULE_BS5_TPL_MANAGER_DELETE_BUTTON . '</a><br />';
    $this->description .= MODULE_BS5_TPL_MANAGER_TEXT_DESCRIPTION;
    $this->sort_order = defined('MODULE_BS5_TPL_MANAGER_SORT_ORDER') ? MODULE_BS5_TPL_MANAGER_SORT_ORDER : 0;
    $this->enabled = ((defined('MODULE_BS5_TPL_MANAGER_STATUS') && MODULE_BS5_TPL_MANAGER_STATUS == 'true') ? true : false);
  }

  public function process($file) {}

  public function display()
  {
    return array(
      'text' => '<br />' .
        '<div><strong>' . MODULE_BS5_TPL_MANAGER_STATUS_INFO . '</strong></div>' .
        '<br /><br />' .
        '<div align="center">' . xtc_button(BUTTON_SAVE) .
        xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=bs5_tpl_manager')) . '</div>'
    );
  }

  public function check()
  {
    if (!isset($this->_check)) {
      if (defined('MODULE_BS5_TPL_MANAGER_STATUS')) {
        $this->_check = true;
      } else {
        $check_query = xtc_db_query("SELECT configuration_value
                                       FROM " . TABLE_CONFIGURATION . "
                                      WHERE configuration_key = 'MODULE_BS5_TPL_MANAGER_STATUS'");
        $this->_check = xtc_db_num_rows($check_query);
      }
    }
    return $this->_check;
  }

  public function install()
  {
    global $messageStack;

    if (!$this->install_table_config()) {
      $this->remove_tables(1);
      return false;
    }

    if (!$this->install_table_theme()) {
      $this->remove_tables(2);
      return false;
    }

    if (!$this->install_table_configuration()) {
      $this->remove_tables(3);
      return false;
    }

    if (!$this->install_table_admin_access()) {
      $this->remove_tables(4);
      return false;
    }

    if (!$this->install_additional_modules()) {
      $this->remove_tables(4);
      return false;
    }

    if (!$this->install_updates_and_news()) {
      $this->remove_tables(4);
      return false;
    }

    // remove obsolete files or dirs - if exists
    $this->remove_obsolete_files_or_dirs();

    $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_FINISHED, 'success');
  }

  public function update()
  {
    global $messageStack;

    $update = true;
    $update = $this->install_table_admin_access();
    $update = $this->check_table_configuration();
    $update = $this->update_table_config();
    $update = $this->install_updates_and_news();
    $update = $this->remove_obsolete_files_or_dirs();
    if ($update == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_UPDATE_FINISHED, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_UPDATE_ERR, 'error');
    }
  }

  public function custom()
  {
    global $messageStack;

    $bs5_tpl = defined('BS5_CURRENT_TEMPLATE') && BS5_CURRENT_TEMPLATE != '' ? BS5_CURRENT_TEMPLATE : 'bootstrap5';

    // Standardtemplate prüfen
    if (CURRENT_TEMPLATE == $bs5_tpl) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_DELETE_STDTPL_ERR, 'error');
      return false;
    }

    $result = true;
    // Systemmodule deinstallieren
    if (defined('MODULE_BS5_TPL_MANAGER_STATUS')) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_START_DELETE_TABLES, 'success');
      if (!$this->remove()) {
        $result = false;
      }
    }

    // Dateien definieren
    $shop_path = DIR_FS_CATALOG;
    $dirs_and_files = array();
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'bs5_banner_manager.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'bs5_customers_remind_recipients.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'bs5_tpl_manager_config.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'bs5_tpl_manager_theme.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'bs5_tpl_manager_theme_preview.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/bs5_template_manager';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/extra/application_top/application_top_begin/bs5_tpl_manager_config.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/extra/modules/new_product/bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/extra/filenames/bs5_tpl_manager.php';
    $dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/extra/menu/bs5_tpl_manager.php';

    $dirs_and_files[] = $shop_path . 'api/scheduled_tasks/modules/bs5_send_customers_remind.php';

    $dirs_and_files[] = $shop_path . 'includes/classes/bs5_class.customers_remind.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/ajax/bs5_awids_rating.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/ajax/bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/ajax/bs5_get_subcat.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/application_bottom/bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/application_top/application_top_begin/bs5_tpl_manager_config.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/application_top_callback/application_top_callback_begin/bs5_tpl_manager_config.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/cart_actions/add_product_before_redirect/bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/cart_actions/add_product_prepare_post/bs5_attributes_default.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/database_tables/bs5_tpl_manager.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/default/categories_smarty/bs5_banners.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/default/center_modules/bs5_banners.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/define_add_select/bs5_define_add_select.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/filenames/bs5_additional_modules.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/categories_listing/categories_content/bs5_remove_empty_categories.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/metatags_data/bs5_metatags.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/order_details_cart_attributes/bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/order_details_cart_content/bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/product_info_end/zzz_bs5_additional_module_links.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/product_info_end/zzz_bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/product_listing_begin/bs5_banners.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/products_attributes_data/bs5_attribute_price_updater.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/products_attributes_end/bs5_modulfux_attributes_default.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/shopping_cart/cart_requirements/bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'includes/modules/bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . 'includes/modules/product/bs5_checkifnewproduct.php';

    $dirs_and_files[] = $shop_path . 'lang/english/admin/bs5_banner_manager.php';
    $dirs_and_files[] = $shop_path . 'lang/english/admin/bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . 'lang/english/admin/bs5_customers_remind_recipients.php';
    $dirs_and_files[] = $shop_path . 'lang/english/admin/bs5_tpl_manager_config.php';
    $dirs_and_files[] = $shop_path . 'lang/english/admin/bs5_tpl_manager_theme.php';
    $dirs_and_files[] = $shop_path . 'lang/english/extra/admin/bs5_tpl_manager.php';
    $dirs_and_files[] = $shop_path . 'lang/english/extra/bs5_additional_modules.php';
    $dirs_and_files[] = $shop_path . 'lang/english/extra/bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'lang/english/extra/bs5_labels.php';
    $dirs_and_files[] = $shop_path . 'lang/english/modules/system/bs5_tpl_manager.php';

    $dirs_and_files[] = $shop_path . 'lang/german/admin/bs5_banner_manager.php';
    $dirs_and_files[] = $shop_path . 'lang/german/admin/bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . 'lang/german/admin/bs5_customers_remind_recipients.php';
    $dirs_and_files[] = $shop_path . 'lang/german/admin/bs5_tpl_manager_config.php';
    $dirs_and_files[] = $shop_path . 'lang/german/admin/bs5_tpl_manager_theme.php';
    $dirs_and_files[] = $shop_path . 'lang/german/extra/bs5_additional_modules.php';
    $dirs_and_files[] = $shop_path . 'lang/german/extra/bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'lang/german/extra/bs5_labels.php';
    $dirs_and_files[] = $shop_path . 'lang/german/extra/admin/bs5_tpl_manager.php';
    $dirs_and_files[] = $shop_path . 'lang/german/modules/system/bs5_tpl_manager.php';

    if ($bs5_tpl != '') $dirs_and_files[] = $shop_path . 'templates/' . $bs5_tpl;
    if ($bs5_tpl != 'bootstrap5') $dirs_and_files[] = $shop_path . 'templates/bootstrap5';
    if ($bs5_tpl != 'bootstrap5a') $dirs_and_files[] = $shop_path . 'templates/bootstrap5a';

    $dirs_and_files[] = $shop_path . 'bs5_cheaply_see.php';
    $dirs_and_files[] = $shop_path . 'bs5_product_inquiry.php';
    $dirs_and_files[] = $shop_path . 'bs5_customers_remind.php';
    $dirs_and_files[] = $shop_path . 'bs5-popup_reviews.php';

    // Dateien löschen
    foreach ($dirs_and_files as $dir_or_file) {
      if (!$this->rrmdir($dir_or_file)) {
        $messageStack->add_session($dir_or_file . MODULE_BS5_TPL_MANAGER_DELETE_FILE_ERR, 'error');
        $result = false;
      }
    }

    if ($result == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_DELETE_SUCCESS, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_DELETE_ERR, 'error');
    }

    // Datei selbst löschen
    unlink($shop_path . DIR_ADMIN . 'includes/modules/system/bs5_tpl_manager.php');
    xtc_redirect(xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system'));
  }

  public function remove()
  {
    global $messageStack;
    if ($this->remove_tables(4)) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_DEINSTALL_FINISHED, 'success');
      return true;
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_DEINSTALL_ERR, 'error');
    }
  }

  public function keys()
  {
    $key = array(
      'MODULE_BS5_TPL_MANAGER_STATUS',
    );

    return $key;
  }

  protected function rrmdir($dir)
  {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir . "/" . $object) == "dir") $this->rrmdir($dir . "/" . $object);
          else unlink($dir . "/" . $object);
        }
      }
      reset($objects);
      rmdir($dir);
      return true;
    } elseif (is_file($dir)) {
      unlink($dir);
      return true;
    }
  }

  protected function get_values_config()
  {
    $values_config = array();

    $values_config[] = "('BS5_SHOW_TOP1', 'true')";
    $values_config[] = "('BS5_SHOW_TOP2', 'true')";
    $values_config[] = "('BS5_SHOW_TOP3', 'true')";
    $values_config[] = "('BS5_SHOW_TOP4', 'true')";
    $values_config[] = "('BS5_SHOW_JS_DISABLED', 'true')";
    $values_config[] = "('BS5_SHOP_LOGO', 'img/logo_head.png')";
    $values_config[] = "('BS5_SHOW_ICON_WITH_NAMES', 'true')";
    $values_config[] = "('BS5_MENUCASE', 1)";
    $values_config[] = "('BS5_SHOW_HOMEBUTTON_IN_TOPCATMENU', 'true')";
    $values_config[] = "('BS5_ADD_LINK_IN_TOPCATMENU_LAST', '')";
    $values_config[] = "('BS5_KK_MEGAS', '')";
    $values_config[] = "('BS5_CATEGORIESMENU_MAXLEVEL', 'false')";
    $values_config[] = "('BS5_MANUFACTURERS_LINK', 'true')";
    $values_config[] = "('BS5_SPECIALS_CATEGORIES', 'true')";
    $values_config[] = "('BS5_WHATSNEW_CATEGORIES', 'true')";
    $values_config[] = "('BS5_WHATSNEW_SPECIALS_UPPERCASE', 'false')";
    $values_config[] = "('BS5_HIDE_EMPTY_CATEGORIES', 'false')";
    $values_config[] = "('BS5_CATEGORIESMENU_AJAX_SCROLL', 'true')";
    $values_config[] = "('BS5_CAROUSEL_SHOW', 'shop')";
    $values_config[] = "('BS5_CAROUSEL_FADE', 'true')";
    $values_config[] = "('BS5_CAROUSEL_TITLE', 'true')";
    $values_config[] = "('BS5_TOP_PROD_IN_SLIDER', 'true')";
    $values_config[] = "('BS5_BANNER_TITLE', 'true')";
    $values_config[] = "('BS5_PRODBOX_NAME_LINES', 0)";
    $values_config[] = "('BS5_PROD_DETAIL_MI_AS_SLIDER', 'false')";
    $values_config[] = "('BS5_PROD_DETAIL_FULLCONTENT', 'false')";
    $values_config[] = "('BS5_PROD_DETAIL_SHOW_MANUIMAGE', 'true')";
    $values_config[] = "('BS5_PROD_LIST_BOX', 'true')";
    $values_config[] = "('BS5_PRODUCT_INFO_BOX', 'true')";
    $values_config[] = "('BS5_PICTURESET_ACTIVE', 'true')";
    $values_config[] = "('BS5_FLAG_NEW_SHOW', 'true')";
    $values_config[] = "('BS5_FLAG_TOP_SHOW', 'true')";
    $values_config[] = "('BS5_FLAG_SPECIAL_SHOW', 'true')";
    $values_config[] = "('BS5_FLAG_PERCENT_SHOW', 'true')";
    $values_config[] = "('BS5_ADVANCED_VALIDATION', 'true')";
    $values_config[] = "('BS5_USE_VIEWERJS', 'true')";
    $values_config[] = "('BS5_FILTERCOLOR_AKTIV', 'none')";
    $values_config[] = "('BS5_FILTERBORDERCOLOR_AKTIV', 'primary')";
    $values_config[] = "('BS5_SEARCHFIELD_ONE_ROW', 'true')";
    $values_config[] = "('BS5_CURRENT_TEMPLATE', 'bootstrap5')";
    $values_config[] = "('BS5_BOOTSTRAP_THEME', 'default')";
    $values_config[] = "('BS5_BOOTSTRAP_PREVIEW_COLOR_MODE', 'false')";
    $values_config[] = "('BS5_FONTS_NAME', 'Open Sans')";
    $values_config[] = "('BS5_THEMEMODEL_CUSTOM1', 'default')";
    $values_config[] = "('BS5_THEMEMODEL_CUSTOM2', 'default')";
    $values_config[] = "('BS5_THEME', '')";
    $values_config[] = "('BS5_TOP1_BG', 'body-tertiary')";
    $values_config[] = "('BS5_TOP1_TEXT', 'text-body-secondary')";
    $values_config[] = "('BS5_LOGOBAR_TEXT', 'text-secondary-emphasis')";
    $values_config[] = "('BS5_TOP2_NAVBAR', '')";
    $values_config[] = "('BS5_TOP2_BG', 'body-tertiary')";
    $values_config[] = "('BS5_FOOTER_NAVBAR', '')";
    $values_config[] = "('BS5_FOOTER_BG', 'body-tertiary')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND', 'false')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND_DOUBLE_OPT_IN', 'true')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND_ONLY_REGISTERED', 'false')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND_PRIVACY_CHECK_REGISTERED', 'true')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND_SENDMAIL_ASAP', 'false')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND_SENDMAIL', 'false')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND_SENDMAIL_MINSTOCK_STATUS', 'false')";
    $values_config[] = "('BS5_CUSTOMERS_REMIND_SENDMAIL_MINSTOCK', '80')";
    $values_config[] = "('BS5_CHEAPLY_SEE', 'false')";
    $values_config[] = "('BS5_CHEAPLY_SEE_CONTENT_GROUP', '')";
    $values_config[] = "('BS5_PRODUCT_INQUIRY', 'false')";
    $values_config[] = "('BS5_PRODUCT_INQUIRY_CONTENT_GROUP', '')";
    $values_config[] = "('BS5_MODULFUX_ATTRIBUTES_DEFAULT', 'false')";
    $values_config[] = "('BS5_MODULFUX_ATTRIBUTES_DEFAULT_TABLE', 'false')";
    $values_config[] = "('BS5_MODULFUX_ATTRIBUTES_DEFAULT_TABLE_CHECKED', 'false')";
    $values_config[] = "('BS5_MODULFUX_ATTRIBUTES_DEFAULT_RADIO', 'false')";
    $values_config[] = "('BS5_MODULFUX_ATTRIBUTES_DEFAULT_RADIO_CHECKED', 'false')";
    $values_config[] = "('BS5_ATTR_PRICE_UPDATER', 'false')";
    $values_config[] = "('BS5_ATTR_PRICE_UPDATER_UPDATE_PRICE', 'true')";
    $values_config[] = "('BS5_AGI_REDUCE_CART', 'false')";
    $values_config[] = "('BS5_AGI_REDUCE_CART_SHOW_AVAILABLE', 'true')";
    $values_config[] = "('BS5_AWIDSRATINGBREAKDOWN', 'false')";
    $values_config[] = "('BS5_AWIDSRATINGBREAKDOWN_PRODLIST', 'true')";
    $values_config[] = "('BS5_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS', 'true')";
    $values_config[] = "('BS5_AWIDSRATINGBREAKDOWN_URL', 'true')";
    $values_config[] = "('BS5_TRAFFIC_LIGHTS', 'false')";
    $values_config[] = "('BS5_TRAFFIC_LIGHTS_PRODLISTING', 'l')";
    $values_config[] = "('BS5_TRAFFIC_LIGHTS_PRODINFO', 'l')";
    $values_config[] = "('BS5_TRAFFIC_LIGHTS_PRODATTRIBUTES', 'l')";
    $values_config[] = "('BS5_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL', '0')";
    $values_config[] = "('BS5_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN', '10')";

    $values_config[] = "('BS5_STARTPAGE_BOX_GREETING', 'true')";
    $values_config[] = "('BS5_STARTPAGE_SHOW_CATEGORYLIST', 'false')";
    $values_config[] = "('BS5_STARTPAGE_BOX_WHATSNEW', 'true')";
    $values_config[] = "('BS5_STARTPAGE_BOX_SPECIALS', 'true')";
    $values_config[] = "('BS5_STARTPAGE_BOX_UPCOME_PRODS', 'true')";
    $values_config[] = "('BS5_STARTPAGE_BOX_NEW_PRODS', 'true')";
    $values_config[] = "('BS5_STARTPAGE_BOX_REVIEWS', 'true')";
    $values_config[] = "('BS5_STARTPAGE_BOX_BESTSELLER', 'true')";
    $values_config[] = "('BS5_MANCAROUSEL_SHOW', 'true')";
    $values_config[] = "('BS5_MANCAROUSEL_NAME_LINES', 0)";
    $values_config[] = "('BS5_NOT_STARTPAGE_BOX_LAST_VIEWED', 'true')";
    $values_config[] = "('BS5_NOT_STARTPAGE_BOX_SUBCATEGORIES', 'true')";
    $values_config[] = "('BS5_MAX_PRODUCTS_BOX', '10')";
    $values_config[] = "('BS5_SHOW_BOX_ADD_QUICKIE', 'true')";
    $values_config[] = "('BS5_SHOW_PAYPAL_IN_BOX_CART', 'true')";
    $values_config[] = "('BS5_SHOW_BOX_INFO', 'true')";

    $values_config[] = "('BS5_DEFAULT_BANNER_SETTINGS', 'j1,btn-outline-light,n,j1,bg-light,n,0')";

    return $values_config;
  }

  protected function get_obsolete_values_config()
  {
    $obsolete_values_config = array();

    //$obsolete_values_config[] = 'BS5_LOGOBAR_FIXEDTOP';

    return $obsolete_values_config;
  }

  protected function install_table_config()
  {
    global $messageStack;
    $install = true;
    $values_config = array();

    xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS5_TPL_MANAGER_CONFIG . " (
      `config_id` int(11) NOT NULL AUTO_INCREMENT,
      `config_key` varchar(64) NOT NULL,
      `config_value` text NOT NULL,
      PRIMARY KEY (`config_id`)
    )");

    if (!$this->table_exists(TABLE_BS5_TPL_MANAGER_CONFIG)) {
      $install = false;
    }

    if ($install == true) {
      $values_config = $this->get_values_config();

      foreach ($values_config as $value) {
        $insert_into = "INSERT INTO " . TABLE_BS5_TPL_MANAGER_CONFIG . " (config_key ,config_value) VALUES ";
        $value = encode_utf8($value);
        if (!xtc_db_query($insert_into . $value)) {
          $install = false;
        }
      }
    }
    if ($install == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_OK . TABLE_BS5_TPL_MANAGER_CONFIG, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ERR . TABLE_BS5_TPL_MANAGER_CONFIG, 'error');
    }
    return $install;
  }

  protected function update_table_config()
  {
    global $messageStack;
    $update = true;
    $values_config = $this->get_values_config();

    foreach ($values_config as $value) {
      $value = encode_utf8($value);
      $confkey = explode(',', $value);
      $insert_into = "INSERT INTO " . TABLE_BS5_TPL_MANAGER_CONFIG . " (config_key ,config_value)
        SELECT * FROM (SELECT " . str_replace('(', '', $value) . " AS tmp
        WHERE NOT EXISTS
        (SELECT config_key FROM " . TABLE_BS5_TPL_MANAGER_CONFIG . " WHERE config_key = " . str_replace('(', '', $confkey[0]) . ") LIMIT 1";
      if (!xtc_db_query($insert_into)) {
        $update = false;
      }
    }

    $obsolete_values_config = $this->get_obsolete_values_config();

    foreach ($obsolete_values_config as $obsolete_value) {
      $query = xtc_db_query("SELECT config_key FROM " . TABLE_BS5_TPL_MANAGER_CONFIG . " WHERE config_key = '" . $obsolete_value . "'");
      $exist = xtc_db_num_rows($query);
      if ($exist > 0) {
        xtc_db_query("DELETE FROM " . TABLE_BS5_TPL_MANAGER_CONFIG . " WHERE config_key = '" . $obsolete_value . "'");
      }
    }

    return $update;
  }

  protected function install_table_theme()
  {
    global $messageStack;
    $install = true;
    $values_theme = array();

    xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS5_TPL_MANAGER_THEME . " (
      `theme_id` int(11) NOT NULL AUTO_INCREMENT,
      `theme_key` varchar(64) NOT NULL,
      `defaults` text NOT NULL,
      PRIMARY KEY (`theme_id`)
    )");

    if (!$this->table_exists(TABLE_BS5_TPL_MANAGER_THEME)) {
      $install = false;
    }

    if ($install == true) {
      $values_theme[] = '(\'custom1\', \'[\"#fff\",\"#fff\",\"#fff\",\"#f8f9fa\",\"#e9ecef\",\"#dee2e6\",\"#ced4da\",\"#adb5bd\",\"#6c757d\",\"#495057\",\"#343a40\",\"#212529\",\"#000\",\"#007bff\",\"#6610f2\",\"#6f42c1\",\"#e83e8c\",\"#dc3545\",\"#fd7e14\",\"#ffc107\",\"#28a745\",\"#20c997\",\"#17a2b8\",\"$blue\",\"$gray-600\",\"$green\",\"$cyan\",\"$yellow\",\"$red\",\"$gray-100\",\"$gray-800\",\"$white\",\"$gray-900\",\"$primary\",\"darken($link-color, 15%)\",\"2px\",\"$gray-300\",\"$white\",\"$primary\",\"1rem\",\"$font-size-base * 2.5\",\"$font-size-base * 2\",\"$font-size-base * 1.75\",\"$font-size-base * 1.5\",\"$font-size-base * 1.25\",\"inherit\",\"$white\",\"$gray-700\",\"$gray-400\",\"$gray-200\",\"rgba(255, 255, 255, .5)\",\"rgba(255, 255, 255, .75)\",\"#fff\",\"rgba(0, 0, 0, .5)\",\"rgba(0, 0, 0, .7)\",\"rgba(0, 0, 0, .9)\",\"$white\",\"$gray-200\",\"$blue\",\"rgba(0, 0, 0, .125)\",\"rgba(0, 0, 0, .03)\",\"#fff\",\"#fff\",\"rgba(0, 0, 0, .125)\",\"#fff\",\"rgba(0, 0, 0, .2)\",\"#e9ecef\",\"$black\",\"$gray-200\",\"$white\",\"$gray-900\"]\')';
      $values_theme[] = '(\'custom2\', \'[\"#fff\",\"#fff\",\"#fff\",\"#f8f9fa\",\"#e9ecef\",\"#dee2e6\",\"#ced4da\",\"#adb5bd\",\"#6c757d\",\"#495057\",\"#343a40\",\"#212529\",\"#000\",\"#007bff\",\"#6610f2\",\"#6f42c1\",\"#e83e8c\",\"#dc3545\",\"#fd7e14\",\"#ffc107\",\"#28a745\",\"#20c997\",\"#17a2b8\",\"$blue\",\"$gray-600\",\"$green\",\"$cyan\",\"$yellow\",\"$red\",\"$gray-100\",\"$gray-800\",\"$white\",\"$gray-900\",\"$primary\",\"darken($link-color, 15%)\",\"2px\",\"$gray-300\",\"$white\",\"$primary\",\"1rem\",\"$font-size-base * 2.5\",\"$font-size-base * 2\",\"$font-size-base * 1.75\",\"$font-size-base * 1.5\",\"$font-size-base * 1.25\",\"inherit\",\"$white\",\"$gray-700\",\"$gray-400\",\"$gray-200\",\"rgba(255, 255, 255, .5)\",\"rgba(255, 255, 255, .75)\",\"#fff\",\"rgba(0, 0, 0, .5)\",\"rgba(0, 0, 0, .7)\",\"rgba(0, 0, 0, .9)\",\"$white\",\"$gray-200\",\"$blue\",\"rgba(0, 0, 0, .125)\",\"rgba(0, 0, 0, .03)\",\"#fff\",\"#fff\",\"rgba(0, 0, 0, .125)\",\"#fff\",\"rgba(0, 0, 0, .2)\",\"#e9ecef\",\"$black\",\"$gray-200\",\"$white\",\"$gray-900\"]\')';

      foreach ($values_theme as $value) {
        $insert_into = "INSERT INTO " . TABLE_BS5_TPL_MANAGER_THEME . " (theme_key ,defaults) VALUES ";
        $value = encode_utf8($value);
        if (!xtc_db_query($insert_into . $value)) {
          $install = false;
        }
      }
    }
    if ($install == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_OK . TABLE_BS5_TPL_MANAGER_THEME, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ERR . TABLE_BS5_TPL_MANAGER_THEME, 'error');
    }
    return $install;
  }

  protected function install_table_configuration()
  {
    global $messageStack;
    $install = true;

    // Eintrag Template Manager in Tabelle configuration
    // Klassenerweiterungsmodul "product" - "checkifnewproduct" wird mitinstalliert - wird benötigt für die Prüfung, ob ein Produkt neu ist
    if (
      !xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_BS5_TPL_MANAGER_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())")
      || !xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('MODULE_BS5_TPL_MANAGER_VERSION', '" . $this->version . "',  '6', '1', now())")
      || !xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_STATUS', 'true','6', '1','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())")
      || !xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) values ('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_SORT_ORDER', '10','6', '2', now())")
    ) {
      $install = false;
    } else {
      $install = $this->check_module_product_installed();
    }

    if ($install == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK . TABLE_CONFIGURATION, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR . TABLE_CONFIGURATION, 'error');
    }
    return $install;
  }

  protected function check_module_product_installed()
  {
    if (defined('MODULE_PRODUCT_INSTALLED')) {
      $installed = [];
      if (MODULE_PRODUCT_INSTALLED != '') $installed = explode(';', MODULE_PRODUCT_INSTALLED);
      if (!in_array('bs5_checkifnewproduct.php', $installed)) {
        $installed[] =  'bs5_checkifnewproduct.php';
        if (!xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . implode(';', $installed) . "', last_modified = now() where configuration_key = 'MODULE_PRODUCT_INSTALLED'")) {
          return false;
        }
      }
    } else {
      if (!xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('MODULE_PRODUCT_INSTALLED', 'bs5_checkifnewproduct.php;', '6', '0', now())")) {
        return false;
      }
    }
    return true;
  }

  protected function check_table_configuration()
  {
    global $messageStack;
    $check = true;

    if (!defined('MODULE_BS5_TPL_MANAGER_VERSION')) {
      xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('MODULE_BS5_TPL_MANAGER_VERSION', '" . $this->version . "', '6', '1', now())");
    }
    elseif (version_compare(MODULE_BS5_TPL_MANAGER_VERSION, $this->version, '<')) {
      xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "', last_modified = now() WHERE configuration_key = 'MODULE_BS5_TPL_MANAGER_VERSION'");
    }
    // Klassenerweiterungsmodul "product" - "checkifnewproduct" wird mitinstalliert - wird benötigt für die Prüfung, ob ein Produkt neu ist
    if (!defined('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_STATUS')) {
      xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) values ('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_STATUS', 'true','6', '1','xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    }
    if (!defined('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_SORT_ORDER')) {
      xtc_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) values ('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_SORT_ORDER', '10','6', '2', now())");
    }

    if (
      !defined('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_STATUS')
      || !defined('MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_SORT_ORDER')
    ) {
      $check = false;
    } else {
      $check = $this->check_module_product_installed();
    }

    if ($check == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK . TABLE_CONFIGURATION, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR . TABLE_CONFIGURATION, 'error');
    }
    return $check;
  }

  protected function install_table_admin_access()
  {
    global $messageStack;
    $install = true;

    // Einträge in admin_access
    $admin_access_bs5_tpl_manager_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_tpl_manager_theme'"));
    if (!$admin_access_bs5_tpl_manager_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `bs5_tpl_manager_theme` INT(1) DEFAULT '0' NOT NULL");
    }
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_tpl_manager_theme = '8' WHERE customers_id = 'groups' LIMIT 1");
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_tpl_manager_theme = '1' WHERE customers_id = '1' LIMIT 1");
    if ($_SESSION['customer_id'] > 1) {
      xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_tpl_manager_theme = '1' WHERE customers_id = '" . $_SESSION['customer_id'] . "' LIMIT 1");
    }
    $admin_access_bs5_tpl_manager_config_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_tpl_manager_config'"));
    if (!$admin_access_bs5_tpl_manager_config_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `bs5_tpl_manager_config` INT(1) DEFAULT '0' NOT NULL");
    }
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_tpl_manager_config = '8' WHERE customers_id = 'groups' LIMIT 1");
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_tpl_manager_config = '1' WHERE customers_id = '1' LIMIT 1");
    if ($_SESSION['customer_id'] > 1) {
      xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_tpl_manager_config = '1' WHERE customers_id = '" . $_SESSION['customer_id'] . "' LIMIT 1");
    }
    // Einträge in admin_access Banner Manager
    $admin_access_bs5_banner_manager_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_banner_manager'"));
    if (!$admin_access_bs5_banner_manager_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `bs5_banner_manager` INT(1) DEFAULT '0' NOT NULL");
    }
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_banner_manager = '8' WHERE customers_id = 'groups' LIMIT 1");
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_banner_manager = '1' WHERE customers_id = '1' LIMIT 1");
    if ($_SESSION['customer_id'] > 1) {
      xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_banner_manager = '1' WHERE customers_id = '" . $_SESSION['customer_id'] . "' LIMIT 1");
    }

    // Einträge in admin_access
    $admin_access_bs5_customers_remind_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_customers_remind'"));
    if (!$admin_access_bs5_customers_remind_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `bs5_customers_remind` INT(1) DEFAULT '0' NOT NULL");
    }
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_customers_remind = '2' WHERE customers_id = 'groups' LIMIT 1");
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_customers_remind = '1' WHERE customers_id = '1' LIMIT 1");
    if ($_SESSION['customer_id'] > 1) {
      xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_customers_remind = '1' WHERE customers_id = '" . $_SESSION['customer_id'] . "' LIMIT 1");
    }
    // Einträge in admin_access
    $admin_access_bs5_customers_remind_recipients_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_customers_remind_recipients'"));
    if (!$admin_access_bs5_customers_remind_recipients_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `bs5_customers_remind_recipients` INT(1) DEFAULT '0' NOT NULL");
    }
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_customers_remind_recipients = '2' WHERE customers_id = 'groups' LIMIT 1");
    xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_customers_remind_recipients = '1' WHERE customers_id = '1' LIMIT 1");
    if ($_SESSION['customer_id'] > 1) {
      xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET bs5_customers_remind_recipients = '1' WHERE customers_id = '" . $_SESSION['customer_id'] . "' LIMIT 1");
    }

    $admin_access_bs5_tpl_manager_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_tpl_manager_theme'"));
    $admin_access_bs5_tpl_manager_config_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_tpl_manager_config'"));
    $admin_access_bs5_banner_manager_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_banner_manager'"));
    $admin_access_bs5_customers_remind_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_customers_remind'"));
    $admin_access_bs5_customers_remind_recipients_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_ADMIN_ACCESS . " WHERE Field='bs5_customers_remind_recipients'"));
    if (!$admin_access_bs5_tpl_manager_exists || !$admin_access_bs5_tpl_manager_config_exists || !$admin_access_bs5_banner_manager_exists || !$admin_access_bs5_customers_remind_exists || !$admin_access_bs5_customers_remind_recipients_exists) {
      $install = false;
    }

    if ($install == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK . TABLE_ADMIN_ACCESS, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR . TABLE_ADMIN_ACCESS, 'error');
    }
    return $install;
  }

  protected function install_additional_modules()
  {
    global $messageStack;
    $install = true;

    xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS5_CUSTOMERS_REMIND . " (
      `remind_id` int(11) NOT NULL AUTO_INCREMENT,
      `customers_id` int(11) NOT NULL DEFAULT '0',
      `customers_gender` char(1) NOT NULL,
      `customers_firstname` varchar(32) NOT NULL DEFAULT '',
      `customers_lastname` varchar(32) NOT NULL DEFAULT '',
      `customers_email_address` varchar(96) NOT NULL DEFAULT '',
      `customers_language` varchar(32) DEFAULT NULL,
      `customers_st` varchar(4) NOT NULL DEFAULT '1',
      `products_id` int(11) NOT NULL DEFAULT '0',
      `products_ean` varchar(128) NOT NULL DEFAULT '',
      `products_name` varchar(255) NOT NULL DEFAULT '',
      `products_model` varchar(64) NOT NULL DEFAULT '',
      `products_image` varchar(64) DEFAULT NULL,
      `mail_head1` varchar(128) NOT NULL,
      `remind_date_added` datetime DEFAULT NULL,
      PRIMARY KEY (`remind_id`)
    )");

    if (!$this->table_exists(TABLE_BS5_CUSTOMERS_REMIND)) {
      $install = false;
    }
    if ($install == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_OK . TABLE_BS5_CUSTOMERS_REMIND, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ERR . TABLE_BS5_CUSTOMERS_REMIND, 'error');
    }

    if (!$this->install_additional_modules_content()) {
      $install = false;
    }

    return $install;
  }

  protected function install_additional_modules_content($x = 2)
  {
    global $messageStack;
    $install = true;

    // Content for modules product inquiry
    if ($x <= 2) {
      if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`)
        SELECT 0, 0, '', 1, 'Question to article', 'Question to article', 'Do you have a question about this product? Please fill out the form, we will try to answer your question as soon as possible.<br />\r\n<br />\r\nThis Text can you edit under <b>Content-Manager</b>!', 0, 0, '', 0, MAX(content_group)+1, 1 FROM " . TABLE_CONTENT_MANAGER)) {
        $install = false;
      } else {
        xtc_db_query("UPDATE " . TABLE_BS5_TPL_MANAGER_CONFIG . " SET config_value = (SELECT MAX(content_group) FROM content_manager) WHERE config_key = 'BS5_PRODUCT_INQUIRY_CONTENT_GROUP'");
      }
      if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`)
        SELECT 0, 0, '', 2, 'Frage zum Artikel', 'Frage zum Artikel', 'Sie haben eine Frage zu diesem Artikel? Bitte füllen Sie das Formular aus, wir versuchen Ihre Frage baldmöglichst zu beantworten.<br />\r\n<br />\r\nDiesen Text können sie bequem mit dem <b>Content-Manager</b> bearbeiten!', 0, 0, '', 0, MAX(content_group), 1 FROM " . TABLE_CONTENT_MANAGER)) {
        $install = false;
      }
    }
    if ($x >= 2) {
      // Content for modules cheaply see
      if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`)
        SELECT 0, 0, '', 1, 'More cheaply seen', 'More cheaply seen', 'Did you see the article at much a favourable price? Please you fill out the form, we try the price to undercut.<br />\r\n<br />\r\nThis Text can you edit under <b>Content-Manager</b>!', 0, 0, '', 0, MAX(content_group)+1, 1 FROM " . TABLE_CONTENT_MANAGER)) {
        $install = false;
      } else {
        xtc_db_query("UPDATE " . TABLE_BS5_TPL_MANAGER_CONFIG . " SET config_value = (SELECT MAX(content_group) FROM content_manager) WHERE config_key = 'BS5_CHEAPLY_SEE_CONTENT_GROUP'");
      }
      if (!xtc_db_query("INSERT INTO " . TABLE_CONTENT_MANAGER . " (`categories_id`, `parent_id`, `group_ids`, `languages_id`, `content_title`, `content_heading`, `content_text`, `sort_order`, `file_flag`, `content_file`, `content_status`, `content_group`, `content_delete`)
        SELECT 0, 0, '', 2, 'Billiger gesehen', 'Billiger gesehen', 'Haben Sie den Artikel zu einem viel günstigeren Preis gesehen? Bitte füllen Sie das Formular aus, wir versuchen den Preis zu unterbieten.<br />\r\n<br />\r\nDiesen Text können sie bequem mit dem <b>Content-Manager</b> bearbeiten!', 0, 0, '', 0, MAX(content_group), 1 FROM " . TABLE_CONTENT_MANAGER)) {
        $install = false;
      }
    }

    if ($install == true) {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_OK . TABLE_CONTENT_MANAGER, 'success');
    } else {
      $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_ERR . TABLE_CONTENT_MANAGER, 'error');
    }
    return $install;
  }

  protected function remove_tables($x)
  {
    global $messageStack;
    switch (true) {
      case $x > 3:
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs5_tpl_manager_theme`");
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs5_tpl_manager_config`");
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs5_banner_manager`");
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs5_customers_remind`");
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP `bs5_customers_remind_recipients`");
        $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED . TABLE_ADMIN_ACCESS, 'success');
      case $x > 2:
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
        // Klassenerweiterungsmodul (bs5_checkifnewproduct.php) wird zeitgleich deinstalliert
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_PRODUCT_BS5_CHECKIFNEWPRODUCT_%'");
        if (defined('MODULE_PRODUCT_INSTALLED')) {
          $installed = [];
          if (MODULE_PRODUCT_INSTALLED != '') $installed = explode(';', MODULE_PRODUCT_INSTALLED);
          if (($key = array_search('bs5_checkifnewproduct.php', $installed)) !== false) {
            unset($installed[$key]);
            xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . implode(';', $installed) . "', last_modified = now() where configuration_key = 'MODULE_PRODUCT_INSTALLED'");
          }
        }
        $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED . TABLE_CONFIGURATION, 'success');
      case $x > 1:
        xtc_db_query("DROP TABLE " . TABLE_BS5_TPL_MANAGER_THEME);
        $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_REMOVED . TABLE_BS5_TPL_MANAGER_THEME, 'success');
      case $x > 0:
        xtc_db_query("DELETE FROM " . TABLE_CONTENT_MANAGER . " WHERE content_group = " . BS5_CHEAPLY_SEE_CONTENT_GROUP);
        $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED . TABLE_CONTENT_MANAGER, 'success');
        xtc_db_query("DELETE FROM " . TABLE_CONTENT_MANAGER . " WHERE content_group = " . BS5_PRODUCT_INQUIRY_CONTENT_GROUP);
        $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_ENTRY_REMOVED . TABLE_CONTENT_MANAGER, 'success');
        // später hinzugefügte Datenbankeinträge löschen
        $this->remove_updates_and_news();
        xtc_db_query("DROP TABLE " . TABLE_BS5_TPL_MANAGER_CONFIG);
        $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_REMOVED . TABLE_BS5_TPL_MANAGER_CONFIG, 'success');

        // Zusatzmodule entfernen
        xtc_db_query("DROP TABLE " . TABLE_BS5_CUSTOMERS_REMIND);
        $messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_REMOVED . TABLE_BS5_CUSTOMERS_REMIND, 'success');
        xtc_db_query("DROP TABLE " . TABLE_BS5_SIMULATED_CRON_RECORDS);
        //$messageStack->add_session(MODULE_BS5_TPL_MANAGER_INSTALL_TABLE_REMOVED . TABLE_BS5_SIMULATED_CRON_RECORDS, 'success');
    }
    return true;
  }

  protected function table_exists($table_name)
  {
    $Table = xtc_db_query("show tables like '" . $table_name . "'");
    if (xtc_db_num_rows($Table) < 1) {
      return (false);
    } else {
      return (true);
    }
  }

  protected function install_updates_and_news()
  {
    // Einträge für Banner Manager hinzufügen
    $bs5_bs5_banner_settings_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_CATEGORIES . " WHERE Field='bs5_banner_ids'"));
    if (!$bs5_bs5_banner_settings_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " ADD `bs5_banner_ids` VARCHAR(255) NOT NULL");
    }
    $bs5_bs5_banner_settings_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_CATEGORIES . " WHERE Field='bs5_banner_settings'"));
    if (!$bs5_bs5_banner_settings_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " ADD `bs5_banner_settings` VARCHAR(255) NOT NULL");
    }
    // Variable content_group dynamisch setzen
    if (!defined('BS5_PRODUCT_INQUIRY_CONTENT_GROUP') || empty(BS5_PRODUCT_INQUIRY_CONTENT_GROUP)) {
      $content_group_query = xtc_db_query("SELECT content_group FROM " . TABLE_CONTENT_MANAGER . " WHERE content_title = 'Question to article' OR content_title = 'Frage zum Artikel'");
      $content_group = xtc_db_fetch_array($content_group_query);
      if (!empty($content_group['content_group'])) {
        xtc_db_query("UPDATE " . TABLE_BS5_TPL_MANAGER_CONFIG . " SET config_value = '" . $content_group['content_group'] . "' WHERE config_key = 'BS5_PRODUCT_INQUIRY_CONTENT_GROUP'");
      } else {
        $this->install_additional_modules_content(1);
      }
    }
    if (!defined('BS5_CHEAPLY_SEE_CONTENT_GROUP') || empty(BS5_CHEAPLY_SEE_CONTENT_GROUP)) {
      $content_group_query = xtc_db_query("SELECT content_group FROM " . TABLE_CONTENT_MANAGER . " WHERE content_title = 'More cheaply seen' OR content_title = 'Billiger gesehen'");
      $content_group = xtc_db_fetch_array($content_group_query);
      if (!empty($content_group['content_group'])) {
        xtc_db_query("UPDATE " . TABLE_BS5_TPL_MANAGER_CONFIG . " SET config_value = '" . $content_group['content_group'] . "' WHERE config_key = 'BS5_CHEAPLY_SEE_CONTENT_GROUP'");
      } else {
        $this->install_additional_modules_content(3);
      }
    }
    xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS . " (
      mail_id int(11) NOT NULL AUTO_INCREMENT,
      customers_email_address varchar(255) NOT NULL DEFAULT '',
      customers_id int(11) NOT NULL DEFAULT 0,
      customers_status int(5) NOT NULL DEFAULT 0,
      customers_firstname varchar(64) NOT NULL DEFAULT '',
      customers_lastname varchar(64) NOT NULL DEFAULT '',
      mail_status int(1) NOT NULL DEFAULT 0,
      mail_key varchar(32) NOT NULL DEFAULT '',
      date_added datetime DEFAULT NULL,
      ip_date_added varchar(50) DEFAULT NULL,
      date_confirmed datetime DEFAULT NULL,
      ip_date_confirmed varchar(50) DEFAULT NULL,
      PRIMARY KEY (mail_id)
    )");

    xtc_db_query("CREATE TABLE IF NOT EXISTS " . TABLE_BS5_CUSTOMERS_REMIND_RECIPIENTS_HISTORY . " (
      history_id int(11) NOT NULL AUTO_INCREMENT,
      customers_email_address varchar(255) NOT NULL,
      customers_action varchar(32) NOT NULL,
      ip_address varchar(50) DEFAULT NULL,
      date_added datetime DEFAULT NULL,
      PRIMARY KEY (history_id)
    )");

    //Eintrag in Tabelle geplante Aufgaben
    $scheduled_tasks_array = array();
    $scheduled_query = xtc_db_query("SELECT *
                                        FROM ".TABLE_SCHEDULED_TASKS);
    while ($scheduled = xtc_db_fetch_array($scheduled_query)) {
      $scheduled_tasks_array[] = $scheduled['tasks'];
    }
    if (!in_array('bs5_send_customers_remind', $scheduled_tasks_array))
    {
      xtc_db_query("INSERT INTO `scheduled_tasks` (`time_regularity`, `time_unit`, `status`, `edit`, `tasks`) VALUES (1, 'd', 1, 1, 'bs5_send_customers_remind')");
    }
    xtc_db_query("DROP TABLE " . TABLE_BS5_SIMULATED_CRON_RECORDS);

    return true;
  }

  protected function remove_updates_and_news()
  {
    // Einträge für Banner Manager löschen
    $bs5_bs5_banner_settings_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_CATEGORIES . " WHERE Field='bs5_banner_ids'"));
    if ($bs5_bs5_banner_settings_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " DROP `bs5_banner_ids`");
    }
    $bs5_bs5_banner_settings_exists = xtc_db_num_rows(xtc_db_query("SHOW COLUMNS FROM " . TABLE_CATEGORIES . " WHERE Field='bs5_banner_settings'"));
    if ($bs5_bs5_banner_settings_exists) {
      xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " DROP `bs5_banner_settings`");
    }
  }

  protected function remove_obsolete_files_or_dirs()
  {
    global $messageStack;

    // Dateien definieren
    $bs5_tpl = defined('BS5_CURRENT_TEMPLATE') && BS5_CURRENT_TEMPLATE != '' ? BS5_CURRENT_TEMPLATE : 'bootstrap5';
    $shop_path = DIR_FS_CATALOG;
    $dirs_and_files = array();
    // Beispiel
    // $dirs_and_files[] = $shop_path.'includes/extra/bs5_test.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/product_info_end/bs5_additional_module_links.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/modules/product_info_end/bs5_agi_reduce_cart.php';
    $dirs_and_files[] = $shop_path . 'bs5_reminder.php';
    // Version 1.1.9
    $dirs_and_files[] = $shop_path . 'templates/bootstrap5/css/icons/fontello-c54745a6.zip';
    $dirs_and_files[] = $shop_path . 'templates/bootstrap5/css/icons/fontello-c54745a6.zip';
    // Version 1.1.13
    //$dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/bs5_template_manager/scssphp/src';
    //$dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/bs5_template_manager/scssphp/LICENSE.md';
    //$dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/bs5_template_manager/scssphp/README.md';
    //$dirs_and_files[] = $shop_path . DIR_ADMIN . 'includes/bs5_template_manager/scssphp/scss.inc.php';

    $tpl_dirs_and_files = array();
    // Beispiel Templatedateien
    // $tpl_dirs_and_files[] = 'css/jquery.cookieconsent.css';

    foreach ($tpl_dirs_and_files as $tpl_dir_or_file) {
      if ($bs5_tpl != '') {
        $dirs_and_files[] = $shop_path . 'templates/' . $bs5_tpl . '/' . $tpl_dir_or_file;
      }
    }

    // Dateien löschen
    foreach ($dirs_and_files as $dir_or_file) {
      if (is_dir($dir_or_file) || is_file($dir_or_file)) {
        if (!$this->rrmdir($dir_or_file)) {
          $messageStack->add_session($dir_or_file . MODULE_BS5_TPL_MANAGER_DELETE_FILE_ERR, 'error');
        }
      }
    }
    return true;
  }
}
