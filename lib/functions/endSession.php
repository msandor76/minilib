<?php
function endSession(){
	//unset($_SESSION["user"]);
	//$_SESSION = array();
	if (ini_get('session.use_cookies')) {
		// get session cookie's properties
		$params = session_get_cookie_params();

		// unset the cookie
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
	}
    // destroy the session
    session_unset();
    session_destroy();
}
?>
