<?php
   $Requests  = $mysql->select("SELECT * FROM _tbl_wallet_request_utility LEFT  JOIN _tbl_Members ON _tbl_wallet_request_utility.MemberID=_tbl_Members.MemberID where _tbl_wallet_request_utility.RequestID='".$_GET['code']."'");                                     
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Requests">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Requests">Wallet Request Information</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Wallet Request Information</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Amount</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;$ <?php echo number_format($Requests[0]['Amount'],2);?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Requested</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo date("M d, Y H:i",strtotime($Requests[0]['RequestedOn']));?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Transfered Date</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo date("M d,Y",strtotime($Requests[0]['TransferDate']));?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Bank To</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $Requests[0]['BankName'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row"> 
                            <div class="col-md-6">
                                     <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Bank Ref No</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $Requests[0]['TransactionNumber'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $Requests[0]['Mode'];?></small>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                     <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">User Remarks</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $Requests[0]['Remarks'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Status</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;
                                        <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="0"){ ?>
                                            <?php echo "Pending";?>
                                        <?php }?>
                                        <?php if($Requests[0]['IsApproved']=="1" && $Requests[0]['IsRejected']=="0"){ ?>
                                            <?php echo "Approved";?>, <?php echo date("M d, Y",strtotime($Requests[0]['IsApprovedOn']));?>
                                        <?php }?>
                                        <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="1"){ ?>
                                            <?php echo "Rejected";?>, <?php echo date("M d, Y",strtotime($Requests[0]['IsRejectedOn']));?>
                                        <?php }?>
                                        </small>
                                    </div>
                                </div>  
                            </div>
                             <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    
                                </div>
                            </div> 
                        </div>
                        <?php if ($Requests[0]['IsApproved']=="1" || $Requests[0]['IsRejected']=="1") { ?>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Old Balnace</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;$ <?php echo number_format($Requests[0]['OldBalance'],2);?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">New Balance</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;$ <?php echo number_format($Requests[0]['NewBalance'],2);?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <a href="dashboard.php?action=Wallet/Requests">back</a>
        </div>
    </div>
</div> 