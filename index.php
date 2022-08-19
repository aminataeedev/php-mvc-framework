<?php
require "./Bootstrap/init.php";

use App\Utilities\Url;

new App\Core\Request();

$router = new \App\Router\Router();
include $router->run();