<?php $Orders = $mysql->select("select * from _queen_orders where md5(OrderID)='".$_GET['id']."'");
$items = $mysql->select("select * from _queen_order_item where OrderID='".$Orders[0]['OrderID']."'");
?>    

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
	            <div class="col-md-12">
		            <div class="card card-invoice">
			            <div class="card-header">
				            <div class="invoice-header" style="vertical-align:top;">
					            <h3 class="invoice-title">
						            Order
					            </h3>
					            <div class="invoice-logo">
						            <div class="row" style="margin-bottom: 15px;">
										<div class="col-sm-12" style="text-align: right;">
											  
										</div>
									</div>
					            </div>
				            </div>
                            <div class="row" style="margin-right:0px;margin-left:0px">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Agent Details</h5>
                                        <?php echo $Orders[0]['AgentName'];?><br>
                                        <?php echo $Orders[0]['AgentMobileNumber'];?><br>
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Order Details</h5>
                                        <?php echo "Order Number: ".$Orders[0]['OrderCode'];?><br>
                                        <?php echo date("M d, Y H:i",strtotime($Orders[0]['OrderOn']));?><br>
                                        <?php echo "Order Status: ";?><?php if($Orders[0]['IsPaid']=="1"){ echo "<span style='color:green'>Paid</span>"; } else { echo "<span style='color:red'>Unpaid</span>";} ?><br><br>
                                         
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Staff Details</h5>
                                        <?php echo $Orders[0]['StaffName'];?><br>
                                        <?php echo $Orders[0]['StaffCode'];?>
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
												        <th>Service Code<br>&nbsp;</th>
                                                        <th>Service Name<br>&nbsp;</th>
                                                        <th style="text-align:right">Fees<br> ( <i class="fas fa-rupee-sign"></i> )</th>
														<th style="text-align:right">Charge<br> ( <i class="fas fa-rupee-sign"></i> )</th>
														<th style="text-align:right">Total<br> ( <i class="fas fa-rupee-sign"></i> )</th>
														<th></th>
											        </tr>
										        </thead>
										        <tbody>
                                                    <?php foreach($items as $item){ ?>
													<form method="post" id="itemFrm_<?php echo $item['ItemID'];?>">
													<input type="hidden" name="ItemID" id="ItemID" value="<?php echo $item['ItemID'];?>">
														<tr>
                                                            <td><?php echo $item['ServiceCode'];?></td>
                                                            <td><?php echo $item['ServiceName'];?></td>
                                                            <td style="text-align:right"><input type="text" onblur="CountTotal('<?php echo $item['ItemID'];?>')" name="FeeAmount" id="FeeAmount_<?php echo $item['ItemID'];?>" value="<?php echo (isset($_POST['FeeAmount']) ? $_POST['FeeAmount'] :$item['FeeAmount']);?>" class="form-control onlynumeric" style="height:auto !important;text-align:right"></td>
                                                            <td style="text-align:right"><input type="text" onblur="CountTotal('<?php echo $item['ItemID'];?>')" name="Charge" id="Charge_<?php echo $item['ItemID'];?>" value="<?php echo (isset($_POST['Charge']) ? $_POST['Charge'] :$item['Charge']);?>" class="form-control onlynumeric" style="height:auto !important;text-align:right"></td></td>
                                                            <td style="text-align:right"><input type="hidden" name="oldTotal" id="oldTotal_<?php echo $item['ItemID'];?>" value="<?php echo $item['TotalAmount'];?>"><input type="hidden" name="TotalAmount" id="TotalAmount_<?php echo $item['ItemID'];?>"><span id="total_<?php echo $item['ItemID'];?>"><?php echo number_format($item['TotalAmount'],2);?></span></td>
															<td><button type="button" class="btn btn-success btn-sm" onclick="callconfirmation('<?php echo $item['ItemID'];?>')">update</button></td>
															<td><button type="button" class="btn btn-danger btn-sm" onclick="Removecallconfirmation('<?php echo $item['ItemID'];?>')">Remove</button></td>
														</tr>
													</form>  
                                                    <?php } ?>
													
                                                        <tr>
                                                            <td colspan="4" style="text-align:right">Sub Total ( <i class="fas fa-rupee-sign"></i> )</td>
                                                            <td style="text-align:right"><input type="hidden" name="OrderTotal" id="OrderTotal" value="<?php echo (isset($_POST['OrderTotal']) ? $_POST['OrderTotal'] : $Orders[0]['OrderTotal']);?>"><span id="ordertotal"><?php echo number_format($Orders[0]['OrderTotal'],2);?></div></td>  
															<td></td>
															<td></td>
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
						            <div class="price"><i class="fas fa-rupee-sign"></i><span id="finalTotal" style="font-size: 28px;"> <?php echo number_format($Orders[0]['OrderTotal'],2);?></span></div>
					            </div>
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
	function CountTotal(ItemID){
		total = parseInt($("#FeeAmount_"+ItemID).val())+parseInt($("#Charge_"+ItemID).val());
		$("#TotalAmount_"+ItemID).val(total);
		$("#total_"+ItemID).html(total);
		var subtotal = (parseInt($("#OrderTotal").val())+total)-$("#oldTotal_"+ItemID).val();
		$("#OrderTotal").val(subtotal);
		$("#ordertotal").html(subtotal);
		$("#finalTotal").html(subtotal);
	}
	function callconfirmation(ItemID){
		 
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
    $.post( "../webservice.php?action=updateorderfromadmin",param,function(data) {                  
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
function Removecallconfirmation(ItemID){
		 
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
    $.post( "../webservice.php?action=Removeitem",param,function(data) {                  
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

</script>
