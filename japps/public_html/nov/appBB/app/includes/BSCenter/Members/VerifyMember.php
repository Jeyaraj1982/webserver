<script>
$(document).ready(function(){
        $("#MemberCode").blur(function() {
            $('#ErrMemberCode').html("");   
            var MemberCode = $('#MemberCode').val().trim();
            if (MemberCode.length==0) {
                $('#ErrMemberCode').html("Please Enter Member Code"); 
            }
        });
});
function checkValidation(){
    $('#ErrMemberCode').html(""); 
     ErrorCount=0;    
    var MemberCode = $('#MemberCode').val().trim();
    if (MemberCode.length==0) {
        ErrorCount++;
        $('#ErrMemberCode').html("Please Enter Member Code"); 
    }
    if(ErrorCount==0) {
         $("#submitBtn" ).trigger( "click" );
        return true;
    }else{
            return false;
        }
    
}
</script>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/VerifyMember">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/VerifyMember">Verify Member</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Verify Member</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Member Code<span style="color:red">*</span></label>
                                        <input name="MemberCode" id="MemberCode" placeholder="MemberCode" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter member code" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrMemberCode"></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6"> 
                                     <button type="button" onclick="location.href='dashboard.php?'"  class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
                                     <button type="submit" name="submitBtn" id="submitBtn" style="display:none"class="btn btn-primary waves-effect waves-light">Verify</button>
                                     <button type="button" onclick="checkValidation()" class="btn btn-primary waves-effect waves-light">Verify</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_POST['submitBtn'])){
        $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_POST['MemberCode']."'");
        $Bdata = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$data[0]['MemberID']."'");
        $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$data[0]['CurrentPackageID']."'");
        
        if(sizeof($data)>0){
            $IsValid ="1";
        }else {
            $IsValid ="0";
        } 
        
        $id = $mysql->insert("_tbl_member_verify_log",array("VerifyByID"     => $_SESSION['User']['SupportingCenterAdminID'],
                                                            "TypedMemberID"  => $_POST['MemberCode'],
                                                            "IsValid"        => $IsValid,
                                                            "VerifiedOn"     => date("Y-m-d H:i:s")));
                                                            
        if(sizeof($data)>0){
      ?>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Member Information</div>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">     
                                    <?php  if (strlen($data[0]['Thumb'])>5) { ?>
                                        <img src="assets/uploads/<?php echo $data[0]['Thumb'];?>" style="height:200px;"><br>
                                    <?php } else { ?>
                                       not attached 
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group form-show-validation row">
                                <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Code</label>
                                <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                    <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                </div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Name</label>
                                <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                    <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberName'];?></small>
                                </div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile Number</label>
                                <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                    <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MobileNumber'];?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <?php } else { ?>
     <div class="row">                                                                                        
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12"  style="text-align:center">
                            <div class="form-group form-show-validation row">
                                <div class="col-lg-12 col-md-12 col-sm-12  mt-sm-12 ">
                                    <small id="emailHelp" class="form-text text-muted">No Members Found</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
  <?php  }  }?>
    </form>
  </div>  