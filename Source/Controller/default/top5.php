<?php

$top5List = getSettings('cache/top5');
$_SESSION['top5List'] = array();
foreach($top5List as $player){
    $_SESSION['top5List'][] = new Player($player);
}

if(Controller::getRedirect()){
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

