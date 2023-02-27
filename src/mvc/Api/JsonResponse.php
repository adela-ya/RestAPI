<?php

namespace mvc\Api;

use mvc\Core\BaseResponse;

class JsonResponse extends BaseResponse {
    private array $data;

    public function __construct(array $data = []) {
        $this->data = $data;
    }

    public function send(): void {
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($this->data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
