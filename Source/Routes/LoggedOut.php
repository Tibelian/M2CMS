<?php

////////////////
// USER LOGIN //
////////////////
$router->get('/login', function(){
    header('Location: ' . BASE_URL . '/user/login');
});
$router->get('/user/login', function(){
    include View::get('User/Login');
});
$router->post('/user/login', function(){
    include Controller::get('user/login');
});

///////////////////
// USER REGISTER //
///////////////////
$router->get('/register', function(){
    header('Location: ' . BASE_URL . '/user/register');
});
$router->get('/user/register', function(){
    include View::get('User/Register');
});

////////////////////
// USER LOST PASS //
////////////////////
$router->get('/lost', function(){
    header('Location: ' . BASE_URL . '/user/lost');
});
$router->get('/user/lost', function(){
    include View::get('User/Lost');
});

////////////////////////////
// USER RECOVER LOST PASS //
////////////////////////////
$router->get('/recover', function(){
    header('Location: ' . BASE_URL . '/user/recover');
});
$router->get('/user/recover', function(){
    include View::get('User/Recover');
});
