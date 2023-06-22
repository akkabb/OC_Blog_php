<?php

require_once './src/lib/database.php';
require_once './src/model/post.php';

use App\Model\Post\PostRepository;


class UpdateArticle
{    
    /**
     * We update an article
     *
     * @param  mixed $id
     * @param  mixed $input
     * @return void
     */
    public function execute($id, $input)
    {
         // It handles the form submission when there is an input.
         if ($input !== null) {
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
                 require "templates/edit_post.php";
                 exit();
             }
            $title = null;
            $leadSentence = null;
            $content = null;
            if (!empty($input['title']) && !empty($input['lead_sentence']) && !empty($input['content'])) {
                $title = $input['title'];
                $leadSentence = $input['lead_sentence'];
                $content = $input['content'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $postRepository = new PostRepository();
            $postRepository->connection = new DatabaseConnection();
            $post = $postRepository->getPost($id);
            $input['title'] = $post->title;
            $input['lead_sentence'] = $post->leadSentence;
            $input['content'] = $post->content;
            $input['id'] = $post->id;
            $success = $postRepository->updateArticle($title, $leadSentence, $content, $id);
            if (!$success) {
                throw new \Exception('Impossible de modifier l\'article !');
            } else {
                header('Location: index.php?action=post&id=' . $id);
            }
        }


        // Otherwise, it displays the form.
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($id);
        $input['title'] = $post->title;
        $input['lead_sentence'] = $post->leadSentence;
        $input['content'] = $post->content;
        $input['id'] = $post->id;
        if ($post === null) {
            throw new \Exception("Le commentaire $id n'existe pas.");
        }
        require 'templates/edit_post.php';
        
    }
 }


?>