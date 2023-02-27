<?php

namespace mvc\Controllers\Api;

use mvc\Core\BaseController;

class OrangeDataController extends BaseController {
    public function orangeDataAction() {
        $check  = $this->createCheck();
        $status = $this->getStatus();;
        return $this->output('OrangeData/orangeData');

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