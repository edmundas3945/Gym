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
        $this->db->query("INSERT INTO feedback (`name`, `comment`) VALUES (:name, :comment)");
    
        $this->db->bind(':name', $_SESSION['user_name']);
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