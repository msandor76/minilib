<?php

function strToSeo($str){
       $cserelendo = array("é","É", "á","Á", "í","Í", "ü","Ü", "ű","Ű", "ú","Ú", "ó","Ó", "ö","Ö", "ő","Ő", "ä", " ", ",","(",")","'","' ");
       $mire =       array("e","e", "a","a", "i","i", "u","u", "u","u", "u","u", "o","o", "o","o", "o","o", "a", "-", "-","","","-","-" );
	   //$seostr = mb_strtolower($str,'UTF-8');
	   $seostr = strtolower($str);
       $seostr = str_replace($cserelendo, $mire, $seostr);
	   return $seostr;
}


?>
