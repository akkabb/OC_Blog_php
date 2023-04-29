<?php

// src/controllers/admin_page.php

require_once('./src/lib/database.php');
require_once('./src/model/post.php');
require_once('./src/model/comment.php');
require_once('./src/model/user.php');

use App\Model\User\UserRepository;
use App\Model\Comment\CommentRepository;


function admin()
{
    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $users = $userRepository->getUsers();

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $comments = $commentRepository->getAllComments();
    require('templates/admin_page.php');
}