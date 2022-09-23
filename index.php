<?php
include "./Bootstrap/init.php";

use App\Core\Request;
use App\Core\Routing\Router;

$request = new Request();
$router = new Router($request);
$router->run();