<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
/*if(!(empty($_SESSION["name"])))
	{
		header('location:../Users/userprofile.php');
	}*/
//require '../Shared/Classes/classusr.php';

$id=$_GET["id"];
	$name=$_GET["name"];
	$token=$_GET["token"];
	require_once "../Shared/MailAssets/vendor/autoload.php";
$rmail=$id;
$link='<h3>Respected Sir/Medam,<p><b>Greeting from Medsky.com!!!</b> Congratulations!! You had signed up successfuly.Kindly Verify Your account.'.$name.'</h1><a href="localhost/MD/Medsky1.1/user_mst/usrverify.php?token='.$token.'&id='.$rmail.'&name='.$name.'"><h1>Please Click here to Verify your account!!!</h1></a></p>';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
	//Server settings
   // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
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
	$mail->addAddress( $rmail, 'Verify Your Account');     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('medskyy@gmail.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//Attachments
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	//Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Account Verification Mail';
	$mail->Body    = $link;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$mail->send();
	echo '<h1>Verification Mail has been sent</h1>';
} catch (Exception $e) {
	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
		header('location:../Visitors/patientlogsign.php');

?>