<?php

if(!isset($_GET['q'])){
    exit;
}
$length = mb_strlen($_GET['q']);
if($length > 3){

    session_start();
    $mysqli = new mysqli(
        $_SESSION['database']['host'],
        $_SESSION['database']['user'],
        $_SESSION['database']['pass'],
        'account',
        $_SESSION['database']['port']
    );
    $sql = "
        SELECT id, login, email
        FROM account
        WHERE login LIKE ?
        OR email LIKE ?
    ";
    $login = '%' . $_GET['q'] . '%';
    $email = '%' . $_GET['q'] . '%';

    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    @$stmt->bind_param("ss", $login, $email);

    if(@$stmt->execute()){

        $list = array();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($account = $result->fetch_assoc()){
                $list[] = $account;
            }
        }
        echo json_encode(
            array(
                'result' => 'OK',
                'data' => $list
            )
        );

    }else{
        echo json_encode(
            array(
                'result' => 'ERROR',
                'data' => $stmt->error
            )
        );
    }

}
