<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_sub_tour where md5(SubTourTypeID)='".$_GET['id']."'");
$tour= $mysql->Select("select * from _tbl_tour where TourTypeID='".$data[0]['TourTypeID']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Sub Tour Type</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Type Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $tour[0]['TourTypeName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Sub Tour Type Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['SubTourTypeName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Price Starting From</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['PriceStartingFrom'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">                                    
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Image</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><img src="../<?php echo "uploads/".$data[0]['Image'];?>" style='width: 100px;height:100px;margin-top: 5px;'></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsPublish</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($data[0]['IsPublish']=="1"){ echo "Yes";}else { echo "No";} ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Added On</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddedOn'];?></div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">                                  
                                                <a href="dashboard.php?action=Tours/viewsubtours&id=<?php echo md5($data[0]['TourTypeID']);?>" class="btn btn-warning">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php include_once("footer.php");?>