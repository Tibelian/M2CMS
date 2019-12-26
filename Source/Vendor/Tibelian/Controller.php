<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */
class Controller {
    
    static private $path;
    static private $file;
    static private $extension = '.php';
    static private $return = 'session';
    static private $redirect = true;
            
    static function getPath() {
        return self::$path;
    }
    static function getFile() {
        return self::$file;
    }
    static function getExtension() {
        return self::$extension;
    }
    static function getReturn(){
        return self::$return;
    }
    static function getRedirect(){
        return self::$redirect;
    }
    static function get($file, $ext = ''){
        if(!empty($ext)){
            return self::$path . $file . $ext;
        }else{
            return self::$path . $file . self::$extension;
        }
    }
    static function setPath($path) {
        self::$path = $path;
    }
    static function setFile($file) {
        self::$file = $file;
    }
    static function setExtension($extension) {
        self::$extension = $extension;
    }
    static function setReturn($return = 'session'){
        if($return == 'session' || $return == 'json'){
            self::$return = $return;
        }
    }
    static function setRedirect($redirect){
        self::$redirect = $redirect;
    }
    
}