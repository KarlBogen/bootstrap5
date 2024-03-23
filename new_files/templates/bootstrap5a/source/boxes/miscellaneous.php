<?php
/* -----------------------------------------------------------------------------------------
   $Id: miscellaneous.php 15291 2023-07-06 11:46:25Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  // include smarty
  include(DIR_FS_BOXES_INC . 'smarty_default.php');

  // set cache id
  $cache_id = md5('lID:'.$_SESSION['language'].'|csID:'.$_SESSION['customers_status']['customers_status_id'].'coP:'.$coPath);

  $box_miscellaneous = $box_smarty->fetch(CURRENT_TEMPLATE.'/boxes/box_miscellaneous.html', $cache_id);

  $smarty->assign('box_MISCELLANEOUS', $box_miscellaneous);
