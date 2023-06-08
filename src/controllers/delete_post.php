<?php

//src/controllers/delete_post.php

require_once('./src/model/post.php');
require_once('./src/lib/database.php');

use APP\Model\Post\PostRepository;

function deletePost($id)
{   

    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    var_dump($id);
    $success = $postRepository->deleteArticle($id);
    if (!$success) {
        throw new Exception('Impossible de supprimer l\'article !');
    } else {
        header('Location: index.php?action=list');
    }
}