<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            if($ErrorCount==0){
               
               $id = $mysql->insert("_tbl_wallet",array("CustomerID"   		=> $_POST['Customer'],
                                                        "Credits"      		=> $_POST['Amount'],
                                                        "Debits"       		=> "0",
                                                        "AvailableBalance"  => getTotalBalanceUserWallet($_POST['Customer'])+$_POST['Amount'],
                                                        "TransactionID"     => $_POST['TxnID'],
                                                        "Remarks"      	    => $_POST['Remarks'],
                                                        "AdminID"      	    => $_SESSION['User']['AdminID'],
                                                        "RefillOn"          => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){ 
                unset($_POST);
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Payment Added Successfully", { 
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=Wallet/list&status=All'
                        });
                    });
                    </script>
       <?php     }
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error add payment", "warning")
             });
            </script>
           <?php   }
    }
   
?>
<script>
$(document).ready(function () {
    $("#Customer").blur(function () {
		if($("#Customer").val()=="0"){
			$("#ErrCustomer").html("Please Select Customer");
			
		}
	});
    $("#Amount").blur(function () {    
        IsNonEmpty("Amount","ErrAmount","Please Enter Amount");
	});
    $("#PaymentMode").blur(function () {  
		$("#ErrPaymentMode").html("");
		if($("#PaymentMode").val()=="0"){
			$("#ErrPaymentMode").html("Please Select Payment Mode");
		}
	});
});

</script>
<style>
.has-success .form-control {
    border-color: #ebedf2 !important;
    color: #495057 !important;
}
.has-success label {
    color: #495057 !important;
}
.has-success .input-group-text {
    border-color: #ebedf2 !important;
    background: #fff !important;
    color: #495057 !important;
}
</style>
      <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Refill Wallet</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                   <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Select Customer<span style="color:red">*</span></label>
                                            <input type="hidden" name="CustomerID" id="CustomerID">
											<select class="form-control" name="Customer" id="Customer">
                                                <option value="0" <?php echo ($_POST['Customer']=="0") ? " selected='selected' " : "";?>>Select Staff</option>
                                                <?php $Customers = $mysql->select("select * from _tbl_sales_customers where IsActive='1'");?>
                                                <?php foreach($Customers as $Customer){ ?>
                                                <option value="<?php echo $Customer['CustomerID'];?>" <?php echo ($_POST['Customer']==$Customer['CustomerID']) ? " selected='selected' " : "";?>><?php echo $Customer['CustomerName'];?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="errorstring" id="ErrCustomer"><?php echo isset($ErrCustomer)? $ErrCustomer : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Amount<span style="color:red">*</span></label>
											<div class="col-sm-12" style="padding-right:0px;padding-left:0px">
												<div class="input-icon">
													<span class="input-icon-addon">
														<i class="fas fa-rupee-sign"></i>
													</span>
													<input type="text" class="form-control" id="Amount" name="Amount" placeholder="Enter Amount" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] :"");?>">
												</div>
											</div>
											<span class="errorstring" id="ErrAmount"><?php echo isset($ErrAmount)? $ErrAmount : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Payment Mode<span style="color:red">*</span></label>
                                            <select class="form-control" name="PaymentMode" id="PaymentMode">
                                                <option value="0" <?php echo ($_POST['PaymentMode']=="0") ? " selected='selected' " : "";?>>Select Payment Mode</option>
                                                <option value="Cash" <?php echo ($_POST['PaymentMode']=="Cash") ? " selected='selected' " : "";?>>Cash</option>
                                                <option value="Cheque" <?php echo ($_POST['PaymentMode']=="Cheque") ? " selected='selected' " : "";?>>Cheque</option>
                                                <option value="DD" <?php echo ($_POST['PaymentMode']=="DD") ? " selected='selected' " : "";?>>DD</option>
                                                <option value="Bank Transfer" <?php echo ($_POST['PaymentMode']=="Bank Transfer") ? " selected='selected' " : "";?>>Bank Transfer</option>
                                            </select>
                                            <span class="errorstring" id="ErrPaymentMode"><?php echo isset($ErrPaymentMode)? $ErrPaymentMode : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Transaction ID<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="TxnID" name="TxnID" placeholder="Enter TxnID" value="<?php echo (isset($_POST['TxnID']) ? $_POST['TxnID'] :"");?>">
                                            <span class="errorstring" id="ErrTxnID"><?php echo isset($ErrTxnID)? $ErrTxnID : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Remarks</label>
                                            <textarea class="form-control" id="Description" name="Remarks" placeholder="Enter Remarks"><?php echo (isset($_POST['Remarks']) ? $_POST['Remarks'] :"");?></textarea>
                                            <span class="errorstring" id="ErrRemarks"><?php echo isset($ErrRemarks)? $ErrRemarks : "";?></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Refill</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;"></button>
                                                <a href="dashboard.php?action=Wallet/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>

function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrCustomer').html("");
        $('#ErrAmount').html("");
        $('#ErrPaymentMode').html("");
        
        if($("#Customer").val()=="0"){
			$("#ErrCustomer").html("Please Select Customer");
			ErrorCount++;
		}
		
        IsNonEmpty("Amount","ErrAmount","Please Enter Amount");
        
		if($("#PaymentMode").val()=="0"){
			$("#ErrPaymentMode").html("Please Select Payment Mode");
			ErrorCount++;
		}
		
        if(ErrorCount==0) {
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to refill?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="RefillWallet()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{ 
            return false;
        }
        }
function RefillWallet() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

