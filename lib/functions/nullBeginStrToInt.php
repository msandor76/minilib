<?php
function nullBeginStrToInt($str){
	$toInt=0;
	$strArr = str_split($str);
	if( (int)$strArr[0]==0 ){
		$toInt= $strArr[1];
	}else{
		$toInt= (int)$str;
	}
	return (int)$toInt;
}
?>
