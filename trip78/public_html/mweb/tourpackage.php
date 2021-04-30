<?php include_once("header.php");?>
<?php
    $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$_GET['subtour']."' order by PackageOrder");
    $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and SubTourTypeID='".$_GET['subtour']."'");
    $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
?>
<div class="page" >
       <form class="searchcontrol" action="search.php" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text close-search"><i class="material-icons">keyboard_backspace</i></button>
                    </div>
                    <input type="text" class="form-control border-0" name="s" id="s"  placeholder="Search..." aria-label="Username">
                </div>
            </form>
    <header class="row m-0 fixed-header">
        <div class="left">
            <a href="subtour.php?tour=<?php echo $Tours[0]['TourTypeID'] ;?>"><i class="material-icons">keyboard_backspace</i></a>
        </div>
        <div class="col center" style="padding-left:0px;">
            <a href="javascript:void(0)" class="logo">
            <!--<figure><img src="https://trip78.in/images/logo_footer.png" alt=""></figure>--><?php echo $SubTours[0]['SubTourTypeName'];?></a>
        </div>
        <div class="right">
            <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
            <!--<a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a>-->
        </div>
    </header>  
    <div class="page-content" style="overflow:hidden;height:70vh !important; overflow: auto;">
        <div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:10px;padding-top:0px;">            
            <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px;">
                <div class="col-12" style="padding-left: 5px;padding-right: 5px;">
                    <?php foreach($Packages as $Package) {                             
                        
                             $tourThumb =  $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$Package['PackageID']."' order by ImageOrder");
                        ?>
                    <div style="border:1px solid #eee;border-radius:7px;background:#f9f9f9;margin-bottom:15px;">
                                <div class="row">
                                    <div class="col-5 col-md-4" style="padding-right:0px">
                                        <a href="tourpackagedetails.php?tid=<?php echo $Package['PackageID'];?>">
                                        <img src="https://www.trip78.in/uploads/package/<?php echo $tourThumb[0]['ImageName'];?>" alt="" width="100%" style="height: 100%;border-radius:6px 0px 0px 6px" />
                                        </a>
                                    </div>
                                    <div class="col-7 col-md-8" style="padding-left:5px">
                                        <a href="tourpackagedetails.php?tid=<?php echo $Package['PackageID'];?>">
                                            <h6 style="font-size: 13px;font-weight: bold;color: #444;margin-top:5px;margin-bottom:5px;"><?php echo $Package['PackageName'];?></h6>
                                        </a>
                                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                            <div class="col-3 col-md-3" style="float: left;border-right:1px solid #eee;text-align:center;padding-left:0px;padding-right:3px">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['NightsCount'];?></span>
                                                <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;">Nights</p>
                                            </div>
                                            <div class="col-9 col-md-9" style="padding-left:3px;border-bottom: 1px solid #eee;">
                                                <p style="color:#626060;;padding:0px;font-size:10px;margin-bottom: 0px;">Joining  < <span style="color: #0eb53d;font-weight: bold;"><?php echo $Package['JoiningPlace'];?></span></p>
                                                <p style="color:#626060;;padding:0px;font-size:10px;margin-bottom: 0px;">Leaving  > <span style="color: red;font-weight: bold;"><?php echo $Package['LeavingPlace'];?></span></p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                             <div class="col-3 col-md-3" style="float: left;border-right:1px solid #eee;text-align:center;padding-left:0px;padding-right:3px">
                                                <hr style="margin-top:0px;margin-bottom:0px">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['CountryCount'];?></span> <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;">Country</p>
                                                <hr style="margin-top:0px;margin-bottom:0px">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['CityCount'];?></span> <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;"><?php echo ($Package['CityCount']>0)? "Cities" : "City";?></p>
                                            </div>                                                    
                                            <div class="col-9 col-md-9" style="padding-left:3px;padding-right:3px;text-align:center;padding-top:5px;">
                                                <p style="color:#626060;font-size:10px;text-align:center;margin-bottom: 0px;">All inclusive price | Per Person<br>
                                                    <span style="font-size:14px;font-weight:bold;color:red">Rs <?php echo $Package['PackagePrice'];?>*</span>
                                                </p>    
                                            </div>
                                        </div>
                                        <p style="text-align:right;margin-bottom: 0px;padding-right: 10px;">
                                            <a href="enquiry.php?package=<?php echo $Package['PackageID'];?>" class="btn btn-primary btn-sm" style="padding: 5px 10px;font-size: 11px;line-height: 1;text-transform: none;border-radius: 5px;margin-bottom:5px;margin-top:5px;">Enquiry Now</a>    &nbsp;
                                            <a href="tourpackagedetails.php?tid=<?php echo $Package['PackageID'];?>" class="btn btn-danger btn-sm" style="padding: 5px 10px;font-size: 11px;line-height: 1;text-transform: none;border-radius: 5px;margin-bottom:5px;margin-top:5px;">View Details</a>    
                                        </p>
                                    </div>
                                </div>     
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div> 
   <?php include_once("footer.php");?>            
                