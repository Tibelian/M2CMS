<?php

session_start();

if(isset($_POST['next'])){

    $controller = 'step/controller/' . $_SESSION['step'] . '.php';
    if(file_exists($controller)){
        include $controller;
    }else{
        echo 'Controller does not exist';
        exit;
    }

}else if(isset($_POST['back'])){

    if($_SESSION['step'] > 1){
        $_SESSION['step']--;
    }

}else{

    if(isset($_SESSION['step']) && $_SESSION['step'] == 4){
        if(isset($_POST['change_level']) || isset($_POST['save_admin'])){

            include 'step/controller/4-change.php';

        }else if(isset($_POST['create_account'])){

            include 'step/controller/4-new.php';
    
        }
    }

}

header('Location: ' . pathinfo($_SERVER['REQUEST_URI'])['dirname']);
exit;
