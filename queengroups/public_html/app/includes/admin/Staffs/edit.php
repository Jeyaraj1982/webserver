<?php
	$data=$mysql->select("select * from _queen_staffs where md5(StaffID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupStaffCode = $mysql->select("select * from _queen_staffs where StaffCode='".$_POST['StaffCode']."' and StaffID<>'".$data[0]['StaffID']."'");
            if(sizeof($dupStaffCode)>0){
                $ErrStaffCode ="Staff Code Already Exist";
                $ErrorCount++;
            }
            $dupSurName = $mysql->select("select * from _queen_staffs where SurName='".$_POST['SurName']."' and StaffID<>'".$data[0]['StaffID']."'");
            if(sizeof($dupSurName)>0){
                $ErrSurName ="Sur Name Already Exist";
                $ErrorCount++;
            }
            $dupLoginName = $mysql->select("select * from _queen_staffs where LoginName='".$_POST['LoginName']."' and StaffID<>'".$data[0]['StaffID']."'");
            if(sizeof($dupLoginName)>0){
                $ErrLoginName ="Login Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
				$id = $mysql->execute("update _queen_staffs set `StaffName`  	    ='".$_POST['StaffName']."',
																`SurName`  		    ='".$_POST['SurName']."',
																`LoginName`  	    ='".$_POST['LoginName']."',
																`LoginPassword`     ='".$_POST['LoginPassword']."',
                                                                `IsActive`          ='".$_POST['IsActive']."',
                                                                `AllowAddAgent`     ='".(($_POST['AllowAddAgent']=="on") ? '1' : '0')."',
                                                                `AllowEditAgent`    ='".(($_POST['AllowEditAgent']=="on") ? '1' : '0')."',
                                                                `AllowAddCustomer`  ='".(($_POST['AllowAddCustomer']=="on") ? '1' : '0')."',
                                                                `AllowEditCustomer` ='".(($_POST['AllowEditCustomer']=="on") ? '1' : '0')."',
                                                                `AllowAddExpenseTypes`  ='".(($_POST['AllowAddExpenseTypes']=="on") ? '1' : '0')."',
 																`AllowEditExpenseTypes` ='".(($_POST['AllowEditExpenseTypes']=="on") ? '1' : '0')."',
                                                                `AllowAddService`   ='".(($_POST['AllowAddService']=="on") ? '1' : '0')."',
                                                                `AllowEditService`  ='".(($_POST['AllowEditService']=="on") ? '1' : '0')."'
 																 where StaffID='".$data[0]['StaffID']."'");
            
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Staff Updated Successfully", { 
                            icon:"success"});
                    });
                    </script>
       <?php   } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error Update Staff", "warning")
             });
            </script>
           <?php   }
    }
   $data=$mysql->select("select * from _queen_staffs where md5(StaffID)='".$_GET['id']."'");
