<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
    public function validatePostData($inputData) {
        // Your existing validation logic...
    }

    public function getPosts($id = null) {
        header("Content-Type: application/json");
        $postModel = new Post();
        if ($id) {
            $post = $postModel->getPostById($id);
            echo json_encode($post);
        } else {
            $posts = $postModel->getAllPosts();
            echo json_encode($posts);
        }
        exit();
    }

    public function createPost() {
        $inputData = $_POST; // Adjust as necessary for your environment
        $validatedData = $this->validatePostData($inputData);
        $postModel = new Post();
        $postModel->savePost($validatedData['title'], $validatedData['description']);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function updatePost($id) {
        parse_str(file_get_contents('php://input'), $_PUT);
        $validatedData = $this->validatePostData($_PUT);
        $postModel = new Post();
        $postModel->updatePost($id, $validatedData['title'], $validatedData['description']);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function removePost($id) {
        $postModel = new Post();
        $postModel->deletePost($id);

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

}
