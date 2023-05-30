<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
require 'C:\xampp\htdocs\ondertiteling\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\ondertiteling\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\ondertiteling\vendor\phpmailer\phpmailer\src\SMTP.php';

session_start();

// Generate CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF validation failed.");
    }

    // Retrieve form data
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.strato.com';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'giovanni@gvreeling.nl';
        $mail->Password = 'v6*p7R1v^3%JUh@7WSzV';
        $mail->SMTPSecure = 'ssl';

        // Sender and recipient settings
        $mail->setFrom($email, $name);
        $mail->addAddress('recipient@example.com', 'Recipient Name');

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
