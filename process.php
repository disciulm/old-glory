<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message = 'No phone entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="0" cellspacing="5" cellpadding="5">
  <tr bgcolor="#fff">
    <td><strong>Name</strong></td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#fff">
    <td><strong>Email</strong></td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#fff">
    <td><strong>Message</strong></td>
    <td><?=$message;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

$to = 'leibovitz.kuzen@yandex.ru';
$email = 'email@example.com';
$fromaddress = "you@example.com";
$fromname = "Online Contact";

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "hello@oldgloryskidsteer.com";
$mail->FromName = "hello@oldgloryskidsteer.com";
$mail->AddAddress("guyemmons@aol.com","Name 1"); // Put your email
//$mail->AddAddress("another_address@example.com","Name 2"); // addresses here

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "FROM WEBSITE: Contact Request";
$mail->Body     =  $body;
$mail->AltBody  =  "No message left";

if(!$mail->Send()) {
	$recipient = 'mark.disciullo@gmail.com';
	$subject = 'Contact form failed';
	$content = $body;
  mail($recipient, $subject, $content, "From: hello@oldgloryskidsteer.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
