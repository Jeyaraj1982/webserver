<?php include_once("header.php");?>
<?php
    $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and PackageID='".$_GET['tid']."'");
    $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and SubTourTypeID='".$_GET['subtour']."'");
    $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
    $tourThumb =  $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$Packages[0]['PackageID']."' order by ImageOrder");
    
    
      
    $Events = $mysql->select("select * from _tbl_package_day_event where PackageID='".$Packages[0]['PackageID']."' order by (EventDay*1) ASC");
    $adParam = $mysql->select("select * from _tbl_additional_params where PackageID='".$Packages[0]['PackageID']."'");
    $images = $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$Packages[0]['PackageID']."' order by ImageOrder");
?>
<style>
                 
                 div.scrollmenu {
  background-color: #eee;
  border-top:1px solid #999;
  overflow: hidden;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: #333;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size:12px;
  font-weight:bold;
  border-bottom:4px solid #eee;
}

div.scrollmenu a:hover {
  /* background-color: #777;*/
}
.divactive {
    border-bottom:4px solid red !important;
    /* background-color: #777;*/
}

         
 
                 </style>
<div class="page" >
    <form class="searchcontrol">
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="input-group-text close-search"><i class="material-icons">keyboard_backspace</i></button>
            </div>
            <input type="email" class="form-control border-0" placeholder="Search..." aria-label="Username">
        </div>
    </form>
    <header class="row m-0 fixed-header">
        <div class="left">
            <a href="tourpackage.php?subtour=<?php echo $Packages[0]['SubTourTypeID'] ;?>"><i class="material-icons">keyboard_backspace</i></a>
        </div>
        <div class="col center" style="padding-left:0px;">
        <a href="javascript:void(0)" class="logo">
             <?php echo $Packages[0]['PackageName'];?>
             </a>
        </div>
        <!--<div class="right">
        </div>-->
    </header>  
    
 
     <div class="content-sticky-footer" style="min-height: auto; padding-bottom: 0px !important;margin-top:50px;margin-bottom:0px;">
        <div data-pagination='{"el": ".swiper-pagination", "hideOnClick": true}' class="swiper-container swiper-init demo-swiper" style="height:250px;padding:0px;">
            <div class="swiper-pagination" style="margin-top:10px;"></div>
            <div class="swiper-wrapper" style="padding:0px !important">
                <?php foreach($tourThumb as $slider) { ?>
                <div class="swiper-slide" style="padding:0px !important"><img style="width:100%;" src="<?php echo "https://www.trip78.in/uploads/package/".$slider['ImageName'];?>" alt="Home Slider 1"></div>
                <?php } ?>
            </div>
        </div>
        
        <div class="scrollmenu">
           <script>
        function getHighLight() {
           document.getElementById('tab1').attributes["class"].value = "divactive";
           document.getElementById('tab2').attributes["class"].value = "";
           document.getElementById('tab3').attributes["class"].value = "";
           
           document.getElementById('tab-1').attributes["style"].value = "display:block";
           document.getElementById('tab-2').attributes["style"].value = "display:none";
           document.getElementById('tab-3').attributes["style"].value = "display:none";
        }
        
         
        function getITINERARY() {
           document.getElementById('tab1').attributes["class"].value = "";
           document.getElementById('tab2').attributes["class"].value = "divactive";
           document.getElementById('tab3').attributes["class"].value = "";
           
           
           document.getElementById('tab-1').attributes["style"].value = "display:none";
           document.getElementById('tab-2').attributes["style"].value = "display:block";
           document.getElementById('tab-3').attributes["style"].value = "display:none";
        }
        
           function getInclusions() {
           document.getElementById('tab1').attributes["class"].value = "";
           document.getElementById('tab2').attributes["class"].value = "";
           document.getElementById('tab3').attributes["class"].value = "divactive";
           
             document.getElementById('tab-1').attributes["style"].value = "display:none";
           document.getElementById('tab-2').attributes["style"].value = "display:none";
           document.getElementById('tab-3').attributes["style"].value = "display:block";
        }
        </script>
  
  <a href="javascript:void()" id="tab2" class=" " onclick="getITINERARY()" >ITINERARY</a>                 
  <a href="javascript:void()" id="tab1" class="divactive" onclick="getHighLight()">DESCRIPTION</a>
  <a href="javascript:void()" id="tab3" class=" " onclick="getInclusions()" >INCLUSIONS & EXCLUSIONS</a>
 
