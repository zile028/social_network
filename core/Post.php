<?php

class Post extends Connection
{
    public $err_msg;

    public function getCategory()
    {
        $sql = "SELECT * FROM category";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addPost(array $data)
    {
        $sql = "INSERT INTO posts (title, text, image, category_id, user_id, public)
                VALUES (:title, :text, :image, :category_id, :user_id, :public)";
        $query = $this->db->prepare($sql);
        $query->execute($data);
        if ($query->rowCount() === 1) {
            return true;
        } else {
            $this->err_msg = "Post is not added!";
            return false;
        }
    }
}

$Post = new Post(config);