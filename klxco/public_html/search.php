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
    $sql .=   "  title like '%".$_GET['searchkey']."%' or content like '%".$_GET['searchkey']."%' limit 0,24";
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
            <div class="row row-projects">
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
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="col-md-12" style="text-align: right;padding:10px;">                 
                                        <?php 
                                            $dup = $mysql->select("select * from _jfeatures_likedcontact where userid='".$_SESSION['USER']['userid']."' and adid='".$ad['postadid']."'");
                                            if (sizeof($dup)==0) {                                                          
                                        ?>
                                            <span style="float:right;cursor:pointer"  onclick="likead('<?php echo md5($ad['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="flaticon-like"></i></span>
                                        <?php }else { ?>
                                             <span style="float:right;color:red;cursor:pointer" onclick="likead('<?php echo md5($ad['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="fas fa-heart"></i></span>  
                                        <?php } ?>
                                    </div>
                        <div  onclick="viewad('<?php echo $ad['postadid'];?>')">
                        <div class="p-2">
                            <img class="card-img-top rounded" src="<?php echo base_url.$filename;?>" alt="Product 7">
                        </div>                                                                    
                        <div class="card-body pt-2">
                            <h3 class="mb-0 fw-bold">₹ <?php echo $ad['amount'];?></h3>
                            <p class="text-muted small mb-3"><?php echo $ad['title'];?></p>
                            <p class="text-muted small m-0" style="font-size:11px;">
                                <?php echo $ad['location'];?>
                                <span style="float: right;"><?php echo date("M d",strtotime($ad['postedon']));?></span>
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div> 
    </div>
</div>                              
<?php include_once("footer.php"); ?>