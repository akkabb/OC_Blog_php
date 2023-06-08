<?php

require_once('./src/model/comment.php');
require_once('./src/lib/database.php');

use App\Model\Comment\CommentRepository;

class SubmitComment
{
    public function execute($id)
    {
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $identfier = $commentRepository->getComment($id);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->submitComment($id);
        if (!$success){
            throw new \Exception('Impossible de valider le commentaire !');
        }else{
            header('Location: index.php?action=admin');
            // require('templates/show_article.php');
        }
    }
}