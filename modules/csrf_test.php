<?php
require_once(LIB_DIR."classes".DIRECTORY_SEPARATOR."Csrf.php");

use Helpers\Csrf;

if (!Csrf::isTokenValid("csrf_token")) {
	// redirect somepage
	echo 'Redirect';
}
else{
	echo 'We have a valid token!<br>';
	echo 'Test Input: '.$_POST["testinput"];
}
?>
