<?php
  /* -----------------------------------------------------------------------------------------
   $Id: xtc_show_content.inc.php 15291 2023-07-06 11:46:25Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(categories.php,v 1.23 2002/11/12); www.oscommerce.com
   (c) 2003   nextcommerce (xtc_show_category.inc.php,v 1.4 2003/08/13); www.nextcommerce.org 
   (c) 2010  web28 (xtc_show_category.inc.php, v 2.1 2010/11/12); www.rpa-com.de

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/   

  function xtc_show_content($counter, $oldlevel=1) {
    global $content_array, $content_string, $coid, $coPath;  

    $level = $content_array[$counter]['level']+1;

    $ul = $tab = '';  
    for ($i = 1; $i <= $level; $i++) {
      $tab .= "\t";
    }    
    
    if ($level > $oldlevel) {
      $ul = "\n" . $tab. '<ul class="navbar-nav ms-2">'. "\n";
      $content_string = rtrim($content_string, "\n");
      $content_string = substr($content_string, 0, -5);
    } elseif ($level < $oldlevel) {
      $ul = close_ul_tags($level,$oldlevel);      
    }

    $content_path = explode('_',$coPath); 

    $content_active_parent = '';
    $in_path = in_array($counter, $content_path); 
    if ($in_path) $content_active_parent = " activeparent"; 
    
    $content_active = '';
    $this_content = array_pop($content_path);
    if ($this_content == $counter) $content_active = ' active" aria-current="page';

    if (trim($content_string == '')) $content_string = "\n"; 
    $content_string .= $ul; 
    $content_string .= $tab; 
    $content_string .= '<li class="nav-item level'.$level.$content_active_parent.'">';
    $content_string .= '<a class="nav-link'.$content_active.'" href="'.xtc_href_link(FILENAME_CONTENT, xtc_content_link($content_array[$counter]['coID'], $content_array[$counter]['name'])).'" title="'. $content_array[$counter]['name'] . '">';
    $content_string .= '<span class="fa fa-chevron-right"></span>&nbsp;&nbsp;'.$content_array[$counter]['name'];
    $content_string .= '</a></li>';
    $content_string .= "\n";

    if ($content_array[$counter]['next_id']) {
      xtc_show_content($content_array[$counter]['next_id'], $level);
    } else {  
      if ($level > 1) $content_string .= close_ul_tags(1,$level);
      return;
    }
  }
