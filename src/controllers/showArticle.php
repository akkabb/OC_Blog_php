<?php
//  src/controllers/showArticle.php
// Display DETAILS of one article

require_once('./src/lib/database.php');
require_once('./src/model/comment.php');
require_once('./src/model/post.php');


use App\Model\Comment\CommentRepository;
use App\Model\Post\PostRepository;
//use App\Lib\Database\DatabaseConnection;

// $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// if (isset($_GET['id']) && $_GET['id'] > 0)
// {
//     $id = $_GET['id'];
// }else{
//     echo 'Error';
// }
// $postRepository = new PostRepository();
// $post = $postRepository->getPost($id);

// require('./templates/show_article.php');

function post(string $id)
{
    $postRepository = new PostRepository();
    $postRepository->connection = new \DatabaseConnection();
    $post = $postRepository->getPost($id);

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new \DatabaseConnection();
    $comments = $commentRepository->getComments($id);
    require('templates/show_article.php');
}
