<?php
require_once './model/model-user.php';

use PHPUnit\Framework\TestCase;

class UserRepoTest extends TestCase
{
    private $pdo;
    private $userRepo;

    protected function setUp(): void
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->pdo->exec('
        CREATE TABLE users ( id INTEGER PRIMARY KEY, name VARCHAR(255), email VARCHAR(255) UNIQUE, password VARCHAR(255), role TEXT CHECK(role IN ("admin", "user")) DEFAULT "user");
        ');

        $this->userRepo = new UserModel($this->pdo);
    }

    public function testCreateUser()
    {
        $result = $this->userRepo->create('John Doe', 'johndoe3@gmail.com', 'password123', 'admin');

        $this->assertIsString($result);

        $user = $this->userRepo->getById(1);
        $this->assertNotNull($user);
    }

    public function testGetUserById()
    {
        $user = $this->userRepo->getById(1);
        $this->assertNotNull($user);
    }

    public function testGetAllUsers()
    {
        $users = $this->userRepo->getAll();
        $this->assertIsArray($users);
    }

    public function testDeleteUser()
    {
        $userId = $this->userRepo->create('Test User', 'test@example.com', 'password123', 'user');
        $deleted = $this->userRepo->deleteUser($userId);
        $this->assertTrue($deleted);
    }
}
