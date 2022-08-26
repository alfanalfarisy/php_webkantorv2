<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/pages/home.php';
        break;
    case '' :
        require __DIR__ . '/pages/home.php';
        break;
  
    default:
        http_response_code(404);
        require __DIR__ . '/pages/404.php';
        break;
}
