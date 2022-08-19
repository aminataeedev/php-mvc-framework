<?php

namespace App\Router;

use App\Utilities\Url;
use App\Utilities\Str;

class Router
{
    private $routes;
    public function __construct()
    {
        $this->routes = [
            '/colors/blue'=> 'views/colors/blue.php',
            '/colors/green'=> 'views/colors/green.php',
            '/colors/red'=> 'views/colors/red.php',
        ];
    }
    public function run() {
        $url = Url::current_url();
        return $this->routes[$url] ?? null;
    }
}