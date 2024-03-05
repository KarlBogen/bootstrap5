<?php

/*
Bildgröße für Ausgabe holen zur Verbesserung von CLS (cumulative layout shift)

Karl 08.08.2023
*/

function smarty_modifier_imgsize($img, $key = 3) {

	$size = getimagesize(strstr($img, 'image'));
	return $imgsize = isset($size[$key]) ? $size[$key] : '';

}