<?php

// funciones básicas
require __DIR__ . '/functions.php';

// clases para controlar de una forma más eficiente 
// las alertas, las sesiones y las plantillas / vistas
require __DIR__ . '/Vendor/Tibelian/Controller.php';
require __DIR__ . '/Vendor/Tibelian/Alert.php';
require __DIR__ . '/Vendor/Tibelian/Session.php';
require __DIR__ . '/Vendor/Tibelian/View.php';
require __DIR__ . '/Vendor/Tibelian/Language.php';

// modelos a usar
require __DIR__ . '/Model/Account.php';
require __DIR__ . '/Model/Article.php';
require __DIR__ . '/Model/Player.php';
require __DIR__ . '/Model/Guild.php';

// para controlar las rutas
require __DIR__ . '/Vendor/Bramus/Router.php';

// recoge información básica web
$webSite = getJson('website');

// constantes que usaremos muy seguido
define('BASE_URL', $webSite['url']);
define('WEB_NAME', $webSite['title']);
define('REAL_IP', $_SERVER[$webSite['proxy']]);

// prepara el controlador y la vista
Controller::setDirPath('Source/Controller');
View::setDirPath('Public/Theme/' . $webSite['theme'] . '/View');

// elimina variables ya que no nos harán falta
unset($webSite);
