<?php


use mvc\Core\BaseController;

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';

    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
});


$baseController = new BaseController();
$baseController->processRequest();


