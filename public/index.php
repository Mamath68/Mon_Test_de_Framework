<?php


define('VIEW_DIR', "views/"); //le chemin où se trouvent les vues
define('PUBLIC_DIR', "../"); //le chemin où se trouvent les fichiers    publics (CSS, JS, IMG)

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\CardController;
use Core\Router;
use Core\Session;
use App\Controllers\SecurityController;
use App\Controllers\HomeController;

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
$router->add('/cards', [new CardController(), 'index']);
$router->add('/card/{id}', [new CardController(), 'show']);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
