<?
    $amount = 0;
    
    foreach($_SESSION['cartItem'] as $citem) {
        $amount += $citem['ourprice']; 
    }  
    
    $array     = array("userid"=>$_SESSION['USER']['userid'],"invoicedate"=>date("Y-m-d H:i:s"),"paymentdetails"=>" ","invoiceamount"=>$amount,"others"=>" ","transactionid"=>"0","paymentstatus"=>"0");
    $invoiceID = $mysql->insert("_tbl_invoice",$array);
     
    foreach($_SESSION['cartItem'] as $citem) {
        $inItm = array("invoiceid"=>$invoiceID,"userid"=>$_SESSION['USER']['userid'],"itemid"=>$citem['itemid'],"qty"=>'1',"price"=>$citem['ourprice']);    
        $mysql->insert("_tbl_invoice_items",$inItm);                               
    }  
          
     $accountid    = "14029";
     $return_url   = "http://www.dealmaass.com/payinfo.php?DR={DR}";
     $mode         = "LIVE";
     $hash         = "7a0d1671861f02e83bf27da3d2c87eef"."|".$accountid."|".$amount."|".$invoiceID."|".$return_url."|".$mode; 
     $secure_hash  = md5($hash);          

?>
<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" target="_self">
    <input name="account_id" type="hidden" value="<?php echo $accountid; ?>">
    <input name="return_url" type="hidden" size="60" value="<?php echo $return_url; ?>" />
    <input name="mode" type="hidden" size="60" value="<?php echo $mode; ?>" />
    <input name="reference_no" type="hidden" value="<? echo  $invoiceID; ?>" />
    <input name="amount" type="hidden" value="<? echo $amount?>"/>
    <input name="description" type="hidden" value="<?php echo $_SESSION['USER']['personname'];?>" /> 
    <input name="name" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['personname'];?>" />
    <input name="address" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['address1'];?>" />
    <input name="city" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['address2'];?>" />
    <input name="state" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['address2'];?>" />
    <input name="postal_code" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['pincode'];?>" />
    <input name="country" type="hidden" maxlength="255" value="IND" />
    <input name="phone" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['mobileno'];?>" />
    <input name="email" type="hidden" size="60" value="<?php echo $_SESSION['USER']['emailid'];?>" />
    <input name="ship_name" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['personname'];?>" />
    <input name="ship_address" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['address1'];?>" />
    <input name="ship_city" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['address2'];?>" />
    <input name="ship_state" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['address2'];?>" />
    <input name="ship_postal_code" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['pincode'];?>" />
    <input name="ship_country" type="hidden" maxlength="255" value="IND" />
    <input name="ship_phone" type="hidden" maxlength="255" value="<?php echo $_SESSION['USER']['mobileno'];?>" />
    <input name="secure_hash" type="hidden" size="60" value="<? echo $secure_hash;?>" />
</form> 
<div style="text-align:center;padding:20px;">Please wait ...</div> 
<script>setTimeout("$('#frmTransaction').submit();",1500);</script>