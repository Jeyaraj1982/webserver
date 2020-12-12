<?php $data= $mysql->select("select * from _tbl_store_types where StoreTypeID='".$_GET['id']."'");?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/NewStore">Supporting Center</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/NewStore">Store Type</a></li>
        </ul>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Store Type Information</div>
                </div>
                <div class="card-body">
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Store Type Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['StoreTypeName'];?></div>
                    </div>
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Store Type Logo</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><img src="assets/stores/<?php echo $data[0]['StoreTypeImage'];?>" style="height:200px"></div>
                    </div>
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsActive</label>
                        <div class="col-lg-4 col-md-9 col-sm-8">
                            <?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No"; } ?>
                        </div>
                    </div>
                </div>                                                                        
                <div class="card-action">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="dashboard.php?action=SupportingCenter/ManageBusinessStore&filter=all" class="btn btn-warning btn-border">Back</a>
                        </div>                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">
                                View Stores
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                    <th><b>Store Name</b></th>
                                    <th><b>State Name</b></th>
                                    <th><b>District Name</b></th>
                                    <th><b>Status</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $Requests  = $mysql->select("SELECT * FROM _tbl_business_supporting_center where StoreTypeID='".$_GET['id']."'" );?>
                                <?php foreach($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['SupportingCenterName'];?></td>
                                        <td><?php echo $Request['State'];?></td>
                                        <td><?php echo $Request['District'];?></td>
                                        <td><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                    </tr>
                                <?php } ?>
                                <?php if(sizeof($Requests)==0){ ?>
                                    <tr>
                                        <td colspan="4" style="text-align: center;">No Stores Found</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>                                                                                             
        </div>
    </div>
</div>
 


