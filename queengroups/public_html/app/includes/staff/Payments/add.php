<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
<style>
.ui-state-active h4,
.ui-state-active h4:visited {
  /*  color: #26004d ;  */
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

     

    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0; 
             $Agentdetails = $mysql->select("select * from _queen_agent where AgentID='".$_POST['Agent']."'");  
            if($ErrorCount==0){ 
                  $Created = $_POST['frmYear']."-".$_POST['frmMonth']."-".$_POST['frmDay'];
                  
                  
                  $id=   $mysql->insert("_tbl_transactions",array("TxnDate"       => $Created,
                                                                  "TxnOn"         => date("Y-m-d H:i:s"),
                                                                  "AgentCode"       => $Agentdetails[0]['AgentCode'],
                                                                  "StaffID"       => $_SESSION['User']['StaffID'],
                                                                  "ServiceID"     => "0",
                                                                  "ServiceName"   => "0",
                                                                  "Particulars"   => "Cash Recevied",
                                                                  "ApplicantName" => "",
                                                                  "Charge"        => "0",
                                                                  "Fee"           => "0",
                                                                  "Commission"    => "0",
                                                                  "Debits"        => $_POST['Amount'],
                                                                  "TxnRemarks"        => $_POST['Remarks'],
                                                                  "Credits"       => "0",
                                                                  "AvailableBalance" => getBalance($Agentdetails[0]['AgentCode'])+($_POST['Amount'])));
              
              
          
            if(sizeof($id)>0){ 
                 $message = "Rs. ".$_POST['Amount']. " has recevied from agent ".$Agentdetails[0]['AgentName']." (".$Agentdetails[0]['AgentCode'].") records updated by ".$_SESSION['User']['StaffName']; 
               SendTextTelegram(1661537746,$message);
               SendTextTelegram(1107300198,$message);
                unset($_POST);
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Payment Added Successfully", { 
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=Payments/list'
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
    $("#AgentDetails").on('focus', function () {
        $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
    });
    $("#CustomerDetails").on('focus', function () {
        $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
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
                                    <div class="card-title">Add Payment</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" id="Agent" name="Agent" value="<?php echo (isset($_POST['Agent']) ? $_POST['Agent'] :"");?>">
                                   <div class="card-body">
                                   
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
                                                        <option value="1">Jan</option>
                                                        <option value="2">Feb</option>
                                                        <option value="3">Mar</option>
                                                        <option value="4">Apr</option>
                                                        <option value="5">May</option>
                                                        <option value="6">Jun</option>
                                                        <option value="7">Jly</option>
                                                        <option value="8">Aug</option>
                                                        <option value="9">Sep</option>
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
                                        <div class="form-group form-show-validation row">
                                            <div class="form-check form-check-inline" style="padding:0px">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio"  onchange="ChooseReceiver('Agent')" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Agent</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio"  onchange="ChooseReceiver('Customer')" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Customer</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="agent_div" class="form-group form-show-validation row" style="display: none;">
                                            <div class="col-sm-6" style="padding-left:0px ;">
                                                <label for="name">Select Agent<span style="color:red">*</span></label>
                                                 <input type="text" autocomplete="off" id="AgentDetails" name="AgentDetails" class="form-control input-lg" placeholder="Enter Agent Details Here" style="height:auto !important;">
                                                <span class="errorstring" id="ErrAgent"><?php echo isset($ErrAgent)? $ErrAgent : "";?></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="div_agentdetails">
                                                                                                             
                                                </div>    
                                            </div>
                                        </div>
                                        <div id="customer_div" class="form-group form-show-validation row" style="display: none;">
                                            <div class="col-sm-6" style="padding-left:0px ;">
                                                <label for="name">Select Customer<span style="color:red">*</span></label>
                                                <input type="text" autocomplete="off" id="CustomerDetails" name="CustomerDetails" class="form-control input-lg" placeholder="Enter Customer Details Here" style="height:auto !important;">
                                                <span class="errorstring" id="ErrCustomer"><?php echo isset($ErrCustomer)? $ErrCustomer : "";?></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="div_customerdetails">
                                                                                                             
                                                </div>    
                                            </div>
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
                                            <label for="name">Transaction ID</label>
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
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Payment</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;"></button>
                                                <a href="dashboard.php?action=Payments/list&status=All" class="btn btn-warning btn-border">Back</a>
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

<script language="javascript">
function ChooseReceiver(Receiver){
    if (Receiver == 'Agent'){
        $("#agent_div").show();
        $("#customer_div").hide();
    }
    else{
        $("#agent_div").hide();
        $("#customer_div").show();
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
        var inner_html = '<div onclick="SelectAgent('+ item +')">' + item.AgentName +  '(Agent Code: '+item.AgentCode+')</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
})
function SelectAgent(obj) {
    
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div class="col-sm-6">';
                    htmlRows += obj.AgentName;
                    htmlRows += '<br>';
                    htmlRows += obj.SurName;
                    htmlRows += '<br>';
                    htmlRows += obj.MobileNumber;
                    htmlRows += '<br>';
                
        $("#div_agentdetails").html(htmlRows); 
        $("#Agent").val(obj.AgentID);
        $("#ErrAgent").html(""); 
        
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
        var inner_html = '<div onclick="SelectCustomer('+ item +')">' + item.AgentName +  '(Agent Code: '+item.AgentCode+')</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
})
function SelectCustomer(obj) {
    
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div class="col-sm-6">';
                    htmlRows += obj.AgentName;
                    htmlRows += '<br>';
                    htmlRows += obj.SurName;
                    htmlRows += '<br>';
                    htmlRows += obj.MobileNumber;
                    htmlRows += '<br>';
                
        $("#div_customerdetails").html(htmlRows); 
        $("#Agent").val(obj.AgentID);
        $("#ErrAgent").html(""); 
        
}
</script>