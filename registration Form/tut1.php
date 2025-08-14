<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'asd21191530s@gmail.com';      // Your Gmail
        $mail->Password   = 'nyvq hmws xwxg antv';        // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email headers
        $mail->setFrom('asd21191530s@gmail.com', 'Website Registration');
        $mail->addAddress('asd21191530s@gmail.com'); // You receive this

        // Email body
        $mail->isHTML(true);
        $mail->Subject = 'New Registration Form Submission';

        $body = "
        <h2>New Registration</h2>
        <p><strong>First Name:</strong> {$_POST['first_name']}</p>
        <p><strong>Last Name:</strong> {$_POST['last_name']}</p>
        <p><strong>Email:</strong> {$_POST['email']}</p>
        <p><strong>Mobile:</strong> {$_POST['mobile']}</p>
        <p><strong>Gender:</strong> {$_POST['gender']}</p>
        <p><strong>DOB:</strong> {$_POST['dob']}</p>
        <p><strong>Address:</strong> {$_POST['address']}</p>
        ";

        $mail->Body = $body;

        $mail->send();
        echo "Form submitted successfully. Check your Gmail.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
