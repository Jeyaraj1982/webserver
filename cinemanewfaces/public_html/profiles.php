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
        
            <?php $activemembsers= $mysql->select("select * from _Members where IsPaidMember='1'    order by MemberID Desc"); ?>
        <?php foreach($activemembsers as $mem) {?>
          <div class="col-md-3 col-sm-3 col-xs-12" style="margin-bottom:20px">
            <div class="single-team-member">
              <div class="team-img" style="text-align: center;">
                
                  <img src="assets/profile/<?php echo $mem['ProfilePhoto'];?>" alt="" style="height:200px;margin:0px auto;">
                
              </div>
              <div class="team-content text-center">
                <h4><?php echo $mem['MemberName'];?></h4>
                <p><?php echo $mem['Category'];?></p><br>
                <a href="viewProfile.php?profile=<?php echo $mem['MemberID'];?>-<?php echo $mem['MemberName'];?>-" style="border-radius:5px;background:Green;color:#fff;padding:5px 10px;;">View Profile</a>
              </div>
            </div>
          </div>      
       <?php } ?>    
           
           
           
           
           
           
        </div>
      </div>
    </div><!-- End Team Section -->

    
<?php include_once("footer.php"); ?> 