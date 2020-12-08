<?php 
include_once("header.php"); 
$ads = JPostads::getMyRecentlyViewedAds($_SESSION['USER']['userid']);
?>
<div class="main-panel"  style="width: 100%;height:auto !important">
    <div class="container"> 
        <div class="page-inner">
        <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
        <div class="page-header">
                <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                    <li class="nav-home">
                        <a href="<?php echo country_url;?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>mypage" >Dashboard</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>recentlyviewed" >Recently Viewed Ads</a>
                    </li>
                </ul>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recently Viewed Ads (<?php echo sizeof($ads);?>)</h4>
                </div>
                <div class="card-body">
                    <div class="row row-projects">
                            <?php
                           // $ads = JPostads::getMyads($_SESSION['USER']['userid']);
                            
                                 foreach ($ads as $ad) {   
                                      $filename = ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
                            ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card adbox">
                              
                                <div class="p-2 text-center">
                                    <img class="card-img-top rounded adImage" src="<?php echo base_url;?><?php echo $filename;?>" alt="Product 7">
                                    <?php if ($ad['isdeleted']==1) {?>
                                    <div>
                                        <a class="btn btn-danger  btn-sm" style="padding:2px 5px">deleted</a>
                                    </div>
                                
                                <?php } else {  /*
                                    ?>
                                        <div>
                                        <a class="btn btn-success  btn-sm" style="padding:2px 5px">active</a>
                                    </div>
                                    <?php
                                   */ 
                                } ?>
                                </div>
                                <div class="card-body pt-2">                                         
                                    <?php
                                           if ($ad['categid']==5) {
                                           ?>
                                           <h3 class="mb-0 fw-bold">Salary : ₹ <?php echo $ad['SalaryFrom'];?> - ₹ <?php echo $ad['salaryTo'];?></h3>         
                                           <?php    
                                           } else {
                                    ?>
                                    <h3 class="mb-0 fw-bold">₹ <?php echo $ad['amount'];?></h3>
                                    <?php } ?>
                                    <?php if ($ad['isdeleted']!=1) {?>
                                       <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:#fff;padding-right:0px;margin-right:0px;">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo country_url;?>adview/m<?php echo $ad['postadid'];?>" draggable="false">View</a>
                                            <!--<a class="dropdown-item" href="viewad.php?a=<?php echo $ad['postadid'];?>" draggable="false">View</a>
                                            <a class="dropdown-item" href="viewmyad.php?ad=<?php echo $ad['postadid'];?>" draggable="false">Messages</a>
                                            <<a class="dropdown-item" href="viewmyad.php?ad=<?php echo $ad['postadid'];?>" draggable="false">Remove</a>-->
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    
                                    <p class="text-muted small mb-3" style="height:60px !important"><?php echo substr($ad['title'],0,60);?> <?php echo strlen($ad['title'])>60 ? "..." : "";?></p>
                                    <p class="text-muted small m-0" style="font-size:11px;"><?php echo $ad['location'];?>
                                    <span style="float: right;"><?php echo date("M d",strtotime($ad['postedon']));?></span>
                                    </p>
                                     
                                    
                                    <!--<div class="avatar-group">
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title rounded-circle border border-white bg-success">+</span>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>  
    </div> 
</div>

         <?php if (isset($_GET['del'])) {?>
  <script>
       setTimeout(function(){$('#myModal').modal("show");},1000);
       </script>
       <?php } ?>
    <div class="modal " id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;">
       Your post deleted.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
      
      </div>

    </div>
  </div>
</div>
<?php include_once("footer.php"); ?>