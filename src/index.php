<?php
require 'lib/guidv4.php';

$to = "recipient@example.com";
$subject = "Test Email";
$message = "This is a test email.";
$headers = "From: sender@example.com";

if(mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email sending failed.";
}

for ($i = 0; $i < 10; $i++) {
    echo guidv4() . "<br>";
}
$uuid = guidv4();

$username = "World!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATP Ranking</title>
</head>
<body>
    <h1>Hello <?= $username; ?></h1>
    <h2>Test <?= $uuid ?></h2>
</body>
</html>