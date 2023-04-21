<?php
//src/controllers/register.php
require_once 'src/lib/database.php';
require_once 'src/model/user.php';

use App\src\model\User\UserRepository;
function signin()
{
    require('templates/register.php');
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

/*
function register()
{
    if (isset($_POST['submit']))
    {
        if ($_POST['firstname'] != "" || $_POST['usrname'] != "" || $_POST['passord'] != ''){
            //Create variables to store form elements 
            $username = $_POST['username'];
            $email = $_POST['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            if ($role = 2)
            {
                $role == "User";
            }else if ($role = 1){
                $role == "Admin";
            }
    
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // sql to insert into
            
                $sql = "INSERT INTO `user`( `username`, `email`, `first_name`, `last_name`, `password`, `role`) 
                VALUES (:username, :email, :first_name, :last_name, :password, :role )";
            /*
                $sql = "INSERT INTO `user` (`username`, `email`, `first_name`, `last_name`, `password`)
                VALUES ('$username', '$email', '$firstname', '$lastname', '$password')";
            */
            // Execute query
            // $statement = getConnection->prepare($sql);
        
            // $affectedLInes = $statement->execute([
            //     ':username' => $username, 
            //     ':email' => $email, 
            //     ':first_name' => $firstname, 
            //     ':last_name' => $lastname,
            //     ':password' => $password,
            // ':role' => $role,]);

            // message to show account created succefully...
//             $_SESSION['accountCreated'] = '<span>' . $username . ' votre compte est créée !</span>';
//             header('location: http://localhost/p5_oc_blog/login.php');
//             exit();
//         }else{
//             $_SESSION['failedAccount'] = '<span>' . $username . ' La création de votre compte a echoué !</span>';
//             header('location: http://localhost/p5_oc_blog/register.php');
//             exit();
//         }
        
//     }

// }
