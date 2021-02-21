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
                $oldbalance = $mysql->select("select (sum(order_total_amount_due)) as bal from invoice_order where user_id='".$customerdetails[0]['CustomerID']."'");
                $html = '<div class="form-group row">';
                    $html = '<div class="col-sm-6">';
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
                    $html = '<div class="col-sm-6">';   
                        $html .= 'Outstanding Amount : '.$oldbalance[0]['bal'];   
                    $html .= '</div>';   
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
            $oldbalance = $mysql->select("select (sum(order_total_amount_due)) as bal from invoice_order where user_id='".$result[0]['CustomerID']."'");
            
            $result[0]['OutstandingAmount'] = number_format($oldbalance[0]['bal'],2);
            $result[0]['qry'] = "select (sum(order_total_amount_due)) as bal from invoice_order where user_id='".$result[0]['CustomerID']."'";
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
     return json_encode($id[0]);
        /*$result = array();
        $result['ProductID']=$id[0]['ProductID'];
        $result['ProductName']=$id[0]['ProductName'];  
        $result['ProductPrice']=$id[0]['ProductPrice'];  
        $result['ProductQty']="1";  
        $result['ProductUnitName']=$id[0]['ProductUnitName'];  
        return json_encode($result);*/
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
         $random = sizeof($mysql->select("select * from _tbl_sales_products")) + 1;
                $ProductCode ="MAS0000".$random;
        
        $unitm = $mysql->select("select * from _tbl_units where id='".$_POST['ProductQty']."'"); 
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
  
  /*Invoice */ 
  function CreateInvoice() {
    
    global $mysql;
          
        $CashTwoThousand      =  $_POST['TwoThousand'];
        $CashFiveHundred      =  $_POST['FiveHundred'];
        $CashTwoHundred       =  $_POST['TwoHundred'];
        $CashOneHundred       =  $_POST['OneHundred'];
        $CashFiftyRupees      =  $_POST['FiftyRupees'];
        $CashTwentyRupees     =  $_POST['TwentyRupees'];
        $CashTenRupees        =  $_POST['TenRupees'];
        $Coins                =  $_POST['Coins'];
        
        
        if($_POST['TransactionMode']=="Cash"){
           $TotalCashReceived    =  $_POST['TotalCashReceived'];
           $ReturnCashToCustomer =  $_POST['ReturnCashToCustomer']; 
        }else {
            $TotalCashReceived    =  "0";
            $ReturnCashToCustomer =  "0";
        }
     
       $customer = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$_POST['UserDetails']."'");
       $id = $mysql->insert("invoice_order",array("user_id"                 => $_POST['UserDetails'], 
                                                  "order_receiver_name"     => $customer[0]['CustomerName'],
                                                  "order_receiver_name_tamil"  => $customer[0]['CustomerNameTamil'],
                                                  "order_receiver_address"  => $customer[0]['AddressLine1'].",".$customer[0]['AddressLine2'].",".$customer[0]['AddressLine3'],
                                                 // "order_total_before_tax"  => $_POST['totalAftertax'],
                                                 //  "order_total_tax"         => $_POST['taxAmount'],
                                                 // "order_tax_per"           => $_POST['taxRate'],
                                                  "order_total_after_tax"   => $_POST['subTotal'],
                                                  "order_amount_paid"       => "0.00",
                                                  "order_total_amount_due"  => $_POST['subTotal'],
                                                  "TransactionMode"           => $_POST['TransactionMode'],
                                                 // "CashTwoThousand"         => $CashTwoThousand,
                                                // "CashFiveHundred"         => $CashFiveHundred,
                                                //  "CashTwoHundred"          => $CashTwoHundred,                           
                                                //  "CashOneHundred"          => $CashOneHundred,
                                                //  "CashFiftyRupees"         => $CashFiftyRupees,
                                                //  "CashTwentyRupees"        => $CashTwentyRupees,
                                                //  "CashTenRupees"           => $CashTenRupees,
                                                //  "Coins"                   => $Coins,
                                                  "TotalCashReceived"       => $TotalCashReceived,
                                                  "ReturnCashToCustomer"    => $ReturnCashToCustomer,
                                                  "note"                    => $_POST['notes']));
       $order_code = "IN". str_pad($id,5,"0",STR_PAD_LEFT);
       $mysql->execute("update invoice_order set order_code='".$order_code."' where order_id='".$id."'");
                                                
