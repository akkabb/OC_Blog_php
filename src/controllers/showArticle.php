<?php
//  src/controllers/showArticle.php
// Display DETAILS of one article

require_once './src/lib/database.php';
require_once './src/model/comment.php';
require_once './src/model/post.php';


use App\Model\Comment\CommentRepository;
use App\Model\Post\PostRepository;


function post(string $id)
{
    $postRepository = new PostRepository();
    $postRepository->connection = new \DatabaseConnection();
    $post = $postRepository->getPost($id);

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new \DatabaseConnection();
    $comments = $commentRepository->getComments($id);
    require 'templates/show_article.php';
}
