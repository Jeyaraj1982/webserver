<?php
    include_once("header.php");
?>
        <div class="page-inner" style="clear: both;">   
        <?php include_once("includes/searchform.php");?>
            <div class="row mobilemenu">
                <div class="col-sm-12">
                    <div class="card" >
                        <div class="card-header">
                            <h4 class="card-title">Popular Categories </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('4-Real-Estate')">
                                    <div style="border:none;background:#fce2a9;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/building.png" style=""> 
                                    </div>  
                                    <p style="text-align: center;;font-size:11px;">Real Estate</p>
                                </div>
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('1-Automobiles')">
                                    <div style="border:none;background:#fffcb7;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/car.png" style=""> 
                                    </div> 
                                    <p style="text-align: center;;font-size:11px;">Automobile</p>
                                </div>      
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('12-Entertainment')" style="padding-right:0px">
                                    <div style="border:none;background:#bdf6f9;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/entertainment.png" style=""> 
                                    </div> 
                                    <p style="text-align: center;;font-size:11px;">Entertainment</p>
                                </div>
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('5-Jobs')">
                                    <div style="border:none;background:#cae2f9;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/elearning.png" style=""> 
                                    </div> 
                                    <p style="text-align: center;;font-size:11px;">Jobs</p>
                                </div>
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('3-Electronics-Appliances')">
                                    <div style="border:none;background:#fedbff;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/outlet.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Appliances</p>
                                </div>
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('2-Mobiles-Tablets')"  style="padding-right:0px">
                                    <div style="border:none;background:#bef7c7;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/smartphone.png" style=""> 
                                    </div>     
                                    <p style="text-align: center;;font-size:11px;">Mobiles</p> 
                                </div>   
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('7-Food')">
                                    <div style="border:none;background:#d1fcfb;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/food.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Food Items</p>
                                </div>
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('8-Services')">
                                    <div style="border:none;background:#d6d6f9;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/solution.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Services</p>
                                </div>
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('6-Life-Style')"  style="padding-right:0px">
                                    <div style="border:none;background:#fcbdbd;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/fashion.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Life Style</p>
                                </div>
                                
                                 <div class="col-4 cursor-hand" onclick="ListSubCategories('13-Pets')">
                                    <div style="border:none;background:#fce2a9;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/pets.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Pets</p>
                                </div>
                                <div class="col-4 cursor-hand" onclick="ListSubCategories('14-Furniture')"  style="padding-right:0px">
                                    <div style="border:none;background:#bdf6f9;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/couch.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Furniture</p>
                                </div>
                                <!--<div class="col-4 cursor-hand" onclick="ListSubCategories('15-MyNeed')"  style="padding-right:0px">
                                    <div style="border:none;background:#fffcb7;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/myneeds.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">My Needs</p>
                                </div>-->
                                <div class="col-4 cursor-hand" onclick="location.href='https://www.klx.co.in/freejobs.php'"  style="padding-right:0px">
                                    <div style="border:none;background:#fffcb7;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/earning.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Free Job</p>
                                </div>
                                
                                
                                
                                
                                 
                                 <div class="col-4 cursor-hand" onclick="location.href='https://www.klx.co.in/videoads.php'">
                                    <div style="border:none;background:#fc83b1;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto">
                                        <img src="<?php echo base_url;?>assets/icons/videoad.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Video Ads</p>
                                </div>
                                <!--
                                <div class="col-4 cursor-hand" onclick="location.href='https://www.klx.co.in/digitaljobs.php'"style="padding-right:0px">
                                    <div style="border:none;background:#ffc4c4;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/photocard.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Photo Ads</p>
                                    <p style="text-align: center;;font-size:11px;">Digital Jobs</p>
                                </div>
                                -->
                                <div class="col-4 cursor-hand" onclick="location.href='https://www.klx.co.in/start-own-business.php'"style="padding-right:0px">
                                    <div style="border:none;background:#ffc4c4;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/photocard.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Start Own Business</p>
                                </div>
                                <!--
                                <div class="col-4 cursor-hand" onclick="location.href='https://www.klx.co.in/businessoffers.php'"  style="padding-right:0px">
                                    <div style="border:none;background:#bfa8ff;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/ads.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Business Offer</p>
                                </div>  
                                -->
                                <div class="col-4 cursor-hand" onclick="location.href='https://www.klx.co.in/put-your-ad.php'"  style="padding-right:0px">
                                    <div style="border:none;background:#bfa8ff;border-radius:50%;padding:16px;height: 64px;width: 64px;margin:0px auto;">
                                        <img src="<?php echo base_url;?>assets/icons/ads.png" style=""> 
                                    </div>
                                    <p style="text-align: center;;font-size:11px;">Put Your Ad & Earn Money</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <div class="row row-projects" id="drop_D">
            <?php
            //print_r($_GET);
            if (isset($_GET['location'])) {
                $l = explode("-",$_GET['location']);
                
                if (isset($_GET['statefilter'])) {
                    
                    $fads = JPostads::getFeaturedAds(1,0,0,24,$l[0]); 
                    $append =  (sizeof($fads)>0) ? "f" : "";
                    $nads = JPostads::getAds(1,0,0,24,$l[0]); 
                    $ads = array_merge($fads, $nads);  
                     ?>
                 <script>stateid='<?php echo $l[0];?>';</script>
                 <?php  
                  
                } else {
                    $fads = JPostads::getFeaturedAds(1,$l[0],0,24,0);   
                    $append =  (sizeof($fads)>0) ? "f" : "";
                    $nads = JPostads::getAds(1,$l[0],0,24,0);   
                    $ads = array_merge($fads, $nads);
                   ?>
                 <script>district='<?php echo $l[0];?>';</script>
                 <?php 
                }
                 
                 
            } else {
                 $ads = JPostads::getAds(1,0,0,24,0);
            }
            ?>
                <?php foreach ($ads as $ad) { 
                       if ($ad['featured']=='1') {
                            $style = "style='border:3px solid yellow'";
                            $p = "<div style='background:yellow;color:#222;padding:2px;text-decoration:none;font-weight:bold;'>TOP AD</div>";
                        } else {
                            $style = " ";
                            $p = "";
                        }
                    ?>
                <div class="col col-lg-3 ">           
                    <div class="card adbox<?php echo $append;?>" <?php echo $style;?>>
                        <div style="text-align: right;padding:10px;">
                        <?php 
                            $dup = $mysql->select("select * from _jfeatures_likedcontact where userid='".$_SESSION['USER']['userid']."' and adid='".$ad['postadid']."'");
                            if (sizeof($dup)==0) {                                                          
                        ?>
                            <span style="float:right"  onclick="likead('<?php echo md5($ad['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="flaticon-like"></i></span>
                        <?php }else { ?>
                             <span style="float:right;color:red" onclick="likead('<?php echo md5($ad['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="fas fa-heart"></i></span>  
                        <?php } ?>
                        </div>
                        <a href="<?php echo path_url."v".$ad['postadid']."-".parseTextToURL($ad['title']);?>">
                        <div>
                        <?php echo $p; ?>
                        <div class="p-2" style="text-align: center" onclick="viewad('<?php echo $ad['postadid']."-".parseTextToURL($ad['title']);?>')">
                        <?php
                        $path =  ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
                         //   $path = 'myfolder/myimage.png';
//$type = pathinfo($path, PATHINFO_EXTENSION);
//$data = file_get_contents($path);
//$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                            <img class="card-img-top rounded adImage" src="<?php echo base_url;?><?php echo $path;?>" alt="Product 7" >
                            <!--<img class="card-img-top rounded adImage" src="<?php echo base_url;?><?php echo ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');?>" alt="Product 7" >-->
                        </div>
                        <div class="card-body pt-2">
                        <?php if ($ad['categid']==5) { ?>
                            <h3 class="mb-0 fw-bold">Salary : <i class="fas fa-rupee-sign"></i> <?php echo $ad['SalaryFrom'];?> - <i class="fas fa-rupee-sign"></i> <?php echo $ad['salaryTo'];?></h3>         
                        <?php  } else { ?>
                            <h3 class="mb-0 fw-bold"><i class="fas fa-rupee-sign"></i> <?php echo $ad['amount'];?></h3>
                            <?php } ?>
                            <div  onclick="viewad('<?php echo $ad['postadid'];?>')">
                                <p class="text-muted small mb-3 description_level1" style="height:60px !important"><?php echo  substr($ad['title'],0,60);?> <?php echo strlen($ad['title'])>60 ? "..." : "";?></p>
                                <p class="text-muted small m-0" style="font-size:11px;">
                                    <?php
                                    $city = JPostads::getCity($ad['cityid']);
                                    $districtname = JPostads::getDistrict($ad['distcid']);
                                     echo $districtname[0]['districtname']. " / ".$city[0]['cityname'];
                                     ?>
                                    <p class="postedon"><?php echo date("M d",strtotime($ad['postedon']));?></p>
                                </p>
                            </div>
                        </div>
                        </div>
                        </a>
                    </div>
                    
                  </div>
                <?php } ?>
            </div>
        
        <div class="row" id="loadmore">   
            <div class="col-md-12" style="text-align: center;">
                <img src="https://www.klx.co.in/assets/tenor.gif" id="pLoad" style="display:none;"><br>
                <a href="javascript:void(0)" onclick="getMoreAds()" id="getMoreBtn" class="btn btn-primary">Load More</a>
                </div>
            </div>  
        </div> 
<?php include_once("footer.php"); ?>