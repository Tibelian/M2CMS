<?php

$_SESSION['statics'] = getSettings('cache/statics');

if(Controller::getRedirect()){
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
