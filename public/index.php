<?php


define('VIEW_DIR', "../views/"); //le chemin où se trouvent les vues
define('BASE_DIR', "../");

require_once BASE_DIR . 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\SecurityController;
use Core\Router;
use Core\Session;

Session::start();

$router = new Router();

$homeController = new HomeController();
$securityController = new SecurityController();

$router->add('/', [$homeController, 'index']);
$router->add('/about', [$homeController, 'about']);
$router->add('/contact', [$homeController, 'contact']);
$router->add('/registerForm', [$securityController, 'registerForm']);
$router->add('/register', [$securityController, 'register']);
$router->add('/loginForm', [$securityController, 'loginForm']);
$router->add('/login', [$securityController, 'login']);
$router->add('/logout', [$securityController, 'logout']);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
