<?php

/**
 * HTML5 cleaner for SPIP
 * (c) 2016 WTFPL License
 *
 */

$GLOBALS['spip_pipeline']['affichage_final'] .= '|html5cleaner';

// Nettoyer le vieux code de SPIP :
function html5cleaner($texte) {

	// head
//  $texte = str_replace('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />', '<meta charset="utf-8">', $texte);
	$texte = str_replace(' xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr"', '', $texte);
	$texte = str_replace(' xmlns="http://www.w3.org/1999/xhtml"', '', $texte);
	$texte = str_replace('<link rel="stylesheet" type="text/css"', '<link rel="stylesheet"', $texte);
	$texte = str_replace('media="all" />', 'media="all">', $texte);
	$texte = str_replace('type="text/css" media="all">', 'media="all">', $texte);
	$texte = str_replace('.css" type="text/css"', '.css"', $texte);
	$texte = str_replace('<style type="text/css"', '<style', $texte);
//  $texte = str_replace('<script type="text/javascript"', '<script', $texte); // The type attribute is unnecessary for JavaScript resources.
//  $texte = str_replace('<script type=\'text/javascript\'', '<script', $texte);

	// body tags
	$texte = str_replace(' summary="summary"', '', $texte); // The summary attribute on the table element is obsolete.
	$texte = str_replace('<acronym', '<abbr', $texte); // The acronym element is obsolete. Use the abbr element instead.
	$texte = str_replace('acronym>', 'abbr>', $texte);

	// figure
	$texte = str_replace('<p><figure', '<figure', $texte);
	$texte = str_replace('<p></figure></p>', '</figure>', $texte);

	// br
	$texte = str_replace('<br class=\'autobr\' />', '<br class=\'autobr\'>', $texte);
	$texte = str_replace('<br class=\'manualbr\' />', '<br class=\'manualbr\'>', $texte);
	$texte = str_replace('<br />', '<br>', $texte);

	// hr
	$texte = str_replace('hr class="spip" />', 'hr class="spip">', $texte);
	$texte = str_replace('<hr />', '<hr>', $texte);

	// end tag
	$texte = str_replace('type="hidden" />', 'type="hidden">', $texte);
	$texte = str_replace(' />', '>', $texte);

	// name attribut
	$texte = str_replace(' name="forum"', '', $texte); // The name attribute is obsolete. Consider putting an id attribute on the nearest container instead.
	$texte = str_replace(' name="comments"', '', $texte);
	$texte = str_replace(' name="recherche_signatures"', '', $texte);

	// rel attribut
	$texte = str_replace(' rel=\'footnote\'', '', $texte); // Bad value footnote for attribute rel on element a: The string footnote is not a registered keyword.
	$texte = str_replace(' rel="self bookmark"', ' rel="bookmark"', $texte);  // Bad value self bookmark for attribute rel on element a : Keyword self is not registered.
	$texte = str_replace(' rel="noindex nofollow"', ' rel="nofollow"', $texte);
	$texte = str_replace(' rel=\'nofollow external\'', ' rel="nofollow"', $texte);
	$texte = str_replace(' rel=\'external\'', '', $texte);
	$texte = str_replace(' rel="generator"', '', $texte);

	// search form
	$texte = str_replace(' autocapitalize="off"', '', $texte); // Attribute autocapitalize not allowed on element input at this point.
	$texte = str_replace(' autocorrect="off"', '', $texte); // Attribute autocorrect not allowed on element input at this point.
	$texte = str_replace(' accesskey="4"', '', $texte);
	

	return $texte;
}

?>