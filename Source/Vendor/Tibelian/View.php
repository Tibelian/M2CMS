<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */
class View {
    
    static private $path;
    static private $file;
    static private $extension = '.php';
    static private $title = '';
    static private $css = array();
    static private $js = array();
    
    static function getPath() {
        return self::$path;
    }
    static function getFile() {
        return self::$file;
    }
    static function getExtension() {
        return self::$extension;
    }
    static function getCss() {
        return self::$css;
    }
    static function getJs() {
        return self::$js;
    }
    static function getTitle() {
        return self::$title;
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
    static function setTitle($title) {
        self::$title = $title;
    }
    static function setCss($css) {
        self::$css = $css;
    }
    static function setJs($js) {
        self::$js = $js;
    }
    
    static function addCss($css){
        array_push(self::$css, $css);
    }
    static function addJs($js){
        array_push(self::$js, $js);
    }
}