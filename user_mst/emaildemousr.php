<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require '../Shared/Classes/classusr.php';

                                $pass=null;
                $cnn=new usr_all;
                $enteredid=$_SESSION["id"];
                $result=$cnn->getpassword($enteredid);
                $pass=$result;
                $_SESSION["pid"]=null;


                require '../Shared/MailAssets/vendor/autoload.php';

$message="Respected Sir/Medam,<p>This is confidential information.Don`t Share this information with anyone.Your password is ".$pass."</p>";
// creating the phpmailer object

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'medskyy@gmail.com';                 // SMTP username
    $mail->Password = 'nopassword1234';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom('medskyy@gmail.com', 'Scala from Medsky.com');
    $mail->addAddress($enteredid, 'Forget Password');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('medskyy@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Forget Password';
    $mail->Body    = $message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<h1> We had mailed you your password.Kindly Check your inbox.</h1>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

//header('location:../visitor/patientlogsign.php');





?>
