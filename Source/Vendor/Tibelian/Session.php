<?php
/**
 * @author Tiberiu
 * @see www.tibelian.com
 */
class Session {
    
    static private $loggedIn = false;
    static private $user = null;
    
    static public function isLoggedIn() {
        return self::$loggedIn;
    }
    static public function getUser() {
        return self::$user;
    }
    static public function setLoggedIn($loggedIn) {
        self::$loggedIn = $loggedIn;
    }
    static public function setUser($user) {
        self::$user = $user;
    }
    static public function reload() {
        if(isset($_SESSION['user'])){
            self::setLoggedIn(true);
            self::setUser($_SESSION['user']);
        }
    }
    
}