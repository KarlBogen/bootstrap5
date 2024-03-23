<?php

// zusätzliche Links der Konstante
// BS5_ADD_LINK_IN_TOPCATMENU_LAST

function smarty_modifier_addedLinks($string) {

      $link_content = array();
      $add_links = array();
			$add_links = explode(',', $string);
			foreach ($add_links as $add_link) {
				$links = explode('|', trim($add_link));
				$link_content[] = array (
					'HREF' => $links[0],
					'NAME' => $links[1]
				);
			}
			return $link_content;

}