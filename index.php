<?php

require_once __DIR__ . '/vendor/autoload.php';

use NextPHP\Rest\DI\Container;
use NextPHP\Rest\Router;
use NextPHP\Rest\Http\Request;
use NextPHP\Rest\Http\Response;
use NextPHP\App\Resource\UserResource;
use NextPHP\App\Resource\PostResource;

$container = new Container();

$router = new Router([
    'baseUri' => '/nextphp',
    'allowedOrigins' => [
        'http://allowed-origin.com' => ['GET', 'POST'],
        'http://another-allowed-origin.com' => ['GET', 'PUT'],
        '*' => ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS', 'HEAD', 'TRACE', 'CONNECT', 'PRI']
    ]
], $container);

// Register routes from controllers using class names
$router->registerRoutesFromController(UserResource::class);
$router->registerRoutesFromController(PostResource::class);

// URI ve istek verilerini al
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Kendi oluşturduğunuz Request ve Response nesneleri
$request = new Request($method, $uri, getallheaders(), file_get_contents('php://input'), $_GET, $_POST);
$response = new Response();

// Yönlendirme işlemini başlat
$response = $router->dispatch($request, $response);

// Yanıtı gönder
if ($response) {
    http_response_code($response->getStatusCode());
    foreach ($response->getHeaders() as $name => $value) {
        header("$name: $value");
    }
    echo $response->getBody();
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Internal Server Error', 'message' => 'No response returned.']);
}