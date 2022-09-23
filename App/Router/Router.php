<?php

namespace App\Router;

use App\Utilities\Url;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = [
            '/' => 'views/home/index.php',
            '/colors/blue' => 'views/colors/blue.php',
            '/colors/green' => 'views/colors/green.php',
            '/colors/red' => 'views/colors/red.php',
        ];
    }

    public function run()
    {
        $url = Url::current_url();
        self::render(array_key_exists($url, $this->routes) ? BASE_PATH . $this->routes[$url] : null);
    }

    public function render($route): void
    {
        if ($route) {
            include $route;
            die();
        } else include BASE_PATH . 'views/404.php';
    }
}