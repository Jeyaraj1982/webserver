<script>getMenuItems('mypage');</script>   
<?php
    if (isset($_POST['btnSubmitW'])) {
        $mysql->insert("_walletupdaterequests",array("userid"=>$_SESSION['USER']['userid'],
                                                     "requestedon"=>date("Y-m-d  H:i:s"),
                                                     "currency"=>$_POST['currency'],
                                                     "amount"=>$_POST['amount'],
                                                     "details"=>$_POST['details']));
        echo "Request Successfully Sent.";
    }
?>
 
<form target="_self" action="" method="post">
    <div style="border:5px solid #F9D49D;background:#FFF8EF;">
    <div style="background:#F9D49D;color:#444;font-size:13px;font-weight:bold;font-family:arial;padding:8px;text-transform: capitalize">Wallet Update Request</div>

<table cellpadding="3" cellspacing="0" style="font-size:12px;font-family:arial;margin:15px">
    <tr>
        <td>Amount</td>
        <td>
        <select name="currency" style="border:1px solid #999;padding:3px;width:175px;">
            <?php if ($_SESSION['USER']['country']=="India") { ?>
                <option value="INR">Inidan Rupees [INR] </option>
                <option value="MYR" disabled="disabled">Malaysian Ringgit [MYR] </option>
            <?php } elseif ($_SESSION['USER']['country']=="Malaysia") { ?>
                <option value="MYR">Malaysian Ringgit [MYR] </option>
                <option value="INR" disabled="disabled">Inidan Rupees [INR] </option>
            <?php } ?>
            </select>
            
        <input type="text" name="amount" style="border:1px solid #999;padding:3px;width:420px;" Placeholder="Type Only Digits"></td>
    </tr>
    <tr>
        <td style="vertical-align:top;">Transaction Details</td>
        <td><textarea cols="" rows="" name="details" style="border:1px solid #999;padding:4px;width:596px;height:200px"></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align: right;"><input type="submit" name="btnSubmitW" value="Send Request"></td>
    </tr>
</table> 
</div>
</form>
