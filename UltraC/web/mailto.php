<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "ventas@clayton.com.mx";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['Name']) ||
 
        !isset($_POST['Email']) ||
 
        !isset($_POST['Subject']) ||
 
        !isset($_POST['Message']))
        {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
 
    }
 
     
 
    $name = $_POST['Name']; // required
 
    $from = $_POST['Email']; // required
 
    $subject = $_POST['Subject']; // required
 
    $message = $_POST['Message']; // not required
 
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
 
  if(strlen($message) < 2) {
 
    $error_message .= 'This message is way too short, trty to explain yourself better, please<br />';
 //ok si no quieren ese mensaje lo pueden cambiar
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($from)."\n";
 
    $email_message .= "Subject: ".clean_string($subject)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
 
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$from."\r\n".
 
'Reply-To: '.$from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
 
?>
 
 
 
<?php
 
}
 
?>