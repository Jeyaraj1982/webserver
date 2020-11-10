<?php if($_SESSION['User']['AllowEditService']==0){ ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <img src='../assets/accessdenied.png' style='width:128px'><br>
                            Not Allow to Edit Service. Please Contact Admin<br><br>
                            <button type="button" class="btn btn-outline-success" onclick="location.href='dashboard.php?action=Services/list&status=All'">Continue</button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<?php
	$data = $mysql->select("select * from _queen_services where md5(ServiceID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupServiceCode = $mysql->select("select * from _queen_services where ServiceCode='".$_POST['ServiceCode']."' and ServiceID<>'".$data[0]['ServiceID']."'");
            if(sizeof($dupServiceCode)>0){
                $ErrServiceCode ="Service Code Already Exist";
                $ErrorCount++;
            }
            $dupServiceName = $mysql->select("select * from _queen_services where ServiceName='".$_POST['ServiceName']."' and ServiceID<>'".$data[0]['ServiceID']."'");
            if(sizeof($dupServiceName)>0){
                $ErrServiceName ="Service Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){ 
             $id =  $mysql->execute("update _queen_services set `ServiceName` 	='".$_POST['ServiceName']."',
																`FeeAmount` 	='".$_POST['FeeAmount']."',
                                                                `ServiceCharge` ='".$_POST['ServiceCharge']."',
																`Description`   ='".str_replace("'","\\'",$_POST['Description'])."',
																`IsActive` 		='".$_POST['IsActive']."' where ServiceID='".$data[0]['ServiceID']."'");
					
            ?>
                <script>
                    $(document).ready(function() { 
                        swal("Service Updated Successfully", { 
                            icon:"success"
                        }) 
                    });
                </script>
			<?php  
			} else {     ?>
                <script>
					 $(document).ready(function() {
						swal("", "Error update service", "warning")
					 });
				</script>
            <?php   }
    }
    $data = $mysql->select("select * from _queen_services where md5(ServiceID)='".$_GET['id']."'");
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
        if(IsNonEmpty("FeeAmount","ErrFeeAmount","Please Enter Fee Amount")){
           IsNumeric("FeeAmount","ErrFeeAmount","Please Enter Numerics Character Only");
        }
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
                                    <div class="card-title">Edit Service</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                   <div class="card-body">
										<div class="form-group form-show-validation row">
                                            <label for="name">Service Code<span style="color:red">*</span></label>      
                                            <input type="text" class="form-control" id="ServiceCode" name="ServiceCode" placeholder="Enter Service Code" value="<?php echo (isset($_POST['ServiceCode']) ? $_POST['ServiceCode'] : $data[0]['ServiceCode']);?>">
                                            <span class="errorstring" id="ErrServiceCode"><?php echo isset($ErrServiceCode)? $ErrServiceCode : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Service Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ServiceName" name="ServiceName" placeholder="Enter Service Name" value="<?php echo (isset($_POST['ServiceName']) ? $_POST['ServiceName'] :$data[0]['ServiceName']);?>">
                                            <span class="errorstring" id="ErrServiceName"><?php echo isset($ErrServiceName)? $ErrServiceName : "";?></span>
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-6" style="padding-left:0px">
                                                <label for="name">Fee Amount<span style="color:red">*</span></label>
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="FeeAmount" name="FeeAmount" placeholder="Enter Fee Amount" value="<?php echo (isset($_POST['FeeAmount']) ? $_POST['FeeAmount'] :$data[0]['FeeAmount']);?>">
                                                </div>
                                                <span class="errorstring" id="ErrFeeAmount"><?php echo isset($ErrFeeAmount)? $ErrFeeAmount : "";?></span>       
                                            </div>
                                            <div class="col-sm-6" style="padding-right:0px;">
                                                <label for="name">Service Charge<span style="color:red">*</span></label>
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fas fa-rupee-sign"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="ServiceCharge" name="ServiceCharge" placeholder="Enter Service Charge" value="<?php echo (isset($_POST['ServiceCharge']) ? $_POST['ServiceCharge'] :$data[0]['ServiceCharge']);?>">
                                                </div>
                                                <span class="errorstring" id="ErrServiceCharge"><?php echo isset($ErrServiceCharge)? $ErrServiceCharge : "";?></span>    
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Description</label>
                                            <textarea class="form-control" id="Description" name="Description" placeholder="Enter Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :$data[0]['Description']);?></textarea>
                                            <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
											<label for="name">Is Active</label>
											<select class="form-control" name="IsActive" id="IsActive">
												<option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
												<option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
											</select>                                                                                                       
										</div>
										<div class="form-group">
											<div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
										</div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update Service</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Update Service</button>
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
		if(IsNonEmpty("FeeAmount","ErrFeeAmount","Please Enter Fee Amount")){
           IsNumeric("FeeAmount","ErrFeeAmount","Please Enter Numerics Character Only");
        }
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
                                +'Are you sure want to update service?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UpdateService()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{ 
            return false;
        }
        }
function UpdateService() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

<?php } ?>