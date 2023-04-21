<?php
session_start();
require_once('./src/controllers/add_comment.php');
require_once('./src/controllers/homepage.php');
require_once('./src/controllers/articles.php');
require_once('./src/controllers/login.php');
require_once('./src/controllers/logout.php');
require_once('./src/controllers/register.php');
require_once('./src/controllers/error.php');
require_once('./src/controllers/showArticle.php');


if (isset($_GET['action']) && $_GET['action'] !== '')
    {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                post($id);
            } else {
                throw new Exception(('Aucun article'));
            }
    
        } elseif($_GET['action'] === 'list'){
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
            throw new Exception("ERREUR 404 : la page que vous recherchez n'existe pas.");
        }
} else {
    homepage();
}

?>