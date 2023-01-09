<?php

class Users extends Connection
{
    public $err_msg;

    public function register($data)
    {
        if ($this->isExist($data["email"])) {
            $this->err_msg = "User with this email is exist!";
            return false;
        } else {
            $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (first_name,email,last_name,password, gender, role)
                VALUES (:first_name,:email,:last_name,:password, :gender, :role)";
            $query = $this->db->prepare($sql);

            $query->execute($data);
            if ($query->rowCount() === 1) {
                return true;
            } else {
                $this->err_msg = "User not register!";
                return false;
            }
        }
    }

    private function isExist($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->db->prepare($sql);
        $query->execute(["email" => $email]);
        if ($query->rowCount() === 1) {
            return true;
        }
        return false;
    }
}

$Users = new Users(config);