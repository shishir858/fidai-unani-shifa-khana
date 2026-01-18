<?php
// includes/send_mail.php
// Usage: include this file and call send_mail($to, $subject, $body, $from = null)

function send_mail($to, $subject, $body, $from = null) {
    require_once __DIR__ . '/../assets/php/PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Change as needed
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com'; // Change as needed
    $mail->Password = 'your_email_password'; // Change as needed
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom($from ?: $mail->Username, 'Website Contact');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    if(!$mail->send()) {
        return false;
    }
    return true;
}
