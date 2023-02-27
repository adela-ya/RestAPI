<?php

namespace mvc\Api;

use mvc\Models\UsersModel;
use mvc\Models\UsersTokenModel;

class CheckToken {
    public function getAuthorizationHeader(): ?string {
        $headers = null;
        if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        }
        return $headers;
    }

    public function getBearerToken(): ?string {
        $headers = $this->getAuthorizationHeader();

        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    public function getUserByToken() {
        $bearerToken = $this->getBearerToken();
        $tokenModel  = new UsersTokenModel();
        $userByToken    = $tokenModel->getUserByToken($bearerToken);
        if (!empty($userByToken)) {
            $usersModel = new UsersModel();
            return $usersModel->checkById($userByToken['user_id']);
        }
        return null;
    }
}