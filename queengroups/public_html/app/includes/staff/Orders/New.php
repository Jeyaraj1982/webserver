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
    $checkAgent = $mysql->select("select * from _queen_agent where IsActive='1'"); 
    $checkService = $mysql->select("select * from _queen_services where IsActive='1'");  ?>
   <?php  if(sizeof($checkAgent)==0){ ?>                                                          
         <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:center">
                                        <img src="../../assets/accessdenied.png" style="width: 12%;"><br> 
										Agent Not Found
										<br>
                                        <a href="dashboard.php" class="btn btn-outline-success btn-border">Continue</a>
                                    </div>
                                </div>
                            </div>                                                                                             
                        </div>                                                                          
                    </div>
                </div>
            </div>
        </div>
   <?php }else  if(sizeof($checkService)==0){ ?>
         <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:center">
                                        <img src="../../assets/accessdenied.png" style="width: 12%;"><br>Service Not Found <br>
                                        <a href="dashboard.php" class="btn btn-outline-success btn-border">Countinue</a>
                                    </div>
                                </div>
                            </div>                                                                                             
                        </div>                                                                          
                    </div>
                </div>
            </div>
        </div>
   <?php } else {  ?>
   
 
 
<script src="assets/js/invoice/invoice.js"></script>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">                                                                      
                    <div class="card">
                        <div class="container content-invoice">
                            <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                            <input type="hidden" id="Agent" name="Agent" value="<?php echo (isset($_POST['Agent']) ? $_POST['Agent'] :"");?>">
                                <div class="load-animate animated fadeInUp">
                                    <div class="row">
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> 
                                            <h2 class="title">New Order</h2>
                                        </div>
                                    </div><br>
                                    <input id="currency" type="hidden" value="$">                   
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
                                    <div class="row">  
                                        <div id="agent_div" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right" style="display: none;">
                                            <label class="col-sm-12" style="padding-left: 0px;">Select Agent</label>  
                                            <input type="text" autocomplete="off" id="AgentDetails" name="AgentDetails" class="form-control input-lg" placeholder="Enter Agent Details Here" style="height:auto !important;">
                                            <!--<span class="errorstring" id="ErrAgent"><?php echo isset($ErrAgent)? $ErrAgent : "";?></span> -->
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
                                            <!--<span class="errorstring" id="ErrCustomer"><?php echo isset($ErrCustomer)? $ErrCustomer : "";?></span>-->
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                           <div id="div_customerdetails">
                                                                                                         
                                            </div>
                                        </div>
                                   </div>                                            
                                   <div class="row">
                                    <div class="col-sm-12 errorstring" id="ErrAgent" style="color:red;font-size:12px"></div>
                                   </div>
                                    <br> 
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <select name="frmDay" class="form-control">
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select name="frmMonth" class="form-control"> 
                                                        <option value="01">Jan</option>
                                                        <option value="02">Feb</option>
                                                        <option value="03">Mar</option>
                                                        <option value="04">Apr</option>
                                                        <option value="05">May</option>
                                                        <option value="06">Jun</option>
                                                        <option value="07">Jly</option>
                                                        <option value="08">Aug</option>
                                                        <option value="09">Sep</option>
                                                        <option value="10">Oct</option>
                                                        <option value="11">Nov</option>
                                                        <option value="12">Dec</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select name="frmYear" class="form-control"> 
                                                        <option value="2020">2020</option>
                                                        <option value="2021" selected='selected'>2021</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <br> 
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <table class="table table-bordered table-hover" id="invoiceItem">
                                                <tr>
                                                   
                                                    <th style="text-align:left;">Service</th>
                                                    <th style="text-align:left;">App/Doc Details</th>
                                                    <th style="text-align:right;">Charge</th>
                                                    <th style="text-align:right;">Fee</th>
                                                    <th style="text-align:right;">Commission</th>
                                                    <th style="text-align:right;">Total</th>
                                                    <th></th>
                                                </tr>
                                                
                                            </table> 
                                            <table class="table table-bordered table-hover" id="invoiceItem">
                                                <tr>
                                                    
                                                    <th width="38%"><input type="text" autocomplete="off" id="Service" class="form-control input-lg" placeholder="Enter Service Name Here" style="height:auto !important">
														<!--<select class="form-control" name="Service" id="Service" onclick="SelectService($(this).val())"  style="height:auto !important">
															<option value="0" <?php echo ($_POST['Service']=="0") ? " selected='selected' " : "";?>>Select Service</option>
															<?php $Services = $mysql->select("select * from _queen_services where IsActive='1'");?>
															<?php foreach($Services as $Service) { ?>
																  <option value="<?php echo $Service['ServiceID'];?>" <?php echo ($_POST['Service']==$Service['ServiceID']) ? " selected='selected' " : "";?>><?php echo $Service['ServiceName'];?></option>
															<?php } ?>
														</select>--> 
													</th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                    <th width="15%"></th>
                                                </tr>
                                                
                                            </table>
                                            <span class="errorstring" id="ErrService"><?php echo isset($ErrService)? $ErrService : "";?></span>                                                      
                                        </div>
                                    </div>
                                   
                                    <div class="clearfix"></div>
									<div class="row">
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8"></div>
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="row">
											<div class="col-sm-4" style="text-align:right"><b>Total</b></div>
											<div class="col-sm-8">
												<div class="form-group" style="padding:0px">
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1">RS</span>
														</div>
														<input readonly="readonly" value="<?php echo (isset($_POST['subtotal']) ? $_POST['subtotal'] :"0.00");?>" type="number" class="form-control" name="subtotal" id="subtotal" placeholder="Total" style="text-align:right;font-weight:bold;" />
													</div>
												</div>
											</div>
										</div>
									</div>
									</div>  
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:right">
											<div class="form-group"> 
												<button type="button" onclick="location.href='dashboard.php?action=Orders/ManageOrders'" class="btn btn-outline-success submit_btn invoice-save-btm">Cancel Order</button>
												<!--<button type="button" value="Save Order" onclick="CallConfirmation()" class="btn btn-success submit_btn invoice-save-btm">Create Order</button>
												<button type="button" value="Save Order" onclick="CallConfirmation()" class="btn btn-success submit_btn invoice-save-btm">Paynow</button>          -->
												<button type="button" value="Save Order" onclick="CallConfirmationSaveOrder()" class="btn btn-success submit_btn">Save Order</button>
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

function CallConfirmation() {
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
    if(keycode == 13){ 
        $("#Service").focus(); 
    }
}
 
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
        var inner_html = '<div onclick="SelectAgent('+ item +')">' + item.AgentName + ' (Agent Code : '+item.AgentCode+')</div>';
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
         htmlRows += '<tr id="items_'+count+'">';
			htmlRows += '<td><input class="itemRow" type="checkbox" style="display: none;"><input type="hidden" name="ServiceCode[]" id="ServiceCode_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="hidden" name="ServiceID[]" id="ServiceID_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"><input type="text" readonly="readonly" name="ServiceName[]" id="ServiceName_'+count+'" class="form-control" autocomplete="off" style="height: auto !important;"></td>';    
            htmlRows += '<td><input type="text" Placeholder="Vechile Number / Applicant Name" onkeypress="SwitchBox(event)" name="DocDetails[]" id="DocDetails_'+count+'" class="form-control quantity" autocomplete="off" style="height: auto !important;;width:200px"></td>';
            
            if (obj.AllowtoChangeStaff=="1") {
                htmlRows += '<td><input type="text" onkeyup="calc()" name="ServiceCharge[]" id="ServiceCharge_'+count+'" class="form-control quantity" autocomplete="off" value="0"  style="height: auto !important;text-align:center;width:100px;text-align:right"></td>';    
            } else {
                htmlRows += '<td><input type="text" onkeyup="calc()" readonly="readonly" name="ServiceCharge[]" id="ServiceCharge_'+count+'" class="form-control quantity" value="0"  autocomplete="off" style="height: auto !important;text-align:center;width:100px;text-align:right"></td>';    
            }
			
            if (obj.AllowtochargeChangeStaff=="1") {
                htmlRows += '<td style="text-align:right"><input onkeyup="calc()" type="text"  name="FeeAmount[]" id="FeeAmount_'+count+'" class="form-control price" value="0"  autocomplete="off" style="height: auto !important;text-align:center;width:100px;text-align:right"></td>';         
            } else {
			    htmlRows += '<td style="text-align:right"><input onkeyup="calc()" type="text" readonly="readonly" name="FeeAmount[]" id="FeeAmount_'+count+'" value="0"  class="form-control price" autocomplete="off" style="height: auto !important;text-align:center;width:100px;text-align:right"></td>';         
            }
            
            htmlRows += '<td style="text-align:right"><input type="text" onkeyup="calc()"  name="ComAmount[]" id="comm_'+count+'" class="form-control total" value="0" autocomplete="off" style="height: auto !important;text-align:right;width:100px"></td>';          
            
			htmlRows += '<td style="text-align:right"><input type="text" readonly="readonly" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" style="height: auto !important;text-align:right;width:100px"></td>';          
            htmlRows += '<td style="text-align:center"><span onclick="callconfirmationremoveitem('+count+')" style="float: left;"><i class="fas fa-trash"></i></span></td>';          
        htmlRows += '</tr>';
        $('#invoiceItem').append(htmlRows);
        $("#ServiceID_"+count).val(obj.ServiceID); 
        $("#ServiceCode_"+count).val(obj.ServiceCode); 
        $("#ServiceName_"+count).val(obj.ServiceName);
        $("#ServiceCharge_"+count).val(obj.ServiceCharge);
        $("#FeeAmount_"+count).val(obj.FeeAmount);
		var charge=parseInt(obj.ServiceCharge);
        var comm=0;
		var fee =parseInt(obj.FeeAmount);
		var total = parseInt(charge+fee+comm);
        $("#total_"+count).val(total);
        
		var STotal =parseInt($("#subtotal").val()); 
		var subtotal = parseInt(total+STotal);
		$("#subtotal").val(subtotal);
		
		
		$('#ErrService').html("");
        
        //alert('DocDetails_'+count); 
      
       
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
        $('#invoiceItem').append(htmlRows);
        
        $("#ServiceCode_"+count).val(obj.ServiceCode); 
        $("#ServiceName_"+count).val(obj.ServiceName);
        $("#ServiceCharge_"+count).val(obj.ServiceCharge);
        $("#FeeAmount_"+count).val(obj.FeeAmount);
       
        }});
	}
}*/

