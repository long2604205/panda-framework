<?php
namespace App\Http\Middleware;

use PandaCore\Core\Middleware\MiddlewareInterface;

abstract class Middleware implements MiddlewareInterface {
    abstract public function handle($request, $next);
}