<?php

require_once('templates/phpmailer/Exception.php');
require_once('templates/phpmailer/PHPMailer.php');
require_once('templates/phpmailer/SMTP.php');

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

 function contactForm(array $input) {
    if (!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['message'])) {
       $email = $_POST['email'];
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $message = $_POST['message'];       

       $contact = 'Adresse email :' . $email . "\n" . 'Nom :'. $lastname . "\n" . 'Prénom :' . $firstname . "\n" . 'Message :' . $message;

       $mail = new PHPMailer(true);

       try {
          // Configuration
          $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Je veux des infos de débug

          // On configue le SMTP
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

          //Destinataires
          $mail->addAddress("efikas99@gmail.com");
          
          //Expéditeur
          $mail->setFrom($email);

          // Contenu
          $mail->Subject = "PHPMailer OC_blog";
          $mail->Body = $contact ;

          //On envoie
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