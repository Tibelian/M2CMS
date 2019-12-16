<?php

$top5List = getJson('cache/top5');
$_SESSION['top5List'] = array();
foreach($top5List as $player){
    $_SESSION['top5List'][] = new Player($player);
}