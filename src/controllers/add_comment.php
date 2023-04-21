<?php
//src/controllers/add_comment.php

require_once('./src/model/comment.php');
// require_once();

function addComment(int $post, array $input)
{
    $author = null;
    $comment = null;
    // $created_by = null;
    //$creationDate = null;
    if (!empty($input['author']) && !empty($input['comment']))
    {
        $author = $input['author'];
        $comment = $input['comment'];
    }else {
        throw new Exception('Les données du formulaire sont invalides. ');
        //die('Les données du formulaire sont invalides.');
    }

    $success = createComment($post, $author, $comment);
    if (!$success){
        throw new Exception("Impossible d'ajouter le commentaire !");
        //die("Impossible d'ajouter le commentaire");
    }else{
        header('Location: index.php?action=post&id=' .$post);
    }
}