function calc() {
    var count = $(".itemRow").length;  
    var subtotal = 0;
      
      for(i=1;i<=count;i++) {
        var charge=parseInt($("#ServiceCharge_"+i).val());
        var fee=parseInt($("#FeeAmount_"+i).val());
        var com=parseInt($("#comm_"+i).val());
        $('#total_'+i).val(charge+fee+com);
        subtotal+= (charge+fee+com);
       // var fee =parseInt(obj.FeeAmount);
       // var total = parseInt(charge+fee);  
      }
        $("#subtotal").val(subtotal); 
}
function CallConfirmationSaveOrder(){
    ErrorCount=0; 
    var Agent = $('#Agent').val().trim();
       if (Agent.length==0) {
            $('#ErrAgent').html("Please Select Agent / Customer");                                                    
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
       
        
    

  function CreateInvoice() { 
   // $("#invoice_btn" ).trigger( "click" );
    
    var param = $('#invoice-form').serialize();
    $.post('webservice.php?action=CreateInvoice',param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
                swal("Order Saved Successfully", {
                        icon:"success",
                        confirm: {value: 'Continue'}
                    }).then((value) => {
                        location.href='dashboard.php?action=Orders/MySavedOrders'
                    }); 
        } else {
                swal({ 
                  title: "Error",
                   text: "Error Save Invoice",
                    type: "error" 
                  });
             }});
}

 
  function callconfirmationremoveitem(count){
             
            var subtotal = parseInt($("#subtotal").val()-$("#total_"+count).val());
            $("#subtotal").val(subtotal);
            $("#items_"+count).remove();   
            
        }
</script> 
<?php }  ?> 