<?php
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
    
    <!-- MAIN -->
    <main role="main">
    <!--<header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Confirm Prescription</h1>
        </header>-->
        <text align="center"><h1>Confirm Prescription</h1></text>
        <table>
        <form class="customform" name="writepresc2" action="writepresc3.php" method="post">
        <div class="line">
            <?php

            include '../Shared/Classes/classpresc1.php';
            $conn=new pre();
          

                    $notes="-";
                    $j=0;
                    $mcnt=1;
                    echo '<tr><td>Sr.No</td><td>Medicine Name</td><td>Morning Dose</td><td>Noon Dose</td><td>Night Dose</td><td>Days</td><td>Instructions</td></tr>';
                    $mname="med".$mcnt;
                  for($u=1;$u<=10;$u++)
                   {
                    if($_POST["$mname"]=="NoMedicineSelected")
                    {
                      break;
                    }
                    
                      
                      $iname="instr".$mcnt;
                      $morname="mor".$mcnt;
                      $nonname="non".$mcnt;
                      $nigname="nig".$mcnt;
                      $day="day".$mcnt;
                 /*   if($_POST["$mname"]==null)
                    {
                      $mcnt--;
                      break;
                    }
                  */
                    /*if()
                    {
                      break;
                    }*/
                    echo '<input type="hidden" name="mor'.$mcnt.'" value="'.$_POST["$morname"].'">';
                    
                    echo '<input type="hidden" name="non'.$mcnt.'" value="'.$_POST["$nonname"].'">';

                    echo '<input type="hidden" name="nig'.$mcnt.'" value="'.$_POST["$nigname"].'">';

                    echo '<input type="hidden" name="ins'.$mcnt.'" value="'.$_POST["$iname"].'">';

                    echo '<input type="hidden" name="day'.$mcnt.'" value="'.$_POST["$day"].'">';

                    echo '<input type="hidden" name="med'.$mcnt.'" value="'.$_POST["$mname"].'">';
                    echo '<div class="margin">'.
                      '<div class="s-12 m-12 l-6">';
                      $result=$conn->medicinenamebyid($_POST["$mname"]);
                      $row=$result->fetch_assoc();
                      
                      echo '<tr><td>'.$mcnt.'</td><td>'.$row["med_name"].'</td>';
                     echo '<td>'.$_POST["$morname"].'</td>';
                     echo '<td>'.$_POST["$nonname"].'</td>';
                     echo '<td>'.$_POST["$nigname"].'</td>';
                     echo '<td>'.$_POST["$day"].'</td>';
                     echo '<td>'.$_POST["$iname"].'</td></tr>';
                     
                      
                     echo '</div>'.
                    '</div>';
                    $mcnt++;
                    $mname="med".$mcnt;
                  }
                
                  $mcnt--;
            ?>
                  <div class="margin">
                      <div class="s-12 m-12 l-6">
                        
                          <strong>
                        <?php
                      
                               echo '<input type="hidden" name="mcnt" value="'.$mcnt.'">';
                               
                       /* if($_POST["notes"]==null)  
                        {
                          echo '<input type="hidden" name="note" value="No Notes">';
                          
                          echo '<label>No Notes</label>';
                        }
                        else
                        {
                          echo '<input type="hidden" name="note" value="'.$_POST["notes"].'">';
                          
                          echo '<label>'.$_POST["notes"].'</label>';
                        }*/
                        ?>
                      </strong>
                      
                      </div>
                    </div>

                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <tr><td></td><td colspan="2"><button name="sub1" class="submit-form button background-primary border-radius text-white" type="submit">Submit Precription</button></td></tr>
                      </div>
                    </div>

</div>
                </form>
        </table>
          </main>
    
     <!-- FOOTER -->
     <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>