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
                                                 "ProductIDen"  => md5($Products[0]['ProductID']),
                                                 "ProductName"  => $Products[0]['ProductName'],
                                                 "ProductImage" => $Products[0]['ProductImage'],
                                                 "Price"        => number_format($Products[0]['SellingPrice'],2),
                                                 "Qty"          => $_POST['qty'],
                                                 "Size"         => $_POST['BrandSize'],
                                                 "IsCart"       => 1);    
                    $result=array("items"=>$_SESSION['items'],"subtotal"=>number_format($subtotal+($_POST['qty']*$Products[0]['SellingPrice']),2));
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
                                                        "order_item_quantity"    => $item['Qty'],
                                                        "order_item_price"       => $item['Price'],
                                                        "order_item_final_amount"=> $subtotal));
             }
			 $mysql->execute("update invoice_order set OrderTotal='".$subtotal."' where order_id='".$id."'"); 
               $q=$mysql->qry;
			   
			$message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="" style="height:30px;">&nbsp;&nbsp;
                            <img src="" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Hello '.$_SESSION['User']['CustomerName'].',
                            <br><br>
                            Your Order Placed Successfully<br>Order ID is '.$OrderCode.'.
                            <br><br>
                            <br> 
                            Thanks <br>
                            
                        </div>
                    </div>';

                    $mparam['MailTo']=$_SESSION['User']['EmailID'];
                    $mparam['CustomerID']=$_SESSION['User']['CustomerID'];
                    $mparam['Subject']="Order Placed";
                    $mparam['Message']=$message;
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
?>