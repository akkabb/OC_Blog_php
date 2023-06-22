<?php

require_once 'templates/phpmailer/Exception.php';
require_once 'templates/phpmailer/PHPMailer.php';
require_once 'templates/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


 function contactForm(array $input) {
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
   require "templates/homepage.php";

      

    if (!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['message'])) {
       $email = $_POST['email'];
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $message = $_POST['message'];       

       $contact = 'Adresse email :' . $email . "\n" . 'Nom :'. $lastname . "\n" . 'Prénom :' . $firstname . "\n" . 'Message :' . $message;

       $mail = new PHPMailer(true);

       try {
          // Configuration
          $mail->SMTPDebug = SMTP::DEBUG_SERVER; // I want debug info

          // We configure the SMTP
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->Port = 465; 
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
          $mail->SMTPAuth = true;
          $mail->Username = 'efikas99@gmail.com';
          $mail->Password = 'xgubskymqyoubkxy';
          /*xgubskymqyoubkxy*/

          //Charset
          $mail->CharSet ="utf-8";

          //Recipients
          $mail->addAddress("efikas99@gmail.com");
          
          //Sender
          $mail->setFrom($email);

          // content
          $mail->Subject = "PHPMailer OC_blog";
          $mail->Body = $contact ;

          //We send
          $sendEmail = $mail->send();
          if ($sendEmail){
               $_SESSION['mailsend'] = '<span style="background-color: var(--cyan-100);color: #fff;padding:15px 22px 15px 22px">Le mail a bien été envoyé</span>';
          }
          header('Location: index.php?');

       }catch(Exception){
          throw new Exception("Message non envoyé. Erreur: {$mail->ErrorInfo}");
       }
   } else {
       error();
   }
 }
 