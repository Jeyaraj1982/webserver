<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$apiToken = "f16f19b5-16fc-4fe0-bbb3-3adafa0301e8";       
$api_url  = "https://partners.hypto.in"     ;
 $data = array("amount"=>"50",
               "payment_type"=>"IMPS",
               "ifsc"=>"HDFC0001234",
               "number"=>"1234567890",
               "note"=>"Fund Transfer Test",
               "udf1"=>"UDF Test 1",
               "udf2"=>"UDF Test 2",
               "udf3"=>"UDF Test 3",
               "beneficiary_name"=>"beneficiaryname",
               "reference_number"=>"DEMOREFNUM0123");
 

$ch = curl_init( $api_url."/api/transfers/initiate" );
curl_setopt($ch,CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: f16f19b5-16fc-4fe0-bbb3-3adafa0301e8',
                                           'Content-Type: application/json'));
//$payload = json_encode( array( "customer"=> $data ) );
$payload = json_encode( $data );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec($ch);
if(curl_errno($ch)){
    echo 'Request Error:' . curl_error($ch);
}
curl_close($ch);
echo "<pre>".$result."</pre>";
?>   