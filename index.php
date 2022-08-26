<?php
require "./Bootstrap/init.php";

use App\Core\Request;

$request = new Request();
//$router = new Router();
//$router->run();

print_r($request->age);