<?php

/**
 * @author
 * @see www.tibelian.com
 */
class WebSiteException extends Exception{

    protected $code;
    protected $message;
    protected $location;

    function __construct($code, $message, $location = null){
        parent::__construct($message, $code);
        $this->code = $code;
        $this->message = $message;
        $this->location = $location;
    }

    public function getLocation(){
        return $this->location;
    }
    public function setLocation($location){
        $this->location = $location;
    }

}