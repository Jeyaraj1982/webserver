<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Wallet Refill Requests</span>
    </div>
    <Br>
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
        <table cellspacing="0" cellpadding="6" style="width:100%">
            <tr>
                <td style="width:150px;padding-bottom:0px;padding-top:0px">Wallet Refill Amount</td>
                <td style="padding-bottom:0px;padding-top:0px;padding-left:3px"><input type="text" name="RefillAmount" value="<?php echo isset($_POST['RefillAmount']) ? $_POST['RefillAmount'] : '';?>" placeholder="Refill Amount"> </td>
            </tr>
            <tr>
                <td style="padding-bottom:0px;padding-top:0px">Transfered To</td>
                <td style="padding-bottom:8px;padding-top:8px;padding-left:3px">
                    <select name="TransferTo">
                        <option value="State Bank Of India">State Bank Of India</option>
                    </select>    
                </td>
            </tr>
            <tr>
                <td style="padding-bottom:0px;padding-top:0px">Transaction Mode</td>
                <td style="padding-bottom:8px;padding-top:0px;padding-left:3px">
                    <select name="TransactionMode" style="width:250px">
                        <option value="Cash Deposit">Cash Deposit</option>
                        <option value="Bank To Bank Transfer">Bank To Bank Transfer (NEFT/FT/IMPS)</option>
                        <option value="Cheque/DD Deposit">Cheque/DD Deposit</option>
                    </select>    
                </td>
            </tr>
            <tr>
                <td style="padding-bottom:0px;padding-top:0px">Transaction ID</td>
                <td style="padding-bottom:8px;padding-top:0px;padding-left:3px"><input type="text" name="TransactionID" value="<?php echo isset($_POST['TransactionID']) ? $_POST['TransactionID'] : '';?>"   placeholder="Transaction ID"> </td>
            </tr>
            <tr>
                <td style="padding-bottom:0px;padding-top:0px">Transfer On</td>
                <td style="padding-bottom:8px;padding-top:0px;padding-left:3px"><input id="datepicker1" type="text" name="TransferedOn" value="<?php echo isset($_POST['TransferedOn']) ? $_POST['TransferedOn'] : '';?>" placeholder="Transfered On"> </td>
            </tr>
            <tr>
                <td style="padding-bottom:0px;padding-top:0px">Remarks</td>
                <td style="padding-bottom:8px;padding-top:0px;padding-left:3px"><input type="text" name="Remarks" value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : '';?>"   placeholder="Remarks"></td>
            </tr>
            <tr>
                <td style="padding-bottom:0px;padding-top:0px">Attachments<br><span style="color:#999">(Cash/Cheque/DD Deposit)</span></td>
                <td style="padding-bottom:8px;padding-top:0px;padding-left:3px"><input type="file" name="fileToUpload"> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="SubmitBtn" name="BtnSendRequest" value="Send Request"></td>
            </tr>
        </table>
    </form>
</div> 
<br>
<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Recent Requests.</span>
    </div>
    <br>
<table class= "listTable" style="width:100%" cellspacing="0">
<tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:90px">Req. Date</th>
    <th style="text-align: left;width:100px;">Refill Amount</th>
    <th style="text-align: left;width:150px">Transfer To</th>
    <th style="text-align: left;width:100px">Transaction ID</th>
    <th style="text-align: left;">TransactionMode</th>
       <th style="text-align: center;padding:5px;width:90px">Transfered On</th>
       <th style="text-align: center;padding:5px;width:50px">Status</th>
       <th style="text-align: center;padding:5px;width:90px">Date</th>
</tr>
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
</table>
</div>
<br><br>
<script>

    $( function() {
        $("#datepicker1").datepicker({
            dateFormat: "yy-mm-dd" 
        });
    });
</script>