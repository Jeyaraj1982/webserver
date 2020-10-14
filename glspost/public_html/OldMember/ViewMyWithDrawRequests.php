<?php include_once("header.php"); ?> 
 <?php $Requests  = $mysql->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_member 
                        ON _tbl_member_withdraw_request.MemberID=_tbl_member.MemberID where _tbl_member_withdraw_request.RequestID='".$_GET['code']."'");        ?>
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>My WithDraw Requests
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"> 
                                       
                                            <div>
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">Member Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['MemberName'];?>">
                                                    </div>
                                                </div>
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Amount</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo number_format($Requests[0]['Amount'],2);?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Bank Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['BankName'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">Account Number</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['AccountNumber'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">IFS Code</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['IFSCode'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">Requested On</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['RequestedOn'];?>">
                                                    </div>
                                                </div>     
                                                </div> 
                                                <div>
                                                   <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Transaction Details</h4>
                                                    <?php if($Requests[0]['IsApproved']=="1"){?> 
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">Bank Txn ID</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnID'];?>">
                                                    </div>
                                                </div>
                                                   <div class="form-group row">
                                                   <div class="col-sm-3">Txn Mode</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnMode'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Txn Date</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnDate'];?>">
                                                    </div>
                                                </div>
                                                <?php }?>
                                                </div> 
                                                <div>
                                                    <?php if($Requests[0]['IsApproved']=="1" && $Requests[0]['IsRejected']=="0"){ ?>
                                                     <p class="text-muted"><?php echo "Approved";?><br><?php echo $Requests[0]['IsApprovedOn'];?></p>
                                                <?php }?>
                                                <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="1"){ ?>
                                                     <p class="text-muted"><?php echo "Rejected";?><br><?php echo $Requests[0]['IsRejectedOn'];?></p>
                                                <?php }?>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>             