?>
<script>
$(document).ready(function () {
    $("#StaffCode").blur(function () {
        if(IsNonEmpty("StaffCode","ErrStaffCode","Please Enter Staff Code")){
           IsAlphaNumeric("StaffCode","ErrStaffCode","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#StaffName").blur(function () {
        if(IsNonEmpty("StaffName","ErrStaffName","Please Enter Staff Name")){
           IsAlphaNumeric("StaffName","ErrStaffName","Please Enter Alpha Numerics Character"); 
        }
    });
	$("#SurName").blur(function () {
        if(IsNonEmpty("SurName","ErrSurName","Please Enter Sur Name")){
           IsAlphaNumeric("SurName","ErrSurName","Please Enter Alpha Numerics Character"); 
        }
    });
	$("#LoginName").blur(function () {
        IsNonEmpty("LoginName","ErrLoginName","Please Enter Login Name");
        
    });
	$("#LoginPassword").blur(function () {
        if(IsNonEmpty("LoginPassword","ErrLoginPassword","Please Enter Login Password")){
           IsAlphaNumeric("LoginPassword","ErrLoginPassword","Please Enter Alpha Numerics Character"); 
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
                                    <div class="card-title">Edit Staff</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitBrand();" id="addStaff" enctype="multipart/form-data">
                                   <div class="card-body">
										<div class="form-group form-show-validation row">
                                            <label for="name">Staff Code<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="StaffCode" name="StaffCode" placeholder="Enter Staff Code" value="<?php echo (isset($_POST['StaffCode']) ? $_POST['StaffCode'] :$data[0]['StaffCode']);?>">
                                            <span class="errorstring" id="ErrStaffCode"><?php echo isset($ErrStaffCode)? $ErrStaffCode : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Staff Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="StaffName" name="StaffName" placeholder="Enter Staff Name" value="<?php echo (isset($_POST['StaffName']) ? $_POST['StaffName'] :$data[0]['StaffName']);?>">
                                            <span class="errorstring" id="ErrStaffName"><?php echo isset($ErrStaffName)? $ErrStaffName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Sur Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="SurName" name="SurName" placeholder="Enter Sur Name" value="<?php echo (isset($_POST['SurName']) ? $_POST['SurName'] :$data[0]['SurName']);?>">
                                            <span class="errorstring" id="ErrSurName"><?php echo isset($ErrSurName)? $ErrSurName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Login Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="LoginName" name="LoginName" placeholder="Enter Login Name" value="<?php echo (isset($_POST['LoginName']) ? $_POST['LoginName'] :$data[0]['LoginName']);?>">
                                            <span class="errorstring" id="ErrLoginName"><?php echo isset($ErrLoginName)? $ErrLoginName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Login Password<span style="color:red">*</span></label>
                                            <div class="col-sm-12" style="padding-right:0px;padding-left:0px">
                                                <div class="input-icon">
                                                    <input type="password" class="form-control" id="LoginPassword" name="LoginPassword" placeholder="Enter Login Password" value="<?php echo (isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] :$data[0]['LoginPassword']);?>">
                                                    <span class="input-icon-addon" onclick="showHidePwd('LoginPassword',$(this))" id="pass">
                                                        <i class="fas fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="errorstring" id="ErrLoginPassword"><?php echo isset($ErrLoginPassword)? $ErrLoginPassword : "";?></span>
                                        </div> 
										<div class="form-group form-show-validation row">
											<label for="name">Is Active</label>
											<select class="form-control" name="IsActive" id="IsActive">
												<option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
												<option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
											</select>                                                                                                       
										</div>
                                        <h4 class="card-title">Permission</h4>
                                        <div class="from-group form-show-validation row">
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowAddAgent" name="AllowAddAgent" <?php echo ($data[0]['AllowAddAgent']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowAddAgent" style="font-weight: normal;">Allow to add Agent</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowEditAgent" name="AllowEditAgent" <?php echo ($data[0]['AllowEditAgent']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowEditAgent" style="font-weight: normal;">Allow to edit Agent</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowAddCustomer" name="AllowAddCustomer" <?php echo ($data[0]['AllowAddCustomer']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowAddCustomer" style="font-weight: normal;">Allow to add Customer</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowEditCustomer" name="AllowEditCustomer" <?php echo ($data[0]['AllowEditCustomer']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowEditCustomer" style="font-weight: normal;">Allow to edit Customer</label>
                                                </div>
                                            </div>
                                            <!--<div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowAddExpenses" name="AllowAddExpenses"  <?php echo ($data[0]['AllowAddExpenses']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowAddExpenses" style="font-weight: normal;">Allow to add Expenses</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowEditExpenses" name="AllowEditExpenses"  <?php echo ($data[0]['AllowEditExpenses']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowEditExpenses" style="font-weight: normal;">Allow to edit Expenses</label>
                                                </div>
                                            </div>-->
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowAddExpenseTypes" name="AllowAddExpenseTypes"  <?php echo ($data[0]['AllowAddExpenseTypes']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowAddExpenseTypes" style="font-weight: normal;">Allow to add Expense Types</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowEditExpenseTypes" name="AllowEditExpenseTypes"  <?php echo ($data[0]['AllowEditExpenseTypes']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowEditExpenseTypes" style="font-weight: normal;">Allow to edit Expense Types</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowAddService" name="AllowAddService" <?php echo ($data[0]['AllowAddService']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowAddService" style="font-weight: normal;">Allow to add Service</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="AllowEditService" name="AllowEditService" <?php echo ($data[0]['AllowEditService']==1) ? ' checked="checked" ' :'';?>>
                                                    <label class="custom-control-label" for="AllowEditService" style="font-weight: normal;">Allow to edit Service</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
											<div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
										</div>
                                        
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update Staff</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Update Staff</button>
                                                <a href="dashboard.php?action=Staffs/list&status=All" class="btn btn-warning btn-border">Back</a>
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
        $('#ErrStaffName').html("");
        $('#ErrSurName').html("");
        $('#ErrLoginName').html("");
        $('#ErrLoginPassword').html("");
        
        	if(IsNonEmpty("StaffCode","ErrStaffCode","Please Enter Staff Code")){
                IsAlphaNumeric("StaffCode","ErrStaffCode","Please Enter Alpha Numerics Character"); 
            }
            if(IsNonEmpty("StaffName","ErrStaffName","Please Enter Staff Name")){
			   IsAlphaNumeric("StaffName","ErrStaffName","Please Enter Alpha Numerics Character"); 
			}
            if(IsNonEmpty("SurName","ErrSurName","Please Enter Sur Name")){
               IsAlphaNumeric("SurName","ErrSurName","Please Enter Alpha Numerics Character"); 
            }
			IsNonEmpty("LoginName","ErrLoginName","Please Enter Login Name");
			
			if(IsNonEmpty("LoginPassword","ErrLoginPassword","Please Enter Login Password")){
			   IsAlphaNumeric("LoginPassword","ErrLoginPassword","Please Enter Alpha Numerics Character"); 
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
                                +'Are you sure want to update staff?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddStaff()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{ 
            return false;
        }
        }
function AddStaff() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

