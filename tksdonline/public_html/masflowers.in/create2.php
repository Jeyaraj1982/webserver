<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
 


<style>
.ui-state-active h4,
.ui-state-active h4:visited {
  /*  color: #26004d ;  */
  color:black;
}

.ui-menu-item{
    height: 80px;
    border: 1px solid #ececf9;
    color:black;
}                                                                                       
.ui-widget-content .ui-state-active {
    background-color: orange !important;                                                                             
    border: none !important;
}
.list_item_container {
    width:740px;
    height: 80px;
    float: left;
    margin-left: 20px;
}
.ui-widget-content .ui-state-active .list_item_container {
    background-color: green;
}

.label{
    width: 85%;
    float:right;
    white-space: nowrap;
    overflow: hidden;
    color:black;
    color: rgb(124,77,255);
    text-align: left;
}
input:focus{
    background-color: yellow;
}

</style>
<?php
    $checkCustomer = $mysql->select("select * from _tbl_sales_customers where IsActive='1'"); 
    $checkProduct = $mysql->select("select * from _tbl_sales_products where IsPublish='1'");  ?>
   <?php  if(sizeof($checkCustomer)==0){ ?>                                                          
         <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:center">
                                        <img src="http://japps.online/demo/admin/assets/accessdenied.png" style="width: 12%;"><br> <br>
                                        <a href="dashboard.php?action=Customers/add&fr=invoice" class="btn btn-outline-success btn-border">Add Customer</a>
                                    </div>
                                </div>
                            </div>                                                                                             
                        </div>                                                                          
                    </div>
                </div>
            </div>
        </div>
   <?php }else  if(sizeof($checkProduct)==0){ ?>
         <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:center">
                                        <img src="http://japps.online/demo/admin/assets/accessdenied.png" style="width: 12%;"><br> <br>
                                        <a href="dashboard.php?action=Products/add&fr=invoice" class="btn btn-outline-success btn-border">Add Product</a>
                                    </div>
                                </div>
                            </div>                                                                                             
                        </div>                                                                          
                    </div>
                </div>
            </div>
        </div>
   <?php } else {  ?>
<?php 
 if (isset($_POST['invoice_btn'])) {  
     $cstmr = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$_POST['UserDetails']."'");
     $random = rand(100,999);
     $order_code ="IN00".$random;
     
        $CashTwoThousand      =  $_POST['TwoThousand'];
        $CashFiveHundred      =  $_POST['FiveHundred'];
        $CashTwoHundred       =  $_POST['TwoHundred'];
        $CashOneHundred       =  $_POST['OneHundred'];
        $CashFiftyRupees      =  $_POST['FiftyRupees'];
        $CashTwentyRupees     =  $_POST['TwentyRupees'];
        $CashTenRupees        =  $_POST['TenRupees'];
        $Coins                =  $_POST['Coins'];
        $TotalCashReceived    =  $_POST['TotalCashReceived'];
        $ReturnCashToCustomer =  $_POST['ReturnCashToCustomer'];
     
       $id = $mysql->insert("invoice_order",array("user_id"                 => $cstmr[0]['CustomerID'],
                                                  "order_code"              => $order_code,
                                                  "order_receiver_name"     => $cstmr[0]['CustomerName'],
                                                  "order_receiver_address"  => $cstmr[0]['AddressLine1'].",".$cstmr[0]['AddressLine2'].",".$cstmr[0]['AddressLine3'],
                                                 // "order_total_before_tax"  => $_POST['totalAftertax'],
                                                 //  "order_total_tax"         => $_POST['taxAmount'],
                                                 // "order_tax_per"           => $_POST['taxRate'],
                                                  "order_total_after_tax"   => $_POST['subTotal'],
                                                  "order_amount_paid"       => "0.00",
                                                  "order_total_amount_due"  => $_POST['subTotal'],
                                                  "TransactionMode"           => $_POST['TransactionMode'],
                                                  "CashTwoThousand"         => $CashTwoThousand,
                                                  "CashFiveHundred"         => $CashFiveHundred,
                                                  "CashTwoHundred"          => $CashTwoHundred,
                                                  "CashOneHundred"          => $CashOneHundred,
                                                  "CashFiftyRupees"         => $CashFiftyRupees,
                                                  "CashTwentyRupees"        => $CashTwentyRupees,
                                                  "CashTenRupees"           => $CashTenRupees,
                                                  "Coins"                   => $Coins,
                                                  "TotalCashReceived"       => $TotalCashReceived,
                                                  "ReturnCashToCustomer"    => $ReturnCashToCustomer,
                                                  "note"                    => $_POST['notes']));
       $g = $mysql->qry; 
                                                
for ($i = 0; $i < count($_POST['productCode']); $i++) {
     $pid= $mysql->insert("invoice_order_item",array("order_id"                 => $id,
                                                  "item_code"                => $_POST['productCode'][$i],
                                                  "item_name"                => $_POST['productName'][$i],
                                                  "order_item_quantity"      => $_POST['quantity'][$i],
                                                  "order_item_price"         => $_POST['price'][$i],
                                                  "order_item_final_amount"  => $_POST['total'][$i]));
      $f = $mysql->qry;                                                                                           
}
   $ReceiptCode ="RT00".$random; 
              $rid= $mysql->insert("receipt",array("receipt_code"             => $ReceiptCode,
                                                  "order_id"                 => $id,
                                                  "order_date"               => date("Y-m-d H:i:s"),
                                                  "user_id"                  => $cstmr[0]['CustomerID'],
                                                  "receipt_amount"           => $_POST['amountPaid'],
                                                  "invoice_due_amount"       => number_format($_POST['subTotal']-$_POST['amountPaid'],2),
                                                  "receipt_date"             => date("Y-m-d H:i:s")));
                                                  
              $paidamount = $_POST['amountPaid'];                                                              
              $dueamount  = $_POST['subTotal']-$paidamount;
                   $mysql->execute("update invoice_order set `order_amount_paid`      ='".$paidamount."',
                                                             `order_total_amount_due` ='".$dueamount."',                    
                                                             `receipt_id`             ='".$rid."',
                                                             `receipt_date`             ='".date("Y-m-d H:i:s")."'
                                                              where `order_id`='".$id."'");  
      if(sizeof($id)>0 && sizeof($pid)>0){                                                                           
                  $successmessage= $g;   
                 ?>                                                                   
            <script>
            $(document).ready(function() {                                                                        
                successpopup('<?php echo MD5($id);?>','<?php echo $_POST['amountPaid'];?>');
             });
            </script>                                                                                     
     <?php unset($_POST); }else {  ?>
        <script>
             $(document).ready(function() {
                swal({ 
                  title: "Error",
                   text: "Error Create Invoice",
                    type: "error" 
                  });
             });
            </script>
    <?php  }
 }   ?>
<script src="http://japps.online/demo/admin/assets/js/invoice/invoice.js"></script>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">                                                                      
                    <div class="card">
                        <div class="container content-invoice">
                            <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                                <div class="load-animate animated fadeInUp">
                                    <div class="row">
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <h2 class="title">Sales Screen</h2>
                                        </div>
                                    </div><br>
                                    <input id="currency" type="hidden" value="$">                   
                                    <div class="row">
                                        
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right">
                                            <div>
                                                <input type="text" autocomplete="off" id="searchcustomer" class="form-control input-lg" placeholder="Enter Customer Name Here" style="height:auto !important">
                                            </div>
                                            <span class="errorstring" id="ErrUserDetails"><?php echo isset($ErrUserDetails)? $ErrUserDetails : "";?></span>
                                            
                                            <div id="div_customerdetails">
                                            
                                            </div> 
                                            <span class="errorstring" id="Errsearchcustomer"><?php echo isset($ErrUserDetails)? $ErrUserDetails : "";?></span>                                                            
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="AddCustomer()">Add Customer</button> 
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-bordered table-hover" id="invoiceItem">
                                                <tr>
                                                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                                    <th width="38%">Item Name</th>
                                                    <th width="15%">Quantity</th>
                                                    <th width="15%">Price</th>
                                                    <th width="15%">Total</th>
                                                </tr>
                                                
                                            </table> 
                                            <table class="table table-bordered table-hover" id="invoiceItem">
                                                <tr>
                                                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox" disabled="disabled"></th>
                                                    <th width="38%"><input type="text" autocomplete="off" id="search" class="form-control input-lg" placeholder="Enter Product Name Here" style="height:auto !important"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                </tr>
                                                
                                            </table>
                                            <span class="errorstring" id="ErrErrProduct"><?php echo isset($ErrErrProduct)? $ErrErrProduct : "";?></span>                                                      
                                        </div>
                                    </div>
                                    <div class="row">                                                                  
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <!--id="addRows" -->
                                            <button class="btn btn-danger btn-sm delete" id="removeRows" type="button"  style="padding: 0px 10px;">Delete</button>
                                            <!--<button class="btn btn-success btn-sm" type="button" id="addRows" onclick="AddProduct()" style="padding: 0px 10px;"> Add More</button>  -->
                                            <button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="AddNewProduct()">Add Product</button> 
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form> 
                        </div> 
                    </div>                                                                                        
                </div>    
            </div>    
         </div>    
    </div>    
</div>    
<div class="modal fade" id="selectProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">  
            <form acton="" method="post" id="Productselect">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Select Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <!--<select name="product" id="product" class="form-control selectpicker" data-live-search="true">-->       
               <select name="product" id="product" class="form-control">
               <?php $products = $mysql->select("select * from _tbl_sales_products");?>
               <?php foreach($products as $product){ ?>
                    <option value="<?php echo $product['ProductID'];?>" <?php echo ($_POST['product']==$product['ProductID']) ? " selected='selected' " : "";?>><?php echo $product['ProductName'];?>&nbsp;&nbsp;::&nbsp;&nbsp;<?php echo "1".$product['ProductUnitName'];?>&nbsp;&nbsp;::&nbsp;&nbsp;<?php echo"RS .". $product['ProductPrice'];?></option>
               <?php } ?>
               </select>
            </div>                                                                                               
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="selectproduct()">Select</button>
            </div>
            </form>                                                                                                      
    </div>
  </div>
</div>   
<div class="modal fade" id="AddProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body" style="padding:10px;">
                <div style="text-align: center;font-size:15px;">
                    <form method="POST" action="" onsubmit="return SubmitProduct();" id="addProductFrm" enctype="multipart/form-data">
                        <div class="form-group row">                                                                     
                            <div class="col-sm-12" style="text-align:center">
                                Add Product
                            </div>
                       </div>
                        <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">BarCode</label>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <input type="text" class="form-control" id="BarCode" name="BarCode" placeholder="Enter BarCode"  onchange="CheckDuplicateBarCode($(this).val())" value="<?php echo (isset($_POST['BarCode']) ? $_POST['BarCode'] :"");?>">
                                <span class="errorstring" id="ErrBarCode"><?php echo isset($ErrBarCode)? $ErrBarCode : "";?></span>
                            </div>                                                     
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Product Name (In English)<span style="color:red">*</span></label>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <input type="text" class="form-control" id="ProductName" name="ProductName" onchange="CheckDuplicateProductName($(this).val())" placeholder="Enter Product Name In English" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                                <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                            </div>                                                     
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Product Name (In Tamil)</label>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <input type="text" class="form-control" id="ProductNameTamil" name="ProductNameTamil" onchange="CheckDuplicateProductNameTamil($(this).val())" placeholder="Enter Product Name In Tamil" value="<?php echo (isset($_POST['ProductNameTamil']) ? $_POST['ProductNameTamil'] :"");?>">
                                <span class="errorstring" id="ErrProductNameTamil"><?php echo isset($ErrProductNameTamil)? $ErrProductNameTamil : "";?></span>
                            </div>                                                     
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Unit of Measurement<span style="color:red">*</span></label>                   
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <select name="ProductQty" id="ProductQty" class="form-control">
                                    <option value="0" <?php echo ($_POST['ProductQty']=="0") ? " selected='selected' " : "";?>>Select Unit of Measurement</option>
                                    <?php $units = $mysql->select("select * from _tbl_units"); foreach($units as $unit){ ?>
                                    <option value="<?php echo $unit['id'];?>" <?php echo ($_POST['ProductQty']==$unit['id']) ? " selected='selected' " : "";?>> <?php echo $unit['unitname'];?></option>
                                    <?php } ?>
                                </select>  
                                <span class="errorstring" id="ErrProductQty"><?php echo isset($ErrProductQty)? $ErrProductQty : "";?></span>
                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Price Per Unit<span style="color:red">*</span></label>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :"");?>">
                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>
                            </div>
                        </div>
                       <div class="form-group form-show-validation row">
                            <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Product Description</label>
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <textarea class="form-control" id="Description" name="Description" placeholder="Enter Product Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?></textarea>
                                <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                            </div>
                        </div>
                        <div style="padding:20px;text-align:center">'
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-success" onclick="CreateNewProduct()" >Create Product</button>
                         </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>  
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ProductPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xproduct_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>                                                                                                                             
<script>
function successpopup(receiptid,paidamount){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'<img src="http://japps.online/demo/admin/assets/tick.jpg" style="width:30%"><br><span>Invoice Created</span><br>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/view&invoice_id='+receiptid+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function getCustomerDetails(CustomerID,fr) {
        $.ajax({url:'http://japps.online/demo/admin/webservice.php?action=getCustomerDetails&fr='+fr+'&CustomerID='+CustomerID,success:function(data){
            $('#div_customerdetails').html(data);
        }});
    }
    $(document).ready(function () {
     $("#amountPaid").blur(function () {
        var amountPaid = $('#amountPaid').val();
        var totalAftertax = $('#subTotal').val();  
        if(amountPaid && totalAftertax) {
            totalAftertax = totalAftertax-amountPaid;            
            $('#amountDue').val(totalAftertax);
        } else {
            $('#amountDue').val(totalAftertax);
        }
     });   
     });
//Add Customer 
function AddCustomer(){
    var txt = '<form method="post" action="" id="AddCustomerFrm">'                                                                     
               +'<div class="form-group row">'                                                                     
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'Add Customer'
                    +'</div>'
               +'</div>'
               +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Customer Name (In English)<span style="color: red;">*</span></label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="CustomerName" name="CustomerName" onchange="CheckDuplicateCustomerName($(this).val())" placeholder="Enter Customer Name In English" value="">'
                        +'<span class="errorstring" id="ErrCustomerName"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Customer Name (In Tamil)</label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="CustomerNameTamil" name="CustomerNameTamil" onchange="CheckDuplicateCustomerNameTamil($(this).val())" placeholder="Enter Customer Name In Tamil" value="">'
                        +'<span class="errorstring" id="ErrCustomerNameTamil"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Shop Name (In English)<span style="color:red">*</span></label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="ShopName" name="ShopName" placeholder="Enter Shop Name In English" onchange="CheckDuplicateShopName($(this).val())" value="<?php echo (isset($_POST['ShopName']) ? $_POST['ShopName'] :"");?>">'
                        +'<span class="errorstring" id="ErrShopName"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Shop Name (In Tamil)</label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="ShopNameTamil" name="ShopNameTamil" placeholder="Enter Shop Name In Tamil" onchange="CheckDuplicateShopNameTamil($(this).val())" value="<?php echo (isset($_POST['ShopNameTamil']) ? $_POST['ShopNameTamil'] :"");?>">'
                        +'<span class="errorstring" id="ErrShopNameTamil"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Mobile Number<span style="color:red">*</span></label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="MobileNumber" name="MobileNumber" maxlength="10" placeholder="Enter Mobile Number" onchange="CheckDuplicateMobileNumber($(this).val())" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">'
                        +'<span class="errorstring" id="ErrMobileNumber"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Address Line 1<span style="color: red;">*</span></label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :"");?>">'
                        +'<span class="errorstring" id="ErrAddressLine1"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left"></label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="">'
                        +'<span class="errorstring" id="ErrAddressLine2"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div class="form-group form-show-validation row">'
                    +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left"></label>'
                    +'<div class="col-lg-7 col-md-7 col-sm-7">'
                        +'<input type="text" class="form-control" id="AddressLine3" name="AddressLine3" placeholder="Enter Address Line3" value="">'
                        +'<span class="errorstring" id="ErrAddressLine3"></span>'
                    +'</div>'                                                     
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="CreateCustomer()" >Create Customer</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function CreateCustomer() {
        ErrorCount=0; 
        $('#ErrCustomerName').html("");
        $('#ErrShopName').html("");
        $('#ErrMobileNumber').html("");
        $('#ErrEmailID').html("");
        $('#ErrMaximumCreditLimit').html("");
        $('#ErrAddressLine1').html("");
        
        if(IsNonEmpty("CustomerName","ErrCustomerName","Please Enter Customer Name In Tamil")){
           IsAlphaNumeric("CustomerName","ErrCustomerName","Please Enter Alpha Numerics Character"); 
        }
        if(IsNonEmpty("ShopName","ErrShopName","Please Enter Shop Name In Tamil")){
           IsAlphaNumeric("ShopName","ErrShopName","Please Enter Alpha Numerics Character"); 
        }
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
        }
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");   
        if(ErrorCount==0) {  
        var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='http://japps.online/demo/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";                                                                                
            var param = $("#AddCustomerFrm").serialize();
            $("#confrimation_text").html(loading);
            
            $.post( "http://japps.online/demo/admin/webservice.php?action=AddCustomer", param,function( data ) {
                var obj = JSON.parse(data); 
                var html = "";
                if (obj.status=="failure") {    
                    html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='http://japps.online/demo/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="http://japps.online/demo/admin/assets/accessdenied.png" style="width:30%"><br><span>'+obj.message+'</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal">Countinue</button>'
                            +'</div>';
                } else { 
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="http://japps.online/demo/admin/assets/tick.jpg" style="width:30%"><br><span>Customer Added Successfully</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/create&csid='+obj.CustomerID+'\'" >Countinue</button>'
                            +'</div>';     
                    $('#ConfirmationPopup').modal("show");                                     
                }
                $("#confrimation_text").html(html);
            });                                                   
        }else{
            return false;
        }
}          
function CheckDuplicateMobileNumber(MobileNumber) {
        $.ajax({url:'http://japps.online/demo/admin/webservice.php?action=CheckDuplicateMobileNumber&MobileNumber='+MobileNumber,success:function(data){
            $('#ErrMobileNumber').html(data);
        }});
    }
    function getPaidAMountValidation(paidamount) {
        var totalamount= $('#subTotal').val();
        $.ajax({url:'http://japps.online/demo/admin/webservice.php?action=CheckPaidAMountValidation&PaidAmount='+paidamount+'&TotalAmount='+totalamount,success:function(data){
            $('#ErramountPaid').html(data);
        }});
    }
//Add Customer Finished

//Add Product  


function AddNewProduct() {
    $("#AddProductModal").modal('show');                                                                   
}
function CreateNewProduct() {
        ErrorCount=0; 
        $('#ErrProductName').html("");
        $('#ErrProductQty').html("");
        $('#ErrProductPrice').html("");
        $('#ErrDescription').html("");
        
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name In English")){
           IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
        var ProductQty = $('#ProductQty').val().trim();
        if (ProductQty=="0") {
            $('#ErrProductQty').html("Please Select Unit of Measurement");  
            ErrorCount++; 
        }else{
            $('#ErrProductQty').html("");
        }
        
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Price Per Unit")){
           IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
        } 
        if(ErrorCount==0) {  
            $("#AddProductModal").modal('hide');    
        var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='http://japps.online/demo/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";                                                                                
            var param = $("#addProductFrm").serialize();
            $("#xproduct_text").html(loading);
            
            $.post( "http://japps.online/demo/admin/webservice.php?action=AddProduct", param,function( data ) {
                var obj = JSON.parse(data); 
                var html = "";
                if (obj.status=="failure") {    
                    html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='http://japps.online/demo/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="http://japps.online/demo/admin/assets/accessdenied.png" style="width:30%"><br><span>'+obj.message+'</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal">Countinue</button>'
                            +'</div>';
                } else { 
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="http://japps.online/demo/admin/assets/tick.jpg" style="width:30%"><br><span>Product Added Successfully</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<form method="post" id="selectPrduct"><input type="hidden" id="product" Name="product" value="'+obj.ProductID+'"><button type="button" class="btn btn-outline-success" onclick="selectproducts()"  id="addRows">Countinue</button></div>'
                            +'</div>';                                                                   
                    $('#ProductPopup').modal("show");                                                                        
                }
                $("#xproduct_text").html(html);
            });                                                   
        }else{
            return false;
        }
}                                                                                                                                                                              
function CheckDuplicateBarCode(BarCode) {
        $.ajax({url:'http://japps.online/demo/admin/webservice.php?action=CheckDuplicateBarCode&BarCode='+BarCode,success:function(data){
            $('#ErrBarCode').html(data);
        }});
    }
