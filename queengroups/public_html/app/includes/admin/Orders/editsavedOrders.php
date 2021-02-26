<div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                        <?php $orderValues  = $mysql->select("SELECT * FROM _queen_temp_orders WHERE md5(OrderID) = '".$_GET['id']."'"); ?>
                        <?php if(sizeof($orderValues)==0){ ?>
        
                            <div class="card">
                                <div class="card-body" style="text-align: center;">
                                    <i class="fas fa-clipboard-list" style="font-size:80px"></i><br><br>
                                    order not found, may be processed or deleted<br><br>
                                    <a href='dashboard.php?action=Orders/SavedOrders' style="color:red">Continue</a>
                                </div>    
                            </div>
<?php }else { ?>
<?php if($orderValues[0]['Edit']=="0" || $orderValues[0]['Edit']=="1000001") { 
    $mysql->execute("update _queen_temp_orders set Edit='1000001' where OrderID    ='".$orderValues[0]['OrderID']."'");   
?>
<?php 
	
    $OrderOn = date("d/m/Y", strtotime($orderValues[0]['OrderOn'])); 
    $orderItems = $mysql->select("SELECT * FROM _queen_temp_order_item WHERE OrderID = '".$orderValues[0]['OrderID']."'");  
	if($orderValues[0]['LastUpdatedBy']=="Staff"){
		$LastModifiedBy = $mysql->select("select * from _queen_staffs where StaffID='".$orderValues[0]['LastUpdatedByID']."'");
	}
	if($orderValues[0]['LastUpdatedBy']=="Admin"){
		$LastModifiedBy = $mysql->select("select * from _queen_admin where AdminID='".$orderValues[0]['LastUpdatedByID']."'");
	}
	$agent= $mysql->select("select * from _queen_agent where AgentID='".$orderValues[0]['AgentID']."'");
?>

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
 if (isset($_POST['saveorder_btn'])) {  
		
		$Agentdetails = $mysql->select("select * from _queen_agent where AgentID='".$_POST['Agent']."'"); 
		$mysql->execute("DELETE FROM _queen_temp_order_item where OrderID='".$orderValues[0]['OrderID']."'");
				for ($i = 0; $i < count($_POST['ServiceCode']); $i++) {
				                                                                      
				$sid= $mysql->insert("_queen_temp_order_item",array("OrderID"     => $orderValues[0]['OrderID'],
																	"ServiceID"   => $_POST['ServiceID'][$i],
																	"ServiceCode" => $_POST['ServiceCode'][$i],
																	"ServiceName" => $_POST['ServiceName'][$i],
																	"Charge"      => $_POST['ServiceCharge'][$i],
																	"FeeAmount"   => $_POST['FeeAmount'][$i],
																	"TotalAmount" => $_POST['total'][$i],
																	"AddedBy"     => "Admin",
																	"AddedByID"   => $_SESSION['User']['AdminID'],
																	"AddedOn"     => date("Y-m-d H:i:s")));
				} 
				
				$mysql->execute("update _queen_temp_orders set OrderTotal	 	='".$_POST['subtotal']."',
															   LastUpdatedBy 	='Admin',
															   LastUpdatedOn 	='".date("Y-m-d H:i:s")."',
															   LastUpdatedByID	='".$_SESSION['User']['AdminID']."'
														       where OrderID    ='".$orderValues[0]['OrderID']."'");       
				
       ?>                                                                   
            <script>
				$(document).ready(function() {
					swal("Order Updated Successfully", {
						icon:"success",
						confirm: {value: 'Continue'}
					}).then((value) => {
						location.href=''
					});                                     
				});
			</script>                                                                                   
     
    <?php  } ?>
<script src="http://japps.online/demo/admin/assets/js/invoice/invoice.js"></script>

                                                                     
                    <div class="card">
                        <div class="container content-invoice">
                            <div class="load-animate animated fadeInUp">
                                    <div class="row">
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> 
                                        </div>
                                    </div><br>
                                  <!--  <input id="currency" type="hidden" value="$">                   
                                   <div id="ChooseReceiver_div" class="form-group form-show-validation row">
                                        <div class="form-check form-check-inline" style="padding:0px">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="AgentRadio" name="Receiver"  onchange="ChooseReceiver('Agent')" class="custom-control-input">
                                                <label class="custom-control-label" for="AgentRadio">Agent</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="CustomerRadio" name="Receiver"  onchange="ChooseReceiver('Customer')" class="custom-control-input">
                                                <label class="custom-control-label" for="CustomerRadio">Customer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="row">  
                                        <div id="agent_div" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right" style="display: none;">
                                            <label class="col-sm-12" style="padding-left: 0px;">Select Agent</label>  
                                            <input type="text" autocomplete="off" id="AgentDetails" name="AgentDetails" class="form-control input-lg" placeholder="Enter Agent Details Here" style="height:auto !important;">
                                            <span class="errorstring" id="ErrAgent"><?php //echo isset($ErrAgent)? $ErrAgent : "";?></span> 
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <div id="div_agentdetails">
                                                                                                         
                                            </div>
                                        </div>
                                   </div>
                                   
                                   <div class="row">  
                                        <div  id="customer_div" style="display: none;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right">
                                            <label class="col-sm-12" style="padding-left: 0px;">Select Customer</label>  
                                            <input type="text" autocomplete="off" id="CustomerDetails" name="CustomerDetails" class="form-control input-lg" placeholder="Enter Customer Details Here" style="height:auto !important;">
                                            <span class="errorstring" id="ErrCustomer"><?php ///echo isset($ErrCustomer)? $ErrCustomer : "";?></span>
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                           <div id="div_customerdetails">
                                                                                                         
                                            </div>
                                        </div>
                                   </div>-->                                            
                                   <div class="row">  
                                        <div class="col-sm-6">
											<?php if($agent[0]['IsAgent']=="0"){?>
											<h5><b>Customer Details</b></h5>
											<?php }else { ?>
											<h5><b>Agent Details</b></h5>
											<?php } ?>
                                            <?php echo $orderValues[0]['AgentName'];?><br>																
											<?php echo $orderValues[0]['AgentMobileNumber'];?>
											<?php if($agent[0]['AlternativeMobileNumber']!=""){ echo "<br>Altr Mobile No : ".$agent[0]['AlternativeMobileNumber']; }?><br>
										</div>
										<div class="col-sm-6" style="text-align: right;">
											Number : <?php echo $orderValues[0]['OrderCode'];?><br>
											Date : <?php echo date("d M, Y H:i", strtotime($orderValues[0]['OrderOn']));?><br><br>
											Created <br> <?php echo $orderValues[0]['StaffName'];?><br>
											Last Modified <br> <?php if($orderValues[0]['LastUpdatedBy']=="Staff"){ echo $LastModifiedBy[0]['StaffName']; } if($orderValues[0]['LastUpdatedBy']=="Admin"){ echo $LastModifiedBy[0]['AdminName']; } ?><br>
											<?php echo date("d M, Y H:i", strtotime($orderValues[0]['LastUpdatedOn'],2));?>
										</div> 
                                   </div> 
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <th width="38%">Service</th>
                                                    <th width="15%" style="text-align:right">Charge</th>
                                                    <th width="15%" style="text-align:right">Fee</th>
                                                    <th width="15%" style="text-align:right">Total</th>
                                                    <th width="15%">Created</th>
                                                    <th width="4%"></th>
                                                </tr>
                                            </table> 
                                            <table class="table table-bordered table-hover" id="orderItems">
                                                <?php foreach($orderItems as $orderItem){ ?>
												<?php 
													if($orderItem['AddedBy']=="Staff"){
														$AddedBy = $mysql->select("select * from _queen_staffs where StaffID='".$orderItem['AddedByID']."'");
														$AddedByName=$AddedBy[0]['StaffName'];
													}if($orderItem['AddedBy']=="Admin"){
														$AddedBy = $mysql->select("select * from _queen_admin where AdminID='".$orderItem['AddedByID']."'");
														$AddedByName=$AddedBy[0]['AdminName'];
													}
												?>
												<form method="post" id="itemFrm_<?php echo $orderItem['ItemID'];?>">
													<input type="hidden" name="ItemID" id="ItemID" value="<?php echo $orderItem['ItemID'];?>">
													<tr>
														<td width="38%" style="padding-left:5px !important;padding-right:5px !important"><input type="text" value="<?php echo $orderItem['ServiceName'];?>" readonly="readonly" name="ServiceName" id="ServiceName_<?php echo $orderItem['ItemID'];?>" class="form-control" autocomplete="off" style="height: auto !important;"></td>    
														
														<td width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"><input type="text" onblur="CountTotal('<?php echo $orderItem['ItemID'];?>')"  value="<?php echo (isset($_POST['ServiceCharge']) ? $_POST['ServiceCharge'] :$orderItem['Charge']);?>" name="ServiceCharge" id="ServiceCharge_<?php echo $orderItem['ItemID'];?>" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:right"></td>
														<td width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"><input type="text" onblur="CountTotal('<?php echo $orderItem['ItemID'];?>')" value="<?php echo (isset($_POST['FeeAmount']) ? $_POST['FeeAmount'] :$orderItem['FeeAmount']);?>" name="FeeAmount" id="FeeAmount_<?php echo $orderItem['ItemID'];?>" class="form-control price" autocomplete="off" style="height: auto !important;text-align:right"></td>         
														
														<td width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"><input type="hidden" name="oldTotal" id="oldTotal_<?php echo $orderItem['ItemID'];?>" value="<?php echo $orderItem['TotalAmount'];?>"><input type="text" value="<?php echo $orderItem['TotalAmount'];?>" readonly="readonly" name="total" id="total_<?php echo $orderItem['ItemID'];?>" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right"></td>          
														<td width="15%" style="padding-left: 5px !important;padding-right: 5px !important;text-align:center"><?php echo $AddedByName;?><br><span style="font-size:12px"><?php echo date("d M, Y H:i", strtotime($orderItem['AddedOn']));?></td>          
														<td width="4%" style="text-align:center;padding-right: 18px !important;padding-left: 19px !important;">
                                                                <span onclick="callconfirmationupdate('<?php echo $orderItem['ItemID'];?>')" style="float: left;"><i class="fas fa-undo-alt"></i></span>
                                                                <span onclick="callconfirmationremove('<?php echo $orderItem['ItemID'];?>')" style="float: left;"><i class="fas fa-trash"></i></span>
                                                        </td>          
													</tr>
												</form> 
												<?php $i++; } ?> 
												<?php if(sizeof($orderItems)==0){ ?>
													<tr>
														<td colspan="7" style="text-align:center">order not found, may be processed or deleted</td>
													</tr>
												<?php } ?>
											</table>
											<!--<table class="table table-bordered table-hover" id="orderItems">
												<tr>
                                                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox" disabled="disabled"></th>
                                                    <th width="38%"><input type="text" autocomplete="off" id="Service" class="form-control input-lg" placeholder="Enter Service Name Here" style="height:auto !important"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
													<th width="2%"></th>
                                                    <th width="2%"></th>
                                                </tr>
                                                
                                            </table>-->
                                            <span class="errorstring" id="ErrService"><?php echo isset($ErrService)? $ErrService : "";?></span>                                                      
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                            <div class="col-sm-8" style="text-align:right"><b>Total</b></div>
                                            <div class="col-sm-4">
                                                <div class="form-group" style="padding:0px">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">RS</span>
                                                        </div>
                                                        <input readonly="readonly" value="<?php echo (isset($_POST['subtotal']) ? $_POST['subtotal'] :$orderValues[0]['OrderTotal']);?>" type="text" class="form-control" name="subtotal" id="subtotal" placeholder="Total" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:right">
											<div class="form-group">
												<button type="button" onclick="CallConfirmationBack('<?php echo $orderValues[0]['OrderID'];?>','release')" class="btn btn-outline-success submit_btn invoice-save-btm" style="float:left">Relese</button>
                                                <button type="button" onclick="CallConfirmationBack('<?php echo $orderValues[0]['OrderID'];?>','back')" class="btn btn-outline-success submit_btn invoice-save-btm">Back</button>
												<button type="button" value="Cancel Order" onclick="CallConfirmationCancelOrder('<?php echo $orderValues[0]['OrderID'];?>')" class="btn btn-success submit_btn invoice-save-btm">Cancel Order</button>
												<!--<button type="button" value="Save Order" onclick="CallConfirmation()" class="btn btn-success submit_btn invoice-save-btm">Create Order</button>
												<button type="button" value="Save Order" onclick="CallConfirmationSaveOrder()" class="btn btn-primary submit_btn invoice-save-btm">Save Order</button>
												<button type="submit" style="display:none" name="invoice_btn" id="invoice_btn" class="btn btn-success submit_btn invoice-save-btm" ></button>
												<button type="submit" style="display:none" name="saveorder_btn" id="saveorder_btn" class="btn btn-success submit_btn invoice-save-btm" ></button>-->
												
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
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
function CountTotal(ItemID){
		total = parseInt($("#FeeAmount_"+ItemID).val())+parseInt($("#ServiceCharge_"+ItemID).val());
		$("#total_"+ItemID).val(total);
		var subtotal = (parseInt($("#subtotal").val())+total)-$("#oldTotal_"+ItemID).val();
        $("#subtotal").val(subtotal);
		$("#oldTotal_"+ItemID).val(total);
	}
function callconfirmationupdate(ItemID){
		 
		var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to update this order?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="updateorder(\''+ItemID+'\')" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");  	
	}
function updateorder(ItemID) {
	 var param = $( "#itemFrm_"+ItemID).serialize();
   // $("#xconfrimation_text").html(loading);
    $.post( "webservice.php?action=updatesaveorderfromadmin",param,function(data) {                  
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}
function callconfirmationremove(ItemID){
		 
		var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to remove this item?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="Removeitem(\''+ItemID+'\')" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");  	
	}
	
 function Removeitem(ItemID) {
     var param = $( "#itemFrm_"+ItemID).serialize();
   // $("#xconfrimation_text").html(loading);
    $.post( "webservice.php?action=Removesaveditemfromadmin",param,function(data) {                  
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}
function CallConfirmationCancelOrder(OrderID){
		 
		var txt= '<form action="" method="POST" id="OrderFrm_'+OrderID+'">'
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
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="CancelOrder(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");  	
	}
	
 function CancelOrder(OrderID) {
     var param = $( "#OrderFrm_"+OrderID).serialize();
   // $("#xconfrimation_text").html(loading);
    $.post( "webservice.php?action=CancelOrderFromAdmin",param,function(data) {                  
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Orders/SavedOrders' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}
function ChooseReceiver(Receiver){
    if (Receiver == 'Agent'){
        $("#agent_div").show();
        $("#div_agentdetails").show();
        $("#div_agentdetails").html("");
        $("#customer_div").hide();
        $("#div_customerdetails").hide();
    }
    else{
        $("#agent_div").hide();
        $("#div_agentdetails").hide();
        $("#div_customerdetails").html("");
        $("#div_customerdetails").show();
        $("#customer_div").show();
        
    }
}
function CloseAgentDetailsDive(){
    $("#ChooseReceiver_div").show();
    ChooseReceiver("Agent");
}
function CloseCustomerDetailsDive(){
     $("#ChooseReceiver_div").show();
    ChooseReceiver("Customer");
}
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

function CallConfirmation(){
    ErrorCount=0; 
    var Agent = $('#Agent').val().trim();
       if (Agent=="0") {
            $('#ErrAgent').html("Please Select Agent");                                                    
            ErrorCount++;                                                                                      
        }
		if($(".itemRow").length=="0"){
			$('#ErrService').html("Please Select Service");                                                    
            ErrorCount++; 
		}else{
			$('#ErrService').html("");    
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
							+'Are you sure want to create order?<br>'
						+'</div>'
					+'</div>'
				 +'</div>'
				 +'<div class="modal-footer">'
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
    $("#Agent").blur(function () {
        $('#ErrAgent').html("");
        var Agent = $('#Agent').val().trim();
       if (Agent=="0") {
            $('#ErrAgent').html("Please Select Agent"); 
        }                                                                                                                  
    });                
    
 });

</script>

<script type="text/javascript">

function SwitchBox(event){
    var keycode = (event.keyCode ? event.keyCode : event.which); 
    if(keycode == '13'){ 
        $("#search").focus(); 
        
    }
    
}
</script>
<script>
/*function SelectAgent(AgentID){
	$.ajax({url:'../webservice.php?action=GetAgentDetails&AgentID='+AgentID,success:function(data){
            $('#div_agentdetails').html(data);
        }});
}*/
$(document).ready(function(){  
    $("#AgentDetails").autocomplete({
        source: "webservice.php?action=GetAgentInfo",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectAgent(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div onclick="SelectAgent('+ item +')">' + item.AgentName + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
     $("#AgentDetails").on('focus', function () {
        $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
    });
    $("#CustomerDetails").on('focus', function () {
        $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
    });
})
function SelectAgent(obj) {
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div style="border:1px solid #dee2e6;width: 100%;padding: 10px;">';
                    htmlRows += '<div class="col-sm-6" style="float:left"><h5> Agent Details</h5>';
                        htmlRows += obj.AgentName;
                        htmlRows += '<br>';
                        htmlRows += obj.SurName;
                        htmlRows += '<br>';
                        htmlRows += obj.MobileNumber;
                        htmlRows += '<br><br>';
                        htmlRows += 'Available Balance :&nbsp;'+obj.AvailableBalance;
                        htmlRows += '<br>';
                    htmlRows += '</div>';
                    htmlRows += '<div class="col-sm-6" style="float:left">';
                        htmlRows += '<button type="button" class="close" onclick="CloseAgentDetailsDive()" style="color:white"><span aria-hidden="true" style="color:black">&times;</span></button>';
                    htmlRows += '</div>';
                htmlRows += '</div>';
        htmlRows += '</div>';
                
        $("#div_agentdetails").html(htmlRows); 
        $("#Agent").val(obj.AgentID);
        $("#ErrAgent").html(""); 
        $("#ChooseReceiver_div").hide(); 
        $("#agent_div").hide(); 
        
}	
$(document).ready(function(){  
    $("#CustomerDetails").autocomplete({
        source: "webservice.php?action=GetCustomerInfo",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectCustomer(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div onclick="SelectCustomer('+ item +')">' + item.AgentName + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
})
function SelectCustomer(obj) {
        alert(obj);
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div style="border:1px solid #dee2e6;width: 100%;padding: 10px;">';
                    htmlRows += '<div class="col-sm-6" style="float:left"><h5> Customer Details</h5>';
                        htmlRows += obj.AgentName;
                        htmlRows += '<br>';
                        htmlRows += obj.SurName;
                        htmlRows += '<br>';
                        htmlRows += obj.MobileNumber;
                        htmlRows += '<br><br>';
                        htmlRows += 'Available Balance :&nbsp;'+obj.AvailableBalance;
                        htmlRows += '<br>';
                    htmlRows += '</div>';
                    htmlRows += '<div class="col-sm-6" style="float:left">';
                        htmlRows += '<button type="button" class="close" onclick="CloseCustomerDetailsDive()" style="color:white"><span aria-hidden="true" style="color:black">&times;</span></button>';
                    htmlRows += '</div>';
                htmlRows += '</div>';
        htmlRows += '</div>';
                
        $("#div_customerdetails").html(htmlRows); 
        $("#Agent").val(obj.AgentID);
        $("#ErrAgent").html(""); 
        $("#ChooseReceiver_div").hide(); 
        $("#customer_div").hide();
}
$(document).ready(function(){  
    $("#Service").autocomplete({
        source: "webservice.php?action=GetServiceDetails",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectService(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
		var inner_html = '<div onclick="SelectService('+ item +')">' + item.ServiceName + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
})
function SelectService(obj){
	
		var count = $(".itemRow").length;                                                              
        count++;
        var htmlRows = '';
        htmlRows += '<tr>';
			htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
			htmlRows += '<td><input type="hidden" name="ServiceCode[]" id="ServiceCode_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="hidden" name="ServiceID[]" id="ServiceID_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="text" readonly="readonly" name="ServiceName[]" id="ServiceName_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"></td>';    
			htmlRows += '<td><input type="text" name="ServiceCharge[]" id="ServiceCharge_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:center"></td>';
			htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="FeeAmount[]" id="FeeAmount_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:center"></td>';         
			htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right"></td>';          
			htmlRows += '<td style="text-align:right"></td>';          
        htmlRows += '</tr>';
        $('#orderItems').append(htmlRows);
        
        $("#ServiceID_"+count).val(obj.ServiceID); 
        $("#ServiceCode_"+count).val(obj.ServiceCode); 
        $("#ServiceName_"+count).val(obj.ServiceName);
        $("#ServiceCharge_"+count).val(obj.ServiceCharge);
        $("#FeeAmount_"+count).val(obj.FeeAmount);
		var charge=parseInt(obj.ServiceCharge);
		var fee =parseInt(obj.FeeAmount);
		var total = parseInt(charge+fee);
        $("#total_"+count).val(total);
        
		var STotal =parseInt($("#subtotal").val()); 
		var subtotal = parseInt(total+STotal);
		$("#subtotal").val(subtotal);
		
		
		$('#ErrService').html("");
       
}
/*function SelectService(ServiceID){
	if(ServiceID!="0"){
	$.ajax({url:'../webservice.php?action=GetServiceDetails&ServiceID='+ServiceID,success:function(data){
        var obj = JSON.parse(data); 
		var count = $(".itemRow").length;                                                              
        count++;
        var htmlRows = '';
        htmlRows += '<tr>';
			htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
			htmlRows += '<td><input type="hidden" name="ServiceCode[]" id="ServiceCode_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="text" readonly="readonly" name="ServiceName[]" id="ServiceName_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"></td>';    
			htmlRows += '<td><input type="text" readonly="readonly" name="ServiceCharge[]" id="ServiceCharge_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:center"></td>';
			htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="FeeAmount[]" id="FeeAmount_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:center"></td>';         
			htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right"></td>';          
        htmlRows += '</tr>';
        $('#orderItems').append(htmlRows);
        
        $("#ServiceCode_"+count).val(obj.ServiceCode); 
        $("#ServiceName_"+count).val(obj.ServiceName);
        $("#ServiceCharge_"+count).val(obj.ServiceCharge);
        $("#FeeAmount_"+count).val(obj.FeeAmount);
       
        }});
	}
}*/
function CallConfirmationSaveOrder(){
    ErrorCount=0; 
    var Agent = $('#Agent').val().trim();
       if (Agent=="0") {
            $('#ErrAgent').html("Please Select Agent");                                                    
            ErrorCount++;                                                                                      
        }
		if($(".itemRow").length=="0"){
			$('#ErrService').html("Please Select Service");                                                    
            ErrorCount++; 
		}else{
			$('#ErrService').html("");    
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
							+'Are you sure want to save order?<br>'
						+'</div>'
					+'</div>'
				 +'</div>'
				 +'<div class="modal-footer">'
					+'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
					+'<button type="button" class="btn btn-success" onclick="SaveOrder()" >Yes, Confirm</button>'
				 +'</div>';
     
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }else{
            return false;
        }
}
function SaveOrder() { 
    $("#saveorder_btn" ).trigger( "click" );
}  
 function CallConfirmationBack(OrderID,From){
                 
                var txt= '<form action="" method="POST" id="BackFrm_'+OrderID+'">'
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
                                        +'Are you sure want to '+From+'?<br>'
                                    +'</div>'
                                +'</div>'
                             +'</div>'
                             +'<div class="modal-footer">'
                                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                                +'<button type="button" class="btn btn-success" onclick="ConfirmBack(\''+OrderID+'\')" >Yes, Confirm</button>'
                             +'</div>';
                        $('#xconfrimation_text').html(txt);                                       
                        $('#ConfirmationPopup').modal("show");      
            }
            
         function ConfirmBack(OrderID) {
             var param = $( "#BackFrm_"+OrderID).serialize();
           // $("#xconfrimation_text").html(loading);
            $.post( "webservice.php?action=ConfirmBack",param,function(data) {                  
                var obj = JSON.parse(data); 
                var html = "";                                                                              
                if (obj.status=="Success") {
                   location.href="dashboard.php?action=Orders/SavedOrders";
                }
                $("#xconfrimation_text").html(html);
            });
        }
</script> 

<?php }else{ echo "<script>location.href='dashboard.php?action=Orders/viewsavedOrders&id=".$_GET['id']."&E=F'</script>"; ?>
    <div class="card">                                                                     
        <div class="card-body" style="text-align: center;">
            <i class="fas fa-clipboard-list" style="font-size:80px"></i><br><br>
             Order Processed, can't edit<br><br>
            <a href='dashboard.php?action=Orders/MySavedOrders' style="color:red">Continue</a>
        </div>    
    </div>    
<?php } ?>
<?php } ?>
</div>
                    </div>
                </div>
            </div>
        </div>