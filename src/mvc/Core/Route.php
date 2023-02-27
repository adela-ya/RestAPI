<?php

namespace mvc\Core;

use mvc\Controllers\Api\AtolController;
use mvc\Controllers\Api\AuthController;
use mvc\Controllers\Api\FermaController;
use mvc\Controllers\Api\OrangeDataController;
use mvc\Controllers\IndexController;

class Route {
    private array $routeMap = [
        'api-auth'   => AuthController::class,
        'index'      => IndexController::class,
        'atol'       => AtolController::class,
        'orangeData' => OrangeDataController::class,
        'ferma'      => FermaController::class,
    ];

    public function getClassName($controllerName): ?string {
        return $this->routeMap[$controllerName] ?? null;
    }
}