<?php
require 'vendor/autoload.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    $verificationCode = strtoupper(bin2hex(random_bytes(4)));

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'martylex7@gmail.com';
    $mail->Password = 'zvbx sict ephh ooxp';
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('johnemmanuelpaliza@gmail.com', 'Sta. Rosa | E-JobConnect');
    $mail->addAddress('johnemmanuelpaliza@gmail.com', 'Recipient Name');

    $mail->isHTML(true);
    $mail->Subject = 'Password Reset Request - Sta. Rosa | E-JobConnect';
    $mail->Body    = "Dear [User’s Full Name],<br>
            <br>
            We received a request to reset the password for your Sta. Rosa | E-JobConnect account. To proceed with the password reset, please use the verification code below:<br>
            <br>
            Verification Code:<br>
            [$verificationCode]<br>
            <br>
            This code will remain valid for [validity period, e.g., 10 minutes]. Please ensure that you enter the code promptly to complete the password reset process.<br>
            <br>
            If you did not request this password reset, please ignore this email. Your account will remain secure.<br>
            <br>
            To reset your password:<br>
            <br>
            Go to the Sta. Rosa | E-JobConnect Password Reset Page.<br>
            <br>
            Enter the verification code above.<br>
            <br>
            Follow the instructions to create a new password for your account.<br>
            <br>
            Thank you for being a part of Sta. Rosa | E-JobConnect — where we connect you to job opportunities in and around Santa Rosa, Laguna.<br>";

    if ($mail->send()) {
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>