<?php
    include_once("header.php");
 
    if (isset($_GET['a']) && $_GET['a']>0) {
        $ads = JPostads::getPostadByCategory($_GET['a']);   
       $c = JPostads::getCategory($_GET['a']);   
    }
    if (isset($_GET['s']) && $_GET['s']>0) {                                    
        $ads = JPostads::getPostadBySubCategory($_GET['s']);   
        $subc = $mysql->select("select * from _jsubcategory where subcateid='".$_GET['s']."'") ;
        $mainc = $mysql->select("select * from _jcategory where categid='".$subc[0]['categid']."'") ;
        $c = JPostads::getCategory($_GET['s']);;               
 
    }
?>
<div class="main-panel" style="width: 100%;height:auto;">                 
    <div class="container" style="height:auto;margin:0px ">  
        <div class="page-inner">
            <div class="page-header">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a>
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
                        <a href="<?php echo country_url."sc".$mainc[0]['categid']."-".$mainc[0]['categname'];?>"><?php echo $mainc[0]['categname'];?></a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url."viewads/sc".$_GET['s']."-".$subc[0]['subcatename'];?>"><?php echo $subc[0]['subcatename'];?></a>
                    </li>
                </ul>
            </div>     
            <div class="row row-projects">
                <?php if (sizeof($ads)==0) { ?>
                <div class="card" style="width: 100%;background:none;box-shadow:none"> 
                    <div class="card-body" style="text-align:center">
                    <img src="<?php echo base_url;?>/assets/img/big-data.png" style="width:50%"><br>
                        No ads found in this category<br><BR><bR> 
                        
                        <a href="<?php echo country_url;?>" class="btn btn-primary btn-sm">Continue</a>
                    </div>
                </div>
                
                <?php }
                 
                foreach ($ads as $ad) {   
                    $filename = ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "./../../../assets/".$config['thumb'].$ad['filepath1'] : "../../assets/cms/".Jca::getAppSetting('noimage');
                   
                    
                ?>
                 <div class="col-sm-6 col-lg-3" onclick="viewad('<?php echo $ad['postadid'];?>')">
                    <div class="card">
               
                        <div class="p-2">
                            <img class="card-img-top rounded" src="<?php echo $filename;?>">
                                 
                            
                                    
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
               
                <?php } ?>
            </div>
        </div> 
    </div>
</div>                
<?php include_once("footer.php"); ?>