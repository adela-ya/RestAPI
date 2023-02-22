<?php

namespace mvc\Controllers;

use mvc\Core\BaseController;


class FermaController extends BaseController
{
    public function fermaAction()
    {
        $check = $this->createCheck();
        $status = $this->getStatus();
        return $this->output('Ferma/ferma');
    }


}