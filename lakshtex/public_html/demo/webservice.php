<?php
include_once("config.php");
    echo $_REQUEST['action']();
    

function DeleteProductImage(){
    global $mysql;
    $Product = $mysql->select("select * from _tbl_product_additional_image where ProductImageID  ='".$_POST['ProductImageID']."'");
     $mysql->execute("DELETE FROM _tbl_product_additional_image  where ProductImageID  ='".$_POST['ProductImageID']."'");
  
        $result = array();
        $result['status']="Success";
        $result['message']="Image Deleted Successfully";
        $result['ProductID']=md5($Product[0]['ProductID']);
        return json_encode($result);
   
}
function DeleteBrand(){
    global $mysql;
     $Products = $mysql->select("select * from _tbl_products where BrandID='".$_POST['BrandID']."'");
     if(sizeof($Products)==0){
    
        $mysql->execute("DELETE FROM _tbl_brands where BrandID  ='".$_POST['BrandID']."'");
  
        $result = array();
        $result['status']="Success";
        $result['message']="Brand Deleted Successfully";
        return json_encode($result);
   
   }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Brand Name Already Used In Products";
        return json_encode($result);
   }
}                                                                                        
function DeleteProduct() {
    
    global $mysql;
    
      $id=$mysql->execute("DELETE FROM _tbl_products where ProductID='".$_POST['ProductID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Product Deleted.";  
        return json_encode($result);
    
    }    
function DeleteCategory(){
    global $mysql;
     $SubCategorys = $mysql->select("select * from _tbl_sub_category where CategoryID='".$_POST['CategoryID']."'");
     if(sizeof($SubCategorys)==0){
    
        $mysql->execute("DELETE FROM _tbl_category where CategoryID  ='".$_POST['CategoryID']."'");
  
        $result = array();
        $result['status']="Success";
        $result['message']="Category Deleted Successfully";
        return json_encode($result);
   
   }else {
        $result = array();
        $result['status']="failure";
        $result['message']="Category Name Already Used In Sub Category";
        return json_encode($result);
   }
}
function DeleteSubCategory() {
    
    global $mysql;
    
      $id=$mysql->execute("DELETE FROM _tbl_sub_category where SubCategoryID='".$_POST['SubCategoryID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Sub Category Deleted Successfully";  
        return json_encode($result);
    
    } 
   
   function getMainCategory() {
       
       global $mysql;
       
       $categories = $mysql->select("select * from _tbl_category order by CategoryName");
       if (sizeof($categories)==0) {
           return "";
       }
       
       $html = '<select class="form-control" name="Category" id="Category" style="width:100%">';
       
       if($_REQUEST['fr']!="category"){
           $html.='<option value="0" selected="selected">Category Name</option>';
       }
       
        if ($_REQUEST['fr']=="category"){
            
            foreach($categories as $r) {
                if ($_REQUEST['CategoryID'] == $r['CategoryID']){   
                    $html .= '<option value="'.$r['CategoryID'].'" '.(($_REQUEST['CategoryID']== $r['CategoryID']) ? "selected='selected'" : "").'>'.$r['CategoryName'].'</option>';
                }  
            }
        
        } else {
            
            foreach($categories as $r) {
                if(isset($_REQUEST['CategoryID'])){   
                    $html .= '<option value="'.$r['CategoryID'].'" '.(($_REQUEST['CategoryID']== $r['CategoryID']) ? "selected='selected'" : "").'>'.$r['CategoryName'].'</option>';
                } else {
                    $html .= '<option value="'.$r['CategoryID'].'">'.$r['CategoryName'].'</option>'; 
                }
            }
       }
       
       $html .= '</select>';
       return $html;
   }
   function getSubCategory() {
       
       global $mysql;
       
       $subcategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$_REQUEST['CategoryID']."' order by SubCategoryName");
       if (sizeof($subcategories)==0) {
           return "";
       }
       
       $html = '<select class="form-control" name="SubCategory" id="SubCategory" style="width:100%">';
       
       if($_REQUEST['fr']!="category"){
           $html.='<option value="0" selected="selected">Select Sub Category Name</option>';
       }
       
        if ($_REQUEST['fr']=="category"){
            
            foreach($subcategories as $r) {
                if ($_REQUEST['SubCategoryID'] == $r['SubCategoryID']){   
                    $html .= '<option value="'.$r['SubCategoryID'].'" '.(($_REQUEST['SubCategoryID']== $r['SubCategoryID']) ? "selected='selected'" : "").'>'.$r['SubCategoryName'].'</option>';
                }  
            }
        
        } else {
            
            foreach($subcategories as $r) {
                if(isset($_REQUEST['SubCategoryID'])){   
                    $html .= '<option value="'.$r['SubCategoryID'].'" '.(($_REQUEST['SubCategoryID']== $r['SubCategoryID']) ? "selected='selected'" : "").'>'.$r['SubCategoryName'].'</option>';
                } else {
                    $html .= '<option value="'.$r['SubCategoryID'].'">'.$r['SubCategoryName'].'</option>'; 
                }
            }
       }
       
       $html .= '</select>';
       return $html;
   } 
   
   function DeleteSlider() {
    
    global $mysql;
    
      $id=$mysql->execute("DELETE FROM _tbl_sliders where SliderID='".$_POST['SliderID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Slider Deleted Successfully";  
        return json_encode($result);
    
    }       
   function addtocart(){
        global $mysql;
             $e=0; 
             $subtotal=0;
             foreach($_SESSION['items'] as $item) {
                 $subtotal += $item['Price']*$item['Qty'];
                 if ($item['ProductID']==$_POST['ProductID']) {
                                                                                          
                     $e++;
                 }
             }
            if ($e==0)  {
                if($_POST['ProductID']>0){
                    $Products = $mysql->select("select * from _tbl_products where ProductID='".$_POST['ProductID']."'");
                    $_SESSION['items'][] = array("ProductID"    => $Products[0]['ProductID'],
                                                 "ProductCode"    => $Products[0]['ProductCode'],
                                                 "ProductIDen"  => md5($Products[0]['ProductID']),
                                                 "ProductName"  => $Products[0]['ProductName'],
                                                 "ProductImage" => $Products[0]['ProductImage'],
                                                 "Price"        => $Products[0]['SellingPrice'],
                                                 "Qty"          => $_POST['qty'],
                                                 "Size"         => $_POST['BrandSize']
                                                 );    
                    $result=array("items"=>$_SESSION['items'],"IsCart"=>"1","subtotal"=>number_format($subtotal+($_POST['qty']*$Products[0]['SellingPrice']),2));
                } else{
                    $result=array("items"=>$_SESSION['items'],"subtotal"=>number_format($subtotal,2),"IsCart"=>"0");
                }
            } else {
              $result=array("items"=>$_SESSION['items'],"subtotal"=>number_format($subtotal,2),"IsCart"=>"0");
                                                                                                                                                                                                
            }
           return json_encode($result); 
    } 
    function RemoveItem(){
        global $mysql;
         $temp=array();
         $subtotal=0;
        foreach($_SESSION['items'] as $item) {
                 if ($item['ProductID']!=$_GET['ProductID']) {
                    $subtotal += $item['Price']*$item['Qty']; 
                    $temp[]=$item;  
                 }
             }
        $_SESSION['items']= $temp;
        $result=array("items"=>$_SESSION['items'],"subtotal"=>$subtotal);
        return json_encode($result);      
    }
    function CalcualteCartTotal(){
        global $mysql;
         $temp=array();
        foreach($_SESSION['items'] as $item) {
            if ($item['ProductID']==$_REQUEST['ProductID']) {
                $item['Qty']=$_REQUEST['qty']; 
                $subtotal += $item['Price']*$item['Qty']; 
                $temp[]=$item;  
            }else {
                $subtotal += $item['Price']*$item['Qty']; 
                $temp[]=$item;  
            }
                 
        }
        $_SESSION['items']= $temp;
        $result=array("items"=>$_SESSION['items'],"subtotal"=>number_format($subtotal,2));
        return json_encode($result);      
    }    
    function Register(){
        global $mysql;
        $dupMobile = $mysql->select("select * from _tbl_customer where MobileNumber='".$_POST['MobileNumber']."'");
            if(sizeof($dupMobile)>0){
                $ErrorCount++;
                $result = array();
                $result['status']="failure";
                $result['message']="Mobile Number Already Exist<br>";  
                return json_encode($result);
            }
            $dupemail = $mysql->select("select * from _tbl_customer where EmailID='".$_POST['EmailID']."'");
            if(sizeof($dupemail)>0){
                $ErrorCount++;
                $result = array();
                $result['status']="failure";
                $result['message']="Email ID Already Exist<br>";  
                return json_encode($result);
            }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _tbl_customer")) + 1;
                   $UserCode ="CSTMR0000".$random;
                   
              $id = $mysql->insert("_tbl_customer",array("CustomerCode" => $UserCode,
                                                         "CustomerName" => $_POST['Name'],
                                                         "EmailID"      => $_POST['EmailID'],
                                                         "MobileNumber" => $_POST['MobileNumber'],
                                                         "Password"     => $_POST['Password'],
                                                         "CreatedOn"    => date("Y-m-d H:i:s")));
            
              
            if($id>0){
                $user = $mysql->select("select * from _tbl_customer where CustomerID='".$id."'");
                $_SESSION['User'] = $user[0];
                $message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="" style="height:30px;">&nbsp;&nbsp;
                            <img src="" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Welcome '.$_SESSION['User']['CustomerName'].',
                            <br><br>
                            Your Account Created Successfully<br>Your ID is '.$_SESSION['User']['CustomerCode'].'.
                            <br><br>
                            <br> 
                            Thanks <br>
                            
                        </div>
                    </div>';

                    $mparam['MailTo']=$_SESSION['User']['EmailID'];
                    $mparam['CustomerID']=$_SESSION['User']['CustomerID'];
                    $mparam['Subject']="Account Created";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError); 
                $result = array();
                $result['status']="Success";
                $result['Name']=$user[0]['CustomerName'];
                $result['Mobile']=$user[0]['MobileNumber'];
                $result['Email']=$user[0]['EmailID'];
                $result['message']="Registered Successfully<br>";  
                return json_encode($result);                                        
            }
    }
    } 
    function Login(){
        global $mysql;
        $userdata = $mysql->select("select * from _tbl_customer where EmailID='".$_POST['EmailID']."' and Password='".$_POST['Password']."' ");
            if (sizeof($userdata)>0) {
                $_SESSION['User']=$userdata[0];
                $_SESSION['User']['Role']="User";
                $result = array();
                $result['status']="Success";
                $result['Name']=$userdata[0]['CustomerName'];
                $result['Mobile']=$userdata[0]['MobileNumber'];
                $result['Email']=$userdata[0]['EmailID'];
                $result['message']="Login Successfully<br>";  
                return json_encode($result);
            }  else {
                $result = array();
                $result['status']="failure";
                $result['message']="Invalid Login Details<br>";  
                return json_encode($result);
            }
    } 
    function SaveBillingInfo(){
        global $mysql;
        
        $_SESSION['Billing'] = array("AddressLine1"    => $_POST['AddressLine1'],
                                     "AddressLine2"    => $_POST['AddressLine2'],
                                     "AddressLine3"    => $_POST['AddressLine3'],
                                     "PostalCode"      => $_POST['PostalCode'],
                                     "LandMark"        => $_POST['LandMark']);     
        $result=array("Billing"=>$_SESSION['Billing']);
        return json_encode($result);
    } 
    function ChangeBillingInfo(){
        global $mysql;
        $result=array("Billing"=>$_SESSION['Billing']);
        return json_encode($result);    
    }
    function PlaceOrder(){
        global $mysql;
        $random = sizeof($mysql->select("select * from invoice_order")) + 1;
        $OrderCode ="ORD0000".$random;
        $id = $mysql->insert("invoice_order",array("OrderCode"             => $OrderCode,
                                                   "CustomerID"            => $_SESSION['User']['CustomerID'],
                                                   "CustomerName"          => $_SESSION['User']['CustomerName'],
                                                   "CustomerEmailID"       => $_SESSION['User']['EmailID'],
                                                   "CustomerMobileNumber"  => $_SESSION['User']['MobileNumber'],
                                                   "BillingAddress1"       => $_SESSION['Billing']['AddressLine1'],
                                                   "BillingAddress2"       => $_SESSION['Billing']['AddressLine2'],
                                                   "BillingAddress3"       => $_SESSION['Billing']['AddressLine3'],
                                                   "BillingPincode"        => $_SESSION['Billing']['PostalCode'],
                                                   "BillingLandMark"       => $_SESSION['Billing']['LandMark'],
                                                   "OrderDate"             => date("Y-m-d H:i:s")));
        
             $subtotal=0;
             foreach($_SESSION['items'] as $item) { 
                 $subtotal+=$item['Qty']*$item['Price'];
              $mysql->insert("invoice_order_item",array("order_id"               => $id,
                                                        "item_code"              => $item['ProductID'],
                                                        "item_name"              => $item['ProductName'],
                                                        "item_description"       => "Size: ".$item['Size'],
                                                        "order_item_quantity"    => $item['Qty'],
                                                        "order_item_price"       => $item['Price'],
                                                        "order_item_final_amount"=> $subtotal));
              $qry = $mysql->qry;
             }
             $mysql->execute("update invoice_order set OrderTotal='".$subtotal."' where order_id='".$id."'"); 
               $q=$mysql->qry;
              $Sid = $mysql->insert("_tbl_order_status",array("OrderID"   => $id,
                                                             "OrderCode" => $OrderCode,
                                                             "Status"    => "Order Placed",
                                                             "StatusOn"  => date("Y-m-d H:i:s")));  
              $statuses = $mysql->select("select * from _tbl_order_status where OrderID='".$id."' order by StatusID desc");
            $inmessage = '
                    <div class="card card-invoice" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
                        <div class="card-header" style="border-radius: 0px;padding: 50px 0px 20px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;">
                            <div class="invoice-header" style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;margin-bottom: 15px;">
                                <h3 class="invoice-title" style="font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;">
                                    Order
                                </h3>
                            </div>
                            <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Customer Details</h5>
                                        <b>'.$_SESSION['User']['CustomerName'].'</b><br>
                                        '.$_SESSION['User']['EmailID'].'<br>
                                        '.$_SESSION['User']['MobileNumber'].'<br>
                                        '.$_SESSION['User']['BillingAddress1'].'<br>';
                                            if($_SESSION['User']['BillingAddress2']!=""){ $inmessage .= ''.$_SESSION['User']['BillingAddress2'].'<br>'; }
                                            if($_SESSION['User']['BillingAddress3']!=""){ $inmessage .= ''.$_SESSION['User']['BillingAddress3'].'<br>'; }
                                        $message .= 'Zip/PinCode: '.$order[0]['BillingPincode'].'<br>
                                        Land-Mark: '.$_SESSION['Billing']['LandMark'].'<br><br>    
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Order Details</h5>
                                        '."Order Number: ".$OrderCode.'<br>
                                        '.date("M d, Y H:i").'<br>
                                        <span style="font-weight: bold;color:red">'.$statuses[0]['Status'].'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="card-body" style="padding: 0;border: 0px !important;width: 75%;margin: auto;flex: 1 1 auto;">
                        <div class="separator-solid" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                        <div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                            <div class="col-md-12" style="flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                <div class="invoice-detail" style="width: 100%;display: block;">
                                    <div class="invoice-top">
                                        <h3 class="title" style="font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;"><strong style="font-weight: 600;">Order summary</strong></h3>
                                    </div>
                                    <div class="invoice-item">
                                        <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                            <table class="table table-striped">
                                                <thead>                                                                   
                                                    <tr>
                                                        <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Item Code<br>&nbsp;</th>
                                                        <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Item Name<br>&nbsp;</th>
                                                        <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">Price<br><span style="font-size:11px"> ( INR ) </span></th>
                                                        <th style="text-align:right;font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Quantity<br>&nbsp;</th>
                                                        <th style="text-align:right;font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Total<br><span style="font-size:11px"> ( INR ) </span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                                $subtotal=0;
                                                    foreach($_SESSION['items'] as $item){ 
                                                    $product=$mysql->select("select * from _tbl_products where ProductID='".$item['ProductID']."'");
                                                    $subtotal+=$item['Qty']*$item['Price'];
                                                    
                                                        $inmessage .= '<tr>
                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;">'.$product[0]['ProductCode'].'</td>
                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;">'.$item['ProductName'].'<br><span style="font-weight:normal">Ize: '.$item['Size'].'</span></td>
                                                            <td style="text-align:right">'.number_format($item['Price'],2).'</td>
                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">'.$item['Qty'].'</td>
                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">'.number_format($item['Qty']*$item['Price'],2).'</td>
                                                        </tr>';
                                                     }
                                                      $inmessage .= '<tr>
                                                            <td colspan="4" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">Sub Total ( INR )</td>
                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right"> '.number_format($subtotal,2).'</td> 
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>    
                                <div class="separator-solid  mb-3" style="border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;"></div>
                            </div>    
                        </div>
                    </div>
                        <div class="card-footer" style="padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);">
                            <div class="row" style="display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;">
                                <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to" style="margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                    
                                </div>
                                <div class="col-sm-5 col-md-7 transfer-total" style="text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                    <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;">Total Amount</h5>
                                    <div class="price" style="font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;"><span style="font-size: 14px;">INR&nbsp;</span>'.number_format($subtotal,2).'</div>
                                </div>
                            </div>
                            <div class="separator-solid" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                                <div class="col-sm-12" style="max-width: 100%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                    <h5 class="sub" style="margin-bottom:0px;font-size: 14px;font-weight: 600;line-height: 1.4;">Order Staus</h5>
                                    <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Status</th>
                                                    <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Status On</th>
                                                    <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Reason</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                                $statuses = $mysql->select("select * from _tbl_order_status where OrderID='".$id."' order by StatusID desc");
                                                 foreach($statuses as $status){ 
                                                    $inmessage .= '<tr>
                                                        <td style="height: auto !important;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;vertical-align: middle !important;">'.$status['Status'].'</td>
                                                        <td style="height: auto !important;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;vertical-align: middle !important;">'.date("M d, Y H:i",strtotime($status['StatusOn'])).'</td>
                                                        <td style="height: auto !important;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;vertical-align: middle !important;">'.$status['Remarks'].'</td>
                                                    </tr>';
                                                }
                                            $inmessage .= '</tbody>
                                        </table>
                                    </div>                                                                                                                                               
                                </div>
                        </div>
                    </div>';

                    $mparam['MailTo']=$_SESSION['User']['EmailID'];
                    $mparam['CustomerID']=$_SESSION['User']['CustomerID'];
                    $mparam['Subject']="Order Placed";
                    $mparam['Message']=$inmessage;
                    MailController::Send($mparam,$mailError);     
                $result=array("Status"=>"Success","OrderID"=>$OrderCode,"message"=>"Order Placed Successfully");     
                sleep(5);
                unset($_SESSION['items']);
                unset($_SESSION['Billing']);
             return json_encode($result);  
         
    } 
    function CancelOrder(){
        global $mysql;
            $result=array("Status"=>"Success","message"=>"Order Canceled Successfully");     
            sleep(5);
            unset($_SESSION['items']);
            unset($_SESSION['Billing']);
            return json_encode($result);  
         
    }
    function addtowishlist(){
        global $mysql;
            if(!(isset($_SESSION['User']['CustomerID']))){
                $result = array();
                $result['status']="failure";
                $result['message']="You Must Login to Add Whishlist";
                return json_encode($result);
            }else {
                $id = $mysql->insert("_tbl_whishlist",array("CustomerID"           => $_SESSION['User']['CustomerID'],
                                                            "WhislistedProductID" => $_REQUEST['ProductID'],
                                                            "WhishlishOn"         => date("Y-m-d H:i:s")));
                $result = array();
                $result['status']="success";
                $result['message']="Whishlist added successfully";
                return json_encode($result);
            }
    }
    function CancelOrderfrAdmin(){
        global $mysql;
        $order = $mysql->select("select * from invoice_order where order_id='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Order Cancelled",
                                                             "Remarks"   => $_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                   $mysql->execute("update invoice_order set OrderStatus='3' where order_id='".$_POST['OrderID']."'"); 
              
            if($id>0){
                $result = array();
                $result['status']="Success";
                $result['message']="Order Cancelled Successfully<br>";  
                return json_encode($result);                                        
            }
    }
    function ConfirmOrderfrAdmin(){
        global $mysql;
        $order = $mysql->select("select * from invoice_order where order_id='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Order Confirmed",
                                                             "Remarks"   => $_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                   $mysql->execute("update invoice_order set OrderStatus='2' where order_id='".$_POST['OrderID']."'"); 
              
            if($id>0){
                    $message = '
                        <div style="padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px">
                            <div style="border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;">
                                <div style="float: left;"> 
                                    <span style="color:#4d4b4b;font-weight: bold;font-size: 15px;">Order Information</span>
                                    <br>
                                    <span style="font-size: 12px;">#'.$order[0]['OrderCode'].'<br>
                                    '.date("d M, Y, H:i", strtotime($order[0]["OrderDate"])).'</span>
                                </div>
                                <div style="float: right;text-align:right"> 
                                    <h4 style="margin-top:0px;font-size:30px;margin-bottom:5px"><span style="font-size:12px">INR</span>&nbsp;'.$order[0]['OrderTotal'].'</h4>
                                    <a href="http://japps.online/ecommerce/vieworders.php?id='.md5($order[0]['order_id']).'" style="padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;">View Order</a>
                                </div>
                            </div>
                        </div> <br>
                        <div style="padding:5px;margin-left:20px;">
                            <h4 style="margin-top:0px;margin-bottom:0px">Status</h4>
                            <div style="margin-left: 20px;">Your Order ('.$order[0]['OrderCode'].')  confirmed<br>'.date("d M, Y, H:i").'</div>
                        </div>';

                    $mparam['MailTo']=$order[0]['CustomerEmailID'];
                    $mparam['CustomerID']=$order[0]['CustomerID'];
                    $mparam['Subject']="Your Order (".$order[0]['OrderCode'].") Confirmed";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);     
                
                $result = array();
                $result['status']="Success";
                $result['message']="Order Confirmed Successfully<br>";  
                return json_encode($result);                                        
            }
    }
    function ProcessOrderfrAdmin(){
        global $mysql;
        $order = $mysql->select("select * from invoice_order where order_id='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Order Processed",
                                                             "Remarks"   => $_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                   $mysql->execute("update invoice_order set OrderStatus='4' where order_id='".$_POST['OrderID']."'"); 
              
            if($id>0){
                $message = '
                        <div style="padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px">
                            <div style="border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;">
                                <div style="float: left;"> 
                                    <span style="color:#4d4b4b;font-weight: bold;font-size: 15px;">Order Information</span>
                                    <br>
                                    <span style="font-size: 12px;">#'.$order[0]['OrderCode'].'<br>
                                    '.date("d M, Y, H:i", strtotime($order[0]["OrderDate"])).'</span>
                                </div>
                                <div style="float: right;text-align:right"> 
                                    <h4 style="margin-top:0px;font-size:30px;margin-bottom:5px"><span style="font-size:12px">INR</span>&nbsp;'.$order[0]['OrderTotal'].'</h4>
                                    <a href="http://japps.online/ecommerce/vieworders.php?id='.md5($order[0]['order_id']).'" style="padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;">View</a>
                                </div>
                            </div>
                        </div> <br>
                        <div style="padding:5px;margin-left:20px;">
                            <h4 style="margin-top:0px;margin-bottom:0px">Status</h4>
                            <div style="margin-left: 20px;">Your Order ('.$order[0]['OrderCode'].') processed<br>'.date("d M, Y, H:i").'</div>
                        </div>';

                    $mparam['MailTo']=$order[0]['CustomerEmailID'];
                    $mparam['CustomerID']=$order[0]['CustomerID'];
                    $mparam['Subject']="Your Order (".$order[0]['OrderCode'].") Processed";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);
                    
                $result = array();
                $result['status']="Success";
                $result['message']="Order Processed Successfully<br>";  
                return json_encode($result);                                        
            }
    }
    function DispatchOrderfrAdmin(){
        global $mysql;
        $order = $mysql->select("select * from invoice_order where order_id='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Order Dispatched",
                                                             "Remarks"   => $_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                   $mysql->execute("update invoice_order set OrderStatus='5' where order_id='".$_POST['OrderID']."'"); 
              
            if($id>0){
                $message = '
                        <div style="padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px">
                            <div style="border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;">
                                <div style="float: left;"> 
                                    <span style="color:#4d4b4b;font-weight: bold;font-size: 15px;">Order Information</span>
                                    <br>
                                    <span style="font-size: 12px;">#'.$order[0]['OrderCode'].'<br>
                                    '.date("d M, Y, H:i", strtotime($order[0]["OrderDate"])).'</span>
                                </div>
                                <div style="float: right;text-align:right"> 
                                    <h4 style="margin-top:0px;font-size:30px;margin-bottom:5px"><span style="font-size:12px">INR</span>&nbsp;'.$order[0]['OrderTotal'].'</h4>
                                    <a href="http://japps.online/ecommerce/vieworders.php?id='.md5($order[0]['order_id']).'" style="padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;">View Order</a>
                                </div>
                            </div>
                        </div> <br>
                        <div style="padding:5px;margin-left:20px;">
                            <h4 style="margin-top:0px;margin-bottom:0px">Status</h4>
                            <div style="margin-left: 20px;">Your Order ('.$order[0]['OrderCode'].') Dispatched<br>'.date("d M, Y, H:i").'</div>
                        </div>';

                    $mparam['MailTo']=$order[0]['CustomerEmailID'];
                    $mparam['CustomerID']=$order[0]['CustomerID'];
                    $mparam['Subject']="Your Order (".$order[0]['OrderCode'].") Dispatched";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);
                $result = array();
                $result['status']="Success";
                $result['message']="Order Dispatched Successfully<br>";  
                return json_encode($result);                                        
            }
    }
    function DeliveredOrderfrAdmin(){
        global $mysql;
        $order = $mysql->select("select * from invoice_order where order_id='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Order Delivered",
                                                             "Remarks"   => $_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                   $mysql->execute("update invoice_order set OrderStatus='6' where order_id='".$_POST['OrderID']."'"); 
              
            if($id>0){
                $message = '
                        <div style="padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px">
                            <div style="border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;">
                                <div style="float: left;"> 
                                    <span style="color:#4d4b4b;font-weight: bold;font-size: 15px;">Order Information</span>
                                    <br>
                                    <span style="font-size: 12px;">#'.$order[0]['OrderCode'].'<br>
                                    '.date("d M, Y, H:i", strtotime($order[0]["OrderDate"])).'</span>
                                </div>
                                <div style="float: right;text-align:right"> 
                                    <h4 style="margin-top:0px;font-size:30px;margin-bottom:5px"><span style="font-size:12px">INR</span>&nbsp;'.$order[0]['OrderTotal'].'</h4>
                                    <a href="http://japps.online/ecommerce/vieworders.php?id='.md5($order[0]['order_id']).'" style="padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;">View Order</a>
                                </div>
                            </div>
                        </div> <br>
                        <div style="padding:5px;margin-left:20px;">
                            <h4 style="margin-top:0px;margin-bottom:0px">Status</h4>
                            <div style="margin-left: 20px;">Your Order ('.$order[0]['OrderCode'].') Delivered<br>'.date("d M, Y, H:i").'</div>
                        </div>';

                    $mparam['MailTo']=$order[0]['CustomerEmailID'];
                    $mparam['CustomerID']=$order[0]['CustomerID'];
                    $mparam['Subject']="Your Order (".$order[0]['OrderCode'].") Delivered";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);
                $result = array();
                $result['status']="Success";
                $result['message']="Order Delivered Successfully<br>";  
                return json_encode($result);                                        
            }
    } 
    function UnDeliveredOrderfrAdmin(){
        global $mysql;
        $order = $mysql->select("select * from invoice_order where order_id='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Order Delivered Failed",
                                                             "Remarks"   => $_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                   $mysql->execute("update invoice_order set OrderStatus='7' where order_id='".$_POST['OrderID']."'"); 
              
            if($id>0){
                $message = '
                        <div style="padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px">
                            <div style="border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;">
                                <div style="float: left;"> 
                                    <span style="color:#4d4b4b;font-weight: bold;font-size: 15px;">Order Information</span>
                                    <br>
                                    <span style="font-size: 12px;">#'.$order[0]['OrderCode'].'<br>
                                    '.date("d M, Y, H:i", strtotime($order[0]["OrderDate"])).'</span>
                                </div>
                                <div style="float: right;text-align:right"> 
                                    <h4 style="margin-top:0px;font-size:30px;margin-bottom:5px"><span style="font-size:12px">INR</span>&nbsp;'.$order[0]['OrderTotal'].'</h4>
                                    <a href="http://japps.online/ecommerce/vieworders.php?id='.md5($order[0]['order_id']).'" style="padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;">View Order</a>
                                </div>
                            </div>
                        </div> <br>
                        <div style="padding:5px;margin-left:20px;">
                            <h4 style="margin-top:0px;margin-bottom:0px">Status</h4>
                            <div style="margin-left: 20px;">Your Order ('.$order[0]['OrderCode'].') failed to delivered<br>'.date("d M, Y, H:i").'</div>
                        </div>';

                    $mparam['MailTo']=$order[0]['CustomerEmailID'];
                    $mparam['CustomerID']=$order[0]['CustomerID'];
                    $mparam['Subject']="Your Order (".$order[0]['OrderCode'].") Failed to Delivered";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);
                $result = array();
                $result['status']="Success";
                $result['message']="Order Un Delivered <br>";  
                return json_encode($result);                                        
            }
    }function PaidOrderfrAdmin(){
        global $mysql;
        $order = $mysql->select("select * from invoice_order where order_id='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Payment Received",
                                                             "Remarks"   => $_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                     
                   $mysql->execute("update invoice_order set IsPaid='1',InvoiceID='".$id."' where order_id='".$_POST['OrderID']."'"); 
                   
                   $random = sizeof($mysql->select("select * from tbl_invoice")) + 1;
                   $InvoiceCode ="INV0000".$random;
                      $Iid = $mysql->insert("tbl_invoice",array("OrderID"               => $order[0]['order_id'],
                                                               "OrderCode"             => $order[0]['OrderCode'],
                                                               "OrderDate"             => $order[0]['OrderDate'],
                                                               "InvoiceCode"           => $InvoiceCode,
                                                               "CustomerID"            => $order[0]['CustomerID'],
                                                               "CustomerName"          => $order[0]['CustomerName'],
                                                               "CustomerEmailID"       => $order[0]['CustomerEmailID'],
                                                               "CustomerMobileNumber"  => $order[0]['CustomerMobileNumber'],
                                                               "BillingAddress1"       => $order[0]['BillingAddress1'],
                                                               "BillingAddress2"       => $order[0]['BillingAddress2'],
                                                               "BillingAddress3"       => $order[0]['BillingAddress3'],
                                                               "BillingPincode"        => $order[0]['BillingPincode'],
                                                               "BillingLandMark"       => $order[0]['BillingLandMark'],
                                                               "InvoiceTotal"          => $order[0]['OrderTotal'],
                                                               "InvoiceDate"           => date("Y-m-d H:i:s")));
                    
                         $items = $mysql->select("select * from invoice_order_item where order_id='".$order[0]['order_id']."'");
                         $subtotal=0;
                         foreach($items as $item){  
                             $subtotal+=$item['Qty']*$item['Price'];
                           $mysql->insert("_tbl_invoice_item",array("OrderID"                   => $order[0]['order_id'],
                                                                    "InvoiceID"                 => $Iid,
                                                                    "item_code"                 => $item['item_code'],
                                                                    "item_name"                 => $item['item_name'],
                                                                    "item_description"          => $item['item_description'],
                                                                    "invoice_item_quantity"     => $item['order_item_quantity'],
                                                                    "invoice_item_price"        => $item['order_item_price'],
                                                                    "invoice_item_final_amount" => $item['order_item_final_amount']));
                         }
                   
                         $mysql->insert("_tbl_order_status",array("OrderID"   => $order[0]['order_id'],
                                                                  "OrderCode" => $order[0]['OrderCode'],
                                                                  "Status"    => "Invoice Generated #".$InvoiceCode,
                                                                  "Remarks"   => $_POST['Remarks'],
                                                                  "StatusOn"  => date("Y-m-d H:i:s")));
              
            if($id>0){
                
                $message = '
                        <div style="padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px">
                            <div style="border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;">
                                <div style="float: left;"> 
                                    <span style="color:#4d4b4b;font-weight: bold;font-size: 15px;">Order Information</span>
                                    <br>
                                    <span style="font-size: 12px;">#'.$order[0]['OrderCode'].'<br>
                                    '.date("d M, Y, H:i", strtotime($order[0]["OrderDate"])).'</span>
                                </div>
                                <div style="float: right;text-align:right"> 
                                    <h4 style="margin-top:0px;font-size:30px;margin-bottom:5px"><span style="font-size:12px">INR</span>&nbsp;'.$order[0]['OrderTotal'].'</h4>
                                    <a href="http://japps.online/ecommerce/vieworders.php?id='.md5($order[0]['order_id']).'" style="padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;">View Order</a>
                                </div>
                            </div>
                        </div> <br>
                        <div style="padding:5px;margin-left:20px;">
                            <h4 style="margin-top:0px;margin-bottom:0px">Status</h4>
                            <div style="margin-left: 20px;">Your Order ('.$order[0]['OrderCode'].') Payment Received INR&nbsp;'.$order[0]['OrderTotal'].'<br>'.date("d M, Y, H:i").'<br>Invoice ID: #'.$InvoiceCode.'</div>
                        </div>';


                    $mparam['MailTo']=$order[0]['CustomerEmailID'];
                    $mparam['CustomerID']=$order[0]['CustomerID'];
                    $mparam['Subject']="Your Order (".$order[0]['OrderCode'].") Payment Received";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);     
                    
                $inmessage = '
                        <div class="card card-invoice" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
                            <div class="card-header" style="border-radius: 0px;padding: 50px 0px 20px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;">
                                <div class="invoice-header" style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;margin-bottom: 15px;">
                                    <h3 class="invoice-title" style="font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;">
                                        Invoice
                                    </h3>
                                </div>
                                <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                    <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                        <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                            <h5 style="margin-bottom:0px;font-weight: bold;">Customer Details</h5>
                                            <b>'.$order[0]['CustomerName'].'</b><br>
                                            '.$order[0]['BillingAddress1'].'<br>';
                                            if($Invoice[0]['BillingAddress2']!=""){ $inmessage .= ''.$order[0]['BillingAddress2'].'<br>'; }
                                            if($Invoice[0]['BillingAddress3']!=""){ $inmessage .= ''.$order[0]['BillingAddress3'].'<br>'; }
                                             $inmessage .= 'Zip/PinCode: '.$order[0]['BillingPincode'].'<br>
                                            Land-Mark: '.$order[0]['BillingLandMark'].'<br><br>
                                            '.$order[0]['CustomerEmailID'].'<br>
                                            '.$order[0]['CustomerMobileNumber'].'<br>    
                                        </div>
                                        <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                            <h5 style="margin-bottom:0px;font-weight: bold;">Invoice Details</h5>
                                            Invoice Number: '."#".$InvoiceCode.'<br>
                                            Invoice Date: '.date("M d, Y H:i").'<br><br>
                                            <h5 style="margin-bottom:0px;font-weight: bold;">Order Details</h5>
                                            Order Number: '."#".$order[0]['OrderCode'].'<br>
                                            Order Date: '.date("M d, Y H:i",strtotime($order[0]['OrderDate'])).'<br>
                                            <span style="font-weight: bold;color:red">'.$Stts[0]['Status'].'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="padding: 0;border: 0px !important;width: 75%;margin: auto;flex: 1 1 auto;">
                            <div class="separator-solid" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                                <div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                                    <div class="col-md-12" style="flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                        <div class="invoice-detail" style="width: 100%;display: block;">
                                            <div class="invoice-top">
                                                <h3 class="title" style="font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;"><strong style="font-weight: 600;">Invoice summary</strong></h3>
                                            </div>
                                            <div class="invoice-item">
                                                <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Item Code<br>&nbsp;</th>
                                                                <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Item Name<br>&nbsp;</th>
                                                                <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">Price<br><span style="font-size:11px"> ( INR ) </span></th>
                                                                <th style="text-align:right;font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Quantity<br>&nbsp;</th>
                                                                <th style="text-align:right;font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Total<br><span style="font-size:11px"> ( INR ) </span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                                        $items = $mysql->select("select * from invoice_order_item where order_id='".$order[0]['order_id']."'");
                                                        $subtotal=0;
                                                            foreach($items as $item){ 
                                                            $product=$mysql->select("select * from _tbl_products where ProductID='".$item['item_code']."'");
                                                            $subtotal+=$item['order_item_quantity']*$item['order_item_price'];
                                                            
                                                                $inmessage .= '<tr>
                                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;">'.$product[0]['ProductCode'].'</td>
                                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;">'.$item['item_name'].'<br><span style="font-weight:normal">'.$item['item_description'].'</span></td>
                                                                    <td style="text-align:right">'.number_format($item['order_item_price'],2).'</td>
                                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">'.$item['order_item_quantity'].'</td>
                                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">'.number_format($item['order_item_quantity']*$item['order_item_price'],2).'</td>
                                                                </tr>';
                                                             }
                                                              $inmessage .= '<tr>
                                                                    <td colspan="4" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">Sub Total ( <i class="fas fa-rupee-sign"></i> )</td>
                                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right"> '.number_format($subtotal,2).'</td> 
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>                                    
                                            </div>
                                        </div>    
                                        <div class="separator-solid  mb-3" style="border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;"></div>
                                    </div>    
                                </div>
                            </div>
                            <div class="card-footer" style="padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);">
                                <div class="row" style="display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;">
                                    <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to" style="margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                    </div>
                                    <div class="col-sm-5 col-md-7 transfer-total" style="text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                                        <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;">Total Amount</h5>
                                        <div class="price" style="font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;"><span style="font-size: 14px;">INR&nbsp;</span>'.number_format($subtotal,2).'</div>
                                    </div>
                                </div>
                                <div class="separator-solid" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                                    
                            </div>
                        </div>';

                    $mparam['MailTo']=$order[0]['CustomerEmailID'];
                    $mparam['CustomerID']=$order[0]['CustomerID'];
                    $mparam['Subject']="Order Invoiced";
                    $mparam['Message']=$inmessage;
                    MailController::Send($mparam,$mailError);
                
                $result = array();
                $result['status']="Success";
                $result['message']="Order Paid <br>";  
                return json_encode($result);                                        
            }
    }
?>
 