function CheckDuplicateProductName(ProductName) {
        $.ajax({url:'http://japps.online/demo/admin/webservice.php?action=CheckDuplicateProductName&ProductName='+ProductName,success:function(data){
            $('#ErrProductName').html(data);
        }});
    }
function CheckDuplicateProductNameTamil(ProductNameTamil) {
        $.ajax({url:'http://japps.online/demo/admin/webservice.php?action=CheckDuplicateProductNameTamil&ProductNameTamil='+ProductNameTamil,success:function(data){
            $('#ErrProductNameTamil').html(data);
        }});
    }
 
function AddProduct() {
    $("#selectProductModal").modal('show');                                                                    
}
function selectproduct() {
     var param = $( "#Productselect").serialize();
    $.post( "http://japps.online/demo/admin/webservice.php?action=GetProduct",param,function(data) {
        var obj = JSON.parse(data); 
        var html = ""; 
        var count = $(".itemRow").length;                                                              
        
       // var total = obj.ProductPrice*obj.ProductQty;
        
        $("#productCode_"+count).val(obj.ProductID);
        $("#productName_"+count).val(obj.ProductName);
        $("#price_"+count).val(obj.ProductPrice);
        $("#quantity_"+count).val(obj.ProductQty);                                                        
        $("#Unit_"+count).html(obj.ProductUnitName);
      //  $("#total_"+count).val(parseFloat(total));
       $("#quantity_"+count).focus();
       $("#amountPaid").focus();
        $("#selectProductModal").modal('hide');                                                                           
    });
}
function selectproducts() {
    var param = $( "#selectPrduct").serialize();
    $.post( "http://japps.online/demo/admin/webservice.php?action=GetProduct",param,function(data) {
        var obj = JSON.parse(data); 
        var html = ""; 
        var count = $(".itemRow").length;                                                              
        
        $("#productCode_"+count).val(obj.ProductID);
        $("#productName_"+count).val(obj.ProductName);
        $("#price_"+count).val(obj.ProductPrice);
        $("#quantity_"+count).val(obj.ProductQty);                                                        
        $("#Unit_"+count).html(obj.ProductUnitName);
        $("#quantity_"+count).focus();
        $("#amountPaid").focus();
        $("#ProductPopup").modal('hide');                                                                           
    });
}
function selectproductsintext() {
    ErrorCount=0; 
        $('#Errproduct').html("");
        $('#ErrBarCode').html("");
        $('#ErrProductName').html("");
        
        var product = $('#product').val().trim();
        var barcode = $('#BarCode').val().trim();
        var productname = $('#ProductName').val().trim();
        if (product.length==0 && barcode.length==0 && barcode.length==0) {
            $('#ErrProductDetails').html("Please Enter Product ID or BarCode or Product Name");  
            ErrorCount++; 
        }else{
            $('#ErrProductDetails').html("");
            $('.AddPrductTextBtn').removeAttr("disabled");
        }
                                                                                                                    
        if(ErrorCount==0) {                                                                           
            alert(ErrorCount);
            var param = $( "#invoice-form").serialize();
            $.post( "http://japps.online/demo/admin/webservice.php?action=GetTextProduct",param,function(data) {
                var obj = JSON.parse(data); 
                var html = ""; 
                var count = $(".itemRow").length;                                                              
                
                $("#productCode_"+count).val(obj.ProductID);
                $("#productName_"+count).val(obj.ProductName);
                $("#price_"+count).val(obj.ProductPrice);
                $("#quantity_"+count).val(obj.ProductQty);                                                         
                $("#Unit_"+count).html(obj.ProductUnitName);
                $("#quantity_"+count).focus();
                $("#amountPaid").focus();
            });
        }else{
            return false;
        }
}
// Add Product Finished

