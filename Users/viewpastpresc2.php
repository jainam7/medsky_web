<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
  session_start();
    include '../Shared/link.php';
    ?>
  </head>  
  
  <body class="size-1140">
  	<!-- PREMIUM FEATURES BUTTON 
  	<a target="_blank" class="hide-s" href="../template/prospera-premium-responsive-business-template/" style="position:fixed;top:120px;right:-14px;z-index:10;"><img src="img/premium-features.png" alt=""></a>

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
    <?php
$pid=$_GET["pid"];
require '../Shared/Classes/classpresc1.php';
$cnn=new pre;
$result=$cnn->getprescriptionbyid($pid);
$row=$result->fetch_assoc();
$medids= $row["col_medids"];
$morning=$row["pres_morning"];
$noon=$row["pres_noon"];
$night=$row["pres_night"];
$instr=$row["pres_instr"];
$days=$row["pres_day"];
$medidsarray=explode(",",$medids);
$morarray=explode(",",$morning);
$nonarray=explode(",",$noon);
$nigarray=explode(",",$night);
$insarray=explode(",",$instr);
$dayarray=explode(",",$days);
$doctorid=$row["fk_doc_email_id"];
$usrid=$row["fk_usr_email_id"];
$date=$row["pres_date"];
for($i=0;$i<count($medidsarray)-1;$i++)
{
  $resule=$cnn->medicinenamebyid($medidsarray[$i]);
  $row=$resule->fetch_assoc();
  $medicinenamearray[$i]=$row["med_name"];
}
    ?>
    <main role="main">
  <!--<header class="section background-primary text-center">
  -->
  <text align="center"><h1>View Prescription</h1></text>
  
<!--</header>-->
<table class="table table-sm">
<thead>
  <tr align="center">
      <th scope="col">Doctor ID</th>
      <td scope="col"><?php echo $doctorid; ?></th>
      <th scope="col">Patient ID</th>
      <td scope="col" colspan="2"><?php echo $usrid; ?></th>
      <th scope="col">Date</th>
      <td scope="col"><?php echo $date; ?></th>
  
  

  </tr>
    <tr align="center">
      <th scope="col">Sr.No</th>
      <th scope="col">Medicine Name</th>
      <th scope="col">Instruction</th>
      <th scope="col">Morning Dosage</th>
      <th scope="col">Noon Dosage</th>
      <th scope="col">Night Dosage</th>
      <th scope="col">Days Required</th>
    </tr>
  </thead>
  <tbody>
<?php
$cnt=1;
$i=0;
for($i=0;$i<count($medicinenamearray);$i++)
{
  echo '<tr align="center">
  <th scope="col">'.$cnt.'</th>
  <th scope="col">'. $medicinenamearray[$i].'</th>
  <th scope="col">'.$insarray[$i].'</a></th>
  <th scope="col">'.$morarray[$i].'</a></th>
  <th scope="col">'.$nonarray[$i].'</a></th>
  <th scope="col">'.$nigarray[$i].'</a></th>
  <th scope="col">'.$dayarray[$i].'</a></th>
  </tr>';
  $cnt++;
}
?>
<tr><th colspan="7"></th></tr>
<tr><th colspan="7"></th></tr>
<tr><th colspan="7" align="right">Authrised Signatory</th></tr>
<tr><th colspan="4"><center><button onclick="window.print()" class="submit-form button background-primary border-radius text-white">Print Prescription</button></center></th></tr>
</tbody>
</table>
      
    </main>
    
    <!-- MAIN -->
      <!-- Bottom Footer -->
      <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>