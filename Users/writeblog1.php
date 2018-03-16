<?php
include '../Shared/Assets/conditionforlogin1.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <script src="../Shared/ckeditor/ckeditor.js"></script>
  <?php
  //session_start();
  include '../Shared/link.php';
  ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>

</style>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>  
  
  <body class="size-1140">
  	<!-- PREMIUM FEATURES BUTTON 
  	<a target="_blank" class="hide-s" href="../template/prospera-premium-responsive-business-template/" style="position:fixed;top:120px;right:-14px;z-index:10;"><img src="img/premium-features.png" alt=""></a>
-->
<?php

if (empty($_SESSION["id"])) {
  include '../Shared/header.php';
} else {
  include '../Shared/header1.php';
}
?>
    
    <!-- MAIN -->

    <main role="main">
  <!--<header class="section background-primary text-center">
  -->
            <text align="center"><h1>Write Blogs</h1></text>
            <table>
            <form class="customform"  enctype="multipart/form-data" action="writeblog2.php" method="post">
            <div class="form-group">
               <tr><td><lable style="font-size: 20px;">Blog Title:</lable></td>
               <td><input type="text" class="form-control" placeholder="Enter Blog Title Here" name="btitle" required>
               </td></tr>
               </div>
               <div class="form-group">
                   <tr><td><label style="font-size: 20px;">Blog Description:</label></td>
                   <td><textarea name="editor1" class="form-control" required></textarea></td></tr>
                </div>
                <div class="form-group">
                   <tr><td></td><td><input style="font-size: 20px;" class="submit-form button background-primary border-radius text-white" type="submit" name="sub" value="Post"></td></tr>
                </div>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>
										
            </form>
            </table>


</main>
    



      <!-- Bottom Footer -->
      <?php
      include '../Shared/indexfooter.php';
      ?>
   </body>
</html>