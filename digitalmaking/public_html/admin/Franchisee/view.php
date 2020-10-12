<?php $data= $mysql->select("select * from _tbl_franchisee where FranchiseeID='".$_GET['id']."'");?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Franchisee Information</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-show-validation row">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name</label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['FranchiseeName'];?></div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsActive</label>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                    <?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No"; } ?>
                                </div>
                            </div>
                        </div>                                                                        
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=Franchisee/List" class="btn btn-warning btn-border">Back</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
  </div>
