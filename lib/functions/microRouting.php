<?php
// it works with config.php
function microRouting(){
	$site_url = SITEURL;
	// HTTP protocol + Server address(localhost or example.com) + requested uri (/route or /route/home)
	$current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  //Current URL = http://localhost/route/something

	//Requested page = Current URL - Site URL   //Requested page = something
	$request = str_replace($site_url, '', $current_url);

	//Replacing extra back slash at the end
	$request = str_replace('/', '', $request);

	//Converting the request to lowercase
	$request = filter_var( strtolower($request), FILTER_SANITIZE_URL);
	
	return $request;// return example: home
}
?>