//Create Invoice
function CallConfirmation(){
    ErrorCount=0; 
    var Customer = $('#searchcustomer').val().trim();
       if (Customer=="0") {
            $('#Errsearchcustomer').html("Please Select Customer");                                                    
            ErrorCount++;                                                                                      
        }
    var amountpaid = $('#amountPaid').val().trim();
       if (amountpaid.length==0) {
            $('#ErramountPaid').html("Please Enter Paid Amount"); 
            ErrorCount++;
        }
    var TransactionMode = $('#TransactionMode').val().trim();
       if (TransactionMode=="0") {
            $('#ErrTransactionMode').html("Please Select Transaction Mode"); 
            ErrorCount++;
        }
    
    if(ErrorCount==0) {
    var txt = '<div class="form-group row">'                                                                     
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to create invoice?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="CreateInvoice()" >Yes, Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }else{
            return false;
        }
}
function CreateInvoice() { 
    $("#invoice_btn" ).trigger( "click" );
}  
 $(document).ready(function () {  
    $("#searchcustomer").blur(function () {
        $('#Errsearchcustomer').html("");
        var Customer = $('#searchcustomer').val().trim();
       if (Customer=="0") {
            $('#Errsearchcustomer').html("Please Select Customer"); 
        }                                                                                                                  
    });                
      getCustomerDetails('<?php echo $_GET['csid'];?>','1');
      
      var product = $('#product').val().trim();
        var barcode = $('#BarCode').val().trim();
        var productname = $('#ProductName').val().trim();
        if(!(product.length==0 || barcode.length==0 || barcode.length==0)){
            $('.AddPrductTextBtn').removeAttr("disabled");
        }
 });
 function CheckTransactionMode(){
     if($('#TransactionMode').val()=="Cash"){
        $("#CashModeAdditionalInformation").show();                                                                   
     }else {
        $("#CashModeAdditionalInformation").hide(); 
     }
 }
 function CashReceived(){
    $('#TotalCashReceived').val(1*$('#Coins').val()+20*$('#TwentyRupees').val()+10*$('#TenRupees').val()+50*$('#FiftyRupees').val()+100*$('#OneHundred').val()+200*$('#TwoHundred').val()+500*$('#FiveHundred').val()+2000*$('#TwoThousand').val()); 
    $('#ReturnCashToCustomer').val($('#subTotal').val()-$('#TotalCashReceived').val()); 
 }
 
