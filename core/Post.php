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
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category, COUNT(v.id) AS number_voting
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                LEFT JOIN voting v ON v.post_id = p.id
                WHERE p.user_id = :user_id
                GROUP BY v.post_id, p.id
                ORDER BY p.created_at DESC 
                ";

        $query = $this->db->prepare($sql);
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllPublicPost()
    {
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category, COUNT(v.id) AS number_voting
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                LEFT JOIN voting v ON v.post_id = p.id
                WHERE p.public = :public
                GROUP BY v.post_id, p.id
                ORDER BY p.created_at DESC 
                ";

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
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category, COUNT(v.id) AS number_voting
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                LEFT JOIN voting v ON v.post_id = p.id
                WHERE p.user_id = :user_id AND p.public = :public
                GROUP BY v.post_id, p.id
                ORDER BY p.created_at DESC 
                ";

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

    public function voting($post_id, $user_id)
    {
        if ($this->checkVoting($post_id, $user_id)) {
            $sql = "DELETE FROM voting WHERE post_id = :post_id AND user_id = :user_id";
        } else {
            $sql = "INSERT INTO voting (post_id, user_id) VALUES (:post_id, :user_id)";
        }

        $query = $this->db->prepare($sql);
        $query->execute([
            "post_id" => $post_id,
            "user_id" => $user_id
        ]);
    }

    private function checkVoting($post_id, $user_id)
    {

        $sql = "SELECT * FROM voting WHERE post_id = :post_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute([
            "post_id" => $post_id,
            "user_id" => $user_id
        ]);

        return $query->rowCount() > 0;
    }

    public function userVoting($user_id)
    {
        $sql = "SELECT post_id, user_id FROM voting WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_COLUMN);
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(["id" => $id]);

        $sql = "DELETE FROM voting WHERE post_id = :post_id";
        $query = $this->db->prepare($sql);
        $query->execute(["post_id" => $id]);

    }

    public function searchPost($search)
    {
        $sql = "SELECT p.*, u.first_name, u.last_name, c.category, COUNT(v.id) AS number_voting
                FROM posts p
                JOIN users u ON u.id = p.user_id
                JOIN category c ON c.id = p.category_id
                LEFT JOIN voting v ON v.post_id = p.id
                WHERE p.public = :public AND p.title LIKE CONCAT('%',:search,'%') OR p.text LIKE CONCAT('%',:search,'%')
                GROUP BY v.post_id, p.id
                ORDER BY p.created_at DESC 
                ";

        $query = $this->db->prepare($sql);
        $query->execute(["public" => 1, "search" => $search]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}

$Post = new Post(config);