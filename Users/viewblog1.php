<?php
include '../Shared/Assets/conditionforlogin1.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
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
            <text align="center"><h1>Your Blogs</h1></text>
  
<!--</header>-->
<table class="table table-sm">
<thead>
    <tr align="center">
      <th scope="col">Sr. No.</th>
      <th scope="col">Blog Title</th>
      <th scope="col">Blog Description</th>
      <th scope="col">Blog Date</th>
    <!--  <th scope="col">Total Likes</th>-->
    </tr>
  </thead>
  <tbody>
<?php
include '../Shared/Classes/classblog.php';
$conn=new blogs();
$result=$conn->getblogsofdoctor($_SESSION["id"]);
$cnt=1;
while($row=$result->fetch_assoc())
{
  echo '<tr align="center">
  <th scope="col">'.$cnt.'</a></th>
  <th scope="col">'.$row["blog_title"].'</a></th>
  <th scope="col">'.$row["blog_desc"].'</a></th>
  <th scope="col">'.$row["blog_date"].'</a></th>

  </tr>';
  $cnt++;
  //  <th scope="col">'.$row["COUNT(l.like_id)"].'</a></th>
}
?>
</tbody>
</table>
      
    </main>




      <!-- Bottom Footer -->
      <?php
      include '../Shared/indexfooter.php';
      ?>
   </body>
</html>