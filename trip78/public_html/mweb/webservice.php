<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
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
    function getDateandCostDetails(){
       global $mysql;
       $DateandCosts = $mysql->select("select * from _tbl_package_date_cost where md5(PackageID)='".$_REQUEST['PackageID']."' and IsActive='Yes'");
       $html = '<div class="modal-header" id="header_text" style="text-align:left;border-bottom:none;background: #ed1c24;font-weight: bold;color: #ffff;line-height:20px">
                    <h4 class="modal-title" style="margin-bottom:-15px">Date And Cost</h4>
                    </div>';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<table class="table table-striped table-bordered table--dark-head">';
                $html .= '<thead>';
                    $html .= '<tr>';
                        $html .= '<th>Departure Date</th>';
                        $html .= '<th>Package Price</th>';
                        $html .= '<th>Offer Price</th>';
                        $html .= '<th>Save Price</th>';                                                       
                    $html .='</tr>';
                $html .='</thead>';
                $html .='<tbody>';
                    foreach($DateandCosts as $DateandCost) {
                    $html .= '<tr>';
                        $html .= '<td>'.date("M,d Y", strtotime($DateandCost['TourDate'])).'</td>';
                        $html .= '<td> Rs .'.number_format($DateandCost['PackagePrice'],2).'</td>';
                        $html .= '<td> Rs .'.number_format($DateandCost['OfferPrice'],2).'</td>';
                        $html .= '<td> Rs .'.number_format($DateandCost['SavePrice'],2).'</td>';
                    $html .= '</tr>';
                    }
                    if(sizeof($DateandCosts)=="0"){
                        $html .= '<tr>';
                            $html .= '<td colspan="4" style="Text-align:center">Date and Cost Not Updated</td>';    
                        $html .= '</tr>';
                    }
                $html .='</tbody>';
            $html .='</table>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="gradient-button" style="border-radius:0px;border: none;background: linear-gradient(to bottom, #111 0%,#333 100%)" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
       $html .='</div>';
       
       return $html; 
       
    }
    function getEnquiryDetails(){
       global $mysql;
       $TourPackages = $mysql->select("select * from _tbl_tours_package where md5(PackageID)='".$_REQUEST['PackageID']."'");
       $DateandCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$TourPackages[0]['PackageID']."' and IsActive='Yes'");
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title">';
            $html.= $TourPackages[0]['PackageName'];
       $html.= '</h4></div>';
       $html .= '<form method="post" action="" id="EnquiryFrom">';
       $html .='<input type="hidden" value="'.$TourPackages[0]['PackageID'].'" name="PackageID" id="PackageID">';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-6">';
                    $html .='</div>';
                    $html .= '<div class="col-sm-6">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="FullName" id="FullName" placeholder="Full Name" aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 5px;">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="CurrentCity" id="CurrentCity" placeholder="Current City" aria-label="CurrentCity" aria-describedby="basic-addon1" style="border-radius: 5px;">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="number" class="form-control" name="NumberofAdults" id="NumberofAdults" placeholder="No of Adult" aria-label="NumberofAdults" aria-describedby="basic-addon1" style="border-radius: 5px;">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="EmailID" id="EmailID" placeholder="Email id" aria-label="EmailID" aria-describedby="basic-addon1" style="border-radius: 5px;">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="MobileNumber" id="MobileNumber" placeholder="Contact Number" aria-label="MobileNumber" aria-describedby="basic-addon1" style="border-radius: 5px;">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<select class="form-control" name="DateandCost" id="DateandCost" aria-label="DateandCost" aria-describedby="basic-addon1">';
                                        foreach($DateandCosts as $DateandCost) {
                                            $html .='<option value="'.$DateandCost['DateandCostID'].'">'.date("M,d Y", strtotime($DateandCost['TourDate'])).' :: Rs  '.$DateandCost['SavePrice'].'</option>';    
                                        }if(sizeof($DateandCosts)=="0"){
                                            $html .='<option>Date and Cost Not Updated</option>';
                                        }
                                $html .='</select>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="Description" id="Description" placeholder="Give us More details to Assist you better" aria-label="Description" aria-describedby="basic-addon1"></textarea>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .='<button type="button" class="btn btn-outline-primary" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-primary" onclick="SaveEnquiryDetails()">Submit Enquiry</button>';
       $html .='</div>';
       $html .='</form>';
       
       return $html;                                                                                
       
    }
    
    
    function SubmitContactDetails() {
    
    global $mysql;
   
      $id = $mysql->insert("_tbl_contactus",array("ContactName"  => $_POST['name'],
                                                  "Email"        => $_POST['email'],
                                                  "MobileNumber"        => $_POST['mobilenumber'],
                                                  "Description"  => $_POST['comments'],
                                                  "AddedOn"      => date("Y-m-d H:i:s")));
       $Q = $mysql->qry;
      if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['message']="Message Send Successfully"; 
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Submission failed.";  
        return json_encode($result); 
    }
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
?> 
 