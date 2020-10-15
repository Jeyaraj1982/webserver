 <?php include_once("header.php");?>
<br><br><br>
<main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12" style="margin:0px auto;">
            <div class="well-middle">
                 <div class="row">
                    <div class="col-sm-6" style="margin:0px auto;text-align:center;color:#666">
                    
                      <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/failure.png" style="max-width:256px;margin:0px auto"><br><br>
                                    <span style="font-size:30px;">Payment Failure</span><br>
                                    <span style="font-size:15px;"><?php echo $_GET['msg'];?></span><br>
                                    <br>
                                    <a href="usr_mypage" class="btn btn-success" style="color:#fff;">Continue</a>
                            </div>
</div>
                                                      
            </div>
          </div>
        </div>
      </div>
    </div> 
<?php include_once("footer.php"); ?>