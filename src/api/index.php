<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
var_dump($uri);
$uri = explode( '/', $uri );
print_r($_SERVER['REQUEST_URI']);
var_dump($uri);
var_dump($_POST);
exit();
if ((isset($uri[2]) && $uri[2] != 'api') || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}