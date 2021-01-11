<?php
  $Requests  = $mysql->select("SELECT * FROM _tbl_member_withdraw_request where RequestID='".$_GET['code']."'" );
  $Member  = $mysql->select("SELECT * FROM _tbl_member where MemberID='".$Requests[0]['MemberID']."'" );
  ?>
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
                                        My WithDraw Requests
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Member Name</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Member[0]['MemberName'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Amount</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo number_format($Requests[0]['Amount'],2);?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Account Number</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['AccountNumber'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">IFS Code</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['IFSCode'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Requested On</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['RequestedOn'];?>">
                                    </div>
                                </div>     
                            </div> 
                            <div>
                                <?php if($Requests[0]['IsApproved']=="1"){?> 
                                <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Transaction Details</h4>
                                <div class="form-group row">
                                    <div class="col-sm-3">Bank Txn ID</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnID'];?>">
                                    </div>
                                </div>
                               <div class="form-group row">
                                    <div class="col-sm-3">Txn Mode</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnMode'];?>">
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <div class="col-sm-3">Txn Date</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnDate'];?>">
                                    </div>
                                </div>
                            <?php }?>
                            </div> 
                            <div>
                                <?php if($Requests[0]['IsApproved']=="1" && $Requests[0]['IsRejected']=="0"){ ?>
                                    <p class="text-muted"><?php echo "Approved";?><br><?php echo $Requests[0]['IsApprovedOn'];?></p>
                                <?php }?>
                                <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="1"){ ?>
                                     <p class="text-muted"><?php echo "<span style='color:red'>Rejected</span>";?><br><?php echo $Requests[0]['RejectRemarks'];?><br><?php echo $Requests[0]['IsRejectedOn'];?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 