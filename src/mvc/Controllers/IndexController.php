<?php

namespace mvc\Controllers;

use mvc\Api\ApiBaseController;
use mvc\Api\CheckToken;
use mvc\Core\BaseController;
use mvc\Core\HtmlResponse;

class IndexController extends ApiBaseController {
    public function indexAction() {
        $checkToken  = new CheckToken();
        $bearerToken = $checkToken->getUserByToken();
        if ($bearerToken !== null) {
            return $this->render('Index/main', [
                'name' => "Adela"
            ]);
        }
        $errors["status"] ='401 Unauthorized!';
        return $this->responseError($errors);
    }
}