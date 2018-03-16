<!DOCTYPE html>
<html lang="en">
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
	session_start();
	if(!(empty($_SESSION["pid"])))
	{
		header('location:../Users/writepresc1.php');
	}
?>
<head>

	<?php
	include '../Shared/styleofpatlog.php';
	?>
	<?php
  //  session_start();
if(isset($_POST["tab"]))
{
	$uid=$_POST["id"];
	$pass=$_POST["pass"];
	
	require '../Shared/Classes/classusr.php';
$cnn=new usr_all;
$result=$cnn->loginselect($uid,$pass);

if($result->num_rows===1)
{
	
	$row=$result->fetch_assoc();
	//header('location:index.php');
		//$_SESSION["pass"]=$pass;
			//$row=$result->fetch_assoc();
	$id=$uid;
$name=$row["usr_name"];
	$token=$row["usr_token"];
	$flag=1;
	if($row["usr_verify"]==$flag)
	{
	echo $row["user_verify"];
	$_SESSION["pid"]=$id;
	$_SESSION["pname"]=$row["usr_name"];
	header('location: ../visitors/index.php');
	
	}
	else
	{
		
	//	header('location:notverified.php');	
		echo "You had not verified your account.";
		
	echo "<h1>We had sent you verification mail.Kindly check your email and verify your account to proceed further.</h1>";
	
echo '<h1><p class="reset"><a tabindex="4" href="../user_mst/verifyrep.php?token='.$token.'&id='.$id.'&name='.$name.'" title="Click here to resend the email.">Resend Email.</a></p></h1>';

		
	}
}
else
{
	//header('location:index.php');
	//echo "Enter Appropriate Password";
	//echo $uid,$pass;
	//echo "Entered User id Already taken";
	//header('patientlogsign.php');
	//echo '<script language="javascript">';
  //echo 'alery(Enter Appropriate Password)'; 
  //echo '</script>';
  
echo '<div class="btn btn-dark btn-lg btn-block">Enter Appropriate Username and PassWord </div>';

}
	
}
else
{
//	header('location:../Users/writepresc1.php');
}

?> 
<?php
   
  
/*   $conn=new product_all;
   $result=$conn->select_all();*/
   if(isset($_POST["btn"]))
{
   $id=$_POST["id"];
   $na=$_POST["name"];
   $mob=$_POST["mno"];
   $pas=$_POST["pass"];
   $gend=$_POST["gen"];
   $img="null";
   $r=md5(rand());
   $token=substr($r,0,10);
   $type="user";


require '../Shared/Classes/classusr.php';
/*$_SESSION["pid"]=$id;
$_SESSION["pname"]=$na;*/
$conn=new usr_all;
$result=$conn->insert($id,$na,$mob,$pas,$gend,$img,$token,$type);
if($result===true)
{
   echo "<h1>We had sent you verification mail.Kindly check your email and verify your account to proceed further.</h1>";
  // $conn->verify($id,$na,$token);
   $name=$na;

  
   require_once "../Shared/MailAssets/vendor/autoload.php";

   $rmail=$id;
   
   $link='<h3>Respected Sir/Medam,<p><b>Greeting from Medsky.com!!!</b> Congratulations!! You had signed up successfuly.Kindly Verify Your account.'.$name.'</h1><a href="localhost/MD/Medsky1.1/user_mst/usrverify.php?token='.$token.'&id='.$rmail.'&name='.$name.'"><h1>Please Click here to Verify your account!!!</h1></a></p>';
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
	   echo 'Verification Mail has been sent';
   } catch (Exception $e) {
	   echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
   }
echo '<h1><p class="reset"><a tabindex="4" href="../user_mst/verifyrep.php?token='.$token.'&id='.$id.'&name='.$na.'" title="Click here to resend the email.">Resend Email.</a></p></h1>';
   
}
else
{
   echo "Entered User id Already taken";
   
}
}
?>
</head>
<div class="top-content">
	<div class="container">
		<div class="row">
            <div class="col-sm-8 col-sm-offset-2 text">
                <h1>Patient Login &amp; Signup Forms</h1>
			</div>
		</div>
		<div class="row">
            <div class="col-sm-5">
            	<div class="form-box">
	                <div class="form-top">
	                	<div class="form-top-left">
	                        <h3>Login to our site</h3>
	                        <p>Enter username and password to log on:</p>
	            		</div>
	                <div class="form-top-right">
	            </div>
			</div>
	        <div class="form-bottom">
				<form role="form" enctype="multipart/form-data" action="patientlogsign.php" method="post" class="login-form">
				    <div class="form-group">
						<label class="sr-only" for="form-username">Email id</label>
				        <input type="email" name="id" placeholder="Email id..." class="form-username form-control" id="form-username" required>
				    </div>
				    <div class="form-group">
				        <label class="sr-only" for="form-password">Password</label>
				        <input type="password" name="pass" placeholder="Password..." pattern="[A-Za-z0-9]{6,10}" class="form-password form-control" id="form-password" required>
					</div>
						<button type="submit"name="tab">Sign in!!</button> </br>  
						<span class="pull-right"><a href="../user_mst/forget.php">Forgot Password ??</a></span>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-1 middle-border"></div>
    <div class="col-sm-1"></div>
    <div class="col-md-5">
        <div class="form-box">
            <div class="form-top">
	            <div class="form-top-left">
	                <h3>Sign up now</h3>
	                <p>Fill in the form below to get instant access:</p>
	            </div>
	        </div>
	        <div class="form-bottom">
				<form role="form" onsubmit="return validate_form();"action="patientlogsign.php" method="post" class="registration-form"name="psign">
				    <div class="form-group">
				        <label class="sr-only" for="form-email">Email id</label>
				        <input type="email" name="id" placeholder="Email id" class="form-email form-control" required >
				    </div>
				    <div class="form-group">
				        <label class="sr-only" for="form-password">Password</label>
				        <input type="password" name="pass" placeholder="Password..." pattern="[A-Za-z0-9]{6,10}" class="form-passwd form-control" id="passw" required>
				    </div>
                    <div class="form-group">
				        <label class="sr-only" for="form-name">Name</label>
				        <input type="text" name="name" id="una" pattern="[A-Za-z\s]+" placeholder="Name..." class="form-name form-control" id="form-name" required>
				    </div>
					<div class="form-group">
					<center>
						<label class="sr-only" for="form-name">Gender</label>
				        <input type="radio" name="gen" value="Male" class="form-name" id="form-gen">Male
						<input type="radio" name="gen" value="Female" class="form-name" id="form-gen">Female
					</center>
				    </div>
					<div class="form-group">
				        <label class="sr-only" for="form-mobile-no">Mobile No</label>
				        <input type="number" pattern="/(7|8|9)\d{9}/" name="mno" placeholder="Mobile no..." class="form-mno form-control" id="form-email" required>
				    </div>
					<div class="form-group">
					<button type="submit"name="btn" >Sign me up!</button>
					</div>
				</form>
			</div>
		</div>
	</div>			
</div>
</body>
</html>
			
			
