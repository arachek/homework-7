<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => '1',
                'name' => 'pinecone'
            ],
            [
                'id' => '2',
                'name' => 'nathan'
            ]
        ];
    }
}