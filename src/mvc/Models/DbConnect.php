<?php

namespace mvc\Models;

use Exception;
use PDO;

class DbConnect {
    private static ?PDO $dbConn = null;

    public static function getConnect(): PDO {
        if (!self::$dbConn) {
            try {
                $db_host     = "db";
                $db_user     = "user";
                $db_password = "pass";
                $db_base     = "database";

                $dsn          = "mysql:host=$db_host;dbname=$db_base;";
                self::$dbConn = new PDO($dsn, $db_user, $db_password);
            } catch (Exception $ex) {
                echo "Не удалось соединиться с базой: " . $ex->getMessage();
                die;
            }
        }
        return self::$dbConn;
    }
}