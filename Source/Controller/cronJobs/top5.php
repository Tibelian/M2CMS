<?php

require 'App/DataAccessObject/QueryPlayer.php';

try{
    
    $data = QueryPlayer::getTop5();
    saveJson('cache/top5', $data);

}catch(ExceptionCMS $e){

    addLog('cron', array(
        'date' => date("Y-m-d H:i"),
        'location' => 'Controller/cronJobs/top5.php',
        'exception' => array(
            'code' => $e->getCode(),
            'message' => $e->getMessage()
        )
    ));

}