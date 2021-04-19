<?php

function fileDelete($file, $dir="upload"){
	//files folder
	$dir    = $dir."/";
	
	if(  file_exists ( $dir.$file )  ){
		chmod( $dir.$file, 0777); unlink( $dir.$file );				
	}
}

function allFileDelete($dir){
	// files folder
	$dir    = $dir."/"; // /uploaded files
	$files = scandir($dir);
	
	foreach($files as $key=>$value){
		//if( !in_array($value,array(".","..")) ){}
		if( $value!="." && $value!=".." && $value!="index.html" ){
			//if( is_file($dir.$value) )unlink($dir.$value);
			
			//example: if(  file_exists ( "upload/images/full/".$img )  ){}
			if(  file_exists ( $dir.$value )  ){
				chmod( $dir.$value, 0777); unlink( $dir.$value );				
			}
			
		}
	}
}

?>

