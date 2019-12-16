<?php


///////////////////
// ADMIN SUMMARY //
///////////////////
$router->get('/administrator', function(){
    View::setPath('App/View/Administrator/');
    View::setFile('summary');
    View::load();
});