<?php $data= $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$_GET['id']."'");?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting">Supporting Center</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting">Searched Member Log</a></li>
        </ul>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Supporting Center Information</div>
                </div>
                <div class="card-body">
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Store Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['SupportingCenterName'];?></div>
                    </div>
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">State Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['State'];?></div>
                    </div>
                    <div class="form-group form-show-validation row" style="padding:0px">
                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">District Name</label>
                        <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['District'];?></div>
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
                            <a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting&filter=all" class="btn btn-warning btn-border">Back</a>
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
                                Searched Member Log
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Member ID</th>
                                        <th scope="col">Verified On</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $members = $mysql->select("select * from _tbl_member_verify_log order by VerifyID desc");?>
                                <?php foreach($members as $member){ ?>
                                    <tr>
                                        <td><?php echo $member['TypedMemberID'];?></td>
                                        <td><?php echo date("M-d-Y H:i",strtotime($member['VerifiedOn']));?></td>
                                        <td><?php echo $member['IsValid']==1 ? "Valid" : "Invalid";?></td>
                                    </tr>
                                <?php } ?>
                                <?php if(sizeof($members)==0){ ?>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">No Logs Found</td>
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
 


