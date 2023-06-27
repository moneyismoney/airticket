<?php
require_once '../Controller/FlightController.php';

use Controller\FlightController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode( '/', $uri );

if ((isset($uri[1]) && $uri[1] != 'search.php')) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
$action = str_replace('.php', '', $uri[1]).'Action';

$flightController = new FlightController();
$flightController->{$action}();