<?php

require 'src/website.php';
require 'src/models/user.php';


try{

    // init website
    $configFile = 'config/website.json';
    $config = json_decode(file_get_contents($configFile), true);
    $website = new WebSite($config);


    // init user
    $user = new User();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }


    // manage routes
    $router = $website->getRouter();
    include 'src/routes/public.php';
    if($user->isLoggedIn()){
        include 'src/routes/user.php';
        if($user->getAccount()->getWebAdmin() > 1){
            include 'src/routes/admin.php';
        }
    }else{
        include 'src/routes/guest.php';
    }

    $router->run();

}catch(WebSiteException $we){
    
    echo "CLASS: WebSiteException <br>";
    echo "ERROR: " . $we->getMessage() . "<br>";
    echo "LOCATION: " . $we->getLocation() . "<br>";

}catch(Exception $e){
    
    echo "CLASS: " . get_class($e) . "<br>";
    echo "ERROR: " . $e->getMessage() . "<br>";

}