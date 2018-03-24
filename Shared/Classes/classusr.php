<?php
class usr_all
{
    /*use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    */
    private static $conn=null;
    public static function  connect()
    {
        self::$conn=mysqli_connect("localhost","root","","medsky");
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn=null;
    }
    public function select_all()
    {
        $cnn=usr_all::connect();
        $q="select * from user_mst";
        $result=$cnn->query($q);
        return $result;
        usr_all::disconnect();
    }
     public function loginselect($id,$pass)
    {
        $cnn=usr_all::connect();
        $q='select * from user_mst where pk_usr_email_id="'. $id .'"'.' and usr_pass="'. $pass .'"';
        $result=$cnn->query($q);
        return $result;
        usr_all::disconnect();
    }    
    public function isverified($id,$token)
    {
        $cnn=usr_all::connect();
        $q='select * from user_mst where pk_usr_email_id="'. $id .'"'.' and usr_token="'. $token .'"';
        $result=$cnn->query($q);
        $row=$result->fetch_assoc();
        if($row["usr_token"]===$token)
        {
            return true;
        }
        else
        {
        return false;
        }
        usr_all::disconnect();
    }
      public function verificationupdate($id,$t)
    {
       $cnn=usr_all::connect();
       $p=1;
        $q="update user_mst set usr_verify='". $p ."' where pk_usr_email_id='". $id ."' and usr_token='".$t."'";
//        echo $q;
         $result=$cnn->query($q);
       return $result;
        usr_all::disconnect();  
    }
    public function verify($id,$name,$token)
    {

                   
         require_once "../MailAssets/vendor/autoload.php";

         $rmail=$id;
         
         $link='<h3>Respected Sir/Medam,<p><b>Greeting from Medsky.com!!!</b> Congratulations!! You had signed up successfuly.Kindly Verify Your account.'.$name.'</h1><a href="localhost/Medsky1.1/user_mst/usrverify.php?token='.$token.'&id='.$rmail.'&name='.$name.'"><h1>Please Click here to Verify your account!!!</h1></a></p>';
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

    }
  public function insert($id,$name,$mno,$pass,$gen,$img,$bgrp,$bdate,$token,$type)
       {
           $cnn=usr_all::connect();
           $vari=0;      
           //$usertype="User";
           $q="insert into user_mst values ('". null ."','". $id ."','". $name ."','". $mno ."','". $pass ."','". $gen ."','". $img ."','". $bgrp ."','". $bdate ."','". $vari ."','". $token ."','".$type."')";
         //  echo $q;        
           $result=$cnn->query($q);
           return $result;
           usr_all::disconnect();
   
       }
       public function getpassword($enteredid)
       {
           $cnn=usr_all::connect();
            $q='select usr_pass from user_mst where pk_usr_email_id="'. $enteredid .'"';
           $result=$cnn->query($q);
           $row=$result->fetch_assoc();
           $pass=$row["usr_pass"];
           return $pass;
           usr_all::disconnect();
          }
          public function selectbyid($id)
          {
               $cnn=usr_all::connect();
              $q="select * from user_mst where pk_usr_email_id="."'$id'";
              $result=$cnn->query($q);
              return $result;
              usr_all::disconnect();
          }
          public function chngpass($id,$oldpass,$newpass){
            $cnn=usr_all::connect();
            $sql="select * from user_mst where pk_usr_email_id='".$id."' and usr_pass='".$oldpass."' ";
            $res=$cnn->query($sql);
            if($res->num_rows==1){
                $sql="update user_mst set usr_pass='".$newpass."' where pk_usr_email_id='".$id."' ";
                $res=$cnn->query($sql);
                return $res;
            }
            else{
                return "User / Pass is incorrect";
            }
            usr_all::disconnect();

        }
         
   
   
   
}
?>