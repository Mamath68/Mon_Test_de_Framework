<?php


define('VIEW_DIR', "../views/"); //le chemin où se trouvent les vues

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Session;

Session::start();

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;
use App\Controllers\CardsController;
use App\Services\CardsService;
use App\Services\TwigService;

// Instanciation des services nécessaires
$httpClient = HttpClient::create();
$cardsService = new CardsService($httpClient);
$twigService = new TwigService(); // Assurez-vous que ce service est correctement implémenté

// Routes
$routes = include __DIR__ . '/../core/Router.php';

$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->match($context->getPathInfo());

    $controllerAction = explode('::', $parameters['_controller']);
    $controllerName = $controllerAction[0];
    $controllerMethod = $controllerAction[1];

    unset($parameters['_controller']);
    $parameters = array_values($parameters);

    $response = call_user_func_array([$controller, $controllerMethod], $parameters);
    $response->send();
} catch (ResourceNotFoundException $e) {
    $response = new Response('Page not found', 404);
    $response->send();
} catch (\Exception $e) {
    $response = new Response('An error occurred: ' . $e->getMessage(), 500);
    $response->send();
}