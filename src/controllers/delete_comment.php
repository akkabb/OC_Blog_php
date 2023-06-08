<?php
//src/controllers/delete_comment.php

require_once('./src/model/comment.php');
require_once('./src/lib/database.php');

use App\Model\Comment\CommentRepository;

function deleteComment($id)
{
    $commentRepository = new CommentRepository();
    $commentRepository->connection = new \DatabaseConnection();
    $identifiant = $commentRepository->getComment($id);
    $post_id = $identifiant->post;

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new \DatabaseConnection();
    $success = $commentRepository->deleteComment($id);
    if (!$success){
        throw new Exception('Impossible de supprimer le commentaire !');
    } else{
        header('Location: index.php?action=post&id=' . $post_id);
    }
}