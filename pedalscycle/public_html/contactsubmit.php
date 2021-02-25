<?php
include_once("config.php");

        $mysql->insert("_tbl_contactus",array("ContactName"     => $_POST['ContactName'],
                                      "Email"      => $_POST['Email'],
                                      "MobileNumber" => $_POST['MobileNumber'],
                                      "Subject"     => $_POST['Subject'],
                                      "Description"     => $_POST['Description'],
                                      "AddedOn"    => date("Y-m-d H:i:s")));
        echo "success";
   //echo  json_encode(array("status"=>"success","message"=>"Successfully Submitted"));

?>  