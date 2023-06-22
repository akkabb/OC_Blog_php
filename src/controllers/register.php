<?php
//src/controllers/register.php
require_once 'src/lib/database.php';
require_once 'src/model/user.php';
require_once 'token.php';

use App\Model\User\UserRepository;
function signin()
{
    require 'templates/register.php';
}

function register(array $input)
{
    $username = '';
    $email = '';
    $firstname = '';
    $lastname = '';
    $password = '';

    if (!empty($input)){
        if (!empty($input['firstname']) && !empty($input['username']) && !empty($input['password']))
        $username = $input['username'];
        $email = $input['email'];
        $firstname = $input['firstname'];
        $lastname = $input['lastname'];
        $password = $input['password'];
    }else{
        throw new Exception('Les données du formulaire sont invalides');
    }

    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->createUser($username, $email, $firstname, $lastname, $password);
    if (!$success) {
        throw new Exception('Impossible de créer un nouveau compte !');

    } else {
        header('Location: index.php?');
    }
}
