<?php include_once("header.php");?>
    <?php 
         $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
   ?>
    <main class="main">        
        <div class="wrap">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.php" title="Home">Home</a></li>
                    <li><a title="Travel guides"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                    <li><a title="Travel guides"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>
                </ul>
            </nav>
            
            <div class="row">
                <section class="full-width">
                    <section id="hotels" class="tab-content" style="width:100%">
                        <div class="deals row">
                            <?php foreach($Packages as $Package) { ?>                            
                            <article class="full-width" onclick="location.href='tourpackagedetails.php?tid=<?php echo md5($Package['PackageID']);?>'">
                                <figure style="height:228px"><a><img src="uploads/<?php echo $Package['Image1'];?>" alt="" width="100%" /></a></figure>
                                <div class="details">
                                    <h3><?php echo $Package['PackageName'];?> 
                                        <!--<span class="stars">
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                        </span>-->
                                    </h3>
                                    <div style="width: 50px;border-right:1px solid #cccccc;float:left">
                                        <span style="color: #c6c6c6;font-size: 20px;font-weight: bold;"><?php echo $Package['NightsCount'];?></span>                                                             
                                        <p style="color:#cccccc;padding:0px;font-size:10px">Nights</p> <hr style="margin: 0px;">
                                        <span style="color: #c6c6c6;font-size: 20px;font-weight: bold;"><?php echo $Package['CountryCount'];?></span>
                                        <p style="color:#cccccc;padding:0px;font-size:10px">Country</p><hr style="margin: 0px;">                                      
                                        <span style="color: #c6c6c6;font-size: 20px;font-weight: bold;"><?php echo $Package['CityCount'];?></span>
                                        <p style="color:#cccccc;padding:0px;font-size:10px">City</p>
                                    </div>
                                     <div style="padding-top:10px;float:left;height: 60px;">
                                        <p style="color:#cccccc;padding:0px;font-size:12px">Joining  < <span style="color: #3bd73b;font-weight: bold;"><?php echo $Package['JoiningPlace'];?></span></p>
                                        <p style="color:#cccccc;padding:0px;font-size:12px">Leaving  > <span style="color: red;font-weight: bold;"><?php echo $Package['LeavingPlace'];?></span></p>
                                        <hr style="margin: 13px 0 10px;">
                                        <p style="color:#cccccc;padding-left:10px;font-size:12px">All inclusive price | Per Person<br><span style="font-size:16px;font-weight:bold;color:red">Rs <?php echo $Package['PackagePrice'];?>*</span></p>
                                        <br>
                                        <a href="hotel.html" class="gradient-button">Book now</a>
                                    </div>                                                                    
                                </div>
                            </article>                                                                 
                            <?php } ?>
                        </div>
                    </section>
            </div>
            <!--//row-->                                                                                   
        </div>
    </main>
    <?php include_once("footer.php");?>
    
   <?php /*<?php include_once("header.php");?>
 <?php 
         $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
   ?>
    <main class="main">
        <div class="wrap">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="http://japps.online/tour/website/index.php" title="Home">Home</a></li>
                    <li><a title="Travel guides"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                    <li><a title="Travel guides"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>
                </ul>
            </nav>
            <div class="row">
                <div class="full-width">
                    <header class="s-title">
                        <h2><?php echo $SubTours[0]['SubTourTypeName'];?></h2>
                    </header>
                    <div class="destinations">
                        <div class="row">
                            <?php foreach($Packages as $Package) { ?>  
                            <article class="one-fourth" onclick="location.href='http://japps.online/tour/website/tourpackagedetails.php?tid=<?php echo md5($Package['PackageID']);?>'">
                                <figure><a title=""><img src="http://japps.online/tour/uploads/package/<?php echo $Package['Image1'];?>"  style="width: 100%;height: 200px;" alt=""></a></figure>
                                <div style="height:30px;background: #f0ecec;padding: 5px 10px 10px 20px;text-align: center;">
                                    <span style="color: #666;margin-right:20px;"><?php echo $Package['NightsCount'];?>&nbsp;Nights</span>   
                                    <span style="color: #666;margin-right:20px;">&nbsp;<?php echo $Package['CityCount'];?>&nbsp;Cities</span>  
                                    <span style="color: #666;margin-right:20px;">&nbsp;<?php echo $Package['CountryCount'];?>&nbsp;Country</span>   
                                </div>
                                <div class="details">
                                    <a href="http://japps.online/tour/website/tourpackagedetails.php?tid=<?php echo md5($Package['PackageID']);?>" title="View all" class="gradient-button">View</a>
                                    <h4><?php echo $Package['PackageName'];?> </h4>
                                    <span class="price" style="font-size:16px;font-weight:bold;color:red;margin-bottom:5px">Rs <?php echo $Package['PackagePrice'];?>*</span>
                                   <!-- <div class="ribbon">                                                            
                                    <?php if($Package['AirlineAvailable']=="Yes"){ ?>
                                        <div class="half hotel" style="padding-top:10px;width:30%">
                                            <i class="fa fa-plane" aria-hidden="true" style="font-size:30px"></i>
                                        </div>
                                    <?php } ?>
                                    <?php if($Package['BusAvailable']=="Yes"){ ?>
                                        <div class="half hotel" style="padding-top:10px;width:30%">
                                            <i class="fa fa-bus" aria-hidden="true" style="font-size:30px"></i>
                                        </div>
                                    <?php } ?>
                                    <?php if(strlen($Package['MealsType'])>0){ ?>
                                        <div class="half hotel" style="padding-top:10px;width:30%">
                                            <i class="fa fa-spoon" aria-hidden="true" style="font-size:30px"></i>
                                        </div>
                                    <?php } ?>
                                    </div>-->
                                </div>
                            </article>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>                                                                          
   <?php include_once("footer.php");?> */ ?>