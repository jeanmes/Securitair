<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
/* Exception class. */
require '/usr/local/share/php/PHPMailer-master/src/Exception.php';
/* The main PHPMailer class. */
require '/usr/local/share/php/PHPMailer-master/src/PHPMailer.php';
/* SMTP class, needed if you want to use SMTP. */
require '/usr/local/share/php/PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer(TRUE);

/* ... */
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->SMTPAuth = true;
//to view proper logging details for success and error messages
// $mail->SMTPDebug = 1;
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->Username = 'jean.tozza@gmail.com';   //email
$mail->Password = 'nxafdznrlfkygfek' ;   //16 character obtained from app password created
$mail->Port = 465;                    //SMTP port
$mail->SMTPSecure = "ssl";
//sender information
$mail->setFrom('jean.tozza@gmail.com', 'Jean');

//receiver email address and name
$name="yo";
$email=$_POST["email"];
$mail->addAddress($email,$name); 

// Add cc or bcc   
// $mail->addCC('email@mail.com');  
// $mail->addBCC('user@mail.com');  
 
$message=$_POST["commentaire"];
$mail->isHTML(true);
 
$mail->Subject = 'Nouveau message';
$mail->Body    = $message;

// Send mail   
if (!$mail->send()) {
    echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();

header("Location:/Securit'Air 2/Vues/messagerie.html");

// Assurez-vous que le code suivant ne s'exécute pas après la redirection
exit;
?>