for ($i = 0; $i < count($_POST['productCode']); $i++) {
     $pid= $mysql->insert("invoice_order_item",array("order_id"                 => $id,
                                                  "item_code"                => $_POST['productCode'][$i],
                                                  "item_name"                => $_POST['productName'][$i],
                                                  "order_item_quantity"      => $_POST['quantity'][$i],
                                                  "order_item_price"         => $_POST['price'][$i],
                                                  "order_item_final_amount"  => $_POST['total'][$i]));
}
              $rid= $mysql->insert("receipt",array("order_id"                 => $id,
                                                  "order_date"               => date("Y-m-d H:i:s"),
                                                  "user_id"                  => $customer[0]['CustomerID'],
                                                  "receipt_amount"           => $_POST['AmountPaid'],
                                                  "invoice_due_amount"       => number_format($_POST['subTotal']-$_POST['AmountPaid'],2),
                                                  "receipt_date"             => date("Y-m-d H:i:s")));
              $ReceiptCode = "RT". str_pad($rid,5,"0",STR_PAD_LEFT);
               $mysql->execute("update receipt set receipt_code='".$ReceiptCode."' where ReceiptID='".$rid."'");
                                                  
              $paidamount = $_POST['AmountPaid'];                                                              
              $dueamount  = $_POST['subTotal']-$paidamount;
                   $mysql->execute("update invoice_order set `order_amount_paid`      ='".$paidamount."',
                                                             `order_total_amount_due` ='".$dueamount."',                    
                                                             `receipt_id`             ='".$rid."',
                                                             `receipt_date`             ='".date("Y-m-d H:i:s")."'
                                                              where `order_id`='".$id."'");  
      if($id>0 && $pid>0){              
            $result = array();                                                                                            
            $result['status']="success";
            $result['message']="Invoice Created Successfully.";  
            $result['InvoiceID']=md5($id);  
            return json_encode($result); 
        }else {
            $result = array();                                                                                            
            $result['status']="failure";
            $result['message']="Error Invoice Creation.";  
            return json_encode($result); 
        }
    }
	
	function SaveInvoice() {
    
    global $mysql;
          
        $customer = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$_POST['UserDetails']."'");
       $id = $mysql->insert("save_invoice_order",array("user_id"                 => $_POST['UserDetails'], 
                                                  "order_receiver_name"     => $customer[0]['CustomerName'],
                                                  "order_receiver_address"  => $customer[0]['AddressLine1'].",".$customer[0]['AddressLine2'].",".$customer[0]['AddressLine3'],
                                                  "order_total_after_tax"   => $_POST['subTotal'],
                                                  "order_amount_paid"       => "0.00",
                                                  "order_total_amount_due"  => $_POST['subTotal'],
												  "note"                    => $_POST['notes'],
												  "SavedByID"  			    => $_SESSION['User']['AdminID'],
												  "LastUpdatedOn"  			=> date("Y-m-d H:i:s"),
												  "LastModifiedBy"  	    => $_SESSION['User']['AdminID']));
       $order_code = "IN". str_pad($id,5,"0",STR_PAD_LEFT);
       $mysql->execute("update save_invoice_order set order_code='".$order_code."' where order_id='".$id."'");
                                                
