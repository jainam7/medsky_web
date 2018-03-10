<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
  session_start();
  include '../Shared/link.php';
  ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.carousel {
  width:800px;
  height:600px;
  margin:auto;
}
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
    <section class="section background-dark">
        <div class="line">
          <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows">
            <div class="item">
              <div class="s-12 center">
                <img src="../Shared/img/MainImgs/MedicalImg1.jpg" alt="">
                <div class="carousel-content">
                  <div class="padding-2x">
                    <div class="s-12 m-12 l-8">
                      <p class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1">Write Online Precription</p>
                      <p class="text-white text-size-16 margin-bottom-40">By this Site you can write Precription to any Patient.</p>  
                    </div>                  
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="s-12 center">
                <img src="../Shared/img/MainImgs/MedicalImg2.jpg" alt="">
                <div class="carousel-content">
                  <div class="padding-2x">
                    <div class="s-12 m-12 l-8">
                      <p class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1">View Prescription Online with One Tap</p>
                      <p class="text-white text-size-16 margin-bottom-30">Out Android/Ios App for Viewing Precription online</p>    
                    </div>                  
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </section>
      
    

    <!--
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner"></div>
    <div class="carousel-item active">
      <img class="d-block w-100" src="../Shared/img/MainImgs/MedicalImg1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Write Online Precription</h5>
        <p>By this Site you can write Precription to any Patient.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../Shared/img/MainImgs/MedicalImg2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>View Prescription Online with One Tap</h5>
        <p>Out Android/Ios App for Viewing Precription online</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../Shared/img/MainImgs/MedicalImg3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Paperless Process</h5>
        <p>All medical information are online on digital platform.So it becomes easy and paperless in terms of Availability and Accessbility.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


-->

<br><br><br><br><br>

<section class="section background-white">
        <div class="full-width text-center">
          <img class="center margin-bottom-30" style="margin-top: -210px;" src="../Shared/img/MainImgs/temp.jpg" alt="">
          <div class="line">
            <h2 class="headline text-thin text-s-size-30">Fully <span class="text-primary">Online</span>Coverage</h2>
            <p class="text-size-20 text-s-size-16 text-thin">MedSky is a comprehensive prescription/medication compliance and tracking App designed to help individuals and caretakers manage the challenges of staying on time up to date and on schedule with very simple to very complex regimes. Easy to install and full featured MedSky is ready to become your 24/7 healthcare assistant. Available on Android and IOS platforms.</p>
            <i class="icon-more_node_links icon2x text-primary margin-top-bottom-10"></i>
            
          </div>  
        </div>  
      </section>
      <hr class="break margin-top-bottom-0">


<section class="section background-primary text-center">
        <div class="line">
          <div class="s-12 m-10 l-8 center">
            <h2 class="headline text-thin text-s-size-30">Paperless Process</h2>
            <p class="text-size-20">
            All medical information are online on digital platform.So it becomes easy and paperless in terms of Availability and Accessbility.
            </p>
          </div>
        </div>  
      </section>
      <section class="section background-white">
        <div class="line">
          <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">From Our <span class="text-primary">Blog</span></h2>
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <div class="item">
              <div class="margin"> 
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="img/blog-05.jpg" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3><a class="text-dark text-primary-hover" href="/">Lorem Ipsum Dolor sit Amet</a></h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="img/blog-03.jpg" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3><a class="text-dark text-primary-hover" href="/">Lorem Ipsum Dolor sit Amet</a></h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>  
                  </div>
                </div> 
              </div>
            </div>
            <div class="item"> 
              <div class="margin"> 
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="img/blog-04.jpg" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3><a class="text-dark text-primary-hover" href="/">Lorem Ipsum Dolor sit Amet</a></h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="img/blog-02.jpg" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3><a class="text-dark text-primary-hover" href="/">Lorem Ipsum Dolor sit Amet</a></h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>  
                  </div>
                </div> 
              </div>
            </div>
            <div class="item">
              <div class="margin"> 
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="img/blog-01.jpg" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3><a class="text-dark text-primary-hover" href="/">Lorem Ipsum Dolor sit Amet</a></h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="img/blog-06.jpg" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3><a class="text-dark text-primary-hover" href="/">Lorem Ipsum Dolor sit Amet</a></h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>  
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </div>    
      </section>








      <!-- Bottom Footer -->
      <?php
      include '../Shared/indexfooter.php';
      ?>
   </body>
</html>