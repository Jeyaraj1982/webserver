<title>GG Cash</title>
<?php 
    include_once("config.php");
    $details = $mysqldb->select("select * from `_bus_booking_requests` where `PNR`='".$_GET['pnr']."'");
    $sms=$details[0]['SMSContent'];
    $sms_response=SMSController::sendsms("http://www.aaranju.in/sms/api.php?username=Z2djYXNoQGdtY&password=WlsLmNvbQ==&number=".$details[0]['PrimaryPassengerMobile']."&sender=GOODGW&message=".urlencode($sms)."&uid=resend_".$details[0]['BookingID']);
    //SMSController::sendsms("http://www.aaranju.in/sms/api.php?username=Z2djYXNoQGdtY&password=WlsLmNvbQ==&number=9944872965&sender=GOODGW&message=".urlencode($sms)."&uid=".$details[0]['BookingID']);
    echo "Sms has been sent";
?>

 