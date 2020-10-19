<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
    function DeleteTourType() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_tour where TourTypeID='".$_POST['TourTypeID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Tour Type Deleted.";  
        return json_encode($result);
    }
    function DeleteSubTourType() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_sub_tour where SubTourTypeID='".$_POST['SubTourTypeID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['id']=md5($_POST['SubTourTypeID']);
        $result['message']="Sub Tour Type Deleted.";  
        return json_encode($result);
    }
    
    function getSubTourTypes() {
            
            global $mysql;
            $subtourstypes = $mysql->select("select * from _tbl_sub_tour where TourTypeID='".$_REQUEST['TourTypeID']."'");
            $stateID   = 0;
            $html = '<select class="form-control" name="SubTourType" id="SubTourType" style="width:100%">';
            $html.='<option value="0" selected="selected">Select Sub Tour Type</option>';
            
            if (sizeof($subtourstypes)>0) {
                foreach($subtourstypes as $r) {
                  
                    if(isset($_REQUEST['SubTourTypeID'])){
                       $html .= '<option value="'.$r['SubTourTypeID'].'" '.(($_REQUEST['SubTourTypeID']== $r['SubTourTypeID']) ? "selected='selected'" : "").'>'.$r['SubTourTypeName'].'</option>';
                    }else {
                    $html .= '<option value="'.$r['SubTourTypeID'].'">'.$r['SubTourTypeName'].'</option>';
                    }
                }
            } else {
                $html .= '<option value="0" selected="selected">Select Sub Tour Type</option>'; 
            }
            $html .= '</select>';
            
            return $html;
            
        }
        
    function getDateandCostDetails(){
       global $mysql;
       $TourPackages = $mysql->select("select * from _tbl_tours_package where PackageID='".$_REQUEST['PackageID']."'");
       $html = '<h4>Date and Costs</h4>';
       return $html;
       
    }
    
    function DeletePackage() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_tours_package where PackageID='".$_POST['PackageID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Package Deleted.";  
        return json_encode($result);
    }
    
    function ViewEnquiryDetails(){
       global $mysql;
       $Enquiry = $mysql->select("select * from _tbl_tour_enquiry where md5(EnquiryID)='".$_REQUEST['EnquiryID']."'");
       $TourPackages = $mysql->select("select * from _tbl_tours_package where PackageID='".$Enquiry[0]['PackageID']."'");
       $DateCosts = $mysql->select("select * from _tbl_package_date_cost where DateandCostID='".$Enquiry[0]['PackageDateandCostID']."'");  
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title">';
            $html.= $TourPackages[0]['PackageName'];
       $html.= '</h4></div>';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Requested</div>';
                            $html .= '<div class="col-sm-7">'.date("M,d Y", strtotime($Enquiry[0]['CreatedOn'])).'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Full name</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['FullName'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Current City</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['CurrentCity'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Number of adults</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['NumberofAdults'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">EmailID</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['EmailID'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Mobile Number</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['MobileNumber'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Description</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['Description'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Package Date</div>';
                            $html .= '<div class="col-sm-7">'.date("M,d Y", strtotime($DateCosts[0]['TourDate'])).'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Package Cost</div>';
                            $html .= '<div class="col-sm-7">'.number_format($DateCosts[0]['SavePrice'],2).'</div>';                  
                        $html .= '</div>';                                                                                                                  
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';                                                                                              
       $html .='<div class="modal-footer">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" data-dismiss="modal">Cancel</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
       
       return $html;                                                                                
       
    }
    function ViewEnquiryByDate(){
       global $mysql;
       $Enquiries = $mysql->select("select * from _tbl_tour_enquiry where md5(PackageDateandCostID)='".$_REQUEST['DateandCostID']."'");
       foreach($Enquiries as $Enquiry) {
           $html ='<tr>'; 
                $html .= '<td>'.date("M,d Y", strtotime($Enquiry['CreatedOn'])).'</td>';
                $html .= '<td>'.$Enquiry['FullName'].'</td>';
            $html .= '</tr>';
       }
      
       return $html;                                                                                
       
    }
    
    function AddDateandCostDetails(){
       global $mysql;
       $TourPackages = $mysql->select("select * from _tbl_tours_package where md5(PackageID)='".$_REQUEST['PackageID']."'");
       
       $html = '<div class="modal-header" id="header_text">';
            $html.= $TourPackages[0]['PackageName'];
       $html.= '</div>';
       $html .= '<form method="post" action="" id="DateandCostFrom">';
       $html .='<input type="hidden" value="'.$TourPackages[0]['PackageID'].'" name="PackageID" id="PackageID">';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="date" class="form-control" name="TourDate" id="TourDate" aria-label="TourDate" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="PackagePrice" id="PackagePrice" placeholder="Package Price" aria-label="PackagePrice" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="OfferPrice" id="OfferPrice" placeholder="Offer Price" aria-label="OfferPrice" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<select class="form-control" name="IsActive" id="IsActive"><option value="Yes">Yes</option><option value="No">No</option></select>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" onclick="SaveDateandCostDetails()">Submit</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
        $html .='</form>';
       
       return $html;                                                                                
       
    }
    
    function SubmitDateandCostDetails() {
    
    global $mysql;
   
      $id = $mysql->insert("_tbl_package_date_cost",array("TourDate"     => $_POST['TourDate'],
                                                          "PackagePrice" => $_POST['PackagePrice'],
                                                          "OfferPrice"   => $_POST['OfferPrice'],
                                                          "SavePrice"    => $_POST['PackagePrice']-$_POST['OfferPrice'],
                                                          "PackageID"    => $_POST['PackageID'],
                                                          "IsActive"     => $_POST['IsActive'],
                                                          "AddedOn"      => date("Y-m-d H:i:s")));
       $Q = $mysql->qry;
      if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['message']="Date and Cost Added";  
        $result['packageid']=md5($_POST['PackageID']);  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Submission failed.";  
        return json_encode($result); 
    }
    }    
    
    function EditDateandCostDetails(){
       global $mysql;
       $DateandCost = $mysql->select("select * from _tbl_package_date_cost where md5(DateandCostID)='".$_REQUEST['DateandCostID']."'");
       
       $TourPackages = $mysql->select("select * from _tbl_tours_package where PackageID='".$DateandCost[0]['PackageID']."'");
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title" style="margin-bottom:-15px">';
            $html.= $TourPackages[0]['PackageName'];
       $html.= '</h4></div>';
       $html .= '<form method="post" action="" id="EditDateandCostFrom">';
       $html .='<input type="hidden" value="'.$TourPackages[0]['PackageID'].'" name="PackageID" id="PackageID">';
       $html .='<input type="hidden" value="'.$DateandCost[0]['DateandCostID'].'" name="DateandCostID" id="DateandCostID">';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="date" class="form-control" name="TourDate" id="TourDate" value="'.$DateandCost[0]['TourDate'].'" aria-label="TourDate" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="PackagePrice" id="PackagePrice" value="'.$DateandCost[0]['PackagePrice'].'" placeholder="Package Price" aria-label="PackagePrice" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="OfferPrice" id="OfferPrice" value="'.$DateandCost[0]['OfferPrice'].'" placeholder="Offer Price"  aria-label="OfferPrice" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<select class="form-control" name="IsActive" id="IsActive">
                                            <option value="No" '.((isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="No") ? " selected=selected " : "") : (($DateandCost[0]['IsActive']=="No") ? " selected=selected " : "")).'>No</option>
                                            <option value="Yes" '.((isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="Yes") ? " selected=selected " : "") : (($DateandCost[0]['IsActive']=="Yes") ? " selected=selected " : "")).'>Yes</option>
                                         </select>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" onclick="UpdateDateandCostDetails()">Submit</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
        $html .='</form>';
       
       return $html;                                                                                
       
    }
    
    function SubmitUpdateDateandCostDetails(){
        global $mysql;
        $SavePrice = $_POST['PackagePrice']-$_POST['OfferPrice'];
        $id=  $mysql->execute("update _tbl_package_date_cost set `TourDate`     ='".$_POST['TourDate']."',
                                                                 `PackagePrice` ='".$_POST['PackagePrice']."',
                                                                 `OfferPrice`   ='".$_POST['OfferPrice']."',
                                                                 `SavePrice`    ='".$SavePrice."',
                                                                 `PackageID`    ='".$_POST['PackageID']."',
                                                                 `IsActive`     ='".$_POST['IsActive']."' where DateandCostID='".$_POST['DateandCostID']."'");
    if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['message']="Date and Cost Updated";  
        $result['packageid']=md5($_POST['PackageID']);  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Submission failed.";  
        return json_encode($result); 
    }
    } 
    
    function DeleteDateandCost() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_package_date_cost where DateandCostID='".$_POST['DateandCostID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="date and Cost Deleted.";  
        return json_encode($result);
    }
    
    function AddDayandEventDetails(){
       global $mysql;
       $TourPackages = $mysql->select("select * from _tbl_tours_package where md5(PackageID)='".$_REQUEST['PackageID']."'");
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title">';
            $html.= $TourPackages[0]['PackageName'];
       $html.= '</h4></div>';
       $html .= '<form method="post" action="" id="DayandEventFrom">';
       $html .='<input type="hidden" value="'.$TourPackages[0]['PackageID'].'" name="PackageID" id="PackageID">';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label style="font-weight:normal">Day</label>';
                                $html .='<select class="form-control" name="EventDay" id="EventDay">';
                                    for($i=1;$i<=30;$i++){ 
                                    $html .='<option value="'.$i.'" '.((isset($_POST[ 'EventDay'])) ? (($_POST[ 'EventDay']==$i) ? " selected=selected " : "") : "").'>'.$i.'</option>';
                                    }
                                $html .='</select>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="EventTitle" id="EventTitle" placeholder="Event Title" aria-label="EventTitle" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="EventDescription" id="EventDescription" placeholder="Event Description" aria-label="EventDescription" aria-describedby="basic-addon1"></textarea>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" onclick="SaveDayandEventDetails()">Submit</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
        $html .='</form>';
       
       return $html;                                                                                
    }
    function SubmitDayandEventDetails() {
    
    global $mysql;
    
    $data = $mysql->select("select * from _tbl_package_day_event where EventDay='".$_POST['EventDay']."' and PackageID='".$_POST['PackageID']."'");
    if(sizeof($data)>0){
        $result = array();
        $result['status']="failure";
        $result['message']="Event Already Created In This Day.";  
        return json_encode($result);    
    }
   
      $id = $mysql->insert("_tbl_package_day_event",array("PackageID"          => $_POST['PackageID'],
                                                          "EventDay"          => $_POST['EventDay'],
                                                          "EventTitle"        => $_POST['EventTitle'],
                                                          "EventDescription"  => $_POST['EventDescription'],
                                                          "AddedOn"           => date("Y-m-d H:i:s")));
      if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['message']="Day and Event Added";  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Submission failed.";  
        return json_encode($result); 
    }
    } 
    function EditDayandEventDetails(){
       global $mysql;
       $DayandEvent = $mysql->select("select * from _tbl_package_day_event where md5(DayandEventID)='".$_REQUEST['DayandEventID']."'");
       
       $TourPackages = $mysql->select("select * from _tbl_tours_package where PackageID='".$DayandEvent[0]['PackageID']."'");
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title" style="margin-bottom:-15px">';
            $html.= $TourPackages[0]['PackageName'];
       $html.= '</h4></div>';
       $html .= '<form method="post" action="" id="EditDayandEventFrom">';
       $html .='<input type="hidden" value="'.$TourPackages[0]['PackageID'].'" name="PackageID" id="PackageID">';
       $html .='<input type="hidden" value="'.$DayandEvent[0]['DayandEventID'].'" name="DayandEventID" id="DayandEventID">';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12"><label style="font-weight:normal">Day</label>';
                                $html .='<select class="form-control" name="EventDay" id="EventDay">';
                                    for($i=1;$i<=30;$i++){ 
                                    $html .='<option value="'.$i.'" '.((isset($_POST[ 'EventDay'])) ? (($_POST[ 'EventDay']==$i) ? " selected=selected " : "") : (($DayandEvent[0]['EventDay']==$i) ? " selected=selected " : "")).'>'.$i.'</option>';
                                    }
                                $html .='</select>';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="EventTitle" id="EventTitle" value="'.$DayandEvent[0]['EventTitle'].'" placeholder="Event Title" aria-label="EventTitle" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<textarea class="form-control" name="EventDescription" id="EventDescription" placeholder="Event Description" aria-label="EventDescription" aria-describedby="basic-addon1">'.$DayandEvent[0]['EventDescription'].'</textarea>';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" onclick="UpdateDayandEventDetails()">Update</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
        $html .='</form>';
       
       return $html;                                                                                
    }
    function SubmitUpdateDayandEventDetails(){
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_package_day_event where EventDay='".$_POST['EventDay']."' and PackageID='".$_POST['PackageID']."' and DayandEventID<>'".$_POST['DayandEventID']."'");
        if(sizeof($data)>0){
            $result = array();
            $result['status']="failure";
            $result['message']="Event Already Created In This Day.";  
            return json_encode($result);    
        }
        
        $id=  $mysql->execute("update _tbl_package_day_event set `EventDay`     ='".$_POST['EventDay']."',
                                                                 `EventTitle` ='".$_POST['EventTitle']."',
                                                                 `EventDescription`   ='".$_POST['EventDescription']."' where DayandEventID='".$_POST['DayandEventID']."'");
    if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['qry']="update _tbl_package_day_event set `EventDay`     ='".$_POST['EventDay']."',
                                                                 `EventTitle` ='".$_POST['EventTitle']."',
                                                                 `EventDescription`   ='".$_POST['EventDescription']."' where DayandEventID='".$_POST['DayandEventID']."'";  
        $result['message']="Day and Event Updated";  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Update failed.";  
        return json_encode($result); 
    }
    }
    function DeleteDayandEvent() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_package_day_event where DayandEventID='".$_POST['DayandEventID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Day and Event Deleted.";  
        return json_encode($result);
    }
    function SubmitAdditionalDetails() {
    global $mysql;
    $additionalParam = $mysql->select("select * from _tbl_additional_params where PackageID='".$_POST['PackageID']."'");
    if(sizeof($additionalParam)==0){
      $id = $mysql->insert("_tbl_additional_params",array("PackageID"          => $_POST['PackageID'],
                                                          "termsandconditions" => $_POST['termsandconditions'],
                                                          "charges"            => $_POST['Charges'],
                                                          "ExtraToppings"      => $_POST['ExtraToppings'],
                                                          "OurSpeciality"      => $_POST['OurSpeciality'],
                                                          "DroppingDetails"    => $_POST['DroppingDetails'],
                                                          "PackagesNotes"      => $_POST['PackagesNotes'],
                                                          "AddedOn"            => date("Y-m-d H:i:s")));
    }else {
       $mysql->execute("update _tbl_additional_params set `termsandconditions` ='".$_POST['termsandconditions']."',
                                                           `charges`           ='".$_POST['Charges']."',
                                                           `ExtraToppings`     ='".$_POST['ExtraToppings']."',
                                                           `OurSpeciality`     ='".$_POST['OurSpeciality']."',
                                                           `DroppingDetails`   ='".$_POST['DroppingDetails']."',
                                                           `PackagesNotes`     ='".$_POST['PackagesNotes']."'
                                                            where ParamID      ='".$additionalParam[0]['ParamID']."'");  
       $id=1;
   } 
      if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['aa']=sizeof($additionalParam);
        $result['message']="Additional params Added";  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Submission failed.";  
        return json_encode($result); 
    }
    } 
    function DeleteSlider() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_sliders where SliderID='".$_POST['SliderID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Slider Deleted.";  
        return json_encode($result);
    } 
    
    function ViewContactenquiry(){
       global $mysql;
       $Contact = $mysql->select("select * from _tbl_contactus where md5(ContactID)='".$_REQUEST['ContactID']."'");
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title">Contact Enquiry</h4></div>';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Requested On</div>';
                            $html .= '<div class="col-sm-7">'.date("M,d Y", strtotime($Contact[0]['AddedOn'])).'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Contact Name</div>';
                            $html .= '<div class="col-sm-7">'.$Contact[0]['ContactName'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Email ID</div>';
                            $html .= '<div class="col-sm-7">'.$Contact[0]['Email'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Mobile Number</div>';
                            $html .= '<div class="col-sm-7">'.$Contact[0]['MobileNumber'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Comments</div>';
                            $html .= '<div class="col-sm-7" style="height: 200px;border: 1px solid #ccc;overflow: auto;">'.$Contact[0]['Description'].'</div>';                  
                        $html .= '</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';                                                                                              
       $html .='<div class="modal-footer">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" data-dismiss="modal">Cancel</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
       
       return $html;                                                                                
       
    }
?> 
 