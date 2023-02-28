<?php

namespace mvc\Api;

use mvc\Core\BaseController;
use mvc\Models\UsersModel;
use mvc\Models\UsersTokenModel;

class ApiBaseController extends BaseController {
    public function response(array $data = [], array $statusReceipt = []): JsonResponse {
        return new JsonResponse([
                                    'status' => true,
                                    'receipt'   => $data,
                                    'statusReceipt'   => $statusReceipt
                                ]);
    }

    public function responseError(array $errors = []): JsonResponse {
        return new JsonResponse([
                                    'status' => false,
                                    'errors' => $errors
                                ]);
    }

    public function getBearerToken(): ?string {
        $headersData = ($this->getRequest()->headers());
        if (isset($headersData['Authorization']) && !empty($headersData['Authorization'])) {
            $header = $headersData['Authorization'];
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    public function getUserByToken() {
        $bearerToken = $this->getBearerToken();
        $tokenModel  = new UsersTokenModel();
        $userByToken = $tokenModel->getUserByTokenInDb($bearerToken);
        if (!empty($userByToken)) {
            $usersModel = new UsersModel();
            return $usersModel->checkById($userByToken['user_id']);
        }
        return null;
    }

}
