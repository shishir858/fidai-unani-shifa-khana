<?php
// includes/form-handler.php
// Handles all form submissions and sends mail
include_once __DIR__ . '/send_mail.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $treatment = trim($_POST['treatment'] ?? '');

    $to = 'your_email@gmail.com'; // Change to your receiving email
    $subject = 'New Form Submission from Website';
    $body = "<h2>New Form Submission</h2>"
        . "<b>Name:</b> $name<br>"
        . "<b>Phone:</b> $phone<br>"
        . "<b>Address:</b> $address<br>"
        . "<b>Date:</b> $date<br>"
        . "<b>Treatment:</b> $treatment<br>";

    send_mail($to, $subject, $body);
}
