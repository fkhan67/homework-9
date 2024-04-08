<?php

namespace app\models;

use PDO;

class Post {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllPosts() {
        $query = "SELECT * FROM posts";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function savePost($title, $description) {
        $query = "INSERT INTO posts (title, description) VALUES (?, ?)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$title, $description]);
        return $this->pdo->lastInsertId();
    }

    public function getPostById($id) {
        $query = "SELECT * FROM posts WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePost($id, $title, $description) {
        $query = "UPDATE posts SET title = ?, description = ? WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$title, $description, $id]);
    }

    public function deletePost($id) {
        $query = "DELETE FROM posts WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$id]);
    }
}
