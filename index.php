<?php
require_once('./src/controllers/add_comment.php');
require_once('./src/controllers/homepage.php');
require_once('./src/controllers/showArticle.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '')
    {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                post($id);
            } else {
                throw new Exception(('Aucun article'));
            }
    
        } elseif ($_GET['action'] === 'addComment'){
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
    
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
} catch (Exception $e) {
    //throw $th;
    $errorMessage = $e->getMessage();

    require('./templates/error.php');
}

?>