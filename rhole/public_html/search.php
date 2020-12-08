<?php
    include_once("header.php");
   // if (isset($_GET['a']) && $_GET['a']>0) {
     //   $ads = JPostads::getPostadByCategory($_REQUEST['a']);   
     //   $c = JPostads::getCategory($_GET['a']);   
   // } else {                                    
       // $ads = JPostads::getPostadBySubCategory($_REQUEST['s']);   
       // $c = JPostads::getCategory($_GET['s']);;               
   // }
   $sql = "select * from _jpostads where ";
   if (isset($_GET['location'])) {
        $location = explode("-",$_GET['location']);
        $districtid = $location[0];   
        if ($_GET['statefilter']) {
             $sql .= " stateid='".$districtid."' and " ;
        } else {
            $sql .= " distcid='".$districtid."' and " ;    
        }
        
   }
   
   if (isset($_GET['country'])) {
        $country = $mysql->select("select * from _jcountrynames where countrycode='".$_GET['country']."'");    
          $sql .= " countryid='".$country[0]['countryid']."' and " ;
   }
   if (strlen(trim($_GET['searchkey']))>0) {
    $sql .=   "  (title like '%".$_GET['searchkey']."%' or content like '%".$_GET['searchkey']."%') limit 0,24";
   } else {
       $sql .=   " postadid>0 order by postadid desc  limit 0,24 ";
   }
 
   $ads = $mysql->select($sql);
?>
<div class="main-panel"  style="width: 100%;height:auto !important">                 
    <div class="container">  
        <div class="page-inner">
        <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
        <?php include_once("includes/searchform.php");?>
            <div class="page-header">
                <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                    <li class="nav-home">
                        <a href="index.php">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                       <a href="">Search Result</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                       <a href=""><?php echo $_GET['searchkey'];?></a>
                    </li>

                </ul>
            </div>     
              <div class="row row-projects" id="drop_D">
                <?php if (sizeof($ads)==0) { ?>
                <div class="card" style="width: 100%;"> 
                    <div class="card-body">
                        No ads found.
                    </div>
                </div>
                <div style="text-align:center;width:100%">
                    <a href="index.php">Backk</a>
                </div>
                <?php }
                                                                                                     
                foreach ($ads as $ad) {   
                    $filename = ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
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
                            <img class="card-img-top rounded adImage" src="<?php echo base_url;?><?php echo ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');?>" alt="Product 7" >
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
                <img src="<?php echo AppUrl;?>/assets/tenor.gif" id="pLoad" style="display:none;"><br>
                <a href="javascript:void(0)" onclick="getMoreAds()" id="getMoreBtn" class="btn btn-primary">Load More</a>
                </div>
            </div>
        </div> 
    </div>
</div>                              
<?php include_once("footer.php"); ?>