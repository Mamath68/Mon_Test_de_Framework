<?php
// core/Router.php

namespace Core;

class Router
{
    private $routes = [];

    public function add($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    public function dispatch($url)
    {
        foreach ($this->routes as $route => $callback) {
            if ($route === $url) {
                return call_user_func($callback);
            }
        }
        // 404 Not Found
        http_response_code(404);
        echo "404 Not Found";
    }
}
