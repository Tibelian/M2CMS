<?php

/**
 * @author Tibelian
 * @see www.tibelian.com
 */
class User{

    private $account;
    private $loggedIn = false;

    public function setAccount($account){
        $this->account = $account;
    }
    public function setLoggedIn($loggedIn){
        $this->loggedIn = $loggedIn;
    }

    public function getAccount(){
        return $this->account;
    }
    public function isLoggedIn(){
        return $this->loggedIn;
    }

}