<?php

// configuración por defecto
require 'Source/basic.php';

////////////////////
ob_start();       //
session_start();  //
////////////////////

// ROUTER -> usado para usar rutas sencillas
$router = new \Bramus\Router\Router();

// SESSION -> usado para gestionar al usuario
Session::reload();

// si el usuario ha iniciado sesión podrá acceder a diferentes vistas
require 'Source/Routes/Public.php';
if(Session::getLoggedIn()){
	require 'Source/Routes/LoggedIn.php';
	if(Session::getUser()->getWebAdmin() > 4){
		require 'Source/Routes/Administrator.php';
	}
}else{
	require 'Source/Routes/LoggedOut.php';
}

////////////////////
$router->run();   //
////////////////////

////////////////////
ob_end_flush();   //
////////////////////
