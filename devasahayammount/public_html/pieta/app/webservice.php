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
        
        
    function PriceTag_Edit() {
        global $mysql;
       $BrandNames = $mysql->select("select * from _tbl_master_units where IsActive='1' order by UnitName"); 
       $data  = $mysql->select("select * from _tbl_products_prices where md5(PriceTagID)='".$_GET['TagID']."'"); 
        $rand = rand();
        $return = '
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" style="margin-bottom:0px">
                            <div class="card-body">
                                <form action="" method="post" name="form_newprice_'.$rand.'" id="form_newprice_'.$rand.'">
                                    <input type="hidden" value="'.$_GET['TagID'].'" name="TagID">
                                    <div class="form-group form-show-validation row">
                                         <div class="col-sm-3" style="padding-left:0px">
                                            <label for="name">Unit<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="Units" name="Units" placeholder="Enter Units" value="'.$data[0]['Units'].'">
                                         </div>
                                         <div class="col-sm-3" style="padding-left:0px;padding-right:0px">
                                            <label for="name">&nbsp;</label>
                                            <select class="form-control" name="UnitID" id="UnitID">
                                                <option value="0">Select Unit</option>';
                                                foreach($BrandNames as $BrandName) { 
                                                    $return .= '<option value="'.$BrandName['UnitID'].'"  '.(($BrandName['UnitID']==$data[0]['UnitID']) ? ' selected="selected" ' : "").'  >'.$BrandName['UnitName'].'</option>';
                                                } 
                                            $return .= '</select>
                                         </div>';
                                         
                                          if (BrandSize) { 
                                              $BrandSizes=$mysql->select("select * from _tbl_brand_size where IsActive='1'");
                                              $return .= '<div class="col-sm-6" style="padding-right:0px">
                                                        <label for="name">&nbsp;</label>
                                                        <select class="form-control" name="BrandSizeID" id="BrandSizeID">
                                                            <option value="0">Select Size</option>';
                                                             foreach($BrandSizes as $BrandSize) { 
                                                                $return .= '<option value="'.$BrandSize['SizeID'].'"  '.(($BrandSize['SizeID']==$data[0]['BrandSizeID']) ? ' selected="selected" ' : "").'>'.$BrandSize['SizeText'].'</option>';
                                                             } 
                                                        $return .= '</select>
                                                          </div>';
                                          }
                                         
                                     $return .= '</div>
                                    
                                    
                                    <div class="form-group form-show-validation row">
                                        <div class="col-3" style="padding-left:0px">
                                            <label for="name">MRP<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" style="text-align:right" id="MRP" name="MRP" placeholder="Enter MRP" value="'.$data[0]['MRP'].'">
                                        </div> 
                                        <div class="col-3" style="padding-left:0px;padding-right:0px">
                                            <label for="name">Selling Price<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" style="text-align:right" id="SellingPrice" name="SellingPrice" placeholder="Enter Selling Price" value="'.$data[0]['SellingPrice'].'">
                                            <span class="errorstring" id="ErrProductName"></span>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-group form-show-validation row">
                                        <label for="name">Description</label>
                                        <input type="text" class="form-control" id="Description" name="Description" placeholder="Enter Description" value="'.$data[0]['Description'].'">
                                        
                                    </div> 
                        
                                    <div class="form-group form-show-validation row" style="padding-left:0px;padding-right:0px;">
                                        <div class="col-3">
                                            <label for="name">Stock Available</label>         
                                            <select class="form-control" id="IsStockAvailable" name="IsStockAvailable">
                                                <option value="1" '.(($data[0]['IsStockAvailable']==1) ? " selected=selected " :"").'>Yes</option>
                                                <option value="0" '.(($data[0]['IsStockAvailable']==0) ? " selected=selected " :"").'>No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="name">Is Publish</label>
                                            <select class="form-control" id="IsPublish" name="IsPublish">
                                                <option value="1" '.(($data[0]['IsPublish']==1) ? " selected=selected " :"").'>Yes</option>
                                                <option value="0" '.(($data[0]['IsPublish']==0) ? " selected=selected " :"").'>No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="name">Avl. Qty</label>
                                            <input type="text" class="form-control" value="'.$data[0]['AvlQty'].'"  id="AvlQty" name="AvlQty" placeholder="Enter Avai.Qty" value="0" style="text-align: right;">  
                                        </div>
                                         <div class="col-3">
                                            <label for="name">List Order</label>
                                            <input type="text" class="form-control" value="'.$data[0]['ListOrder'].'"  id="ListOrder" name="ListOrder" placeholder="Enter ListOrder" value="0" style="text-align: right;">  
                                        </div>
                                    </div> 
                        
                        <div class="form-group form-show-validation row" style="text-align: right;">
                            <input type="Button"  data-dismiss="modal" value="Cancel" name="" class="btn btn-gray btn-sm">&nbsp;&nbsp;
                            <input type="Button" onclick="doPriceTagValidate(\''.$rand.'\',\'update\')"  value="Update" name="UpdateBtn" class="btn btn-primary btn-sm">&nbsp;&nbsp; 
                            <span style="color:red;padding-top: 5px;padding-left:20px;" id="ErrMessage"></span>
                        </div> 
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    
                    ';
                    return $return;
        
        
    }
    
    function PriceTag_Update() {
        global $mysql;
        
          $BrandSizeID   = "0";
                                    $BrandSizeText = "";
                                    
                                    $Units = $mysql->select("select * from _tbl_master_units where UnitID='".$_POST['UnitID']."'");
                                    if (BrandSize) {
                                        $BrandSizes    = $mysql->select("select * from _tbl_brand_size Where SizeID='".$_POST['BrandSizeID']."'");
                                        $BrandSizeID   = $_POST['BrandSizeID'];
                                        $BrandSizeText = $BrandSizes[0]['SizeText'];
                                    }
                                    $data = $mysql->select("select * from _tbl_products_prices where  md5(PriceTagID)='".$_POST['TagID']."'");
                                    $mysql->execute("update _tbl_products_prices set UnitID         ='".$_POST['UnitID']."' ,
                                                                                     Units          ='".$_POST['Units']."' ,
                                                                                     UnitName       ='".$Units[0]['UnitName']."'  ,
                                                                                     MRP            ='".$_POST['MRP']."' ,
                                                                                     SellingPrice   ='".$_POST['SellingPrice']."',
                                                                                     BrandSizeID    ='".$BrandSizeID."',
                                                                                     BrandSizeText  ='".$BrandSizeText."' ,
                                                                                     IsStockAvailable  = '".$_POST['IsStockAvailable']."',
                                                                                     ListOrder  = '".$_POST['ListOrder']."',
                                                                                     IsPublish         = '".$_POST['IsPublish']."',
                                                                                     AvlQty         = '".$_POST['AvlQty']."',
                                                                                     Description    ='".$_POST['Description']."' where  md5(PriceTagID)='".$_POST['TagID']."'");
                                
              return json_encode(array("status"=>"success","message"=>"Price Tag Successfully updated".$mysql->qry,"Content"=>PriceTag_List($data[0]['ProductID'])));
                                                                          
    }  
    function PriceTag_Delete() {
        
        global $mysql;
        $PriceTag = $mysql->select("select * from _tbl_products_prices where PriceTagID='".$_POST['PriceTagID']."'");
        $mysql->execute("delete from _tbl_products_prices where PriceTagID='".$_POST['PriceTagID']."'");
        return json_encode(array("status"=>"success","message"=>"Price Tag deleted successfully","Content"=>PriceTag_List($PriceTag[0]['ProductID'])));
    }
    
    function PriceTag_New() {
        global $mysql;
        $Units = $mysql->select("select * from _tbl_master_units where IsActive='1' order by UnitName");
        $rand = rand();
        $return = '
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="margin-bottom:0px">
                    <div class="card-body">
                        <form action="" method="post" name="form_newprice_'.$rand.'" id="form_newprice_'.$rand.'">
                            <input type="hidden" value="'.$_GET['rand'].'" name="ProductID" id="ProductID">
                            <div class="form-group form-show-validation row">
                                <div class="col-sm-3" style="padding-left:0px">
                                    <label for="name">Unit<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="Units" name="Units" placeholder="Units">
                                </div>
                                <div class="col-sm-3" style="padding-left:0px;padding-right:0px">
                                    <label for="name">&nbsp;</label>
                                    <select class="form-control" name="UnitID" id="UnitID">
                                        <option value="0">Select Unit</option>';
                                        foreach($Units as $Unit) {
                                            $return .= '<option value="'.$Unit['UnitID'].'">'.$Unit['UnitName'].'</option>';
                                        }
                                $return .= '</select>
                            </div> ';
                            if (BrandSize) {
                            $BrandSizes=$mysql->select("select * from _tbl_brand_size where IsActive='1'");  
                            $return .= '<div class="col-sm-6" style="padding-right:0px">
                                <label for="name">&nbsp;</label>
                                <?php ?>
                                <select class="form-control" name="BrandSizeID" id="BrandSizeID">
                                    <option value="0">Select Size</option>';
                                    foreach($BrandSizes as $BrandSize) { 
                                        $return .= '<option value="'.$BrandSize['SizeID'].'">'.$BrandSize['SizeText'].'</option>';
                                    }
                                $return .= '</select>
                            </div>';
                            }
                        $return .= '</div>
                       
                        <div class="form-group form-show-validation row">
                            <div class="col-3" style="padding-left:0px">
                                <label for="name">MRP<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="MRP" name="MRP" placeholder="MRP" value="" style="text-align:right">
                            </div>
                            <div class="col-3" style="padding-left:0px;padding-right:0px">
                                <label for="name">Selling Price<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="SellingPrice" name="SellingPrice" placeholder="Selling Price" value="" style="text-align:right">
                            </div>
                        </div> 
                        <div class="form-group form-show-validation row">
                            <label for="name">Description</label>
                            <input type="text" class="form-control" id="Description" name="Description" placeholder="Enter Description" value="">
                        </div>
                        <div class="form-group form-show-validation row" style="padding-left:0px;padding-right:0px;">
                           <div class="col-4">
                            <label for="name">Stock Available</label>         
                            <select class="form-control" id="IsStockAvailable" name="IsStockAvailable">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                           </div>
                             <div class="col-4">
                            <label for="name">Is Publish</label>
                            <select class="form-control" id="IsPublish" name="IsPublish">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                           </div>
                            <div class="col-4">
                            <label for="name">Avl. Qty</label>
                            <input type="text" class="form-control" id="AvlQty" name="AvlQty" placeholder="Enter Avai.Qty" value="0" style="text-align: right;">  
                           </div>
                        </div> 
                        <div class="form-group form-show-validation row" style="text-align: right;">
                            <input type="Button"  data-dismiss="modal" value="Cancel" name="" class="btn btn-gray btn-sm">&nbsp;&nbsp;
                            <input type="button" onclick="doPriceTagValidate(\''.$rand.'\',\'save\')" value="Add" name="AddBtn" class="btn btn-primary btn-sm">&nbsp;&nbsp;
                            <span style="color:red;padding-top: 5px;padding-left:20px;" id="ErrMessage"></span>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>';
    return $return;
    }  
    
    
    function PriceTag_Save() {
        global $mysql;
        
         $BrandSizeID   = "0";
                                    $BrandSizeText = "";
                                    
                                    if (BrandSize) {
                                        $BrandSizes    = $mysql->select("select * from _tbl_brand_size Where SizeID='".$_POST['BrandSizeID']."'");
                                        $BrandSizeID   = $_POST['BrandSizeID'];
                                        $BrandSizeText = $BrandSizes[0]['SizeText'];
                                    }
                                   
                                    $Units = $mysql->select("select * from _tbl_master_units where UnitID='".$_POST['UnitID']."'");
                                    $PriceCount = $mysql->select("select * from _tbl_products_prices where ProductID='".$_POST['ProductID']."'");
                                 $id =   $mysql->insert("_tbl_products_prices",array("ProductID"         => $_POST['ProductID'],
                                                                                "UnitID"            => $_POST['UnitID'],
                                                                                "Units"             => $_POST['Units'],
                                                                                "UnitName"          => $Units[0]['UnitName'],
                                                                                "MRP"               => $_POST['MRP'],
                                                                                "SellingPrice"      => $_POST['SellingPrice'],
                                                                                "Description"       => $_POST['Description'],
                                                                                "ListOrder"         => (sizeof($PriceCount)+1),
                                                                                "IsDelete"          => "0",
                                                                                "IsStockAvailable"  => $_POST['IsStockAvailable'],
                                                                                "IsPublish"         => $_POST['IsPublish'],
                                                                                "AvlQty"            => $_POST['AvlQty'],
                                                                                "BrandSizeID"       => $BrandSizeID,
                                                                                "BrandSizeText"     => $BrandSizeText,
                                                                                "AddedOn"           => date("Y-m-d H:i:s")));
                                                                                
         if ($id>0) {
             
             
                                
              return json_encode(array("status"=>"success","message"=>"Price Tag Successfully Added","Content"=>PriceTag_List($_POST['ProductID'])));
         }  else {
             return json_encode(array("status"=>"failure","message"=>"Error Adding Product"));
         }
    }   
    
    
    
    function PriceTag_List($ProductID="") {
        
        
        global $mysql;
        $ProductID = ($ProductID=="") ? $_GET['ProductID']  : $ProductID;
        $Prices = $mysql->select("select * from _tbl_products_prices where ProductID='".$ProductID."' order by ListOrder*1"); 
             
             $Content = '
             <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: left;">Units</th>';
                        if (BrandSize) { 
                            $Content .= '<th scope="col" style="text-align: left;">Size</th>';
                        }
                        $Content .='
                        <th scope="col" style="text-align: right;">MRP</th>
                        <th scope="col" style="text-align: right;">Selling Price</th>
                        <th scope="col" style="text-align: right;">Stock</th>
                        <th scope="col" style="text-align: right;">Visible</th>
                        <th scope="col" style="text-align: right;">List Order</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>';
                foreach($Prices as $Price) { 
                    $Content .='
                    <tr>
                        <td>'.$Price['Units'].' '.$Price['UnitName'].'</td>';
                        if (BrandSize) {
                            $Content .='<td>'.$Price['BrandSizeText'].'</td>';
                        }
                    $Content .='
                    <td style="text-align: right">'.number_format($Price['MRP'],2).'</td>
                    <td style="text-align: right">'.number_format($Price['SellingPrice'],2).'</td>
                    <td style="text-align: right">'.(($Price['IsStockAvailable']=='1') ? '<i style="color:green" class="fa fa-check" aria-hidden="true"></i>':'<i style="color:red" class="fa fa-times" aria-hidden="true"></i>').'</td>
                    <td style="text-align: right">'.(($Price['IsPublish']=='1') ? '<i style="color:green" class="fa fa-check" aria-hidden="true"></i>':'<i style="color:red" class="fa fa-times" aria-hidden="true"></i>').'</td>
                    <td style="text-align: right">'.$Price['ListOrder'].'</td>
                    <td style="text-align: right">                                                   
                        <div class="dropdown dropdown-kanban" style="float: right;">
                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                <i class="icon-options-vertical"></i>
                            </button>                                                                                                        
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" draggable="false" href="javascript:void(0)" onclick="PriceTag_Edit(\''.md5($Price['PriceTagID']).'\')">Edit</a>
                                <a class="dropdown-item" draggable="false"><span onclick="CallConfirmationDeletePrice(\''.$Price['PriceTagID'].'\')" class="btn btn-danger btn-sm" style="padding: 0px 10px;font-size: 10px;">Delete</span></a>
                            </div>
                        </div>
                    </td>
                </tr>';
             } 
             $Content .='</tbody>
                          </table>';
             return $Content;
    }
       ?>