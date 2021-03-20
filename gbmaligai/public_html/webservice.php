<?php
include_once("config.php");
 
    echo $_REQUEST['action']();
    
  
  
 function ajaxSearch() {
      global $mysql;
      $products = $mysql->select("select * from _tbl_products where ProductName like '%".$_POST['text_search']."%'  and IsActive='1'");
      
      $result['success']=true;

    $result_html = "done"; 
   
    $result_html  = '<ul class="ajax-result-list">
    <li class="ajax-result-item">
    <div class="product-info col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <a class="product-image col-lg-4 col-sm-3 col-xs-4" href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=42&amp;search=apple&amp;category_id=0">
    <div class="product-image">
    <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/product/01-700x700.png" alt="Apple Cinema 30&quot;" class="img-responsive center-block" />
    </div>
    </a>
    <div class="detail col-lg-8 col-sm-9 col-xs-8">
    <h2 class="product-name">
    <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=42&amp;search=apple&amp;category_id=0">Apple Cinema 30&quot;</a>
    </h2>                        <p class="list-des">Maecenas ullamcorper ut augue non porttitor. Etiam euismod, lorem vel interdum condimentum, lacus qu..</p>
    <div class="price-box">
    <p class="old-price"><span class="sprice">$122.00</span></p>
    <p class="special-price"><span class="sprice"></span></p>
    </div>
    </div>
    </div>
    </li>
    </ul>';   
    
    $result_html  = '<ul class="ajax-result-list">';
   //<a href="p'.$product['ProductID'].'_'.parseStringForURL($product['ProductName']).'"> 
    foreach($products as $product) {
        $result_html .= '<li class="ajax-result-item">
                            <div class="product-info col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:10px 0px !important">
                                <!--<a class="product-image col-lg-4 col-sm-3 col-xs-4" href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=42&amp;search=apple&amp;category_id=0">
                                    <div class="product-image">
                                        <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/product/01-700x700.png" alt="Apple Cinema 30&quot;" class="img-responsive center-block" />
                                    </div>
                                </a>-->
                                <div class="detail col-lg-8 col-sm-9 col-xs-8">
                                    <h2 class="product-name" style="margin-bottom:0px">
                                        <a href="search_products.php?search='.$product['ProductName'].'">
                                            '.$product['ProductName'].'
                                        </a>
                                    </h2>
                                    <!--<p class="list-des">Maecenas ullamcorper ut augue non porttitor. Etiam euismod, lorem vel interdum condimentum, lacus qu..</p>
                                    <div class="price-box">
                                        <p class="old-price"><span class="sprice">$122.00</span></p>
                                        <p class="special-price"><span class="sprice"></span></p>
                                    </div>
                                    -->
                                </div>
                            </div>
                         </li>';
    } 
    $result_html .= '</ul>';                    
    
    $result['result_html']=$result_html;
    return json_encode($result);
 }  
                                               

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
   function getSubCategory() {
            
            global $mysql;
            $subcategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$_REQUEST['CategoryID']."' order by SubCategoryName");
            if($_REQUEST['fr']=="category"){
                $html = '<select class="form-control" name="SubCategory" readonly="readonly" id="SubCategory" style="width:100%">';
            }else {
                 $html = '<select class="form-control" name="SubCategory" id="SubCategory" style="width:100%">';
            }
            $html.='<option value="0" selected="selected">Select Sub Category Name</option>';
            
            if (sizeof($subcategories)>0) {
                foreach($subcategories as $r) {
                  
                    if(isset($_REQUEST['SubCategoryID'])){
                       $html .= '<option value="'.$r['SubCategoryID'].'" '.(($_REQUEST['SubCategoryID']== $r['SubCategoryID']) ? "selected='selected'" : "").'>'.$r['SubCategoryName'].'</option>';
                    
                    }else {
                    $html .= '<option value="'.$r['SubCategoryID'].'">'.$r['SubCategoryName'].'</option>'; 
                    
                    }
                }
            } else {
                $html .= '<option value="0" selected="selected">Select Sub Category Name</option>'; 
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
    
    function DeleteRightSlider() {
    
    global $mysql;
    
      $id=$mysql->execute("DELETE FROM _tbl_right_sliders where SliderID='".$_POST['SliderID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Slider Deleted Successfully";  
        return json_encode($result);
    
    }       
   function listaddtocart(){
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
                                                 "ProductName"  => $Products[0]['ProductName'],
                                                 "ProductImage" => $Products[0]['ProductImage'],
                                                 "Price"        => $Products[0]['SellingPrice'],
                                                 "Qty"          => $_POST['quantity'],
                                                 "IsCart"       => 1);    
                    $result=array("items"=>$_SESSION['items'],"subtotal"=>number_format($subtotal+($_POST['quantity']*$Products[0]['SellingPrice']),2),"IsCart"=>"1");
                } else{
                    $result=array("items"=>$_SESSION['items'],"subtotal"=>number_format($subtotal,2),"IsCart"=>"0");
                }
            } else {
              $result=array("items"=>$_SESSION['items'],"subtotal"=>number_format($subtotal,2),"IsCart"=>"0");
                                                                                                                                                                                                
            }
           return json_encode($result); 
    }
	function addtocart(){
               if (!(isset($_SESSION['items'] ))) {
                   $_SESSION['items'] =array();
                   
               }
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
                                                 "Qty"          => $_POST['qty']
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
    

    function Register(){
        global $mysql;
           $ErrorCount=0;        
            $dupMobile = $mysql->select("select * from _tbl_customer where MobileNumber='".$_POST['MobileNumber']."'");
            if(sizeof($dupMobile)>0){
                $ErrorCount++;
                $result = array();
                $result['status']="failure";
                $result['message']="Mobile Number Already Exist<br>";  
                return json_encode($result);
            }
            
             
            if (JAPP::REGISTER_EMAIL) {
            if (isset($_POST['EmailID']) && strlen($_POST['EmailID'])>0) {
                $dupemail = $mysql->select("select * from _tbl_customer where EmailID='".$_POST['EmailID']."'");
                if(sizeof($dupemail)>0){
                    $ErrorCount++;
                    $result = array();
                    $result['status']="failure";
                    $result['message']="Email ID Already Exist<br>";  
                    return json_encode($result);
                }
            }
            }
            
            if (JApp::REFERAL_PROGRAM) {
              
            if (isset($_POST['Referral']) && strlen(trim($_POST['Referral']))>0) {
                  $dupReferral = $mysql->select("select * from _tbl_customer where Referral='".$_POST['Referral']."'");
                  if(sizeof($dupReferral)==0){
                    $ErrorCount++;
                    $result = array();
                    $result['status']="failure";
                    $result['message']="Invalid Referral Code<br>";  
                    return json_encode($result);
                  }
            }
            
            }
            
           
            
            if($ErrorCount==0) {
                   $random = sizeof($mysql->select("select * from _tbl_customer")) + 1;
                   $UserCode ="CSTMR0000".$random;
                     
              $id = $mysql->insert("_tbl_customer",array("CustomerCode" => $UserCode,
                                                         "CustomerName" => $_POST['Name'],
                                                         "EmailID"      => $_POST['EmailID'],
                                                         "MobileNumber" => $_POST['MobileNumber'],
                                                         "CreatedBy"    => isset($dupReferral[0]['CustomerID']) ? $dupReferral[0]['CustomerID'] : "0",
                                                         "Password"     => $_POST['Password'],
                                                         "CreatedOn"    => date("Y-m-d H:i:s")));
              
              
            if($id>0){
                  
                $referralCode= getCode($id);
                $mysql->execute("update _tbl_customer set Referral='".$referralCode."' where CustomerID='".$id."'");
              
                $user = $mysql->select("select * from _tbl_customer where CustomerID='".$id."'");
                $_SESSION['User'] = $user[0];
                $result = array();
                $result['status']="Success";
                $result['Name']=$user[0]['CustomerName'];
                $result['Mobile']=$user[0]['MobileNumber'];
                $result['Email']=$user[0]['EmailID'];
                $result['message']="Registered Successfully";  
              
                return json_encode($result);                                        
            }
    }
    } 
    function Login(){
        global $mysql;
        $userdata = $mysql->select("select * from _tbl_customer where MobileNumber='".$_POST['LoginMobileNumber']."' and Password='".$_POST['LoginPassword']."' ");
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
    
    /* Completed & Verified*/
    function PlaceOrder() {
        
        global $mysql;
        $random = sizeof($mysql->select("select * from _tbl_orders")) + 1;
        $OrderCode ="ORD0000".$random;
        $id = $mysql->insert("_tbl_orders",array("OrderCode"            => $OrderCode,
                                                 "CustomerID"           => $_SESSION['User']['CustomerID'],
                                                 "CustomerName"         => $_SESSION['User']['CustomerName'],
                                                 "CustomerEmailID"      => $_SESSION['User']['EmailID'],
                                                 "CustomerMobileNumber" => $_SESSION['User']['MobileNumber'],
                                                 "BillingAddress1"      => $_SESSION['Billing']['AddressLine1'],
                                                 "BillingAddress2"      => $_SESSION['Billing']['AddressLine2'],
                                                 "BillingAddress3"      => $_SESSION['Billing']['AddressLine3'],
                                                 "BillingPincode"       => $_SESSION['Billing']['PostalCode'],
                                                 "BillingLandMark"      => $_SESSION['Billing']['LandMark'],
                                                 "OrderDate"            => date("Y-m-d H:i:s")));
        
        $subtotal=0;   
        $TotalUplevelCommission=0;  
        $TotalUplevelCommissionL2=0;  
        $TotalUplevelCommissionL3=0;  
                                         
        foreach($_SESSION['items'] as $item) {
            $ProductInfo = $mysql->select("select * from _tbl_products where ProductID='".$item['ProductID']."'");
            $subtotal += $item['Qty']*$item['Price'];
            $mysql->insert("_tbl_orders_items",array("OrderID"     => $id,
                                                     "ProductID"   => $item['ProductID'],
                                                     "ProductName" => $item['ProductName'],
                                                     "Qty"         => $item['Qty'],
                                                     "Price"       => $item['Price'],
                                                     "Amount"      => $item['Qty']*$item['Price'],
                                                     "EarningPoints"       => "0",
                                                     "TotalEarningPoints"  => "0",
                                                     "ProductCommission"   => $ProductInfo[0]['Commission'],
                                                     "TotalCommission"     => $ProductInfo[0]['Commission']*$item['Qty']));
           
            $TotalUplevelCommission+=$ProductInfo[0]['Commission']*$item['Qty'];
            $TotalUplevelCommissionL2+=$ProductInfo[0]['CommissionL2']*$item['Qty'];
            $TotalUplevelCommissionL3+=$ProductInfo[0]['CommissionL3']*$item['Qty'];
        }
        
        $mysql->execute("update _tbl_orders set 
                                    OrderTotal='".$subtotal."', 
                                    TotalUplevelCommission='".$TotalUplevelCommission."',
                                    TotalUplevelCommissionL2='".$TotalUplevelCommissionL2."',
                                    TotalUplevelCommissionL3='".$TotalUplevelCommissionL3."'
         where OrderID='".$id."'");
        
        $id = $mysql->insert("_tbl_orders_status",array("OrderID"   => $id,
                                                        "OrderCode" => $OrderCode,
                                                        "Status"    => "Order Placed",
                                                        "Remarks"   => "",
                                                        "StatusOn"  => date("Y-m-d H:i:s")));
                                                        
        if (strlen(trim($_SESSION['User']['EmailID']))>0) {
            $MailContent = Order::OrderPlacedMailContent($id);
            $mparam['MailTo']=$_SESSION['User']['EmailID'];
            $mparam['CustomerID']=$_SESSION['User']['CustomerID'];
            $mparam['Message'] = $MailContent['MailBody'];
            $mparam['Subject'] = $MailContent['MailSubject']; 
            MailController::Send($mparam,$mailError);  
        }
        
        $MailContent = Order::OrderPlacedMailContent($id);
        $mparam['MailTo']="Jeyaraj_123@yahoo.com";
        $mparam['CustomerID']="0";
        $mparam['Message'] = $MailContent['MailBody'];
        $mparam['Subject'] = $MailContent['MailSubject']; 
        MailController::Send($mparam,$mailError);  
        
        sleep(5);
        unset($_SESSION['items']);
        unset($_SESSION['Billing']);
        return json_encode(array("Status"=>"Success","OrderID"=>$OrderCode,"message"=>"Order Placed Successfully"));  
    }
    
    
    function OrderCancelFromAdmin() {
        
        global $mysql;
        $order = $mysql->select("select * from _tbl_orders where OrderID='".$_POST['OrderID']."'");
           
        if (sizeof($order)==0) {
            return json_encode(array("status"=>"failure","message"=>"Order not found.")); 
        }
        
        if ($order[0]['OrderStatus']*1==2) {
            return json_encode(array("status"=>"failure","message"=>"Order already cancelled.")); 
        }
        
        if ($order[0]['OrderStatus']*1==5) {
            return json_encode(array("status"=>"failure","message"=>"Delivered order couldnot cancel.")); 
        }
        
        if ($order[0]['OrderStatus']*1==6) {
            return json_encode(array("status"=>"failure","message"=>"Returned order couldnot cancel.")); 
        }
        
        
        $id = $mysql->insert("_tbl_orders_status",array("OrderID"   => $order[0]['OrderID'],
                                                        "OrderCode" => $order[0]['OrderCode'],
                                                        "Status"    => "Order Cancelled",
                                                        "Remarks"   => "Placed Order then Cancelled. ".$_POST['Remarks'],
                                                        "StatusOn"  => date("Y-m-d H:i:s")));
                                                       
        $mysql->execute("update _tbl_orders set OrderStatus='2' where OrderID='".$_POST['OrderID']."'"); 
        
        if (strlen(trim($order[0]['CustomerEmailID']))>0) {
            $MailContent = Order::OrderCancelledMailContent($_POST['OrderID']);
            $mparam['MailTo']=$order[0]['CustomerEmailID'];
            $mparam['CustomerID']=$order[0]['CustomerID'];
            $mparam['Message'] = $MailContent['MailBody'];
            $mparam['Subject'] = $MailContent['MailSubject']; 
            MailController::Send($mparam,$mailError);  
        }
        
        $MailContent = Order::OrderCancelledMailContent($_POST['OrderID']);
        $mparam['MailTo']="Jeyaraj_123@yahoo.com";
        $mparam['CustomerID']="0";
        $mparam['Message'] = $MailContent['MailBody'];
        $mparam['Subject'] = $MailContent['MailSubject']; 
        MailController::Send($mparam,$mailError);  
        
        return json_encode(array("status"=>"success","message"=>"Order Cancelled Successfully"));                                        
    }
    
    function ConfirmOrderFromAdmin() {
        global $mysql;
        $order = $mysql->select("select * from _tbl_orders where OrderID='".$_POST['OrderID']."'");
        
        if (sizeof($order)==0) {
            return json_encode(array("status"=>"failure","message"=>"Order not found.")); 
        }
        
         if ($order[0]['OrderStatus']*1==2) {
            return json_encode(array("status"=>"failure","message"=>"Order already cancelled.")); 
        }
        
        $id = $mysql->insert("_tbl_orders_status",array("OrderID"   => $order[0]['OrderID'],
                                                        "OrderCode" => $order[0]['OrderCode'],
                                                        "Status"    => "Order Confirmed",
                                                        "Remarks"   => "Placed Order then Confirmed ".$_POST['Remarks'],
                                                        "StatusOn"  => date("Y-m-d H:i:s")));
                                                        
        $mysql->execute("update _tbl_orders set OrderStatus='3' where OrderID='".$_POST['OrderID']."'");
        
        if (strlen(trim($order[0]['CustomerEmailID']))>0) {
            $MailContent = Order::OrderConfirmedAndProcessMailContent($_POST['OrderID']);
            $mparam['MailTo']=$order[0]['CustomerEmailID'];
            $mparam['CustomerID']=$order[0]['CustomerID'];
            $mparam['Message'] = $MailContent['MailBody'];
            $mparam['Subject'] = $MailContent['MailSubject']; 
            MailController::Send($mparam,$mailError);  
        }
        
        $MailContent = Order::OrderConfirmedAndProcessMailContent($_POST['OrderID']);
        $mparam['MailTo']="Jeyaraj_123@yahoo.com";
        $mparam['CustomerID']="0";
        $mparam['Message'] = $MailContent['MailBody'];
        $mparam['Subject'] = $MailContent['MailSubject']; 
        MailController::Send($mparam,$mailError);  
        
        return json_encode(array("status"=>"success","message"=>"Order Confirmed & Processing..."));                                                
    }
    
      function DispatchOrderFromAdmin(){
        global $mysql;
        $order = $mysql->select("select * from _tbl_orders where OrderID='".$_POST['OrderID']."'");
        
              $id = $mysql->insert("_tbl_orders_status",array("OrderID"   => $order[0]['OrderID'],
                                                             "OrderCode" => $order[0]['OrderCode'],
                                                             "Status"    => "Order Dispatched",
                                                             "Remarks"   => "Processing To Dispatched ".$_POST['Remarks'],
                                                             "StatusOn"  => date("Y-m-d H:i:s")));
                   $mysql->execute("update _tbl_orders set OrderStatus='4' where OrderID='".$_POST['OrderID']."'"); 
              
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
                $result['status']="success";
                $result['message']="Order Dispatched Successfully<br>";  
                return json_encode($result);                                        
            }
    }
 
 function DeliveredOrderFromAdmin(){
     global $mysql;
     $order = $mysql->select("select * from _tbl_orders where OrderID='".$_POST['OrderID']."'");
     
     $id = $mysql->insert("_tbl_orders_status",array("OrderID"   => $order[0]['OrderID'],
                                                     "OrderCode" => $order[0]['OrderCode'],
                                                     "Status"    => "Order Delivered",
                                                     "Remarks"   => "Dispatched To Delivered ".$_POST['Remarks'],
                                                     "StatusOn"  => date("Y-m-d H:i:s")));
     $mysql->execute("update _tbl_orders set OrderStatus='5' where OrderID='".$_POST['OrderID']."'"); 
     $invoiceID = $mysql->insert("_tbl_invoices",array("OrderCode"=>$order[0]['OrderCode'],"CustomerID"=>$order[0]['CustomerID'], "OrderID"=>$order[0]['OrderID'],"InvoiceDate"=>date("Y-m-d H:i:s")));
     $mysql->execute("update _tbl_orders set InvoiceID='".$invoiceID."',IsPaid='1' where OrderID='".$_POST['OrderID']."'"); 
     $Customer=$mysql->select("select * from _tbl_customer where CustomerID='".$order[0]['CustomerID']."'");
     $additionalMessage=0;   
     
     if ($Customer[0]['CreatedBy']>0) {
        //Level1
        $uplineCustomer = $mysql->select("select * from  _tbl_customer where CustomerID='".$Customer[0]['CreatedBy']."'");
        $balance = Wallet::getBalance($uplineCustomer[0]['CustomerID'])+$order[0]['TotalUplevelCommission'];
        $mysql->insert("_tbl_wallet",array("CustomerID"=>$uplineCustomer[0]['CustomerID'],
                                           "TxnDate"=>date("Y-m-d H:i:s"),
                                           "Particulars"=>"Level 1 Commission From ".$order[0]['OrderCode'],
                                           "Credit"=>$order[0]['TotalUplevelCommission'],
                                           "Debit"=>"0",
                                           "Balance"=>$balance));
                                           
        $uplineCustomerL2 = $mysql->select("select * from  _tbl_customer where CustomerID='".$uplineCustomer[0]['CreatedBy']."'");
        if (sizeof($uplineCustomerL2)>0) {
       
        $balance = Wallet::getBalance($uplineCustomerL2[0]['CustomerID'])+$order[0]['TotalUplevelCommissionL2'];
        $mysql->insert("_tbl_wallet",array("CustomerID"=>$uplineCustomerL2[0]['CustomerID'],
                                           "TxnDate"=>date("Y-m-d H:i:s"),
                                           "Particulars"=>"Level 2 Commission From ".$order[0]['OrderCode'],
                                           "Credit"=>$order[0]['TotalUplevelCommissionL2'],
                                           "Debit"=>"0",
                                           "Balance"=>$balance));   
              
              //Level 3                             
             $uplineCustomerL3 = $mysql->select("select * from  _tbl_customer where CustomerID='".$uplineCustomerL2[0]['CreatedBy']."'");
             if (sizeof($uplineCustomerL3)>0) {
       
                $balance = Wallet::getBalance($uplineCustomerL3[0]['CustomerID'])+$order[0]['TotalUplevelCommissionL3'];
                $mysql->insert("_tbl_wallet",array("CustomerID"=>$uplineCustomerL2[0]['CustomerID'],
                                           "TxnDate"=>date("Y-m-d H:i:s"),
                                           "Particulars"=>"Level 3 Commission From ".$order[0]['OrderCode'],
                                           "Credit"=>$order[0]['TotalUplevelCommissionL3'],
                                           "Debit"=>"0",
                                           "Balance"=>$balance));   
             }                                 
        }                                
                                           
                                           
                                           
        $additionalMessage = "Commission Credited to his/her upline Level 1 ".$order[0]['TotalUplevelCommission'];
     
     }
     
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

                   // $mparam['MailTo']=$order[0]['CustomerEmailID'];
                   // $mparam['CustomerID']=$order[0]['CustomerID'];
                   // $mparam['Subject']="Your Order (".$order[0]['OrderCode'].") Delivered";
                  //  $mparam['Message']=$message;
                   // MailController::Send($mparam,$mailError);
                $result = array();
                $result['status']="success";
                $result['message']="Order Delivered Successfully<br>".$additionalMessage;  
                return json_encode($result);                                        
            }
    }    
    
    function CancelOrder(){
        global $mysql;
            $result=array("Status"=>"Success","message"=>"Order Canceled Successfully");     
            sleep(5);
            unset($_SESSION['items']);
            unset($_SESSION['Billing']);
            return json_encode($result);  
         
    } 
  	
?>