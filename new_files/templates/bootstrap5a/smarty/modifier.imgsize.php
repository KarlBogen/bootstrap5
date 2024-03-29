<?php

/*
Bildgröße für Ausgabe holen zur Verbesserung von CLS (cumulative layout shift)

Karl 08.08.2023
*/

function smarty_modifier_imgsize($img, $strstr = 'image') {

	$size = getimagesize(strstr($img, $strstr));
	return $imgsize = isset($size[3]) ? $size[3] : '';

}