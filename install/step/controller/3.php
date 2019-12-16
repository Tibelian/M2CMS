<?php

$rActivation = false;
if(isset($_POST['register_mail'])){
    if($_POST['register_mail'] == 'true'){
        $rActivation = true;
    }
}
$referral = false;
if($_POST['referral'] == 'true'){
    $referral = true;
}

$_SESSION['website'] = array(
    'title' => $_POST['title'],
    'url' => $_POST['url'],
    'lang' => $_POST['lang'],
    'proxy' => $_POST['proxy'],
    'theme' => 'Default',
    'register-activation' => $rActivation,
    'register-coins' => (int)$_POST['register_coins'],
    'referral' => $referral
);
$_SESSION['alert'][] = '<font color="lightgreen">'.date('d/m/Y H:i').' | WebSite settings saved successfully</font>';
$_SESSION['step']++;
