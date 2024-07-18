<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

	// Leafo scssphp
	require_once "scssphp/scss.inc.php";
	require_once "scssphp/server/Server.php";
	use ScssPhp\ScssPhp\Compiler;
	use ScssPhp\ScssPhp\OutputStyle;
	use ScssPhp\Server\Server;

class Bs5TplManager {

	// call compiler
    public function compileTheme($theme) {
		$this->compile($theme);
    }

	// Sass-Compiler create the file includes/bs5_template_manager/css/bootstrap.min.css
    protected function compile($theme) {
		global $messageStack;

		try {
			$scss = new Compiler();

			$scss->setOutputStyle(OutputStyle::COMPRESSED); //EXPANDED

			$server = new Server('includes/bs5_template_manager/themes', null, $scss);

			$server->compileFile('includes/bs5_template_manager/themes/' . $theme . '/custom.scss', 'includes/bs5_template_manager/css/bootstrap.min.css');

			$messageStack->add(BOOTSTRAP_CSS_COMPILED, 'success');
		} catch (Exception $e) {
			$messageStack->add(BS5_TPL_MANAGER_THEME_ERROR.$e->getMessage(), 'error');
		}
    }

	// call copy_theme
    public function copy2template($path, $action = 'update')
    {
		$this->copy_theme($path, $action);
    }

	// copy bootstrap.min.css and fonts to template
    protected function copy_theme($path, $action) {
		global $messageStack;

		$tpl_path = DIR_FS_CATALOG.'templates/'.$path.'/';
		$admincss_path = 'css/admindemo/bootstrap.min';
		$css_path = 'css/bootstrap/bootstrap.min';
		$admincss_file = $tpl_path.$admincss_path;
		$css_file = $tpl_path.$css_path;
//		$font_path = 'css/fonts/';

		// if template path exists
		if (!file_exists($tpl_path) || $path == '') {
			$messageStack->add(BS5_TPL_MANAGER_THEME_TPL_PATH_NOT_EXISTS, 'error');
			return false;
		}
		// seit Version 2.0.5.0 Vorschau Datei im Templateordner
		// rename bootstrap.min.css to bootstrap.min.bak
		if (@rename($admincss_file.'.css', $admincss_file.'.bak')) {
			$messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_RENAMED, $admincss_file.'.css', $admincss_file.'.bak'), 'success');
		} else {
            $messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_RENAMED, $admincss_file.'.css'), 'error');
			return false;
		}
		// copy bootstrap.min.css to template
		if (@copy(dirname(__FILE__).'/css/bootstrap.min.css', $admincss_file.'.css')) {
			$messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FILE_COPIED, dirname(__FILE__).'/css/bootstrap.min.css', $admincss_file.'.css'), 'success');
		} else {
			@rename($admincss_file.'bak', $admincss_file.'css');
            $messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FILE_NOT_COPIED, dirname(__FILE__).'/css/bootstrap.min.css', $admincss_file.'bak', $admincss_file.'.css'), 'error');
			return false;
		}

		if ($action == 'copy') {
			// if template file bootstrap.min.css exists
			if (!file_exists($css_file.'.css')) {
				$messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_EXISTS, $css_file.'.css'), 'error');
				return false;
			}
			// rename bootstrap.min.css to bootstrap.min.bak
			$time = date("Y-m-d")."-".time();
			if (@rename($css_file.'.css', $css_file.'_'.$time.'.bak')) {
				$messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_RENAMED, $css_file.'.css', $css_file.'_'.$time.'.bak'), 'success');
			} else {
	            $messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_RENAMED, $css_file.'.css'), 'error');
				return false;
			}
			// copy bootstrap.min.css to template
			if (@copy($admincss_file.'.css', $css_file.'.css')) {
				$messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FILE_COPIED, $admincss_file.'.css', $css_file.'.css'), 'success');
			} else {
				@rename($css_file.'_'.$time.'.bak', $css_file.'css');
	            $messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FILE_NOT_COPIED, dirname(__FILE__).'/css/bootstrap.min.css', $css_file.'bak', $css_file.'.css'), 'error');
				return false;
			}
