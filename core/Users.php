<?php

class Users extends Connection
{
    public $err_msg;

    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function isLogged()
    {
        return isset($_SESSION["id"]);
    }

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
            return $query->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function login(array $data)
    {
        $user = $this->isExist($data["email"]);
        if ($user) {
            if (password_verify($data["password"], $user->password)) {
                $_SESSION["id"] = $user->id;
                return true;
            } else {
                $this->err_msg = "Wrong email and password";

                return false;
            }
        }
    }

    public function changeGender($id, $gender)
    {
        $sql = "UPDATE users SET 
                 gender = :gender,
                 update_at = NOW()
                WHERE id = :id
                 ";
        $query = $this->db->prepare($sql);
        $query->execute([
            "id" => $id,
            "gender" => $gender
        ]);
        if ($query->rowCount() === 1) {
            return true;
        } else {
            return false;
        }
    }
}

$Users = new Users(config);