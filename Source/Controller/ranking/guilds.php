<?php

require 'App/DataAccessObject/QueryPlayer.php';

try{
    
    $_SESSION['ranking'] = QueryPlayer::getRankingGuilds();

}catch(ExceptionCMS $e){

    header('Location: ' . BASE_URL . '/error');
    exit;

}

header('Location: ' . BASE_URL . '/ranking/guilds');
exit;
