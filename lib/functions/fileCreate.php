<?php

function fileCreate($content, $folder, $fileextension){
	$d = date("Y-m-d");
	$myFile = $folder.$d.".".$fileextension;
	if( is_file($myFile) )unlink($myFile);
	$fh = fopen($myFile, 'w') or die("I couldn't open the file");
	fwrite($fh, $content);
	fclose($fh);
}
?>
