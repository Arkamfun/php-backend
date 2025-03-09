<?php



require_once './config/db.php';


class UserModel
{
    public static function getAll()
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($name, $email, $password, $role)
    {
        global $pdo;

        try {
            $stmt = $pdo->prepare("INSERT INTO user (name, email, password, role) VALUES (:name, :email, :password , :role)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->execute();

            return $pdo->lastInsertId();
        } catch (PDOException $th) {
            die("Error: " . $th->getMessage());
        }
    }

    public static function deleteUser($id)
    {
        global $pdo;

        $stmt = $pdo->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
