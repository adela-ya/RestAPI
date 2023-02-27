<?php

namespace mvc\Controllers;

use mvc\Core\BaseController;
use mvc\Core\HtmlResponse;

class IndexController extends BaseController {
    public function indexAction(): HtmlResponse {
        return $this->render('Index/main', [
            'name' => "Adela"
        ]);
    }
}