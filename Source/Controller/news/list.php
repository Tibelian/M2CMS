<?php

;$_SESSION['articleList'] = array();
$articleList = getJson('language/' . Language::getIso() . '/news');
foreach($articleList as $article){
    $_SESSION['articleList'][] = new Article($article);
}
