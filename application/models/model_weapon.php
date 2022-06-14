<?php

class Model_Weapon extends Model
{
    public function getData($countryId = 1)
    {
        $stmt = $this->conn->prepare("SELECT * FROM weapons;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function saveNewWeapon($userId, $weapon)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO weapons (`user_id`, `name`) VALUES (:user_id, :name);");
            $stmt->execute(['user_id' => $userId, 'name' => $weapon]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}