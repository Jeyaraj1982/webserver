<?php error_reporting(0);
include_once("config.php");
include_once("site_assets/header.php");
?>
<div class="vc_row wpb_row vc_inner vc_row-fluid" style="padding:50px 0px;">
    <div class="wpb_column vc_column_container vc_col-sm-8">
        <div class="vc_column-inner" style="line-height:35px">
            <div class="wpb_wrapper">
                <h3>Donate</h3>
<?php
if (isset($_POST['paynow'])) {
  
    
     $errc = 0;
    
        if (!(strlen($_POST['intention'])>5)) {
            $errc++;
            $err[]="Enter valid Intention";
            $intention = "Please enter valid Intention.";
        }
    
        if (!(strlen($_POST['clientname']))) {
            $errc++;
            $err[]="Enter valid Donor's Name";
            $donorname = "Please enter Donor's Name.";
        }
              
 
    
        if (!($_POST['amount']*1>=90)) {
            $errc++;
            $err[]="Enter valid amount and amount should have greaterthan Rs.100 or as your choice";
            $amount="Enter valid amount and amount should have greaterthan Rs.100  or as your choice";
        } 
    
        if (!(strlen($_POST['addressline1'])>4)) {
            $errc++;
            $err[]="Enter valid Address Line 1";
            $addressline1="Please enter Address Line 1.";
        }

       
    
      
        if (!(strlen($_POST['pincode'])==6 && $_POST['pincode']>111111 && $_POST['pincode']<=999999 )) {
            $errc++;
            $err[]="Enter valid Pincode";
            $pincode="Please enter valid pincode.";
        } 
    
        if (!(strlen($_POST['emailid'])>4)) {
            $errc++;
            $err[]="Enter valid email id";
            $emailid="Please enter valid emailid.";
        } 

        if (!(strlen($_POST['mobilno'])==10 && $_POST['mobilno']>=7000000000 && $_POST['mobilno']<=9999999999)) {
            $errc++;
            $err[]="Enter valid Mobile Number";
            $mobilno ="Please enter valid mobile number.";
        } 
        
       if ($errc==0) {
           
           
$array= array("dateofpreferred"=>date("Y-m-d H:i:s"),
              "bookfor"=>'Donation',
              "intention"=>$_POST['intention'],
              "donor"=>$_POST['clientname'],
              "addressline1"=>$_POST['addressline1'],
              "addressline2"=>$_POST['addressline1'],
              "addressline3"=>"",
              "pincode"=>$_POST['pincode'],
              "emailid"=>$_POST['emailid'],
              "mobilno"=>$_POST['mobilno'],
              "amount"=>$amount,
              "dateofrequest"=>date("Y-m-d H:i:s"),
              "paymentstatus"=>"REQUESTING");
              
              $id = $mysql->insert("_massbooking",$array);
              
           
              
     $amount = $_POST['amount'];  
         $accountid     = "16185";
         $return_url    = "http://devasahayammountshrine.com/epayment.php?key=dsmount&req=mb&rand={DR}";
         $mode          = "LIVE";
         $hash          = "7fa9344ab35256796b6d543d6b67c2da"."|".$accountid."|".$amount."|".$id."|".$return_url."|".$mode; 
         $secure_hash   = md5($hash);  
                  
                  
                    $clientname =   substr(strtoupper(trim($_POST['clientname'])),0,12);
                    $addressline1 =   substr(strtoupper(trim($_POST['addressline1'])),0,10);
            $addressline2 =   substr(strtoupper(trim($_POST['addressline2'])),0,10);
            $addressline3 =   substr(strtoupper(trim($_POST['addressline3'])),0,10);
            
?>
    <form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" target="_self">
                            <input name="account_id" type="hidden" value="<?php echo $accountid; ?>">
                            <input name="return_url" type="hidden" size="60" value="<?php echo $return_url; ?>" />
                            <input name="mode" type="hidden" size="60" value="<?php echo $mode; ?>" />
                            <input name="reference_no" type="hidden" value="<? echo  $id; ?>" />
                            <input name="amount" type="hidden" value="<? echo $amount?>"/>
                            <input name="description" type="hidden" value="Booking Charge" /> 
                            <input name="name" type="hidden" maxlength="255" value="<?php echo $clientname;?>" />
                            <input name="address" type="hidden" maxlength="255" value="<?php echo $addressline1;?>" />
                            <input name="city" type="hidden" maxlength="255" value="<?php echo $addressline2;?>" />
                            <input name="state" type="hidden" maxlength="255" value="<?php echo $addressline3;?>" />
                            <input name="postal_code" type="hidden" maxlength="255" value="<?php echo strtoupper(trim($_POST['pincode']));?>" />
                            <input name="country" type="hidden" maxlength="255" value="IND" />
                            <input name="phone" type="hidden" maxlength="255" value="<?php echo trim($_POST['mobilno']);?>" />
                            <input name="email" type="hidden" size="60" value="<?php echo trim($_POST['emailid']);?>" />
                            <input name="ship_name" type="hidden" maxlength="255" value="<?php echo $clientname;?>" />
                            <input name="ship_address" type="hidden" maxlength="255" value="<?php echo $addressline1;?>" />
                            <input name="ship_city" type="hidden" maxlength="255" value="<?php echo $addressline2;?>" />
                            <input name="ship_state" type="hidden" maxlength="255" value="<?php echo $addressline3;?>" />
                            <input name="ship_postal_code" type="hidden" maxlength="255" value="<?php echo strtoupper(trim($_POST['pincode']));?>" />
                            <input name="ship_country" type="hidden" maxlength="255" value="IND" />
                            <input name="ship_phone" type="hidden" maxlength="255" value="<?php echo trim($_POST['mobilno']);?>" />
                            <input name="secure_hash" type="hidden" size="60" value="<? echo $secure_hash;?>" />
                            <input name="Payment_option" type="hidden" maxlength="255" value="<?php echo trim($_POST['Payment_option']);?>" />
                        </form> 
                        
                        <div style="padding:20px;font-size:12px;font-family:Verdana;text-align:center;color:#6E92B4">
                            Payment request has been processing... <br><Br>
                            <b>Please wait ..</b><br><br><img src='images/animated_loading.gif' align='absmiddle'>
                        </div>
                        <script>setTimeout("document.getElementById('frmTransaction').submit();",3500);</script>
                        
   
                        
                        <style>#fms {display:none}</style>
                        <?php } } ?>
       

                                

 
