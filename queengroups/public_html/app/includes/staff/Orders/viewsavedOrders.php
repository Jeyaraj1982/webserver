<?php $Orders = $mysql->select("select * from _queen_temp_orders where md5(OrderID)='".$_GET['id']."'");
$items = $mysql->select("select * from _queen_temp_order_item where OrderID='".$Orders[0]['OrderID']."'");
?>  
 <?php  
                     if (isset($_POST['invoice_btn'])) {  
						$ErrorCount=0;
						$Balance = getTotalBalanceWallet($Orders[0]['AgentID']);
						if($Balance < $Orders[0]['OrderTotal']){
							$ErrorCount++;	?>
							<script>
                             $(document).ready(function() {
                                $(document).ready(function() {
									swal("Error Create Order Insufficient Balance ", {
						            icon:"error" 
                                  }); 
                             });
                             });
                            </script>
						<?php }
							if($ErrorCount==0){
		                    $random = sizeof($mysql->select("select * from _queen_orders")) + 1;
		                    $OrderCode ="ORD0000".$random;
		                    
		                    $Agentdetails = $mysql->select("select * from _queen_agent where AgentID='".$Orders[0]['AgentID']."'"); 
		                    
		                    $id = $mysql->insert("_queen_orders",array("AgentID"            => $Agentdetails[0]['AgentID'],
                                                                       "AgentCode"          => $Agentdetails[0]['AgentCode'],
                                                                       "AgentName"          => $Agentdetails[0]['AgentName'],
                                                                       "AgentMobileNumber"  => $Agentdetails[0]['MobileNumber'],
												                       "StaffID"            => $_SESSION['User']['StaffID'],
                                                                       "StaffCode"          => $_SESSION['User']['StaffCode'],
                                                                       "StaffName"          => $_SESSION['User']['StaffName'],
                                                                       "OrderCode"          => $OrderCode,
                                                                       "OrderTotal"   	    => $Orders[0]['OrderTotal'],
                                                                       "OrderOn"   			=> date("Y-m-d H:i:s")));
                                                  
				                    //for ($i = 0; $i < count($_POST['ServiceCode']); $i++) {
									foreach($items as $item){
				                                                                                          
				                    $sid= $mysql->insert("_queen_order_item",array("OrderID"     => $id,
                                                                                   "ServiceID"   => $item['ServiceID'],
															                       "ServiceCode" => $item['ServiceCode'],
															                       "ServiceName" => $item['ServiceName'],
															                       "Charge"      => $item['Charge'],
                                                                                   "FeeAmount"   => $item['FeeAmount'],
                                                                                   "TotalAmount" => $item['TotalAmount']));
				                    }
                        
						      $mysql->insert("_queen_wallet",array("AgentID"   			=> $Agentdetails[0]['AgentID'],
																   "Credits"      		=> "0", 
																   "Debits"       		=> $Orders[0]['OrderTotal'],
																   "AvailableBalance"   => getTotalBalanceWallet($Agentdetails[0]['AgentID'])-$Orders[0]['OrderTotal'],
																   "Particulars"      	=> "Create Order /".$id,
																   "StaffID"      	    => $_SESSION['User']['StaffID'],
																   "AddOn"              => date("Y-m-d H:i:s")));
																   
						$mysql->execute("update _queen_orders set IsPaid='1',PaidOn='".date("Y-m-d H:i:s")."' where OrderID    ='".$id."'"); 
						$mysql->execute("DELETE FROM _queen_temp_orders where OrderID='".$Orders[0]['OrderID']."'");
                        $mysql->execute("DELETE FROM _queen_temp_order_item where OrderID='".$Orders[0]['OrderID']."'");	
                          if(sizeof($id)>0 && sizeof($sid)>0){                                                                           
                                     ?>                                                                   
                        <script> 
				            $(document).ready(function() {
					            swal("Order Created Successfully", {
						            icon:"success",
						            confirm: {value: 'Continue'}
					            }).then((value) => {
						            location.href='dashboard.php?action=Orders/view&id=<?php echo md5($id); ?>'
					            });                                     
				            });
			            </script>                                                                                   
                         <?php unset($_POST); }else {  ?>
                        <script>
                             $(document).ready(function() {
                                swal("Error Create order", {
						            icon:"error" 
                                  });
                             });
                            </script>
                    <?php  }
					 } }  ?>  
<form method="post" action="">
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
	            <div class="col-md-12">
                    <?php if($_GET['E']=="F"){ ?>
                            <div style="border: 1px solid #ebecec;padding:10px;border-radius:10px;background: #fffbd6;">
                                <i class="fas fa-exclamation-triangle" style="color: red"></i> &nbsp;This order opened another person. You can't edit   
                            </div><br>                                                       
                        <?php } ?>
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
                    <a href="dashboard.php?action=Orders/MySavedOrders" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                    <a href="printtemporder.php?id=<?php echo $_GET['id'];?>" target="blank" class="btn btn-primary">Print</a>&nbsp;
					<button type="button" value="Save Order" onclick="CallConfirmation()" class="btn btn-success submit_btn invoice-save-btm">Paynow</button>
					<button type="submit" style="display:none" name="invoice_btn" id="invoice_btn" class="btn btn-success submit_btn invoice-save-btm" ></button>
                </div>
            </div>
        </div>
    </div>
</div> 
</form>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div> 
</div>
<script>                                                        
 
 
function CallConfirmation() {
    ErrorCount=0; 
    
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

</script>
