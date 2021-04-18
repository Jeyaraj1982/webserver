<?php 
    $Orders = $mysql->select("select * from _tbl_orders where md5(concat('Jeyaraj',OrderID))='".$_GET['Order']."'");
    $items = $mysql->select("select * from _tbl_orders_items where OrderID='".$Orders[0]['OrderID']."'");
    $statuses = $mysql->select("select * from _tbl_orders_status where OrderID='".$Orders[0]['order_id']."' order by StatusID desc");
?>    
<?php $Stts = $mysql->select("select * from _tbl_orders_status where OrderID='".$Orders[0]['order_id']."' order by StatusID Desc");?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
	            <div class="col-md-12">
		            <div class="card" style="border:1px solid #ccc">
                        <div class="card-body">
				            <div class="invoice-header">
                                <img src="<?php echo $_CONFIG['LOGO_URL'];?>" alt="company logo" style="height:90px;">
					            <!--<div class="invoice-logo" style="text-align: right;"></div>-->
				            </div>
                            <div class="row" style="margin-right:0px;margin-left:0px">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;">
                                       <h5 style="margin-bottom:0px;font-weight: bold;">Customer Details</h5>
                                        <b><?php echo $Orders[0]['CustomerName'];?></b><br>
                                        <?php echo $Orders[0]['BillingAddress1'];?>
                                        <?php if(strlen(trim($Orders[0]['BillingAddress2']))>0) { echo "<br>".$Orders[0]['BillingAddress2']; }?>
                                        <?php if(strlen(trim($Orders[0]['BillingAddress3']))>0) { echo "<br>".$Orders[0]['BillingAddress3']; }?>
                                        <br>PinCode: <?php echo $Orders[0]['BillingPincode'];?>
                                        <?php if($Orders[0]['BillingLandMark']!=""){ echo "<br>".$Orders[0]['BillingLandMark'];?><?php } ?>    
                                        <?php echo (strlen(trim($Orders[0]['CustomerEmailID']))>0) ? "<br>Email: ".$Orders[0]['CustomerEmailID']: "";?>
                                        <?php echo (strlen(trim($Orders[0]['CustomerMobileNumber']))>0) ? "<br>Mobile: ". $Orders[0]['CustomerMobileNumber'] : "";?>
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Order Details</h5>
                                        <?php echo "Order: #".$Orders[0]['OrderCode'];?><br>
                                        <?php echo "Date:" .date("M d, Y H:i",strtotime($Orders[0]['OrderDate']));?><br>
                                        <span style="font-weight: bold;color:red"><?php echo Order::OrderStatus($Orders[0]['OrderStatus']);?></span>
                                        <br><br><br><br><br>
                                        <a href="../printorder.php?id=<?php echo md5($Orders[0]['OrderID']);?>" target="blank" class="btn btn-primary btn-sm">Print</a>
                                        <a href="../printorder_custom.php?id=<?php echo md5($Orders[0]['OrderID']);?>" target="blank" class="btn btn-danger btn-sm">Ref Print</a>
				                    </div>
                                </div>
			                </div>
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
                                                            <th>Sl<br>&nbsp;</th>
                                                            <th>Product Name<br>&nbsp;</th>
                                                            <th>Units<br>&nbsp;</th>
                                                            
                                                            <th style="text-align:right">M.R.P<br> ( <i class="fas fa-rupee-sign"></i> )</th>
                                                            <th style="text-align:right">GB Price<br> ( <i class="fas fa-rupee-sign"></i> )</th>
                                                            <th style="text-align:right">Quantity<br>&nbsp;</th>
                                                            <th style="text-align:right">Total<br> ( <i class="fas fa-rupee-sign"></i> )</th>
											            </tr>
										            </thead>
										            <tbody>
                                                        <?php 
                                                        $i=1;
                                                        foreach($items as $item){ ?>
                                                        <tr>
                                                            <td><?php echo $i;?></td>
                                                            <td><?php echo $item['ProductName'];?></td>
                                                            <td><?php echo $item['Units']." ".$item['UnitName'];?></td>      
                                                            
                                                            <!--
                                                            <td style="text-align:right">
                                            <table style="width: 100%;" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <td style="text-align: right;width:50%">
                                                    <?php if (($item['MRP']-$item['Price'])>0) { ?>
                                                        (<span style="text-decoration: line-through"><?php echo number_format($item['MRP'],2);?></span>)&nbsp;&nbsp;
                                                       
                                                  <?php } ?>
                                                     </td>
                                                     <td style="text-align: right;">
                                                      <?php echo number_format($item['Price'],2);?>
                                                     </td>
                                                </tr>
                                            </table>
                                                            </td> -->
                                                             <td style="text-align:right"><?php echo number_format($item['MRP'],2);?></td>
                                          <td style="text-align:right"><?php echo number_format($item['Price'],2);?></td>
                                          <td style="text-align:right"><?php echo $item['Qty'];?></td>
                                                         <td style="text-align:right"><?php echo number_format($item['Amount'],2);?></td>
                                                        </tr>
                                                        <?php $i++;} ?>
                                                        <tr>
                                                            <td colspan="6" style="text-align:right">Sub Total ( <i class="fas fa-rupee-sign"></i> )</td>
                                                            <td style="text-align:right"> <?php echo number_format($Orders[0]['OrderTotal'],2);?></td> 
                                                        </tr>
                                                         <tr>
                                                            <td colspan="6" style="text-align:right">Total Amount ( <i class="fas fa-rupee-sign"></i> )</td>
                                                            <td style="text-align:right"> <?php echo number_format($Orders[0]['OrderTotal'],2);?></td> 
                                                        </tr>
                                                    </tbody>
									            </table>
								            </div>
                                            
                                            <div class="row">
                         <div class="col-sm-6" style="text-align:left">
                              <?php if ($Orders[0]['OrderSavedAmount']>0) {?>
                            <h4 class="checkout-sep" style="border:none;margin-bottom:0px">You Saved</h4>
                            <h3 style="color:Green">&#8377; <?php echo number_format($Orders[0]['OrderSavedAmount'],2);?></h3>
                             <?php } ?>
                        </div>
                        <div class="col-sm-6" style="text-align:right">
                           
                            <h4 class="checkout-sep" style="border:none;margin-bottom:0px">Total Amount</h4>
                            <h3 style="color:red">&#8377; <?php echo number_format($Orders[0]['OrderTotal'],2);?></h3>
                           
                        </div>
                    </div>
							            </div>
						            </div>	
                                </div>	
				            </div>
			                <div class="col-sm-12" style="text-align: right;padding-right: 0px;padding-left: 0px;">
                                <?php if($Orders[0]['OrderStatus']=="1") { ?>
                                    <button type="button" class="btn btn-success" onclick="CallConfirmationConfirm('<?php echo $Orders[0]['OrderID'];?>')">Confirm Order</button>    
                                    <button type="button" class="btn btn-danger" onclick="CallConfirmationCancel('<?php echo $Orders[0]['OrderID'];?>')">Cancel Order</button>    
                                <?php } ?>
                                <?php if($Orders[0]['OrderStatus']=="3") { ?>
                                    <button type="button" class="btn btn-success" onclick="CallConfirmationDispatch('<?php echo $Orders[0]['OrderID'];?>')">Dispatch</button>    
                                    <button type="button" class="btn btn-danger" onclick="CallConfirmationCancel('<?php echo $Orders[0]['OrderID'];?>')">Cancel</button>    
                                <?php } ?>
                                <?php if($Orders[0]['OrderStatus']=="4") { ?>
                                    <button type="button" class="btn btn-success" onclick="CallConfirmationdelivered('<?php echo $Orders[0]['OrderID'];?>')">Deliver</button>    
                                    <button type="button" class="btn btn-danger" onclick="CallConfirmationUnDelivered('<?php echo $Orders[0]['OrderID'];?>')">Returned</button>    
                                <?php } ?>
                                <!--
                                <?php if($Orders[0]['OrderStatus']=="5") { ?>
                                    <button type="button" class="btn btn-success" onclick="CallConfirmationPaid('<?php echo $Orders[0]['OrderID'];?>')">Paid</button>    
                                    <button type="button" class="btn btn-danger" onclick="CallConfirmationUnDelivered('<?php echo $Orders[0]['OrderID'];?>')">Delivered Failed</button>    
                                <?php } ?>
                                <?php if($Orders[0]['OrderStatus']=="6" && $Orders[0]['IsPaid']=="0"){ ?>
                                    <button type="button" class="btn btn-success" onclick="CallConfirmationPaid('<?php echo $Orders[0]['OrderID'];?>')">Paid</button>    
                                <?php } ?>
                                -->
                            </div>
                        </div>
		            </div>
	            </div>
            </div>
            <?php if (sizeof($statuses)>0) {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border:1px solid #ccc">
                        <div class="card-body">
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
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
        <div class="modal-content">
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
                        +'<button type="button" class="btn btn-danger" onclick="OrderCancelFromAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
function OrderCancelFromAdmin(OrderID) {
    var param = $( "#OrderFrm_"+OrderID).serialize();
    $("#xconfrimation_text").html(loading);
    $.post( "../webservice.php?action=OrderCancelFromAdmin",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=2' class='btn btn-outline-success'>Continue</a></div>"; 
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
                        +'<button type="button" class="btn btn-success" onclick="ConfirmOrderFromAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
function ConfirmOrderFromAdmin(OrderID) {
     var param = $( "#OrdercnfrmFrm_"+OrderID).serialize();
    $("#xconfrimation_text").html(loading);
    $.post( "../webservice.php?action=ConfirmOrderFromAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=3' class='btn btn-outline-success'>Continue</a></div>"; 
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
                        +'<button type="button" class="btn btn-success" onclick="DispatchOrderFromAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
function DispatchOrderFromAdmin(OrderID) {
     var param = $( "#OrderdispatchFrm_"+OrderID).serialize();
    $("#xconfrimation_text").html(loading);
    $.post( "../webservice.php?action=DispatchOrderFromAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=4' class='btn btn-outline-success'>Continue</a></div>"; 
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
                        +'<button type="button" class="btn btn-success" onclick="DeliveredOrderFromAdmin(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeliveredOrderFromAdmin(OrderID) {
     var param = $( "#OrderdeliveredFrm_"+OrderID).serialize();
    $("#xconfrimation_text").html(loading);
    $.post( "../webservice.php?action=DeliveredOrderFromAdmin",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Order/list&status=5' class='btn btn-outline-success'>Continue</a></div>"; 
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

</script>
