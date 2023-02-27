<?php

namespace mvc\Controllers\Api;

use mvc\Api\ApiBaseController;
use mvc\Api\CheckToken;

class OrangeDataController extends ApiBaseController {
    public function orangeDataAction() {
        $checkToken  = new CheckToken();
        $bearerToken = $checkToken->getUserByToken();
        if ($bearerToken !== null) {
            $check  = $this->createCheck();
            $status = $this->getStatus();
            return $this->response();
        }
        $errors["status"] = '401 Unauthorized!';
        return $this->responseError($errors);

    }

    public function createCheck() {
        $check = "createCheck";
        return $check;
    }


    public function getStatus() {
        $status = "getStatus";
        return $status;

    }
}