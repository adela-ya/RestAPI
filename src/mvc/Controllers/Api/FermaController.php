<?php

namespace mvc\Controllers\Api;

use mvc\Core\BaseController;


class FermaController extends BaseController {
    public function fermaAction() {
        $check  = $this->createCheck();
        $status = $this->getStatus();
        return $this->output('Ferma/ferma');
    }


    public function createCheck() {
        $check = "createCheck";
        return $check;
    }


    public function getStatus() {
        $status = "getStatus";
        return $status;

    }
}
