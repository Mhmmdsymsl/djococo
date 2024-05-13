<?php

require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer Autoload


// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'smuarif88@gmail.com';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'smuarif88@gmail.com';              // SMTP username
    $mail->Password = 'iqag bffq prjp usxd';                    // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress($receiving_email_address);          // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "New table booking request from the website";
    $mail->Body    = "Name: {$_POST['name']}<br>Email: {$_POST['email']}<br>Phone: {$_POST['phone']}<br>Address: {$_POST['address']}<br>Country: {$_POST['country']}<br>Type Product: {$_POST['people']}<br>Message: {$_POST['message']}";

    // Send the email
    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo 'Unable to send email. Error: ', $mail->ErrorInfo;
}
?>
