<?php
 
include_once("config.php");
 
$action = $_GET['action'];
echo $action();

function doRegister() {
    global $mysql;
      
    $duplicateMobieNumber = $mysql->select("select * from _tbl_users where MobileNumber='".trim($_POST['MobileNumber'])."'");
    if(sizeof($duplicateMobieNumber)>0) {
        return json_encode(array("status"=>"failure","message"=>"Mobile Number already registered"));    
    }
    
    $duplicateEmail = $mysql->select("select * from _tbl_users where EmailID='".trim($_POST['EmailID'])."'");
    if(sizeof($duplicateEmail)>0) {
        return json_encode(array("status"=>"failure","message"=>"Emailr already registered"));    
    }
    
    $mysql->insert("_tbl_users",array("UserName"     => $_POST['UserName'],
                                      "EmailID"      => $_POST['EmailID'],
                                      "MobileNumber" => $_POST['MobileNumber'],
                                      "PinCode"      => $_POST['PinCode'],
                                      "IsActive"     => "1",
                                      "Password"     => $_POST['Password'],
                                      "CreatedOn"    => date("Y-m-d H:i:s")));
    return json_encode(array("status"=>"success","message"=>"Registration successfull."));
}

function doLogin() {
    global $mysql;
      
    $userInfo = $mysql->select("select * from _tbl_users where EmailID='".trim($_POST['UserName'])."' or MobileNumber='".trim($_POST['UserName'])."'");
    if(sizeof($userInfo)==0) {
        return json_encode(array("status"=>"failure","message"=>"Login failed. Please check your login credentials"));    
    }
    $_SESSION['USER']=$userInfo[0];
    return json_encode(array("status"=>"success","message"=>"Login successfull."));
}

function doSubmitEnquiry() {
      global $mysql;
        $mysql->insert("_tbl_contactus",array("ContactName"     => $_POST['ContactName'],
                                      "Email"      => $_POST['Email'],
                                      "MobileNumber" => $_POST['MobileNumber'],
                                      "Subject"     => $_POST['Subject'],
                                      "Description"     => $_POST['Description'],
                                      "AddedOn"    => date("Y-m-d H:i:s")));
    return json_encode(array("status"=>"success","message"=>"Successfully Submitted"));
}



function getPincodeInfo() {
    global $mysql;
    
    $agent = $mysql->select("select * from _tbl_tour_agents where IsActive='1' and AgentID='19'");
    $result["status"]="success";
    $result['AgentName']=$agent[0]["AgentName"];
    $result['MobileNumber']=$agent[0]["MobileNumber"];
    $result['EmailID']=$agent[0]["EmailID"];
    $result['AddressLine1']=$agent[0]["AddressLine1"];
    $result['AddressLine2']=$agent[0]["AddressLine2"];
    $result['CityName']=$agent[0]["CityName"];
    $result['CityName']=$agent[0]["CityName"];
    $result['DistrictName']=$agent[0]["DistrictName"];
    $result['StateName']=$agent[0]["StateName"];
    $result['CountryName']=$agent[0]["CountryName"];
    
    $data = $mysql->select("select * from _tbl_agent_pincode where Pincode='".$_POST['PinCode']."'");
   
    
    if (sizeof($data)>0) {
       
          $agent = $mysql->select("select * from _tbl_tour_agents where IsActive='1' and AgentID='".$data[0]['AgentID']."'");
          if (sizeof($agent)>0) {
                $result['AgentName']=$agent[0]["AgentName"];
                $result['MobileNumber']=$agent[0]["MobileNumber"];
                $result['EmailID']=$agent[0]["EmailID"];
                $result['AddressLine1']=$agent[0]["AddressLine1"];
                $result['AddressLine2']=$agent[0]["AddressLine2"];
                $result['CityName']=$agent[0]["CityName"];
                $result['CityName']=$agent[0]["CityName"];
                $result['DistrictName']=$agent[0]["DistrictName"];
                $result['StateName']=$agent[0]["StateName"];
                $result['CountryName']=$agent[0]["CountryName"];
          }
    } else {
        
    }
    
      return json_encode($result);
}

function SubmitEnquiryDetails() {
    sleep(10);
    global $mysql;
    $id = $mysql->insert("_tbl_tour_enquiry",array("FullName"             => $_POST['FullName'],
                                                   "CurrentCity"          => $_POST['CurrentCity'],
                                                   "NumberofAdults"       => $_POST['NumberofAdults'],
                                                   "NumberofInfants"      => $_POST['NumberofInfants'],
                                                   "NumberofChildrens"    => $_POST['NumberofChildrens'],
                                                   "Pincode"              => $_POST['Pincode'],
                                                   "EmailID"              => $_POST['EmailID'],
                                                   "MobileNumber"         => $_POST['MobileNumber'],
                                                   "Description"          => $_POST['Description'],
                                                   "PackageID"            => $_POST['PackageID'],
                                                   "PackageDateandCostID" => "0",
                                                   "CreatedOn"            => date("Y-m-d H:i:s")));
    
            
    if(sizeof($id>0)){
        $package = $mysql->select("select * from _tbl_tours_package where PackageID='".$_POST['PackageID']."'");
        
        $mparam['MailTo']="Jeyaraj_123@yahoo.com";
        $mparam['CustomerID']="0";
        $mparam['Message'] = "<table border=1>
                                 <tr><td>FullName</td><td>:".$_POST['FullName']."</td></tr>
                                 <tr><td>CurrentCity</td><td>:".$_POST['CurrentCity']."</td></tr>
                                 <tr><td>NumberofAdults</td><td>:".$_POST['NumberofAdults']."</td></tr>
                                 <tr><td>NumberofChildrens</td><td>:".$_POST['NumberofChildrens']."</td></tr>
                                 <tr><td>Pincode</td><td>:".$_POST['Pincode']."</td></tr>
                                 <tr><td>EmailID</td><td>:".$_POST['EmailID']."</td></tr>
                                 <tr><td>MobileNumber</td><td>:".$_POST['MobileNumber']."</td></tr>
                                 <tr><td>Description</td><td>:".$_POST['Description']."</td></tr>
                                 <tr><td>Package</td><td>:".$package[0]['PackageName']."</td></tr>
                            </table>";
        $mparam['Subject'] = "Enquriy : ".$package[0]['PackageName']; 
        
       // MailController::Send($mparam,$mailError);  
        
        //Admin Side
        $mparam['MailTo']="trip78mail@gmail.com";
        $mparam['Subject'] = "Enquriy To Admin : ".$package[0]['PackageName']; 
        MailController::Send($mparam,$mailError);  
        
        
        //Agent Side
        $data = $mysql->select("select * from _tbl_tour_agents where AgentID in (select AgentID from _tbl_agent_pincode where PinCode='". $_POST['Pincode']."')");
        foreach($data as $agent) {
          //  $agents = $mysql->select("select * from _tbl_tour_agents where AgentID='".$d['AgentID']."'");
           // if (sizeof($agents)>0) {
                $mparam['MailTo']=$agent['EmailID'];
                $mparam['Subject'] = "Enquriy To Agent : ".$package[0]['PackageName']; 
                MailController::Send($mparam,$mailError);  
            //}
        }
        
    
        $result = array();
        $result['status']="Success";
        $result['message']="Thank you <b>".$_POST['FullName']."</b> for your enquiry.<br>Your details have been forwarded to our <span style='color: #58b0ab;'>Travel Consultant</span>.<br> We'll get back to you at the earliest.";  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Submission failed.";  
        return json_encode($result); 
    }
    }
?>  