/*			// if template folder fonts exists
			if(!is_dir($tpl_path.$font_path)){
				 mkdir($tpl_path.$font_path);
			}
			// copy font files to template
			$allowed_extensions = array('eot', 'woff2', 'woff', 'ttf', 'svg');
			$files = glob(dirname(__FILE__).'/fonts/' . "*");
			foreach($files as $file){
				$fileinfo = pathinfo($file);
				if(in_array($fileinfo['extension'], $allowed_extensions)) {
					if (@copy($file, $tpl_path.$font_path.$fileinfo['basename'])) {
						$messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FILE_COPIED, $file, $tpl_path.$font_path.$fileinfo['basename']), 'success');
					} else {
			            $messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FONT_FILE_NOT_COPIED, $file, $tpl_path.$font_path), 'error');
					}
				}
			}
*/
			$messageStack->add(BS5_TPL_MANAGER_THEME_COPY_COMPLIED, 'success');
		}
    }

	// load configuration
    public function get_conf() {
		$conf_query = xtc_db_query('select config_key, config_value from ' . TABLE_BS5_TPL_MANAGER_CONFIG . '');
		while ($conf = xtc_db_fetch_array($conf_query)) {
			$bs5_conf[$conf['config_key']] = stripslashes($conf['config_value']);
		}
		return $bs5_conf;
    }

	// save configuration
	public function set_conf($config_data) {
		foreach ($config_data as $key => $value) {
			xtc_db_query("UPDATE ".TABLE_BS5_TPL_MANAGER_CONFIG." SET config_value = '".$value."' WHERE config_key = '".$key."'");
		}
		if (COMPRESS_STYLESHEET == 'true' || COMPRESS_JAVASCRIPT == 'true'){
			$this->touch_config_php();
		}
	}

	// touch template config.php, if settings changed and compress is true
	protected function touch_config_php() {
		$tpl_config_file = DIR_FS_CATALOG.'templates/'.BS5_CURRENT_TEMPLATE.'/config/config.php';

		if (file_exists($tpl_config_file)) {
			touch($tpl_config_file);
		}
	}

	// load defaults - custom1 and custom2 together
    public function get_theme_settings() {
		$theme_query = xtc_db_query("select theme_key, defaults from " . TABLE_BS5_TPL_MANAGER_THEME . "");
		while ($defaults = xtc_db_fetch_array($theme_query)) {
			$theme_settings[$defaults['theme_key']] = array	(	'defaults' => json_decode($defaults['defaults'], true),
                                  							);
		}
		return $theme_settings;
    }

	// save defaults - custom1 und custom2 separated
    public function set_theme_settings($theme_key, $theme_defaults) {
        $value = array();
		for($i=0; $i < count($theme_defaults[$theme_key]); $i++){
			foreach ($theme_defaults[$theme_key][$i] as $k => $v){
				$value[] = $v;
			}
		}
		xtc_db_query("UPDATE ".TABLE_BS5_TPL_MANAGER_THEME." SET defaults = '".json_encode($value, true)."' WHERE theme_key = '".$theme_key."'");
    }

	// execute the copy of _bootswatch.scss folder custom1 or custom2
    public function copyBootswatch($theme_name, $folder_name = '') {
		// copy _bootswatch.scss
		if ($folder_name != ''){
			$this->copyBootswatchFile($theme_name, $folder_name);
		}
		return;
    }

	// copy file
    protected function copyBootswatchFile($theme_name, $folder_name)
    {
		global $messageStack;

		$file = dirname(__FILE__).'/themes/'.$theme_name.'/_bootswatch.scss';
		$copy = dirname(__FILE__).'/themes/'.$folder_name.'/_bootswatch.scss';
        // check if the data is a file
        if (file_exists($file) && is_file($file)) {
			if (@copy($file, $copy)) {
				$messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FILE_COPIED, $file, $copy), 'success');
			} else {
	            $messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_FILE_COPIED, $file, $copy), 'error');
				return false;
			}
        } else {
            $messageStack->add(sprintf(BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_EXISTS, $file), 'error');
			return false;
		}
    }

	// load colors and variables - custom1 and custom2 separated
    public function get_theme($theme_name, $return_name ='') {
		$bs5_theme = array();
		// load _variables.scss from the corresponding folder
		$var_string = $this->load($theme_name);
		$var_string = str_replace(' !default', '', $var_string);
		// aufbereiten der Daten
		if ($var_string != ''){
			$variables = explode(';', trim(trim($var_string), ';'));
            for($i=0; $i < count($variables); $i++){
				$variable = explode(':', $variables[$i]);
				$bs5_theme[$return_name][$i] = array(trim($variable[0]) => trim($variable[1]));
			}
		}
		return $bs5_theme;
    }

	// load file
    protected function load($theme_name, $file_name = 'variables')
    {
		$file = dirname(__FILE__).'/themes/'.$theme_name.'/_'.$file_name.'.scss';
        // check if the data is a file
        if (file_exists($file) && is_file($file)) {
            if (($data = file_get_contents($file)) !== false) {
				return $data;
            }
        }
		return false;
    }

	// Prepare / save colors and variables - custom1 und custom2 separated
    public function set_theme($theme_data) {
		$data = '';
		foreach ($theme_data as $key => $val){
			$folder = $key;
            for($i=0; $i < count($theme_data[$key]); $i++){
				foreach ($theme_data[$key][$i] as $k => $v){
					$data .= $k.': '.$v.' !default;'."\n";
				}
			}
			$this->write($folder, $data);
			$data = '';
		}
    }

	// write file scss
    protected function write($folder, $data, $file = 'variables')
    {
		$file = dirname(__FILE__).'/themes/'.$folder.'/_'.$file.'.scss';
		if (($data = file_put_contents($file, $data)) !== false) {
				return true;
        }
		return false;
    }

	// load file
    public function get_add($theme_name, $file = 'add')
    {
		$file_name = dirname(__FILE__).'/themes/'.$theme_name.'/_'.$file.'.scss';
		if (filesize($file_name) > 0){
			$data = $this->load($theme_name, $file);
			return $data;
		}
		return false;
    }

	// write file scss
    public function set_add($theme_name, $data, $file = 'add')
    {
		if ($file == 'addfontdef'){
			if ($data != ''){
				$data = sprintf(BS5_DEFAULT_FONT_FAMILY ,$data);
			}
		}
		$this->write($theme_name, stripcslashes($data), $file);
    }

    public function get_yes_no() {
		$yes_no_array = array('true', 'false');
		return $yes_no_array;
    }

    public function get_menucase() {
		$menucase = array(
			array('id' => '1', 'text' => 'Megamenu'),
			array('id' => '2', 'text' => 'Dropdown'),
		);
		return $menucase;
    }

    public function get_superfish_level() {
		$superfish_level = array(
			array('id' => 'false', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_ALL),
			array('id' => '1', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_1),
			array('id' => '2', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_2),
			array('id' => '3', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_3),
			array('id' => '4', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_4),
			array('id' => '5', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_5),
			array('id' => '6', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_6),
		);
		return $superfish_level;
    }

    public function get_carousel_show() {
		$carousel_show = array(
			array('id' => 'false', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_NONE),
			array('id' => 'screen', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SCREEN),
			array('id' => 'shop', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SHOP),
		);
		return $carousel_show;
    }

		public function get_fade_slide() {
		$fade_slide = array(
			array('id' => 'true', 'text' => 'fade'),
			array('id' => 'false', 'text' => 'slide'),
		);
		return $fade_slide;
    }

		public function get_bg_classes() {
		$bg_classes = array(
			array('id' => 'none', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_NONE),
			array('id' => 'primary', 'text' => 'bg-primary'),
			array('id' => 'primary-subtle', 'text' => 'bg-primary-subtle'),
			array('id' => 'secondary', 'text' => 'bg-secondary'),
			array('id' => 'secondary-subtle', 'text' => 'bg-secondary-subtle'),
			array('id' => 'success', 'text' => 'bg-success'),
			array('id' => 'success-subtle', 'text' => 'bg-success-subtle'),
			array('id' => 'danger', 'text' => 'bg-danger'),
			array('id' => 'danger-subtle', 'text' => 'bg-danger-subtle'),
			array('id' => 'warning', 'text' => 'bg-warning'),
			array('id' => 'warning-subtle', 'text' => 'bg-warning-subtle'),
			array('id' => 'info', 'text' => 'bg-info'),
			array('id' => 'info-subtle', 'text' => 'bg-info-subtle'),
			array('id' => 'light', 'text' => 'bg-light'),
			array('id' => 'light-subtle', 'text' => 'bg-light-subtle'),
			array('id' => 'dark', 'text' => 'bg-dark'),
			array('id' => 'dark-subtle', 'text' => 'bg-dark-subtle'),
			array('id' => 'body-secondary', 'text' => 'bg-body-secondary'),
			array('id' => 'body-tertiary', 'text' => 'bg-body-tertiary'),
			array('id' => 'body', 'text' => 'bg-body'),
			array('id' => 'black', 'text' => 'bg-black'),
			array('id' => 'white', 'text' => 'bg-white'),
			array('id' => 'transparent', 'text' => 'bg-transparent'),
			array('id' => 'custom', 'text' => 'bg-custom'),
		);
		return $bg_classes;
		}

		public function get_border_classes() {
		$border_classes = array(
			array('id' => 'none', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_NONE),
			array('id' => 'primary', 'text' => 'border-primary'),
			array('id' => 'primary-subtle', 'text' => 'border-primary-subtle'),
			array('id' => 'secondary', 'text' => 'border-secondary'),
			array('id' => 'secondary-subtle', 'text' => 'border-secondary-subtle'),
			array('id' => 'success', 'text' => 'border-success'),
			array('id' => 'success-subtle', 'text' => 'border-success-subtle'),
			array('id' => 'danger', 'text' => 'border-danger'),
			array('id' => 'danger-subtle', 'text' => 'border-danger-subtle'),
			array('id' => 'warning', 'text' => 'border-warning'),
			array('id' => 'warning-subtle', 'text' => 'border-warning-subtle'),
			array('id' => 'info', 'text' => 'border-info'),
			array('id' => 'info-subtle', 'text' => 'border-info-subtle'),
			array('id' => 'light', 'text' => 'border-light'),
			array('id' => 'light-subtle', 'text' => 'border-light-subtle'),
			array('id' => 'dark', 'text' => 'border-dark'),
			array('id' => 'dark-subtle', 'text' => 'border-dark-subtle'),
			array('id' => 'black', 'text' => 'border-black'),
			array('id' => 'white', 'text' => 'border-white'),
		);
		return $border_classes;
		}

    public function get_navbar_classes() {
		$navbar_classes = array(
			array('id' => '', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_NONE),
			array('id' => 'dark', 'text' => 'navbar-dark'),
		);
		return $navbar_classes;
	}

    public function get_text_classes() {
		$text_classes = array(
			array('id' => '', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_NONE),
			array('id' => 'text-primary', 'text' => 'text-primary'),
			array('id' => 'text-primary-emphasis', 'text' => 'text-primary-emphasis'),
			array('id' => 'text-secondary', 'text' => 'text-secondary'),
			array('id' => 'text-secondary-emphasis', 'text' => 'text-secondary-emphasis'),
			array('id' => 'text-success', 'text' => 'text-success'),
			array('id' => 'text-success-emphasis', 'text' => 'text-success-emphasis'),
			array('id' => 'text-danger', 'text' => 'text-danger'),
			array('id' => 'text-danger-emphasis', 'text' => 'text-danger-emphasis'),
			array('id' => 'text-warning', 'text' => 'text-warning'),
			array('id' => 'text-warning-emphasis', 'text' => 'text-warning-emphasis'),
			array('id' => 'text-info', 'text' => 'text-info'),
			array('id' => 'text-info-emphasis', 'text' => 'text-info-emphasis'),
			array('id' => 'text-light', 'text' => 'text-light'),
			array('id' => 'text-light-emphasis', 'text' => 'text-light-emphasis'),
			array('id' => 'text-dark', 'text' => 'text-dark'),
			array('id' => 'text-dark-emphasis', 'text' => 'text-dark-emphasis'),
			array('id' => 'text-body', 'text' => 'text-body'),
			array('id' => 'text-body-emphasis', 'text' => 'text-body-emphasis'),
			array('id' => 'text-body-secondary', 'text' => 'text-body-secondary'),
			array('id' => 'text-body-tertiary', 'text' => 'text-body-tertiary'),
			array('id' => 'text-black', 'text' => 'text-black'),
			array('id' => 'text-white', 'text' => 'text-white'),
			array('id' => 'text-black-50', 'text' => 'text-black-50'),
			array('id' => 'text-white-50', 'text' => 'text-white-50'),
			array('id' => 'text-custom', 'text' => 'text-custom'),
		);
		return $text_classes;
    }

    public function get_traffic_styles() {
		$traffic_styles = array(
			array('id' => 'false', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_NONE),
			array('id' => 'l', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_L),
			array('id' => 'ls', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LS),
			array('id' => 'lt', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LT),
			array('id' => 'lts', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LTS),
			array('id' => 't', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_T),
			array('id' => 'ts', 'text' => TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_TS),
		);
		return $traffic_styles;
    }

	public function get_templates() {
		if ($dir = opendir(DIR_FS_CATALOG.'templates/')) {
			$templates_array[] = array ('id' => '', 'text' => TEXT_BS5_TPL_MANAGER_THEME_CURRENT_TEMPLATE0);
			while (($templates = readdir($dir)) !== false) {
				if (is_dir(DIR_FS_CATALOG.'templates/'.$templates) && ($templates != "CVS") && substr($templates, 0, 1) != ".") {
					$templates_array[] = array ('id' => $templates, 'text' => $templates);
				}
			}
			closedir($dir);
			sort($templates_array);
			return $templates_array;
		}
	}

    public function get_themes($plus = false) {
		$themes_array = array(
			array('id' => 'default', 'text' => 'Bootstrap Default'),
			array('id' => 'bs5-blue', 'text' => 'BS5 blau - blue'),
			array('id' => 'bs5-darkblue', 'text' => 'BS5 dunkelblau - darkblue'),
			array('id' => 'bs5-darkcyan', 'text' => 'BS5 dunkelcyan - darkcyan'),
			array('id' => 'bs5-darkgreen', 'text' => 'BS5 dunkelgr&uuml;n - darkgreen'),
			array('id' => 'bs5-darkmagenta', 'text' => 'BS5 dunkelmagenta - darkmagenta'),
			array('id' => 'bs5-darkred', 'text' => 'BS5 dunkelrot - darkred'),
			array('id' => 'bs5-gold', 'text' => 'BS5 gold - gold'),
			array('id' => 'bs5-green', 'text' => 'BS5 gr&uuml;n - green'),
			array('id' => 'bs5-orange', 'text' => 'BS5 orange - orange'),
			array('id' => 'bs5-red', 'text' => 'BS5 rot - red'),
			array('id' => 'cerulean', 'text' => 'Cerulean'),
			array('id' => 'cosmo', 'text' => 'Cosmo'),
			array('id' => 'cyborg', 'text' => 'Cyborg'),
			array('id' => 'darkly', 'text' => 'Darkly'),
			array('id' => 'flatly', 'text' => 'Flatly'),
			array('id' => 'journal', 'text' => 'Journal'),
			array('id' => 'litera', 'text' => 'Litera'),
			array('id' => 'lumen', 'text' => 'Lumen'),
			array('id' => 'lux', 'text' => 'Lux'),
			array('id' => 'materia', 'text' => 'Materia'),
			array('id' => 'minty', 'text' => 'Minty'),
			array('id' => 'morph', 'text' => 'Morph'),
			array('id' => 'pulse', 'text' => 'Pulse'),
			array('id' => 'quartz', 'text' => 'Quartz'),
			array('id' => 'sandstone', 'text' => 'Sandstone'),
			array('id' => 'simplex', 'text' => 'Simplex'),
			array('id' => 'sketchy', 'text' => 'Sketchy'),
			array('id' => 'slate', 'text' => 'Slate'),
			array('id' => 'solar', 'text' => 'Solar'),
			array('id' => 'spacelab', 'text' => 'Spacelab'),
			array('id' => 'superhero', 'text' => 'Superhero'),
			array('id' => 'united', 'text' => 'United'),
			array('id' => 'vapor', 'text' => 'Vapor'),
			array('id' => 'yeti', 'text' => 'Yeti'),
			array('id' => 'zephyr', 'text' => 'Zephyr'),
		);
		if ($plus != false) {
			$themes_array[] = array('id' => 'custom1', 'text' => TEXT_BS5_TPL_MANAGER_THEME_CUSTOM1);
			$themes_array[] = array('id' => 'custom2', 'text' => TEXT_BS5_TPL_MANAGER_THEME_CUSTOM2);
		}
		return $themes_array;
    }

    public function get_bs5_themes() {
		$bs5_themes_array = array(
			array('id' => '', 'text' => 'Bootstrap (bootstrap.min.css)'),
			array('id' => 'default', 'text' => 'BS5 standard - default'),
			array('id' => 'blue', 'text' => 'BS5 blau - blue'),
			array('id' => 'darkblue', 'text' => 'BS5 dunkelblau - darkblue'),
			array('id' => 'darkcyan', 'text' => 'BS5 dunkelcyan - darkcyan'),
			array('id' => 'darkgreen', 'text' => 'BS5 dunkelgr&uuml;n - darkgreen'),
			array('id' => 'darkmagenta', 'text' => 'BS5 dunkelmagenta - darkmagenta'),
			array('id' => 'darkred', 'text' => 'BS5 dunkelrot - darkred'),
			array('id' => 'gold', 'text' => 'BS5 gold - gold'),
			array('id' => 'green', 'text' => 'BS5 gr&uuml;n - green'),
			array('id' => 'orange', 'text' => 'BS5 orange - orange'),
			array('id' => 'red', 'text' => 'BS5 rot - red'),
		);
		return $bs5_themes_array;
    }

	public function get_color_vars($plus = false) {
		$color_vars = array(
			array('id' => '$white', 'text' => '$white '.COLOR_2),
			array('id' => '$gray-100', 'text' => '$gray-100 '.COLOR_3),
			array('id' => '$gray-200', 'text' => '$gray-200 '.COLOR_4),
			array('id' => '$gray-300', 'text' => '$gray-300 '.COLOR_5),
			array('id' => '$gray-400', 'text' => '$gray-400 '.COLOR_6),
			array('id' => '$gray-500', 'text' => '$gray-500 '.COLOR_7),
			array('id' => '$gray-600', 'text' => '$gray-600 '.COLOR_8),
			array('id' => '$gray-700', 'text' => '$gray-700 '.COLOR_9),
			array('id' => '$gray-800', 'text' => '$gray-800 '.COLOR_10),
			array('id' => '$gray-900', 'text' => '$gray-900 '.COLOR_11),
			array('id' => '$black', 'text' => '$black '.COLOR_12),
			array('id' => '$blue', 'text' => '$blue '.COLOR_13),
			array('id' => '$indigo', 'text' => '$indigo '.COLOR_14),
			array('id' => '$purple', 'text' => '$purple '.COLOR_15),
			array('id' => '$pink', 'text' => '$pink '.COLOR_16),
			array('id' => '$red', 'text' => '$red '.COLOR_17),
			array('id' => '$orange', 'text' => '$orange '.COLOR_18),
			array('id' => '$yellow', 'text' => '$yellow '.COLOR_19),
			array('id' => '$green', 'text' => '$green '.COLOR_20),
			array('id' => '$teal', 'text' => '$teal '.COLOR_21),
			array('id' => '$cyan', 'text' => '$cyan '.COLOR_22),
			array('id' => '$custom-bg', 'text' => '$custom-bg '.COLOR_0),
			array('id' => '$custom-color', 'text' => '$custom-color '.COLOR_1),
			array('id' => 'null', 'text' => 'null ohne')
		);
		if ($plus != false) {
			$color_vars[] = array('id' => 'inherit', 'text' => 'inherit '.INHERIT);
		}
		return $color_vars;
	}

    public function get_color_classes() {
		$color_classes = array(
			array('id' => '$primary', 'text' => '$primary'),
			array('id' => '$secondary', 'text' => '$secondary'),
			array('id' => '$success', 'text' => '$success'),
			array('id' => '$danger', 'text' => '$danger'),
			array('id' => '$warning', 'text' => '$warning'),
			array('id' => '$info', 'text' => '$info'),
			array('id' => '$light', 'text' => '$light'),
			array('id' => '$dark', 'text' => '$dark'),
			array('id' => 'null', 'text' => 'null ohne')
		);
		$color_vars = $this->get_color_vars();
		$color_classes = array_merge($color_classes, $color_vars);
		return $color_classes;
    }

}
