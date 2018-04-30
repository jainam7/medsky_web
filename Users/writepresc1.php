<?php
include '../Shared/Assets/conditionforlogin.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
  //  include '../Shared/Assets/links.php';
  include '../Shared/link.php';
    ?>

<!--  Search Box Links-->
<link rel="stylesheet" href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="choosen.js"></script>


  </head>  
  
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
  include '../Shared/Classes/classpresc1.php';
  $cnn=new pre();
  $result=$cnn->selectallmedicine();

?>

      
  
    <main role="main">
  <!--<header class="section background-primary text-center">
  -->
            <text align="center"><h1>Write Prescription</h1></text>
  
<!--</header>-->

<table>
  <tr><td>Doctor Id:</td><td><?php echo $_SESSION["id"]; ?></td><td>Doctor Name:</td><td><?php echo $_SESSION["name"]; ?></td></tr>          
  <tr><td>Patient Id:</td><td><?php echo $_SESSION["pid"] ?></td><td>Patient Name:</td><td><?php echo $_SESSION["pname"]; ?></td></tr>
  </table>
        <table class="table table-bordered">
        <form class="customform" name="writepresc1" action="writepresc2.php" method="post">
        <div class="line">
<div class="margin">
<div class="s-12 m-12 l-6">
<tr rowspan="2">
        <th>Medicine Name</th>
        <th>Instruction</th>
        <th colspan="3">Frequency</th>
        <th>Days</th>
</tr>
</div>
</div>

<div class="margin">
<div class="s-12 m-12 l-6">
<tr>
        <td></td>
        <td></td>
        <td>Morning</td>
        <td>Afternoon</td>
        <td>Night</td>
        <td></td>
</tr>
</div>
</div>
            <?php
                    $cnt=1;
                    for($cnt=1;$cnt<=10;$cnt++)
                    {

                        echo '<div class="margin">'.
                        '<div class="s-12 m-12 l-6">'.
                        '<tr>'.
                                '<td><select class="chosen" name="med'.$cnt.'" style="width:200px;">'.
                                //'<input type="text" placeholder="Medicine '.$cnt.'" name="med'.$cnt.'">
                                '<option value="NoMedicineSelected">Type Medicines Name Here</option>';
                              
                                while($row=$result->fetch_assoc())
                                {
                                echo '<option value="'.$row["pk_med_id"].'">'.$row["med_name"].'</option>';
                                }
                                $result=$cnn->selectallmedicine();
                                echo '</select></td>'.
                                '<td><textarea rows="3" placeholder="Notes" cols="35" name="instr'.$cnt.'"></textarea></td>'.
                                '<td><input type="number" pattern="[1-9]{2,3}" title="Positive Number Only" placeholder="Dosage for Morning" name="mor'.$cnt.'" required></td>'.
                                '<td><input type="number" placeholder="Doasage for Afternoon" name="non'.$cnt.'"></td>'.
                                '<td><input type="number" placeholder="Doage for Night" name="nig'.$cnt.'"></td>'.
                                '<td><input type="number" placeholder="How Many Days?" name="day'.$cnt.'"></td>'.
                        '</tr>'.
                        '</div>'.
                        '</div>';
                    }
                          
            ?>
            
  
                   

                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <tr><td></td><td colspan="2"><button name="sub1" class="submit-form button background-primary border-radius text-white" type="submit">Confirm Precription</button></td></tr>
                      </div>
                    </div>

</div>
                </form>
        </table>
      
    </main>
    
    <!-- FOOTER -->
    <script type="text/javascript">
$(".chosen").chosen();
</script>
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>