<?php

namespace mvc\Controllers;

use mvc\Api\ApiBaseController;
use mvc\Api\JsonResponse;
use mvc\Core\HtmlResponse;

class IndexController extends ApiBaseController {
    public function indexAction(): JsonResponse|HtmlResponse {
        $bearerToken = $this->getUserByToken();

        if ($bearerToken !== null) {
            return $this->render('Index/main', [
                'name' => "Adela"
            ]);
        }

        $errors["code"] = '401';
        $errors["message"] = 'Unauthorized!';
        return $this->responseError($errors);
    }
}