<?php
function sendmail($to,$name,$sub,$body)
{
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'SMTPHOST';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'SMTPUSER';                 // SMTP username
$mail->Password = 'SMTPPASS';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 2525;                                    // TCP port to connect to

$mail->setFrom('support@uddeshhyakiet.com', 'Uddeshhya Blood Portal');
$mail->addAddress($to,$name);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $sub;
$mail->Body    = $body;

if(!$mail->send()) {
    ?><script>alert('Mail was Not Sent..');</script><?php
} else {
    ?><script>alert('Mail was Sent Succesfully..');</script><?php
}
}
function sendmail1($to,$name,$sub,$body)
{

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'SMTPHOST';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'SMTPUSER';                 // SMTP username
$mail->Password = 'SMTPPASSWORD';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 2525;                                    // TCP port to connect to

$mail->setFrom('support@uddeshhyakiet.com', 'Uddeshhya Blood Portal');
$mail->addAddress($to,$name);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $sub;
$mail->Body    = $body;

if(!$mail->send()) {
    ?><script>alert('Mail was Not Sent..');</script><?php
} else {
    ?><script>alert('Mail was Sent Succesfully..');</script><?php
}
}
?> 