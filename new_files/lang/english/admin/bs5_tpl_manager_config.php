<?php
/* ------------------------------------------------------------
  Module "Bootstrap 5 Template-Manager" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

$lang_array = array(
  'TEXT_BS5_TPL_MANAGER_CONFIG_UPDATE_SYSTEMMODULE_WARNING' => 'New settings have been added - an update of the system module must be made.<br>
    The link takes you to the system module &nbsp;&nbsp;&nbsp;',
  'TEXT_BS5_TPL_MANAGER_CONFIG_HEADING_TITLE' => 'Bootstrap 5 template configuration',
  'TEXT_BS5_TPL_MANAGER_CONFIG_INFO' => 'Settings made here have a direct effect on the shop!',

  'TEXT_BS5_TPL_MANAGER_CONFIG_COLOR_MODE' => '<h3>Color mode</h3>
    Bootstrap 5 now supports color modes - starting with <u>dark mode</u>!<br><br>
    To activate the dark color mode in the shop template, code must be modified in the file <strong>"includes/header.php"</strong>.<br><br>
    Search for:<br><br>
    <strong>&lt;html</strong><br><br>
    and at the end of the line, before the final closing ">", add the following:<br><br>
    <strong>&nbsp;data-bs-theme="dark"</strong><br><br>
    Attention: Do not forget the space before data-bs-theme="dark"!<br>You can find out more about this at "Docs->Customize->Color Modes" at the side "https://getbootstrap.com".<br>',
  'TEXT_BS5_TPL_MANAGER_CONFIG_COMPRESS_OPTIONS' => '<h3>Recommendation "Compression"</h3>
    Recommendation for the settings in <em>Adv. Configuration -> Compression</em><br>
    After countless tests with the Chrome extension “Lighthouse”, the following settings are recommended:<br><br>
    <strong><u>HTML Compression</u>&nbsp;&nbsp;<span style="color:green">"Yes"</span></strong><br>
    <strong><u>CSS Compression</u>&nbsp;&nbsp;<span style="color:red">"No"</span></strong><br>
    <strong><u>JavaScript Compression</u>&nbsp;&nbsp;<span style="color:red">"No"</span></strong><br><br>
    Note: <u>Enable GZip Compression</u> - Please test it yourself, it does not necessarily lead to an improvement.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_IMAGE_OPTIONS' => '<h3>Recommendation "Image Options"</h3>
    Recommendation for the settings in <em>Configuration -> Image Options</em> (settings in pixel: width x height)<br>
    All imgaes are from <a href="https://unsplash.com" target=”_blank”>https://unsplash.com</a>!<br><br>
    <strong><u>Product Images</u></strong><br>
    <strong>Product Mini Images: </strong>100 x 100<br><strong>Product Midi Images: </strong>200 x 200<br><strong>Product Thumbnails: </strong>280 x 280<br><strong>Product Info Images: </strong>600 x 600<br><strong>Popup Images: </strong>1000 x 1000<br><strong>Note: </strong>Original images should be 1000 x 1000 and in a 1:1 ratio.<br><br>
    <strong><u>Category Images - Category description below the picture</u></strong> - applies if the value "Width of the images category" is greater than 900.<br>
    <strong>Category Images: </strong>1000 x  300 (Width: 1360px - if in the "Boxes" tab, the "Box menu subcategories" setting should be set to "No".)<br><strong>Category Images Mobile: </strong>550 x  250<br><strong>Category Images Listing: </strong>200 x 200<br><strong>Note: </strong>Generated images should have the correct width. Listing images should be in a 1:1 ratio.<br><br>
    <strong><u>Category Images - Category description to the right of the image</u></strong> - applies if the value "Width of the images category" is lower than 900.<br>
    <strong>Category Images: </strong>250 x  200<br><strong>Category Images Mobile: </strong>550 x  250<br><strong>Category Images Listing: </strong>200 x 200<br><strong>Note: </strong>Generated images should have the correct width. Listing images should be in a 1:1 ratio.<br><br>
    <strong><u>Manufacturer Images</u></strong><br>
    <strong>Manufacturer Images: </strong>200 x 200<br><strong>Note: </strong>Original images should be 200 x 200.<br><br>
    <strong><u>Banner Images - "content width"</u></strong><br>
    <strong>Banner Images: </strong>1360 x 500<br><strong>Banner Images Mobile: </strong>530 x 320<br><strong>Note: </strong>Generated images should have the correct width.<br><br>',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_CLASSES' => 'BS5 Themes / Color classes',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_THEME' => 'BS5 Themes:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_THEME_INFO' => 'Here you can set one of the ready-made themes!<br>
    <strong>Note:</strong><br>
    Custom themes created in the “BS5 Theme Manager” are only loaded with the “Bootstrap (bootstrap.min.css)” setting.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CLASSES' => 'CSS-Classes (Settings only have an effect on the “Bootstrap” and “BS5 default” themes)',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_BG' => 'TOP1 background:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_BG_INFO' => 'Background class of the top navbar!<br>
    You will find more information under "Docs->Utilitis->Background" on the page "https://getbootstrap.com"<br>
    Default: bg-body-tertiary',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_TEXT' => 'TOP1 font color:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_TEXT_INFO' => 'Font color class of the top navbar!<br>
    Default: text-body-secondary',
  'TEXT_BS5_TPL_MANAGER_CONFIG_LOGOBAR_TEXT' => 'Logobar font color:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_LOGOBAR_TEXT_INFO' => 'Font color class of the navigation to the right of the logo!<br>
    Default: text-secondary-emphasis',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_NAVBAR' => 'Main Navbar:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_NAVBAR_INFO' => 'Class of the main navbar / the superfish menu!<br>
    Default: none',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_BG' => 'Main background:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_BG_INFO' => 'Background class of the main navbar / the superfish menu!<br>
    Default: bg-body-tertiary',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_NAVBAR' => 'Footer Navbar:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_NAVBAR_INFO' => 'Class of the footer navigation!<br>
    Default: none',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_BG' => 'Footer background:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FOOTER_BG_INFO' => 'Background class of the footer navigation!<br>
    Default: bg-body-tertiary',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_HEADER' => 'Header',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1' => 'Top1:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP1_INFO' => 'Should Topbar with Top1 be displayed?<br><br>
    <strong>Notice:</strong><br>Four column entries can be displayed in the top bar.<br>
    So that these columns can also be used in multiple languages, the texts are stored in a language file.<br>
    The texts can be changed in the file "templates/bootstrap5/lang/lang_english.custom".<br>
    Language variable "BS5_top1".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2' => 'Top2:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP2_INFO' => 'Should Top2 be displayed?<br><br>
    Language variable "BS5_top2".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP3' => 'Top3:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP3_INFO' => 'Should Top3 be displayed?<br><br>
    Language variable "BS5_top3".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP4' => 'Top4:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TOP4_INFO' => 'Should Top4 be displayed?<br><br>
    Language variable "BS5_top4".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_JS_DISABLED' => 'JavaScript-Note:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_JS_DISABLED_INFO' => 'Should the JavaScript-Note be displayed?<br><br>
    <strong>Note:</strong><br>
    The text is only visible if the customer has deactivated JavaScript in the browser.<br><br>
    Language variable "BS5_noscript".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_LOGO' => 'Logopath:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_LOGO_INFO' => 'Relative path to the shop logo.<br><br>
    <strong>Note:</strong><br>
    Logo path relative to the folder "shoproot/templates/bootstrap5/" - e.g. shoproot/templates/bootstrap5/img/logo_head.png -> "img/logo_head.png"',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_ICON_WITH_NAMES' => 'Icon bar:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BS5_SHOW_ICON_WITH_NAMES_INFO' => 'Should the name of the icon be displayed on wide screens?',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_SUPERFISH' => 'Menus',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISHMENU' => 'Superfish-Menu',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MENUCASE' => 'Menu variant:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MENUCASE_INFO' => 'Which menu variant should be displayed?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_ALL' => 'all levels displayed',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_1' => 'only level 1 is displayed',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_2' => 'up to level 2 displayed',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_3' => 'up to level 3 displayed',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_4' => 'up to level 4 displayed',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_5' => 'up to level 5 displayed',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_6' => 'up to level 6 displayed',
  'TEXT_BS5_TPL_MANAGER_CONFIG_HOMEBUTTON' => 'Home icon :',
  'TEXT_BS5_TPL_MANAGER_CONFIG_HOMEBUTTON_INFO' => 'Should the home icon be displayed?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ADD_LINK' => 'Additional links:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ADD_LINK_INFO' => '<strong>This option also applies to the "bootstrap5a" template!</strong><br><br>Additional links for the menu can be entered!<br><br>
    <strong>Syntax:</strong><br>
    Link target1|link name1,link target2|link name2,link target3|link na...<br><br>
    <strong>Example:</strong><br>
    The input "https://www.mein_shop.com/shop_content.php?coID=3|Service,https://www.modified-shop.org|Modified" generated two links,<br>
    Link 1 with the name "Service" and the target "https://www.mein_shop.com/shop_content.php?coID=3"<br>
    Link 2 with the name "Modified" and the target "https://www.modified-shop.org"<br><br>
    For multilanguage sites use e.g. "https://www.example.com|BS5_Linktext" - important is the "BS5_" at the beginning!<br>
    In addition, a language variable must be created in the file "templates/bootstrap5/lang/lang_english.custom" - "BS5_Linktext = \'My link\'"',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MEGAS' => 'Mega menu:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MEGAS_INFO' => 'Here the mega menu can be configured individually.<br><br>
    <strong>The mega menu is displayed in 3 columns!<br>
    If you do not want to change anything, you should leave this field blank!</strong><br><br>
    <strong>Example:</strong><br>
    All categories should be displayed as a mega-menu with 4 columns.<br>
    Input: "main-4" (without quote marks)<br>
    The ID of the Navbar "main" is entered, followed by the number of columns.<br><br>
    All categories should be displayed as a mega-menu with 3 columns, after the 5th link of the lowest category level a link "show more ..." should be added.<br>
    Input: "main-3-5"<br>
    The ID of the Navbar "main" is entered, followed by the number of columns and the location (5) where the link should be inserted.<br><br>
    The categories with the ID 5 (3-columns) and ID 22 (4-columns) should be displayed as a mega-menu.<br>
    Input: "li5-3,li22-4"<br>
    The ID \'s of the category links "li5" and "li22" are entered - the spelling is important here - behind the number of columns.<br><br>
        The categories with the ID 5 (3-columns) and ID 22 (4-columns) should be displayed as a mega-menu, from the 4th respectively 5th link of the lowest category level a link "show more ..." should be inserted.
    Input: "li5-3-4,li22-4-5"<br>
    The ID \'s of the category links "li5" and "li22" are entered - the spelling is important here - behind the number of columns and the location (4, 5) where the link should be inserted.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL' => 'Display up to level:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_MAXLEVEL_INFO' => 'To what level should the Standard menu be displayed?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_NONE' => 'none',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ALL_MENUS' => 'Applies to all menus',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MANUFACTURERS_LINK' => 'Link Manufacturer:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MANUFACTURERS_LINK_INFO' => 'Should the link "Manufacturer" be displayed in the menu?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SPECIALS' => 'Link Special offers:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SPECIALS_INFO' => 'Should the link "Special offers" be displayed in the menu?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW' => 'Link New products:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_INFO' => 'Should the link "New products" be displayed in the menu?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE' => 'Capitalization:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_WHATSNEW_SPECIALS_UPPERCASE_INFO' => 'Should the links "Special offers" und "New products" be capitalized?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES' => 'Hide empty categories:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_HIDE_EMPTY_CATEGORIES_INFO' => 'Do you want to hide empty categories?<br><br>
    <strong>Note:</strong><br>
    If "Yes", the page build time will slow down, because with every shop call it is checked how many products are in the individual categories and their subcategories.<br><br>
    The categories are hidden if there is no active article in the category or one of its subcategories.<br>
    For this reason, in the admin area Configuration -> Stock Options -> Completion of order - disable Sold out should be set to "Yes".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL' => 'Scroll at subcategory-click:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CATEGORIESMENU_AJAX_SCROLL_INFO' => 'Do you want to scroll up the clicked category after clicking on the subcategory button?',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_SLIDER' => 'Slider/Banner',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW' => 'Imageslider:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_INFO' => 'Where and how wide should the slider be displayed?<br><br>
    <strong>Note:</strong><br>
    This slider displays images asigned with the banner group "SLIDER" in the "Banner Manager"!<br>
    Note, for "entire screen width" and "content width" the values in "Configuration -> Image Options" must be adjusted, or change the image via FTP in the folder "images/banner/", after saving in the Banner Manager.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_NONE' => 'hide',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SCREEN' => 'entire screen width',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SHOP' => 'content width',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_FADE' => 'Imageslider:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_FADE_INFO' => 'Which effect should be used?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TITLE' => 'Imageslider:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TITLE_INFO' => 'Should the "Banner Title" or "Image Title" be displayed at the bottom left?<br>Note: The "Image Title" is displayed preferentially!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TOP' => 'TOP-Articles:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_TOP_INFO' => 'Should the top products be displayed in a slider?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BANNER_TITLE' => 'Banner:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BANNER_TITLE_INFO' => 'Should the "Banner Title" or "Image Title" be displayed at the bottom left?<br>Note: The "Image Title" is displayed preferentially!',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_BOXES' => 'Boxes',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOXES' => 'Boxes on the start page',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_GREETING' => 'Box greeting:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_GREETING_INFO' => 'Should the box greeting (Content Manager - entry Index) be displayed on the start page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST' => 'Box categories list:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_SHOW_CATEGORYLIST_INFO' => 'Should a category list (only main categories) be displayed on the start page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW' => 'Box New Products:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_WHATSNEW_INFO' => 'Should the box New Products be displayed on the start page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS' => 'Box Special offers:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_SPECIALS_INFO' => 'Should the box Special offers be displayed on the start page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_UPCOME_PRODS' => 'Upcoming Products:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_UPCOME_PRODS_INFO' => 'Should the upcoming products be displayed on the start page?<br>
    <strong>Note:</strong><br>
    If "No", the number "0" should be entered in Configuration -> Maximum Values under "Upcoming Products" for performance reasons!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_NEW_PRODS' => 'TOP-Articles:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_NEW_PRODS_INFO' => 'Should the TOP-Articles be displayed on the start page?<br>
    <strong>Note:</strong><br>
    If "No", the number "0" should be entered in Configuration -> Maximum Values under "New Products Module" for performance reasons!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS' => 'Box Reviews:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_REVIEWS_INFO' => 'Should the box Reviews be displayed on the start page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_BESTSELLER' => 'Box bestseller:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_STARTPAGE_BOX_BESTSELLER_INFO' => 'Should the box bestseller be displayed on the start page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN' => 'Manufacturers:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_INFO' => 'Should the manufacturers be displayed in a slider?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_NAME_LINES' => 'Manufacturers:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CAROUSEL_MAN_NAME_LINES_INFO' => 'Number of lines that the manufacturers name should occupy (0 = auto).',
  'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOXES' => 'Boxes not on the start page<br><span style="font-size:10px">Note: Please set fullcontent in the "Views" tab!</span>',
  'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED' => 'Box Last viewed:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_LAST_VIEWED_INFO' => '<strong>Productinfo page</strong><br>Should the box Last viewed be displayed on productinfo page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SUBCATEGORIES' => 'Box menu subcategories:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_NOT_STARTPAGE_BOX_SUBCATEGORIES_INFO' => '<strong>Categorylisting page</strong><br>Should the box subcategory menu be displayed on listing page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_BOXES' => 'Boxes general',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MAX_PRODUCTS_BOX' => 'Max. products:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MAX_PRODUCTS_BOX_INFO' => '<strong>Boxes "New products", "Special offers" and "Reviews"</strong><br>What is the maximum number of products that should be displayed in the "New products", "Special offers" and "Reviews" boxes?<br>
    Standard: 10',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_ADD_QUICKIE' => 'Box quick purchase:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_ADD_QUICKIE_INFO' => '<strong>Box quick purchase inside box shopping cart</strong><br>Should the box quick purchase be displayed inside box shopping cart?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_PAYPAL_IN_BOX_CART' => 'Box CArt / Warenkorb:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_PAYPAL_IN_BOX_CART_INFO' => '<strong>PayPal Button</strong><br>Should PayPal be displayed inside box shopping cart?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_INFO' => 'Box customer group:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_BOX_INFO_INFO' => '<strong>Box customer group inside box "Your account"</strong><br>Should the box customer group be displayed inside box "Your account"?',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_VIEWS' => 'Views',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_MOREIMAGES_AS_SLIDER' => 'Product info page:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_MOREIMAGES_AS_SLIDER_INFO' => 'Should the small product images be displayed as slider on the product detail page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT' => 'Product info page:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PROD_DETAIL_FULLCONTENT_INFO' => 'Should the categories menu be displayed in the left column at product info pages? Only for template "Bootstrap5a"!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE' => 'Product info page:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SHOW_MANUIMAGE_INFO' => 'Should the manufacturer\'s image be displayed on the product info page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX' => 'Products view:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_LIST_BOX_INFO' => 'Should the products be displayed as "box" on category view (product listing)?<br><br>
    <strong>Note:</strong><br>
     If you select "No", the products will be displayed in list form!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX' => 'Products view:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INFO_BOX_INFO' => 'Should cross-selling-, reverse-cross-selling- and also-purchased-products be displayed as "box"?<br><br>
    <strong>Note:</strong><br>
     If you select "No", the products will be displayed in list form!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_LINES' => 'Products view - boxes',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_NAME_LINES' => 'Product boxes:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODBOXES_NAME_LINES_INFO' => '<strong>Setting applies to all product boxes.</strong><br>Number of lines that the article name should max occupy (0 = auto).',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_MODULES' => 'Modules',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND' => 'Customer remind:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_INFO' => 'Activate Customers Remind!<br>
    <strong>Hinweis:</strong><br>
     This module offers your logged customers the possibility to have a reminder e-mail sent as soon as an article (in sufficient number) is back in stock.<br><br>
     As soon as an article is no longer in stock, a button appears on the product detail page, with which the customer can register in the reminder list.
     <strong>The reminder list can be found in the admin area under "Customers -> Customers Remind".</strong><br><br>
     If an article (in sufficient number) is in stock again, the customer automatically receives a reminder email with a link that leads directly to the product in the shop.<br>
     Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=12813.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=12813.0</a>',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_DOUBLE_OPT_IN' => 'Customer remind:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_DOUBLE_OPT_IN_INFO' => '<strong>Double-Opt-In for Customers Remind registration?</strong><br>If "Yes" an eMail will be send where the Registration have to be confirmed. This only works if send eMails is activated.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_ONLY_REGISTERED' => 'Customer remind:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_ONLY_REGISTERED_INFO' => '<strong>Reminder only for registered customers?</strong><br>If you only allow this service for registered customers, then set this switch to "Yes".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_PRIVACY_CHECK_REGISTERED' => 'Customer remind:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_PRIVACY_CHECK_REGISTERED_INFO' => '<strong>Signing privacy notice also for registered customers?</strong><br>Should the privacy notice checkbox also be required for registered customers, set this switch to "Yes".<br>(Only applies if Adv. Configuration -> Additional Modules - Sign privacy notice = "Yes"!)',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_ASAP' => 'Customer remind:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_ASAP_INFO' => '<strong>Send email immediately?</strong><br>Compare the "Customer Reminder" table with the "Stock" and then <strong>send the email only once a day</strong>, then switch to "No" (recommended setting).<br>If you want to compare the "Customer Reminder" table with the "Stock" at every page load, set this switch to "Yes".',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL' => 'Customer remind:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CUSTOMERS_REMIND_SENDMAIL_INFO' => 'Send an e-mail to the shop owner (contact - e-mail address) when a customer enters the reminder list?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CHEAPLY_SEE' => 'Cheaply see:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_CHEAPLY_SEE_INFO' => 'Activate Module "Cheaply see" and show the link in the product detail view!!<br>
    <strong>Note:</strong><br>
     The text displayed in the upper area can be changed in the Content Manager!<br>
     Link to the original module: Website "xtc-load.de" is not longer available',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY' => 'Question to article:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PRODUCT_INQUIRY_INFO' => 'Activate Module "Question to article" and show the link in the product detail view!!<br>
    <strong>Note:</strong><br>
     The text displayed in the upper area can be changed in the Content Manager!<br>
     Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=2153.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=2153.0</a>',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT' => 'Default attribute selection "Please select":',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_TEXT' => '"Please select":',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_INFO' => 'Activate Module "Default attribute selection (Please select)"!<br>
    <strong>Note:</strong><br>
     This is the Module MODULE_MODULFUX_ATTRIBUTES_DEFAULT.<br>
     Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=38117.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=38117.0</a><br>
     "Please select" is always added as the first option to the template <strong><i>product_options_v1_select.html</i></strong>!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_TABLE_TEXT' => '"Please select"<br>option template <i>table</i>:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_TABLE_INFO' => 'Should "Please select" be added as the first option in the template <strong><i>product_options_v2_table.html</i></strong>?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_TABLE_CHECKED_TEXT' => 'Preselection first option<br>option template <i>table</i>:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_TABLE_CHECKED_INFO' => 'Should the first option be preselected in the template <strong><i>product_options_v2_table.html</i></strong> if "Please select" is set to "No"?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_RADIO_TEXT' => '"Please select"<br>option template <i>button</i>:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_RADIO_INFO' => 'Should "Please select" be added as the first option in the template <strong><i>product_options_v3_button.html</i></strong>?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_RADIO_CHECKED_TEXT' => 'Preselection first option<br>option template <i>button</i>:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_MODULFUX_ATTRIBUTES_DEFAULT_RADIO_CHECKED_INFO' => 'Should the first option be preselected in the template <strong><i>product_options_v3_button.html</i></strong> if "Please select" is set to "No"?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER' => 'Attribute price updater:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_INFO' => 'Activate Module "Attribute price updater"!<br>
    <strong>Hinweis:</strong><br>
     Surcharge options/attributes are automatically added to the item price.<br>
     Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=20125.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=20125.0</a>',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ATTR_PRICE_UPDATER_UPDATE_PRICE_INFO' => 'Do you want to update the shown price?<br>
     If "Yes" not only a note is displayed, the products price is also replaced by Javascript.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART' => 'AGI: reduce amount in basket:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_INFO' => 'Activate Module "AGI: reduce amount in basket"!<br>
    <strong>Note:</strong><br>
     The module reduces the number of items in the cart to the maximum available quantity, should a larger number be ordered. The customer is informed directly about the adjustment and does not have to find the right number by trying.<br>&copy; andreas-guder.de.<br>
     Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=40416.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40416.0</a>',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_ACTIVATE' => 'Please activate: ',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_DEACTIVATE' => 'Please deactivate: ',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_ALLOW_CHECKOUT' => 'Allow Checkout',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AGI_REDUCE_CART_STOCK_CHECK' => 'Check Stock Level',
  'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA' => 'AGI: reduce amount in basket:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_REDUCE_CART_SHOW_AVAILABLE_DATA_INFO' => 'Show amount in cart?<br>
     Show the customer what number he originally wanted and how many were reduced.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_1' => 'Awids Rating Breakdown',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_2' => ' - Review breakdown by star rating',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_INFO' => 'Activate the "Breakdown of reviews by stars" module!<br>
    <strong>Note:</strong><br>
         This module breaks down the ratings awarded per number of stars into individual progress bars, so the customer can see which ratings have been given most frequently.<br>
     Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=40793.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=40793.0</a>',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_PRODLIST_INFO' => 'Show module in product lists?<br>
     The extended rating can also be displayed in product lists.<br>
     On bestsellers, new articles and top articles, sometimes only a simple representation is possible.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_SHOW_NULL_REVIEWS_INFO' => 'Show stars <u>without</u> saved rating?<br>
     This makes it possible for boxes in product lists to have equal heights.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_AWIDSRATINGBREAKDOWN_URL_INFO' => 'Activate filter popup?<br>
     This setting make it possible to display the ratings in a popup, and filter them by the number of stars.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS' => 'CSS product & attribute stock traffic light',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_INFO' => 'Activate the "CSS product & attribute stock traffic light" module!<br>
    <strong>Note:</strong><br>
     This module shows a product and attribute stock traffic light, which either displays a graphic stock traffic light or the stock as text.<br>
     Link to the original module: <a href="https://www.modified-shop.org/forum/index.php?topic=37371.0" target=”_blank”>https://www.modified-shop.org/forum/index.php?topic=37371.0</a><br>
     Texts can be changed in the file "lang/english/extra/bs5_additional_modules.php" (German -> "lang/german/extra/bs5_additional_modules.php").',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_NONE' => 'do not show',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_L' => 'only traffic light',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LS' => 'traffic light and stock',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LT' => 'traffic light and text, no stock',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_LTS' => 'traffic light, text and stock',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_T' => 'only text',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_SHOW_TS' => 'text and stock',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODLIST_INFO' => '<strong>Traffic light in product lists:</strong><br>
     How should the traffic light be displayed in the product listing?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODINFO_INFO' => '<strong>Traffic light on the product detail page:</strong><br>
     How should the traffic light be displayed on the product detail page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_PRODATTR_INFO' => '<strong>Traffic light for attributes on the product detail page:</strong><br>
     How should the traffic light be displayed for attributes on the product detail page?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_RED_YELL_INFO' => 'Enter the minimum value for the yellow traffic light here. This value and all values below are provided with a red traffic light. Standard: 0',
  'TEXT_BS5_TPL_MANAGER_CONFIG_TRAFFIC_LIGHTS_STOCK_GREEN_INFO' => 'Enter the value from which a green traffic light should be displayed. All values below this up to the minimum value are provided with a yellow traffic light.',

  'TEXT_BS5_TPL_MANAGER_CONFIG_TAB_MIXED' => 'Miscellaneous',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE' => 'Product Thumbnails:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_PICTURESET_ACTIVE_INFO' => 'Should product thumbnails be replaced with mini or midi images?<br><br>
    <strong>Note:</strong><br>
     If you set this option to "Yes", product thumbnails will be replaced by mini or midi images.<br><br>
     Since shop version 2.0.6.0 it is possible to save product images in additional sizes (mini, midi).<br>
     The dimensions must be set in Configuration -> Image Options - maybe the system module "Imageprocessing - product images" have to be run.',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_NEW' => 'Ribbons:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_NEW_INFO' => 'Should the ribbon "New" be displayed?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_TOP' => 'Ribbons:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_TOP_INFO' => 'Should the ribbon "Top" be displayed?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_SPECIAL' => 'Ribbons:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_SPECIAL_INFO' => 'Should the ribbon "Sale" be displayed?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_PERCENT' => 'Percentage button:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FLAG_PERCENT_INFO' => 'Should the percentage button (for example, "25%") be displayed?',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ADVANCED_VALIDATION' => 'Validation:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_ADVANCED_VALIDATION_INFO' => 'Do you want to use advanced validation?<br><br>
    <strong>Note:</strong><br>
     Input error messages are displayed directly under the corresponding input field in the registration form.!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_USE_VIEWERJS' => 'JavaScript image viewer:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_USE_VIEWERJS_INFO' => 'Should image viewer be used in the product info view??<br><br>
    <strong>Note:</strong><br>
     If you click on a product image, the image viewer opens and the image can be zoomed (smartphone-compatible)!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV' => 'Filter color:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERCOLOR_AKTIV_INFO' => 'Which background color class should an active filter have?<br>Default: none<br><br>
    <strong>Note:</strong><br>
     In the Bootstrap 5 Documentation ("https://getbootstrap.com" Docs->Utilitis->Background) the color classes can be viewed!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERBORDERCOLOR_AKTIV' => 'Filter color:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_FILTERBORDERCOLOR_AKTIV_INFO' => 'Which border color class should an active filter have?<br>Default: border-primary<br><br>
    <strong>Note:</strong><br>
     In the Bootstrap 5 Documentation ("https://getbootstrap.com" Docs->Utilitis->Border) the color classes can be viewed!',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW' => 'Search field:',
  'TEXT_BS5_TPL_MANAGER_CONFIG_SEARCHFIELD_ONE_ROW_INFO' => 'Should the search field be displayed in one row?<br><br>
    <strong>Note:</strong><br>
     The additional selection field for the category to be searched for can be displayed in one or two rows, so the category names are not cut off!',
);


foreach ($lang_array as $key => $val) {
  defined($key) or define($key, $val);
}

?>