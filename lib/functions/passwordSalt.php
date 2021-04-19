<?php
function passwordSalt($password){
	$password = hash('sha512', $password );
	$random_salt = hash('sha512', "mIcVsHYxzoIlwOlLy3sW3ln22!@kbo.#opdq".mt_rand(1, mt_getrandmax()) );
	$salted_password = hash('sha512', $password . $random_salt);
	$arr = array($salted_password, $random_salt);
	return $arr;
}
?>
