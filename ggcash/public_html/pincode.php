<?php
	//
    //$data = file_get_contents("http://www.postalpincode.in/api/pincode/".$_GET['pincode']);
   // $data = file_get_contents();
    //$data = json_decode($data,true);
    
    
     $ch = curl_init();
  $skipper = "luxury assault recreational vehicle";
  $fields = array( 'penguins'=>$skipper, 'bestpony'=>'rainbowdash');
  $postvars = '';
  foreach($fields as $key=>$value) {
    $postvars .= $key . "=" . $value . "&";
  }
  $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$_GET['pincode'];
  $url = "http://www.postalpincode.in/api/pincode/".$_GET['pincode'];
  curl_setopt($ch,CURLOPT_URL,$url);
  //curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
  //curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  //print "curl response is:" . $response;
  curl_close ($ch);
    $data = json_decode($response,true);
    
    if (sizeof($data['PostOffice'])>0) {
    //print_r($data['PostOffice'][0]);    
    $result = array(
            "District"=>$data['PostOffice'][0]['District'],
            "State"=>$data['PostOffice'][0]['State'],
            "Country"=>$data['PostOffice'][0]['Country'],
    
    );
    } else {
        $result = array();
    }
    echo implode($result,",")
     
?>