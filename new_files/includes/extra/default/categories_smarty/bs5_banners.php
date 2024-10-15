<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// BS5 Banner Manager

if (defined('MODULE_BS5_TPL_MANAGER_STATUS') && MODULE_BS5_TPL_MANAGER_STATUS == 'true') {

	if (MODULE_BANNER_MANAGER_STATUS == 'true'
		&& isset($category['bs5_banner_ids'])
		&& $category['bs5_banner_ids'] != ''
		)
	{
		require_once(DIR_FS_INC . 'xtc_update_banner_display_count.inc.php');
		require_once(DIR_FS_INC . 'xtc_get_banners_url.inc.php');

		function bs5_convertSettings($settings) {
			if (is_string($settings)) {
				$settings = explode(',', $settings);
			}
			$conv_settings = array(
				'bs5_control_position' => $settings[0],
	            'bs5_control_class' => $settings[1],
	            'bs5_control_rounded' => $settings[2],
	            'bs5_indicator_position' => $settings[3],
	            'bs5_indicator_class' => $settings[4],
	            'bs5_indicator_rounded' => $settings[5],
	            'bs5_duration' => $settings[6],
			);
			if (strpos($settings[1], 'text') !== false) {
				$conv_settings['bs5_control_text_class'] = 'text-';
			}
	    	return $conv_settings;
		}

		// Bannerdaten
		$bs5_banner_query = xtc_db_query("SELECT *
											FROM " . TABLE_BANNERS . "
											WHERE banners_image != ''
											AND languages_id = '" . (int)$_SESSION['languages_id'] . "'
											AND banners_group_id IN (".$category['bs5_banner_ids'].")");
		if (xtc_db_num_rows($bs5_banner_query) > 0) {
			$bs5_banner_content = array();
			while ($bs5_banner = xtc_db_fetch_array($bs5_banner_query)) {
				$bs5_banner_content[] = $bs5_banner;
			}

			// aus xtc_display_banner.inc.php
			$shop_url = xtc_get_top_level_domain(HTTP_SERVER);

			$bs5_banner_array = array();
			foreach ($bs5_banner_content as $bs5_banner) {
				$bs5_banner_url = xtc_get_top_level_domain($bs5_banner['banners_url']);
				$bs5_banner_title = xtc_parse_input_field_data($bs5_banner['banners_title'], array('"' => '&quot;'));
				$bs5_banner_link = (($bs5_banner['banners_redirect'] == 0) ? xtc_get_banners_url($bs5_banner['banners_url']) : xtc_href_link(FILENAME_REDIRECT, 'action=banner&goto=' . $bs5_banner['banners_id']));
				$bs5_banner_target = (($shop_url['domain'] != $bs5_banner_url['domain']) ? ' target="_blank" rel="noopener"' : '');
				$bs5_banner_image = (($bs5_banner['banners_image'] != '') ? xtc_image(DIR_WS_IMAGES.'banner/'.$bs5_banner['banners_image'], $bs5_banner['banners_title'], '', '', 'title="'.$bs5_banner['banners_title'].'"') : '');
				$bs5_banner_image_mobile = (($bs5_banner['banners_image_mobile'] != '') ? xtc_image(DIR_WS_IMAGES.'banner/'.$bs5_banner['banners_image_mobile'], $bs5_banner['banners_title'], '', '', 'title="'.$bs5_banner['banners_title'].'"') : '');
				$bs5_banner_image_title = (($bs5_banner['banners_image_title'] != '') ? xtc_parse_input_field_data($bs5_banner['banners_image_title'], array('"' => '&quot;')) : $bs5_banner_title);
				$bs5_banner_image_alt = (($bs5_banner['banners_image_alt'] != '') ? xtc_parse_input_field_data($bs5_banner['banners_image_alt'], array('"' => '&quot;')) : $bs5_banner_image_title);

				$bs5_banner_array[] = array(
					'IMAGE' => ((xtc_not_null($bs5_banner['banners_url'])) ? '<a title="'.$bs5_banner_title.'" href="'.$bs5_banner_link.'"'.$bs5_banner_target.'>'.$bs5_banner_image.'</a>' : $bs5_banner_image),
					'IMAGE_SRC' => (($bs5_banner['banners_image'] != '') ? DIR_WS_BASE.DIR_WS_IMAGES.'banner/'.$bs5_banner['banners_image'] : ''),
					'IMAGE_IMG' => $bs5_banner_image,
					'IMAGE_SRC_MOBILE' => (($bs5_banner['banners_image_mobile'] != '') ? DIR_WS_BASE.DIR_WS_IMAGES.'banner/'.$bs5_banner['banners_image_mobile'] : ''),
					'IMAGE_IMG_MOBILE' => $bs5_banner_image_mobile,
					'IMAGE_TITLE' => $bs5_banner_image_title,
					'IMAGE_ALT' => $bs5_banner_image_alt,
					'LINK' => ((xtc_not_null($bs5_banner['banners_url'])) ? $bs5_banner_link : ''),
					'TARGET' => $bs5_banner_target,
					'TEXT' => $bs5_banner['banners_html_text'],
					'TITLE' => $bs5_banner_title,
					'GROUP' => $bs5_banner['banners_group'],
				);
				xtc_update_banner_display_count($bs5_banner['banners_id']);
			}

			// Slidereinstellungen
			$settings = $category['bs5_banner_settings'] != '' ? $category['bs5_banner_settings'] : BS5_DEFAULT_BANNER_SETTINGS;
			$conv_settings = bs5_convertSettings($settings);

			if (isset($default_smarty) && is_object($default_smarty)) {
				$default_smarty->assign('SLIDER', $bs5_banner_array);
				$default_smarty->assign('SLIDERSETTINGS', $conv_settings);
			}
		}
	}
}
