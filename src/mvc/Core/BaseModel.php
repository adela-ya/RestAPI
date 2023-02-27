<?php

namespace mvc\Core;


use mvc\Models\DbConnect;

class BaseModel {
    protected ?\PDO $dbConnect = null;

    public function __construct() {
        $this->dbConnect = DbConnect::getConnect();
    }
}