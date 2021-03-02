<?php 

namespace app\model;

use app\core\Application;
use app\core\Database;

class FeedbackModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = Application::$app->db;
    }

    public function createComment($data)
    {
        $this->db->query("INSERT INTO feedback (`commentator`, `comment`) VALUES (:commentator, :comment)");
    
        $this->db->bind(':commentator', $data['name']);
        $this->db->bind(':comment', $data['comment']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getFeedback()
    {
        $this->db->query("SELECT * FROM feedback");

        $result = $this->db->resultSet();

        return $result;
    }

    public function removeFeedback($id)
    {
        $this->db->query("DELETE FROM posts WHERE id = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}