<?php

namespace mvc\Core;

use mvc\Controllers\Api\AuthController;
use mvc\Controllers\IndexController;

class Route {
    private array $routeMap = [
        'api-auth' => AuthController::class,
        'index'    => IndexController::class,
    ];

    public function getClassName($controllerName): ?string {
        return $this->routeMap[$controllerName] ?? null;
    }
}