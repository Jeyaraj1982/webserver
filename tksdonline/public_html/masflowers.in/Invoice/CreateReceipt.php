<?php 
    $invoiceValues  = $mysql->select("SELECT * FROM invoice_order WHERE md5(order_id) = '".$_GET['invoice_id']."'");
    $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues[0]['order_date'])); 
    $invoiceItems = $mysql->select("SELECT * FROM invoice_order_item WHERE order_id = '".$invoiceValues[0]['order_id']."'"); 
     if (isset($_POST['receipt_btn'])) {
         $ErrorCount =0;
            if($_POST['ReceiptAmount']==""){
                $ErrorCount++;     ?>
                <script>
                    $(document).ready(function () {
                            swal("","Please Enter Receipt Amount", "info") 
                    });    
                </script>
         <?php    }
         if($_POST['ReceiptAmount']>$invoiceValues[0]['order_total_amount_due']){
                $ErrorCount++;     ?>
                <script>
                    $(document).ready(function () {
                            swal("","Must enter amount less than or equal to due amount!", "info") 
                    });    
                </script>
         <?php    }
         if($ErrorCount==0){
              $random = rand(100,999);
              $ReceiptCode ="IN00".$random;
              
              if($_POST['TransactionMode']=="Cash"){
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
                 }else {
                    $CashTwoThousand      =  "0";
                    $CashFiveHundred      =  "0";
                    $CashTwoHundred       =  "0";
                    $CashOneHundred       =  "0";
                    $CashFiftyRupees      =  "0";
                    $CashTwentyRupees     =  "0";
                    $CashTenRupees        =  "0";
                    $TotalCashReceived    =  "0";
                    $ReturnCashToCustomer =  "0"; 
                 }
     
              
              $id= $mysql->insert("receipt",array("receipt_code"             => $ReceiptCode,
                                                  "order_id"                 => $invoiceValues[0]['order_id'],
                                                  "order_date"               => $invoiceValues[0]['order_date'],
                                                  "user_id"                  => $invoiceValues[0]['user_id'],
                                                  "receipt_amount"           => $_POST['ReceiptAmount'],
                                                  "invoice_due_amount"       => number_format($invoiceValues[0]['order_total_amount_due']-$_POST['ReceiptAmount'],2),
                                                  "description"              => $_POST['description'],          
                                                  "TransactionMode"          => $_POST['TransactionMode'],          
                                                  "receipt_date"             => date("Y-m-d H:i:s")));
                                                  
              $paidamount = $invoiceValues[0]['order_amount_paid']+$_POST['ReceiptAmount'];
              $dueamount  = $invoiceValues[0]['order_total_after_tax']-$paidamount;
                   $mysql->execute("update invoice_order set `order_amount_paid`      ='".$paidamount."',
                                                             `order_total_amount_due` ='".$dueamount."',                    
                                                             `CashTwoThousand` ='".$CashTwoThousand."',                    
                                                             `CashFiveHundred` ='".$CashFiveHundred."',                    
                                                             `CashTwoHundred` ='".$CashTwoHundred."',                    
                                                             `CashOneHundred` ='".$CashOneHundred."',                    
                                                             `CashFiftyRupees` ='".$CashFiftyRupees."',                    
                                                             `CashTwentyRupees` ='".$CashTwentyRupees."',                    
                                                             `CashTenRupees` ='".$CashTenRupees."',                    
                                                             `TotalCashReceived` ='".$TotalCashReceived."',                    
                                                             `ReturnCashToCustomer` ='".$ReturnCashToCustomer."',                    
                                                             `receipt_id`             ='".$id."',
                                                             `receipt_date`             ='".date("Y-m-d H:i:s")."'
                                                              where `order_id`='".$invoiceValues[0]['order_id']."'");  
              if(sizeof($id)>0){
                unset($_POST); ?>
                <script>
                
                    $(document).ready(function() {                                                                  
                        successpopup('<?php echo MD5($id);?>');                                          
                     });
            </script>
              <?php } else {  ?>
                <script>
             $(document).ready(function() {
                swal({ 
                  title: "Error",
                   text: "Error Create Receipt",
                    type: "error" 
                  });
             });
            </script>
             <?php  }
         } 
     }
?>
<div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-invoice">
                                        <div class="card-header">
                                            <div class="invoice-header">
                                                <h3 class="invoice-title">
                                                    Receipt
                                                </h3><br>
                                                <div class="invoice-logo">
                                                    <img src="../assets/img/examples/logoinvoice.svg" alt="company logo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="invoice-desc" style="text-align: left;">
                                                    <?php echo ShopName; ?><br>                           
                                                    <?php echo FromName; ?><br>
                                                    <?php echo MobileNumber; ?><br>
                                                    <?php echo Email; ?><br>
                                                    <?php echo Address1; ?><br>
                                                    <?php echo Address2; ?><br>
                                                    <?php echo Address3; ?><br>
                                                    <?php echo Pincode; ?><br>
                                                </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="invoice-desc">
                                                    <h5 class="sub">Receipt To</h5>
                                                    <p>
                                                        Name : <?php echo $invoiceValues[0]['order_receiver_name'];?><br />
                                                        Billing Address : <?php echo $invoiceValues[0]['order_receiver_address'];?><br /> 
                                                    </p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <form method="post" action="" >
                                        <div class="card-body">
                                            <div class="separator-solid"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="invoice-detail">
                                                        <div class="invoice-top">
                                                            <h3 class="title"><strong>Order summary</strong></h3>
                                                        </div>
                                                        <div class="invoice-item">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <td><strong>Item Code</strong></td>
                                                                            <td><strong>Item</strong></td>
                                                                            <td class="text-center"><strong>Quantity</strong></td>
                                                                            <td class="text-center"><strong>Price</strong></td>
                                                                            <td class="text-right"><strong>Totals</strong></td>
                                                                        </tr> 
                                                                     </thead>  
                                                                        <?php 
                                                                            foreach($invoiceItems as $invoiceItem){
                                                                             ?>
                                                                            <tr>
                                                                                <td align="left"><?php echo $invoiceItem["item_code"];?></td>
                                                                                <td align="left"><?php echo $invoiceItem["item_name"];?></td>
                                                                                <td align="right"><?php echo $invoiceItem["order_item_quantity"];?></td>
                                                                                <td align="right"><?php echo $invoiceItem["order_item_price"];?></td>
                                                                                <td align="right"><?php echo $invoiceItem["order_item_final_amount"];?></td>
                                                                            </tr>
                                                                        <?php } ?>  
                                                                            <tr>
                                                                                <td class="text-right" colspan="4">
                                                                                    <p>Total Amount: </p>
                                                                                    <p>Paid Amount:  </p>
                                                                                    <p>Payable Amount:  </p>
                                                                                </td>
                                                                                <td class="text-right">
                                                                                    <p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $invoiceValues[0]['order_total_after_tax'];?> </p>
                                                                                    <p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $invoiceValues[0]['order_amount_paid'];?> </p>
                                                                                    <p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $invoiceValues[0]['order_total_amount_due'];?> </p>
                                                                                </td>
                                                                            </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                    <div class="separator-solid  mb-3"></div>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to">                                                               
                                                    <!--<h5 class="sub">Bank Transfer</h5>
                                                    <div class="account-transfer">
                                                        <div><span>Account Name:</span><span>Syamsuddin</span></div>
                                                        <div><span>Account Number:</span><span>1234567890934</span></div>
                                                        <div><span>Code:</span><span>BARC0032UK</span></div>
                                                    </div>-->
                                                </div>
                                                <div class="col-sm-5 col-md-7 transfer-total" style="text-align: right;">
                                                    <div class="row" style="margin-bottom: 10px;">
                                                        <div class="col-sm-5">Receipt Amount</div>
                                                         <div class="col-sm-7">
                                                            <input type="number" class="form-control" name="ReceiptAmount" id="ReceiptAmount" placeholder="Receipt Paid" value="<?php echo (isset($_POST['ReceiptAmount']) ? $_POST['ReceiptAmount'] : $_GET['paidamount']);?>">
                                                            <span class="errorstring" id="ErrReceiptAmount"></span>
                                                         </div> 
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-5">Txn Amount</div>
                                                         <div class="col-sm-7">
                                                            <select class="form-control" name="TransactionMode" id="TransactionMode"  onchange="CheckTransactionMode($(this).val())">
                                                                <option value="0" <?php echo ($_POST['TransactionMode']=="0") ? " selected='selected' " : "";?>> Select</option>
                                                                <option value="Cash" <?php echo ($_POST['TransactionMode']=="Cash") ? " selected='selected' " : "";?>> Cash</option>
                                                                <option value="Net Banking" <?php echo ($_POST['TransactionMode']=="Net Banking") ? " selected='selected' " : "";?>> Net Banking</option>
                                                            </select>
                                                            <span class="errorstring" id="ErrTransactionMode"><?php echo isset($ErrTransactionMode)? $ErrTransactionMode : "";?></span>
                                                         </div> 
                                                    </div>
                                                    <div id="CashModeAdditionalInformation" style="display: none;">
                                                <br><div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">2000 X</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['TwoThousand']) ? $_POST['TwoThousand'] :"0");?>" type="number" class="form-control" name="TwoThousand" onkeyup="CashReceived($(this).val())" id="TwoThousand" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrTwoThousand"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">500 X</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['FiveHundred']) ? $_POST['FiveHundred'] :"0");?>" type="number" class="form-control" name="FiveHundred" onkeyup="CashReceived($(this).val())" id="FiveHundred" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrFiveHundred"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">                                              
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">200 X</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['TwoHundred']) ? $_POST['TwoHundred'] :"0");?>" type="number" class="form-control" name="TwoHundred" onkeyup="CashReceived($(this).val())" id="TwoHundred" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrTwoHundred"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">100 X</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['OneHundred']) ? $_POST['OneHundred'] :"0");?>" type="number" class="form-control" name="OneHundred" onkeyup="CashReceived($(this).val())" id="OneHundred" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrTwoHundred"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">50 X</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['FiftyRupees']) ? $_POST['FiftyRupees'] :"0");?>" type="number" class="form-control" name="FiftyRupees" onkeyup="CashReceived($(this).val())" id="FiftyRupees" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrFiftyRupees"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">20 X</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['TwentyRupees']) ? $_POST['TwentyRupees'] :"0");?>" type="number" class="form-control" name="TwentyRupees" onkeyup="CashReceived($(this).val())" id="TwentyRupees" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrTwentyRupees"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">10 X</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['TenRupees']) ? $_POST['TenRupees'] :"0");?>" type="number" class="form-control" name="TenRupees" onkeyup="CashReceived($(this).val())" id="TenRupees" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrTenRupees"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;"></label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Coins</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['Coins']) ? $_POST['Coins'] :"0");?>" type="number" class="form-control" name="Coins" onkeyup="CashReceived($(this).val())" id="Coins" placeholder="">
                                                        </div>
                                                        <span class="errorstring" id="ErrCoins"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;">Cash Received:</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Rs</span>
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['TotalCashReceived']) ? $_POST['TotalCashReceived'] :"0");?>" type="number" class="form-control" name="TotalCashReceived" readonly="readonly" id="TotalCashReceived" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="padding: 0px !important;">
                                                    <label class="col-sm-4" style="text-align: right;padding-top: 9px;">Return Cash:</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">Rs</span>                             
                                                            </div>
                                                            <input value="<?php echo (isset($_POST['ReturnCashToCustomer']) ? $_POST['ReturnCashToCustomer'] :"");?>" type="number" class="form-control" name="ReturnCashToCustomer" readonly="readonly" id="ReturnCashToCustomer" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>                                                    
                                                </div>                                                     
                                            </div>
                                            <div class="separator-solid"></div>
                                            <h6 class="text-uppercase mt-4 mb-3 fw-bold">
                                                Notes
                                            </h6>
                                            <p class="text-muted mb-0">
                                                <textarea class="form-control txt" name="description" id="description" placeholder="Description" style="width:174px"></textarea>
                                            </p>
                                            <div class="row">
                                                <div class="col-sm-12" style="text-align:right">
                                                    <button data-loading-text="Saving Invoice..." type="button" onclick="CallConfirmation()" class="btn btn-success submit_btn invoice-save-btm">Continue</button>
                                            <button data-loading-text="Saving Invoice..." type="submit" name="receipt_btn" id="receipt_btn" class="btn btn-success submit_btn invoice-save-btm" style="display:none">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
