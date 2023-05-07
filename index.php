<?php
// echo phpinfo();
// exit();
session_start();
// var_dump($_SESSION);
// exit();
require_once('./src/controllers/add_post.php');
require_once('./src/controllers/delete_post.php');
require_once('./src/controllers/add_comment.php');
require_once('./src/controllers/homepage.php');
require_once('./src/controllers/articles.php');
require_once('./src/controllers/login.php');
require_once('./src/controllers/logout.php');
require_once('./src/controllers/register.php');
require_once('./src/controllers/error.php');
require_once('./src/controllers/showArticle.php');
require_once('./src/controllers/admin_page.php');
require_once('./src/controllers/switch_userType.php');


if (isset($_GET['action']) && $_GET['action'] !== '')
    {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                post($id);
            } else {
                throw new Exception(('Aucun article'));
            }
    
        } elseif ($_GET['action'] === 'admin'){
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 1){
                admin();
            }else{
                homepage();
            }
        } elseif($_GET['action'] === 'addPost'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                addPostPost($_POST);
            } else {
                addPostGet();
            }
        }elseif( $_GET['action'] === 'deleteArticle'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $id = $_GET['id'];
                deletePost($id);
            }else{
                error();
            }
        }
        elseif ($_GET['action'] === 'passAdmin'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                (new SwitchToAdmin())->execute($id);
            } else {
                throw new Exception('Impossible de passer en Admin');
            }
        }elseif ($_GET['action'] === 'passUser'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                (new SwitchToUser())->execute($id);
            } else {
                throw new Exception('Impossible de passer en User');
            }
        }
        elseif($_GET['action'] === 'list'){
                displayArticles();
        }elseif ($_GET['action'] === 'login'){
                login();
        }elseif ($_GET['action'] === 'logout'){
                logout();
        }elseif ($_GET['action'] === 'register'){
                signin();
        }elseif ($_GET['action'] === 'addUser'){
            if (isset($_POST)){
                register($_POST);
            }else{
                 error();
            }
        }elseif ($_GET['action'] === 'logUser'){
            if (isset($_POST)){
                logUser($_POST);
            }else{
                error();
            }
        }elseif ($_GET['action'] === 'addComment'){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $created_by = $_SESSION['id'];
                    addComment($id, $_POST);
                } else{
                    throw new Exception('Aucun article');
                }
        } else{
            //throw new Exception("ERREUR 404 : la page que vous recherchez n'existe pas.");
            throw error();
        }
} else {
    homepage();
}

?>