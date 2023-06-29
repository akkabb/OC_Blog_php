<?php
//src/controllers/add_post.php

require_once './src/model/post.php';
require_once './src/lib/database.php';

use APP\Model\Post\PostRepository;

function addPostGet()
{
    require 'templates/add_post.php';
}

function addPostPost($input)
{
    
    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    // $post = new \App\Model\Post\Post();

    $errors = [];
    if (!isset($input['title']) || strlen(trim($input['title'])) < 6) {
        $errors['title_not_set'] = true;
    }

    if (!isset($input['lead_sentence']) || strlen(trim($input['lead_sentence'])) < 6) {
        $errors['lead_sentence_not_set'] = true;
    }

        if (!isset($input['content']) || strlen(trim($input['content'])) < 20) {
        $errors['content_not_set'] = true;
    }

    if (!empty($errors)) {
        require "templates/add_post.php";
        exit();
    }

    // $post->title = $input['title'];
    // $post->leadSentence = $input['lead_sentence'];
    // $post->content = $input['content'];
    
    $title = $input['title'];
    $leadSentence = $input['lead_sentence'];
    $content = $input['content'];

    
    // $date = new DateTime();

    // $post->creationBy = intval($_SESSION['id']);
    // $post->creationDate = date('Y-m-d H:i:s');

    $succes = $postRepository->createArticle($title, $leadSentence, $content);
    var_dump($succes);
    if (!$succes){
        throw new Exception('Une erreur est survenue');
    }else{
        header('Location: index.php?action=list');
    }
}


?>