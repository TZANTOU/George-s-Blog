<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =[
    '/index.php' => 'controllers/index.php',
    '/' => 'controllers/index.php',
    '/login' => 'controllers/login.php',
    '/register' => 'controllers/register.php',
    '/logout' => 'controllers/logout.php',
    '/create' => 'controllers/create.php'
];

if(array_key_exists($uri, $routes)){
    require $routes[$uri];
}else{
    http_response_code(404);
    require "views/404.php";
}