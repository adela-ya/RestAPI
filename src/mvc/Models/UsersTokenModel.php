<?php

namespace mvc\Models;

use mvc\Core\BaseModel;
use PDO;

class UsersTokenModel extends BaseModel {
    public function generateToken($length = 30): string {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function addTokenToDb($userId): string {
        $token          = $this->generateToken();
        $data['userId'] = $userId;
        $data['token']  = $token;
        $data['status'] = 1;                            //статус "1" - активный, "0" - не активный
        $sql            = "INSERT INTO user_auth_token (user_id,token,status) VALUES (:userId, :token, :status)";
        $query          = $this->dbConnect->prepare($sql);
        $query->execute($data);
        return $token;
    }

    public function checkTokenInDb($userId) {
        $sql   = "SELECT * FROM user_auth_token WHERE user_id = :userId;)";
        $query = $this->dbConnect->prepare($sql);
        $query->bindValue('userId', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }
    public function getUserByTokenInDb($bearerToken) {
        $sql   = "SELECT * FROM user_auth_token WHERE token = :token;)";
        $query = $this->dbConnect->prepare($sql);
        $query->bindValue('token', $bearerToken);
        $query->execute();
        return $query->fetch();
    }
}