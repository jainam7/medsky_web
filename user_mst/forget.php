<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
	

      <meta charset="utf-10">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      

         
       <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../shared/assets1/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../shared/assets1/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../shared/assets1/css/form-elements.css">
        <link rel="stylesheet" href="../shared/assets1/css/style.css">

            
    
<style>
body
{
    background-color:green ;
}
button {
    background-color: #002633;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
.cancelbtn {
       width: 100%;
       background-color: #f44336;
    }


</style>
    </head>
    </head>

    <body>
	  
  <body>
   
    <?php
     require '../Shared/Classes/classusr.php';
    ?>
<br><br>
<br>
<div class="col-sm-4"></div>
 
<div class="col-md-5">
 
 <div class="form-box">
     <div class="form-top">
         <div class="form-top-left">
             <h3>Forget Password Form</h3>
             <p>Click on button for Getting your Password....</p>
         </div>
         <div class="form-top-right">
         
         </div>
     </div>
     <div class="form-bottom">
         <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="registration-form">
             <div class="form-group">
                 <label class="sr-only" for="form-email">Email id</label>
                 <input type="text" name="id"  value="" placeholder="Enter Email ID..."class="form-email form-control"required>
             </div>
           
          <div class="control-group">
									<button type="submit"name="num1">Get Password??</button>
									<hr>
                                    <?php
                                if(isset($_POST["num1"]))
                                {
                                    $enteredid=$_POST["id"];
                                    $cnn=new usr_all;
                                    $result=$cnn->selectbyid($enteredid);
                                    if($result->num_rows==1)
                                    {
                                        $_SESSION["pid"]=$enteredid;
                                        header('location:emaildemousr.php');
                                    }
                                    else
                                    {
                                        echo "Please enter valid user id";
                                    }
                                }
                                    ?>
										</div>

</body>
</html>