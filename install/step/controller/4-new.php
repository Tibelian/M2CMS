<?php

$sql = "
    INSERT INTO account(login, password, email, web_admin)
    VALUES(?, PASSWORD(?), ?, ?);
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
    "sssi",
    $_POST['login'],
    $_POST['password'],
    $_POST['email'],
    $_POST['level'],
);

if($stmt->execute()){

    $_SESSION['alert'][] = '<font color="lightgreen">' . date("d/m/Y H:i") . ' |  User ' . $_POST['login'] . ' inserted sucessfully (ID: ' . $stmt->insert_id . ')</font>';

}else{

    $_SESSION['alert'][] = '<font color="red">' . date("d/m/Y H:i") . ' |  Could not insert the user ' . $_POST['login'] . ' to the database</font>';
    $_SESSION['alert'][] = '<font color="yellow">' . date("d/m/Y H:i") . ' |  ' . $stmt->error . '</font>';

}
