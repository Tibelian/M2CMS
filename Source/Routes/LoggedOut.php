<?php

////////////////
// USER LOGIN //
////////////////
$router->get('/login', function(){
    header('Location: ' . BASE_URL . '/user/login');
});
$router->get('/user/login', function(){
    View::setFile('user/login');
    View::load();
});
$router->post('/user/login', function(){
    Controller::load('user/login');
    if(Session::getLoggedIn()){
        header('Location: ' . BASE_URL . '/user');
        exit;
    }else{
        header('Location: ' . BASE_URL . '/user/login');
        exit;
    }
});

///////////////////
// USER REGISTER //
///////////////////
$router->get('/register', function(){
    header('Location: ' . BASE_URL . '/user/register');
});
$router->get('/user/register', function(){
    if(isset($_SESSION['socialMedia'])){
        View::setFile('user/register');
        View::load();
    }else{
        Controller::load('other/socialMedia');
        header('Location: ' . BASE_URL . '/user/register');
        exit;
    }
});

////////////////////
// USER LOST PASS //
////////////////////
$router->get('/lost', function(){
    header('Location: ' . BASE_URL . '/user/lost');
});
$router->get('/user/lost', function(){
    View::setFile('user/lost');
    View::load();
});

////////////////////////////
// USER RECOVER LOST PASS //
////////////////////////////
$router->get('/recover', function(){
    header('Location: ' . BASE_URL . '/user/recover');
});
$router->get('/user/recover', function(){
    View::setFile('user/recover');
    View::load();
});
