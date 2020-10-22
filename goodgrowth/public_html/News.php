<?php    include("file/header.php");?>

	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg);">
    	<div class="auto-container">
        	<div class="inner-box">
                <h1>News</h1>
                <ul class="bread-crumb">
                	<li><a href="index.php">Home</a></li>
                    <li>News</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--About Section-->
    <section class="about-section">
    	<div class="auto-container">
     <div class="sec-title">
     <?php 
        $news= $mysql->select("select * from _tbl_Web_News where NewsID='".$_GET['NewsID']."'");
     ?>
            	<div class="title"><?php echo $news[0]['NewsTitle'];?></div>
                <div class="text" style="padding-left:10px;font-size:13px;color:#aaa"><?php echo  date("M Y, d, H:i",strtotime($news[0]['Created']));?> 
             
                <div class="text" style="padding-left:5px;padding-top:20px"><?php echo  nl2br($news[0]['NewsDetails']);?> 
</div>
            </div>
        </div>
    </section>
    <!--End About Section-->
    

    <!--Volunter Section-->
     
    <!--End Volunter Section-->
    
    <!--Counter Section-->
     
    <!--End Counter Section-->
    


    <!--End Sponsors Style One-->
   <?php  include("file/footer.php");?>
