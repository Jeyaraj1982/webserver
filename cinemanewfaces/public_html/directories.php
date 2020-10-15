<?php include_once("header.php");?>

 
    

  <main id="main">

 
    <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2> </h2>
            </div>
          </div>
        </div>
        <div class="row">           
        
        <?php   $activemembsers= $mysql->select("select * from _Directories    order by DirectoryID Desc");  ?>
        <?php foreach($activemembsers as $mem) {
               
            ?>
          <div class="col-md-3 col-sm-3 col-xs-12" style="margin-bottom:20px;">
            <div class="single-team-member">
              <div class="team-img" style="text-align: center;">
                
                  <img src="assets/profile/<?php echo $mem['ProfilePhoto'];?>" alt="" style="height:200px;margin:0px auto;">
                
              </div>
              
            </div>
          </div>      
       <?php } ?>    
           
           
           
           
           
           
        </div>
      </div>
    </div><!-- End Team Section -->

    
<?php include_once("footer.php"); ?> 