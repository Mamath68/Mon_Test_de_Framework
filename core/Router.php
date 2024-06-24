<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('home', new Route('/', [
    '_controller' => 'App\Controllers\HomeController::index',
]));

$routes->add('about', new Route('/about', [
    '_controller' => 'App\Controllers\HomeController::about',
]));

$routes->add('contact', new Route('/contact', [
    '_controller' => 'App\Controllers\HomeController::contact',
]));

$routes->add('cards', new Route('/cards/{page}', [
    '_controller' => 'App\Controllers\CardsController::index',
    'page' => 1,
]));

$routes->add('card_show', new Route('/card/{id}', [
    '_controller' => 'App\Controllers\CardsController::show',
]));

$routes->add('card_show_archetype', new Route('/cards/archetype/{archetype}/page/{page}', [
    '_controller' => 'App\Controllers\CardsController::archetype',
]));


$routes->add('loginForm', new Route('/loginForm', [
    '_controller' => 'App\Controllers\SecurityController::loginForm',
]));

$routes->add('login', new Route('/login', [
    '_controller' => 'App\Controllers\SecurityController::login',
]));
$routes->add('registerForm', new Route('/registerForm', [
    '_controller' => 'App\Controllers\SecurityController::registerForm',
]));

$routes->add('register', new Route('/register', [
    '_controller' => 'App\Controllers\SecurityController::register',
]));

$routes->add('logout', new Route('/logout', [
    '_controller' => 'App\Controllers\SecurityController::logout',
]));


return $routes;

