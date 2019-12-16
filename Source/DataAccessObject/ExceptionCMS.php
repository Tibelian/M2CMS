<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

class ExceptionCMS extends Exception{

    function __construct($message, $code){
        parent::__construct($message, $code);
    }

    public function __toString(){
        return __CLASS__ . ' - Code: ' . $this->getCode() . ' - Message: ' . $this->getMessage();
    }

}