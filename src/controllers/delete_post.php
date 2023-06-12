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
        $_SESSION['deletePost'] = '<span style="background-color: var(--cyan-100);color: #fff;padding:15px 22px 15px 22px">L\'article a bien été supprimé</span>';
        header('Location: index.php?action=list');
    }
}