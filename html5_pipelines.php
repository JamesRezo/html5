<?php

// Inserer html5shiv
function html5_insert_head($flux) {
	$javascript_ie = find_in_path('js/html5shiv.js');
	$flux .= html5_insert_head_css('')
		. "<!--[if lt IE 9]>\n"
		. "<script src='$javascript_ie'></script>\n"
		. "<![endif]-->\n";
	return $flux;
}