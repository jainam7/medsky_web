
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
  session_start();
    include '../Shared/Assets/links.php';
    ?>
  </head>  
  
  <body class="size-1140">
  	<!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
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
      
    </header>
    
    <!-- MAIN -->
    <main role="main">
    <?php
   $mname=$_POST["medname"];
   $cname=$_POST["comname"];
   $mtype=$_POST["medicinetype"];
   $muse=$_POST["editor1"];
    include '../Shared/Classes/classpresc1.php';
    $conn=new pre();

    
    
  
$result=$conn->insertmedicine($mname,$cname,$muse,$mtype);

    if($result==true)
    {
        echo '<h1>Medicine Inserted Successfully Inserted!!!</h1>';
        $f=1;
    }
    else
    {
        echo '<h1>Medicine Can`t Successfully Inserted!!!</h1>';
        $f=0;
    }
    
    ?>
    
    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <h2><tr><td></td><td colspan="2"><a href="insertmedicine1.php" class="submit-form button background-primary border-radius text-white">Click Here to Insert another Medicine.</a></td></tr></h2>
                      </div>
                    </div>
    </main>
    
    <!-- FOOTER -->
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>