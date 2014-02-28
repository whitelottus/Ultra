<?php
if(isset($_POST['enviar'])) {

$to = "forcelottus@gmail.com";
$subject = 'asunto';
 
$name_field = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$email_field = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
$subject_field = filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
$comment = filter_var($_POST['contenido'], FILTER_SANITIZE_STRING);
 

$body = " From: $name_field\n\n Subject: $subject_field\n\n  E-Mail: $email_field\n\n Message:\n\n $comment";
 
mail($to, $subject, $body);
 
//header('Location: confirmation.htm');

} else {

// el erroooooooor

}
?> 