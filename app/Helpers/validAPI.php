<?php
namespace App\Helpers;

class validAPI {
    protected static $response = [
        "token" => null
    ];

    public static function createAPI($token = null) {
        self::$response["token"] = $token;

        return response()->json(self::$response);
    }
}
?>