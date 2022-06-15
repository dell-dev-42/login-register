<?php

namespace App\models;

use App\core\Model;
use PDO;
use PDOException;

class Model_Comment extends Model
{
    public function saveNewComment($politic_id, $comment, $parent_id = 0)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO comments (`parent_id`, `politic_id`, `comment`) VALUES (:parent_id, :politic_id, :comment);");
            $stmt->execute(['parent_id' => $parent_id, 'politic_id' => $politic_id, 'comment' => $comment]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getParentComments($parent_id = 0)
    {
        try {
            $stmt = $this->conn->prepare("SELECT
            comments.id,
            comments.politic_id,
            comments.comment,
            politics.`name` as `politic_name`
            FROM
            comments
            LEFT JOIN politics ON comments.politic_id = politics.id
            WHERE
            comments.parent_id = :parent_id");

            $stmt->execute(['parent_id' => $parent_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}

