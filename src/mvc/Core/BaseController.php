<?php

namespace mvc\Core;

class BaseController
{
    private string $defaultController = 'index';

    private string $defaultAction = 'index';


    public function processRequest(): void
    {
        $requestUriParams = explode('/', $_SERVER['REQUEST_URI']);

        $controllerName = $this->defaultController;
        if (!empty($requestUriParams[1])) {
            $controllerName = $requestUriParams[1];
        }

        $actionName = $this->defaultAction;
        if (!empty($requestUriParams[2])) {
            $actionName = $requestUriParams[2];
        }

        $route = new Route();
        $className = $route->getClassName($controllerName);
        if (!$className) {
            $this->page404();
        }

        $controller = new $className;
        $method = $actionName . 'Action';

        if (!method_exists($controller, $method)) {
            $this->page404();
        }

        /** @var BaseView $view */
        $view = $controller->$method();
        $view->render();
    }

    public
    function output(string $layout, array $data = []): BaseView
    {
        return new BaseView($layout, $data);
    }

    public
    function page404(): void
    {
        (new BaseView('Errors/404'))->render();
        exit();
    }

    public function createCheck()
    {
        $check =  "createCheck";
        return $check;
    }


    public function getStatus()
    {
        $status = "getStatus";
        return $status;

    }
}