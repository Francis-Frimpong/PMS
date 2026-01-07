<?php
session_start();

$routes = require 'app/Routes/routes.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/PMS';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
$uri = rtrim($uri, '/'); // normalize
if ($uri === '') $uri = '/';

$key = $method . ' ' . $uri;


if (!isset($routes[$key])) {
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

[$controllerName, $methodName] = $routes[$key];

require "app/Controllers/$controllerName.php";

$controllerClass = "App\\Controllers\\$controllerName";
$controller = new $controllerClass();

$controller->$methodName();
