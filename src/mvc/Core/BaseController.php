<?php

namespace mvc\Core;


class BaseController {
    private ?RequestData $request = null;

    private string $defaultController = 'index';

    private string $defaultAction = 'index';

    public function processRequest(): void {
        $requestUriParams = explode('?', $_SERVER['REQUEST_URI']);
        $requestUriParams = explode('/', $requestUriParams[0]);

        $controllerName = $this->defaultController;
        if (!empty($requestUriParams[1])) {
            $controllerName = $requestUriParams[1];
        }

        $actionName = $this->defaultAction;
        if (!empty($requestUriParams[2])) {
            $actionName = $requestUriParams[2];
        }

        $route     = new Route();
        $className = $route->getClassName($controllerName);

        if (!$className) {
            $this->page404();
        }

        $controller = new $className;
        $method     = $actionName . 'Action';

        if (!method_exists($controller, $method)) {
            $this->page404();
        }

        /** @var BaseResponse $response */
        $response = $controller->$method();
        $response->send();
    }

    public function getRequest(): RequestData {
        if (!$this->request) {
            $this->request = new RequestData(
                $_GET,
                $_POST,
                getallheaders(),
                $_SERVER,
                file_get_contents('php://input')
            );
        }

        return $this->request;
    }

    public function render(string $layout, array $data = []): HtmlResponse {
        return new HtmlResponse($layout, $data);
    }

    public function page404(): void {
        (new HtmlResponse('Errors/404'))->send();
        exit();
    }
}
