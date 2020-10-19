 
<?php 
    include_once("header.php");
    $details = $mysqldb->select("select * from `_bus_booking_requests` where `PNR`='".$_GET['pnr']."'");
    
    //$sms=$details[0]['SMSContent'];
    //$sms_response=SMSController::sendsms("http://www.aaranju.in/sms/api.php?username=Z2djYXNoQGdtY&password=WlsLmNvbQ==&number=".$details[0]['PrimaryPassengerMobile']."&sender=GOODGW&message=".urlencode($sms)."&uid=resend_".$details[0]['BookingID']);
    //SMSController::sendsms("http://www.aaranju.in/sms/api.php?username=Z2djYXNoQGdtY&password=WlsLmNvbQ==&number=9944872965&sender=GOODGW&message=".urlencode($sms)."&uid=".$details[0]['BookingID']);
    //echo "Sms has been sent";
?>
<br><br><br>
<div style="text-align:center"><h3>Cancel Ticket</h3></div>
<div style="width:820px;margin:0px auto;border:1px solid #ccc;padding:10px;font-family:arial;background:#fff">
<table>
    <tr>
        <td><img src="http://ggcash.in/images/logo.png"></td>
    </tr>
</table>
<table  style="width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666">
    <tr>
        <td >
            <table  style="width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666">
                <tr>
                    <td style="font-size:20px;"><?php echo $details[0]['SourceName'];?>&nbsp;&nbsp;→&nbsp;&nbsp;<?php echo $details[0]['ToName'];?></td>
                </tr>
                <tr>
                    <td><?php echo $details[0]['BusOperatorName']." (".$details[0]['BusServiceId'].")";?></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td style="font-weight:Bold;"><?php echo date("l, F d, Y",strtotime($details[0]['DateOfJourny']));?></td>
                </tr>
            </table>         
        </td>
        <td style="width:300px;vertical-align:top">
            <table  style="border:2px solid #aaa; width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666">
                <tr>
                    <td>PNR #</td>
                    <td>:&nbsp;<?php echo $details[0]['PNR'];?></td>
                </tr>
                <tr>
                    <td>Ticket #</td>
                    <td>:&nbsp;<?php echo $details[0]['TicketID'];?></td>
                </tr>
                <tr>
                    <td>Seat(s)</td>
                    <td>:&nbsp;<?php echo $details[0]['NumberOfSeats'];?></td>
                </tr>
            </table>
            <br> 
        </td>
    </tr>
</table>
<table style="background:#f9f9f9;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:100%;font-family:arial;font-size:13px;line-height:18px;color:#666" cellpadding="10" cellspacing="0">
    <tr>
        <td><b style="color:#222"><u>Seat Name</u></b</td>
    </tr>
    <?php foreach(explode(",",$details[0]['Seats']) as $s) { ?>
    <tr>
        <td><input type="checkbox">&nbsp;<?php echo $s;?></td>
    </tr>
    <?php } ?>
</table>         
you do manual request to cancel ticket. 
</div>
<?php
    $resdata =file_get_contents("http://aaranju.in/busticket/api.php?action=_getCancellationData");
    $resdata = json_decode($resdata,true);
    print_r($resdata);
    
?>

 