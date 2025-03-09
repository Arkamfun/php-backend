<?php

use PHPUnit\Framework\TestCase;

require_once "./model/auth.php";
require_once "./model/model-user.php";
class LoginRepositoryTest extends TestCase
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

    public function testLoginUser()
    {
        // $this->userRepo->create('John Doe', 'O5d0w@example.com', 'password123', 'admin');

        $user = Auth::login('O5d0w@example.com', 'password123');
        $this->assertEquals('John Doe', $user['name']);
    }

    public function testInvalidLoginUser()
    {
        $user = Auth::login('O5d0w@example.com', 'wrongpassword');
        $this->assertFalse($user);
    }
}
