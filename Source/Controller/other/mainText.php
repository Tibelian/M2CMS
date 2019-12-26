<?php

$_SESSION['mainText'] = getSettings('Language/' . Language::getIso() . '/Text')['main'];

if(Controller::getRedirect()){
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
