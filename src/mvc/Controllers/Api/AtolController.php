<?php

namespace mvc\Controllers\Api;


use mvc\Core\BaseController;


class AtolController extends BaseController {
    public function atolAction() {
        $check  = $this->createCheck();
        $status = $this->getStatus();
        return $this->output('Atol/atol');

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