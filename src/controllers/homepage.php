<?php

//src/controllers/homepage.php
require_once('token.php');

function homepage(){
     $error_required = 'Veuillez renseigner ce champ';
     $error_email = 'Veuillez entrer une adresse mail valide';
    $errors = [
        'email' => '',
        'firstname' => '',
        'lastname' => '',
        'message' => ''
    ];
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST = filter_input_array(INPUT_POST, [
            'email' => FILTER_SANITIZE_EMAIL,
        'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'message' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);
        
        $email = $_POST['email'] ?? '';
        $firstname = $_POST['firstname'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $message = $_POST['message'] ?? '';

        if (!$email)
            $errors['email'] = $error_email;
        if (!$firstname)
            $errors['firstname'] = $error_required;
        if (!$lastname)
            $errors['lastname'] = $error_required;
        if (!$message)
            $errors['message'] = $error_required;

        if (!empty($email) && !empty($firstname) && !empty($lastname) && !empty($message)) {
            if (Token::check($_POST['token'])) {
                echo 'process in action';
            }
        }
    }
    require ("templates/homepage.php");
}