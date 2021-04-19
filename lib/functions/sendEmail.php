<?php

/*
// $paramArr
$paramArr = array(
"subject" => "",
"fromemail" => "",
"fromname" => "",
"toemail" => "",
"toname" => "",
"replytoemail" => "",
"replytoname" => "",
"msg" => "",
"toemail2" => ""
);
*/

function sendEmail($paramArr){
	$d = date("Y-m-d H:i:s");
	$mail = $paramArr["toemail"];
	//$mailArr = array();
	
	$subject = $paramArr["subject"];
	//$subject = iconv("utf-8","iso-8859-2//TRANSLIT",$subject);//iconv("utf-8","iso-8859-2//TRANSLIT",$subject)
	
	$fromName = $paramArr["fromname"];
	//$fromName = iconv("utf-8","iso-8859-2//TRANSLIT",$fromName);
	
	$msg = $paramArr["msg"];
	
	$headers = "From: ".$fromName." <".$paramArr["fromemail"].">\n"."Reply-To: ".$paramArr["replytoemail"];							
	$headers .= "\nMIME-Version: 1.0\n" . "Content-type: text/html; charset=utf-8" . "\r\n" ;
	
	mail($mail, $subject, $msg, $headers);
}

?>
