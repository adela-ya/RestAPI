<?php

namespace mvc\Controllers;

use mvc\Core\BaseController;
use mvc\Core\BaseView;

class IndexController extends BaseController
{
    public function indexAction(): BaseView {


        // $this->page404();

        return $this->output('Index/main');
    }
}