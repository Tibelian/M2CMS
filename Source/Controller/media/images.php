<?php

$_SESSION['imageList'] = getJson('media/images');

if(Controller::getRedirect()){
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
