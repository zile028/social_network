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

    public function getAllUserPost($user_id)
    {
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                WHERE p.user_id = :user_id";

        $query = $this->db->prepare($sql);
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllPublicPost()
    {
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                WHERE p.public = :public";

        $query = $this->db->prepare($sql);
        $query->execute(["public" => 1]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPost($id)
    {
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                WHERE p.id = :id";

        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAllPublicUserPost($user_id)
    {
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                WHERE p.user_id = :user_id AND p.public = :public";

        $query = $this->db->prepare($sql);
        $query->execute(["user_id" => $user_id, "public" => 1]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function changePublic($id, int $public)
    {
        $sql = "UPDATE posts SET
                public = :public,
                update_at = NOW()
                WHERE id = :id
                 ";
        $query = $this->db->prepare($sql);
        $query->execute(["public" => $public, "id" => $id]);
    }

    public function editPost(array $data)
    {
        $sql = "UPDATE posts SET
                 title = :title,
                 text = :text,
                 category_id = :category_id,
                 public = :public,
                 image = :image,
                 update_at = NOW()
             WHERE id = :id
        ";
        $query = $this->db->prepare($sql);
        $query->execute($data);
        if ($query->rowCount() === 1) {
            return true;
        } else {
            $this->err_msg = "Post not changed!";
            return false;
        }
    }


}

$Post = new Post(config);