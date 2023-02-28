<?php

namespace mvc\Controllers\Api;


use mvc\Api\ApiBaseController;
use mvc\Api\JsonResponse;

class AtolController extends ApiBaseController {
    public function atolAction(): JsonResponse {
        $bearerToken = $this->getUserByToken();

        if ($bearerToken !== null) {
            $receipt  = $this->createReceipt();
            $status = $this->getStatus();
            return $this->response($receipt,$status);
        }
        $errors["code"]    = '401';
        $errors["message"] = 'Unauthorized!';
        return $this->responseError($errors);
    }

    public function createReceipt() {
        return [
            "receipt" => [
                "id"                       => 541793,
                "status"                   => "final",
                "archived"                 => true,
                "type"                     => "Invoice",
                "sequence_number"          => "28/A",
                "inverted_sequence_number" => "A/28",
                "atcud"                    => "ABCD1234-28",
                "date"                     => "27/06/2017",
                "reference"                => "foo",
                "saft_hash"                => "Tdik",
                "sum"                      => 1,
                "discount"                 => 0,
                "before_taxes"             => 1,
                "taxes"                    => 0.07,
                "total"                    => 1.07,
                "sequence_id"              => "12345",
                "tax_exemption"            => "M01"
            ]
        ];
    }


    public function getStatus() {
        return [
            "status " => 200
            ];

    }

}