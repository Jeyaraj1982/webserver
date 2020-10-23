<?php
include_once("../config.php");
    echo $_REQUEST['action']();
    
    /* Customer */
     
     function DeleteCustomer() {
    
    global $mysql;
      $checkcustomer = $mysql->select("select * from invoice_order where user_id='".$_POST['CustomerID']."'");
      if(sizeof($checkcustomer)==0){
   
      $id=$mysql->execute("DELETE FROM _tbl_sales_customers where CustomerID='".$_POST['CustomerID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Customer Deleted.";  
        return json_encode($result);
    }else {
         $result = array();
         $result['status']="failure";
         $result['message']="Customer Invoiced Product.";  
         return json_encode($result);
    }
    }
     function CheckDuplicateCustomerName(){
         global $mysql;
       $cstmrname = $mysql->select("select * from _tbl_sales_customers where CustomerName='".$_REQUEST['CustomerName']."'");
            if(sizeof($cstmrname)>0){
                $html = 'Customer Name Already Exists';  
            }else {
                $html='';
            }
            return $html;
    }
    function CheckDuplicateCustomerNameTamil(){
         global $mysql;
       $cstmrname = $mysql->select("select * from _tbl_sales_customers where CustomerNameTamil='".$_REQUEST['CustomerNameTamil']."'");
       if($_REQUEST['CustomerNameTamil']!=""){
            if(sizeof($cstmrname)>0){
                $html = 'Customer Name Already Exists';  
            }else {
                $html='';
            }
       }else {
            $html='';
       }
            return $html;
            
    }
   
    function CheckDuplicateShopName(){
         global $mysql;
       $ShopName = $mysql->select("select * from _tbl_sales_customers where ShopName='".$_REQUEST['ShopName']."'");
            if(sizeof($ShopName)>0){
                $html = 'Shop Name Already Exists';  
            }else {
                $html='';
            }
            return $html;
    }
    function CheckDuplicateShopNameTamil(){
         global $mysql;
       $ShopNameTamil = $mysql->select("select * from _tbl_sales_customers where ShopNameTamil='".$_REQUEST['ShopNameTamil']."'");
       if($_REQUEST['ShopNameTamil']!=""){
            if(sizeof($ShopNameTamil)>0){
                $html = 'Shop Name Already Exists';  
            }else {
                $html='';
            }
       }else {
            $html='';
       }
            return $html;
            
    }
    
    function CheckDuplicateMobileNumber(){
         global $mysql;
       $MobileNumber = $mysql->select("select * from _tbl_sales_customers where MobileNumber='".$_REQUEST['MobileNumber']."'");
            if(sizeof($MobileNumber)>0){
                $html = 'Mobile Number Already Exists';  
            }else {
                $html='';
            }
            return $html;
    }
    function CheckDuplicateEmailID(){
         global $mysql;
       $EmailID = $mysql->select("select * from _tbl_sales_customers where EmailID='".$_REQUEST['EmailID']."'");
       if($_REQUEST['EmailID']!=""){
            if(sizeof($EmailID)>0){
                $html = 'EmailID Already Exists';  
            }else {
                $html='';
            }
       }else {
            $html='';
       }
            return $html;
            
    }
   
    function CheckPaidAMountValidation(){
         global $mysql;
            if($_REQUEST['PaidAmount']>$_REQUEST['TotalAmount']){
                $html = 'Must Enter amount less than or equal to tatal amount';  
            }else {
                $html='';
            }
            return $html;
    }
    
    function AddCustomer() {
    
    global $mysql;
       $random = rand(100,999);
                $CustomerCode ="CSTR00".$random; 
        $id = $mysql->insert("_tbl_sales_customers",array("CustomerCode"       => $CustomerCode,
                                                          "CustomerName"       => $_POST['CustomerName'],
                                                          "ShopName"           => $_POST['ShopName'],
                                                          "MobileNumber"       => $_POST['MobileNumber'],
                                                          "EmailID"            => $_POST['EmailID'],
                                                          "MaximumCreditLimit" => $_POST['MaximumCreditLimit'],
                                                          "AddressLine1"       => str_replace("'","\\'",$_POST['AddressLine1']),
                                                          "AddressLine2"       => str_replace("'","\\'",$_POST['AddressLine2']),
                                                          "AddressLine3"       => str_replace("'","\\'",$_POST['AddressLine3']),
                                                          "CreatedOn"          => date("Y-m-d H:i:s")));
        if(sizeof($id)>0){
            $result = array();                                                                                            
            $result['status']="success";
            $result['message']="Customer Added Successfully.";  
            $result['CustomerID']=md5($id);  
            return json_encode($result);
        }
      
    }
    function getCustomerDetails() {
            
            global $mysql;
            if($_REQUEST['fr']=="0"){
                $customerdetails = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$_REQUEST['CustomerID']."'");
            }else {
                $customerdetails = $mysql->select("select * from _tbl_sales_customers where md5(CustomerID)='".$_REQUEST['CustomerID']."'");
            }
            if(sizeof($customerdetails)>0){
                $html = '<div class="form-group">';
                $html.=$customerdetails[0]['CustomerName'];
                $html.='<br>';
                $html.=$customerdetails[0]['ShopName'];
                $html.='<br>';
                $html.=$customerdetails[0]['MobileNumber'];
                $html.='<br>';
                $html.=$customerdetails[0]['EmailID'];
                $html.='<br>';                                                                              
                $html.=$customerdetails[0]['AddressLine1'];
                $html.='<br>';
                $html.='<button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="ChangeCustomer()">change Customer</button>&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="AddCustomer()">Add Customer</button>';
                $html .= '</div>';   
                return $html;
            } 
            
        }
        function GetCustomerName(){
        global $mysql;
        if($_REQUEST['fr']=="0"){
                $result = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$_REQUEST['CustomerID']."'");
            }else {
                $result = $mysql->select("select * from _tbl_sales_customers where CustomerName Like '".$_GET['term']."%' order by CustomerName");
            }
        return json_encode($result);                                                                     
    }
    
    /* Customer */
    
   /* Product */
    function DeleteProduct() {
    
    global $mysql;
    
      $checkproduct = $mysql->select("select * from invoice_order_item where item_code='".$_POST['ProductID']."'");
      if(sizeof($checkproduct)==0){
   
        $id=$mysql->execute("DELETE FROM _tbl_sales_products where ProductID='".$_POST['ProductID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Product Deleted.";  
        return json_encode($result);
     }else {
         $result = array();
         $result['status']="failure";
         $result['message']="Product has been invoiced.";  
         return json_encode($result);
     }
    }
    function GetProduct() {
    
    global $mysql;
   
      $id=$mysql->select("Select * FROM _tbl_sales_products where ProductID='".$_POST['product']."'");
     
        $result = array();
        $result['ProductID']=$id[0]['ProductID'];
        $result['ProductName']=$id[0]['ProductName'];  
        $result['ProductPrice']=$id[0]['ProductPrice'];  
        $result['ProductQty']="1";  
        $result['ProductUnitName']=$id[0]['ProductUnitName'];  
        return json_encode($result);
    }
    function GetProductName(){
        global $mysql;
        $result = $mysql->select("select * from _tbl_sales_products where ProductName Like '".$_GET['term']."%' order by ProductName");
        return json_encode($result); 
    }
    function CheckDuplicateBarCode(){
         global $mysql;
       $BarCode = $mysql->select("select * from _tbl_sales_products where BarCode='".$_REQUEST['BarCode']."'");
       if($_REQUEST['BarCode']!=""){            
            if(sizeof($BarCode)>0){
                $html = 'BarCode Already Exists';  
            }else {
                $html='';
            }
       }else {
            $html='';
       }
            return $html;
    }
    function CheckDuplicateProductName(){
         global $mysql;
       $ProductName = $mysql->select("select * from _tbl_sales_products where ProductName='".$_REQUEST['ProductName']."'");
            if(sizeof($ProductName)>0){
                $html = 'Product Name Already Exists';  
            }else {
                $html='';
            }
            return $html;
    }    
    function CheckDuplicateProductNameTamil(){
         global $mysql;
       $ProductNameTamil = $mysql->select("select * from _tbl_sales_products where ProductNameTamil='".$_REQUEST['ProductNameTamil']."'");
       if($_REQUEST['ProductNameTamil']!=""){
            if(sizeof($ProductNameTamil)>0){
                $html = 'Product Name Already Exists';  
            }else {
                $html='';
            }
       }else {
            $html='';
       }
            return $html;
    }
    function AddProduct() {
    
    global $mysql;
        $random = rand(100,999);
        $ProductCode ="PRCT00".$random;
        $id = $mysql->insert("_tbl_sales_products",array("ProductCode"          => $ProductCode,
                                                         "BarCode"              => $_POST['BarCode'],
                                                         "ProductName"          => $_POST['ProductName'],
                                                         "ProductNameTamil"     => $_POST['ProductNameTamil'],
                                                         "ProductUnitID"        => $_POST['ProductQty'],
                                                         "ProductUnitName"      => $unitm[0]['unitname'],                               
                                                         "ProductUnitFullName"  => $unitm[0]['unitfullname'],
                                                         "ProductPrice"         => $_POST['ProductPrice'],
                                                         "Description"          => str_replace("'","\\'",$_POST['Description']),
                                                         "AddedOn"              => date("Y-m-d H:i:s")));
        if(sizeof($id)>0){
            $result = array();                                                                                            
            $result['status']="success";
            $result['message']="Product Added Successfully.";  
            $result['ProductID']=$id;  
            return json_encode($result);
        }
    }
    /* Product */
    
    
    function DeleteInvoice() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM invoice_order where order_id='".$_POST['InvoiceID']."'");
          $mysql->execute("DELETE FROM invoice_order_item where order_id='".$_POST['InvoiceID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Invoice Deleted.";  
        return json_encode($result);
    }
    
   /* user */                                                                                         
    function DeleteUser() {
    
    global $mysql;
      $checkuser = $mysql->select("select * from invoice_order where user_id='".$_POST['UserID']."'");
      if(sizeof($checkuser)==0){
   
      $id=$mysql->execute("DELETE FROM _tbl_sales_userss where UserID='".$_POST['UserID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="User Deleted.";  
        return json_encode($result);
    }else {
         $result = array();
         $result['status']="failure";
         $result['message']="User Invoiced Product.";  
         return json_encode($result);
    }
    }
    
  /* User */  
    
?> 
 