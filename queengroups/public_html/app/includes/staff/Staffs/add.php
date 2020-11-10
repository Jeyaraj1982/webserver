<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupLoginName = $mysql->select("select * from _queen_staffs where LoginName='".$_POST['LoginName']."'");
            if(sizeof($dupLoginName)>0){
                $ErrLoginName ="Login Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _queen_staffs")) + 1;
                   $StaffCode ="STF0000".$random;
               
              $id = $mysql->insert("_queen_staffs",array("StaffCode"          => $StaffCode,
                                                         "StaffName"          => $_POST['StaffName'],
                                                         "SurName"            => $_POST['SurName'],
                                                         "LoginName"          => $_POST['LoginName'],
                                                         "LoginPassword"      => $_POST['LoginPassword'],
                                                         "CreatedOn"          => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){ 
                unset($_POST);
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Staff Created Successfully", { 
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=Staffs/list&status=All'
                        });
                    });
                    </script>
       <?php     }
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error Create Staff", "warning")
             });
            </script>
           <?php   }
    }
   
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
                                            <input type="text" class="form-control" id="StaffName" name="StaffName" placeholder="Enter Staff Name" value="<?php echo (isset($_POST['StaffName']) ? $_POST['StaffName'] :"");?>">
                                            <span class="errorstring" id="ErrStaffName"><?php echo isset($ErrStaffName)? $ErrStaffName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Sur Name</label>
                                            <input type="text" class="form-control" id="SurName" name="SurName" placeholder="Enter Sur Name" value="<?php echo (isset($_POST['SurName']) ? $_POST['SurName'] :"");?>">
                                            <span class="errorstring" id="ErrSurName"><?php echo isset($ErrSurName)? $ErrSurName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Login Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="LoginName" name="LoginName" placeholder="Enter Login Name" value="<?php echo (isset($_POST['LoginName']) ? $_POST['LoginName'] :"");?>">
                                            <span class="errorstring" id="ErrLoginName"><?php echo isset($ErrLoginName)? $ErrLoginName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Login Password<span style="color:red">*</span></label>
                                            <input type="password" class="form-control" id="LoginPassword" name="LoginPassword" placeholder="Enter Login Password" value="<?php echo (isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] :"");?>">
                                            <span class="errorstring" id="ErrLoginPassword"><?php echo isset($ErrLoginPassword)? $ErrLoginPassword : "";?></span>
                                        </div> 
                                        <div class="form-group">
											<div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
										</div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Staff</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Staff</button>
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
                                +'Are you sure want to create staff?<br>'
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

