<?php
        if (isset($_POST['submitRequest'])) {
            $duplicate = $mysql->select("select * from _tbl_member_bankaccounts where AccountNumber='".trim($_POST['AccountNumber'])."'");
            if (sizeof($duplicate)==0) {
                
                $url = "https://www.aaranju.in/moneytransfer/api.php?apiusername=d2VsY29tZUA&apipassword=jM0NTY3ODk&AddIncommingBankAccount=1&accountnumber=".ltrim(trim($_POST['AccountNumber']),'0')."&accountname=".urlencode(trim($_POST['AccountName']))."&ifscode=".trim($_POST['IFSCode']);
                $mysql->insert("_tbl_member_bankaccounts",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                "AccountName"=>trim($_POST['AccountName']),
                                                                "AccountNumber"=>ltrim(trim($_POST['AccountNumber']),'0'),
                                                                "IFSCode"=>trim($_POST['IFSCode']),
                                                                "url"=>$url,
                                                                "AddedOn"=>date("Y-m-d H:i:s")));
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                
                $Message = "Dear Admin, Bank Account Added from ".$_SESSION['User']['MemberName']." for wallet autoupdate. AccountName=".trim($_POST['AccountName']).", AccountNumber=".ltrim(trim($_POST['AccountNumber']),'0').", IFSCode=".trim($_POST['IFSCode']);
                TelegramMessageController::sendSMS(316574188,$Message,0,0);
                ?>
                <script>location.href='dashboard.php?action=settings_wallet';</script>
                <?php
                    exit;
                
            } else {
                $errorMessage = "This Account number already in use";
            }
        }
    ?>
 
    <div style="padding:0px;text-align:center;margin-bottom:20px;">
        <h5>Add Your Bank Details</h5>
    </div>
    <div class="row">
        <div style="background:#fffce8;border:1px dashed #efd92f;padding:10px;margin:0px auto;margin-bottom:25px;width:90%;">
            Please update your bank details and its purpose of update your wallet automatically, when you transfer money to our account from given bank account(s).
        </div>
        <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return checkInputs();">
            <div class="form-group">
                <label class="text-bold-600" for="exampleInputEmail1">Account Name</label>
                <input type="text"  value="<?php echo isset($_POST['AccountName']) ? $_POST['AccountName'] : "";?>"   name="AccountName" id="AccountName" class="form-control" placeholder="Enter Account Name" required="">
            </div>
            <div class="form-group">  
                <label class="text-bold-600" for="exampleInputEmail1">Account Number</label>
                <input type="text"  value="<?php echo isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : "";?>"  name="AccountNumber" id="AccountNumber" class="form-control" placeholder="Enter Account Number" required="">
            </div>
            <div class="form-group">
                <label class="text-bold-600" for="exampleInputEmail1">IFS Code</label>
                <input type="text"  value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "";?>"  name="IFSCode" id="IFSCode" class="form-control" placeholder="Enter IFS Code" required="">
            </div>
            <div class="form-group">
                <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $errorMessage;?></p>
            </div>
            <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Add Bank Account<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
            <a href="dashboard.php?action=settings" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
        </form>         
    </div>
 
      


     
<script>
function checkInputs() {
    
    var Password = $('#Password').val();
    if (!(Password.length>=3)) {
        $('#error_msg').html("Invalid Current Password");
        return false;
    }
    
    var NPassword = $('#NPassword').val();
    if (!(NPassword.length>=6)) {
        $('#error_msg').html("New Password requires minimum 6 characters");
        return false;
    }
    
    var CPassword = $('#CPassword').val();
    if (!(CPassword.length>=6)) {
        $('#error_msg').html("Invalid Confirm New Password");
        return false;
    }
    
    if (NPassword!=CPassword) {
        $('#error_msg').html("New & Confirm Password must have same");
        return false;
    }
    return true;    
}
</script>