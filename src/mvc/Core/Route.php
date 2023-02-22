<?php

namespace mvc\Core;

use mvc\Controllers\ATOLController;
use mvc\Controllers\FermaController;
use mvc\Controllers\IndexController;
use mvc\Controllers\OrangeDataController;

class Route
{
    private array $routeMap = [
        'index'    => IndexController::class,
        'atol'     => ATOLController::class,
        'orangeData' => OrangeDataController::class,
        'ferma'  => FermaController::class,
    ];

    public function getClassName($controllerName): ?string {
        return $this->routeMap[$controllerName] ?? null;
    }
}