<?php

/**
 * @author Tibelian
 * @see www.tibelian.com
 */

require_once __DIR__ . '/models/language.php';
require_once __DIR__ . '/models/error.php';
require_once __DIR__ . '/../vendor/autoload.php';

class WebSite{

    private $template;
    private $router;
    private $config;
    private $language;
    private $themePath;
    private $themeUrl;

    function __construct($config){

        // default config
        $this->config = $config;
        $this->themeUrl = $this->config['url'] . '/public/themes/' . $this->config['theme'];
        $this->themePath = __DIR__ . '/../public/themes/' . $this->config['theme'];
        
        // load the language
        $langIso = $config['lang'];
        if(isset($_COOKIE['lang'])){
            $langIso = $_COOKIE['lang'];
        }
        $langFile = __DIR__ . '/../config/languages/' . $langIso . '.json';
        $this->language = new Language($langFile);
        if(!$this->language->isValid()){
            throw new WebSiteException(404, 'The language "' . $langIso . '" does not exist on our database', 'WebSite/__construct()');
        }
        $this->language = $this->language->getJson();

        // templates config
        $templatesOriginalPath = $this->themePath . '/templates';
        $loader = new \Twig\Loader\FilesystemLoader($templatesOriginalPath);

        // run the engines
        $this->template = new \Twig\Environment($loader);
        $this->router = new \Bramus\Router\Router();

    }


    public function setTemplate($template){
        $this->template = $template;
    }
    public function setRouter($router){
        $this->router = $router;
    }
    public function setConfig($config){
        $this->config = $config;
    }
    public function setLanguage($language){
        $this->language = $language;
    }
    public function setThemeUrl($themeUrl){
        $this->themeUrl = $themeUrl;
    }
    public function setThemePath($themePath){
        $this->themePath = $themePath;
    }


    public function getTemplate(){
        return $this->template;
    }
    public function getRouter(){
        return $this->router;
    }
    public function getConfig(){
        return $this->config;
    }
    public function getLanguage(){
        return $this->language;
    }
    public function getThemeUrl(){
        return $this->themeUrl;
    }
    public function getThemePath(){
        return $this->themePath;
    }


}