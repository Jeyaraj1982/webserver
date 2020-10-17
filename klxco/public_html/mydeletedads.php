<?php include_once("header.php"); ?>
<div class="main-panel"  style="width: 100%;height:auto !important">
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
                        <a href="mypage.php" >Dashboard</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="mydeletedads.php" >My Deleted Ads</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Deleted Ads</h4>
                </div>
                <div class="card-body">
                    <div class="row row-projects">
                            <?php
                            $ads = JPostads::getMyDeletedAds($_SESSION['USER']['userid']);
                                 foreach ($ads as $ad) {   
                                      $filename = ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
                            ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                              
                                <div class="p-2">
                                    <img class="card-img-top rounded" src="<?php echo $filename;?>" alt="Product 7">
                                    <?php if ($ad['isdeleted']==1) {?>
                                    <div>
                                        <a class="btn btn-danger  btn-sm" style="padding:2px 5px">deleted</a>
                                    </div>
                                
                                <?php } ?>
                                </div>
                                <div class="card-body pt-2">
                                
                                    <h3 class="mb-0 fw-bold">₹ <?php echo $ad['amount'];?>
                                    <?php if ($ad['isdeleted']!=1) {?>
                                       <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:#fff;padding-right:0px;margin-right:0px;">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                         
                                            <a class="dropdown-item" href="editads.php?ad=<?php echo $ad['postadid'];?>" draggable="false">Edit</a>
                                          
                                            <a class="dropdown-item" href="viewmyad.php?ad=<?php echo $ad['postadid'];?>" draggable="false">View</a>
                                            
                                            <a class="dropdown-item" href="deletemyad.php?ad=<?php echo $ad['postadid'];?>" draggable="false">Trash</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    </h3>
                                    <p class="text-muted small mb-3"><?php echo $ad['title'];?></p>
                                    <p class="text-muted small m-0" style="font-size:11px;"><?php echo $ad['location'];?>
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
    </div> 
</div>
   
<?php include_once("footer.php"); ?>