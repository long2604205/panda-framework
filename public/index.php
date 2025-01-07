<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PandaCore\Core\Http\Response\JsonResponse;
use PandaCore\Helpers\EnvLoader;
use PandaCore\Core\Controllers\Controller;
use PandaCore\Core\Http\Request\Request;

try {
    EnvLoader::class::load(dirname(__DIR__) . '/.env');
} catch (Exception $e) {
    echo $e->getMessage();
}
$request = new Request($_SERVER, $_GET, $_POST, $_FILES, $_COOKIE);

$router = include '../routes/api.php';
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
try {
    $router->resolve($method, $uri, $request);
} catch (Exception $e) {
    $baseController = new Controller();
    JsonResponse::success(['error' => $e->getMessage()], $e->getCode());
}