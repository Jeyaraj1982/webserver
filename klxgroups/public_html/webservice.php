<?php
include_once("config.php");
 
if (isset($_POST['SubmitTaxiRequest'])) {
    $mysql->insert("_tbl_booking_taxi",array("FromPlaceName"        => $_POST['FromPlaceName'],
                                             "ToPlaceName"          => $_POST['ToPlaceName'],
                                             "NumberOfPerson"       => $_POST['NumberOfPerson'],
                                             "TaxiType"             => $_POST['TaxiType'],
                                             "CustomerName"         => $_POST['CustomerName'],
                                             "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                             "CustomerDetails"      => $_POST['CustomerDetails'],
                                             "BookedOn"             => date("Y-m-d H:i:s")));
    echo "OK";
    exit;
}
?>