<?php

@$mysqli = new mysqli($_POST['db_host'], $_POST['db_user'], $_POST['db_pass'], 'account', $_POST['port']);
if($mysqli->connect_error){
    $_SESSION['alert'][] = '<font color="red">'.date('d/m/Y H:i').' | DataBase connection failed!</font>';
    $_SESSION['alert'][] = '<font color="yellow">'.date('d/m/Y H:i').' | ' . $mysqli->connect_error . '</font>';
}else{
    $_SESSION['database'] = array(
        'host' => $_POST['db_host'],
        'user' => $_POST['db_user'],
        'pass' => $_POST['db_pass'],
        'port' => (int)$_POST['db_port']
    );
    $_SESSION['alert'][] = '<font color="lightgreen">'.date('d/m/Y H:i').' | DataBase connected sucessfully</font>';
    $_SESSION['alert'][] = '<font color="lightgreen">'.date('d/m/Y H:i').' | Host: ' . $mysqli->host_info . '</font>';
    $_SESSION['alert'][] = '<font color="lightgreen">'.date('d/m/Y H:i').' | Server: ' . $mysqli->server_info . '</font>';
    $_SESSION['step']++;
}
