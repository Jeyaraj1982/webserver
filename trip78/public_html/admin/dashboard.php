<?php
include_once("header.php");
include_once("LeftMenu.php"); 
if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { ?>
<br><br>
<div class="main-panel full-height">
            <div class="container">
                <div class="panel-header">
                    <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                            <div class="nav-scroller d-flex">
                                <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                    <?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");?>
                    <?php foreach($Tours as $Tour) { ?>
                    <?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tour['TourTypeID']."'");?> 
                    <?php $ActiveToursPackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$SubTours[0]['SubTourTypeID']."'");?> 
                    <?php $Enquiry = $mysql->select("select * from _tbl_tour_enquiry where PackageID='".$ActiveToursPackages[0]['PackageID']."'");?> 
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" style="cursor: pointer;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b><?php echo $Tour['TourTypeName'];?></b></h5>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Active Packages :</p>
                                        <p class="text-muted mb-0"><?php echo sizeof($ActiveToursPackages);?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Total Enquiry :</p>
                                        <p class="text-muted mb-0"><?php echo sizeof($Enquiry);?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
<?php } ?>
<?php include_once("footer.php");?>