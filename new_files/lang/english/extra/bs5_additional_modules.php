<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

define('BS5_CUSTOMERS_REMIND_TITLE' , 'Customer Remind');
define('BS5_NAVBAR_TITLE_CUSTOMERS_REMIND' , 'Customer Remind');
define('BS5_CUSTOMERS_REMIND_NOTE' , 'Article currently not in stock!');
define('BS5_CUSTOMERS_REMIND_LINK_TEXT', 'Advice of availability');
define('BS5_CUSTOMERS_REMIND_EMAIL_HEADING', 'Customer remind when articles arrive again');
define('BS5_CUSTOMERS_REMIND_EMAIL_1', 'has registered for this article:');

define('BS5_TEXT_EMAIL_SUBJECT_REMINDER','Your customers remind subscription');
define('BS5_TEXT_EMAIL_INPUT_REMINDER','<h1>Please note!</h1><p>Your e-mail address has been registered in our system.<br />An e-mail with a confirmation link has been sent out. Click the link to complete registration!</p>');
define('BS5_TEXT_EMAIL_DEL_REMINDER','Your e-mail address was deleted successfully from our database.');
define('BS5_TEXT_EMAIL_ACTIVE_REMINDER','Your e-mail address has successfully been registered for the remind mails!');
define('BS5_TEXT_EMAIL_EXIST_NO_REMINDER','<h1>Please note!</h1><p>This e-mail address is registered but not yet activated!<br />An e-mail with a confirmation link has been sent out. Click the link to complete registration!</p>');
define('BS5_TEXT_EMAIL_EXIST_REMINDER','This e-mail address is already registered for the remind mails!');

define('BS5_CONTACT_SUBJECT_0', '-- Please Select -- ');
define('BS5_CONTACT_SUBJECT_4', 'Price Inquiry');
define('BS5_TEXT_PRODUCTS_CHEAPLY', 'More cheaply seen?');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NAME', 'Products Name: ');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NUMBER', 'Model-No.: ');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NOTE', 'I am interested in the article: ');
define('BS5_TEXT_PRODUCTS_CHEAPLY_NOTE2', 'However I saw this article at a favourable price with one of your competitors. Please let me know if you can undercut the above mentioned article..');
define('BS5_ENTRY_COMPETITORURL_CHECK_ERROR','Register please those to competitor URL!');
define('BS5_ENTRY_COMPETITORURL_VALIDATION_ERROR', 'The competitor URL is no valide URL!');
define('BS5_ENTRY_COMPETITORPRICE_CHECK_ERROR','Please register the competitor price!');
define('BS5_NAVBAR_TITLE_CHEAPLY_SEE','Have You see this Product cheaply?');
define('BS5_CHEAPLY_SEE_HEADING_FORMULAR','Price inquiry form');
define('BS5_CHEAPLY_SEE_TO_PRODUCT', 'To the product');
define('BS5_ENTRY_VVCODE_CHECK_ERROR', 'Please enter the spam protection code!');
define('BS5_EMAIL', 'E-mail: ');
define('BS5_PHONE', 'Phone: ');
define('BS5_COMPETITORURL', 'Competitor URL: ');
define('BS5_COMPETITORPRICE', 'Competitor price: ');
define('BS5_SUBJECT', 'Subject: ');

define('BS5_TEXT_PRODUCT_INQUIRY', 'Question to article');
define('BS5_ENTRY_MESSAGE_BODY_ERROR', 'Please enter the message to us!');

define('BS5_TOGGLE_PWFIELD_SHOW', 'Show password');
define('BS5_TOGGLE_PWFIELD_HIDE', 'Hide password');

//BOF - modulfux_attributes_default
define('BS5_MODULFUX_PULL_DOWN_DEFAULT', 'Please select');
define('BS5_MODULFUX_ATTRIBUTES_ERROR', 'Select an option!');
//EOF - modulfux_attributes_default

/*
 * --------------------------------------------------------------------------
 * @file      web0null_attribute_price_updater.php
 * @date      18.10.17
 *
 *
 * LICENSE:   Released under the GNU General Public License
 * --------------------------------------------------------------------------
 */
//BOF - web0null_attribute_price_updater
define('BS5_TEXT_PRODUCTS_VPE', 'VPE');
define('BS5_TEXT_ATTRIBUTE_PRICE_UPDATER_A', 'In this Version:');
define('BS5_TEXT_ATTRIBUTE_PRICE_UPDATER_B', 'Price/Article');
define('BS5_TXT_ONLY', '<span class="small_price">Now only</span> ');
define('BS5_TXT_INSTEAD', '<span class="small_price">Our previous price</span> ');
define('BS5_TXT_CHOOSE_ATTR', 'all attributes have to be selected');
//EOF - web0null_attribute_price_updater

/* ----------------------------------------------------------------------------------------------------
   Module:    Rezensionsaufgliederung nach vergebenen Sternen (rev. awidsRatingBreakdown_v1.1_20200210)
   Date:      2020-02-10
   Author:    awids
   --------------------------------------------------------------------------------------------------*/

define('BS5_AWIDSRATINGBREAKDOWN_ARROW_TITLE', 'Rating breakdown');
define('BS5_AWIDSRATINGBREAKDOWN_DATE', '<strong>Date:</strong>');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE1', 'Reviews with 1 star');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE2', 'Reviews with %s stars');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE3', 'All %s reviews');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_ALL', 'All');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_1', '1 stars');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_2', '2 stars');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_3', '3 stars');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_4', '4 stars');
define('BS5_AWIDSRATINGBREAKDOWN_LINK_5', '5 stars');
define('BS5_AWIDSRATINGBREAKDOWN_HEADLINE', 'Rating: %s of 5 ');
define('BS5_AWIDSRATINGBREAKDOWN_MY_LANG', 'show only my language');
define('BS5_AWIDSRATINGBREAKDOWN_ALL_LANGS', 'show all languages');

/* ------------------------------------------------------------------------------------------------------------------
   CSS Produkt- & Attributlagerampel v1.0(2017-04-22)

   Authors:
   -------------------
     awids (www.awids.de)
     web28 (www.rpa-com.de)
     noRiddle (www.revilonetz.de)

   ----------------------------------------------------------------------------------------------------------------*/

define('BS5_MODULE_TRAFFIC_LIGHTS_STOCK','Stock');
define('BS5_MODULE_TRAFFIC_LIGHTS_QTY_RED','not on stock');
define('BS5_MODULE_TRAFFIC_LIGHTS_QTY_YELL','few on stock');
define('BS5_MODULE_TRAFFIC_LIGHTS_QTY_GREEN','on stock');

/* Metatags for specials and new products
	- are not provided by Modified but recognized by Lighthouse as an SEO deficiency
	enter keywords separated by commas
*/
define('BS5_METATAG_SPECIALS_DESC','Our top offers and all current promotions, bargains and other offers.');
define('BS5_METATAG_SPECIALS_KEYWORDS','Offers, promotions, bargains');
define('BS5_METATAG_NEWPRODS_DESC','New articles and products that have just arrived that might interest you.');
define('BS5_METATAG_NEWPRODS_KEYWORDS','New, latest, news');

define('BS5_PAGINATION_LABEL', 'Page navigation');
define('BS5_PAGINATION_SCROLLTOP', 'Scroll to first product');
define('BS5_PAGINATION_SCROLLBOTTOM', 'Scroll to last product');
define('BS5_SHOW_MORE_CATEGORIES', 'Show subcategories!');