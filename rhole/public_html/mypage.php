<?php include_once("header.php"); ?>
<style>
.cursor-hand{border:2px solid #fff}
.cursor-hand:hover{border:2px solid #ccc}
</style>
<div class="main-panel"  style="width: 100%;height:auto !important">
    <div class="container"> 
        <div class="page-inner">
            <div class="card">
                <div class="card-header">                                                   
                    <h4 class="card-title">Dashboard</h4>                                
                </div>
                <div class="card-body">
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-12">
                                                <div style="background:#a5d8ff;padding:10px;">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div style="font-size:13px;padding-top: 5px;padding-left: 20px;">
                                                                Heavy discount on packages
                                                            </div>
                                                         </div>
                                                         <div class="col-6" style="text-align: right;">
                                                            <a class="btn btn-primary btn-sm" style="border:1px solid #fff !important;" href="<?php echo AppUrl;?>/in/upgrade/c0">VIEW PACKAGES</a>
                                                         </div>
                                                    </div>
                                                </div>
                    </div>
                                             
                </div>
                    <div class="row">
                      <div class="col-sm-6 col-md-3"  onclick="goUrl('../')" >
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body" style="background:#dbfffc;">
                                    <div class="row" >
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-home"></i>
                                            </div>
                                        </div>                 
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Home</p>
                                                <h4 class="card-title"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>                
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3"  onclick="goUrl('freeadpost')" >
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body " style="background:#f7e8d4;">
                                    <div class="row" >
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-interface-6 text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Post Free Ad</p>
                                                <h4 class="card-title"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" onclick="goUrl('myads')">
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-exclamation text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">All Ads</p>
                                                <h4 class="card-title"><?php echo sizeof(JPostads::getMyads($_SESSION['USER']['userid']));?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" onclick="goUrl('myactiveads')">
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-success text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Active Ads</p>
                                                <h4 class="card-title"><?php echo sizeof(JPostads::getMyActiveads($_SESSION['USER']['userid']));?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-sm-6 col-md-3" onclick="goUrl('mypackages')">
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-success text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">My Packages</p>
                                                <h4 class="card-title"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="col-sm-6 col-md-3" onclick="goUrl('myearnings')">
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">My Earnings</p>
                                                <h4 class="card-title">
                                               <?php
                                                     $bal = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _tbl_share_products_earning where UserID='".$_SESSION['USER']['userid']."'");
                        $balance = isset($bal[0]['bal']) ?  $bal[0]['bal'] : 0;
                        echo $balance;
                                               ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       
                    </div> 
                    <div class="row row-card-no-pd">
                        <div class="col-sm-6 col-md-4"  onclick="goUrl('recentlyviewed')">
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Recently Viewed Ads</p>
                                                <h4 class="card-title">
                                                 <?php echo sizeof(JPostads::getMyRecentlyViewedAds($_SESSION['USER']['userid']));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>                          
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4"  onclick="goUrl('myfavorites')">
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">I Liked Ads</p>
                                                <h4 class="card-title">
                                                
                                                <?php echo sizeof(JPostads::getLikedAd($_SESSION['USER']['userid']));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                        
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4" onclick="goUrl('messaged')">
                            <div class="card card-stats card-round cursor-hand">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Messaged Ads</p>
                                                <h4 class="card-title">
                                                <?php
                                                    $k = $mysql->select("SELECT count(*) as cnt FROM _tblmessages WHERE (touserid='".$_SESSION['USER']['userid']."' or fromuserid='".$_SESSION['USER']['userid']."') group by toadid");
                                                    echo sizeof($k);
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_GET['s'])) {?>
      <script>
       setTimeout(function(){$('#myModal').modal("show");},1000);
       </script>
       <div class="modal " id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;">
      Mobile Number updated.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
      
      </div>

    </div>
  </div>
</div>
<?php } ?>

<?php if (isset($_GET['vm'])) {?>
      <script>
       setTimeout(function(){$('#myModal').modal("show");},1000);
       </script>
       <div class="modal " id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;">
      Your mobile number verified by Rhole
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
      
      </div>

    </div>
  </div>
</div>
<?php } ?>
<?php if (isset($_GET['em'])) {?>
      <script>
       setTimeout(function(){$('#myModal').modal("show");},1000);
       </script>
       <div class="modal " id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;">
      Your email verified by Rhole
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" onclick="location.href='<?php echo AppUrl;?>/in/freeadpost'">Continue</button>
      
      </div>

    </div>
  </div>
</div>
<?php } ?>
<?php include_once("footer.php"); ?>