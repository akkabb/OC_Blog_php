<?php
//src/controllers/add_comment.php

require_once './src/model/comment.php';
require_once './src/lib/database.php';

use App\Model\Comment\CommentRepository;





function addComment($post, array $input)
{
    $author = null;
    $comment = null;
    
    if (!empty($input['author']) && !empty($input['comment']))
    {
        $author = $input['author'];
        $comment = $input['comment'];
    }else {
        throw new Exception('Les données du formulaire sont invalides. ');
    }
    $commentRepository = new CommentRepository();
    $commentRepository->connection = new \DatabaseConnection();
    $success = $commentRepository->createComment($post, $author, $comment);
    if (!$success){
        throw new Exception("Impossible d'ajouter le commentaire !");
    }else{
        var_dump($post);
        header('Location: index.php?action=post&id=' . $post);
    }
}