<?php

namespace App\Traits;

trait ResponseTrait {

    public function response($status = 404, $message = '', $data = []) {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
}
