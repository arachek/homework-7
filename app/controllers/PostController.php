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
}