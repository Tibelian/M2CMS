<?php

require '../Source/Vendor/PHPMailer/src/Exception.php';
require '../Source/Vendor/PHPMailer/src/PHPMailer.php';
require '../Source/Vendor/PHPMailer/src/SMTP.php';

if(empty($_POST['mail_host'])){
    $_SESSION['alert'][] = '<font color="lightgreen">'.date('d/m/Y H:i').' | Mailer skipped successfully</font>';
    unset($_SESSION['mailer']);
    $_SESSION['step']++;
}else{

    $auth = false;
    if($_POST['mail_auth'] == 'true'){
        $auth = true;
    }
    
    try{

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $_POST['mail_host'];
        $mail->SMTPAuth = $auth;
        $mail->SMTPAuth = $_POST['mail_secure'];
        $mail->Username = $_POST['mail_user'];
        $mail->Password = $_POST['mail_pass'];
        $mail->Port = $_POST['mail_port'];
        // google smtp
        // if auth == tls --> port 587
        // if auth == ssl --> port 465

        $mail->setFrom($_POST['mail_user'], 'M2CMS Installer');
        $mail->addAddress('iuliandafinescu@gmail.com');
        $mail->Subject = 'Checking mailer';
        $mail->Body = 'Good job! Mailer works!';
        $mail->send();

        $_SESSION['mailer'] = array(
            'host' => $_POST['mail_host'],
            'user' => $_POST['mail_user'],
            'pass' => $_POST['mail_pass'],
            'port' => $_POST['mail_port'],
            'smtp-secure' => $_POST['mail_secure'],
            'smtp-auth' => $_POST['mail_auth']
        );
        $_SESSION['alert'][] = '<font color="lightgreen">'.date('d/m/Y H:i').' | Mailer connected successfully</font>';
        $_SESSION['step']++;

    }catch(Exception $e){
        $_SESSION['alert'][] = '<font color="red">'.date('d/m/Y H:i').' | Mailer connection failed</font>';
        $_SESSION['alert'][] = '<font color="yellow">'.date('d/m/Y H:i').' | '.$mail->ErrorInfo.'</font>';
    }

}
