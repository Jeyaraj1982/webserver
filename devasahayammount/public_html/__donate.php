
<?php error_reporting(0);
include_once("config.php");
include_once("site_assets/header.php");
?>
  <div class="vc_row wpb_row vc_inner vc_row-fluid" style="padding:50px 0px;">
                                                <div class="wpb_column vc_column_container vc_col-sm-8">
                                                    <div class="vc_column-inner" style="line-height:35px">
                                                        <div class="wpb_wrapper">
                                                        
                                                        
 <div class="jTitle">Donate (நன்கொடை) </div>
<br> 

<?php
if (isset($_POST['paynow'])) {
  
    
     $errc = 0;
    
        if (!(strlen($_POST['intention'])>5)) {
            $errc++;
            $err[]="Enter valid Intention";
            $intention = "Please enter valid Intention. <span style='font-size:10px;'>(தயவு செய்து தெளிவான கருத்துகளை தெரிவிக்கவும் )</span>";
        }
    
        if (!(strlen($_POST['clientname']))) {
            $errc++;
            $err[]="Enter valid Donor Name";
            $donorname = "Please enter Donor's Name. <span style='font-size:10px;'>(தயவு செய்து நன்கொடையாளர் பெயரை  தெரிவிக்கவும்  )</span>";
        }
              
 
    
        if (!($_POST['amount']*1>=90)) {
            $errc++;
            $err[]="Enter valid amount and amount should have greaterthan Rs.90 or as your choice";
            $amount="Enter valid amount and amount should have greaterthan Rs.90  or as your choice. <span style='font-size:10px;'>(நன்கொடை தொகை குறைத்து ரூ 90 அல்லது உங்கள் விருப்பப்படி  இருக்கவேண்டும் )</span>";
        } 
    
        if (!(strlen($_POST['addressline1'])>4)) {
            $errc++;
            $err[]="Enter valid Door No or Street Name";
            $addressline1="Please enter valid door no or street name. <span style='font-size:10px;'>(தயவு செய்து வீட்டு எண், தெரு பெயர்  தெரிவிக்கவும்  )</span>";
        }

        if (!(strlen($_POST['addressline2'])>4)) {
            $errc++;
            $err[]="Enter valid Location Name";
            $addressline2="Please enter valid location name. <span style='font-size:10px;'>(தயவு செய்து ஊர் பெயர்  தெரிவிக்கவும் )</span>";
        } 
    
        if (!(strlen($_POST['addressline3'])>4)) {
            $errc++;
            $err[]="Enter valid District Name";
            $addressline3="Please enter valid district name. <span style='font-size:10px;'>(தயவு செய்து மாவட்டம் பெயர்  தெரிவிக்கவும்  )</span>";
        } 
    
        if (!(strlen($_POST['pincode'])==6 && $_POST['pincode']>111111 && $_POST['pincode']<=999999 )) {
            $errc++;
            $err[]="Enter valid Pincode";
            $pincode="Please enter valid pincode. <span style='font-size:10px;'>(தயவு செய்து சரியான பின்கோடு எண்ணை தெரிவிக்கவும் )</span>";
        } 
    
        if (!(strlen($_POST['emailid'])>4)) {
            $errc++;
            $err[]="Enter valid email id";
            $emailid="Please enter valid emailid. <span style='font-size:10px;'>(தயவு செய்து சரியான மின்னஞ்சல் முகவரியை  தெரிவிக்கவும் )</span>";
        } 

        if (!(strlen($_POST['mobilno'])==10 && $_POST['mobilno']>=7000000000 && $_POST['mobilno']<=9999999999)) {
            $errc++;
            $err[]="Enter valid Mobile Number";
            $mobilno ="Please enter valid mobile number. <span style='font-size:10px;'>(தயவு செய்து சரியான மொபைல் எண்ணை  தெரிவிக்கவும்  )</span>";
        } 
          
        
       if ($errc==0) {
           
           
$array= array("dateofpreferred"=>date("Y-m-d H:i:s"),
              "bookfor"=>'Donation',
              "intention"=>$_POST['intention'],
              "donor"=>$_POST['clientname'],
              "addressline1"=>$_POST['addressline1'],
              "addressline2"=>$_POST['addressline2'],
              "addressline3"=>$_POST['addressline3'],
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
<table cellpadding="5" cellspacing="0" style="margin:10px;margin:10px;font-family:'Droid Sans';font-size:13px;color:#444444;width:100%">
    
    <tr>
        <td style="vertical-align: top" ><span style="color:#222">Intention</span><br><span style="font-size:10px;">
        கருத்து</span></td>
        <td><textarea name="intention" style="width:400px;height:80px;border:1px solid #ccc"><?php echo $_POST['intention'];?></textarea>
              <?php if (isset($intention)) {echo "<br><span style='color:red'>".$intention."</span>"; } ?>
        </td>
    </tr> 
    <tr>
        <td style="width: 200px"><span style="color:#222">Donor</span><br><span style="font-size:10px;">நன்கொடையாளர் 
         பெயர் </span></td>
        <td><input type="text" name="clientname" style="width:400px"  maxlength="25" value="<?php echo $_POST['clientname'];?>">
         <?php if (isset($donorname)) {echo "<br><span style='color:red'>".$donorname."</span>"; } ?>
        </td>
    </tr>    
   
      <tr>
        <td><span style="color:#222">Donation Amount</span><br><span style="font-size:10px;">நன்கொடை</span></td>
        <td><input type="text" name="amount" style="width:80px"  maxlength="10" value="<?php echo $_POST['amount'];?>"> <span style="font-size:11px;">&nbsp;&nbsp;(Min: Rs. 100 Maximum: As your choice)</span>
              <?php if (isset($amount)) {echo "<br><span style='color:red'>".$amount."</span>"; } ?>
        </td>
    </tr> 
    
    <tr>
        <td colspan="2" style="padding:20px;text-align:center;font-weight:bold;color:#000">Donor Information (நன்கொடையாளர்  விபரம் )</td>
    </tr>
   <tr>
        <td><span style="color:#222">Door No, Street Name</span><br><span style="font-size:10px;">
        
        வீட்டு எண், தெரு பெயர் 
        </td>
        <td><input type="text" name="addressline1" style="width:400px"  maxlength="50" value="<?php echo $_POST['addressline1'];?>">
        <?php if (isset($addressline1)) {echo "<br><span style='color:red'>".$addressline1."</span>"; } ?>
        </td>
    </tr>   
    <tr>
        <td><span style="color:#222">Location</span><br><span style="font-size:10px;">
        ஊர் பெயர் 
        </td>
        <td><input type="text" name="addressline2" style="width:400px" maxlength="50" value="<?php echo $_POST['addressline2'];?>">
        <?php if (isset($addressline2)) {echo "<br><span style='color:red'>".$addressline2."</span>"; } ?>
        </td>
    </tr>
    <tr>
        <td><span style="color:#222">District Name</span><br><span style="font-size:10px;"> 
        
        மாவட்டம் </td>
        <td><input type="text" name="addressline3" style="width:400px"  maxlength="50" value="<?php echo $_POST['addressline3'];?>">
        <?php if (isset($addressline3)) {echo "<br><span style='color:red'>".$addressline3."</span>"; } ?>
        </td>
    </tr>     
    <tr>
        <td><span style="color:#222">Pin Code</span><br><span style="font-size:10px;"> 
          பின்கோடு
        </span>
        </td>
        <td><input type="text" name="pincode" style="width:400px"  maxlength="6" value="<?php echo $_POST['pincode'];?>">
        <?php if (isset($pincode)) {echo "<br><span style='color:red'>".$pincode."</span>"; } ?>
        </td>
    </tr>
    <tr>
        <td><span style="color:#222">Email ID</span><br><span style="font-size:10px;"> 
          மின்னஞ்சல் முகவரி
        </span>
        </td>
        <td><input type="text" name="emailid" style="width:400px"  value="<?php echo $_POST['emailid'];?>">
        <?php if (isset($emailid)) {echo "<br><span style='color:red'>".$emailid."</span>"; } ?>
        </td>
    </tr>
    <tr>
        <td><span style="color:#222">Mobile Number</span><br><span style="font-size:10px;">
        மொபைல் எண் 
        </span>
        </td>
        <td><input type="text" name="mobilno" style="width:400px"  maxlength="10" value="<?php echo $_POST['mobilno'];?>">
        <?php if (isset($mobilno)) {echo "<br><span style='color:red'>".$mobilno."</span>"; } ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Donate Now" class="myButton" name="paynow"></td>
    </tr>
</table> 
</form>                 

<br><Br>
<div style='font-family:"Droid Sans";font-size:13px;'>
                                    <img src="assets/ebslogo.png">
<br>
<span style="color:#333;font-size:11px">You can pay using any one of Credit Cards | Debit Cards | Net Banking Credentials</span>
</div>
<br><br>
<table cellpadding="5">
<tbody>
<tr>
<td valign="top">
<div><span style="font-size: small;">பெயர் : <strong>புனித&nbsp;வியாகுல அன்னை ஆலயம்</strong></span></div>
<div><span style="font-size: small;">வங்கி :இந்தியன் ஓவர்சிஸ்&nbsp; வங்கி</span></div>
<div><span style="font-size: small;">கிளை :ஆரல்வாய்மொழி</span></div>
<p><span style="font-size: small;">IFSC : IOBA 0001333</span><br><span style="font-size: small;">Ac/No : 133302000000296</span></p>
<p>&nbsp;</p>
<address><span style="font-size: small;">Name: <strong>Punitha&nbsp;Viyagula Annai Aalayam</strong></span></address> <address><span style="font-size: small;">Bank: IOB</span></address> <address><span style="font-size: small;">Branch: Aralvaimozhi</span></address><address><span style="font-size: small;"><br></span></address> <address><span style="font-size: small;">IFSC : IOBA 0001333</span></address> <address><span style="font-size: small;">Ac/No : 133302000000296</span></address>
<p><span style="font-size: x-small;"><br></span></p>
<p>&nbsp;</p>
</td>
<td valign="top">
<div><span style="font-size: small;">பெயர் :<strong> மறைசாட்சி தேவசகாயம் பிள்ளை திருத்தலம்</strong></span></div>
<div><span style="font-size: small;">வங்கி : தமிழ்நாடு மெர்கெண்டைல் வங்கி </span></div>
<div><span style="font-size: small;">கிளை :ஆரல்வாய்மொழி</span></div>
<p><span style="font-size: small;">IFSC : TMBH 0000316</span><br><span style="font-size: small;">Ac/No : 316100050300848</span></p>
<p>&nbsp;</p>
<address><span style="font-size: small;">Name : <strong>Maraisatchi Devasahayam Pillai Thiruthalam</strong></span></address> <address><span style="font-size: small;">Bank : TMB</span></address> <address><span style="font-size: small;">Branch : Aralvaimozhi</span></address><address><span style="font-size: small;"><br></span></address> <address><span style="font-size: small;">IFSC : TMBH 0000316</span></address> <address><span style="font-size: small;">Ac/No : 316100050300848</span></address></td>
</tr>
</tbody>
</table>


</div>
                                                        </div>
                                                        </div>
                                                        </div>
<?php
include_once("site_assets/footer.php");
?>
