<?php

namespace Core;

class Router
{
    private $routes = [];

    public function add($route, $callback)
    {
        $route = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
        $this->routes['#^' . $route . '$#'] = $callback;
    }

    public function dispatch($url)
    {
        foreach ($this->routes as $route => $callback) {
            if (preg_match($route, $url, $matches)) {
                array_shift($matches); // Remove the full match
                return call_user_func_array($callback, $matches);
            }
        }
        // 404 Not Found
        http_response_code(404);
        echo "404 Not Found";
    }
}
