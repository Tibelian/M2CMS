<?php

$_SESSION['socialMedia'] = getSettings('socialMedia');

if(Controller::getRedirect()){
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
