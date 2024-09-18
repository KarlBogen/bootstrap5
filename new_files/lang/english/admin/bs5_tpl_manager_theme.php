<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

$lang_array = array(
	'TEXT_BS5_TPL_MANAGER_THEME_HEADING_TITLE' => 'Bootstrap 5 Theme Settings',
	'TEXT_BS5_TPL_MANAGER_THEME_INFO' => 'Here made settings have only effect on the shop, if the theme was copied into the shop!<br>',
	'TEXT_BS5_TPL_MANAGER_THEME_PREVIEW_TITLE' => 'Preview of theme - ',
	'TEXT_BS5_TPL_MANAGER_THEME_PREVIEW_INFO' => '<small><i>&nbsp;&nbsp;&nbsp;(Preview does not match perfectly the shop view)</i></small>',

	'TEXT_BS5_TPL_MANAGER_THEME_TAB_BASICS' => 'Basics',
	'BUTTON_COPY_2_TEMPLATE' => 'Ready - copy theme to template',
	'TEXT_BS5_TPL_MANAGER_THEME_COPY_2_TEMPLATE_INFO' => 'The theme settings made on this page are taken over into the template!',
	'BS5_COPY_2_TEMPLATE' => 'Transfer settings to the template?<br><br>Is the path to the Bootstrap 5 template<br><br>&nbsp;&nbsp;&nbsp;"<strong>%s</strong>"<br><br>correct?',
	'TEXT_BS5_TPL_MANAGER_THEME_PATHS' => 'Template and theme paths:',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_TEMPLATE' => 'BS5 Template:',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_TEMPLATE_INFO' => 'Path to Bootstrap5-Template!<br>
		The CSS file created in the theme settings will be copied to this template.',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_TEMPLATE0' => 'Please choose ...',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_THEME' => 'BS5 Theme:',
	'TEXT_BS5_TPL_MANAGER_THEME_CURRENT_THEME_INFO' => 'Select the bootstrap theme that will be shown in the preview or will be copied to the shop!',
	'TEXT_BS5_BOOTSTRAP_THEME_COLOR_MODE' => 'Color mode preview:',
	'TEXT_BS5_BOOTSTRAP_PREVIEW_COLOR_MODE' => 'Dark color mode?<br><br><span style="color:red;">New in the BS framework!</span>',
	'TEXT_BS5_BOOTSTRAP_PREVIEW_COLOR_MODE_INFO' => 'The dark color mode for the preview can be activated here.<br>
		<strong>Note: This is only possible for the preview. In order to activate the color mode in the shop template, code modifications in the file "includes/header.php" are necessary.<br>
		More details can be found in the BS5 configuration menu item!</strong>',
	'TEXT_BS5_TPL_MANAGER_THEME_CUSTOM1' => 'Custom theme 1',
	'TEXT_BS5_TPL_MANAGER_THEME_CUSTOM2' => 'Custom theme 2',
	'TEXT_BS5_TPL_MANAGER_THEME_BOOTSWATCH_INFO' => '<strong>Note for BS5 Theme:</strong><br>The themes that can be selected in the dropdown are freely available from https://bootswatch.com. At Bootswatch you can find template demos and files to download.<br>
		For some templates, external Google fonts are suggested, the corresponding lines of code have been removed, and these fonts are not imported (to import these fonts DSGVO-compliant, see also the "Additional font" tab).<br><br>
		<strong>The "Roboto" font is preinstalled as the default font for all themes.</strong>',

	'TEXT_BS5_TPL_MANAGER_THEME_TAB_FONTS' => 'Additional font',
	'TEXT_BS5_TPL_MANAGER_FONTS_INFO' => '<span style="color:red;"><strong>Please note the innovation point 5. (Cumulative Layout Shift - CLS)!</strong></span><br><br><span style="color:red;">Location of the font files "templates/bootstrap5/css/fonts/"!</span><br><br>A DSGVO-compliant font must be saved on your own server.',
	'TEXT_BS5_TPL_MANAGER_THEME_FONTS_NAME' => 'Name of the font:',
	'TEXT_BS5_TPL_MANAGER_THEME_FONTS_NAME_INFO' => 'Enter the name of the font to be included, e.g. "Open Sans" (without quotation marks)!<br>
		<strong>You will find instructions below!</strong>',
	'TEXT_BS5_TPL_MANAGER_THEME_FONT_DEFINITION' => 'CSS code of the font:',
	'TEXT_BS5_TPL_MANAGER_THEME_FONT_DEFINITION_INFO' => 'Enter the CSS code for embedding the font!<br>
		<strong>You will find instructions below!</strong>',

	'TEXT_BS5_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1' => 'Theme template:',
	'TEXT_BS5_TPL_MANAGER_THEME_THEMEMODEL_CUSTOM1_INFO' => 'Select the template that should be used for this theme!',
	'TEXT_BS5_TPL_MANAGER_THEME_THEMEMODEL_LOAD_INFO' => 'Click here to load the template selected above!',
	'BUTTON_LOAD_THEMEMODEL' => 'Load template',
	'BS5_LOAD_THEMEMODEL' => 'Load template?<br><br>Previously made settings in this theme will be lost!',
	'TEXT_BS5_TPL_MANAGER_THEME_COLOR' => 'Color: ',
	'TEXT_BS5_TPL_MANAGER_THEME_VAR' => '<br>Variable: ',
	'COLOR_0' => '$custom-bg',
	'COLOR_1' => '$custom-color',
	'COLOR_2' => 'white',
	'COLOR_3' => 'gray 100',
	'COLOR_4' => 'gray 200',
	'COLOR_5' => 'gray 300',
	'COLOR_6' => 'gray 400',
	'COLOR_7' => 'gray 500',
	'COLOR_8' => 'gray 600',
	'COLOR_9' => 'gray 700',
	'COLOR_10' => 'gray 800',
	'COLOR_11' => 'gray 900',
	'COLOR_12' => 'black',
	'COLOR_13' => 'blue',
	'COLOR_14' => 'indigo',
	'COLOR_15' => 'purple',
	'COLOR_16' => 'pink',
	'COLOR_17' => 'red',
	'COLOR_18' => 'orange',
	'COLOR_19' => 'yellow',
	'COLOR_20' => 'green',
	'COLOR_21' => 'teal',
	'COLOR_22' => 'cyan',
	'INHERIT' => 'inherit',
	'TEXT_BS5_TPL_MANAGER_THEME_COLOR_VARS_STANDARD' => 'Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_23_INFO' => 'Here, the default colors are assigned to the bootstrap utility classes (text-primary, bg-secondary, etc.)!<br>
		You will find more information under "Documentation-> Utilitis-> Colors" on the page "https://getbootstrap.com"<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_0_INFO' => '<strong>Custom color!</strong><br>
		These color variable can be used for a custom theme.<br>
		Value from template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_1_INFO' => '<strong>Custom color!</strong><br>
		These color variable can be used for a custom theme.<br>
		Value from template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_2_INFO' => '<strong>Primary colors!</strong><br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_23' => 'Bootstrap color classes:',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_31' => 'Body background color',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_31_INFO' => 'Default background color of the theme!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_32' => 'Body-Font-Color',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_32_INFO' => 'Default font color of the theme!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_33' => 'Link-Color',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_33_INFO' => 'Default font color of hyperlinks!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_34' => 'Link-Hover-Color',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_34_INFO' => 'Default font color of hyperlinks on mouseover!<br>
		All color variables (for example, $blue or $danger), but also the Sass functions darken() (for example, darken($danger, 20%) and lighten() (for example, lighten($danger, 40%) can be used.<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_35' => 'Border-Width',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_35_INFO' => 'Default width of border in pixels (e.g. 2px)!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_36' => 'Border-Color',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_37' => 'Font color active',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_37_INFO' => 'Default font color of active elements!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_38' => 'Background active',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_38_INFO' => 'Default background color of active elements!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_39' => 'Font size',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_39_INFO' => 'Default font size, use "rem" (z.B. 0.8rem oder 1.1rem)!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_40' => 'Font size H1',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_40_INFO' => 'Font size H1, relative to default font size!<br>
		You should only change the last numbers (e.g. 2.2 instead of 2.5)!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_41' => 'Font size H2',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_42' => 'Font size H3',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_43' => 'Font size H4',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_44' => 'Font size H5',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_45' => 'Font color H1-H5',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_45_INFO' => 'Default font color H1-H5!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_46' => 'Background Inputs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_46_INFO' => 'Background color of input form fields!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_47' => 'Font color inputs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_47_INFO' => 'Font color of input form fields!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_48' => 'Border color inputs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_48_INFO' => 'Border color of input form fields!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_49' => 'Background Input-Addons',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_49_INFO' => 'Background color of input addons!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_50' => 'Font color Navbar-Dark',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_50_INFO' => 'Font color for navigations with the class "navbar-dark"!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_51' => 'Font color Navbar-Dark hover',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_51_INFO' => 'Font color for navigations with the class "navbar-dark" on mouseover!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_52' => 'Font color Navbar-Dark active',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_52_INFO' => 'Font color of active links on navigations with the class "navbar-dark"!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_53' => 'Font color Navbar-Light',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_53_INFO' => 'Font color for navigations with the class "navbar-light"!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_54' => 'Font color Navbar-Light hover',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_54_INFO' => 'Font color for navigations with the class "navbar-light" on mouseover!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_55' => 'Font color Navbar-Light active',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_55_INFO' => 'Font color of active links on navigations with the class "navbar-light"!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_56' => 'Background pagination',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_56_INFO' => 'Background color of pagination-nav!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_57' => 'Background pagination hover',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_57_INFO' => 'Background color of pagination-nav on moueseover!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_58' => 'Font color pagination',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_58_INFO' => 'Font color of pagination-nav links!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_59' => 'Border color card',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_59_INFO' => 'Border color of "cards" content container!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_60' => 'Background card header/footer',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_60_INFO' => 'Background color of card-header and card-footer!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_61' => 'Background Card',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_61_INFO' => 'Background color of cards!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_62' => 'Background list-group',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_62_INFO' => 'Background color of list-groups!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_63' => 'Border color list-group',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_63_INFO' => 'Border color of list-groups!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_64' => 'Background modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_64_INFO' => 'Background color of modal popupbox!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_65' => 'Border color modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_65_INFO' => 'Border color of modal popupbox!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_66' => 'Textborder modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_66_INFO' => 'Textborder color of modal popupbox!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_67' => 'Color close modalbox',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_67_INFO' => 'Color of the "X" of modal popupbox!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_68' => 'Background breadcrumbs',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_68_INFO' => 'Background color of the breadcrumbs-nav!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_69' => 'Background dropdown',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_69_INFO' => 'Background color of dropdowns (if the mouse touches the superfish menu, additional levels are opened in a dropdown of that color)!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_70' => 'Font color dropdown',
	'TEXT_BS5_TPL_MANAGER_THEME_FIELD_70_INFO' => 'Font color of dropdowns!<br>
		Default of the template: ',
	'TEXT_BS5_TPL_MANAGER_THEME_VARS_ADD' => 'Additional sass variables',
	'TEXT_BS5_TPL_MANAGER_THEME_VARS_ADD_INFO' => 'Here additional variables can be defined (for example "$pagination-border-color: $gray-300 !default;")!<br>
		Which variables are possible for bootstrap 5 can be found in the file "admin/includes/bs5_template_manager/themes/variables.scss".<br>
		<strong>Pay attention to the spelling and to " !default" at the end!</strong><br><br>
		<strong>Tip:</strong> Other CSS statements can also be defined here.<br>
		Headings have the additional classes "card" and "bg-h" in the template.<br>
		With the line ".card.bg-h {background-color: # c2c2c2;}" all headers get a gray background color.<br>
		Also combinations like<br>
		$link-hover-decoration: none !default;<br>
		.card.bg-h{background-color:#c2c2c2;}<br>
		are possible.',

	'TEXT_BS5_TPL_MANAGER_THEME_TAB_BUTTON' => 'Buttons',
	'TEXT_BS5_TPL_MANAGER_THEME_BUTTONS' => '<h4>Buttons</h4>The destination was to make Bootstrap5 as barrier-free as possible - the shop should also be easy to use with the keyboard.<br><br>
		Modified does not offer the option of directly accessing the corresponding button or link tag using the /source/inc/css_button.inc.php file, but only accessing a child element.<br>
		For this reason, the CSS classes were inserted directly into the output files.<br><br>
		Here <strong>as an example the button "Add to cart"</strong>.<br><br>
		This code can be found in the template files "module/product_info/product_info...html":<br><br>
		<code>&nbsp;&nbsp;{$ADD_CART_BUTTON|replace:\'&lt;button\':\'&lt;button class="btn btn-cart btn-secondary"\'}</code><br><br>
		If you want the gray (btn-secondary) button to become a green (btn-success) button, you have to change the CSS class as follows:<br><br>
		<code>&nbsp;&nbsp;{$ADD_CART_BUTTON|replace:\'&lt;button\':\'&lt;button class="btn btn-cart btn-success"\'}</code><br><br>
		You can find the possible CSS classes at <a href="https://getbootstrap.com" target="_blank">Bootstrap</a> under Docs->Components->Buttons.<br><br><br>
		<h4>Icons</h4>Most <strong>icons can be customized in the template file /source/inc/css_button.inc.php</strong>, some can be found directly in the output files.<br><br>
		For performance reasons, the icon font and CSS files are limited to the used icons.<br>
		If additional icons are wanted, instructions (only german) can be found in the template directory /css/icons/.<br><br>',

	// Default Bootstrap 5 font-family
	'BS5_DEFAULT_FONT_FAMILY' => '$font-family-sans-serif: "%s", sans-serif !default;',

	// Meldungen
	'BS5_TPL_MANAGER_THEME_ERROR' => 'The Bootstrap 5 template manager can not be used as desired!<br>
		This error has occurred: ',
	'BOOTSTRAP_CSS_COMPILED' => 'CSS file created - preview updated',
	'BS5_TPL_MANAGER_THEME_TPL_PATH_NOT_EXISTS' => 'The path to the template is incorrect!',
	'BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_EXISTS' => 'The CSS file <strong>%s</strong> does not exist!',
	'BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_RENAMED' => 'The CSS file <strong>%s</strong> was renamed to <strong>%s</strong>!',
	'BS5_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_RENAMED' => 'The CSS file <strong>%s</strong> could not be renamed!',
	'BS5_TPL_MANAGER_THEME_TPL_FILE_COPIED' => 'The file <strong>%s</strong> was copied to <strong>%s</strong>!',
	'BS5_TPL_MANAGER_THEME_TPL_FILE_NOT_COPIED' => 'The file <strong>%s</strong> could not be copied to the template!<br>
		The CSS file <strong>%s</strong> was renamed to <strong>%s</strong> again!',
	'BS5_TPL_MANAGER_THEME_TPL_FONT_FILE_NOT_COPIED' => 'The file <strong>%s</strong> could not be copied to the template!<br>
		The file must be loaded into the folder %s with an FTP program!',
	'BS5_TPL_MANAGER_THEME_COPY_COMPLIED' => '<h3>The theme should now be available in the shop!</h3>',

);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}

?>