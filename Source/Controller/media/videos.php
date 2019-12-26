<?php

$_SESSION['videoList'] = getJson('media/videos');

if(Controller::getRedirect()){
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
