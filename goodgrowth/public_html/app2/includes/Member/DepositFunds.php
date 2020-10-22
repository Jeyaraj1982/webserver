<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="content">
    <div class="hpanel">
        <div class="hpanel">
                    <div class="panel-heading hbuilt">
                       Wallet Refill Requests
                    </div>
                    <div class="panel-body list">
                    <?php
                        function validateCurrentForm(&$ErrorString) {
                            
                            global $userData;
                            
                            if (trim($_POST['RefillAmount'])<10000) {
                                $ErrorString = ErrorMsg("Minimum Rs. 10000");  
                                return false;
                            }
                            
                            if ($_POST['TransactionMode']=="Bank To Bank Transfer") {
                                if (strlen(trim($_POST['TransactionID']))<6) {
                                    $ErrorString = ErrorMsg("Please enter valid Transaction ID");  
                                    return false;
                                }
                            }  
                            
                            if (strlen(trim($_POST['TransferedOn']))<3) {
                                $ErrorString =  ErrorMsg("Please select valid transfered date"); 
                                return false; 
                            }
                            return true;
                        }
                        
                        if (isset($_POST['BtnSendRequest'])) {
                            
                            $res = validateCurrentForm($ErrorString);
                            
                            if ($res) {
                                
                                $target_dir  = "assets/refill/";
                                $filename    = time()."_". basename($_FILES["fileToUpload"]["name"]);
                                $target_file = $target_dir .$filename;
                                 
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            
                                } else {
                                    $filename="";
                                }
                           
                                $mysql->insert("_tbl_Wallet_Requests",array("MemberID"        => $userData['MemberID'],
                                                                            "RequestedOn"     => date("Y-m-d H:i:s"),
                                                                            "Amount"          => $_POST['RefillAmount'],
                                                                            "TransferTo"      => $_POST['TransferTo'],
                                                                            "TransactionID"   => $_POST['TransactionID'],
                                                                            "TransactionMode" => $_POST['TransactionMode'],
                                                                            "TransferedOn"    => $_POST['TransferedOn'],
                                                                            "IsApproved"      => "0",
                                                                            "ApprovedOn"      => "0000-00-00 00:00:00",
                                                                            "IsRejected"      => "0",
                                                                            "RejectedOn"      => "0000-00-00 00:00:00",
                                                                            "ACTransactionID" => "0",
                                                                            "Attachment"      => $filename));
                                echo SuccessMsg("Your refill request has been submitted");
                            } else {
                                echo $ErrorString;
                            }       
                        }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Wallet Refill Amount</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="RefillAmount" value="<?php echo isset($_POST['RefillAmount']) ? $_POST['RefillAmount'] : '';?>" placeholder="Refill Amount"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Transfered To</label>
                            <div class="col-sm-4">
                                <select name="TransferTo" class="form-control">
                                    <option value="State Bank Of India">State Bank Of India</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Transaction Mode</label>
                            <div class="col-sm-4">
                                <select name="TransactionMode" class="form-control" style="width:250px">
                                    <option value="Cash Deposit">Cash Deposit</option>
                                    <option value="Bank To Bank Transfer">Bank To Bank Transfer (NEFT/FT/IMPS)</option>
                                    <option value="Cheque/DD Deposit">Cheque/DD Deposit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Transaction ID</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="TransactionID" value="<?php echo isset($_POST['TransactionID']) ? $_POST['TransactionID'] : '';?>"   placeholder="Transaction ID"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Transfer On</label>
                            <div class="col-sm-4"><input id="datepicker1" type="text" class="form-control" name="TransferedOn" value="<?php echo isset($_POST['TransferedOn']) ? $_POST['TransferedOn'] : '';?>" placeholder="Transfered On"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Remarks</label>
                            <div class="col-sm-4"><input type="text" class="form-control" name="Remarks" value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : '';?>"   placeholder="Remarks"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Attachments<br><span style="color:#999">(Cash/Cheque/DD Deposit)</span></label>
                            <div class="col-sm-4"><input type="file" name="fileToUpload"></div>
                        </div> 
                        <input type="submit" class="btn btn-outline btn-success" name="BtnSendRequest" value="Send Request">
                    </form>
                    </div>
                </div>
    </div>
    <div class="hpanel">
        <div class="panel-heading hbuilt">
          Recent Requests
        </div>
        <div class="panel-body list">
            <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th style="text-align: center;padding:5px;width:90px">Req. Date</th>
                    <th style="text-align: left;width:100px;">Refill Amount</th>
                    <th style="text-align: left;width:150px">Transfer To</th>
                    <th style="text-align: left;width:100px">Transaction ID</th>
                    <th style="text-align: left;">TransactionMode</th>
                    <th style="text-align: center;padding:5px;width:90px">Transfered On</th>
                    <th style="text-align: center;padding:5px;width:50px">Status</th>
                    <th style="text-align: center;padding:5px;width:90px">Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
        $data = $mysql->select("select * from _tbl_Wallet_Requests where MemberID ='".$userData['MemberID']."' order by WalletRefillRequestID desc limit 0,10");
        foreach($data as $d) {
            ?>
            <tr>
                <td><?php echo putDate($d['RequestedOn']);?></td>
                <td style="text-align:right"><?php echo number_format($d['Amount'],2);?>&nbsp;</td>
                <td><?php echo $d['TransferTo'];?></td>
                <td><?php echo $d['TransactionID'];?></td>
                <td><?php echo $d['TransactionMode'];?></td>
                <td><?php echo putDate($d['TransferedOn']);?></td>
                <td>
                    <?php 
                        if ($d['IsApproved']==0 && $d['IsRejected']==0) {
                            echo "Pending";
                        }
                        if ($d['IsApproved']==1 && $d['IsRejected']==0) {
                            echo "Approved";
                        }
                        if ($d['IsApproved']==0 && $d['IsRejected']==1) {
                            echo "Rejected";
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if ($d['IsApproved']==0 && $d['IsRejected']==0) {
                             
                        }
                        if ($d['IsApproved']==1 && $d['IsRejected']==0) {
                            echo putDate($d['ApprovedOn']);
                        }
                        if ($d['IsApproved']==0 && $d['IsRejected']==1) {
                            echo putDate($d['RejectedOn']);
                        }
                    ?>
                </td>
            </tr>
            <?php
        }
        if (sizeof($data)==0) {
            ?>
                <tr>
                    <td style="text-align:center">No records found.</td>
                </tr>
            <?php
        }
    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
       
    <script>
   $(document).ready(function() {
   
    $( "#datepicker1" ).datepicker({
    dateFormat: "yy-mm-dd",
    });
});
 
  //yearRange: "<?php echo $Config['DOB_YEAR_START'].":".$Config['DOB_YEAR_END'];?>"
  //$( ".selector" ).datepicker( "setDate", "<?php echo $Config['DOB_YEAR_END']."-12-31";?>");
  </script>