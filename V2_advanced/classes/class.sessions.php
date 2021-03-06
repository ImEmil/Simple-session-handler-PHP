<?php
/*

                                                   +-+-+-+-+-+-+
                                                   |I|m|E|m|i|l|
                                                   +-+-+-+-+-+-+
                                         
*/
class Sessions {
        
        # !! If you are using an older version of PHP than 5.4.0, replace all [] with array() !!
        
	protected static $cookie_params =
        [ 'lifetime'  => 1800, 'path'  => '/', 'httponly'  => false, 'secure'  => false, 'domain'  => null ], $_params;

	public function __construct() {
        self::$cookie_params['lifetime'] = $lifetime;
        self::$cookie_params['path']     = $path;
        self::$cookie_params['domain']   = $domain;
        self::$cookie_params['secure']   = $secure;
        self::$cookie_params['httponly'] = $httponly;
	
	session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
	self::$_params = session_get_cookie_params();
	}

        public function start() {
                session_start();

        }

        public function regenerate_id($bool = true) {
                session_regenerate_id($bool);
        }

        public static function set($session, $val) {
                $_SESSION[$session] = $val;
        }

        public static function display($session) {
                print_r($_SESSION[$session]);
        }

        public static function exists($session) {
                return(isset($_SESSION[$session]) ? true : false);
        }

        public static function destroy() {
                $_SESSION = [];

                if (ini_get("session.use_cookies")) {
        
                        setcookie(session_name(), '', time() - 42000,
                        Sessions::$_params["path"],
                        Sessions::$_params["domain"],
                        Sessions::$_params["secure"],
                        Sessions::$_params["httponly"]
                        );
                
                }
                session_destroy();
        }

}
