<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

// BS5 Banner Manager

if (defined('MODULE_BS5_TPL_MANAGER_STATUS') && MODULE_BS5_TPL_MANAGER_STATUS == 'true') {

	if (MODULE_BANNER_MANAGER_STATUS == 'true') {

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

		// Slidereinstellungen
		$settings = BS5_DEFAULT_BANNER_SETTINGS;
		$conv_settings = bs5_convertSettings($settings);

		if (isset($smarty) && is_object($smarty)) {
			$smarty->assign('SLIDERSETTINGS', $conv_settings);
      }
	}

}
