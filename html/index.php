<?php 

require_once '../vendor/autoload.php';
require_once '../bootstrap.php';
require_once '../config/links.php';

use \App\Router;

$routes = require '../config/routes.php';
$router = new Router($routes);
$request_uri = $_SERVER['REQUEST_URI'];
print $router->dispatch(parse_url($request_uri, PHP_URL_PATH));

?>