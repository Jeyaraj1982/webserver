<?php
include_once("../config.php");
    echo $_REQUEST['action']();
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
            $html .='<button type="button" class="btn btn-blue-red" style="background:white;color:#d60d45;border:1px solid #d60d45;" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
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
            $html .='<button type="button" class="btn btn-blue-red" style="background:white;color:#d60d45;border:1px solid #d60d45;" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;';
            $html .='<button type="button" class="btn btn-blue-red" style="background:#d60d45;color:white;border:1px solid #d60d45;"  onclick="SaveEnquiryDetails()">Submit Enquiry</button>';
       $html .='</div>';
       $html .='</form>';
       
       return $html;                                                                                
       
    }
    
    function SubmitEnquiryDetails() {
    
    global $mysql;
   
      $id = $mysql->insert("_tbl_tour_enquiry",array("FullName"              => $_POST['FullName'],
                                                     "CurrentCity"           => $_POST['CurrentCity'],
                                                     "NumberofAdults"        => $_POST['NumberofAdults'],
                                                     "EmailID"               => $_POST['EmailID'],
                                                     "MobileNumber"          => $_POST['MobileNumber'],
                                                     "Description"           => $_POST['Description'],
                                                     "PackageID"             => $_POST['PackageID'],
                                                     "PackageDateandCostID"  => $_POST['DateandCost'],
                                                     "CreatedOn"      => date("Y-m-d H:i:s")));
       $Q = $mysql->qry;
      if(sizeof($id>0)){
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
    
?> 
 