<?php

function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

$ok = true;
if(isset($_POST['delete'])){

    $dir = str_replace('\\', '/', realpath(__DIR__ . "/../../"));
    if(delTree($dir)){
        echo 'Installer deleted succesfully.';
    }else{
        echo 'Could not delete this directory: ' . $dir . '<br>You should do it manually.';
        $ok = false;
    }

}

if(isset($_POST['disable'])){

    $htaccess = str_replace('\\', '/', realpath(__DIR__ . "/../../")) . '/.htaccess';
    if(file_put_contents($htaccess, 'Deny from all')){
        echo 'Installer path disabled succesfully.';
    }else{
        echo 'Could not create the .htaccess file here: ' . $htaccess;
        $ok = false;
    }

}


if($ok){
    foreach($_SESSION as $key => $value){
        unset($_SESSION[$key]);
    }
}
exit;