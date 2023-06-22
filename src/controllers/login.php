<?php
//src/controllers/login.php

require_once 'src/lib/database.php';
require_once 'src/model/user.php';
require_once 'token.php';

// require_once 'src/controllers/error.php'; // utilisé pour la page error

use App\Model\User\UserRepository;

function login()
{
    require 'templates/login.php';
}

function logUser(array $input)
{
    $email = null;
    $password = null;
    if (!empty($input)) {
        // form has been sent
        // We check that ALL the required fields are filled in
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
    if (!$success) {
        // throw new Exception('Les informations de connexion sont érronées');
        $_SESSION['login_failed'] = '<span style="background-color: var(--danger);color: #fff;padding:15px 22px 15px 22px">Vérifier vos éléments de connexion</span>';
        header('Location: index.php?action=login');
    } else {
        header('Location: index.php');
    }

}