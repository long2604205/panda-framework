<?php
use PandaCore\Core\Routes\Router;
use App\Http\Controllers\HomeController;

$router = new Router();
$router->get('/user', [HomeController::class, 'index']);
return $router;
