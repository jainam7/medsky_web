<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include '../Shared/Assets/conditionforlogin.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
    include '../Shared/link.php';
    ?>
  </head>  
  <?php
if(!(isset($_POST["sub1"])))
{
   header('location:writepresc1.php');
}

  ?>
  <body class="size-1140">
  	<!-- HEADER -->
    <?php
    if(empty($_SESSION["id"]))
    {
      include '../Shared/header.php';
    }
    else
    {
      include '../Shared/header1.php';
    }
  ?>
   
    <main role="main">
    <text align="center"><h1>Submission of Prescription</h1></text>
        
        <table>
        <div class="line">
            <?php
            
            require '../Shared/Classes/classpresc1.php';
            $cnn=new pre;
                    $medicines=null;
                    $days=$mornings=$noons=$nights=$instructions=null;
                    for($i=1;$i<=$_POST["mcnt"];$i++)
                    {
                        $mname="med".$i;
                        $iname="ins".$i;
                        $morname="mor".$i;
                        $nonname="non".$i;
                        $nigname="nig".$i;
                        $day="day".$i;
  
                        $medicines=$medicines.$_POST["$mname"].",";
                        $days=$days.$_POST["$day"].",";
                        $mornings=$mornings.$_POST["$morname"].",";
                        $noons=$noons.$_POST["$nonname"].",";
                        $nights=$nights.$_POST["$nigname"].",";
                        $instructions=$instructions.$_POST["$iname"].",";                        
                        
                    }
                    
                    /*echo $medicines.'<br>';
                    
                    echo $days.'<br>';
                    
                    echo $mornings.'<br>';
                    
                    echo $noons.'<br>';
                    
                    echo $nights.'<br>';
                    
                    echo $instructions.'<br>';*/
                   
                    
                    
                    $uid=$_SESSION["pid"];
                    $did=$_SESSION["id"];
                     $result=$cnn->insertmd($did,$uid,$medicines,$mornings,$noons,$nights,$instructions,$days);
                      if($result==true)
                      {
                          $f=1;
                      }
                      else
                      {
                        $f=0;    
                      }
                   if($f==0)
                   {
                     echo '<h2>Can`t Inserted to Database.Some error occured.Please Start again.</h2>';
                   }
                   else
                   {
//Here Starts Mailing
//Here Is Body
date_default_timezone_set('Asia/Kolkata');
$timestamp = time();
$date_time = date("d-m-Y (D) H:i:s", $timestamp);
$res=$cnn->getpatientname($_SESSION["pid"]);
$row=$res->fetch_assoc();
$patname=$row["usr_name"];

$res=$cnn->getdoctorname($_SESSION["id"]);
$row=$res->fetch_assoc();
$docname=$row["doc_name"];


$medskybody='<p align="center">
<font color="red" size="10">
    Medsky</font>
<font color="blue" size="5">
    </p>
<p>
        Respected Sir/Medam,
    <p>
            Here is Your Prescription Details.
            You can also view this prescription in our app called as "Medsky".
            <a href="">Download that app from here</a>
    </p>
</p>
</font>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<table border="4" style="font-family:arial;" class="table">
<form>
        
<tr><td colspan="3">Date:</td><td colspan="3">'.$date_time.'</td></tr>
<tr><td>Doctor Name</td><td colspan="2">'.$docname.'</td><td>Patient Name</td><td colspan="2">'.$patname.'</td></tr>
<tr rowspan="2">
<th>Medicine Name</th>
<th>Days</th>
<th colspan="3">Frequency</th>
<th>Instruction</th>
</tr>
<tr>
<td></td>
<td></td>
<td>Morning</td>
<td>Afternoon</td>
<td>Night</td>
<td></td>
</tr>';

for($i=1;$i<=$_POST["mcnt"];$i++)
{
    $mname="med".$i;
    $iname="ins".$i;
    $morname="mor".$i;
    $nonname="non".$i;
    $nigname="nig".$i;
    $day="day".$i;
    $res=$cnn->medicinenamebyid($_POST["$mname"]);
    $row=$res->fetch_assoc();
    $medskybody=$medskybody.'<tr>  
    <td>'.
    $row["med_name"].'</td>
    <td>'.$_POST["$day"].'</td>
    <td>'.$_POST["$morname"].'</td>
    <td>'.$_POST["$nonname"].'</td>
    <td>'.$_POST["$nigname"].'</td>
    <td>'.$_POST["$iname"].'</td></tr>';                        
    
}
$medskybody=$medskybody.''.'</form>
</table>';


//Here is Ending of Body

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require '../Shared/MailAssets/vendor/autoload.php';


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
    $mail->setFrom('medskyy@gmail.com', 'Medsky.com');
    $email1=$_SESSION["pid"]; 
    $mail->addAddress($email1, 'Respected Sir/Medam');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('medskyy@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Prescription';
    $mail->Body    = $medskybody;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $msg = "We had send one copy of Prescription to patient`s registered email id.He/She can checkout there.";
    echo $msg;
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}








                     echo '<h1><ul><li>Precription Inserted Successfully.</li><li>User can also view this precription to Our app "Medsky".</li></ul></h1>';
                   }

                    /*
                    $cnt=1;
                    $mname=null;  
                    $time1=$time2=$time3=null;
                    $t1=1;
                    $t2=2;
                    $t3=3;
                    $times1=null;
                    $times2=null;
                    $times3=null;
                    $notes="-";
                    for($cnt=1;$cnt<=10;$cnt++)
                    {
                      $times1=null;
                      $times2=null;
                      $times3=null;
                      
                      $mname="med".$cnt;
                    $time1="chb".$cnt.$t1;
                    $time2="chb".$cnt.$t2;
                    $time3="chb".$cnt.$t3;
                    if(isset($_POST["$time1"]))
                    {
                            $times1="Morning/Noon";
                    }
                    if(isset($_POST["$time2"]))
                    {
                            $times2="Evening";        
                    }
                    if(isset($_POST["$time3"]))
                    {
                      
                            $times3="Night";
                    }
                    if($_POST["$mname"]==null)
                    {
                      break;
                    }
                    
                    echo '<input type="hidden" name="med"'.$cnt.'" value="'.$_POST["$mname"].'">';
                    echo '<div class="margin">'.
                      '<div class="s-12 m-12 l-6">'.
                      '<tr><td><label>Medicine'.$cnt.'</label></td><td><label>'.$_POST["$mname"].'</label></td></tr>';
                      
                      echo '<tr><td><label>Timings</label></td><td><label>'.$times1.','.$times2.','.$times3.'</label></td></tr>';
                      
                     echo '</div>'.
                    '</div>';
                    }*/
            ?>
                  <div class="margin">
                      <div class="s-12 m-12 l-6">
                          <strong>
                        <?php
                       /* if($_POST["notes"]==null)  
                        {
                            echo '<label>No Notes</label>';
                        }
                        else
                        {
                          echo '<label>'.$_POST["notes"].'</label>';
                        }*/
                        ?>
                      </strong>
                      </td></tr>
                      </div>
                    </div>

                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <h2><tr><td></td><td colspan="2"><a href="writepresc1.php" class="submit-form button background-primary border-radius text-white">Click Here to Write Another Presription.</a></td></tr></h2>
                      </div>
                    </div>

</div>
        </table>
          </main>
    
    <!-- FOOTER -->
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>