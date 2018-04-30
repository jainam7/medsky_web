
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
$add=$row["doc_add"];
$specialist=$row["fk_spec_id"];
$degree=$row["fk_deg_id"];
$pass=$row["doc_pass"];

?>

<?php
    if(isset($_POST["btn1"]))
    {
      $dname=$_POST["nm"];
      $pass=$_POST["pass"];
      $uid=$_SESSION["id"];
      $lic=$_POST["lno"];
      $mob=$_POST["mno"];
      $gen1=$_POST["gen"];
      $spec=$_POST["spec"];
      $deg=$_POST["deg"];
      $add=$_POST["add"];
      $cnc=new doc_all();
      $res=$cnc->updatedetails($uid,$pass,$lic,$dname,$add,$gen1,$mob,$spec,$deg);
      if($res===true)
      {
        header('location:docprofile.php');
      }
      else
      {
          echo 'Can`t Updated Details Successfully';
      }
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
                 <td><input type="text" name="nm" size="100"cols="5" value="<?php echo $name; ?>">&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;</td>
                 </tr>
             </div>
            <div class="form-group">
                <tr>            
                 <td><b><label class="sr-only" for="form-password">Password :-</label></td>
                 <td><input type="text" name="pass" size="100" value="<?php echo $pass; ?>" class="form-passwd form-control" ></td>
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
                 <td><input type="text" name="lno" size="100" value="<?php echo $lno; ?>"placeholder="Licence no..." class="form-lno form-control" id="form-email"></td>
                 </tr>
             </div>

             <div class="form-group">
             <tr>
                 <td><b><label class="sr-only" for="form-name">Mobile No :-</label></td>
                 <td><input type="text" name="mno" size="100" value="<?php echo $mob; ?>" placeholder="Name..." class="form-name form-control" id="form-name"></td>
                 </tr>
             </div>
             <div class="form-group">
             <tr>
             <td><b><label class="sr-only" for="form-name">Gender :-</label></td>
             <td>
                <input type="radio" value="Male" size="100"  name="gen" class="form-control" class="input-text " <?php if($gen=="Male" || $gen=="male"){echo "checked";} ?>>Male
                <input type="radio" value="Female" size="100"  name="gen" class="form-control" class="input-text " <?php if($gen=="Female" || $gen=="female"){echo "checked";} ?> >Female
             </center></td>
             <!--<td><input type="text" value="<?php echo $gen; ?>"size="100" placeholder="" id="" name="gen"class="form-control" class="input-text " ></center></td>-->
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
                        if($rw["pk_spec_id"]==$specialist)
                        {
                            echo '<option value="'.$rw["pk_spec_id"].'" selected>'.$rw["spec_name"].'</option>';
                        }
                        else
                        {
                            echo '<option value="'.$rw["pk_spec_id"].'" >'.$rw["spec_name"].'</option>';
                        }
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
                    if($rw["pk_deg_id"]==$degree)
                    {
                        echo '<option value="'.$rw["pk_deg_id"].'" selected>'.$rw["deg_name"].'</option>';    
                    }
                    else
                    {
                    echo '<option value="'.$rw["pk_deg_id"].'" >'.$rw["deg_name"].'</option>';
                    }

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
            <td><textarea rows="5" name="add" cols="50"size="100" placeholder="Address..."><?php
                echo $add;
            ?></textarea></td>
            </tr>
        
             </div>
             <tr>
             
          <td>  <font size="12"><button type="submit" name="btn1" >Update Details</button></td>
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
   
