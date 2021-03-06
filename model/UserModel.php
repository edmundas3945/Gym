<?php


namespace app\model;


use app\core\Application;
use app\core\Database;

class UserModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = Application::$app->db;
    }

    // finds user by given email
    // @return Boolean
    public function findUserByEmail($email)
    {

        $this->db->query("SELECT * FROM users WHERE `email` = :email");

        $this->db->bind(':email', $email);

        $this->db->singleRow();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // Register user with given sanitized data
    // @return Boolean
    public function register($data)
    {
        // prepare statment
        $this->db->query("INSERT INTO users (`name`, `surname`, `email`, `password`, `phone`, `address`) VALUES (:name, :surname, :email, :password, :phone, :address)");

        // add values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':email', $data['email']);
        // hasshed
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);

        // make query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $notHashedPass)
    {
        // get the row whith given email
        $this->db->query("SELECT * FROM users WHERE `email` = :email");

        $this->db->bind(':email', $email);

        $row = $this->db->singleRow();

        if ($row) {
            $hashedPassword = $row->password;
        } else {
            return false;
        }

        // check password
        if (password_verify($notHashedPass, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

   
}