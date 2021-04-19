<?php
function convertFloatStringToFloatNumber($val){
	$val = str_replace(",",".", $val);
	return $val;
}
?>
