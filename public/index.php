<?php
define('BASE_STYLE', __DIR__ . '/');

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use App\Controllers\HomeController;
use Core\Session;

Session::start();

$router = new Router();

$router->add('/', [new HomeController(), 'index']);
$router->add('/about', [new HomeController(), 'about']);
$router->add('/contact', [new HomeController(), 'contact']);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
