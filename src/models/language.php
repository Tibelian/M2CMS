<?php

/**
 * @author Tibelian
 * @see www.tibelian.com
 */
class Language{

    private $valid = false;
    private $iso;
    private $file;
    private $json;

    function __construct($file){
        $this->file = $file;
        if(file_exists($file)){
            $this->json = json_decode(file_get_contents($file), true);
            $this->iso = $this->json['iso'];
            $this->valid = true;
        }
    }

    public function setIso($iso){
        $this->iso = $iso;
    }
    public function setFile($file){
        $this->file = $file;
    }
    public function setJson($json){
        $this->json = $json;
    }
    public function setValid($valid){
        $this->valid = $valid;
    }

    public function getIso(){
        return $this->iso;
    }
    public function getJson(){
        return $this->json;
    }
    public function getFile(){
        return $this->file;
    }
    public function isValid(){
        return $this->valid;
    }

    public function translate($keyword){
        if(isset($this->json[$keyword])){
            return $this->json[$keyword];
        }else{
            return $keyword;
        }
    }

}