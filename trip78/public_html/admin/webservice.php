
<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
    function UpdateStateName() {
        global $mysql,$app;
   
      $id=$mysql->execute("update _tbl_master_statenames set StateName='".$_POST['StateName']."' where StateID='".$_POST['StateID']."'");
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="State Name updated.";  
        $result['countryid']=$_POST['CountryID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }   
    }
    
    
    function UpdateCountryName() {
    
    global $mysql,$app;
   
      $id=$mysql->execute("update _tbl_master_countrynames set CountryName='".$_POST['CountryName']."' where CountryID='".$_POST['CountryID']."'");
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Country Name updated.";  
        $result['post']=$_POST;  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
} 

function deleteCountryName() {
    global $mysql,$app;
    $district = $mysql->select("select * from  _tbl_master_countrynames where CountryID='".$_GET['distid']."'");
    $result = array();
   
    $result['countryid'] = $district[0]['CountryID'];  
    $result['stateid']   = $district[0]['StateID'];  
    {
       $mysql->execute("delete from _tbl_master_countrynames where CountryID='".$_GET['distid']."'");
        $result['status']  = "success";
        $result['message'] = "Country Name deleted.";  
    }  
    return json_encode($result);
}
function deleteStateName() {
    global $mysql,$app;
    $district = $mysql->select("select * from  _tbl_master_statenames where StateID='".$_GET['distid']."'");
    $result = array();
   
    $result['countryid'] = $district[0]['CountryID'];  
    $result['stateid']   = $district[0]['StateID'];  
    {
       $mysql->execute("delete from _tbl_master_statenames where StateID='".$_GET['distid']."'");
        $result['status']  = "success";
        $result['message'] = "Country Name deleted.";  
    }  
    return json_encode($result);
}

function deleteDistrictName() {
    global $mysql,$app;
    $district = $mysql->select("select * from  _tbl_master_districtnames where DistrictNameID='".$_GET['distid']."'");
    $result = array();
   
    $result['countryid'] = $district[0]['CountryID'];  
    $result['stateid']   = $district[0]['StateID'];  
    {
       $mysql->execute("delete from _tbl_master_districtnames where DistrictNameID='".$_GET['distid']."'");
        $result['status']  = "success";
        $result['message'] = "District Name deleted.";  
    }  
    return json_encode($result);
}



function UpdateDistrictName() {
    global $mysql,$app;
    $id=$mysql->execute("update _tbl_master_districtnames set DistrictName='".$_POST['DistName']."' where DistrictNameID='".$_POST['distcid']."'");
    $data=$mysql->select("select * from  _tbl_master_districtnames  where DistrictNameID='".$_POST['distcid']."'");
    $result = array();
    $result['countryid'] = $data[0]['CountryID'];  
    $result['stateid']   = $data[0]['StateID'];  
    if($id>0){
        $result['status']  = "success";
        $result['message'] = "District Name updated.";  
    } else {
        $result['status']  = "failure";
        $result['message'] = "Unable to update. please try later.";  
    }
    return json_encode($result);
}

    
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
                            $html .= '<div class="col-sm-5">Pincode</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['Pincode'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Number of Adults(age: above 12)</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['NumberofAdults'].'</div>';                  
                        $html .= '</div>';
                        
                         $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Number of Infants (age: below 2 yr)</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['NumberofInfants'].'</div>';                  
                        $html .= '</div>';
                         $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Number of Children(age: 3-12)</div>';
                            $html .= '<div class="col-sm-7">'.$Enquiry[0]['NumberofChildrens'].'</div>';                  
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
               $EventTitle = str_replace("'","\'",$_POST['EventTitle']);
               $EventTitle = str_replace('"','\"',$EventTitle);
               $EventDescription = str_replace("'","\'",$_POST['EventDescription']);
               $EventDescription = str_replace('"','\"',$EventDescription);
               
      
      $id = $mysql->insert("_tbl_package_day_event",array("PackageID"          => $_POST['PackageID'],
                                                          "EventDay"          => $_POST['EventDay'],
                                                          "EventTitle"        => $EventTitle,
                                                          "EventDescription"  => $EventDescription,
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
        
        $EventTitle = str_replace("'","\'",$_POST['EventTitle']);
        $EventTitle = str_replace('"','\"',$EventTitle);
        $EventDescription = str_replace("'","\'",$_POST['EventDescription']);
        $EventDescription = str_replace('"','\"',$EventDescription);
               
        $id=  $mysql->execute("update _tbl_package_day_event set `EventDay`     ='".$_POST['EventDay']."',
                                                                 `EventTitle` ='".$EventTitle."',
                                                                 `EventDescription`   ='".$EventDescription."' where DayandEventID='".$_POST['DayandEventID']."'");
    if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['qry']="update _tbl_package_day_event set `EventDay`     ='".$_POST['EventDay']."',
                                                                 `EventTitle` ='".$EventTitle."',
                                                                 `EventDescription`   ='".$EventDescription."' where DayandEventID='".$_POST['DayandEventID']."'";  
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
                                                          "inclusions"         => $_POST['inclusions'],
                                                          "exclusions"         => $_POST['exclusions'],
                                                          "PackagesNotes"      => $_POST['PackagesNotes'],
                                                          "AddedOn"            => date("Y-m-d H:i:s")));
    }else {
       $mysql->execute("update _tbl_additional_params set `termsandconditions` ='".$_POST['termsandconditions']."',
                                                           `charges`           ='".$_POST['Charges']."',
                                                           `ExtraToppings`     ='".$_POST['ExtraToppings']."',
                                                           `OurSpeciality`     ='".$_POST['OurSpeciality']."',
                                                           `DroppingDetails`   ='".$_POST['DroppingDetails']."',
                                                           `inclusions`        ='".$_POST['inclusions']."',
                                                           `exclusions`        ='".$_POST['exclusions']."',
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
    
     function DeleteCustomerReview() {
    
    global $mysql;
   
      //$id=$mysql->execute("DELETE FROM _tbl_customer_reviews where CustomerReviewID='".$_POST['CustomerReviewID']."'");
      $id=$mysql->execute("update _tbl_customer_reviews set IsActive='0' where CustomerReviewID='".$_POST['CustomerReviewID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Customer Review Deleted.";  
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
                            $html .= '<div class="col-sm-5">Subject</div>';
                            $html .= '<div class="col-sm-7">'.$Contact[0]['Subject'].'</div>';                  
                        $html .= '</div>';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-5">Description</div>';
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
    function GetDistrictname() {
            
            global $mysql;
            $districtnames =  $mysql->select("select * from _tbl_master_districtnames where StateID='".$_REQUEST['StateID']."'");
            $html = '<select class="form-control" name="DistrictName" id="DistrictName" style="width:100%">';
            if($_GET['StateID']==0){                                                       
                $html .= '<option value="0" selected="selected">Select District Name</option>';   
                $html .='</select>';
                return $html;  
            }else { 
            if (sizeof($districtnames)>0) {
                $html .= '<option value="0" selected="selected">Select District Name</option>';  
                foreach($districtnames as $r) {
                    if (isset($_GET['DistrictID'])) {
                        $html .= '<option value="'.$r['DistrictNameID'].'" '.(($_GET['DistrictID']==$r['DistrictNameID']) ? ' selected=selected ':'').'>'.$r['DistrictName'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['DistrictNameID'].'">'.$r['DistrictName'].'</option>';    
                    }
                }
            } else {
               $html .= '<option value="0" selected="selected">Select District Name</option>';  
            }
            $html .='</select>';                                                                         
            return $html;
            }                                                                                                                            
        }
        
    function getStateNames() {
            
            global $mysql;
            $StateNames =  $mysql->select("select * from _tbl_master_statenames where CountryID='".$_REQUEST['CountryID']."'");
            $html = '<select class="form-control" name="StateName" id="StateName" style="width:100%" onchange="GetDistrictname($(this).val())">';
            if($_GET['CountryID']==0){                                                       
                $html .= '<option value="0" selected="selected">Select State Name</option>';   
                $html .='</select>';
                return $html;  
            }else { 
            if (sizeof($StateNames)>0) {
                $html .= '<option value="0" selected="selected">Select State Name</option>'; 
                foreach($StateNames as $r) {
                    if (isset($_GET['StateID'])) {
                        $html .= '<option value="'.$r['StateID'].'"   '.(($_GET['StateID']==$r['StateID']) ? ' selected=selected ':'').'>'.$r['StateName'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['StateID'].'">'.$r['StateName'].'</option>';    
                    }
                }
            } else {
               $html .= '<option value="0" selected="selected">Select State Name</option>';  
            }
            $html .='</select>';                                                                         
            return $html;
            }                                
        }
    function AddAgentPincode(){
       global $mysql;
       $Agents = $mysql->select("select * from _tbl_tour_agents where md5(AgentID)='".$_REQUEST['AgentID']."'");
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title">';
            $html.= $Agents[0]['AgentName'];
       $html.= '</h4></div>';
       $html .= '<form method="post" action="" id="AgentPincodeFrom">';
       $html .='<input type="hidden" value="'.$Agents[0]['AgentID'].'" name="AgentID" id="AgentID">';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="Pincode" id="Pincode" placeholder="Pincode" aria-label="Pincode" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer" style="padding:0px">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" onclick="SaveAgentPincode()">Submit</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
        $html .='</form>';
       
       return $html;                                                                                
    }
    function SubmitAgentPincode() {
    
    global $mysql;
    
    $data = $mysql->select("select * from _tbl_agent_pincode where isactive='1' and Pincode='".$_POST['Pincode']."'");
    if(sizeof($data)>0){
        $result = array();
        $result['status']="failure";
        $result['message']="Pincode already assigned to agent.";  
        return json_encode($result);    
    }
   
      $id = $mysql->insert("_tbl_agent_pincode",array("AgentID" => $_POST['AgentID'],
                                                      "Pincode" => $_POST['Pincode'],
                                                      "AddedOn" => date("Y-m-d H:i:s")));
      if(sizeof($id>0)){
        $result = array();
        $result['status']="Success";
        $result['message']="Pincode Added";  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Submission failed.";  
        return json_encode($result); 
    }
    }
    
    function EditAgentPincode(){
       global $mysql;
       $Pincode = $mysql->select("select * from _tbl_agent_pincode where md5(PincodeID)='".$_REQUEST['PincodeID']."'");
       
       $Agent = $mysql->select("select * from _tbl_tour_agents where AgentID='".$Pincode[0]['AgentID']."'");
       
       $html = '<div class="modal-header" id="header_text"><h4 class="modal-title" style="margin-bottom:-15px">';
            $html.= $Agent[0]['AgentName'];
       $html.= '</h4></div>';
       $html .= '<form method="post" action="" id="EditAgentPincodeFrom">';
       $html .='<input type="hidden" value="'.$Agent[0]['AgentID'].'" name="AgentID" id="AgentID">';
       $html .='<input type="hidden" value="'.$Pincode[0]['PincodeID'].'" name="PincodeID" id="PincodeID">';
       $html .='<div class="modal-body"  style="padding:10px;">';
            $html .= '<div class="form-group row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<div class="col-sm-12">';
                        $html .= '<div class="form-group row">';
                            $html .= '<div class="col-sm-12">';
                                $html .='<input type="text" class="form-control" name="Pincode" id="Pincode" value="'.$Pincode[0]['Pincode'].'" placeholder="Pincode" aria-label="Pincode" aria-describedby="basic-addon1">';
                            $html .='</div>';
                        $html .='</div>';
                    $html .='</div>';
                $html .='</div>';
            $html .='</div>';
       $html .='</div>';
       $html .='<div class="modal-footer" style="padding:0px">';
            $html .= '<div class="form-group row">';    
                $html .= '<div class="col-sm-12" style="text-align:right">';    
                    $html .='<button type="button" class="btn btn-primary" style="border-radius:0px;border: none;" onclick="UpdateAgentPincode()">Update</button>';    
                $html .='</div>';
            $html .='</div>';
        $html .='</div>';
        $html .='</form>';
       
       return $html;                                                                                
    } 
    function SubmitUpdateAgentPincode(){
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_agent_pincode where Pincode='".$_POST['Pincode']."' and PincodeID<>'".$_POST['PincodeID']."'");
        if(sizeof($data)>0){
            $result = array();
            $result['status']="failure";
            $result['message']="Pincode already exists.";  
            return json_encode($result);    
        }
        
        $id=  $mysql->execute("update _tbl_agent_pincode set `Pincode` ='".$_POST['Pincode']."' where PincodeID='".$_POST['PincodeID']."'");
    if($id>0){
        $result = array();
        $result['status']="Success";
       $result['message']="Pincode Updated";  
        return json_encode($result);
    }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Update failed.";  
        return json_encode($result); 
    }
    }
    function DeleteAgentPincode() {
    
    global $mysql;
   
     // $id=$mysql->execute("DELETE FROM _tbl_agent_pincode where PincodeID='".$_POST['PincodeID']."'");
      $id=$mysql->execute("update  _tbl_agent_pincode set isactive='0' where PincodeID='".$_POST['PincodeID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Pincode Deleted.";  
        return json_encode($result);
    }
    function DeleteAgent() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_tour_agents where AgentID='".$_POST['AgentID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Agent Deleted.";  
        return json_encode($result);
    }
?> 
 