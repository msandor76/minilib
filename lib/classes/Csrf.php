<?php
namespace Helpers;

/**
 * It's based on Simple MVC (now it call Novaframework) @author David Carr - dave@novaframework.com
 * 
 * Instructions:
 * At the top of the controller where the other "use" statements are place:
 * use Helpers\Csrf;
 *
 * Just prior to rendering the view for adding or editing data create the CSRF token:
 * $data['csrf_token'] = Csrf::makeToken();
 * At the bottom of your form, before the submit button put:
 * <input type="hidden" name="csrf_token" value="<?= $data['csrf_token']; ?>" />
 *
 * These lines need to be placed in the controller action to validate CSRF token submitted with the form:
 * if (!Csrf::isTokenValid()) {
 * 		// redirect somepage
 * }
 * And that's all
 */
class Csrf{
    /**
     * get CSRF token and generate a new one if expired
     *
     * @access public
     * @static static method
     * @return string
     */
    
    
    public static function makeToken($name){
        $max_time    = 60 * 60 * 24; // token is valid for 1 day
        $csrf_token = self::isSessionName($_SESSION[$name]);
        $stored_time  = self::isSessionName($_SESSION[$name.'_time']);

        if ($max_time + $stored_time <= time() || empty($csrf_token)) {
            $_SESSION[$name] = md5(uniqid(rand(), true));
            $_SESSION[$name.'_time'] = time();
        }

        return $_SESSION[$name];
    }
    
    public static function isSessionName($name){
		if (isset($_SESSION[$name])) {
			return $_SESSION[$name];
		}
		else{ 
			return null;
		}
	}

    /**
     * checks if CSRF token in session is same as in the form submitted
     *
     * @access public
     * @static static method
     * @return bool
     */
    public static function isTokenValid($name)
    {
        return $_POST[$name] === $_SESSION[$name];
    }
}
