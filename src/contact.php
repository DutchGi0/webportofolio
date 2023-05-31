<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


use PHPMailer/PHPMailer/PHPMailer;
use PHPMailer/PHPMailer/Exception;

require_once 'vendor/autoload.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Retrieve form data
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        

        // Sender and recipient settings
        $mail->setFrom($email, $name);
        $mail->addAddress($email, $name);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send the email
        $mail->send();

        // Redirect or display success message
        echo 'Message sent successfully!';
    } catch (Exception $e) {
        // Handle any exceptions (e.g., display error message)
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