</script>

<script type="text/javascript">
$(document).ready(function(){  
                                      
    $("#search").autocomplete({
        source: "webservice.php?action=GetProductName",
            focus: function( event, ui ) {
            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
            return false;
        },
        select: function( event, ui ) {
            //window.location.href = ui.item.url;      
            SelectProduct(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
       // var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="label"><h4><b>' + item.ProductName + '</b></h4></div></div></a>';
        var inner_html = '<div onclick="SelectProduct('+ item +')">' + item.ProductNameTamil + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
      $("#searchcustomer").autocomplete({
        source: "webservice.php?action=GetCustomerName&fr=1",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectCustomer(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
       // var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="label"><h4><b>' + item.ProductName + '</b></h4></div></div></a>';
        var inner_html = '<div onclick="SelectCustomer('+ item +')">' + item.CustomerName + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
});
function SelectProduct(obj) {
    
        var count = $(".itemRow").length;                                                              
        
        count++;
        var htmlRows = '';
        htmlRows += '<tr>';
        htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
        htmlRows += '<td><input type="hidden" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="text" readonly="readonly" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"></td>';    
        htmlRows += '<td><div class="input-group">'
                            htmlRows += '<input type="text" name="quantity[]" onkeypress="SwitchBox(event)" id="quantity_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:center">'
                            htmlRows += '<div class="input-group-append">'
                                htmlRows += '<div class="input-group-text" id="Unit_'+count+'"></div>'
                            htmlRows += '</div>'
        htmlRows += '</div></td>';
        htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:center"></td>';         
        htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right"></td>';          
        htmlRows += '</tr>';
        $('#invoiceItem').append(htmlRows);
        
        $("#productCode_"+count).val(obj.ProductID);
        $("#productName_"+count).val(obj.ProductNameTamil);
        $("#price_"+count).val(obj.ProductPrice);
        $("#quantity_"+count).val('1');                                                        
        $("#Unit_"+count).html(obj.ProductUnitName);                                                 
      //  $("#total_"+count).val(parseFloat(total));
       $("#quantity_"+count).focus();
       $("#amountPaid").focus();
}
function SelectCustomer(obj) {
    
        var htmlRows = '<div class="form-group">';
                htmlRows += obj.CustomerName;
                htmlRows += '<br>';
                htmlRows += obj.ShopName;
                htmlRows += '<br>';
                htmlRows += obj.MobileNumber;
                htmlRows += '<br>';
                htmlRows += obj.EmailID;
                htmlRows += '<br>';
                htmlRows += obj.AddressLine1;
                htmlRows += '<br>';
                htmlRows += obj.AddressLine2;
                htmlRows += '<br>';
                htmlRows += obj.AddressLine3; 
                htmlRows += '<br>';
        $("#searchcustomer").val(obj.CustomerID); 
        $("#div_customerdetails").html(htmlRows); 
} 
function SwitchBox(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == '13'){ 
        $("#search").focus(); 
        
    }
    
}
</script> 
<?php } //div_customerdetails ?> 