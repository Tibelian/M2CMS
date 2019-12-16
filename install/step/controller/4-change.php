<?php

$sql = "
    UPDATE account
    SET web_admin = ?
    WHERE login = ?
";
$mysqli = new mysqli(
    $_SESSION['database']['host'],
    $_SESSION['database']['user'],
    $_SESSION['database']['pass'],
    'account',
    $_SESSION['database']['port'],
);
$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param(
    "is",
    $_POST['new_level'],
    $_POST['login']
);

if($stmt->execute()){

    $rows = $stmt->affected_rows;
    if($rows == 1){
        $_SESSION['alert'][] = '<font color="lightgreen">' . date("d/m/Y H:i") . ' | Account: ' . $_POST['login'] . ' now has ' . $_POST['new_level'] . ' admin level</font>';
    }else{
        $_SESSION['alert'][] = '<font color="red">' . date("d/m/Y H:i") . ' | The query executed modified: ' . $rows . ' rows</font>';
        $_SESSION['alert'][] = '<font color="yellow">' . date("d/m/Y H:i") . ' | Verify if the account: ' . $_POST['login'] . ' exits</font>';
    }

}else{

    $_SESSION['alert'][] = '<font color="red">' . date("d/m/Y H:i") . ' | Error SQL - could not execute the query</font>';
    $_SESSION['alert'][] = '<font color="yellow">' . date("d/m/Y H:i") . ' | ' . $stmt->error . '</font>';

}
