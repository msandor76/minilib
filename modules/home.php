<?php
/*
// if not include in index.php:
require_once LIB_DIR."classes/db.class.php";
DB::$user = DB_USER;
DB::$password = DB_PASS;
DB::$dbName = DB_NAME;
DB::$encoding = DB_ENCODING;*/

require_once(APL_DIR."Classes".DIRECTORY_SEPARATOR."Test.php");

use foo as feline;

echo "home<br>";

$tesztObj = new feline\Test();
echo $tesztObj->getA();

echo "<hr>";

echo feline\Test::says();

echo "<hr>";

$sql = "SELECT * FROM user";
$queryArr = DB::query($sql);

foreach($queryArr as $row){
	echo $row["name"]."<br>";
}

?>
