<?php

if(isset($_POST['username']) && isset($_POST['password'])){

    require 'App/DataAccessObject/QueryAccount.php';

    try{
        
        $_SESSION['user'] = QueryAccount::login($_POST['username'], $_POST['password']);
        $_SESSION['alert'][] = new Alert('success', Language::translate('welcomeback-user'));
        Session::reload();

    }catch(ExceptionCMS $e){

        switch($e->getCode()){

            case 404:
                $_SESSION['alert'][] = new Alert('warning', Language::translate('wrong-login'));
                break;
            default:
                $_SESSION['alert'][] = new Alert('danger', Language::translate('error-unexpected'));
                addLog('error', array(
                    'date' => date("Y-m-d H:i"),
                    'ip' => REAL_IP,
                    'location' => 'Controller/user/login.php',
                    'exception' => array(
                        'code' => $e->getCode(),
                        'message' => $e->getMessage()
                    )
                ));
                break;

        }

    }

}else{
    $_SESSION['alert'][] = new Alert('warning', Language::translate('complete-all-required-fileds'));
}