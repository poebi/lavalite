<?php
//app root
define('APP_ROOT', dirname(__DIR__));

// Configure session - for built-in PHP server, use root path
session_set_cookie_params([
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax'
]);

//App configurations
require_once __DIR__ . '/../config.php';

//Error reporting
if (IS_DEV) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
}

//use database query builder
require_once __DIR__ . '/../scheme/Database.php';

//use helper functions
require_once __DIR__ . '/../scheme/helpers.php';

//use router class
require_once __DIR__ . '/../scheme/Router.php';
$router = Router::getInstance();

//call all routes
require_once __DIR__ . '/../routes.php';

//dispatch
$router->run();