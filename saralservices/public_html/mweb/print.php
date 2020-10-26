<?php
include_once("admin/config.php");
$summary = $mysql->select("select * from `_tbl_transactions` where md5(concat(`txnid`,'mmm_j2j'))='".$_GET['print']."' ");
 
$opt = $mysql->select("select * from _tbl_operators where OperatorCode='".$summary[0]['operatorcode']."'");
$customer = $mysql->select("select * from _tbl_bills where TxnID='".$summary[0]['txnid']."'");
$memberdetails = $mysql->select("select * from _tbl_member where MemberID='".$summary[0]['memberid']."'");

if (!(file_exists("assets/qrcodes/".md5($summary[0]['txnid'].'mmm_j2j').".png"))) {
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'qrcodes'.DIRECTORY_SEPARATOR;
include dirname(__FILE__)."/phpqrcode/qrlib.php"; 
QRcode::png("https://www.tksdonlineservice.in/bill_verification.php?r=".md5($summary[0]['txnid'].'mmm_j2j'), $PNG_TEMP_DIR. md5($summary[0]['txnid'].'mmm_j2j').".png", "L", 4, 2); 
}
?> 
<style>
table,body,span,div,b,tr,td {font-family:arial;color:#222;font-size:15px;}
</style>
<div style="width:800px;margin:0px auto;padding:20px;border:1px solid #888">
<table style="width:100%">
    <tr>
        <td style="font-size:13px;color:#555">
           <span style="font-size:30px;font-weight: bold"><?php echo $memberdetails[0]['MemberName'];?></span><br>
           <?php if (strlen(trim($memberdetails[0]['Address1']))>0) {?>
           <?php echo $memberdetails[0]['Address1'];?><br>
           <?php } ?>
           <?php if (strlen(trim($memberdetails[0]['Address2']))>0) {?>
           <?php echo $memberdetails[0]['Address2'];?><br>
           <?php } ?>
           <?php if (strlen(trim($memberdetails[0]['MobileNumber']))>0) {?>
           Mobile:&nbsp;<?php echo $memberdetails[0]['MobileNumber'];?><br>
           <?php } ?>
           <?php if (strlen(trim($memberdetails[0]['EmailID']))>0) {?>
           Email:&nbsp;<?php echo $memberdetails[0]['EmailID'];?><br>
           <?php } ?>
           <br> 
        </td>
        <td style="text-align: right;padding-right:0px;vertical-align: top;">
            <img src="assets/qrcodes/<?php echo md5($summary[0]['txnid'].'mmm_j2j').".png";?>" style="width: 72px;">
        </td>
    </tr>
    <tr>
        <td style="vertical-align:top;width:50%">
           <b>Customer Details</b><br><br>
            <?php echo $customer[0]['CustomerName'];?><br>
            <?php if (strlen(trim($customer[0]['CustomerAddress']))>0) {?>
            <?php echo $customer[0]['CustomerAddress'];?><br>
            <?php } ?>
            <?php if (strlen(trim($customer[0]['CustomerMobileNumber']))>0) {?>
            Mobile:&nbsp;<?php echo $customer[0]['CustomerMobileNumber'];?><br>
            <?php } ?>
            <?php if (strlen(trim($customer[0]['CustomerEmail']))>0) {?>
            Email:&nbsp;<?php echo $customer[0]['CustomerEmail'];?><br>
            <?php } ?>
        </td>
        <td style="vertical-align:top;text-align:right">
          <b>Order Details</b><br><br>
          <table style="margin:0px auto" align="right">
            <tr>
                <td style="text-align:right">Order Date</td>
                <td>:&nbsp;<?php echo date("M d, Y",strtotime($summary[0]['txndate']));?></td>
            </tr>
            <tr>
                <td style="text-align:right">Time</td>
                <td>:&nbsp;<?php echo date("H:i:s",strtotime($summary[0]['txndate']));?></td>
            </tr>
            <tr>
                <td  style="text-align:right">Order No</td>
                <td>:&nbsp;<?php echo "TKSD_".$summary[0]['txnid'];?></td>
            </tr>
          </table>
        </td>
    </tr>
</table>
<br> 
<table style="width:100%">
    <tr style="font-weight:bold;font-size:13px;">
        <td style="padding-top:5px;padding-bottom:5px;text-align:left;border-top:1px dashed #333;border-bottom:1px dashed #333">Particulars</td>
        <td style="padding-top:5px;padding-bottom:5px;text-align:right;width:150px;border-top:1px dashed #333;border-bottom:1px dashed #333">Amount</td>
    </tr>
    <tr>
        <td style="vertical-align:top;padding:10px;">
            <table>
                <tr>
                    <td>Operator</td>
                    <td>:&nbsp;<?php echo $opt[0]['OperatorName'];?> (<?php echo $opt[0]['OperatorTypeCode'];?>)</td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>:&nbsp;<?php echo $summary[0]['rcnumber'];?></td>
                </tr>
                <tr>
                    <td>Operator Bill/Ref Number</td>
                    <td>:&nbsp;<?php echo $summary[0]['OperatorNumber'];?></td>
                </tr>
                <tr>
                    <td>Operator Bill/Ref Date</td>
                    <td>:&nbsp;<?php echo $summary[0]['OperatorDate'];?></td>
                </tr>
            </table>
        </td>
        <td  style="vertical-align:top;text-align:right;;padding:10px;"> <?php echo number_format($summary[0]['rcamount'],2);?></td>
    </tr>
    <tr style="font-weight:bold;font-size:13px;">
        <td style="padding-top:5px;padding-bottom:5px;text-align:left;border-top:1px dashed #333;border-bottom:1px dashed #333;text-align:right"> Total </td>
        <td style="padding-right:10px;padding-top:5px;padding-bottom:5px;text-align:left;border-top:1px dashed #333;border-bottom:1px dashed #333;text-align:right"><?php echo number_format($summary[0]['rcamount'],2);?></td>
    </tr>
</table>
<br><br><br>
<span style="font-size:12px;color:#555">Service Provider : TKSD Online Services</span>
</div>
<script> window.print();</script>