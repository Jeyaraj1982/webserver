<?php $Orders = $mysql->select("select * from invoice_order where OrderCode='".$_GET['id']."'");
$items = $mysql->select("select * from invoice_order_item where order_id='".$Orders[0]['order_id']."'");
?>    
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['order_id']."' order by StatusID Desc");?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
	            <div class="col-md-12">
		            <div class="card card-invoice">
			            <div class="card-header">
				            <div class="invoice-header">
					            <h3 class="invoice-title">
						            Order
					            </h3>
					            <div class="invoice-logo">
						            <img src="../assets/img/examples/logoinvoice.svg" alt="company logo">
					            </div>
				            </div>
                            <div class="row" style="margin-right:0px;margin-left:0px">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;">
                                       <h5 style="margin-bottom:0px;font-weight: bold;">Customer Details</h5>
                                        <b><?php echo $Orders[0]['CustomerName'];?></b><br>
                                        <?php echo $Orders[0]['BillingAddress1'];?><br>
                                        <?php if($Orders[0]['BillingAddress2']!=""){ echo $Orders[0]['BillingAddress2']."<br>"; }?>
                                        <?php if($Orders[0]['BillingAddress3']!=""){ echo $Orders[0]['BillingAddress3']."<br>"; }?>
                                        Zip/PinCode: <?php echo $Orders[0]['BillingPincode'];?><br>
                                        <?php if($Orders[0]['BillingLandMark']!=""){ ?>Land-Mark: <?php echo $Orders[0]['BillingLandMark']."<br>";?><?php } ?><br>    
                                        <?php echo $Orders[0]['CustomerEmailID'];?><br>
                                        <?php echo $Orders[0]['CustomerMobileNumber'];?><br>
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Order Details</h5>
                                        <?php echo "Order Number: ".$Orders[0]['OrderCode'];?><br>
                                        <?php echo date("M d, Y H:i",strtotime($Orders[0]['OrderDate']));?><br>
                                        <span style="font-weight: bold;color:red"><?php echo $Stts[0]['Status'];?></span>   <br><br><br><br><br>
                                        <a href="printorder.php?id=<?php echo md5($Orders[0]['order_id']);?>" target="blank" class="btn btn-primary btn-sm">Print</a>
				                    </div>
                                </div>
			                </div>
                        </div>
			            <div class="card-body">
				        
				        <div class="row">
					        <div class="col-md-12">
						        <div class="invoice-detail">
							        <div class="invoice-top">
								        <h3 class="title"><strong>Order summary</strong></h3>
							        </div>
                                    <div class="separator-solid"></div>
							        <div class="invoice-item">
								        <div class="table-responsive">
									        <table class="table table-striped">
										        <thead>
											        <tr>
												        <th>Item Code<br>&nbsp;</th>
                                                        <th>Item Name<br>&nbsp;</th>
                                                        <th style="text-align:right">Price<br> ( <i class="fas fa-rupee-sign"></i> )</th>
                                                        <th style="text-align:right">Quantity<br>&nbsp;</th>
                                                        <th style="text-align:right">Total<br> ( <i class="fas fa-rupee-sign"></i> )</th>
											        </tr>
										        </thead>
										        <tbody>
                                                    <?php 
                                                        $items = $mysql->select("select * from invoice_order_item where order_id='".$Orders[0]['order_id']."'");
                                                        $subtotal=0;
                                                        foreach($items as $item){ 
                                                        $product=$mysql->select("select * from _tbl_products where ProductID='".$item['item_code']."'");
                                                        $subtotal+=$item['order_item_quantity']*$item['order_item_price'];
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $product[0]['ProductCode'];?></td>
                                                            <td><?php echo $item['item_name'];?></td>
                                                            <td style="text-align:right"><?php echo number_format($item['order_item_price'],2);?></td>
                                                            <td style="text-align:right"><?php echo $item['order_item_quantity'];?></td>
                                                            <td style="text-align:right"><?php echo number_format($item['order_item_quantity']*$item['order_item_price'],2);?></td>
                                                        </tr>
                                                    <?php } ?>
                                                        <tr>
                                                            <td colspan="4" style="text-align:right">Sub Total ( <i class="fas fa-rupee-sign"></i> )</td>
                                                            <td style="text-align:right"> <?php echo number_format($subtotal,2);?></td> 
                                                        </tr>
                                                </tbody>
									        </table>
								        </div>
							        </div>
						        </div>	
						        <div class="separator-solid  mb-3" style="margin-top:0px"></div>
					        </div>	
				        </div>
			        </div>
			            <div class="card-footer">
				            <div class="row">
					            <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to">
						            
					            </div>
					            <div class="col-sm-5 col-md-7 transfer-total">
						            <h5 class="sub">Total Amount</h5>
						            <div class="price"><i class="fas fa-rupee-sign"></i> <?php echo number_format($subtotal,2);?></div>
					            </div>
				            </div>
				            <div class="separator-solid"></div>
                                <div class="col-sm-12">
                                    <h5 class="sub" style="margin-bottom:0px">Order Staus</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Status On</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $statuses = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['order_id']."' order by StatusID desc");?>
                                                <?php foreach($statuses as $status){ ?>
                                                    <tr>
                                                        <td style="height: auto !important;"><?php echo $status['Status'];?></td>
                                                        <td style="height: auto !important;"><?php echo date("M d, Y H:i",strtotime($status['StatusOn']));?></td>
                                                        <td style="height: auto !important;"><?php echo $status['Remarks'];?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
				                <div class="col-sm-12" style="text-align: right;padding-right: 0px;padding-left: 0px;">
                                    <?php if($Orders[0]['OrderStatus']=="1"){ ?>
                                        <button type="button" class="btn btn-success" onclick="CallConfirmationConfirm('<?php echo $Orders[0]['order_id'];?>')">Confirm</button>    
                                        <button type="button" class="btn btn-danger" onclick="CallConfirmationCancel('<?php echo $Orders[0]['order_id'];?>')">Cancel</button>    
                                    <?php } ?>
                                    <?php if($Orders[0]['OrderStatus']=="2"){ ?>
                                        <button type="button" class="btn btn-success" onclick="CallConfirmationProcess('<?php echo $Orders[0]['order_id'];?>')">Process</button>    
                                        <button type="button" class="btn btn-danger" onclick="CallConfirmationCancel('<?php echo $Orders[0]['order_id'];?>')">Cancel</button>    
                                    <?php } ?>
                                    <?php if($Orders[0]['OrderStatus']=="4"){ ?>
                                        <button type="button" class="btn btn-success" onclick="CallConfirmationDispatch('<?php echo $Orders[0]['order_id'];?>')">Dispatch</button>    
                                        <button type="button" class="btn btn-danger" onclick="CallConfirmationCancel('<?php echo $Orders[0]['order_id'];?>')">Cancel</button>    
                                    <?php } ?>
                                    <?php if($Orders[0]['OrderStatus']=="5"){ ?>
                                        <button type="button" class="btn btn-success" onclick="CallConfirmationdelivered('<?php echo $Orders[0]['order_id'];?>')">Delivered</button>    
                                        <button type="button" class="btn btn-danger" onclick="CallConfirmationUnDelivered('<?php echo $Orders[0]['order_id'];?>')">Delivered Failed</button>    
                                    <?php } ?>
                                    <?php if($Orders[0]['OrderStatus']=="6" && $Orders[0]['IsPaid']=="0"){ ?>
                                        <button type="button" class="btn btn-success" onclick="CallConfirmationPaid('<?php echo $Orders[0]['order_id'];?>')">Paid</button>    
                                    <?php } ?>
                                </div>
			            </div>
		            </div>
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
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmationCancel(OrderID){
    var text = '<form action="" method="POST" id="OrderFrm_'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to cancel this order?<br>'
                                +'<textarea class="form-control" name="Remarks" id="Remarks" placeholder="Remarks"></textarea>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="CancelOrderfrAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function CancelOrderfrAdmin(OrderID) {
     var param = $( "#OrderFrm_"+OrderID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=CancelOrderfrAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=cancel' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}

 function CallConfirmationConfirm(OrderID){
    var text = '<form action="" method="POST" id="OrdercnfrmFrm_'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to confirm this order?<br>'
                                +'<textarea class="form-control" name="Remarks" id="Remarks" placeholder="Remarks"></textarea>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="ConfirmOrderfrAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function ConfirmOrderfrAdmin(OrderID) {
     var param = $( "#OrdercnfrmFrm_"+OrderID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=ConfirmOrderfrAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=confirm' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}

function CallConfirmationProcess(OrderID){
    var text = '<form action="" method="POST" id="OrderprcessFrm_'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to process this order?<br>'
                                +'<textarea class="form-control" name="Remarks" id="Remarks" placeholder="Remarks"></textarea>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="ProcessOrderfrAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function ProcessOrderfrAdmin(OrderID) {
     var param = $( "#OrderprcessFrm_"+OrderID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=ProcessOrderfrAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=processing' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}

function CallConfirmationDispatch(OrderID){
    var text = '<form action="" method="POST" id="OrderdispatchFrm_'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to dispatch this order?<br>'
                                +'<textarea class="form-control" name="Remarks" id="Remarks" placeholder="Remarks"></textarea>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="DispatchOrderfrAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DispatchOrderfrAdmin(OrderID) {
     var param = $( "#OrderdispatchFrm_"+OrderID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DispatchOrderfrAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=dispatched' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}

 function CallConfirmationdelivered(OrderID){
    var text = '<form action="" method="POST" id="OrderdeliveredFrm_'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delivered this order?<br>'
                                +'<textarea class="form-control" name="Remarks" id="Remarks" placeholder="Remarks"></textarea>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="DeliveredOrderfrAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeliveredOrderfrAdmin(OrderID) {
     var param = $( "#OrderdeliveredFrm_"+OrderID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DeliveredOrderfrAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=delivered' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}
function CallConfirmationUnDelivered(OrderID){
    var text = '<form action="" method="POST" id="OrderundeliveredFrm_'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delivered failed this order?<br>'
                                +'<textarea class="form-control" name="Remarks" id="Remarks" placeholder="Remarks"></textarea>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UnDeliveredOrderfrAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function UnDeliveredOrderfrAdmin(OrderID) {
     var param = $( "#OrderundeliveredFrm_"+OrderID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=UnDeliveredOrderfrAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}
function CallConfirmationPaid(OrderID){
    var text = '<form action="" method="POST" id="OrdePaidFrm_'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to paid this order?<br>'
                                +'<textarea class="form-control" name="Remarks" id="Remarks" placeholder="Remarks"></textarea>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="PaidOrderfrAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function PaidOrderfrAdmin(OrderID) {
     var param = $( "#OrdePaidFrm_"+OrderID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=PaidOrderfrAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}

</script>
