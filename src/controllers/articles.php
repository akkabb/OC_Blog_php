<?php
//  src/controllers/articles.php
require_once('./src/lib/database.php');
require_once('./src/model/post.php');

use App\Model\Post\PostRepository;

function displayArticles()
{
    $postRepository = new PostRepository;
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();

    require('templates/articles.php');
}