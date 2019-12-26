<?php

$_SESSION['articleList'] = array();
$articleList = getSettings('Language/' . Language::getIso() . '/News');
foreach($articleList as $article){
    $_SESSION['articleList'][] = new Article($article);
}

if(Controller::getRedirect()){
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
