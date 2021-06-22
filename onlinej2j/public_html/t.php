

<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();
 
$post = [
    'serviceProvider' => '1145',
    'additionalInfo1' => '10000000081832797',
    'serviceRegion'   => '-1',
    'additionalInfo2'   => '',
    'additionalInfo3'   => '',
];
curl_setopt($ch, CURLOPT_URL,"https://www.freecharge.in/rest/bill/fetchBill");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

echo $server_output;

 
?>

