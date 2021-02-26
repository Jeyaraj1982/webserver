<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        $orderValues  = $mysql->select("SELECT * FROM _queen_temp_orders WHERE md5(OrderID) = '".$_GET['id']."'");
                        if(sizeof($orderValues)==0){ ?>
                            <div class="card">
                                <div class="card-body" style="text-align: center;">
                                    <i class="fas fa-clipboard-list" style="font-size:80px"></i><br><br>
                                    order not found, may be processed or deleted<br><br>
                                    <a href='dashboard.php?action=Orders/MySavedOrders' style="color:red">Continue</a>
                                </div>    
                            </div>                                               
                        <?php } else { ?>
                            <?php if($orderValues[0]['Edit']=="0" || $orderValues[0]['Edit']==$_SESSION['User']['StaffID']) { 
                                  $mysql->execute("update _queen_temp_orders set Edit='".$_SESSION['User']['StaffID']."' where OrderID    ='".$orderValues[0]['OrderID']."'");   
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

                
<script src="http://japps.online/demo/admin/assets/js/invoice/invoice.js"></script>
                    <div class="card">
                        <div class="container content-invoice">
                            <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                            <input type="hidden" id="OrderID" name="OrderID" value="<?php echo $_GET['id'];?>">
                            <input type="hidden" id="Agent" name="Agent" value="<?php echo (isset($_POST['Agent']) ? $_POST['Agent'] :$orderValues[0]['AgentID']);?>">
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
                                    <br><br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <th width="38%">Service</th>
                                                    <th width="15%" style="text-align:right">Charge</th>
                                                    <th width="15%" style="text-align:right">Fee</th>
                                                    <th width="15%" style="text-align:right">Total</th>
                                                    <th width="15%">Created</th>
                                                </tr>
                                            </table> 
                                            <table class="table table-bordered table-hover" id="orderItems">
                                                <?php $i=1; foreach($orderItems as $orderItem){ ?>
												<?php 
													if($orderItem['AddedBy']=="Staff"){
														$AddedBy = $mysql->select("select * from _queen_staffs where StaffID='".$orderItem['AddedByID']."'");
														$AddedByName=$AddedBy[0]['StaffName'];
													}if($orderItem['AddedBy']=="Admin"){
														$AddedBy = $mysql->select("select * from _queen_admin where AdminID='".$orderItem['AddedByID']."'");
														$AddedByName=$AddedBy[0]['AdminName'];
													}
												?>
												<tr>
													<td width="38%" style="padding-left:5px !important;padding-right:5px !important;">
                                                        <input class="itemRow" type="checkbox" style="display: none;">
                                                        <input type="hidden" value="<?php echo $orderItem['ServiceCode'];?>" id="ServiceCode_<?php echo $i;?>" class="form-control" autocomplete="off" style="height: auto !important;">
                                                        <input type="hidden" value="<?php echo $orderItem['ServiceID'];?>"id="ServiceID_<?php echo $i;?>" class="form-control" autocomplete="off" style="height: auto !important;">
                                                        <!--<input type="text" value="<?php echo $orderItem['ServiceName'];?>" readonly="readonly" name="ServiceName[]" id="ServiceName_<?php echo $i;?>" class="form-control" autocomplete="off" style="height: auto !important;">-->
                                                        <b><?php echo $orderItem['ServiceName'];?></b>          
                                                        <?php if (strlen(trim($orderItem['DocDetails']))>0) {?>
                                                        <br><span style="font-size:12px;color:#555"><?php echo $orderItem['DocDetails'];?></span>
                                                        <?php } ?>
                                                    </td>    
													<td width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"><input type="text" value="<?php echo $orderItem['Charge'];?>" readonly="readonly"  id="ServiceCharge_<?php echo $i;?>" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:right"></td>
													<td width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"><input type="text" value="<?php echo $orderItem['FeeAmount'];?>" readonly="readonly" id="FeeAmount_<?php echo $i;?>" class="form-control price" autocomplete="off" style="height: auto !important;text-align:right"></td>         
													<td width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"><input type="text" value="<?php echo $orderItem['TotalAmount'];?>" readonly="readonly"  id="total_<?php echo $i;?>" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right"></td>          
													<td width="15%" style="padding-left: 5px !important;padding-right: 5px !important;text-align:center"><?php echo $AddedByName;?><br><span style="font-size:12px"><?php echo date("d M, Y H:i", strtotime($orderItem['AddedOn']));?></span></td>          
												</tr>
												
												<?php $i++; } ?>
												<?php if(sizeof($orderItems)==0){ ?>
													<tr>
														<td colspan="7" style="text-align:center">order not found, may be processed or deleted</td>
													</tr>
												<?php } ?>
											</table>
											<table class="table table-bordered table-hover" id="orderItems">
												<tr>
                                                    <th width="38%" style="padding-left:5px !important;padding-right:5px !important;"><input type="text" autocomplete="off" id="Service" class="form-control input-lg" placeholder="Enter Service Name Here" style="height:auto !important"></th>
                                                    <th width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"></th>
                                                    <th width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"></th>
                                                    <th width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:right;"></th>
                                                    <th width="15%" style="padding-left:5px !important;padding-right:5px !important;text-align:center;"></th>
                                                </tr>
                                                
                                            </table>
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
												<!--<button type="button" value="Cancel Order" onclick="CallConfirmationCancelOrder('<?php //echo $orderValues[0]['OrderID'];?>')" class="btn btn-warning submit_btn invoice-save-btm">Cancel Order</button>-->
												<button type="button" value="Save Order" onclick="CallConfirmation()" id="create_order" class="btn btn-success submit_btn invoice-save-btm">Complete Order</button>
												<!--<button type="button" value="Save Order" onclick="CallConfirmation()" id="pay_order" class="btn btn-outline-success submit_btn invoice-save-btm">Paynow</button>-->
												<button type="button" value="Save Order" onclick="CallConfirmationSaveOrder()" id="save_order" disabled="disabled" class="btn btn-primary submit_btn invoice-save-btm">Save Order</button>
												<button type="button" style="display:none" name="invoice_btn" id="invoice_btn" class="btn btn-success submit_btn invoice-save-btm" ></button>
												<button type="button" style="display:none" name="saveorder_btn" id="saveorder_btn" class="btn btn-success submit_btn invoice-save-btm" ></button>
												
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
                            </form> 
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

    var calc_count=0;    
    function ChooseReceiver(Receiver){
        if (Receiver == 'Agent'){
            $("#agent_div").show();
            $("#div_agentdetails").show();
            $("#div_agentdetails").html("");
            $("#customer_div").hide();
            $("#div_customerdetails").hide();
        } else {
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
    
    function successpopup(receiptid,paidamount) {
        var txt = '<div class="form-group row">'
                    + '<div class="col-sm-12" style="text-align:center">'
                        + '<img src="http://japps.online/demo/admin/assets/tick.jpg" style="width:30%"><br><span>Invoice Created</span><br>'
                    + '</div>'
                  + '</div>'
                  + '<div style="padding:20px;text-align:center">'
                    + '<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action=Invoice/view&invoice_id='+receiptid+'\'" >Countinue</button>'
                  + '</div>';  
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
            //$("#invoice_btn" ).trigger( "click" );
            // $("#invoice_btn" ).trigger( "click" );
    
    var param = $('#invoice-form').serialize();
    $.post('webservice.php?action=CreateInvoice',param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
                swal(obj.message, {
                        icon:"success",
                        confirm: {value: 'Continue'}
                    }).then((value) => {
                        location.href='dashboard.php?action=Orders/ManageOrders'
                    }); 
        } else {
                swal({ 
                  title: "Error",
                   text: obj.message,
                    type: "error" 
                  });
             }});
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

 

        function SwitchBox(event){
            var keycode = (event.keyCode ? event.keyCode : event.which); 
            if(keycode == '13'){ 
                $("#search").focus(); 
                
            }
            
        }
  
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
	             calc();
		        var count = $(".itemRow").length;                                                              
                count++;
                var htmlRows = '';
                htmlRows += '<tr id="items_'+count+'">';
			        htmlRows += '<td style="padding-left:5px !important;padding-right:5px !important;"><input class="itemRow" type="checkbox" style="display:none"><input type="hidden" name="ServiceCode[]" id="ServiceCode_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="hidden" name="ServiceID[]" id="ServiceID_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="text" readonly="readonly" name="ServiceName[]" id="ServiceName_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;">';    
                    htmlRows += '<input type="text" Placeholder="Vechile Number / Applicant Name" name="DocDetails[]" id="DocDetails_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;"></td>';
			        //htmlRows += '<td style="padding-left:5px !important;padding-right:5px !important;"><input type="text" onblur="CountTotal('+count+')" name="ServiceCharge[]" id="ServiceCharge_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:right"></td>';
			        //htmlRows += '<td style="padding-left:5px !important;padding-right:5px !important;"><input type="text" onblur="CountTotal('+count+')" name="FeeAmount[]" id="FeeAmount_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:right"></td>';         
                     if (obj.AllowtoChangeStaff=="1") {
                htmlRows += '<td><input type="text" onkeyup="calc()" name="ServiceCharge[]" id="ServiceCharge_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:center"></td>';    
            } else {
                htmlRows += '<td><input type="text" onkeyup="calc()" readonly="readonly" name="ServiceCharge[]" id="ServiceCharge_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;text-align:center"></td>';    
            }
            
            if (obj.AllowtochargeChangeStaff=="1") {
                htmlRows += '<td style="text-align:right"><input onkeyup="calc()" type="text"  name="FeeAmount[]" id="FeeAmount_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:center"></td>';         
            } else {
                htmlRows += '<td style="text-align:right"><input onkeyup="calc()" type="text" readonly="readonly" name="FeeAmount[]" id="FeeAmount_'+count+'" class="form-control price" autocomplete="off" style="height: auto !important;text-align:center"></td>';         
            }
            
			        htmlRows += '<td style="padding-left:5px !important;padding-right:5px !important;"><input type="hidden" name="oldTotal[]" id="oldTotal_'+count+'"><input type="text" readonly="readonly" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right"></td>';          
			        htmlRows += '<td style="text-align:center"><span onclick="callconfirmationremoveitem('+count+')" style="float: left;"><i class="fas fa-trash"></i></span></td>';          
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
                $("#oldTotal_"+count).val(total);
                                                                                      
		        var STotal =parseInt($("#subtotal").val()); 
		        var subtotal = parseInt(total+STotal);
		        $("#subtotal").val(subtotal);
		        
		        
		        $('#ErrService').html("");
               
        }                                                                                     
        function callconfirmationremoveitem(count){
             
            var subtotal = parseInt($("#subtotal").val()-$("#total_"+count).val());
            $("#subtotal").val(subtotal);
            $("#items_"+count).remove();   
            
        }
        function CountTotal(count){
                total = parseInt($("#FeeAmount_"+count).val())+parseInt($("#ServiceCharge_"+count).val());
                $("#total_"+count).val(total);
                var subtotal = (parseInt($("#subtotal").val())+total)-$("#oldTotal_"+count).val();
                $("#subtotal").val(subtotal);
                $("#oldTotal_"+count).val(total);
            }        
      
            function calc() {
                calc_count++;
                if (calc_count>0) {
                    $('#create_order').attr("disabled","disabled");
                    $('#save_order').removeAttr("disabled");
                }
    var count = $(".itemRow").length;  
    var subtotal = 0;
      
      for(i=1;i<=count;i++) {
        var charge=parseInt($("#ServiceCharge_"+i).val());
        var fee=parseInt($("#FeeAmount_"+i).val());
        $('#total_'+i).val(charge+fee);
        subtotal+= (charge+fee);
       // var fee =parseInt(obj.FeeAmount);
       // var total = parseInt(charge+fee);  
      }
        $("#subtotal").val(subtotal); 
}
                                                                    
         
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
            $.post( "webservice.php?action=CancelOrderFromStaff",param,function(data) {                  
                var obj = JSON.parse(data); 
                var html = "";                                                                              
                if (obj.status=="failure") {
                    html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br>"+obj.message+"<br></div></div>";
                    html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
                }if (obj.status=="Success") {
                    html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br></div></div>";
                    html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Orders/MySavedOrders' class='btn btn-outline-success'>Continue</a></div>"; 
                }
                $("#xconfrimation_text").html(html);
            });
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
                   location.href="dashboard.php?action=Orders/AllSavedOrders";
                }
                $("#xconfrimation_text").html(html);
            });
        }
        
        
        function SaveOrder() { 
     $('#ConfirmationPopup').modal("hide");
    //$("#saveorder_btn" ).trigger( "click" );
    var param = $('#invoice-form').serialize();
    $.post('webservice.php?action=SaveOrder',param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
                swal("Order Saved Successfully", {
                        icon:"success",
                        confirm: {value: 'Continue'}
                    }).then((value) => {
                        location.href='dashboard.php?action=Orders/editsavedOrders&id='+obj.OrderID
                    }); 
        } else {
                swal({ 
                  title: "Error",
                   text: obj.message,
                    type: "error" 
                  });
             }});
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