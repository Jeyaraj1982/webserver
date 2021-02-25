<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
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
       ?>