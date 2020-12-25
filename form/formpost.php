
<?php 
$email = $_POST("email");
$message = 'This message was sent from ' . $_POST("name") . ' at ' . $email;
$message = $message . '

' . $_POST("comment");


<?php
$to      = $email;
$subject = 'Mailform Test';
$headers = 'From: hostmaster@hermosawaveinternet.com' . "\r\n" .
    'Reply-To: hostmaster@hermosawaveinternet.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

header('Location: formthanks.html?name=' . $_POST["name"]);
exit();
?>