<?php

namespace mvc\Models;

use mvc\Core\BaseModel;

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

}