<?php
require_once(LIB_DIR."classes".DIRECTORY_SEPARATOR."Csrf.php");

use Helpers\Csrf;

$csrf_token = Csrf::makeToken("csrf_token");
echo $csrf_token."<hr>";

echo '<form action="index.php?page=csrf_test" method="post">';
echo '<input type="text" name="testinput">';
echo '<input type="hidden" name="csrf_token" value="'.$csrf_token.'">';
echo '<input type="submit">';
echo '</form>';
?>
