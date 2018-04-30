<!DOCTYPE html>
<html lang="en">
<head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include '../Shared/styleofdoclog.php';
	if(!(empty($_SESSION["id"])))
	{
		header('location:index.php');
	}
?>
	<?php
      session_start();
	if(isset($_POST["sub"]))
	{
	$id=$_POST["eid"];
	$pass=$_POST["pass"];
	require '../Shared/classes/classdoc.php';
$cnn=new doc_all;
$result=$cnn->loginselect($id,$pass);
    
    
if($result->num_rows===1)
{
	
	$row=$result->fetch_assoc();
	
	/*	$_SESSION["eid"]=$id;*/
		
	$id=$id;
	$name=$row["doc_name"];
	$token=$row["doc_token"];
	$flag=1;
	if($row["doc_verify"]==$flag)
	{
	//	echo $row["user_verify"];
	$_SESSION["id"]=$id;
	$_SESSION["name"]=$row["doc_name"];
		
	header('location:../Visitors/index.php');
	}
	else
	{
		
	//	header('location:notverified.php');	
		echo "You had not verified your account.";
		require_once "../Shared/MailAssets/vendor/autoload.php";

   $rmail=$id;
   
   $link='<h3>Respected Sir/Medam,<p><b>Greeting from Medsky.com!!!</b> Congratulations!! You had signed up successfuly.Kindly Verify Your account.'.$name.'</h1><a href="localhost/MD/Medsky1.1/Doctor_mst/docverify.php?token='.$token.'&eid='.$rmail.'&name='.$name.'"><h1>Please Click here to Verify your account!!!</h1></a></p>';
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
	//echo "<h1>We had sent you verification mail.Kindly check your email and verify your account to proceed further.</h1>";
	
echo '<h1><p class="reset"><a tabindex="4" href="../doctor_mst/verifyrepeat.php?token='.$token.'&eid='.$id.'&name='.$name.'" title="Click here to resend the email.">Resend Email.</a></p></h1>';

		
	}
} 
	else
	{
		
		
  echo '<script language="javascript">';
  echo 'alery(Enter Appropriate Password)'; 
  echo '</script>';
  
echo '<div class="btn btn-dark btn-lg btn-block">Enter Appropriate Username and PassWord </div>';

	}		
}	
	else
	{
		//header('location:../visitor/index.php');
		
	}
    ?>
	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
	
	
	
	<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	 
	
</script>
</head>

    <body>
	
	
    <?php
   
  
 /*   $conn=new product_all;
    $result=$conn->select_all();*/
	if(isset($_POST["btn"]))
{
	$did=$_POST["eid"];
	$pas=$_POST["pass"];
	$lc=$_POST["lno"];
	$na=$_POST["name"];
	$spec=" ";
	$deg=" ";
	$img=" ";
	$add=" ";
	$gend=$_POST["gen"];
	$mob=$_POST["mno"];
	$r=md5(rand());
	$token=substr($r,0,10);
	/*if($gend=='chacked')
	{
		echo 'male';
	}   
	else
	{
		echo 'female';
	}*/

require '../Shared/Classes/classdoc.php';

$conn=new doc_all;
$result=$conn->insert($did,$pas,$lc,$na,$spec,$deg,$img,$add,$gend,$mob,$token);
if($result===true)
{
	//echo "<h1>We had sent you verification mail.Kindly check your email and verify your account to proceed further.</h1>";
//	$conn->verify($did,$na,$token);
	$id=$did;
	$name=$na;
	require_once "../Shared/MailAssets/vendor/autoload.php";

	$rmail=$id;
	
	$link='<h3>Respected Sir/Medam,<p><b>Greeting from Medsky.com!!!</b> Congratulations!! You had signed up successfuly.Kindly Verify Your account.'.$name.'</h1><a href="localhost/MD/Medsky1.1/Doctor_mst/docverify.php?token='.$token.'&eid='.$rmail.'&name='.$name.'"><h1>Please Click here to Verify your account!!!</h1></a></p>';
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

echo '<h1><p class="reset"><a tabindex="4" href="../doctor_mst/verifyrepeat.php?token='.$token.'&eid='.$did.'&name='.$na.'" title="Click here to resend the email.">Resend Email.</a></p></h1>';
	
}
else
{
    echo "Entered User id Already taken";
}
}
?>

	<form action="login.php" method="post"name="doc" >
        <div class="top-content">
        	
           <!-- <div class="inner-bg">-->
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Doctor Login &amp; Signup Forms</h1>
                            
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
				                    <form role="form" enctype="multipart/form-data" action="login.php" method="post" class="login-form">
				                    	<div class="form-group">
											
				                    		<label class="sr-only" for="form-username">Email id</label>
				                        	<input type="text" name="eid" placeholder="Email id..." class="form-username form-control" id="form-username"required>
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="pass" placeholder="Password..." pattern="[A-Za-z0-9]{6,10}" title="Password must be at least 6 to 10 characters long." class="form-password form-control" id="form-password" data-toggle="password" required>
				                        </div>
										<button type="submit" name="sub">Sign in!!</button> </br>  
										<span class="pull-right"><a href="../doctor_mst/forgot.php">Forgot Password ??</a></span>
				                    </form>
			                    </div>
		                    </div>
		                
		                	
	                        
                        </div>
                        </form>
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-md-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        		
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" onsubmit="return validate_form();"action="" method="post" class="registration-form"name="sign">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-email">Email id</label>
				                        	<input type="email" name="eid" placeholder="Email id..." class="form-email form-control"required >
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="pass" placeholder="Password..." pattern="[A-Za-z0-9]{6,10}" title="Password must be at least 6 to 10 characters long." class="form-passwd form-control"id="passw" data-toggle="password" required>
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-doclic-no">Licence No</label>
				                        	<input type="text" name="lno" placeholder="Licence no..." class="form-lno form-control" id="form-email">
				                        </div>
	
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-name">Name</label>
				                        	<input type="text" name="name" placeholder="Name..." id="una" pattern="[a-zA-Z]{4,30}" title="Only Alphabets allowed" class="form-control">
				                        </div>
										<div class="form-group">
										<center>
				                        	<label class="sr-only" for="form-name">Gender</label>
				                        	<input type="radio" name="gen"  value="Male" id="form-gen">Male
											<input type="radio" name="gen" value="Female"  class="form-name" id="form-gen">Female
										</center>
				                        </div>
										
										<div class="form-group">
				                        	<label class="sr-only" for="form-mobile-no">Mobile No</label>
				                        	<input type="text" name="mno"  placeholder="Mobile no..." pattern="[789][0-9]{9}" title="Alphabets are not allowed.Starting with 7,8,9,only" class="form-mno form-control" id="form-email">
				                        </div>
									
	
									 <button type="submit"name="btn" >Sign me up!</button>
									 
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

  <?php
	include '../Shared/footerofdoclog.php';
 ?> <!-- Footer -->
  
        <!-- Javascript -->
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>