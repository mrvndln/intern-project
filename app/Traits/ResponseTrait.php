<?php

namespace App\Traits;

trait ResponseTrait
{
    public function response($code, $message, $result)
    {
        return [
            'code' => $code,
            'message' => $message,
            'result' => $result,
        ];
    }

    public function responseAPI($code, $message, $result)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'result' => $result,
        ], $code);
    }
}