<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stores/ManageFavoritedStores">Favorited Stores</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Stores/ManageFavoritedStores">My Favorited Stores</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">My Favorited Stores</h4>
                </div>
            </div>
        </div>
    </div>
     <?php $Fav = $mysql->select("SELECT * FROM _tbl_business_supporting_center WHERE SupportingCenterAdminID IN (SELECT StoreID FROM _tbl_favorite_stores WHERE MemberID='".$_SESSION['User']['MemberID']."' GROUP BY StoreID )");?>
     <?php foreach($Fav as $s) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <div class="row" style="margin-left:0px !important;margin-right:0px !important">
                            <div class="col-md-9" style="padding-left:0px">
                                <?php if(strlen($s['ShopLogo'])>0){ ?>
                                    <div style="float: left;width:90px;margin-right:10px">
                                        <img src="assets/stores/<?php echo $s['ShopLogo'];?>" style="width: 90px;height:90px">    
                                    </div>
                                <?php } ?>
                                <div style="float: left;">
                                    <h4 class="card-title"><?php echo $s['SupportingCenterName'];?></h4>    
                                    <?php
                                        $Reviewed = $mysql->select("SELECT * FROM _tbl_store_feedback WHERE StoreID='".$s['SupportingCenterAdminID']."'");
                                        $TotalReviews = $mysql->select("SELECT sum(Ratings) as Ratings FROM _tbl_store_feedback WHERE StoreID='".$s['SupportingCenterAdminID']."'");
                                        $TotalReviews = isset($TotalReviews[0]['Ratings'])  ? $TotalReviews[0]['Ratings'] : 0;
                                        $starRating = intval($TotalReviews/sizeof($Reviewed));
                                    ?>
                                    <?php if(!($starRating==0)){ ?>
                                    <?php echo PrintStar($starRating);?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div> 
                        <?php if(strlen($s['ShortDescription'])>0){ ?>
                        <div class="row">
                            <div class="col-md-12" style="padding-top:10px">
                                <div style="color:#999;height: 50px;overflow: auto;"><?php echo $s['ShortDescription'];?></div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group user-test" id="user-exists" style="padding-left:0px">
                                    <label>Address</label>
                                    <div style="color:#999"><?php echo $s['SupportingCenterAddressLine1'];?></div>
                                    <div style="color:#999"><?php echo $s['SupportingCenterAddressLine2'];?></div>
                                    <div style="color:#999"><?php echo $s['SupportingCenterCityName'];?>,&nbsp;<?php echo $s['PinCode'];?></div>
                                    <?php if($s['Landmark']!=""){  ?>
                                        <div style="color:#999"><span style="color:#515050;">Landmark : </span><?php echo $s['Landmark'];?></div> 
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: right;">
                                <div class="form-group user-test" id="user-exists" style="padding-left:0px">
                                    <?php if(strlen($s['Mobile'])>0){  ?>
                                        <div style="color:#999"><span style="color:#515050;">Contact No : </span>+91-<?php echo $s['Mobile'];?></div>
                                    <?php } ?>
                                    <?php if($s['Mobile']!=""){  ?>
                                        <div style="color:#999"><span style="color:#515050;">Email : </span><?php echo $s['Email'];?></div>
                                    <?php } ?>
                                    <?php if($s['WebsiteName']!=""){  ?>
                                        <div style="color:#999"><span style="color:#515050;">Website : </span><?php echo $s['WebsiteName'];?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group user-test" id="user-exists" style="padding-left:0px">
                                    <div style="color:#999"><span style="color:#515050;">Opening Time : </span><?php echo $s['OpeningTime'];?></div> 
                                    <div style="color:#999"><span style="color:#515050;">Closing Time : </span><?php echo $s['ClosingTime'];?></div> 
                                    <div style="color:#999"><span style="color:#515050;">Holiday : </span><?php echo $s['Holidays'];?></div> 
                                </div>
                            </div>
                            <?php $prducts =$mysql->select("select * from `_tbl_products` where StoreID='".$s['SupportingCenterAdminID']."' and IsBlock='0' and IsActive='1'");?>
                            <?php if(sizeof($prducts)>0){ ?>
                            <div class="col-md-6" style="text-align:right">
                                <div class="form-group user-test" id="user-exists" style="padding-left:0px">
                                    <span><?php echo sizeof($prducts);?>&nbsp;&nbsp;<?php if(sizeof($prducts)>1){ echo "Products"; } else { echo "Product"; }?>&nbsp;Available</span>
                                    <br><button type="button" onclick="location.href='dashboard.php?action=Stores/viewproducts&id=<?php echo $s['SupportingCenterAdminID'];?>'"  class="btn btn-secondary">View <?php if(sizeof($prducts)>1){ echo "Products"; } else { echo "Product"; }?></button>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php } ?>
</div>