for ($i = 0; $i < count($_POST['productCode']); $i++) {
    $pid= $mysql->insert("save_invoice_order_item",array("order_id"         	   => $id,
														"item_code"        	       => $_POST['productCode'][$i],
														"item_name"                => $_POST['productName'][$i],
                                                        "order_item_quantity"      => $_POST['quantity'][$i],
													    "order_item_price"         => $_POST['price'][$i],
													    "order_item_final_amount"  => $_POST['total'][$i],
													    "SavedByID"  			   => $_SESSION['User']['AdminID'],
														"AddedOn"                  => date("Y-m-d H:i:s")));
}
              
  
      if(sizeof($id)>0 && sizeof($pid)>0){              
            $result = array();                                                                                            
            $result['status']="success";
            $result['message']="Invoice Saved Successfully.";  
            $result['InvoiceID']=md5($id);  
            return json_encode($result); 
        }else {
            $result = array();                                                                                            
            $result['status']="failure";
            $result['message']="Error Invoice Save.";  
            return json_encode($result);
        }
    }
	function MoveCreateInvoice() {
    
    global $mysql;
          
        $CashTwoThousand      =  $_POST['TwoThousand'];
        $CashFiveHundred      =  $_POST['FiveHundred'];
        $CashTwoHundred       =  $_POST['TwoHundred'];
        $CashOneHundred       =  $_POST['OneHundred'];
        $CashFiftyRupees      =  $_POST['FiftyRupees'];
        $CashTwentyRupees     =  $_POST['TwentyRupees'];
        $CashTenRupees        =  $_POST['TenRupees'];
        $Coins                =  $_POST['Coins'];
        
        
        if($_POST['TransactionMode']=="Cash"){
           $TotalCashReceived    =  $_POST['TotalCashReceived'];
           $ReturnCashToCustomer =  $_POST['ReturnCashToCustomer']; 
        }else {
            $TotalCashReceived    =  "0";
            $ReturnCashToCustomer =  "0";
        }
     
       $customer = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$_POST['UserDetails']."'");
       $id = $mysql->insert("invoice_order",array("user_id"                 => $_POST['UserDetails'], 
                                                  "order_receiver_name"     => $customer[0]['CustomerName'],
                                                  "order_receiver_address"  => $customer[0]['AddressLine1'].",".$customer[0]['AddressLine2'].",".$customer[0]['AddressLine3'],
                                                 // "order_total_before_tax"  => $_POST['totalAftertax'],
                                                 //  "order_total_tax"         => $_POST['taxAmount'],
                                                 // "order_tax_per"           => $_POST['taxRate'],
                                                  "order_total_after_tax"   => $_POST['subTotal'],
                                                  "order_amount_paid"       => "0.00",
                                                  "order_total_amount_due"  => $_POST['subTotal'],
                                                  "TransactionMode"           => $_POST['TransactionMode'],
                                                 // "CashTwoThousand"         => $CashTwoThousand,
                                                // "CashFiveHundred"         => $CashFiveHundred,
                                                //  "CashTwoHundred"          => $CashTwoHundred,                           
                                                //  "CashOneHundred"          => $CashOneHundred,
                                                //  "CashFiftyRupees"         => $CashFiftyRupees,
                                                //  "CashTwentyRupees"        => $CashTwentyRupees,
                                                //  "CashTenRupees"           => $CashTenRupees,
                                                //  "Coins"                   => $Coins,
                                                  "TotalCashReceived"       => $TotalCashReceived,
                                                  "ReturnCashToCustomer"    => $ReturnCashToCustomer,
                                                  "note"                    => $_POST['notes']));
       $order_code = "IN". str_pad($id,5,"0",STR_PAD_LEFT);
       $mysql->execute("update invoice_order set order_code='".$order_code."' where order_id='".$id."'");
       $invoiceItems = $mysql->select("SELECT * FROM save_invoice_order_item WHERE order_id = '".$_POST['SavedOrderID']."'");                                          
		foreach($invoiceItems as $invoiceItem){
     $pid= $mysql->insert("invoice_order_item",array("order_id"                 => $id,
                                                  "item_code"                => $invoiceItem['item_code'],
                                                  "item_name"                => $invoiceItem['item_name'],
                                                  "order_item_quantity"      => $invoiceItem['order_item_quantity'],
                                                  "order_item_price"         => $invoiceItem['order_item_price'],
                                                  "order_item_final_amount"  => $invoiceItem['order_item_final_amount']));
}
              $rid= $mysql->insert("receipt",array("order_id"                 => $id,
                                                  "order_date"               => date("Y-m-d H:i:s"),
                                                  "user_id"                  => $customer[0]['CustomerID'],
                                                  "receipt_amount"           => $_POST['AmountPaid'],
                                                  "invoice_due_amount"       => number_format($_POST['subTotal']-$_POST['AmountPaid'],2),
                                                  "receipt_date"             => date("Y-m-d H:i:s")));
              $ReceiptCode = "RT". str_pad($rid,5,"0",STR_PAD_LEFT);
               $mysql->execute("update receipt set receipt_code='".$ReceiptCode."' where ReceiptID='".$rid."'");
                                                  
              $paidamount = $_POST['AmountPaid'];                                                              
              $dueamount  = $_POST['subTotal']-$paidamount;
                   $mysql->execute("update invoice_order set `order_amount_paid`      ='".$paidamount."',
                                                             `order_total_amount_due` ='".$dueamount."',                    
                                                             `receipt_id`             ='".$rid."',
                                                             `receipt_date`             ='".date("Y-m-d H:i:s")."'
                                                              where `order_id`='".$id."'");  
			$mysql->execute("DELETE FROM save_invoice_order where order_id='".$_POST['SavedOrderID']."'");
			$mysql->execute("DELETE FROM save_invoice_order_item where order_id='".$_POST['SavedOrderID']."'");
      if($id>0 && $pid>0){              
            $result = array();                                                                                            
            $result['status']="success";
            $result['message']="Invoice Created Successfully.";  
            $result['InvoiceID']=md5($id);  
            return json_encode($result); 
        }else {
            $result = array();                                                                                            
            $result['status']="failure";
            $result['message']="Error Invoice Creation.";  
            return json_encode($result); 
        }
    }
	function DeleteSavedInvoice() {
    
    global $mysql;
   
      $id=$mysql->execute("DELETE FROM save_invoice_order where order_id='".$_POST['InvoiceID']."'");
          $mysql->execute("DELETE FROM save_invoice_order_item where order_id='".$_POST['InvoiceID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Invoice Deleted.";  
        return json_encode($result);
    }
	
	function UpdateInvoice() {
     
    global $mysql;
          
        $customer = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$_POST['UserDetails']."'");
        $order = $mysql->select("select * from save_invoice_order where order_id='".$_POST['SavedOrderID']."'");
		
		//$mysql->execute("DELETE FROM save_invoice_order_item where order_id='".$_POST['SavedOrderID']."'");
	   
		for ($i = 0; $i < count($_POST['productCode']); $i++) {
			$pid= $mysql->insert("save_invoice_order_item",array("order_id"         	   => $order[0]['order_id'],
																"item_code"        	       => $_POST['productCode'][$i],
																"item_name"                => $_POST['productName'][$i],
																"order_item_quantity"      => $_POST['quantity'][$i],
																"order_item_price"         => $_POST['price'][$i],
																"order_item_final_amount"  => $_POST['total'][$i],
																"SavedByID"  			   => $_SESSION['User']['AdminID'],
																"AddedOn"  			       => date("Y-m-d H:i:s")));
		}
		$mysql->execute("update save_invoice_order set order_total_after_tax	='".$_POST['subTotal']."',
														order_total_amount_due	='".$_POST['subTotal']."',
														LastUpdatedOn		    ='".date("Y-m-d H:i:s")."',
														LastModifiedBy	        ='".$_SESSION['User']['AdminID']."'
														where order_id='".$order[0]['order_id']."'");          
  
      if($pid>0){              
            $result = array();                                                                                            
            $result['status']="success";
            $result['message']="Invoice Saved Successfully.";  
            $result['InvoiceID']=md5($id);  
            return json_encode($result); 
        }else {
            $result = array();                                                                                            
            $result['status']="failure";
            $result['message']="Error Invoice Save.";  
            return json_encode($result);
        }
    }
  /*Invoice */ 
    
?> 
 