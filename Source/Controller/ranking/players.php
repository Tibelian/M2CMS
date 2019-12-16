<?php

require 'App/DataAccessObject/QueryPlayer.php';

try{
    
    $_SESSION['ranking'] = QueryPlayer::getRankingGuilds();

}catch(ExceptionCMS $e){

    //$_SESSION['alert'][] = new Alert('danger', 'ERROR: <code>' . $e->getCode() . '</code> ' . $e->getMessage());
    header('Location: ' . BASE_URL . '/error');
    exit;

}

header('Location: ' . BASE_URL . '/ranking/guilds');
exit;