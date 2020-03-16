<?php


// register
$router->get('/register', function() use($website){
    header('Location: ' . $website->getConfig()['url'] . '/user/register');
});
$router->get('/user/register', function() use($website){
    echo $website->getTemplate()->render('user/register.html');
});


// login
$router->get('/login', function() use($website){
    header('Location: ' . $website->getConfig()['url'] . '/user/login');
});
$router->get('/user/login', function() use($website){
    echo $website->getTemplate()->render('user/login.html');
});