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
              $ReceiptCode = rand(1000,9999); 
              $id= $mysql->insert("receipt",array("receipt_code"             => $ReceiptCode,
                                                  "order_id"                 => $invoiceValues[0]['order_id'],
                                                  "order_date"               => $invoiceValues[0]['order_date'],
                                                  "user_id"                  => $invoiceValues[0]['user_id'],
                                                  "receipt_amount"           => $_POST['ReceiptAmount'],
                                                  "invoice_due_amount"       => number_format($invoiceValues[0]['order_total_amount_due']-$_POST['ReceiptAmount'],2),
                                                  "description"              => $_POST['description'],          
                                                  "receipt_date"             => date("Y-m-d H:i:s")));
                                                  
              $paidamount = $invoiceValues[0]['order_amount_paid']+$_POST['ReceiptAmount'];
              $dueamount  = $invoiceValues[0]['order_total_after_tax']-$paidamount;
                   $mysql->execute("update invoice_order set `order_amount_paid`      ='".$paidamount."',
                                                             `order_total_amount_due` ='".$dueamount."',                    
                                                             `receipt_id`             ='".$id."',
                                                             `receipt_date`             ='".date("Y-m-d H:i:s")."'
                                                              where `order_id`='".$invoiceValues[0]['order_id']."'");  
              if(sizeof($id)>0){
                unset($_POST); ?>
                <script>
                    $(document).ready(function() {                                                                  
                        successpopup(<?php echo $id;?>);
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
            <div class="row">                                                                         
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <form method="post" action="" >
                            <table width="100%" border="1" cellpadding="5" cellspacing="0">
                                <tr>
                                    <td colspan="2" align="center" style="font-size:18px"><b>Receipt</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border-bottom: 1px solid white;">
                                        <table width="100%" cellpadding="5">
                                            <tr>
                                                <td width="65%">
                                                    To,<br />                                                     
                                                    <b>RECEIVER (BILL TO)</b><br />
                                                    Name : <?php echo $invoiceValues[0]['order_receiver_name'];?><br />
                                                    Billing Address : <?php echo $invoiceValues[0]['order_receiver_address'];?><br />
                                                </td>
                                                <td width="35%">
                                                    Invoice No. : <?php echo $invoiceValues[0]['order_id'];?><br />
                                                    Invoice Date : <?php echo $invoiceDate;?><br />
                                                </td>
                                            </tr>
                                        </table>
                                        <br />
                                        <table width="100%" border="1" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <th align="left">Sr No.</th>
                                            <th align="left">Item Code</th>
                                            <th align="left">Item Name</th>
                                            <th align="left">Quantity</th>
                                            <th align="left">Price</th>
                                            <th align="left">Actual Amt.</th>
                                        </tr>
                                            <?php 
                                                $count = 0;
                                                foreach($invoiceItems as $invoiceItem){
                                                $count++;  ?>
                                                <tr>
                                                    <td align="left"><?php echo $count;?></td>
                                                    <td align="left"><?php echo $invoiceItem["item_code"];?></td>
                                                    <td align="left"><?php echo $invoiceItem["item_name"];?></td>
                                                    <td align="left"><?php echo $invoiceItem["order_item_quantity"];?></td>
                                                    <td align="left"><?php echo $invoiceItem["order_item_price"];?></td>
                                                    <td align="left"><?php echo $invoiceItem["order_item_final_amount"];?></td>
                                                </tr>
                                            <?php } ?>
                                               <!-- <tr>
                                                    <td align="right" colspan="5"><b>Sub Total</b></td>
                                                    <td align="left"><b><?php echo $invoiceValues[0]['order_total_before_tax'];?></b></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" colspan="5"><b>Tax Rate :</b></td>
                                                    <td align="left"><?php echo $invoiceValues[0]['order_tax_per'];?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" colspan="5">Tax Amount: </td>
                                                    <td align="left"><?php echo $invoiceValues[0]['order_total_tax'];?></td>
                                                </tr> -->
                                                <tr>
                                                    <td align="right" colspan="5">Total: </td>
                                                    <td align="left"><?php echo $invoiceValues[0]['order_total_after_tax'];?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" colspan="5">Amount Paid:</td>
                                                    <td align="left"><?php echo $invoiceValues[0]['order_amount_paid'];?></td>     
                                                </tr>
                                                <tr>
                                                    <td align="right" colspan="5"><b>Amount Due:</b></td>
                                                    <td align="left"><?php echo $invoiceValues[0]['order_total_amount_due'];?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" colspan="5"><b>Receipt Amount:</b></td>
                                                    <td align="left" style="width:170px"><input type="number" class="form-control" name="ReceiptAmount" id="ReceiptAmount" placeholder="Amount Paid" value="<?php echo (isset($_POST['ReceiptAmount']) ? $_POST['ReceiptAmount'] : $_GET['paidamount']);?>"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid white;">         
                                        <td style="float:right;border: none;"  colspan="3" >
                                            <textarea class="form-control txt" cols="3" name="description" id="description" placeholder="Description" style="width:174px"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;"  colspan="3" >
                                            <button data-loading-text="Saving Invoice..." type="button" onclick="CallConfirmation()" class="btn btn-success submit_btn invoice-save-btm">Continue</button>
                                            <button data-loading-text="Saving Invoice..." type="submit" name="receipt_btn" id="receipt_btn" class="btn btn-success submit_btn invoice-save-btm" style="display:none">Continue</button>
                                        </td>
                                    </tr>
                            </table>
                        </form>
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
}
function CreateReceipt() {
    $( "#receipt_btn" ).trigger( "click" );
}
function successpopup(id){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'<img src="http://masflowers.in/admin/assets/tick.jpg" style="width:30%"><br><span>Receipt Created</span>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/view_receipt&receipt_id='+id+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
</script> 