<?php include_once("header.php")?>
  
  <?php
               $Event = $mysql->select("select * from _tbl_events where md5(EventID)='".$_GET['event']."' and   IsPublish='1'");  
                $images = $mysql->select("select * from _tbl_events_images where IsDelete='0' and EventID='".$Event[0]['EventID']."' order by ImageOrder");
        ?>      
		<!-- Start Page Title Area -->
		<div class="page-title">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="page-title-text">
                                    <h3><?php echo $Event[0]['EventTitle'];?></h3>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li class="active"><?php echo $Event[0]['EventTitle'];?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!-- End Page Title Area -->
        
        <!-- Start About Area -->
        <section class="about-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-5">
                        <div>
                             <img src="assets/events/<?php echo $images[0]['ImageName'];?>" alt="upcoming-bike" style="width:100%;height:100%">
                        </div>
                    </div>
                  <script>
                  function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");
 

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  //alert("Copied the text: " + copyText.value);
  $('#sx').html("link copied!");
} 
                  </script>  
                    <div class="col-lg-8 col-md-6 col-sm-7">
                        <div class="about-text" style="text-align: justify;">
                            <h2><?php echo $Event[0]['EventTitle'];?></h2>
                            <p>Event Date: <?php echo date("M d, Y",strtotime($Event[0]['EventDate']));?></p>
                            <br><br>
                            <p><?php echo $Event[0]['Description'];?></p><br>
                            
                            <p>Starting Point: <?php echo $Event[0]['StartingPoint'];?></p>
                            <p>Ending Point: <?php echo $Event[0]['EndingPoint'];?></p>
                            <p>Routes: <?php echo $Event[0]['EndingPoint'];?></p>
                                   <br><br><br>
                             <input type="text" style="height:0px;width:0px;" value="https://www.pedalscycle.com/news.php?event=<?php echo md5($Event[0]['EventID']);?>" id="myInput" name="myInput">
                            <button  class="btn btn-success btn-sm" onclick="myFunction()">Copy Link</button> <br>
                            <div style="color:green" id="sx"></div>
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        </section>
        <!-- End About Area -->
        <?php if (sizeof($images)>1)     {?>  
        <section class="gallery-area ptb-80">
            <div class="container">
               <!-- <div class="section-title">
                    <h2>Our <span>Gallery</span></h2>
                    <img src="assets/img/section-title-logo.png" alt="section-title-logo">
                </div>
                -->
                <div class="row m-0">
                
                  <?php
                   
                                    foreach($images as $galleryImage) {
                                ?>
                                
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-gallery">
                            <img src="assets/events/<?php echo $galleryImage['ImageName'];?>" alt="gallery">
                            <div class="picture-icon">
                                <a href="assets/events/<?php echo $galleryImage['ImageName'];?>" class="zoom-gallery"><i class="fa fa-picture-o"></i></a>
                            </div>
                        </div>
                    </div>
                   <?php } ?> 
                   
                </div>
            </div>
        </section>
       <?php } ?>  
        
        
        
        
        
             
       <!-- Start Footer Area -->
    <?php include_once("footer.php");?>