function CallConfirmation(){
     ErrorCount=0;
     
    var ReceiptAmount = $('#ReceiptAmount').val().trim();
       if (ReceiptAmount.length==0) {
            $('#ErrReceiptAmount').html("Please Enter Receipt Amount"); 
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
                    +'Are you sure want to create receipt?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="CreateReceipt()" >Yes, Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }else{
            return false;
        }
}
function CreateReceipt() {
    $( "#receipt_btn" ).trigger( "click" );
}
function successpopup(id){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'<img src="http://japps.online/demo/admin/assets/tick.jpg" style="width:30%"><br><span>Receipt Created</span>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/viewreceipt&receipt_id='+id+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 function CheckTransactionMode(){
     if($('#TransactionMode').val()=="Cash"){
        $("#CashModeAdditionalInformation").show();                                                                   
     }else {
        $("#CashModeAdditionalInformation").hide(); 
     }                                                                                                        
 }
 function CashReceived(){
    $('#TotalCashReceived').val(1*$('#Coins').val()+20*$('#TwentyRupees').val()+10*$('#TenRupees').val()+50*$('#FiftyRupees').val()+100*$('#OneHundred').val()+200*$('#TwoHundred').val()+500*$('#FiveHundred').val()+2000*$('#TwoThousand').val()); 
    $('#ReturnCashToCustomer').val($('#ReceiptAmount').val()-$('#TotalCashReceived').val()); 
 }
</script> 