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
        
        
    function EditPrice() {
        global $mysql;
       $BrandNames = $mysql->select("select * from _tbl_master_units where IsActive='1' order by UnitName"); 
       $data  = $mysql->select("select * from _tbl_products_prices where md5(PriceTagID)='".$_GET['TagID']."'"); 
        $return = '
        <div class="row">
        <div class="col-sm-12">
            <div class="card" style="margin-bottom:0px">
                <div class="card-body">
        <form action="" method="post" onsubmit="return doPriceTagValidate()">
        <input type="hidden" value="'.$_GET['TagID'].'" name="TagID">
                        <div class="form-group form-show-validation row">
                            <label class="col-sm-12"  style="padding-left:0px" for="name">Unit<span style="color:red">*</span></label>
                             <div class="col-sm-4" style="padding-left:0px">
                            <input type="text" class="form-control" id="Units" name="Units" placeholder="Enter Units" value="'.$data[0]['Units'].'">
                            <span style="color:red" id="ErrUnits"></span>
                            </div>
                             <div class="col-sm-4">
                            <select class="form-control" name="UnitID" id="UnitID">
                                <option value="0">Select Unit</option>';
                                foreach($BrandNames as $BrandName) { 
                                    $return .= '<option value="'.$BrandName['UnitID'].'"  '.(($BrandName['UnitID']==$data[0]['UnitID']) ? ' selected="selected" ' : "").'  >'.$BrandName['UnitName'].'</option>';
                                } 
                             $return .= '</select>
                             </div>
                            <span class="errorstring" id="ErrBrandName"></span>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="name">MRP<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="MRP" name="MRP" placeholder="Enter MRP" value="'.$data[0]['MRP'].'">
                            <span class="errorstring" id="ErrProductName"></span>
                        </div> 
                        <div class="form-group form-show-validation row">
                            <label for="name">Selling Price<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="SellingPrice" name="SellingPrice" placeholder="Enter Selling Price" value="'.$data[0]['SellingPrice'].'">
                            <span class="errorstring" id="ErrProductName"></span>
                        </div> 
                        <div class="form-group form-show-validation row">
                            <label for="name">Description</label>
                            <input type="text" class="form-control" id="Description" name="Description" placeholder="Enter Description" value="'.$data[0]['Description'].'">
                            <span class="errorstring" id="ErrProductName"></span>
                        </div> 
                        <div class="form-group form-show-validation row" style="text-align: right;">
                            <input type="Button" value="Cancel" name="" class="btn btn-gray btn-sm">  &nbsp;
                            <input type="submit" value="Update" name="UpdateBtn" class="btn btn-primary btn-sm"> 
                        </div> 
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    ';
                    return $return;
        
        
    }    
       ?>