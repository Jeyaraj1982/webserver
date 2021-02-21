<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
<style>
.ui-state-active h4,
.ui-state-active h4:visited {
   
  color:black;
}

.ui-menu-item{
    height: 40px;
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
                                        <img src="https://masflowers.in/admin/assets/accessdenied.png" style="width: 12%;"><br> <br>
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
                                        <img src="https://masflowers.in/admin/assets/accessdenied.png" style="width: 12%;"><br> <br>
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
$cstmr = $mysql->select("select * from _tbl_sales_customers where md5(CustomerID)='".$_GET['csid']."'");
?>
  <script type="text/javascript" src="assets/js/google_jsapi.js"></script>
<script type="text/javascript">
   google.load("elements", "1", {
            packages: "transliteration"          });
      function onLoad() {
        var options = {
          sourceLanguage: 'en',
          destinationLanguage: ['ta'], 
          shortcutKey: 'ctrl+g',
          transliterationEnabled: true        };
             var control =
            new google.elements.transliteration.TransliterationControl(options);
        var ids = ["CustomerNameTamil","ShopNameTamil"];
        control.makeTransliteratable(ids);
        //control.showControl('translControl'); 
         control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
        }
      google.setOnLoadCallback(onLoad);
</script>
<script src="https://masflowers.in/admin/assets/js/invoice/invoice.js"></script>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">                                                                      
                    <div class="card">
                        <div class="container content-invoice">
                        
                            <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                            <input type="hidden" name="TransactionMode" id="TransactionMode" class="form-control">
                            <input type="hidden" name="AmountPaid" id="AmountPaid" class="form-control">
                            <input type="hidden" name="TotalCashReceived" id="TotalCashReceived" class="form-control">
                            <input type="hidden" name="ReturnCashToCustomer" id="ReturnCashToCustomer" class="form-control">
                                <div class="load-animate animated fadeInUp">
                                    <div class="row">
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <h2 class="title">Sales Screen</h2>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="UserDetails" id="UserDetails" value="<?php echo (isset($_POST['UserDetails']) ? $_POST['UserDetails'] : $cstmr[0]['CustomerID']);?>">
                                    <input id="currency" type="hidden" value="$">                   
                                    <div class="row" id="SearchCustomerDiv">
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right">
                                                
                                                <input type="text" autocomplete="off" id="searchcustomer" class="form-control input-lg" placeholder="Enter Customer Name Here" style="height:auto !important">
                                                <span class="errorstring" id="Errsearchcustomer"><?php echo isset($ErrUserDetails)? $ErrUserDetails : "";?></span>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                <button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="AddCustomer()">Add Customer</button> 
                                            </div>                                                          
                                   </div> 
                                   <div class="row">  
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
                                            <div id="div_customerdetails">
                                                                                                         
                                            </div> 
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
                                            <span class="errorstring" id="ErrProduct"><?php echo isset($ErrProduct)? $ErrProduct : "";?></span>                                                      
                                        </div>
                                    </div>
                                    <div class="row">                                                                  
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <!--id="addRows" -->
                                            <button class="btn btn-danger btn-sm delete" id="removeRows" type="button"  style="padding: 0px 10px;">Delete</button>
                                            <!--<button class="btn btn-success btn-sm" type="button" id="addRows" onclick="AddProduct()" style="padding: 0px 10px;"> Add More</button>  -->
                                            <button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="AddNewProduct()">Add Product</button> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                                <div class="form-group row">
                                                    <div class="col-sm-8" style="text-align: right;"><label>Subtotal:  </label></div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Rs</span>
                                                            </div>
                                                            <input type="text" value="<?php echo (isset($_POST['subTotal']) ? $_POST['subTotal'] :"0.00");?>" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal" readonly="readonly" style="text-align: right;">
                                                        </div>
                                                        <span class="errorstring" id="ErrsubTotal"><?php echo isset($ErrsubTotal)? $ErrsubTotal : "";?></span>
                                                    </div>
                                                </div>
                                               <!-- 
                                                <div class="form-group row">
                                                    <div class="col-sm-8" style="text-align: right;"><label>Amount Due:  </label></div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Rs</span>
                                                            </div>
                                                            <input type="text" value="<?php echo (isset($_POST['amountDue']) ? $_POST['amountDue'] :"0.00");?>" class="form-control" name="amountDue" readonly="readonly" id="amountDue" placeholder="Amount Due" style="text-align: right;">
                                                        </div>
                                                        <span class="errorstring" id="ErramountDue"><?php echo isset($ErramountDue)? $ErramountDue : "";?></span>
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:right"> 
                                            <button type="button" class="btn btn-success" onclick="CallConfirmationCashSale()">Cash Sale</button>
                                            <button type="button" class="btn btn-outline-success" onclick="CallConfirmationCreditSale()">Credit Sale</button>
                                            <button type="button" style="display:none" id="invoice_btn" name="invoice_btn" class="btn btn-success">Create Invoice</button>
                                            <button type="button" class="btn btn-warning" onclick="CallConfirmationCancel()">Cancel</button>
                                        </div>
                                    </div>
                                    <br><br>                             
                                </div>
                                <div class="clearfix"></div>
                            </form> 
                        </div> 
                    </div>                                                                                        
                </div>                                                                                            
            </div>    
         </div>    
    </div>    
</div>    
<div class="modal fade right" id="customermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" style="float: right;margin-top:0px;margin-right:-15px;max-width:650px;min-width:650px">
        <div class="modal-content" >
        <div id="customerconfrimation_text"></div>
        </div>
      </div>
    </div>
<div class="modal fade right" id="selectProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
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
<div class="modal fade" id="AddProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static" style="top:0px !important">
    <div class="modal-dialog modal-dialog-centered" role="document" style="float: right;margin-top:0px;margin-right:-15px;max-width:650px;min-width:650px">
        <div class="modal-content">
            <form method="POST" action="" onsubmit="return SubmitProduct();" id="addProductFrm" enctype="multipart/form-data">
                 <div class="modal-header" style="background:blue;color:white">
                    <h4 class="heading"><strong>Add Product</strong> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
                    <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group form-show-validation row"> 
                        <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">BarCode</label>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <input type="text" class="form-control" onkeypress="SwitchPN(event)"  id="BarCode" name="BarCode" placeholder="Enter BarCode"  onchange="CheckDuplicateBarCode($(this).val())" value="<?php echo (isset($_POST['BarCode']) ? $_POST['BarCode'] :"");?>">
                            <span class="errorstring" id="ErrBarCode"><?php echo isset($ErrBarCode)? $ErrBarCode : "";?></span>
                        </div>                                                     
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Product Name (In English)<span style="color:red">*</span></label>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <input type="text" class="form-control" onkeypress="SwitchPNT(event)" id="ProductName" name="ProductName" onchange="CheckDuplicateProductName($(this).val())" placeholder="Enter Product Name In English" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                            <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                        </div>                                                     
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Product Name (In Tamil)</label>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <input type="text" class="form-control" id="ProductNameTamil" onkeypress="SwitchPQY(event)" name="ProductNameTamil" onchange="CheckDuplicateProductNameTamil($(this).val())" placeholder="Enter Product Name In Tamil" value="<?php echo (isset($_POST['ProductNameTamil']) ? $_POST['ProductNameTamil'] :"");?>">
                            <span class="errorstring" id="ErrProductNameTamil"><?php echo isset($ErrProductNameTamil)? $ErrProductNameTamil : "";?></span>
                        </div>                                                     
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Unit of Measurement<span style="color:red">*</span></label>                   
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <select name="ProductQty" id="ProductQty" class="form-control" onkeypress="SwitchPPU(event)" >
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
                            <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" onkeypress="SwitchPDS(event)"  placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :"");?>">
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
                </div>
                <div class="modal-footer flex-right">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-primary" onclick="CreateNewProduct()" >Create Product</button>
                 </div>
            </form>
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
                        +'<img src="https://masflowers.in/admin/assets/tick.jpg" style="width:30%"><br><span>Invoice Created</span><br>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/view&invoice_id='+receiptid+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 
//Add Customer 
/*function AddCustomer(){
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
        var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='http://masflowers.in/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";                                                                                
            var param = $("#AddCustomerFrm").serialize();
            $("#confrimation_text").html(loading);
            
            $.post( "http://masflowers.in/admin/webservice.php?action=AddCustomer", param,function( data ) {
                var obj = JSON.parse(data); 
                var html = "";
                if (obj.status=="failure") {    
                    html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='http://masflowers.in/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="http://masflowers.in/admin/assets/accessdenied.png" style="width:30%"><br><span>'+obj.message+'</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal">Countinue</button>'
                            +'</div>';
                } else { 
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="http://masflowers.in/admin/assets/tick.jpg" style="width:30%"><br><span>Customer Added Successfully</span>'
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
}    */

function AddCustomer(){
    var txt = '<form method="post" action="" id="AddCustomerFrm">'                                                                     
                    +'<div class="modal-header" style="background:blue;color:white">'
                        +'<h4 class="heading"><strong>Add Customer</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                        +'<span aria-hidden="true" class="white-text">&times;</span>'
                        +'</button>'
                    +'</div>'
                    +'<div class="modal-body">'                                                                     
                           +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Customer Name (In English)<span style="color: red;">*</span></label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'
                                    +'<input type="text" class="form-control" id="CustomerName" name="CustomerName" placeholder="Enter Customer Name In English" value="" onkeypress="SwitchCNT(event)">'
                                    +'<span class="errorstring" id="ErrCustomerName"></span>'
                                +'</div>'                                                     
                            +'</div>'
                            +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Customer Name (In Tamil)</label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'
                                    +'<input type="text" class="form-control" id="CustomerNameTamil" name="CustomerNameTamil" placeholder="Enter Customer Name In Tamil" value="" onkeypress="SwitchCSN(event)">'
                                    +'<span class="errorstring" id="ErrCustomerNameTamil"></span>'
                                +'</div>'                                                     
                            +'</div>'
                            +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Shop Name (In English)<span style="color:red">*</span></label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'
                                    +'<input type="text" class="form-control" id="ShopName" name="ShopName" placeholder="Enter Shop Name In English" onkeypress="SwitchCSNT(event)" value="<?php echo (isset($_POST['ShopName']) ? $_POST['ShopName'] :"");?>">'
                                    +'<span class="errorstring" id="ErrShopName"></span>'
                                +'</div>'                                                     
                            +'</div>'
                            +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Shop Name (In Tamil)</label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'
                                    +'<input type="text" class="form-control" id="ShopNameTamil" name="ShopNameTamil" onkeypress="SwitchCMN(event)" placeholder="Enter Shop Name In Tamil" value="<?php echo (isset($_POST['ShopNameTamil']) ? $_POST['ShopNameTamil'] :"");?>">'
                                    +'<span class="errorstring" id="ErrShopNameTamil"></span>'
                                +'</div>'                                                     
                            +'</div>'
                            +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Mobile Number<span style="color:red">*</span></label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'
                                    +'<input type="text" class="form-control" id="MobileNumber" name="MobileNumber" onkeypress="SwitchCAL1(event)" maxlength="10" placeholder="Enter Mobile Number" onchange="CheckDuplicateMobileNumber($(this).val())" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">'
                                    +'<span class="errorstring" id="ErrMobileNumber"></span>'
                                +'</div>'                                                     
                            +'</div>'
                            +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left">Address Line 1<span style="color: red;">*</span></label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'
                                    +'<input type="text" class="form-control" id="AddressLine1" name="AddressLine1" onkeypress="SwitchCAL2(event)" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :"");?>">'
                                    +'<span class="errorstring" id="ErrAddressLine1"></span>'
                                +'</div>'                                                     
                            +'</div>'
                            +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left"></label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'
                                    +'<input type="text" class="form-control" id="AddressLine2" name="AddressLine2" onkeypress="SwitchCAL3(event)" placeholder="Enter Address Line2" value="">'
                                    +'<span class="errorstring" id="ErrAddressLine2"></span>'
                                +'</div>'                                                     
                            +'</div>'
                            +'<div class="form-group form-show-validation row">'
                                +'<label for="name" class="col-lg-5 col-md-5 col-sm-5 mt-sm-2 text-left"></label>'
                                +'<div class="col-lg-7 col-md-7 col-sm-7">'                               
                                    +'<input type="text" class="form-control" id="AddressLine3" name="AddressLine3"  placeholder="Enter Address Line3" value="">'
                                    +'<span class="errorstring" id="ErrAddressLine3"></span>'
                                +'</div>'                                                     
                            +'</div>' 
                    +'</div>'
                    +'<div class="modal-footer flex-right">'
                        +'<button type="button" class="btn btn-outline-primary" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-primary" onclick="CreateCustomer()" >Create Customer</button>'
                 +'</div>';
                   
      //  $('#xconfrimation_text').html(txt);                                       
        $('#customerconfrimation_text').html(txt);                                       
       // $('#ConfirmationPopup').modal("show");
        $('#customermodal').modal("show");
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
        var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://masflowers.in/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";                                                                                
            var param = $("#AddCustomerFrm").serialize();
            $("#confrimation_text").html(loading);
            
            $.post( "webservice.php?action=AddCustomer", param,function( data ) {
                var obj = JSON.parse(data); 
                var html = "";
                if (obj.status=="failure") {    
                    html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://masflowers.in/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="https://masflowers.in/admin/assets/accessdenied.png" style="width:30%"><br><span>'+obj.message+'</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal">Countinue</button>'
                            +'</div>';
                } else { 
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="https://masflowers.in/admin/assets/tick.jpg" style="width:30%"><br><span>Customer Added Successfully</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/create&csid='+obj.CustomerID+'\'" >Countinue</button>'
                            +'</div>';     
                    $('#customermodal').modal("show");    
                    // $('#ConfirmationPopup').modal("show"); 
                }                                        
                //$("#confrimation_text").html(html);
        $('#customerconfrimation_text').html(html);                                       
            });                                                   
        }else{
            return false;                                                                                                 
        }
}       
function CheckDuplicateMobileNumber(MobileNumber) {
        $.ajax({url:'webservice.php?action=CheckDuplicateMobileNumber&MobileNumber='+MobileNumber,success:function(data){
            $('#ErrMobileNumber').html(data);
        }});
    }                                                        
