<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupServiceCode = $mysql->select("select * from _queen_services where ServiceCode='".$_POST['ServiceCode']."'");
            if(sizeof($dupServiceCode)>0){
                $ErrServiceCode ="Service Code Already Exist";
                $ErrorCount++;
            }
            $dupServiceName = $mysql->select("select * from _queen_services where ServiceName='".$_POST['ServiceName']."'");
            if(sizeof($dupServiceName)>0){
                $ErrServiceName ="Service Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                  
              $id = $mysql->insert("_queen_services",array("ServiceCode"              => $_POST['ServiceCode'],
														   "ServiceName"              => $_POST['ServiceName'],
                                                           "FeeAmount"                => $_POST['FeeAmount'],
                                                           "AllowtoChangeStaff"       => (($_POST['AllowtoChangeStaff']=="on") ? '1' : '0'),
                                                           "ServiceCharge"            => $_POST['ServiceCharge'],
                                                           "AllowtochargeChangeStaff" => (($_POST['AllowtochargeChangeStaff']=="on") ? '1' : '0'),
                                                           "Description"              => str_replace("'","\\'",$_POST['Description']),
                                                           "IsAdmin"                  => "1",
														   "AdminID"                  => $_SESSION['User']['AdminID'],
														   "CreatedOn"                => date("Y-m-d H:i:s")));
            //  $mysql->execute("update _queen_sequence set LastNumber=LastNumber+1 where SequenceFor='Service'");  
            if(sizeof($id)>0){ 
                unset($_POST);
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Service Added Successfully", { 
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=Services/list&status=All'
                        });
                    });
                    </script>
       <?php     }
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error add service", "warning")
             });
            </script>
           <?php   }
    }
   
?>
<script>
$(document).ready(function () {
    $("#ServiceCode").blur(function () {
        if(IsNonEmpty("ServiceCode","ErrServiceCode","Please Enter Service Code")){
            IsAlphaNumeric("ServiceCode","ErrServiceCode","Please Enter Alpha Numeric Characters Only");
        }
    });
    $("#ServiceName").blur(function () {
        if(IsNonEmpty("ServiceName","ErrServiceName","Please Enter Service Name")){
            IsAlphaNumeric("ServiceName","ErrServiceName","Please Enter Alpha Numeric Characters Only");
        }
    });
	$("#FeeAmount").blur(function () {
       // if(IsNonEmpty("FeeAmount","ErrFeeAmount","Please Enter Fee Amount")){
           IsNumeric("FeeAmount","ErrFeeAmount","Please Enter Numerics Character Only");
       // }
    });
	$("#ServiceCharge").blur(function () {
        if(IsNonEmpty("ServiceCharge","ErrServiceCharge","Please Enter Service Charge")){
           IsNumeric("ServiceCharge","ErrServiceCharge","Please Enter Numerics Character Only");
        }
    });

});

</script>
      <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add Service</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                   <div class="card-body">
										<div class="form-group form-show-validation row">
                                            <label for="name">Service Code<span style="color:red">*</span></label>      
                                            <input type="text" class="form-control" id="ServiceCode" name="ServiceCode" placeholder="Enter Service Code" value="<?php echo (isset($_POST['ServiceCode']) ? $_POST['ServiceCode'] : "");?>">
                                            <span class="errorstring" id="ErrServiceCode"><?php echo isset($ErrServiceCode)? $ErrServiceCode : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Service Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ServiceName" name="ServiceName" placeholder="Enter Service Name" value="<?php echo (isset($_POST['ServiceName']) ? $_POST['ServiceName'] :"");?>">
                                            <span class="errorstring" id="ErrServiceName"><?php echo isset($ErrServiceName)? $ErrServiceName : "";?></span>    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-6" style="padding-left:0px">
                                                <label for="name">Fee Amount</label>
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="FeeAmount" name="FeeAmount" placeholder="Enter Fee Amount" value="<?php echo (isset($_POST['FeeAmount']) ? $_POST['FeeAmount'] :"0");?>">
                                                </div>
                                                <div class="col-sm-12" style="padding: 0px;">
                                                    <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="AllowtoChangeStaff" name="AllowtoChangeStaff" <?php echo ($_POST['AllowtoChangeStaff']==1) ? ' checked="checked" ' :'';?>>
                                                        <label class="custom-control-label" for="AllowtoChangeStaff" style="font-weight: normal;margin-bottom:0px">Allow to change staff</label>
                                                    </div>
                                                </div>
                                                <span class="errorstring" id="ErrFeeAmount"><?php echo isset($ErrFeeAmount)? $ErrFeeAmount : "";?></span>       
                                            </div>
                                            <div class="col-sm-6" style="padding-right:0px;">
                                                <label for="name">Service Charge<span style="color:red">*</span></label>
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="ServiceCharge" name="ServiceCharge" placeholder="Enter Service Charge" value="<?php echo (isset($_POST['ServiceCharge']) ? $_POST['ServiceCharge'] :"");?>">
                                                </div>
                                                <div class="col-sm-12" style="padding: 0px;">
                                                    <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="AllowtochargeChangeStaff" name="AllowtochargeChangeStaff" <?php echo ($_POST['AllowtochargeChangeStaff']==1) ? ' checked="checked" ' :'';?>>
                                                        <label class="custom-control-label" for="AllowtochargeChangeStaff" style="font-weight: normal;margin-bottom:0px">Allow to change staff</label>
                                                    </div>
                                                </div>
                                                <span class="errorstring" id="ErrServiceCharge"><?php echo isset($ErrServiceCharge)? $ErrServiceCharge : "";?></span>    
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Description</label>
                                            <textarea class="form-control" id="Description" name="Description" placeholder="Enter Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?></textarea>
                                            <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                        </div>
										<div class="form-group">
											<div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
										</div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Service</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Service</button>
                                                <a href="dashboard.php?action=Services/list&status=All" class="btn btn-warning btn-border">Back</a>
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
        $('#ErrServiceCode').html("");
        $('#ErrServiceName').html("");
        $('#ErrFeeAmount').html("");
        $('#ErrServiceCharge').html("");
        
        if(IsNonEmpty("ServiceCode","ErrServiceCode","Please Enter Service Code")){
            IsAlphaNumeric("ServiceCode","ErrServiceCode","Please Enter Alpha Numeric Characters Only");
        }
        if(IsNonEmpty("ServiceName","ErrServiceName","Please Enter Service Name")){
            IsAlphaNumeric("ServiceName","ErrServiceName","Please Enter Alpha Numeric Characters Only");
        }
		/*if(IsNonEmpty("FeeAmount","ErrFeeAmount","Please Enter Fee Amount")){   */
           IsNumeric("FeeAmount","ErrFeeAmount","Please Enter Numerics Character Only");
       /* }  */
		if(IsNonEmpty("ServiceCharge","ErrServiceCharge","Please Enter Service Charge")){
           IsNumeric("ServiceCharge","ErrServiceCharge","Please Enter Numerics Character Only");
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
                                +'Are you sure want to add service?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddService()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{ 
            return false;
        }
        }
function AddService() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

