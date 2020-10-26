<?php $sql= $mysql->select("select * from `_tbl_Members` where  `MemberID`='".$_SESSION['User']['MapedTo']."'"); ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">My Dealer Information</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-show-validation row">
                                <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Dealer's Name </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberName'];?></div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MobileNumber'];?></div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['EmailID'];?></div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"> Address </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Address1'];?></div>
                            </div>
                            
                            <?php if(strlen($sql[0]['Address2'])>0){?>
                            <div class="form-group form-show-validation row">
                                <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"></label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Address2'];?></div>
                            </div>
                            <?php } ?>
                            
                            <div class="form-group form-show-validation row">
                                <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">GSTIN </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['GSTIN'];?></div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Pincode </label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['PostalCode'];?></div>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>