function getPaidAMountValidation(paidamount) {
        var totalamount= $('#subTotal').val();
        $.ajax({url:'webservice.php?action=CheckPaidAMountValidation&PaidAmount='+paidamount+'&TotalAmount='+totalamount,success:function(data){
            $('#ErramountPaid').html(data);
        }});
    }
function getCustomerDetails(CustomerID,fr) {   
        $.ajax({url:'/webservice.php?action=getCustomerDetails&fr='+fr+'&CustomerID='+CustomerID,success:function(data){        
            $('#div_customerdetails').html(data);
        $("#Errsearchcustomer").html(""); 
        }});
    }
//Add Customer Finished
                                                                                                          
//Add Product  


function AddNewProduct() {    
    $('#BarCode').html("");
    $('#ProductName').html("");
    $('#ProductNametamil').html("");
    $('#ProductQty'). val("0");                                                                      
    $('#ProductPrice').html("");
    $('#Description').html("");
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
        var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://masflowers.in/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";                                                                                
            var param = $("#addProductFrm").serialize();
            $("#xproduct_text").html(loading);
            
            $.post( "webservice.php?action=AddProduct", param,function( data ) {
                var obj = JSON.parse(data); 
                var html = "";
                if (obj.status=="failure") {    
                    html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://masflowers.in/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="https://masflowers.in/admin/assets/accessdenied.png" style="width:30%"><br><span>'+obj.message+'</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal">Countinue</button>'
                            +'</div>';
                } else { 
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="https://masflowers.in/admin/assets/tick.jpg" style="width:30%"><br><span>Product Added Successfully</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<form method="post" id="selectPrduct"><input type="hidden" id="product" Name="product" value="'+obj.ProductID+'"><button type="button" class="btn btn-outline-success" onclick="selectproduct()"  >Countinue</button></div>'
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
        $.ajax({url:'admin/webservice.php?action=CheckDuplicateBarCode&BarCode='+BarCode,success:function(data){
            $('#ErrBarCode').html(data);
        }});
    }
function CheckDuplicateProductName(ProductName) {
        $.ajax({url:'webservice.php?action=CheckDuplicateProductName&ProductName='+ProductName,success:function(data){
            $('#ErrProductName').html(data);
        }});
    }
function CheckDuplicateProductNameTamil(ProductNameTamil) {
        $.ajax({url:'webservice.php?action=CheckDuplicateProductNameTamil&ProductNameTamil='+ProductNameTamil,success:function(data){
            $('#ErrProductNameTamil').html(data);
        }});
    }
function AddProduct() {
    $("#selectProductModal").modal('show');                                                                    
}
function selectproduct() {  
    var param = $( "#selectPrduct").serialize();
         $.post( "webservice.php?action=GetProduct",param,function(data) {
        var count = $(".itemRow").length;      
        var obj = JSON.parse(data); 
        count++;
        var htmlRows = '';
        htmlRows += '<tr>';
        htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
        htmlRows += '<td><input type="hidden" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="text" readonly="readonly" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"></td>';    
        htmlRows += '<td><div class="input-group">'
                            htmlRows += '<input type="text" name="quantity[]" onkeypress="SwitchamountBox(event)" id="quantity_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:center">'
                            htmlRows += '<div class="input-group-append">'
                                htmlRows += '<div class="input-group-text" id="Unit_'+count+'"></div>'
                            htmlRows += '</div>'
        htmlRows += '</div></td>';
        htmlRows += '<td style="text-align:right"><input type="text" name="price[]" onkeypress="SwitchproductBox(event)" id="price_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:right"></td>';         
        htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right"></td>';          
        htmlRows += '</tr>';
        $('#invoiceItem').append(htmlRows);
                                                                                                        
        $("#productCode_"+count).val(obj.ProductID);
        $("#productName_"+count).val(obj.ProductNameTamil);
        $("#price_"+count).val(obj.ProductPrice);
        $("#quantity_"+count).val('1');                                                             
        $("#Unit_"+count).html(obj.ProductUnitName);                                                 
       $("#quantity_"+count).focus();
       $("#ProductPopup").modal('hide');  
         });
}   
    
function selectproducts() {
    var param = $( "#selectPrduct").serialize();
    $.post( "webservice.php?action=GetProduct",param,function(data) {
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
// Add Product Finished
 
//Create Invoice
function CallConfirmationCancel(){
     var txt = '<div class="form-group row">'                                                                     
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to cancel create invoice?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-warning" onclick="location.href=\'dashboard.php?action=Invoice/list\'" >Yes, Confirm</button>'
                 +'</div>';  
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}

function CallConfirmationCashSale(){
    ErrorCount=0; 
    
    var Customer = $('#UserDetails').val().trim();
       if (Customer.length==0) {
            $('#Errsearchcustomer').html("Please Select Customer");                                                    
            ErrorCount++;                                                                                      
        }
   var count = $(".itemRow").length; 
       if (count==0) {
            $('#ErrProduct').html("Please Select Product");                                                    
            ErrorCount++;                                                                                      
        }/*else {
           if (count>10) {
            $('#ErrProduct').html("Please Select Less Than 10 Product");                                                    
            ErrorCount++;                                                                                      
        } 
        }*/
    
   
    if(ErrorCount==0) {
            $('#TransactionMode').val("Cash");  
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
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<label>Invoice Amount</label>'
                        +'<div class="input-group">'                                                              
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1">Rs</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#subTotal').val()+'" disabled="disabled" class="form-control" name="InvoiceAmount" id="InvoiceAmount" placeholder="Invoice Amount" style="text-align: right;">'
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<label>Amount Paid</label>'
                        +'<div class="input-group">'                                                              
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1">Rs</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#subTotal').val()+'" disabled="disabled" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid" style="text-align: right;">'
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<label>Received Amount</label>'
                        +'<div class="input-group">'                                                                                                             
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1">Rs</span>'
                            +'</div>'                                                                                                                                    
                            +'<input type="text" class="form-control" name="ReceivedAmount" id="ReceivedAmount" placeholder="Received Amount" style="text-align: right;" onchange="CashSaleAmountReceivedVal($(this).val())">'
                        +'</div>'
                        +'<span class="errorstring" id="ErrReceivedAmount"></span>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<label>Re-Pay Amount</label>'
                        +'<div class="input-group">'                                                              
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1">Rs</span>'
                            +'</div>'
                            +'<input type="text" disabled="disabled" class="form-control" name="ReturnAmount" id="ReturnAmount" placeholder="Payable Amount" style="text-align: right;">'
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="CreateInvoice(\'Cash\')" >Yes, Confirm</button>'
                 +'</div>';  
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }else{                                                                                                                    
            return false;
        }
}
function CallConfirmationCreditSale(){
    ErrorCount=0; 
    
    var Customer = $('#UserDetails').val().trim();
       if (Customer.length==0) {                                                                                 
            $('#Errsearchcustomer').html("Please Select Customer");                                                    
            ErrorCount++;                                                                                      
        }
   var count = $(".itemRow").length; 
       if (count==0) {
            $('#ErrProduct').html("Please Select Product");                                                    
            ErrorCount++;                                                                                      
        }/*else {
           if (count>10) {
            $('#ErrProduct').html("Please Select Less Than 10 Product");                                                    
            ErrorCount++;                                                                                      
        } 
        }*/
    
   
    if(ErrorCount==0) {
            $('#TransactionMode').val("Credit"); 
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
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<label>Invoice Amount</label>'
                        +'<div class="input-group">'                                                              
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1">Rs</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#subTotal').val()+'" disabled="disabled" class="form-control" name="InvoiceAmount" id="InvoiceAmount" placeholder="Invoice Amount" style="text-align: right;">'
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'                                                                                                
                        +'<label>Amount Paid</label>'
                        +'<div class="input-group">'                                                              
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1">Rs</span>'
                            +'</div>'
                            +'<input type="text" class="form-control" name="CreditAmount" id="CreditAmount" placeholder="Amount Paid" style="text-align: right;" onchange="CreditSaleAmountReceivedVal($(this).val())">'
                        +'</div>'
                        +'<span class="errorstring" id="ErrCreditAmount"></span>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<label>Payable Amount</label>'
                        +'<div class="input-group">'                                                              
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1">Rs</span>'
                            +'</div>'
                            +'<input type="text" disabled="disabled" class="form-control" name="PayableAmount" id="PayableAmount" placeholder="Payable Amount" style="text-align: right;">'
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="CreateInvoice(\'Credit\')" >Yes, Confirm</button>'
                 +'</div>';
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }else{                                                                                                                    
            return false;
        }
}
function CreateInvoice(Sale) {  
    ErrorCount=0; 
   
    if(Sale=="Cash"){
       var InvoiceAmount = $('#InvoiceAmount').val().trim();
       
       var ReceivedAmount = $('#ReceivedAmount').val().trim();                                            
       if (ReceivedAmount.length==0) {
            $('#ErrReceivedAmount').html("Please Enter Received Amount");                                                    
            ErrorCount++;                                                                                      
        }
        if($('#ReturnAmount').val().trim() < 0){ 
               $('#ErrReceivedAmount').html("Please Enter Greater than or Equal To Invoice Amount");                                                    
               ErrorCount++;                                                                                
            }
            
    }if(Sale=="Credit") {
        var InvoiceAmount = $('#InvoiceAmount').val().trim();
       
        var CreditAmount = $('#CreditAmount').val().trim();
       if (CreditAmount.length==0) {
            $('#ErrCreditAmount').html("Please Enter Paid Amount");                                                    
            ErrorCount++;                                                                                        
        }
        if($('#PayableAmount').val().trim() < 0){ 
               $('#ErrCreditAmount').html("Please Enter Less than or Equal To Invoice Amount");                                                    
               ErrorCount++;                                                                                
            }
    }
     
     if(ErrorCount==0) {
         
        if(Sale=="Cash"){
        $('#ReturnCashToCustomer').val($('#ReturnAmount').val());  
        $('#TotalCashReceived').val($('#ReceivedAmount').val());
        $('#AmountPaid').val($('#amountPaid').val());                                                 
        }else {
          $('#AmountPaid').val($('#CreditAmount').val());  
        }  
       // $("#invoice_btn" ).trigger( "click" );
       
       var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://masflowers.in/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";                                                                                
            var param = $("#invoice-form").serialize();
            $("#xconfrimation_text").html(loading);
            
            $.post( "webservice.php?action=CreateInvoice", param,function( data ) {
                var obj = JSON.parse(data); 
                var html = "";
                if (obj.status=="failure") {    
                    html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://masflowers.in/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="https://masflowers.in/admin/assets/accessdenied.png" style="width:30%"><br><span>'+obj.message+'</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal">Countinue</button>'
                            +'</div>';
                } else { 
                    html = '<div class="form-group row">'
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'<img src="https://masflowers.in/admin/assets/tick.jpg" style="width:30%"><br><span>'+obj.message+'</span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="padding:20px;text-align:center">'
                                +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/view&invoice_id='+obj.InvoiceID+'\'" >Countinue</button>'
                            +'</div>';                                                                   
                    $('#ConfirmationPopup').modal("show");                                                                        
                }
                $("#xconfrimation_text").html(html);
            });         
    }else{
        return false;
    }
}  
function CashSaleAmountReceivedVal(){
       $('#ReturnAmount').val($('#ReceivedAmount').val()-$('#InvoiceAmount').val());  
 }
 function CreditSaleAmountReceivedVal(){
       $('#PayableAmount').val($('#InvoiceAmount').val()-$('#CreditAmount').val());                        
 }

 $(document).ready(function () {  
    $("#searchcustomer").blur(function () {
        $('#Errsearchcustomer').html("");
        var Customer = $('#searchcustomer').val().trim();
       if (Customer=="0") {
            $('#Errsearchcustomer').html("Please Select Customer"); 
        }                                                                                                                  
    });                
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
     getCustomerDetails('<?php echo $_GET['csid'];?>','1');   
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
            return false;
        },
        select: function( event, ui ) {
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
                            htmlRows += '<input type="text" name="quantity[]" onkeypress="SwitchamountBox(event)" id="quantity_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:center">'
                            htmlRows += '<div class="input-group-append">'
                                htmlRows += '<div class="input-group-text" id="Unit_'+count+'"></div>'
                            htmlRows += '</div>'
        htmlRows += '</div></td>';
        htmlRows += '<td style="text-align:right"><input type="text" name="price[]" onkeypress="SwitchproductBox(event)" id="price_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:right"></td>';         
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
     //  $("#amountPaid").focus();                
}
function SelectCustomer(obj) {
    
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div class="col-sm-6">';
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
                    htmlRows += '<button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="ChangeCustomer()">change Customer</button>&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-sm" style="padding: 0px 10px;" onclick="AddCustomer()">Add Customer</button> ';
                htmlRows += '</div>';
                htmlRows += '<div class="col-sm-6">';
                    htmlRows += 'Outstanding Amount : '+obj.OutstandingAmount;
                htmlRows += '</div>';
        
        $("#UserDetails").val(obj.CustomerID); 
        $("#div_customerdetails").html(htmlRows); 
        $("#SearchCustomerDiv").hide(); 
        $("#Errsearchcustomer").html(""); 
        
}
function ChangeCustomer() {
   $("#SearchCustomerDiv").show(); 
   $("#div_customerdetails").html(""); 
   $("#UserDetails").val(""); 
}
function SwitchamountBox(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == '13'){ 
        var count = $(".itemRow").length; 
        $("#price_"+count).focus(); 
        
    }
}                                                                                                          
function SwitchproductBox(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        var count = $(".itemRow").length; 
        $("#search").focus(); 
        
    }
}
/*Add Customer */
function SwitchCNT(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#CustomerNameTamil").focus(); 
        
    }
}
function SwitchCSN(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#ShopName").focus(); 
        
    }
}function SwitchCSNT(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#ShopNameTamil").focus(); 
        
    }
}function SwitchCMN(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#MobileNumber").focus(); 
        
    }
}function SwitchCAL1(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#AddressLine1").focus(); 
        
    }
}function SwitchCAL2(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#AddressLine2").focus(); 
        
    }
}function SwitchCAL3(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#AddressLine3").focus(); 
        
    }
}function SwitchPN(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#ProductName").focus(); 
        
    }
}function SwitchPNT(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#ProductNameTamil").focus(); 
        
    }
}function SwitchPQY(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#ProductQty").focus(); 
        
    }
}function SwitchPPU(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#ProductPrice").focus(); 
        
    }
}function SwitchPDS(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == 13){ 
        $("#Description").focus(); 
        
    }
}

</script> 
<?php } //div_customerdetails ?> 