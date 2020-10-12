<?php
include_once("../../../config.php");
    echo $_REQUEST['action']();
    
    function GetDistrictname() {
            
            global $mysql;
            $districtnames = $mysql->select("select * from _tbl_master_districtnames where StateID='".$_REQUEST['StateID']."'");
            $stateID   = 0;
            $html = '<select class="form-control" name="SupportingCenterDistrict" id="SupportingCenterDistrict">';
            if (sizeof($districtnames)>0) {
                foreach($districtnames as $r) {
                  
                    if(isset($_REQUEST['DistrictID'])){
                       $html .= '<option value="'.$r['DistrictID'].'" '.(($_REQUEST['DistrictID']== $r['DistrictID']) ? "selected='selected'" : "").'>'.$r['DistrictName'].'</option>';
                    }else {
                    $html .= '<option value="'.$r['DistrictID'].'" '.(($_POST['SupportingCenterDistrict']== $r['DistrictID']) ? "selected='selected'" : "").'>'.$r['DistrictName'].'</option>';
                    }
                }
            }
            $html .= '</select>';       
            
            return $html;
                                                                                                                                   
        }
?>
    