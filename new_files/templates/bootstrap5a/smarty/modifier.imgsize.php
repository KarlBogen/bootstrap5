<?php

/*
Bildgröße für Ausgabe holen zur Verbesserung von CLS (cumulative layout shift)
Karl 08.08.2023

$url_minusget = strtok($rel_url, '?');
eingefügt, falls Klassenerweiterungsmodul Timestamp für Artikelbilder installiert ist
*/

function smarty_modifier_imgsize($img, $strstr = 'images')
{
  $rel_url = strstr($img, $strstr);
  $url_minusget = strtok($rel_url, '?');

  $size = getimagesize($url_minusget);
  return $imgsize = isset($size[3]) ? $size[3] : '';
}
