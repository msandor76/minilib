<?php
error_reporting(-1);
ini_set('display_errors', 1);
session_start();

define('MODULES_DIR', 'modules'.DIRECTORY_SEPARATOR);
define('LIB_DIR', 'lib'.DIRECTORY_SEPARATOR);
define('APL_DIR', 'apl'.DIRECTORY_SEPARATOR);

require_once "config.php";
require_once "db_config.php";
require_once LIB_DIR."classes/db.class.php";

DB::$user = DB_USER;
DB::$password = DB_PASS;
DB::$dbName = DB_NAME;
DB::$encoding = DB_ENCODING;

if(isset($_GET["page"])){
	$pageModul = filter_var($_GET["page"], FILTER_SANITIZE_STRING);
}
else{
	$pageModul = "home";
}


if (file_exists( MODULES_DIR . $pageModul.".php")) {
	include MODULES_DIR . $pageModul.".php";
}
else{
	include MODULES_DIR . "home.php";
}

?>
