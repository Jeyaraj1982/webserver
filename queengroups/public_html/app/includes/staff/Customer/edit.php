<?php if($_SESSION['User']['AllowEditCustomer']==0){ ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <img src='../assets/accessdenied.png' style='width:128px'><br>
                            Not Allow to Edit Customer. Please Contact Admin<br><br>
                            <button type="button" class="btn btn-outline-success" onclick="location.href='dashboard.php?action=Customer/list&status=All'">Continue</button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<?php
    $data = $mysql->select("select * from _queen_agent where md5(AgentID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupAgentCode = $mysql->select("select * from _queen_agent where AgentCode='".$_POST['AgentCode']."' and AgentID<>'".$data[0]['AgentID']."'");
            if(sizeof($dupAgentCode)>0){
                $ErrAgentCode ="Customer Code Already Exist";
                $ErrorCount++;
            }
            $dupSurName = $mysql->select("select * from _queen_agent where SurName='".$_POST['SurName']."' and AgentID<>'".$data[0]['AgentID']."'");
            if(sizeof($dupSurName)>0){
                $ErrSurName ="Sur Name Already Exist";
                $ErrorCount++;
            }
            $dupServiceName = $mysql->select("select * from _queen_agent where MobileNumber='".$_POST['MobileNumber']."' and AgentID<>'".$data[0]['AgentID']."'");
            if(sizeof($dupServiceName)>0){
                $ErrMobileNumber ="Mobile Number Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                $id =  $mysql->execute("update _queen_agent set `AgentCode`     ='".$_POST['AgentCode']."',
                                                                `AgentName`     ='".$_POST['AgentName']."',
                                                                `SurName`         ='".$_POST['SurName']."',
                                                                `MobileNumber`  ='".$_POST['MobileNumber']."',
                                                                `Description`     ='".$_POST['Description']."',
                                                                `IsActive`         ='".$_POST['IsActive']."' where AgentID='".$data[0]['AgentID']."'");
                    
            ?>
                <script>
                    $(document).ready(function() {
                        swal("Customer Updated Successfully", { 
                            icon:"success"
                        })
                    });
                </script>
            <?php  
            } else {     ?>
                <script>
                     $(document).ready(function() {
                        swal("", "Error update customer", "warning")
                     });
                </script>
           <?php   }
    }
   $data = $mysql->select("select * from _queen_agent where md5(AgentID)='".$_GET['id']."'");
?>
<script>
$(document).ready(function () {
    $("#AgentCode").blur(function () {
        if(IsNonEmpty("AgentCode","ErrAgentCode","Please Enter Customer Code")){
           IsAlphaNumeric("AgentCode","ErrAgentCode","Please Enter Alpha Numerics Charcter Only");
        }
    });
    $("#AgentName").blur(function () {
        if(IsNonEmpty("AgentName","ErrAgentName","Please Enter Customer Name")){
           IsAlphaNumeric("AgentName","ErrAgentName","Please Enter Alpha Numerics Charcter Only");
        }
    });
    $("#SurName").blur(function () {
        if(IsNonEmpty("SurName","ErrSurName","Please Enter Sur Name")){
           IsAlphaNumeric("SurName","ErrSurName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#MobileNumber").blur(function () {
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number");
        }
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
                                    <div class="card-title">Edit Customer</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                   <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Customer Code<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="AgentCode" name="AgentCode" placeholder="Enter Agent Code" value="<?php echo (isset($_POST['AgentCode']) ? $_POST['AgentCode'] :$data[0]['AgentCode']);?>">
                                            <span class="errorstring" id="ErrAgentCode"><?php echo isset($ErrAgentCode)? $ErrAgentCode : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Customer Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="AgentName" name="AgentName" placeholder="Enter Agent Name" value="<?php echo (isset($_POST['AgentName']) ? $_POST['AgentName'] :$data[0]['AgentName']);?>">
                                            <span class="errorstring" id="ErrAgentName"><?php echo isset($ErrAgentName)? $ErrAgentName : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Sur Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="SurName" name="SurName" placeholder="Enter Sur Name" value="<?php echo (isset($_POST['SurName']) ? $_POST['SurName'] :$data[0]['SurName']);?>">
                                            <span class="errorstring" id="ErrSurName"><?php echo isset($ErrSurName)? $ErrSurName : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Mobile Number<span style="color:red">*</span></label>
                                            <div class="col-sm-12" style="padding-right: 0px;padding-left:0px">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="background:#fff;border-right:none">+91</span>
                                                    </div>
                                                    <input type="text" class="form-control onlynumeric" maxlength="10" id="MobileNumber" name="MobileNumber" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :$data[0]['MobileNumber']);?>">
                                                </div>
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Is Active</label>
                                            <select class="form-control" name="IsActive" id="IsActive">
                                                <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
                                            </select>                                                                                                       
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Description</label>
                                            <textarea class="form-control" id="Description" name="Description" placeholder="Enter Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :$data[0]['Description']);?></textarea>
                                            <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update Customer</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Update Customer</button>
                                                <a href="dashboard.php?action=Customer/list&status=All" class="btn btn-warning btn-border">Back</a>
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
        $('#ErrSurName').html("");
        $('#ErrAgentCode').html("");
        $('#ErrAgentName').html("");
        $('#ErrMobileNumber').html("");
        
        if(IsNonEmpty("AgentCode","ErrAgentCode","Please Enter Customer Code")){
           IsAlphaNumeric("AgentCode","ErrAgentCode","Please Enter Alpha Numerics Charcter Only");
        }
        if(IsNonEmpty("AgentName","ErrAgentName","Please Enter Customer Name")){
           IsAlphaNumeric("AgentName","ErrAgentName","Please Enter Alpha Numerics Charcter Only");
        }
        if(IsNonEmpty("SurName","ErrSurName","Please Enter Sur Name")){
           IsAlphaNumeric("SurName","ErrSurName","Please Enter Alpha Numerics Character"); 
        }
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number");
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
                                +'Are you sure want to update customer?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UpdateCustomer()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{ 
            return false;
        }
        }
function UpdateCustomer() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

<?php } ?>