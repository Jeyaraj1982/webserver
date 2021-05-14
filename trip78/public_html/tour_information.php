<?php include_once("header.php");?>
<?php 
$page="details";
    $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(PackageID)='".$_GET['tid']."'");
    $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and SubTourTypeID='".$Packages[0]['SubTourTypeID']."'");
    $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
    $Events = $mysql->select("select * from _tbl_package_day_event where PackageID='".$Packages[0]['PackageID']."' order by (EventDay*1) ASC");
    $adParam = $mysql->select("select * from _tbl_additional_params where PackageID='".$Packages[0]['PackageID']."'");
    $images = $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$Packages[0]['PackageID']."' order by ImageOrder");
?>
<div class="site wrapper-content">
    <div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
        <div class="banner-wrapper container article_heading">
            <div class="breadcrumbs-wrapper">
                <ul class="phys-breadcrumb">
                    <li><a href="index.php" class="home">Home</a></li>
                    <li><a href="subtours.php?tours=<?php echo $Tours[0]['TourTypeID'];?>"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                    <li><a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>
                </ul>
            </div>
            <h2 class="heading_primary"><?php echo $Packages[0]['PackageName'];?></h2></div>
    </div>
    <section class="content-area single-woo-tour">
        <div class="container">                                
            <div class="tb_single_tour product">
                <div class="top_content_single row">
                    <div class="images images_single_left">
                        <div class="title-single">
                            <div class="title">
                                <h1><?php echo $Packages[0]['PackageName'];?></h1>
                            </div>
                            <div class="tour_code">
                                <!--<strong>Code: </strong>LMJUYH-->
                            </div>
                        </div>
                        <div class="tour_after_title">
                            <div class="meta_date">
                                <span><?php echo $Packages[0]['NightsCount'];?> NIGHTS <?php echo $Packages[0]['DaysCount'];?> DAYS </span>
                            </div>
                            <!--
                            <div class="meta_values">
                                <span>Category:</span>
                                <div class="value">
                                    <a href="tours.html" rel="tag">Escorted Tour</a>,
                                    <a href="tours.html" rel="tag">Rail Tour</a>
                                </div>
                            </div>
                            -->
                            <div class="tour-share" style="display: none;">
                                <ul class="share-social">
                                    <li><a target="_blank" class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a target="_blank" class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a target="_blank" class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a target="_blank" class="googleplus" href="#"><i class="fa fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <?php foreach($images as $im) { ?>
                                <li><a href="<?php echo SITE_PATH;?>uploads/package/<?php echo $im['ImageName'];?>" class="swipebox" title=""><img width="950" height="700" src="<?php echo SITE_PATH;?>/uploads/package/<?php echo $im['ImageName'];?>" class="attachment-shop_single size-shop_single wp-post-image" alt="" title="" draggable="false"></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider thumbnail_product">
                            <ul class="slides">
                                <?php foreach($images as $im) { ?>
                                <li><img width="150"  src="<?php echo SITE_PATH;?>uploads/package/<?php echo $im['ImageName'];?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" title="" draggable="false"></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="clear"></div>
                        <div class="single-tour-tabs wc-tabs-wrapper">
                            <ul class="tabs wc-tabs" role="tablist">  
                             <li class="itinerary_tab_tab active" role="presentation">
                                    <a href="#tab-itinerary_tab" role="tab" data-toggle="tab">Itinerary</a>
                                </li> 
                                <li class="description_tab " role="presentation">
                                    <a href="#tab-description" role="tab" data-toggle="tab">Description</a>
                                </li>
                               
                                <li class="location_tab_tab" role="presentation">
                                    <a href="#tab-inclusion_tab" role="tab" data-toggle="tab">Inclusions & Exclusions</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            <div role="tabpanel" class="tab-pane single-tour-tabs-panel single-tour-tabs-panel--itinerary_tab panel entry-content wc-tab active" id="tab-itinerary_tab">
                                     <?php foreach($Events as $Event) { ?>
                                     <div class="interary-item">
                                        <p><span class="icon-left"><?php echo $Event['EventDay'];?></span></p>
                                        <div class="item_content">
                                            <h2><strong>Day <?php echo $Event['EventDay'];?>: <?php echo $Event['EventTitle'];?></strong></h2>
                                            <?php
                                                $l = explode("\n",trim($Event['EventDescription']));
                                                if (sizeof($l)==1) {
                                            ?>
                                                <p><?php echo $Event['EventDescription'];?></p>
                                            <?php } else { ?>
                                                <ul>
                                                    <?php 
                                                        foreach($l as $list) {
                                                            if (trim($list)!="") {
                                                                echo "<li>".$list."</li>";
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                     </div>
                                     <?php } ?>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane single-tour-tabs-panel single-tour-tabs-panel--description panel entry-content wc-tab " id="tab-description">
                                    <p><?php echo $Packages[0]['ShortDescription'];?></p>
                                    <?php
                                        $l = explode("\n",trim($Packages[0]['Description']));
                                        if (sizeof($l)==1) {
                                            ?>
                                            <p><?php echo $Packages[0]['Description'];?></p>
                                            <?php
                                        } else {
                                            ?>
                                            <ul>
                                                 <?php 
                                                    foreach($l as $list) {
                                                        if (trim($list)!="") {
                                                            echo "<li>".$list."</li>";
                                                        }
                                                    }
                                                 ?>
                                            </ul>
                                            <?php
                                        }
                                    ?>
                                    <div class="general-point" style="margin-top: 20px;">
                                        <?php if($adParam[0]['PackagesNotes']!=""){ ?>
                                            <div class="description detail-box">
                                                <div class="detail-title" style="margin-bottom: 0px;">
                                                    <h3>Notes</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['PackagesNotes']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul>";
                                                                foreach($d as $dd) {
                                                                    if (trim($dd)!="") {
                                                                        echo "<li>".strip_tags($dd)."</li>";
                                                                    }
                                                                }
                                                            echo "</ul>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if($adParam[0]['ExtraToppings']!=""){ ?>
                                            <div class="description detail-box">
                                                <div class="detail-title"  style="margin-bottom: 0px;">
                                                    <h3>Extra Toppings</h3>
                                                </div>
                                                <div class="description-content"> 
                                                <?php 
                                                    $d = explode("\n",$adParam[0]['ExtraToppings']);
                                                    if (sizeof($d)>0) { 
                                                        echo "<ul>";
                                                            foreach($d as $dd) {
                                                                if (trim($dd)!="") {
                                                                    echo "<li>".strip_tags($dd)."</li>";
                                                                }
                                                            }
                                                        echo "</ul>";
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if($adParam[0]['OurSpeciality']!=""){ ?>
                                            <div class="description detail-box">
                                                <div class="detail-title" style="margin-bottom: 0px;">
                                                    <h3>Our Speciality</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['OurSpeciality']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul>";
                                                            foreach($d as $dd) {
                                                                if (trim($dd)!="") {
                                                                    echo "<li>".strip_tags($dd)."</li>";
                                                                }
                                                            }
                                                            echo "</ul>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if($adParam[0]['DroppingDetails']!=""){ ?>
                                            <div class="description detail-box">
                                                <div class="detail-title" style="margin-bottom: 0px;">
                                                    <h3>Reporting &amp; Dropping for Joining &amp; Leaving Guests:</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['DroppingDetails']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul>";
                                                            foreach($d as $dd) {
                                                                if (trim($dd)!="") {
                                                                    echo "<li>".strip_tags($dd)."</li>";
                                                                }
                                                            }
                                                            echo "</ul>";
                                                        }
                                                    ?>
                                                </div>
                                            </div> 
                                        <?php } ?>  
                                        
                                        <?php if($adParam[0]['termsandconditions']!=""){ ?>
                                            <div class="description detail-box">
                                                <div class="detail-title" style="margin-bottom: 0px;">
                                                    <h3>Reporting &amp; Dropping for Joining &amp; Leaving Guests:</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['termsandconditions']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul>";
                                                            foreach($d as $dd) {
                                                                if (trim($dd)!="") {
                                                                    echo "<li>".strip_tags($dd)."</li>";
                                                                }
                                                            }
                                                            echo "</ul>";
                                                        }
                                                    ?>
                                                </div>
                                            </div> 
                                        <?php } ?>     
                                        
                                        <?php if($adParam[0]['charges']!=""){ ?>
                                            <div class="description detail-box">
                                                <div class="detail-title" style="margin-bottom: 0px;">
                                                    <h3>Reporting &amp; Dropping for Joining &amp; Leaving Guests:</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['charges']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul>";
                                                            foreach($d as $dd) {
                                                                if (trim($dd)!="") {
                                                                    echo "<li>".strip_tags($dd)."</li>";
                                                                }
                                                            }
                                                            echo "</ul>";
                                                        }
                                                    ?>
                                                </div>
                                            </div> 
                                        <?php } ?>     
                                    </div>
                                </div>
                                
                                
                                
                                <div role="tabpanel" class="tab-pane single-tour-tabs-panel single-tour-tabs-panel--description panel entry-content wc-tab" id="tab-inclusion_tab">
                                    <h2>Inclusions:</h2>
                                    <?php 
                                        $d = explode("\n",trim($adParam[0]['inclusions']));
                                        if (sizeof($d)>0) { 
                                            echo "<ul>";
                                                foreach($d as $dd) {
                                                    if (trim($dd)!="") {
                                                        echo "<li>".strip_tags($dd)."</li>";
                                                    }
                                                }
                                            echo "</ul>";
                                        }
                                    ?>
                                    <br>
                                    <h2>Exclusions:</h2>
                                    <?php 
                                        $d = explode("\n",trim($adParam[0]['exclusions']));
                                        if (sizeof($d)>0) { 
                                            echo "<ul>";
                                                foreach($d as $dd) {
                                                    if (trim($dd)!="") {
                                                        echo "<li>".strip_tags($dd)."</li>";
                                                    }
                                                }
                                            echo "</ul>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                                                       
                            
                            
                            
                            
                            <div class="related tours">
                                <h2>Related Tours</h2>
                                <ul class="tours products wrapper-tours-slider">
                                <?php
                                    $randTourPackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$Packages[0]['SubTourTypeID']."'   ORDER BY RAND() limit 3");
                                    if (sizeof($randTourPackages)<3) {
                                    $randTourPackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and (SubTourTypeID='".$Packages[0]['SubTourTypeID']."' or TourTypeID='".$Packages[0]['TourTypeID']."') ORDER BY RAND() limit 3");
                                    }
                                ?>
                                <?php foreach($randTourPackages as $TourPackage) {
                                    
                                    $tourThumb =  $images = $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$TourPackage['PackageID']."' order by ImageOrder");?>
                             <li class="item-tour col-md-4 col-sm-6 product">
                                <div class="item_border item-product">
                                    <div class="post_images">
                                        <a href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>">
                                            <span class="price">&#8377; <?php echo number_format($TourPackage['PackagePrice']);?></span>
                                            <img src="https://www.trip78.in/uploads/package/<?php echo $tourThumb[0]['ImageName'];?>" alt="Discover Brazil" title="Discover Brazil">
                                        </a>
                                    </div>
                                    <div class="wrapper_content">
                                        <div class="post_title"><h4 style="height: 50px;line-height: 24px;">
                                            <a href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>" rel="bookmark"><?php echo (($TourPackage['PackageName']));?></a>
                                        </h4></div>
                                        <span class="post_date" style="margin-bottom:5px;"><b><?php echo $TourPackage['NightsCount'];?></b> NIGHTS&nbsp;<b><?php echo $TourPackage['DaysCount'];?></b> DAYS </span>
                                        <p style="height: 50px;overflow: hidden;font-size: 12px;line-height: 17px;-webkit-line-clamp: 3;-webkit-box-orient: vertical;"><?php echo $TourPackage['ShortDescription'];?></p>
                                    </div>
                                    <div class="read_more">
                                        <div class="item_rating">               
                                             <?php for($i=1;$i<=$TourPackage['PackageRating'];$i++) {?>
                                <i class="fa fa-star"></i>
                                <?php } ?>
                                        </div>
                                        <a rel="nofollow" href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>" class="button product_type_tour_phys add_to_cart_button">Read more</a>
                                    </div>
                                </div>
                            </li>
                            <?php } ?> 
                                </ul>
                            </div>
                        </div>
                        <div class="summary entry-summary description_single">
                            <div class="affix-sidebar">
                                <div class="entry-content-tour">
                                    <p class="price">
                                        <span class="text">Price:</span><span class="travel_tour-Price-amount amount">&#8377; <?php echo number_format($Packages[0]['PackagePrice']);?></span>
                                    </p>
                                    <div class="clear"></div>
                                    <div class="booking">
                                        <div class="">
                                            <div class="form-block__title">
                                                <h4>Enquiry</h4>
                                            </div>
                                            <form  id="tourBookingForm" method="POST" action="#">
                                                <input type="hidden" value="<?php echo $Packages[0]['PackageID'];?>" name="PackageID">
                                                <div class="">
                                                    <input name="FullName" id="FullName" value="" placeholder="First name" type="text">
                                                     <span id="ErrorFullName" style="margin-top:10px;color:red;"></span>
                                                </div>
                                               
                                                <div class="">
                                                    <input name="EmailID" id="EmailID" value="" placeholder="Email" type="text">
                                                    <span id="ErrorEmailID" style="margin-top:10px;color:red;"></span>
                                                </div>
                                                <div class="">
                                                    <input name="MobileNumber" id="MobileNumber" value="" placeholder="Phone" type="text">
                                                     <span id="ErrorMobileNumber" style="margin-top:10px;color:red;"></span>
                                                </div>
                                                 <div class="">
                                                    <input name="CurrentCity" id="CurrentCity" value="" placeholder="Current City" type="text">
                                                     <span id="ErrorCurrentCity" style="margin-top:10px;color:red;"></span>
                                                </div>
                                                 <div class="">
                                                    <input name="Pincode" id="Pincode" value="" placeholder="Pincode" type="text">
                                                    <span id="ErrorPincode" style="margin-top:10px;color:red;"></span>
                                                </div>
                                                 <div class="">
                                                    <input name="Description" id="Description" value="" placeholder="Description" type="text">
                                                     <span id="ErrorDescription" style="color:red;margin-top:10px;"></span>
                                                </div>    
                                                <div>
                                                    <label style="font-weight:normal">Number of Adults (age: above 12)</label>
                                                    <select name="NumberofAdults" id="NumberofAdults" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                 </div>
                                                <div>
                                                    <label style="font-weight:normal">Number of Infants (age: below 2 yr)</label>
                                                    <select name="NumberofInfants" id="NumberofInfants" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label style="font-weight:normal">Number of Children (age: 3-12)</label>
                                                    <select name="NumberofChildrens" id="NumberofChildrens" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                                
                                                
                                                
                                                <!--
                                                <div class="">
                                                    <input type="text" name="date_book" value="" placeholder="Date Book" class="hasDatepicker">
                                                </div>
                                                -->
                                                 
                                               <div id="red" style="margin-top:10px;"></div>
                                                
                                                <br>
                                                <input class="btn-booking btn" onclick="SaveEnquiryDetails()" value="Send Enquiry" type="button" style="background:#26bdf7;color: #fff;border: none;padding: 15px;font-size: 18px;">
                                            </form>
                                        </div>
                                    </div>
                               <script>
                               
                         

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField) == false) 
        {
            //alert('Invalid Email Address');
            return false;
        }

        return true;

}


                               
                                  function SaveEnquiryDetails() {
                                       jQuery("#ErrorFullName").html("");
                                       jQuery("#ErrorEmailID").html("");
                                        jQuery("#ErrorMobileNumber").html("");
                                         jQuery("#ErrorCurrentCity").html("");
                                            jQuery("#ErrorPincode").html("");
                                              jQuery("#ErrorDescription").html("");
                                        
                       var fullname = jQuery("#FullName").val();
                       if (fullname.trim().length<3) {
                            jQuery("#ErrorFullName").html("Please enter name");
                            return false;
                       }                
                            
                         var emailid = jQuery("#EmailID").val();
                     //  if (emailid.trim().length<3) {
                       //     jQuery("#ErrorEmailID").html("Please enter email id");
                         //   return false;
                       //}                
                            if (emailid.trim().length>0) {  
                             if (!(validateEmail(emailid)))               {
                                  jQuery("#ErrorEmailID").html("Please enter valid email id");
                                  return false;
                             }
                            }
                       
                           var mobilenumber = jQuery("#MobileNumber").val();
                           
                       if (mobilenumber.trim().length!=10) {
                         
                            jQuery("#ErrorMobileNumber").html("Please enter mobile number");
                            return false;
                       }                         
                       
                       var mobilenumber = parseInt(jQuery("#MobileNumber").val().trim());
                        mobilenumber = mobilenumber==NaN ? 0 : mobilenumber;
                           if (!(mobilenumber<9999999999 && mobilenumber>6000000000)) {
                            jQuery("#ErrorMobileNumber").html("Please enter valid mobile number");
                            return false;
                       }       
                       
                        var currentcity = jQuery("#CurrentCity").val();
                       if (currentcity.trim().length<3) {
                            jQuery("#ErrorCurrentCity").html("Please enter current city");
                            return false;
                       }           
                          
                              var pincode = jQuery("#Pincode").val();
                       if (pincode.trim().length!=6) {
                            jQuery("#ErrorPincode").html("Please enter pincode");
                            return false;
                       }                        
                       
                              //var description = jQuery("#Description").val();
                    //   if (description.trim().length<3) {
                       //     jQuery("#ErrorDescription").html("Please enter description");
                         //   return false;
                    //   }          
     var param = jQuery( "#tourBookingForm").serialize();
    //jQuery("#confrimation_text").html(loading);
    
    jQuery("#red").html("<img src='assets/loading.gif' style='width:32px'> processing ....");
    jQuery.post( "webservice.php?action=SubmitEnquiryDetails",param,function(data) {                                       
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            jQuery("#red").html("<div style='padding:10px;background:#f1f1f1;'>"+obj.message+"</div>");
        } else {
            
            jQuery("#FullName").val("");
            jQuery("#CurrentCity").val("");
            jQuery("#NumberofAdults").val(0);
            jQuery("#NumberofInfants").val(0);
            jQuery("#NumberofChildrens").val(0);
            jQuery("#Pincode").val(0);
            jQuery("#EmailID").val(0);
            jQuery("#MobileNumber").val(0);
            jQuery("#Description").val(0);
                                                 
                                                   
            jQuery("#red").html("<div style='padding:10px;background:#f1f1f1;'>"+obj.message+"</div>");
        }
    });
}
                               </script>      
                                     
                                </div>
                                <div class="widget-area align-left col-sm-3">
                                
                                
                                
                                
                              <aside class="widget widget_travel_tour">
                                        <div class="wrapper-special-tours">
                        <?
                                $SubTours = $mysql->select("SELECT * FROM _tbl_sub_tour WHERE IsPublish='1' order by RAND() LIMIT 3");
                                foreach($SubTours as $SubTour) {
                                    $priceFrom = $mysql->select("SELECT (PackagePrice*1) as PackagePrice  FROM _tbl_tours_package WHERE SubTourTypeID='".$SubTour['SubTourTypeID']."' ORDER BY PackagePrice*1 LIMIT 0,1");
                                    $priceFrom = isset($priceFrom[0]['PackagePrice']) ? $priceFrom[0]['PackagePrice'] : "0.00";
                                    
                        ?>
                        
                        <div class="inner-special-tours">
                                                <a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>">
                                                    <img width="430" height="305" src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" alt="Discover Brazil" title="Discover Brazil"></a>
                                                <div class="item_rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post_title"><h3>
                                                    <a href="single-tour.html" rel="bookmark"><?php echo $SubTour['SubTourTypeName'];?></a>
                                                </h3></div>
                                                <div class="item_price">
                                                    <span class="price">From Rs. <?php echo number_format($priceFrom,2);?></span>
                                                </div>
                                            </div>
                                            
                             
                            <?php } ?>
                             
                             
                        </div>
                   
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                   
                                             
                                             
                                        
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
<?php include_once("footer.php");?>