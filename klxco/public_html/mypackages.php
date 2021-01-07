<?php include_once("header.php"); ?>
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
                        <a href="<?php echo country_url;?>mypackages" >My Packages</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Packages</h4>
                </div>
                <div class="card-body">
                    <div class="row row-projects">
                        <?php
                            $ads = $mysql->select("Select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."'");
                        ?>
                          <?php foreach($ads as $a) {
                              $package = $mysql->select("select * from _tbl_adsPackage where AdPackageID='".$a['PackageID']."'");
                              ?>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-12" style="padding:10px;padding-left:25px;padding-bottom:0px">
                                   <h3 style="color:#222"><?php echo $package[0]['PackageTitle'];?></h3>
                            </div>
                            <div class="col-12" style="color:#888;padding:10px;padding-left:25px;padding-top:0px">
                            Category: <?php echo $a['CategoryName'];?><br>
                            Location: India<br>
                            Date of Activation: <?php echo date("M d, Y",strtotime($a['PackageFrom']));?><br>
                            Date of Expire: <?php echo date("M d, Y",strtotime($a['PackageTo']));?>
                            </div>
                            <div class="col-12">
                                <div class="row" style="border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:10px;margin:10px;">   
                                    <div class="col-4" style="text-align: center;color:#888;font-size:11px">
                                      <span style="font-size:25px;color:#444"><?php echo $a['NumberOfAds'];?></span><br>
                                      PURCHASED
                                      
                                    </div>
                                    <div class="col-4" style="text-align: center;color:#888;font-size:11px">
                                      <span style="font-size:25px;color:#444"><?php echo $a['RemainingAds'];?></span><br>
                                      AVAILABLE
                                      
                                    </div>
                                    <div class="col-4" style="text-align: center;color:#888;font-size:11px">
                                      <span style="font-size:25px;color:#444"><?php echo $a['PostedAds'];?></span><br>
                                      USED
                                      
                                    </div>  
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

          
<?php include_once("footer.php"); ?>