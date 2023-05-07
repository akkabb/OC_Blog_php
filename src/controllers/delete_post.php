<?php

//src/controllers/delete_post.php

require_once('./src/model/post.php');
require_once('./src/lib/database.php');

use APP\Model\Post\PostRepository;

function deletePost($id)
{
    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $identifiant = $postRepository->getPost($id);
    
    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $success = $postRepository->deleteArticle($id);
    if (!$success) {
        throw new Exception('Impossible de supprimer l\'article !');
    } else {
        echo "L'article s'est bien delete!";
        header('Location: index.php?action=list');
    }
}