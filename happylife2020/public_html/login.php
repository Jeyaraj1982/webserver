<?php
    include_once("config.php");
    include_once("includes/header.php");
?>
   <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary background-transparent text-center"  data-image-src="assets/img/parallax-02.jpg" style="padding:50px !important">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Member Login</h1>
            <div class="background-parallax" style="background-image:url(assets/img/parallax-06.jpg)"></div>
        </header>
        
        <div class="section background-white"> 
        
          <div class="line">
           
          
           <div class="margin" style="max-width: 350px;margin:0px auto;">
            <h2 class="text-size-30" style="text-align: center;">Member Login</h2>
               
            
                 <?php
                 include_once("memberlogin.php"); 
             ?>
                
                 
           <div style="text-align:center;font-size:15px;">Already a member? <a href="joinnow.php" class="text-primary-hover" style="color:#00B5A6; ">Login Now</a>    </div>
            </div>
        </div>
        
    
      </article>
    </main>
<?php include_once("includes/footer.php"); ?>    