</div>
     </div>
     <div class="page-content" style="padding-top:10px;margin-top:-50px;padding:10px;"  >
        <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px;height:65vh; overflow: auto;color:yellow">
        
            <div style="display:none"  id="tab-1">
            
             <h5 style="color:yellow;font-weight:bold;"><?php echo $Packages[0]['PackageName'];?></h5>
              <span><?php echo $Packages[0]['NightsCount'];?> NIGHTS <?php echo $Packages[0]['DaysCount'];?> DAYS </span>
               <span class="price" style="color:red;float:right;font-weight:bold;font-size: 20px !important;margin-top: -8px;">&#8377; <?php echo number_format($Packages[0]['PackagePrice']);?></span>
               <hr style="margin-top:5px;">
                 <a href="enquiry.php?package=<?php echo $Packages[0]['PackageID'];?>" class="btn btn-primary btn-sm" style="padding: 10px;font-size: 16px;line-height: 1;text-transform: none;border-radius: 5px;margin-bottom:5px;margin-top:5px;width: 100%;font-weight: bold;padding-bottom: 13px;">ENQUIRY FOR THIS PACKAGE</a>    
                 
                 
                                    <p><?php echo $Packages[0]['ShortDescription'];?></p>
                                    <?php
                                        $l = explode("\n",trim($Packages[0]['Description']));
                                        if (sizeof($l)==1) {
                                            ?>
                                            <p><?php echo $Packages[0]['Description'];?></p>
                                            <?php
                                        } else {
                                            ?>
                                            <ul style="padding-left: 30px;font-size: 12px;">
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
                                                    <h3 style="font-size:13px;font-weight:bold">Notes</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['PackagesNotes']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul style='padding-left: 30px;font-size: 12px;'>";
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
                                                    <h3  style="font-size:13px;font-weight:bold">Extra Toppings</h3>
                                                </div>
                                                <div class="description-content"> 
                                                <?php 
                                                    $d = explode("\n",$adParam[0]['ExtraToppings']);
                                                    if (sizeof($d)>0) { 
                                                        echo "<ul style='padding-left: 30px;font-size: 12px;'>";
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
                                                    <h3  style="font-size:13px;font-weight:bold">Our Speciality</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['OurSpeciality']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul style='padding-left: 30px;font-size: 12px;'>";
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
                                                    <h3  style="font-size:13px;font-weight:bold">Reporting &amp; Dropping for Joining &amp; Leaving Guests:</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['DroppingDetails']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul style='padding-left: 30px;font-size: 12px;'>";
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
                                                    <h3  style="font-size:13px;font-weight:bold">Reporting &amp; Dropping for Joining &amp; Leaving Guests:</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['termsandconditions']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul style='padding-left: 30px;font-size: 12px;'>";
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
                                                    <h3  style="font-size:13px;font-weight:bold">Reporting &amp; Dropping for Joining &amp; Leaving Guests:</h3>
                                                </div>
                                                <div class="description-content"> 
                                                    <?php 
                                                        $d = explode("\n",$adParam[0]['charges']);
                                                        if (sizeof($d)>0) { 
                                                            echo "<ul style='padding-left: 30px;font-size: 12px;'>";
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
            <div style="display: none;" id="tab-2">
                                     <?php foreach($Events as $Event) { ?>
                                     <div class="interary-item">
                                         
                                        <div class="item_content">
                                            <h2 style="font-size:13px;"><strong style="color:red">Day <?php echo $Event['EventDay'];?>:</strong> <?php echo $Event['EventTitle'];?></h2>
                                            <?php
                                                $l = explode("\n",trim($Event['EventDescription']));
                                                if (sizeof($l)==1) {
                                            ?>
                                                <p><?php echo $Event['EventDescription'];?></p>
                                            <?php } else { ?>
                                                <ul style="padding-left: 30px;font-size: 12px;">
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
                                
                                <div style="display: none;"  id="tab-3">
                                    <h2  style="font-size:13px;font-weight:bold;color:red;font-size:16px;">Inclusions:</h2>
                                    <?php 
                                        $d = explode("\n",trim($adParam[0]['inclusions']));
                                        if (sizeof($d)>0) { 
                                            echo "<ul style='padding-left: 30px;font-size: 12px;'>";
                                                foreach($d as $dd) {
                                                    if (trim($dd)!="") {
                                                        echo "<li>".strip_tags($dd)."</li>";
                                                    }
                                                }
                                            echo "</ul>";
                                        }
                                    ?>
                                  
                                    <h2  style="font-size:13px;font-weight:bold;color:red;font-size:16px;">Exclusions:</h2>
                                    <?php 
                                        $d = explode("\n",trim($adParam[0]['exclusions']));
                                        if (sizeof($d)>0) { 
                                            echo "<ul style='padding-left: 30px;font-size: 12px;'>";
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
          <div class="footer-wrapper" style="display: none;">
                    <div class="footer">
                        <div class="row mx-0">
                            <div class="col">
                                Trip78
                            </div>
                            <div class="col-7 text-right">
                                <a href="" class="social"><img src="img/facebook.png" alt=""></a>
                                <a href="" class="social"><img src="img/googleplus.png" alt=""></a>
                                <a href="" class="social"><img src="img/linkedin.png" alt=""></a>
                                <a href="" class="social"><img src="img/twitter.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer dark" style="display: none;">
                        <div class="row mx-0">
                            <div class="col  text-center">
                                Copyright @2018, Trip78.in
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page main ends -->

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/js/jquery-3.2.1.min.js"></script>
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/js/popper.min.js"></script>
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>

    <!-- Cookie jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/cookie/jquery.cookie.js"></script>

    <!-- sparklines chart jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/sparklines/jquery.sparkline.min.js"></script>

    <!-- Circular progress gauge jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/circle-progress/circle-progress.min.js"></script>

    <!-- Swiper carousel jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/swiper/js/swiper.min.js"></script>

    <!-- Application main common jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/js/main.js"></script>

    <!-- page level script -->
  <script>
        var mySwiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            autoplay: {
                delay: 5000,
            },
        });
        getITINERARY();
        setTimeout(function(){
            $('.content-sticky-footer').css({"padding-bottom":"0px  !important"});
            $('.swiper-container').css({"height":"180px !important"});
        },1000);
        

    </script>
</body>

</html>
