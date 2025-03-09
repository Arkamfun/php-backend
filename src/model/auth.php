<?php

require_once "./config/db.php";

class Auth
{
    public static function login($email, $password)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
