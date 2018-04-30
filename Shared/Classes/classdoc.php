<?php
class doc_all
{
    
    
    private static $conn=null;
    public static function  connect()
    {
        //self::$conn=mysqli_connect("sql12.freemysqlhosting.net","sql12228778","dSUWZ6DakP","sql12228778");
        //self::$conn=mysqli_connect("localhost","root","","medsky");
        self::$conn=mysqli_connect('sql12.freemysqlhosting.net','sql12235011','CWflEeDvDX','sql12235011');
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn=null;
    }
    public function select_all()
    {
        $cnn=doc_all::connect();
        $q="select * from doctor_mst";
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
     public function loginselect($id,$pass)
    {
        $cnn=doc_all::connect();
        $q='select * from doctor_mst where pk_doc_email_id="'. $id .'"'.' and doc_pass="'. $pass .'"';
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
    public function updatedetails($did,$pass,$lic,$dname,$add,$gen,$mob,$spec,$deg)
    {
       $cnn=doc_all::connect();
        $q="update doctor_mst set doc_pass='". $pass ."' ,doc_lic_no='".$lic."',doc_name='".$dname."',doc_add='".$add."',doc_gen='".$gen."',doc_mno='".$mob."',fk_spec_id='".$spec."',fk_deg_id='".$deg."' where pk_doc_email_id='". $did ."'";
         $result=$cnn->query($q);
       return $result;
        doc_all::disconnect();  
    }
    public function isverified($id,$token)
    {
        $cnn=doc_all::connect();
        $q='select * from doctor_mst where pk_doc_email_id="'. $id .'"'.' and doc_token="'. $token .'"';
        $result=$cnn->query($q);
        $row=$result->fetch_assoc();
        if($row["doc_token"]==$token)
        {
            return true;
        }
        else
        {
        return false;
        }
        doc_all::disconnect();
    }
      public function verificationupdate($did,$t)
    {
       $cnn=doc_all::connect();
       $p=1;
        $q="update doctor_mst set doc_verify='". $p ."' where pk_doc_email_id='". $did ."' and doc_token='". $t ."'";
//        echo $q;
         $result=$cnn->query($q);
       return $result;
        doc_all::disconnect();  
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

    public function insert($did,$pass,$lno,$name,$spec,$deg,$img,$add,$gen,$mno,$token)
    {
        $cnn=doc_all::connect();
        $vari=0;      
        //$usertype="User";
        
        $q="insert into  doctor_mst values ('".null."','". $did ."','". $pass ."','". $lno ."','". $name ."','". $spec ."','". $deg ."','". $img ."','". $add ."','".$gen."','". $mno ."','". $vari ."','".$token."')";
        //echo $q;     
      
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();

    }
    public function selectbyid($id)
    {
         $cnn=doc_all::connect();
        $q="select * from doctor_mst where pk_doc_email_id="."'$id'";
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
    public function addinfo($id,$fk_spec_id,$fk_deg_id,$img,$add)
    {
        $cnn=doc_all::connect();
        $q="insert into doctor_mst values('". $fk_spec_id ."','". $fk_deg_id ."','". $img ."','". $add ."' where pk_doc_email_id='". $id ."')";
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
    public function getpassword($enteredid)
    {
        $cnn=doc_all::connect();
         $q='select doc_pass from doctor_mst where pk_doc_email_id="'. $enteredid .'"';
        $result=$cnn->query($q);
        $row=$result->fetch_assoc();
        $pass=$row["doc_pass"];
        return $pass;
        doc_all::disconnect();
       }
       public function chngpass($id,$oldpass,$newpass){
        $conn=doc_all::connect();
        $sql="select * from doctor_mst where pk_doc_email_id='".$id."' and doc_pass='".$oldpass."' ";
        $res=$conn->query($sql);
        if($res->num_rows==1){
            $sql="update doctor_mst set doc_pass='".$newpass."' where pk_doc_email_id='".$id."' ";
            $res=$conn->query($sql);
            return $res;
        }
        else{
            return "User / Pass is incorrect";
        }
        doc_all::disconnect();
    }
    

}
?>
