<?php

// Inserer html5shiv
function html5_insert_head_css($flux) {
	$flux .= '<!--[if lt IE 9]>\n'
		. '<script src="'.find_in_path('js/html5shiv.js').'"></script>\n'
		. '<![endif]-->\n';
	return $flux;
}

?>