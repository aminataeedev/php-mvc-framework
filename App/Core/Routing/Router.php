<?php

namespace App\Core\Routing;

use App\Core\Request;
use App\Utilities\Url;


class Router
{
    private $request;
    private $routes;
    private $current_route;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request);
        // run middlewares
        $this->run_route_middlewares();
    }

    public function findRoute()
    {
        foreach ($this->routes as $route) {
            if (in_array(strtolower($this->request->method()), $route['methods']) and $this->request->uri() === $route['uri']) {
                return $route;
            }
        }
        return null;
    }

    private function run_route_middlewares()
    {
        if ($this->current_route) {
            $middlewares = $this->current_route['middlewares'];
            foreach ($middlewares as $middleware) {
                $middleware_obj = new $middleware;
                $middleware_obj->handle();
            }
        }
    }

    public function run()
    {
        // route not found
        if (!$this->current_route) {
            $this->notFound();
            die();
        }
        // invalid request method
        if (!$this->isValidRequestMethod()) $this->methodNotSupported();


        $this->dispatch();

    }

    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        view('errors.404');
    }

    public function isValidRequestMethod(): bool
    {
        return $this->current_route && in_array(strtolower($this->request->method()), $this->current_route['methods']);
    }

    public function methodNotSupported()
    {
        header('HTTP/1.0 404 Method not supported');
        $this->request->redirect('/405');
    }

    private function dispatch()
    {
        if (empty($this->current_route)) return null;
        $action = $this->current_route['action'];
        if (is_callable($action)) {
            $action();
            return;
        }
        if (is_string($action)) {
            $action = explode('@', $action);
        }

        if (is_array($action)) {
            $class_name = Url::getBaseController() . $action[0];
            if (!class_exists($class_name)) throw new \Exception("class $class_name does not exists");
            $method = $action[1];
            $controller = new $class_name();
            if (!method_exists($controller, $method)) {
                throw new \Exception("Method $method does not exists in $class_name");
            }
            $controller->{$method}();
        }
    }

}