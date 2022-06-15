<?php

namespace App\models;

use App\core\Model;
use PDO;
use PDOException;

class Model_Result extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_User();
    }

    public function saveAmount($user_id, $country_id, $weapon_id, $amount)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO results (`user_id`, `country_id`, `weapon_id`, `amount`) VALUES (:user_id, :country_id, :weapon_id, :amount)");
            $stmt->execute(['user_id' => $user_id, 'country_id' => $country_id, 'weapon_id' => $weapon_id, 'amount' => $amount]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getResultToTheTable($user_id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT
            results.id,
            results.user_id,
            results.amount,
            countries.`name` as `country_name`,
            weapons.`name` as `weapon_name`
        FROM
            results
            LEFT JOIN countries ON results.country_id = countries.id
            LEFT JOIN weapons ON results.weapon_id = weapons.id
        WHERE
            results.user_id = :user_id;");
            $stmt->execute(['user_id' => $user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    function getTotalAmount($user_id)
    {
        $stmt = $this->conn->prepare("SELECT SUM(amount) as total_amount FROM results WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_amount'];
    }

}
