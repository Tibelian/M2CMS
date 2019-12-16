<?php

require 'App/DataAccessObject/QueryAccount.php';
require 'App/DataAccessObject/QueryPlayer.php';

try{
    
    // contenedor cache
    $fullData = array();

    // estadísticas jugadores
    $player = QueryPlayer::getStatics();

    // estadísticas cuentas
    $account = QueryAccount::getStatics();

    // canales abiertos
    $channelConf = getJson('statics');
    $channel = array();
    foreach($channelConf['channels'] as $ch){
        if(@fsockopen(gethostbyname($channelConf['host']), $ch['port'], $errno, $errstr, 1)){
            $channel[] = array(
                'name' => $ch['name'],
                'online' => true
            );
        }else{
            $channel[] = array(
                'name' => $ch['name'],
                'online' => false
            );
        }
    }

    // guarda los datos
    array_push($fullData, $player, $account, $channel);
    saveJson('cache/statics', $fullData);

}catch(ExceptionCMS $e){

    addLog('cron', array(
        'date' => date("Y-m-d H:i"),
        'location' => 'Controller/cronJobs/statics.php',
        'exception' => array(
            'code' => $e->getCode(),
            'message' => $e->getMessage()
        )
    ));

}