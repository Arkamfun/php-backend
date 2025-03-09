<?php

require_once "../model/model-user.php";

class HandleUser
{

    public static function handleGetAll()
    {
        $getAllUser = UserModel::getAll();
        return $getAllUser;
    }

    public static function handleGetById($id)
    {
        $result = UserModel::getById($id);
        return $result;
    }

    public static function handleCreateUser($user)
    {
        try {
            $result = UserModel::create($user['name'], $user['email'], $user['password'], $user['role']);
            return "User created successfully with ID: " . $result;
        } catch (Exception $th) {
            die("Error: " . $th->getMessage());
        }
    }

    public static function handleDeleteUser($id)
    {
        $result = UserModel::deleteUser($id);
        return "User deleted successfully with ID: " . $result;
    }
}
