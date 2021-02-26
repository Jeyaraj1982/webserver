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
                                        <?php echo date("M d, Y H:i",strtotime($Orders[0]['OrderOn']));?><br><br>
										<h5 style="margin-bottom:0px;font-weight: bold;">Staff Details</h5>
                                        <?php echo $Orders[0]['StaffName'];?><br><br>
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
														<th style="text-align:right">Charge<br> ( <i class="fas fa-rupee-sign"></i> )</th>
                                                        <th style="text-align:right">Fee Amount<br> ( <i class="fas fa-rupee-sign"></i> )</th>
														<th style="text-align:right">Total<br> ( <i class="fas fa-rupee-sign"></i> )</th>
											        </tr>
										        </thead>
										        <tbody>
                                                    <?php foreach($items as $item){ ?>
                                                        <tr>
                                                            <td><?php echo $item['ServiceCode'];?></td>
                                                            <td><?php echo $item['ServiceName'];?></td>
                                                            <td style="text-align:right"><?php echo number_format($item['Charge'],2);?></td>
                                                            <td style="text-align:right"><?php echo number_format($item['FeeAmount'],2);?></td>
                                                            <td style="text-align:right"><?php echo number_format($item['TotalAmount'],2);?></td>
                                                        </tr>
                                                    <?php } ?>
                                                        <tr>
                                                            <td colspan="4" style="text-align:right">Sub Total ( <i class="fas fa-rupee-sign"></i> )</td>
                                                            <td style="text-align:right"> <?php echo number_format($Orders[0]['OrderTotal'],2);?></td> 
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
						            <div class="price"><i class="fas fa-rupee-sign"></i> <?php echo number_format($Orders[0]['OrderTotal'],2);?></div>
					            </div>
				            </div>
				        </div>
		            </div>
	            </div>
            </div>
			<div class="row">
                <div class="col-md-12" style="padding-right:0px;padding-left:0px;text-align:center">
                    <a href="dashboard.php?action=Orders/ManageOrders" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                    <a href="printorder.php?id=<?php echo $_GET['id'];?>" target="blank" class="btn btn-primary">Print</a>&nbsp;
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
 
 function PaidOrderfrAdmin(OrderID) {
     var param = $( "#OrdePaidFrm_"+OrderID).serialize();
    $("#xconfrimation_text").html(loading);
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
