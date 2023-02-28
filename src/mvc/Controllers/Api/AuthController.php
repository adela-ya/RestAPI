<?php

namespace mvc\Controllers\Api;


use mvc\Api\ApiBaseController;
use mvc\Api\JsonResponse;
use mvc\Models\UsersModel;
use mvc\Models\UsersTokenModel;

class AuthController extends ApiBaseController {
    public function loginAction(): JsonResponse {
        $postData = $this->getRequest()->post();

        $usersModel = new UsersModel();
        $userId     = $usersModel->checkInDb($postData);
        if ($userId !== null) {
            $usersTokenModel = new UsersTokenModel();
            $getToken        = $usersTokenModel->checkTokenInDb($userId);

            if (!$getToken) {
                $postData['token'] = $usersTokenModel->addTokenToDb($userId);
            } else {
                $postData['token'] = $getToken['token'];
            }
            return $this->response($postData);
        }
        $errors["code"] = '403';
        $errors["message"] = 'Неверный логин или пароль';
        return $this->responseError($errors);
    }
}
