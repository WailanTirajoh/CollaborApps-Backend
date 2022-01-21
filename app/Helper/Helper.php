<?php

namespace App\Helper;

class Helper
{
    public static function apiResponse($status = "failed", $message = "", $data = [])
    {
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data,
        ];
    }
}
