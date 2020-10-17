<?php
    include_once("header.php");
    if (isset($_GET['a']) && $_GET['a']>0) {
        $ads = JPostads::getPostadByCategory($_REQUEST['a']);   
        $c = JPostads::getCategory($_GET['a']);   
    } else {                                    
        $ads = JPostads::getPostadBySubCategory($_REQUEST['s']);   
        $c = JPostads::getCategory($_GET['s']);;               
    }
?>
<div class="main-panel" style="width: 100%;">                 
    <div class="container">  
        <div class="page-inner">
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
                        <a href="viewads.php?a=<?php echo $_REQUEST['a'];?>"><?php echo $c[0]['categname'];?></a>
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
                    <a href="index.php">Back</a>
                </div>
                <?php }
                
                foreach ($ads as $ad) {   
                    $filename = ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
                ?>
                <div class="col-sm-6 col-lg-3" onclick="viewad('<?php echo $ad['postadid'];?>')">
                    <div class="card">
                        <div class="p-2">
                            <img class="card-img-top rounded" src="<?php echo $filename;?>" alt="Product 7">
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