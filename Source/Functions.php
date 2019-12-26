<?php

// devuelve array asociativo del json
function getSettings($fileName){
    $file = __DIR__ . "/Settings/$fileName.json";
    if(file_exists($file)){
        return json_decode(file_get_contents($file), true);
    }else{
        return array();
    }
}

// guarda array asociativo en archivo json
function setSettings($fileName, $data){
    $file = __DIR__ . "/Settings/$fileName.json";
    return file_put_contents($file, json_encode($data));
}

// guarda logs
function addLog($folder, $data){
    $path = "Logs/$folder/";
    $file = $path . date('Y-m-d') . ".json";
    if(!file_exists($path)){
        mkdir($path, 600);
    }else{
        if(file_exists($file)){
            $prev = json_decode(file_get_contents($file), true);
            array_push($fullData, $prev);
        }
    }
    array_push($fullData, $data);
	$fp = fopen($file, 'w');
	fwrite($fp, json_encode($fullData));
	fclose($fp);
}

// reemplaza los carácteres especiales
function replaceSpecialChars($s){
	$s = preg_replace("/[áàâãª]/","a",$s);
	$s = preg_replace("/[ÁÀÂÃ]/","A",$s);
	$s = preg_replace("/[éèê]/","e",$s);
	$s = preg_replace("/[ÉÈÊ]/","E",$s);
	$s = preg_replace("/[íìî]/","i",$s);
	$s = preg_replace("/[ÍÌÎ]/","I",$s);
	$s = preg_replace("/[óòôõº]/","o",$s);
	$s = preg_replace("/[ÓÒÔÕ]/","O",$s);
	$s = preg_replace("/[úùû]/","u",$s);
	$s = preg_replace("/[ÚÙÛ]/","U",$s);
	$s = str_replace(" ","-",$s);
	$s = str_replace("ñ","n",$s);
	$s = str_replace("Ñ","N",$s);
	return $s;
}