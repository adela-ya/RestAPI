<?php

namespace mvc\Controllers;

use mvc\Core\BaseController;

class OrangeDataController extends BaseController
{
    public function orangeDataAction() {
        $check = $this->createCheck();
        $status = $this->getStatus();;
        return $this->output('OrangeData/orangeData');

    }
}