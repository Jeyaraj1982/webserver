
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        My KYC Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <?php
                            $kycInformation = $mysql->select("Select * from _tbl_member_kycinformation where MemberID='".$_SESSION['User']['MemberID']."'  order by KYCID desc limit 0,1");
                         ?> 
                          <?php if(sizeof($kycInformation)>0){?>
                            <div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Aadhaar Number</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $kycInformation[0]['AadhaarNumber'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Pancard Number</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $kycInformation[0]['PanCardNumber'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">VoterID Number</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $kycInformation[0]['VoterIDNumber'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Last Updated</div>                                                                                 
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $kycInformation[0]['AddedOn'];?>">
                                    </div>
                                </div>
                            </div> 
                          <?php } else {?>
                          <div class="form-group row" style="text-align:center;">
                               <div class="col-sm-12"><a class="btn btn-primary" href="Dashboard.php?action=AddMyKYCInformation">Add KYC Information</a></div>
                            </div>
                         <?php } ?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 