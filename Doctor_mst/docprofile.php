
<?php
     session_start();
?>
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

<!DOCTYPE html>

<html lang="en-US">
  <head>
  <?php
  //  include '../Shared/Assets/links.php';
  include '../Shared/link.php';
    ?>

    <link rel="stylesheet" href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="choosen.js"></script>



            
    
            <style>
body
{
    background-color:#002633 ;
}
button {
    background-color: #49BF4C;
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
  
  <body class="size-1140">
  	<!-- HEADER -->
    




    <?php
  if(empty($_SESSION["id"]))
	{
//header('location:../Visitors/usrloginandregister.php');
$name="Please Sign In";
$id="0";
	}
    else
    {

 
$id=$_SESSION["id"];
    }
    
    require '../Shared/Classes/classdoc.php';
    ?>
    <?php
    //  include '../Shared/link.php';
     // require '../shared/header.php';
       
    ?>
    

	<?php

$id=$_SESSION["id"];
$conn=new doc_all;
$result=$conn->selectbyid($id);
$row=$result->fetch_assoc();
$lno=$row["doc_lic_no"];
$name=$row["doc_name"];
$mob=$row["doc_mno"];
$gen=$row["doc_gen"];

?>
<!--?php
    $conn=new spec_all;
    $result=$conn->insert($na);
    $row=$result->fetch_assoc();
    $na=$_POST["spec"];
    
    
?>-->
<?php
    if(isset($_POST["btn1"]))
    {
        echo '<form action="a.php"method="post"> </form>';
    }
?>
 
 <div class="col-sm-4"></div>
 

 <font size="5"color="white">Profile...</font>
         
     <div class="form-bottom" align="left">
         <form role="form" action="docprofile.php" method="post" class="registration-form">
         <table height="60%"width="100%">
             <div>
                <tr>
                <td><font size=""><b> <label class="sr-only" for="form-email">Name :- </label></td>
                 <td><input type="text" name="nm" size="100"cols="5" value="<?php echo $name; ?>"readonly>&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;</td>
                 </tr>
             </div>
            <div class="form-group">
                <tr>            
                 <td><b><label class="sr-only" for="form-password">Email id :-</label></td>
                 <td><input type="text" name="id"size="100" value="<?php echo $id; ?>" class="form-passwd form-control" readonly></td>
                 </tr>
             </div>
             <div class="form-group">
                <tr>
                 <td><b><label class="sr-only" for="form-doclic-no">Licence No :-</label></td>
                 <td><input type="text" name="lno" size="100" value="<?php echo $lno; ?>"placeholder="Licence no..." class="form-lno form-control" id="form-email"readonly></td>
                 </tr>
             </div>

             <div class="form-group">
             <tr>
                 <td><b><label class="sr-only" for="form-name">Mobile No :-</label></td>
                 <td><input type="text" name="mno"size="100" value="<?php echo $mob; ?>" placeholder="Name..." class="form-name form-control" id="form-name"readonly></td>
                 </tr>
             </div>
             <div class="form-group">
             <tr>
             <td><b><label class="sr-only" for="form-name">Gender :-</label></td>
             <td><input type="text" value="<?php echo $gen; ?>"size="100" placeholder="" id="" name="gen"class="form-control" class="input-text " readonly></center></td>
             </tr>
        
             </div>
           
             <div class="form-group">
             <tr>
             <td><b><label class="sr-only" for="form-name">Specialist :-</label></td>
             <td>
             <select class="chosen" name="spec" style="width:500px;">
                <?php
                    require '../Shared/Classes/classspeci.php';
                    $cn1=new spec_all();
                    $res=$cn1->select_all();
                    while($rw=$res->fetch_assoc())
                    {
echo '<option value="'.$rw["pk_spec_id"].'">'.$rw["spec_name"].'</option>';
                    }

                ?>
                </select>
             </td>
            </tr>
             </div>
            
             <div class="form-group">
            <tr>
             <td><b><label class="sr-only" for="form-name">Degree :-</label></td>
             <td>
                <select name="deg" style="width:500px;" class="chosen">
                <?php
                require '../Shared/Classes/classdeg.php';
                $cn2=new deg_all();
                $res=$cn2->select_all();
                while($rw=$res->fetch_assoc())
                {
                    echo '<option value="'.$rw["pk_deg_id"].'">'.$rw["deg_name"].'</option>';

                }
                 //   <input type="text" value=""size="100" placeholder="Degree..." id="" name="deg"class="form-control" class="input-text ">
                ?>
                </select>
             </td>
             </tr>
        
             </div>
           <!--  <div class="form-group">
             <label class="sr-only" for="form-name">Profile Pic</label>
             <input type="file" value="" placeholder="profile picture.." id="" name="pc"class="form-control" class="input-text ">
        
             </div>-->
             <div class="form-group">
             <tr>
            <td><b><label class="sr-only" for="form-name">Address :-</label></td>
            <td><textarea rows="5" cols="50"size="100"placeholder="Address..."></textarea></td>
            </tr>
        
             </div>
             <tr>
             <td>
           <center><font size="12"><button type="submit"name="btn">Add Details</button></center></td>
          <td>  <font size="12"><button type="submit"name="btn1" >Change Password</button></td>
             </tr>
             </table>
            </form>
           <!-- <form role="form" method="post" action="a.php">
            <table>
            <tr>
            <td>
            <center> <font size="12"><button type="submit"name="btn"size="20">Change Password</button></center></td>
            </td>
            </tr>
            </table>
            </form>-->
         
     </div>
 </div>
 
</div>
</div>

</div>
</div>
<?php
  include '../shared/indexfooter.php';
    ?>

</div>
<script type="text/javascript">
$(".chosen").chosen();
</script>
</body>
  </html>
   
