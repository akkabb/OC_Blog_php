<?php
session_start();


require_once './src/controllers/add_post.php';
require_once './src/controllers/delete_post.php';
require_once './src/controllers/update_post.php';
require_once './src/controllers/add_comment.php';
require_once './src/controllers/submit_comment.php';
require_once './src/controllers/delete_comment.php';
require_once './src/controllers/homepage.php';
require_once './src/controllers/articles.php';
require_once './src/controllers/superGlobals.php';
require_once './src/controllers/login.php';
require_once './src/controllers/logout.php';
require_once './src/controllers/register.php';
require_once './src/controllers/error.php';
require_once './src/controllers/contact.php';
require_once './src/controllers/showArticle.php';
require_once './src/controllers/admin_page.php';
require_once './src/controllers/switch_userType.php';

$superGlobals = new Globals;

$get = $superGlobals->getGET();
$post = $superGlobals->getPOST();
$server = $superGlobals->getSERVER();


if (isset($get['action']) && $get['action'] !== '') {
        if ($get['action'] === 'post') {
            if (isset($get['id']) && $get['id'] > 0) {
                $id = $get['id'];
                post($id);
            } else {
                throw new Exception(('Aucun article'));
            }
    
        } 
        // THIS PART CONCERNS ADMIN ACTIONS
        elseif ($get['action'] === 'admin'){
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1){
                admin();
            }else{
                homepage();
            }
        } elseif($get['action'] === 'addPost'){
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1) {
                if ($server['REQUEST_METHOD'] === 'POST'){
                    addPostPost($post);
                } else {
                    addPostGet();
                }
            }else {
                homepage();
            }
        }elseif ($get['action'] === 'updateArticle') {
            if (isset($get['id']) && $get['id'] > 0){
                $id = $get['id'];
                $input = null;
                if ($server['REQUEST_METHOD'] === 'POST'){
                    $input = $post;
                }
                (new UpdateArticle())->execute($id, $input);
            }else{
                // throw new Exception('Aucun id envoyé');
                homepage();
            }
        }
        elseif( $get['action'] === 'deleteArticle'){
            if (isset($get['id']) && $get['id'] > 0){
                $id = $get['id'];
                deletePost($id);
            }else{
                // error();
                homepage();
            }
        }
        elseif ($get['action'] === 'passAdmin'){
            if (isset($get['id']) && $get['id'] > 0) {
                $id = $get['id'];
                (new SwitchToAdmin())->execute($id);
            } else {
                // throw new Exception('Impossible de passer en Admin');
                homepage();
            }
        }elseif ($get['action'] === 'passUser'){
            if (isset($get['id']) && $get['id'] > 0) {
                $id = $get['id'];
                (new SwitchToUser())->execute($id);
            } else {
                // throw new Exception('Impossible de passer en User');
                homepage();
            }
        }
        elseif($get['action'] === 'list'){
                displayArticles();
        }
        // THIS PART CONCERNS USERS ACTIONS
        elseif ($get['action'] === 'login'){
                login();
        }elseif ($get['action'] === 'logout'){
                logout();
        }elseif ($get['action'] === 'register'){
                signin();
        }elseif ($get['action'] === 'addUser'){
            if (isset($post)){
                register($post);
            }else{
                 error();
            }
        }elseif ($get['action'] === 'logUser'){
            if (isset($post)){
                logUser($post);
            }else{
                error();
            }
        }
        // THIS PART CONCERNS COMMENTS ACTIONS
        elseif ($get['action'] === 'addComment'){
                if (isset($get['id']) && $get['id'] > 0) {
                    $id = $get['id'];
                    $created_by = $_SESSION['id'];
                    addComment($id, $post);
                } else{
                    throw new Exception('Aucun article');
                }
        }elseif ($get['action'] === 'submitComment'){
            if (isset($get['id']) && $get['id'] > 0) {
                $id = $get['id'];
                (new SubmitComment())->execute($id);
            } else{
                throw new Exception('Impossible de valider le commentaire');
            }
        }elseif ($get['action'] === 'deleteComment') {
            if (isset($get['id']) && $get['id'] > 0) {
                $id = $get['id'];
                deleteComment($id);
            }else{
                error();
            }
        }
        // THIS PART CONCERNS CONTACT
        elseif ($get['action'] === 'contactForm') {
            if (isset($post)) {
                contactForm($post);
            }
            else{
                error();
            }
        }
        else{
            //throw new Exception("ERREUR 404 : la page que vous recherchez n'existe pas.");
            throw error();
        }
} else {
    homepage();
}

?>