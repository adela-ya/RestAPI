<?php

namespace mvc\Models;

use mvc\Core\BaseModel;
use PDO;

class UsersModel extends BaseModel {

    public function checkInDb($data) {
        $sql   = "SELECT * FROM users WHERE login = :login AND password_hash = :password;)";
        $query = $this->dbConnect->prepare($sql);
        $query->execute($data);
        $result = $query->fetch();
        if ($result) {
            return ($result["login"] === $data['login'] or $result["password_hash"] === $data['password']) ? $result["id"] : null;
        }
        return null;
    }

    public function checkById($userId) {
        $sql   = "SELECT * FROM users WHERE id = :userId;)";
        $query = $this->dbConnect->prepare($sql);
        $query->bindValue('userId', $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }

}