<?php
require_once './src/lib/database.php';
require_once './src/model/post.php';
require_once './src/model/user.php';

use App\Model\User\UserRepository;

class SwitchToAdmin{

    public function execute($id)
    {
        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();
        $identifier =$userRepository->getUser($id);

        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();
        $success = $userRepository->passAdmin($id);
        if(!$success) {
            throw new Exception('Un problème est survenu');
        } else{
            $_SESSION['passAdmin'] = '<span style="background-color: var(--cyan-100);color: #fff;padding:15px 22px 15px 22px">Action mené avec succès</span>';
            header('Location: index.php?action=admin');
        }
    }
}

class SwitchToUser{
    public function execute($id){
        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();
        $identifier =$userRepository->getUser($id);

        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();
        $success = $userRepository->passUser($id);
        if(!$success) {
            throw new Exception('Un problème est survenu');
        } else{
            $_SESSION['passUser'] = '<span style="background-color: var(--cyan-100);color: #fff;padding:15px 22px 15px 22px">Action mené avec succès</span>';
            header('Location: index.php?action=admin');
        }
    }
}