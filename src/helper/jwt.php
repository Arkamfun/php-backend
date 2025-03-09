<?php
require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper
{
    private static $sec_key = 'secret_key';

    public static function generateToken($data)
    {
        $token = JWT::encode($data, self::$sec_key, 'HS256');
        return $token;
    }


    public static function decodeToken($token)
    {
        $decoded = JWT::decode($token, new Key(self::$sec_key, 'HS256'));
        return $decoded;
    }
}
