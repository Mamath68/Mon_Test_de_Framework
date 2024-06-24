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

$router->add('/', [new HomeController(), 'index']);
$router->add('/about', [new HomeController(), 'about']);
$router->add('/contact', [new HomeController(), 'contact']);
$router->add('/registerForm', [new SecurityController(), 'registerForm']);
$router->add('/register', [new SecurityController(), 'register']);
$router->add('/loginForm', [new SecurityController(), 'loginForm']);
$router->add('/login', [new SecurityController(), 'login']);
$router->add('/logout', [new SecurityController(), 'logout']);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
