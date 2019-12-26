<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// configuración por defecto
require 'Source/Core.php';

////////////////////
ob_start();       //
session_start();  //
////////////////////

// ROUTER: se obtienen enlaces sencillos
$router = new \Bramus\Router\Router();

// SESSION: usado para gestionar al usuario
Session::reload();

// si el usuario ha iniciado sesión podrá acceder a diferentes vistas
include 'Source/Routes/Public.php';
if(Session::isLoggedIn()){
	include 'Source/Routes/LoggedIn.php';
	if(Session::getUser()->getWebAdmin() > 0){
		include 'Source/Routes/Administrator.php';
	}
}else{
	include 'Source/Routes/LoggedOut.php';
}

////////////////////
$router->run();   //
ob_end_flush();   //
////////////////////
