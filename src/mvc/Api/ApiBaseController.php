<?php

namespace mvc\Api;

use mvc\Core\BaseController;

class ApiBaseController extends BaseController {
    public function response(array $data = []): JsonResponse {
        return new JsonResponse([
                                    'status' => true,
                                    'data'   => $data
                                ]);
    }

    public function responseError(array $errors = []): JsonResponse {
        return new JsonResponse([
                                    'status' => false,
                                    'errors' => $errors
                                ]);
    }

}
