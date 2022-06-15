<?php

namespace App\models;

use App\core\Model;
use PDO;
use PDOException;

class Model_Country extends Model
{
    public function getData()
    {
        $stmt = $this->conn->prepare("SELECT * FROM countries;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function saveNewCountry($userId, $country)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO countries (`user_id`, `name`) VALUES (:user_id, :name);");
            $stmt->execute(['user_id' => $userId, 'name' => $country]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
