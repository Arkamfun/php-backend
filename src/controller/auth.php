<?php

use PHPUnit\Util\Json;

require_once "../model/auth.php";
require_once "../helper/jwt.php";
class HandlerAuth
{

    public static function handleLogin($email, $password)
    {

        $result = Auth::login($email, $password);
        if (!$result) {
            $result = json_encode(array("message" => "Login failed"));
        }

        $tokenValue = array($result["name"], $result["email"]);
        $token = JwtHelper::generateToken($tokenValue);
        return $token;
        // return json_encode(array("token" => $token));
    }

    public static function authenticate($token)
    {
        $result = JwtHelper::decodeToken($token);
        return json_encode($result);
    }
}
