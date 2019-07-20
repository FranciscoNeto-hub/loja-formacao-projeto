<?php
require __DIR__ . '/../bootstrap.php';

$request = trim($_SERVER['REQUEST_URI'], '/');
$url = explode('/', $request);

$controller = isset ($url['0']) && $url [0] ? $url [0] : 'home';
$controller = '\\LojaApp\\Controller\\' . ucfirst($controller) . 'Controller';
$action    = isset ($url[1]) && $url [1] ? $url[1] : 'index';
$paramaeter    = isset ($url[2]) && $url [2] ? $url[2] : '';

if(!class_exists($controller)
|| !method_exists(new $controller, $action)) {
    die('Página não encontrada!');
}

$response = call_user_func_array([new $controller, $action], [$paramaeter]);

print $response;