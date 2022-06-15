<?php

namespace App\models;

use App\core\Model;
use PDO;
use PDOException;

class Model_User extends Model
{
    public function saveUser($email, $password)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users (`email`, `password`) VALUES (:email, :password);");
            $stmt->execute(['email' => $email, 'password' => $password]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function checkUser($email, $password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
            $stmt->execute(['email' => $email, 'password' => $password]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getUserByEmail($email)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=:email");
            $stmt->execute(['email' => $email]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
