<?php

namespace mvc\Controllers;



use mvc\Core\BaseController;


class ATOLController extends BaseController
{
    public function atolAction()
    {
        $check = $this->createCheck();
        $status = $this->getStatus();
        return $this->output('ATOL/atol');

    }

}