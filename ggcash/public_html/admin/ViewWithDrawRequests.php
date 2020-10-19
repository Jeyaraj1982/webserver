<?php include_once("header.php");?>
<?php
 $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
  $Requests  = $mysqldb->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_member_withdraw_request.MemberID=_tbl_Members.MemberID where _tbl_member_withdraw_request.RequestID='".$_GET['code']."'");                                     
  ?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">View Withdraw Request</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Withdraw Request</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
  
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
        <?php 
            if (isset($_POST['Approve'])) {     
               $BankDetails =$mysqldb->select("select * from _tbl_bank_details where BankID='".$_POST['BankName']."'");   
              
              $mysqldb->execute("update _tbl_member_withdraw_request set `Admin_TxnID`='".$_POST['TransactionID']."',
                                                                         `Admin_FromBank`='".$BankDetails[0]['BankName']."',
                                                                         `Admin_AccountNumber`='".$BankDetails[0]['AccountNumber']."',
                                                                         `Admin_IFSCode`='".$BankDetails[0]['IFSCode']."',
                                                                         `Admin_TxnDate`='".date('Y-m-d H:i:s')."',
                                                                         `Admin_TxnMode`='".$_POST['Mode']."',
                                                                         `IsApproved`='1',                               
                                                                         `IsApprovedOn`='".date('Y-m-d H:i:s')."' where `RequestID`='".$_GET['code']."'");                                     
             
             $id=$mysqldb->insert("_tbl_wallet_transactions",array("MemberID"=>$Requests[0]['MemberID'],
                                                                   "Particulars"=>'WithDraw',                    
                                                                   "Credits"=>"0",                    
                                                                   "Debits"=>$Requests[0]['Amount'], 
                                                                   "AvailableBalance"=>getAvailableBalance($Requests[0]['MemberID'])-$Requests[0]['Amount'],                   
                                                                   "WithDrawRequestID"=>$Requests[0]['RequestID'],                    
                                                                   "TxnDate"=>date("Y-m-d H:i:s")));
             
            
              $successmessage="Approved Successfully";  
             ?>
              <script>location.href='ViewWithDrawRequests.php?code=<?php echo $Requests[0]['RequestID'];?>';</script>
              <?php 
                                         }
            if (isset($_POST['Reject'])) {
             $mysqldb->execute("update _tbl_member_withdraw_request set `IsRejected`='1',                               
                                                                         `IsRejectedOn`='".date('Y-m-d H:i:s')."' where `RequestID`='".$_GET['code']."'");
           ?>                                          
               <script>location.href='ViewWithDrawRequests.php?code=<?php echo $Requests[0]['RequestID'];?>';</script>
        <?php }
        ?>
        <div class="card-body">
        <form method="post">
            <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Withdraw Requests</h4>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Member Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['MemberName'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Amount</strong>
                                                <br>
                                                <p class="text-muted"><?php echo number_format($Requests[0]['Amount'],2);?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Bank Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['BankName'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Account Number</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['AccountNumber'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>IFSCode</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['IFSCode'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Requested On</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['RequestedOn'];?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;For Administrative</h4>
                                        <?php if($Requests[0]['IsApproved']=="1"){?> 
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>From Bank</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['Admin_FromBank'];?></p>
                                           
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Account Number</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['Admin_AccountNumber'];?></p>
                                           
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>IFSCode</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['Admin_IFSCode'];?></p>
                                           
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Txn ID</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['Admin_TxnID'];?></p> 
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Txn Mode</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['Admin_TxnMode'];?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Txn Date</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $Requests[0]['Admin_TxnDate'];?></p>
                                            </div>
                                        </div> 
                                        <?php } else {?>
                                        <div class="row">
                                            <div class="col-md-8 col-xs-6"> <strong>From Bank</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php if($Requests[0]['IsApproved']=="0"){?>
                                                    <select name="BankName" id="BankName" class="form-control">
                                                        <?php $BankDetails =$mysqldb->select("select * from _tbl_bank_details ");
                                                                foreach($BankDetails as $BankDetail){
                                                         ?>
                                                        <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?>&nbsp;-&nbsp;<?php  echo $BankDetail['AccountNumber']; ?>&nbsp;-&nbsp;<?php echo $BankDetail['IFSCode']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_FromBank'];
                                                    }?>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Transaction ID</strong>
                                                <br>
                                                <p class="text-muted">
                                                   <?php if($Requests[0]['IsApproved']=="0"){?> 
                                                    <input type="text" name="TransactionID" id="TransactionID" class="form-control" value="<?php echo (isset($_POST['TransactionID']) ? $_POST['TransactionID'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Transaction Number">
                                                   <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_TxnID'];}?> 
                                                </p>
                                           
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Txn Date</strong>
                                                <br>
                                                <p class="text-muted">
                                                   <?php if($Requests[0]['IsApproved']=="0"){?> 
                                                    <input type="date" name="TxnDate" id="TxnDate" class="form-control" value="<?php echo (isset($_POST['TxnDate']) ? $_POST['TxnDate'] : "");?>" class="form-control">
                                                   <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_TxnDate'];}?>
                                                </p> 
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Txn Mode</strong>
                                                <br>
                                                <p class="text-muted">
                                                 <?php if($Requests[0]['IsApproved']=="0"){?>
                                                   <select name="Mode" id="Mode" class="form-control">
                                                        <option value="NEFT" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>NEFT</option>
                                                        <option value="IMPS" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>IMPS</option>
                                                    </select>
                                                  <?php } if($Requests[0]['IsApproved']=="1"){?>
                                                        <?php echo $Requests[0]['Admin_TxnMode'];}?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <hr>
                                           <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r">
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
                                        </div>
                                        </form>
                                        <div style="text-align:right">
                                            <a href="WithDrawRequests.php">List of Requests</a>
                                        </div>
                        </div>
                    </div>

                    </div>
                </div>            </div>
            


         <?php include_once("footer.php"); ?>



 
