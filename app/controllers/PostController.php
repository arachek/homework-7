<?php

namespace app\controllers;
use app\models\Post;
use app\core\Controller;

class PostController extends Controller
{
    // Method to fetch posts
    public function getPosts()
    {
        echo "Hello";
        $postModel = new Post();

        $template = $this->twig->load('posts.twig');

        $postsData = [
            'posts' => $postModel->getAllPosts(),
        ];

        echo $template->render($postsData);
    }
    public function makePosts()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['description'])) {
                $name = htmlspecialchars($_POST['name']);
                $description = htmlspecialchars($_POST['description']);

                http_response_code(200);
                echo "Post created successfully!";
            } else {
                http_response_code(400);
                echo "Error: Please enter both the name and the description.";
            }
        }
    }
}