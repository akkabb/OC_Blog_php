<?php
//src/controllers/login.php

require_once 'src/lib/database.php';
require_once 'src/model/user.php';
require_once('token.php');

// require_once 'src/controllers/error.php'; // utilisé pour la page error

use App\Model\User\UserRepository;

function login()
{
    require('templates/login.php');
}

function logUser(array $input)
{
    $email = null;
    $password = null;
    if (!empty($input)) {
        // Le formulaire à été envoyé
        // On vérifie que TOUS les champs requis soient remplis
        if (isset($input["email"], $input["password"]) && !empty($input['email']) && !empty($input['password'])) {
            $email = $input["email"];
            $password = $input["password"];
            if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Ce n'est pas un email valide");
            }
        } else {
            throw new Exception('Les informations sont invalides.');
        }
    }

    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->loginUser($email, $password);
    var_dump($success);
    if (!$success) {
        //throw new Exception('Impossible se connecter à votre compte !');
        //error();
    } else {
        header('Location: index.php');
    }

}