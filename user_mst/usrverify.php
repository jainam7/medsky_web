<?php
session_start();
if(!(empty($_SESSION["name"])))
	{
		header('location:usrpro.php');
	}
    require '../Shared/Classes/classusr.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
  <?php
    include '../Shared/link.php';
    ?>
  
	</head>

    <body>

   
   

                    <?php
                        $token=$_GET["token"];
                        $id=$_GET["id"];
						$name=$_GET["name"];
                        $conn=new usr_all;
                        $result=$conn->isverified($id,$token);
                        if($result===true)
                        {
                            $result=$conn->verificationupdate($id,$token);
                            if($result===true)
                            {
								$_SESSION["id"]=$id;
								$_SESSION["name"]=$name;
								$f=1;
								echo	'<h4 class="title"><span class="text"><strong>You Had Verified Successfully!!! <a href="../Visitors/index.php">You had successfully verified!!!Click Here to Proceed further.</a></a></strong></span></h4>';
                            }
                        }
                        else
                        {
                            echo "Can`t Verified Successfully";
                        }

                    ?>			
					



  </body>
</html>
