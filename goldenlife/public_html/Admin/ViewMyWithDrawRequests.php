<?php include_once("header.php"); ?> 
 <?php $Requests  = $mysql->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_member 
                        ON _tbl_member_withdraw_request.MemberID=_tbl_member.MemberID where _tbl_member_withdraw_request.RequestID='".$_GET['code']."'");  
                        
    if (isset($_POST['Reject'])) {
             $mysql->execute("update _tbl_member_withdraw_request set `IsRejected`='1',                               
                                                                         `IsRejectedOn`='".date('Y-m-d H:i:s')."' where `RequestID`='".$_GET['code']."'");
           ?>                                          
               <script>location.href='ViewMyWithDrawRequests.php?code=<?php echo $Requests[0]['RequestID'];?>';</script>
        <?php }
        ?>
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
                                         <form method="post" action="0">
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
                                                <?php } else {?>
                                                     <div class="form-group row">
                                                   <div class="col-sm-3">From Bank</div>
                                                    <div class="col-sm-9">
                                                         <?php if($Requests[0]['IsApproved']=="0"){?>
                                                    <select name="BankName" id="BankName" class="form-control">
                                                        <?php $BankDetails =$mysql->select("select * from _tbl_bank_details ");
                                                                foreach($BankDetails as $BankDetail){
                                                         ?>
                                                        <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?>&nbsp;-&nbsp;<?php  echo $BankDetail['AccountNumber']; ?>&nbsp;-&nbsp;<?php echo $BankDetail['IFSCode']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_FromBank'];
                                                    }?>
                                                    </div>
                                                </div>   
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Transaction ID</div>
                                                    <div class="col-sm-9">
                                                          <?php if($Requests[0]['IsApproved']=="0"){?> 
                                                    <input type="text" name="TransactionID" id="TransactionID" class="form-control" value="<?php echo (isset($_POST['TransactionID']) ? $_POST['TransactionID'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Transaction Number">
                                                   <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_TxnID'];}?> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Transaction ID</div>
                                                    <div class="col-sm-9">
                                                        <?php if($Requests[0]['IsApproved']=="0"){?> 
                                                    <input type="date" name="TxnDate" id="TxnDate" class="form-control" value="<?php echo (isset($_POST['TxnDate']) ? $_POST['TxnDate'] : "");?>" class="form-control">
                                                   <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_TxnDate'];}?>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">Transaction Mode</div>
                                                    <div class="col-sm-9">                                                              
                                                         <?php if($Requests[0]['IsApproved']=="0"){?>
                                                   <select name="Mode" id="Mode" class="form-control">
                                                        <option value="NEFT" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>NEFT</option>
                                                        <option value="IMPS" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>IMPS</option>
                                                    </select>
                                                  <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_TxnMode'];}?>
                                                    </div>
                                                </div>
                                                <?php }?>
                                                </div> 
                                                <div>                                                                                   
                                                <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="0"){ ?>
                                                    <button type="submit" name="Approve" id="Approve" class="btn btn-primary" >Approve</button>&nbsp;&nbsp;
                                                    <button type="submit" name="Reject" id="Reject" class="btn btn-danger" >Reject</button>
                                                <?php }?>
                                                    <?php if($Requests[0]['IsApproved']=="1" && $Requests[0]['IsRejected']=="0"){ ?>
                                                     <p class="text-muted"><?php echo "Approved";?><br><?php echo $Requests[0]['IsApprovedOn'];?></p>
                                                <?php }?>
                                                <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="1"){ ?>
                                                     <p class="text-muted"><?php echo "Rejected";?><br><?php echo $Requests[0]['IsRejectedOn'];?></p>
                                                <?php }?>
                                                </div>
                                                </form>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>             