<form id="fms" name="fms" action="" method="post">
    <table cellpadding="5" cellspacing="0" style="border:none;">
        <tr>
            <td style="border:none;padding:0px">
                <span style="color:#222">Donation Amount</span><br>
                <input type="text" placeholder="Rs. 100 to 1,00,000" name="amount"  maxlength="10" value="<?php echo $_POST['amount'];?>" style="width:200px;border:1px solid #ccc !important;margin:0px;line-height:1;padding:10px 10px;text-align:right"> 
                <?php if (isset($amount)) {echo "<br><span style='color:red'>".$amount."</span>"; } ?>
            </td>
        </tr>  
        <tr>
            <td style="border:none;padding:0px">
                <span style="color:#222">Donor's Name</span><br>
                <input type="text" name="clientname" maxlength="25" value="<?php echo $_POST['clientname'];?>" style="border:1px solid #ccc !important;margin:0px;line-height:1;padding:10px 10px;">
                <?php if (isset($donorname)) {echo "<br><span style='color:red'>".$donorname."</span>"; } ?>
            </td>
        </tr>
                <tr>
            <td style="border:none;padding:0px">
                <span style="color:#222">Email ID</span><br>
                <input type="text" name="emailid"   value="<?php echo $_POST['emailid'];?>" style="border:1px solid #ccc !important;margin:0px;line-height:1;padding:10px 10px;">
                <?php if (isset($emailid)) {echo "<br><span style='color:red'>".$emailid."</span>"; } ?>
            </td>
        </tr>
        <tr>
            <td style="border:none;padding:0px">
                <span style="color:#222">Mobile Number</span> <br>
                <input type="text" name="mobilno"  value="<?php echo $_POST['mobilno'];?>" style="width:200px;border:1px solid #ccc !important;margin:0px;line-height:1;padding:10px 10px;">
                <?php if (isset($mobilno)) {echo "<br><span style='color:red'>".$mobilno."</span>"; } ?>
            </td>
        </tr>  
        <tr>
            <td style="border:none;padding:0px">
                <span style="color:#222">Address</span><br>
                <input type="text" name="addressline1" maxlength="50" value="<?php echo $_POST['addressline1'];?>" style="border:1px solid #ccc !important;margin:0px;line-height:1;padding:10px 10px;">
                <?php if (isset($addressline1)) {echo "<br><span style='color:red'>".$addressline1."</span>"; } ?>
            </td>
        </tr>   
        
        <tr>
            <td style="border:none;padding:0px">
                <span style="color:#222">Pin/Zip Code</span><br>
                <input type="text" name="pincode"   maxlength="6" value="<?php echo $_POST['pincode'];?>" style="width:200px;border:1px solid #ccc !important;margin:0px;line-height:1;padding:10px 10px;">
                <?php if (isset($pincode)) {echo "<br><span style='color:red'>".$pincode."</span>"; } ?>
            </td>
        </tr>

          <tr>
            <td style="border:none;padding:0px">
                <span style="color:#222">Intention</span><br>
                <textarea name="intention" style="height:80px;border:1px solid #ccc;margin:0px"><?php echo $_POST['intention'];?></textarea>
                <?php if (isset($intention)) {echo "<br><span style='color:red'>".$intention."</span>"; } ?>
            </td>
        </tr> 
        <tr>
            <td style="border:none;padding:0px"><br><input type="submit" value="Donate Now" class="myButton" name="paynow"></td>
        </tr>
    </table> 
</form>                 

 
<div style='font-size:13px;'>
                                    <img src="assets/ebslogo.png">
<br>
<span style="color:#333;font-size:11px">You can pay using any one of Credit Cards | Debit Cards | Net Banking Credentials</span>
</div>
 
 


</div>
                                                        </div>
                                                        </div>
                                                        </div>
<?php
include_once("site_assets/footer.php");
?>
