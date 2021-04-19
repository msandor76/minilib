<?php
function intToNullBegin($i){
	if(strlen($i)<2){
		$str = "0".$i;
	}else{
		$str = $i;
	}
	return $str;
}
?>
