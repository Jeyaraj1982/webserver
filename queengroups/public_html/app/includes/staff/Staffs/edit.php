<?php
	$data=$mysql->select("select * from _queen_staffs where md5(StaffID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupLoginName = $mysql->select("select * from _queen_staffs where LoginName='".$_POST['LoginName']."' and StaffID<>'".$data[0]['StaffID']."'");
            if(sizeof($dupLoginName)>0){
                $ErrLoginName ="Login Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
				$id = $mysql->execute("update _queen_staffs set `StaffName`  	='".$_POST['StaffName']."',
																`SurName`  		='".$_POST['SurName']."',
																`LoginName`  	='".$_POST['LoginName']."',
																`LoginPassword` ='".$_POST['LoginPassword']."',
 																`IsActive` 		='".$_POST['IsActive']."'
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
    $("#StaffName").blur(function () {
        if(IsNonEmpty("StaffName","ErrStaffName","Please Enter Staff Name")){
           IsAlphaNumeric("StaffName","ErrStaffName","Please Enter Alpha Numerics Character"); 
        }
    });
	$("#SurName").blur(function () {
		if($("#SurName").val!=""){
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
                                    <div class="card-title">Add Staff</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitBrand();" id="addStaff" enctype="multipart/form-data">
                                   <div class="card-body">
										<div class="form-group form-show-validation row">
                                            <label for="name">Staff Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="StaffName" name="StaffName" placeholder="Enter Staff Name" value="<?php echo (isset($_POST['StaffName']) ? $_POST['StaffName'] :$data[0]['StaffName']);?>">
                                            <span class="errorstring" id="ErrStaffName"><?php echo isset($ErrStaffName)? $ErrStaffName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Sur Name</label>
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
                                            <input type="password" class="form-control" id="LoginPassword" name="LoginPassword" placeholder="Enter Login Password" value="<?php echo (isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] :$data[0]['LoginPassword']);?>">
                                            <span class="errorstring" id="ErrLoginPassword"><?php echo isset($ErrLoginPassword)? $ErrLoginPassword : "";?></span>
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
        
        	if(IsNonEmpty("StaffName","ErrStaffName","Please Enter Staff Name")){
			   IsAlphaNumeric("StaffName","ErrStaffName","Please Enter Alpha Numerics Character"); 
			}
			if($("#SurName").val!=""){
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

