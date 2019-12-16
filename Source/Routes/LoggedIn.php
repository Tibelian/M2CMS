<?php

////////////////
// USER PANEL //
////////////////
$router->get('/user', function(){
    Controller::load('user/panel');
    View::setFile('user/panel');
    View::load();
});

//////////////////////
// USER CHARACTERES //
//////////////////////
$router->get('/user/caracteres', function(){
    View::setFile('user/caracteres');
    View::load();
});

///////////////////
// USER SETTINGS //
///////////////////
$router->get('/user/settings', function(){
    View::setFile('user/settings');
    View::load();
});

/////////////////
// USER DONATE //
/////////////////
$router->get('/user/donate', function(){
    View::setFile('user/donate');
    View::load();
});

///////////////
// USER VOTE //
///////////////
$router->get('/user/vote', function(){
    View::setFile('user/vote');
    View::load();
});

/////////////////
// USER LOGOUT //
/////////////////
$router->get('/user/logout', function(){
    include 'App/Controller/User/LogOut.php';
});