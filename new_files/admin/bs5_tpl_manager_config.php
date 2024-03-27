<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */


require('includes/application_top.php');

if (defined('MODULE_BS5_TPL_MANAGER_STATUS') && MODULE_BS5_TPL_MANAGER_STATUS == 'true') {

	// include needed classes
	require_once(DIR_FS_ADMIN.'includes/bs5_template_manager/bs5_tpl_manager_config.php');

	$bs5 = new Bs5TplManager();

	if(isset($_POST['action'])){
		switch($_POST['action']) {
			case 'update':
	            $config_data = $_POST['configuration'];
			    $bs5->set_conf($config_data);
				break;
		}
	}

	// get data
	$bs5_conf = $bs5->get_conf();

	// get input options
	$yes_no_array = 	$bs5->get_yes_no();
  $menucase = $bs5->get_menucase();
	$superfish_level = 	$bs5->get_superfish_level();
	$carousel_show = 	$bs5->get_carousel_show();
	$fade_slide = 		$bs5->get_fade_slide();
	$bs5_themes =		$bs5->get_bs5_themes();
	$bg_classes =		$bs5->get_bg_classes();
	$border_classes =		$bs5->get_border_classes();
	$navbar_classes =   $bs5->get_navbar_classes();
	$text_classes =    	$bs5->get_text_classes();
	$traffic_styles =   $bs5->get_traffic_styles();

	// tabs
	$tabs_array = array();
	$tabs_array[] = array('id' => 'start', 'name' => 'Bootstrap 5');
	$tabs_array[] = array('id' => 'classes', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_CLASSES);
	$tabs_array[] = array('id' => 'header', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_HEADER);
	$tabs_array[] = array('id' => 'superfish', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_SUPERFISH);
	$tabs_array[] = array('id' => 'slider', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_SLIDER);
	$tabs_array[] = array('id' => 'boxes', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_BOXES);
	$tabs_array[] = array('id' => 'views', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_VIEWS);
	$tabs_array[] = array('id' => 'modules', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_MODULES);
	$tabs_array[] = array('id' => 'mixed', 'name' => TEXT_BS5_TPL_MANAGER_CONFIG_TAB_MIXED);

	$langtabs = '<div class="tablangmenu"><ul>';
	$csstabstyle = 'border: 1px solid #aaaaaa; padding: 4px; width: 99%; margin-top: -1px; margin-bottom: 10px; float: left;background: #F3F3F3;';
	$csstab = '<style type="text/css">' .  '#tab_lang_0' . '{display: block;' . $csstabstyle . '}';
	$csstab_nojs = '<style type="text/css">';
	for ($i = 0, $n = count($tabs_array); $i < $n; $i++) {
		$tabtmp = "\'tab_lang_$i\'," ;
		$tabact = "$(\'#activ_tab\').attr(\'value\', $i);" ;
		$langtabs.= '<li onclick="'.$tabact.' showTab('. $tabtmp. $n.');" style="cursor: pointer;" id="tabselect_' . $i .'">' .$tabs_array[$i]['name'].  '</li>';
		if($i > 0) $csstab .= '#tab_lang_' . $i .'{display: none;' . $csstabstyle . '}';
		$csstab_nojs .= '#tab_lang_' . $i .'{display: block;' . $csstabstyle . '}';
	}
	$csstab .= '</style>';
	$csstab_nojs .= '</style>';
	$langtabs.= '</ul></div>';

    $activ_tab = '';
	if (isset($_POST['activ_tab']))
	{
		$activ_tab = '<script type="text/javascript">$( document ).ready(function() {$("#tabselect_'.$_POST['activ_tab'].'").trigger("click");});</script>';
	}

	$lang_code = $_SESSION["language_code"] == 'de' ? 'de' : 'en';

require_once (DIR_WS_INCLUDES.'head.php');
?>

    <link type="text/css" href="includes/bs5_template_manager/assets/css/bs5_tpl_manager.css" rel="stylesheet">
	<script type="text/javascript" src="includes/lang_tabs_menu/lang_tabs_menu.js"></script>

	<noscript>
		<?php echo ($csstab_nojs);?>
	</noscript>
</head>
<body>
	<!-- header //-->
	<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
	<!-- header_eof //-->

	<!-- body //-->
	<table class="tableBody bs5">
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
				<?php // updateinfo
					if (!isset($bs5_conf['BS5_THEME'])) {
						echo '<div class="messageStackWarning"><h3>' . TEXT_BS5_TPL_MANAGER_CONFIG_UPDATE_SYSTEMMODULE_WARNING .'<a class="button but_red" href="'. xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=bs5_tpl_manager') . '">Bootstrap 5 Template-Manager</a></h3></div><br />';
					}
				?>
				<div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS.'heading/icon_configuration.png', TEXT_BS5_TPL_MANAGER_CONFIG_HEADING_TITLE); ?></div>
				<div class="flt-l">
					<div class="pageHeading pdg2"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_HEADING_TITLE; ?></div>
					<p><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_INFO; ?></p>
				</div>
				<div class="admin_container cf clear">
				<?php
					echo xtc_draw_form('config', basename($PHP_SELF), xtc_get_all_get_params(array('action')));
					echo '<input id="activ_tab" type="hidden" value="0" name="activ_tab">';
					echo xtc_draw_hidden_field('action', 'update');
					?>
						<script type="text/javascript">
							$.get("includes/lang_tabs_menu/lang_tabs_menu.css", function(css) {
								$("head").append("<style type='text/css'>"+css+"<\/style>");
							});
							document.write('<?php echo ($csstab);?>');
							document.write('<?php echo ($langtabs);?>');
						</script>
					<?php
					for ($i = 0, $n = count($tabs_array); $i < $n; $i++) {
						echo ('<div id="tab_lang_' . $i . '">');
						switch($tabs_array[$i]['id']) {
							case 'start':
					?>
					<div class="admincol_left">
            <table class="clear tableConfig">
							<tr>
	                <td class="pageHeading dataTableConfig">Information</td>
			        </tr>
							<tr>
	                <td class="dataTableConfig"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_COLOR_MODE; ?></td>
			        </tr>
							<tr>
	                <td class="dataTableConfig"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_COMPRESS_OPTIONS; ?></td>
							</tr>
							<tr>
	                <td class="dataTableConfig"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_IMAGE_OPTIONS; ?></td>
							</tr>
            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'classes':
					?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
              	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3>Themes</h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_BS5_THEME; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_THEME]', $bs5_themes, $bs5_conf['BS5_THEME']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_BS5_THEME_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CLASSES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_BG; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_TOP1_BG]', $bg_classes, $bs5_conf['BS5_TOP1_BG']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_BG_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_TEXT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_TOP1_TEXT]', $text_classes, $bs5_conf['BS5_TOP1_TEXT']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_TEXT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_LOGOBAR_TEXT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_LOGOBAR_TEXT]', $text_classes, $bs5_conf['BS5_LOGOBAR_TEXT']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_LOGOBAR_TEXT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_NAVBAR; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_TOP2_NAVBAR]', $navbar_classes, $bs5_conf['BS5_TOP2_NAVBAR']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_NAVBAR_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_BG; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_TOP2_BG]', $bg_classes, $bs5_conf['BS5_TOP2_BG']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_BG_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_NAVBAR; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_FOOTER_NAVBAR]', $navbar_classes, $bs5_conf['BS5_FOOTER_NAVBAR']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_NAVBAR_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_BG; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_FOOTER_BG]', $bg_classes, $bs5_conf['BS5_FOOTER_BG']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_BG_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_classes_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
						<?php
								break;

								case 'header':
					?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_TOP1'], 'BS5_SHOW_TOP1'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_INFO; ?></td>
			        </tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP2; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_TOP2'], 'BS5_SHOW_TOP2'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP3; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_TOP3'], 'BS5_SHOW_TOP3'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP3_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP4; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_TOP4'], 'BS5_SHOW_TOP4'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TOP4_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_JS_DISABLED; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_JS_DISABLED'], 'BS5_SHOW_JS_DISABLED'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_JS_DISABLED_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_LOGO; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS5_SHOP_LOGO]', $bs5_conf['BS5_SHOP_LOGO']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_LOGO_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_ICON_WITH_NAMES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_ICON_WITH_NAMES'], 'BS5_SHOW_ICON_WITH_NAMES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_ICON_WITH_NAMES_INFO; ?></td>
							</tr>
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_header_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'superfish':
					?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISHMENU; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MENUCASE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_MENUCASE]', $menucase, $bs5_conf['BS5_MENUCASE']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MENUCASE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_HOMEBUTTON; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_HOMEBUTTON_IN_TOPCATMENU'], 'BS5_SHOW_HOMEBUTTON_IN_TOPCATMENU'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_HOMEBUTTON_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ADD_LINK; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS5_ADD_LINK_IN_TOPCATMENU_LAST]', $bs5_conf['BS5_ADD_LINK_IN_TOPCATMENU_LAST']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ADD_LINK_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MEGAS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS5_KK_MEGAS]', $bs5_conf['BS5_KK_MEGAS']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MEGAS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ALL_MENUS; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_CATEGORIESMENU_MAXLEVEL]', $superfish_level, $bs5_conf['BS5_CATEGORIESMENU_MAXLEVEL']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MANUFACTURERS_LINK; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_MANUFACTURERS_LINK'], 'BS5_MANUFACTURERS_LINK'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MANUFACTURERS_LINK_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SPECIALS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SPECIALS_CATEGORIES'], 'BS5_SPECIALS_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SPECIALS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_WHATSNEW_CATEGORIES'], 'BS5_WHATSNEW_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_WHATSNEW_SPECIALS_UPPERCASE'], 'BS5_WHATSNEW_SPECIALS_UPPERCASE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_HIDE_EMPTY_CATEGORIES'], 'BS5_HIDE_EMPTY_CATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_menu_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'slider':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_CAROUSEL_SHOW]', $carousel_show, $bs5_conf['BS5_CAROUSEL_SHOW']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_FADE; ?></td>
								<td class="dataTableConfig col-middle"><?php echo draw_on_off_selection('configuration[BS5_CAROUSEL_FADE]', $fade_slide, $bs5_conf['BS5_CAROUSEL_FADE']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_FADE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TOP; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_TOP_PROD_IN_SLIDER'], 'BS5_TOP_PROD_IN_SLIDER'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TOP_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_slider_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'boxes':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOXES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_GREETING; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_BOX_GREETING'], 'BS5_STARTPAGE_BOX_GREETING'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_GREETING_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_SHOW_CATEGORYLIST'], 'BS5_STARTPAGE_SHOW_CATEGORYLIST'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_BOX_WHATSNEW'], 'BS5_STARTPAGE_BOX_WHATSNEW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_BOX_SPECIALS'], 'BS5_STARTPAGE_BOX_SPECIALS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_UPCOME_PRODS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_BOX_UPCOME_PRODS'], 'BS5_STARTPAGE_BOX_UPCOME_PRODS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_UPCOME_PRODS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_NEW_PRODS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_BOX_NEW_PRODS'], 'BS5_STARTPAGE_BOX_NEW_PRODS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_NEW_PRODS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_BOX_REVIEWS'], 'BS5_STARTPAGE_BOX_REVIEWS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_BESTSELLER; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_STARTPAGE_BOX_BESTSELLER'], 'BS5_STARTPAGE_BOX_BESTSELLER'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_BESTSELLER_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_MANCAROUSEL_SHOW'], 'BS5_MANCAROUSEL_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_NAME_LINES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_MANCAROUSEL_NAME_LINES]', array(array('id' => 0, 'text' => '0'), array('id' => 1, 'text' => '1'), array('id' => 2, 'text' => '2'), array('id' => 3, 'text' => '3'), array('id' => 4, 'text' => '4')), $bs5_conf['BS5_MANCAROUSEL_NAME_LINES']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_NAME_LINES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOXES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_NOT_STARTPAGE_BOX_LAST_VIEWED'], 'BS5_NOT_STARTPAGE_BOX_LAST_VIEWED'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SUBCATEGORIES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_NOT_STARTPAGE_BOX_SUBCATEGORIES'], 'BS5_NOT_STARTPAGE_BOX_SUBCATEGORIES'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SUBCATEGORIES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_BOXES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MAX_PRODUCTS_BOX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS5_MAX_PRODUCTS_BOX]', $bs5_conf['BS5_MAX_PRODUCTS_BOX']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MAX_PRODUCTS_BOX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_ADD_QUICKIE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_BOX_ADD_QUICKIE'], 'BS5_SHOW_BOX_ADD_QUICKIE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_ADD_QUICKIE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_INFO; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SHOW_BOX_INFO'], 'BS5_SHOW_BOX_INFO'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_INFO_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_boxes_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'views':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_MOREIMAGES_AS_SLIDER; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_PROD_DETAIL_MI_AS_SLIDER'], 'BS5_PROD_DETAIL_MI_AS_SLIDER'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_MOREIMAGES_AS_SLIDER_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_PROD_DETAIL_FULLCONTENT'], 'BS5_PROD_DETAIL_FULLCONTENT'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_PROD_DETAIL_SHOW_MANUIMAGE'], 'BS5_PROD_DETAIL_SHOW_MANUIMAGE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_PROD_LIST_BOX'], 'BS5_PROD_LIST_BOX'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_PRODUCT_INFO_BOX'], 'BS5_PRODUCT_INFO_BOX'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_LINES; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_NAME_LINES; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_PRODBOX_NAME_LINES]', array(array('id' => 0, 'text' => '0'), array('id' => 1, 'text' => '1'), array('id' => 2, 'text' => '2'), array('id' => 3, 'text' => '3'), array('id' => 4, 'text' => '4')), $bs5_conf['BS5_PRODBOX_NAME_LINES']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_NAME_LINES_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_views_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

								case 'modules':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_CUSTOMERS_REMIND'], 'BS5_CUSTOMERS_REMIND'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_CUSTOMERS_REMIND_SENDMAIL'], 'BS5_CUSTOMERS_REMIND_SENDMAIL'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CHEAPLY_SEE; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CHEAPLY_SEE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_CHEAPLY_SEE'], 'BS5_CHEAPLY_SEE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_CHEAPLY_SEE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_PRODUCT_INQUIRY'], 'BS5_PRODUCT_INQUIRY'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_TEXT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_MODULFUX_ATTRIBUTES_DEFAULT'], 'BS5_MODULFUX_ATTRIBUTES_DEFAULT'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_ATTR_PRICE_UPDATER'], 'BS5_ATTR_PRICE_UPDATER'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_ATTR_PRICE_UPDATER_UPDATE_PRICE'], 'BS5_ATTR_PRICE_UPDATER_UPDATE_PRICE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_UPDATE_PRICE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_AGI_REDUCE_CART'], 'BS5_AGI_REDUCE_CART'); ?></td>
				                <td class="dataTableConfig col-right">
								<?php
                            		$txt = '';
									if(STOCK_CHECK == 'false' || STOCK_ALLOW_CHECKOUT == 'true') {
								    	$txt .= '<p style="color:orange">';
								    	if(STOCK_CHECK == 'false') $txt .= TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_ACTIVATE.' <a href="configuration.php?gID=9">'.TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_CHECK.'</a><br />';
								    	if(STOCK_ALLOW_CHECKOUT == 'true') $txt .= TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_DEACTIVATE.' <a href="configuration.php?gID=9">'.TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_ALLOW_CHECKOUT.'</a><br />';
								    	$txt .= '</p>';
								    }
									echo $txt . TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_INFO;
								?>
								</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_AGI_REDUCE_CART_SHOW_AVAILABLE'], 'BS5_AGI_REDUCE_CART_SHOW_AVAILABLE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1.TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_2; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_AWIDSRATINGBREAKDOWN'], 'BS5_AWIDSRATINGBREAKDOWN'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_AWIDSRATINGBREAKDOWN_PRODLIST'], 'BS5_AWIDSRATINGBREAKDOWN_PRODLIST'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_PRODLIST_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS'], 'BS5_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_AWIDSRATINGBREAKDOWN_URL'], 'BS5_AWIDSRATINGBREAKDOWN_URL'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_URL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3"><h3><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></h3></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_TRAFFIC_LIGHTS'], 'BS5_TRAFFIC_LIGHTS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_TRAFFIC_LIGHTS_PRODLISTING]', $traffic_styles, $bs5_conf['BS5_TRAFFIC_LIGHTS_PRODLISTING']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODLIST_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_TRAFFIC_LIGHTS_PRODINFO]', $traffic_styles, $bs5_conf['BS5_TRAFFIC_LIGHTS_PRODINFO']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODINFO_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_TRAFFIC_LIGHTS_PRODATTRIBUTES]', $traffic_styles, $bs5_conf['BS5_TRAFFIC_LIGHTS_PRODATTRIBUTES']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODATTR_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS5_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL]', $bs5_conf['BS5_MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_RED_YELL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_input_field('configuration[BS5_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN]', $bs5_conf['BS5_MODULE_TRAFFIC_LIGHTS_STOCK_GREEN']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_GREEN_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_modules_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

							case 'mixed':
                    ?>
					<div class="admincol_left">
			            <table class="clear tableConfig">
							<tr>
								<td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
			                	</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_PICTURESET_ACTIVE'], 'BS5_PICTURESET_ACTIVE'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_NEW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_FLAG_NEW_SHOW'], 'BS5_FLAG_NEW_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_NEW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_TOP; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_FLAG_TOP_SHOW'], 'BS5_FLAG_TOP_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_TOP_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_SPECIAL; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_FLAG_SPECIAL_SHOW'], 'BS5_FLAG_SPECIAL_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_SPECIAL_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_PERCENT; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_FLAG_PERCENT_SHOW'], 'BS5_FLAG_PERCENT_SHOW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_PERCENT_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ADVANCED_VALIDATION; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_ADVANCED_VALIDATION'], 'BS5_ADVANCED_VALIDATION'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_ADVANCED_VALIDATION_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_USE_VIEWERJS; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_USE_VIEWERJS'], 'BS5_USE_VIEWERJS'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_USE_VIEWERJS_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_FILTERCOLOR_AKTIV]', $bg_classes, $bs5_conf['BS5_FILTERCOLOR_AKTIV']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FILTERBORDERCOLOR_AKTIV; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_draw_pull_down_menu('configuration[BS5_FILTERBORDERCOLOR_AKTIV]', $border_classes, $bs5_conf['BS5_FILTERBORDERCOLOR_AKTIV']); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_FILTERBORDERCOLOR_AKTIV_INFO; ?></td>
							</tr>
							<tr>
				                <td class="dataTableConfig" colspan="3">&nbsp;</td>
							</tr>
							<tr>
				                <td class="dataTableConfig col-left"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW; ?></td>
				                <td class="dataTableConfig col-middle"><?php echo xtc_cfg_select_option($yes_no_array, $bs5_conf['BS5_SEARCHFIELD_ONE_ROW'], 'BS5_SEARCHFIELD_ONE_ROW'); ?></td>
				                <td class="dataTableConfig col-right"><?php echo TEXT_BS5_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW_INFO; ?></td>
							</tr>
							<tr>
				                <td class="txta-r" colspan="3" style="border:none;">
									<input type="submit" class="button" name="submit" value="<?php echo BUTTON_UPDATE; ?>">
				                </td>
							</tr>
			            </table>
					</div>
					<div class="admincol_right">
						<div class="admin_contentbox">
							<div class="img_box">
								<?php echo xtc_image(DIR_WS_INCLUDES.'bs5_template_manager/assets/img/bs5_mixed_'.$lang_code.'.png', 'Information'); ?>
							</div>
						</div>
					</div>
					<?php
									break;

							}
							echo ('</div>');
						}
					?>
		          </form>
				</div>
			</td>
			<!-- body_text_eof //-->
		</tr>
	</table>
	<!-- body_eof //-->
	<!-- footer //-->
	<?php
		// setzt den aktiven Tab
		if ($activ_tab != '') echo $activ_tab;
		require(DIR_WS_INCLUDES . 'footer.php');
	?>
	<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php');

}
?>