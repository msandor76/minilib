<?php
function slugify($text, $strict = false) {
	$cserelendo = array("é","É", "á","Á", "í","Í", "ü","Ü", "ű","Ű", "ú","Ú", "ó","Ó", "ö","Ö", "ő","Ő", "ä", " ", ",","(",")","'","' ");
    $mire =       array("e","e", "a","a", "i","i", "u","u", "u","u", "u","u", "o","o", "o","o", "o","o", "a", "-", "-","","","-","-" );
	//$seostr = mb_strtolower($str,'UTF-8');
    $text = str_replace($cserelendo, $mire, $text);
	
	$text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
	$text = str_replace(array("’", "'", '"'), "", $text);
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d.]+~u', '-', $text);

	// trim
	$text = trim($text, '-');
	setlocale(LC_CTYPE, 'en_GB.utf8');
	// transliterate
	if (function_exists('iconv')) {
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	}

	// lowercase
	$text = strtolower($text);
	// remove unwanted characters
	$text = preg_replace('~[^-\w.]+~', '', $text);
	if (empty($text)) {
		return 'empty_$';
	}
	if ($strict) {
		$text = str_replace(".", "_", $text);
	}
	return $text;
}
?>
