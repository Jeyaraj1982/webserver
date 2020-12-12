<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
    function GetDistrictname() {
            
            global $mysql;
            $districtnames = $mysql->select("select * from _tbl_master_districtnames where StateID='".$_REQUEST['StateID']."'");
            $stateID   = 0;
            $html = '<select class="form-control" name="DistrictName" id="DistrictName">';
                        $html .= '<option value="0">Select District Name</option>';
            if (sizeof($districtnames)>0) {
                foreach($districtnames as $r) {
                  
                    if($_REQUEST['DistrictID']!="0"){
                       $html .= '<option value="'.$r['DistrictNameID'].'" '.(($_REQUEST['DistrictID']== $r['DistrictNameID']) ? "selected='selected'" : "").'>'.$r['DistrictName'].'</option>';
                    }else {
                    $html .= '<option value="'.$r['DistrictNameID'].'" '.(($_POST['DistrictName']== $r['DistrictNameID']) ? "selected='selected'" : "").'>'.$r['DistrictName'].'</option>';
                            
                    }
                }
            }                                                                                                
            $html .= '</select>';       
            
            return $html;
                                                                                                                                   
        }
        
    function getIFSCode() {
    
    global $mysql;
    $ch = curl_init();  
    
    curl_setopt($ch,CURLOPT_URL,"https://ifsc.bankifsccode.com/".$_GET['IFSCode']);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    $output=curl_exec($ch);
    curl_close($ch);
    $output_data = explode("IFSC Code:-",$output);
    $output_data = explode("</div>",$output_data[1]);
    $data = explode(",",$output_data[0]);  
    if (sizeof($data)>1) {
        $output = json_encode(array("status"=>"success",
                                    "data"=>array("STATE"=>"","BANK"=>$data[1],"IFSC"=>$data[0],"BRANCH"=>$data[2],"ADDRESS"=>"","CONTACT"=>"0","CITY"=>"","DISTRICT"=>"","MICRCODE"=>""),
                                    "message"=>""));
     } else {
        $output = json_encode(array("status"=>"failure","message"=>"Invalid ifscode"));
    }
   /* $txnid=   $mysql->insert("_tbl_ifsc_log",array("UserID"     => $_SESSION['User']['MemberID'],
                                                    "IFSCode"    => $_GET['IFSCode'],
                                                    "OutPut"     => $output,
                                                     "TxnOn"      =>date("Y-m-d H:i:s")));    */
      //$output = json_encode(array("status"=>))
         //{"status":"success","data":{"_id":"5a90ef28ec4a372ad2966588","STATE":"TAMIL NADU","BANK":"FEDERAL BANK","IFSC":"FDRL0002109","BRANCH":"RAMAPURAM","ADDRESS":"D.NO.1/12, THIROOR VILLAGE VELLAMADAM P.O, KANYAKUMARI","CONTACT":"0","CITY":"RAMAPURAM","DISTRICT":"KANYAKUMARI","MICRCODE":"NA"},"message":null}
    return $output;
    
}
function AddToFavStore() {
        global $mysql;
        $stores = $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$_REQUEST['StoreID']."'");
        
        $Favorite =  $mysql->insert("_tbl_favorite_stores",array("StoreID"          => $stores[0]['SupportingCenterAdminID'],
                                                                 "MemberID"         => $_SESSION['User']['MemberID'],
                                                                 "FavoriteOn"       => date("Y-m-d H:i:s")));
        if(sizeof($Favorite)>0){
           $html = '<button type="button" class="btn btn-outline-success btn-sm" style="padding: 0px 10px 0px 10px;">Favorited</button>';
        }  
        return $html;
                                                                                                                               
    }
    
function CheckTransactionPassword(){
    global $mysql;
    $Member = $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
    if(!($Member[0]['MemberTxnPassword']==$_REQUEST['TransactionPassword'])){
        $result = array();
        $result['status']="failure";
        $result['message']="Incorrect Transaction Password.";  
        return json_encode($result);    
    }else {
       $result = array();
        $result['status']="success";
        return json_encode($result);   
    }
    
}
function AssignPackageDetails(){
    global $mysql;
    $id= $mysql->execute("update _tbl_Members_Package_Elegible set PayoutType='".$_POST['PackageType']."',
                                                                   Description='".$_POST['Description']."',
                                                                   UplodatedOn='".date("Y-m-d H:i:s")."'
                                                                   where PackageEligibleID='".$_POST['PackageEligibleID']."' and MemberID='".$_POST['MemberID']."'");
    $result = array();
    $result['status']="Success";
    $result['message']="Package Assined Successfully";
    return json_encode($result);
}   
function DeleteStore(){
    global $mysql;
   
     $mysql->execute("DELETE FROM _tbl_store_types  where StoreTypeID  ='".$_POST['StoreTypeID']."'");
                                                       
  
        $result = array();
        $result['status']="Success";
        $result['message']="Store Deleted Successfully";
        return json_encode($result);
   
}
function DeleteStoreLogo(){
    global $mysql;
      $id= $mysql->execute("update _tbl_business_supporting_center set ShopLogo='' where SupportingCenterAdminID  ='".$_POST['SupportingCenterAdminID']."'");
  
        $result = array();
        $result['status']="Success";
        $result['message']="Store Logo Deleted Successfully";
        $result['SupportingCenterAdminID']=$_POST['SupportingCenterAdminID'];
        return json_encode($result);
   
}
function UpdatePackageDetails(){
    global $mysql;
      $id= $mysql->execute("update _tbl_Members_Package_Elegible set Description='".$_POST['Description']."'
                                                                     where PackageEligibleID='".$_POST['PackageEligibleID']."' and MemberID='".$_POST['MemberID']."'");
    $result = array();
    $result['status']="Success";
    $result['message']="Updated Successfully";
    return json_encode($result);
   
}

function DeleteProduct(){
    global $mysql;
     $mysql->execute("DELETE FROM _tbl_products  where ProductID  ='".$_POST['ProductID']."'");
  
        $result = array();
        $result['status']="Success";
        $result['message']="Product Deleted Successfully";
        return json_encode($result);
   
}
function getMemberDetails(){
    global $mysql;
    $Member = $mysql->select("select * from _tbl_Members where MemberCode='".$_REQUEST['MemberCode']."'"); 
    if(sizeof($Member)==0){
        $html = '<span style="color:red">Invalid Member Code</span>';  
        return $html; 
    }else {
        $html = 'Member Code&nbsp;&nbsp;:&nbsp;'.$Member[0]['MemberCode'];
        $html .= '<br>Member Name&nbsp;:&nbsp;'.$Member[0]['MemberName'];
        $html .= '<br>Mobile Number&nbsp;:&nbsp;'.$Member[0]['MobileNumber'];
        return $html; 
    }
}
function AddFeedback(){
    global $mysql;
      $id= $mysql->execute("update _tbl_store_feedback set FeedBack ='".$_POST['FeedBack']."',
                                                           Ratings  ='".$_POST['Rating']."',
                                                           IsFirst  ='0',
                                                           FeedBackOn  ='".date("Y-m-d H:i:s")."'
                                                           where FeedBackID='".$_POST['FeedBackID']."'");
    $result = array();
    $result['status']="Success";
    $result['message']="Feed Back Added Successfully";
    return json_encode($result);
   
}
?>
    