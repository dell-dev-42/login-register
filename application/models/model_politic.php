<?php

class Model_Politic extends Model
{
    public function getData()
    {
        $stmt = $this->conn->prepare("SELECT * FROM politics;");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}