
<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
  
    function DeleteEvent() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM _tbl_events where EventID='".$_POST['EventID']."'");
     
        $result = array();
        $result['status']="Success";
        
        $result['message']="Deleted.";  
        return json_encode($result);
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
   
        
 
  
  
    
   
 

?> 
 