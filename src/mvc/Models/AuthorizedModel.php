<?php


use mvc\Core\BaseModel;

class AuthorizedModel extends BaseModel
{

    public function checkInDb($data)
    {
        $dataPassword = $data['password'];
        unset($data['password']);

        $sql = "SELECT * FROM users WHERE name = :name;)";
        $query = $this->dbConnect->prepare($sql);
        $query->execute($data);
        $result = $query->fetch();
        if ($result["name"] != $data['name'] or $result["password"] != $data['password']) {
            return false;
        } else {
            return true;
        }

    }

}