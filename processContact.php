<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure to adjust the path as necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 2;  // Enable verbose debug output
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'awaazofdevbhoomi@gmail.com';
            $mail->Password   = 'vqtz jzie tyax nanh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('awaazofdevbhoomi@gmail.com', 'AWAAZ');
            $mail->addAddress($email);                                // Add a recipient

            // Content
            $mail->isHTML(true);                                      // Set email format to HTML
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body    = "Name: $name<br>Email: $email<br><br>Message:<br>'YOUR MESSAGE IS RECORDED , THANKS FOR FEEDBACK .' YOUR MESSAGE WAS:$message";

            $mail->send();
            header("Location: thankYou.php");
            exit();
        } catch (Exception $e) {
            echo "Error sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Please fill in all fields correctly.";
    }
}