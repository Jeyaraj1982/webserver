<?php 
 $sql=$mysql->select("select * from _tbl_settings_mobilesms where ApiCode='".$_GET['Code']."'");
if (isset($_POST['BtnSubmit'])) {
            $Error=0;
             if (!(strlen(trim($_POST['ApiName']))>0)) {
                $ErrApiName ="Please Enter Api Name";
                $Error++;
             }
             if (!(strlen(trim($_POST['ApiUrl']))>0)) {
                $ErrApiUrl ="Please Enter Api Url";
                $Error++;
             }
             
             if (!(strlen(trim($_POST['MobileNumber']))>0)) {
                $ErrMobileNumber = "Please Enter Mobile Number";                                      
                $Error++;
             }
             
             $dataA = $mysql->select("select * from `_tbl_settings_mobilesms` where `MobileNumber`='".$_POST['MobileNumber']."' and ApiCode<>'".$_GET['Code']."'");
             if (sizeof($dataA)>0) {
                 $ErrMobileNumber = "Mobile Number Already Exists";
                 $Error++;
             }  
             $dataA = $mysql->select("select * from `_tbl_settings_mobilesms` where `ApiUrl`='".$_POST['ApiUrl']."' and ApiCode<>'".$_GET['Code']."'");
             if (sizeof($dataA)>0) {
                 $ErrApiUrl = "Api Url Already Exists";
                 $Error++;
             }
             $dataA = $mysql->select("select * from `_tbl_settings_mobilesms` where `ApiName`='".$_POST['ApiName']."' and ApiCode<>'".$_GET['Code']."'");
             if (sizeof($dataA)>0) {
                 $ErrApiName = "ApiName Already Exists";
                 $Error++;
             }
             if($Error==0){
                 $id = $mysql->execute("update `_tbl_settings_mobilesms` set `ApiName`        ='".$_POST['ApiName']."', 
                                                                             `ApiUrl`         ='".$_POST['ApiUrl']."', 
                                                                             `MobileNumber`   ='".$_POST['MobileNumber']."', 
                                                                             `MessageText`    ='".$_POST['MessageText']."', 
                                                                             `Method`         ='".$_POST['Method']."', 
                                                                             `TimedOut`       ='".$_POST['TimeOut']."', 
                                                                             `Remarks`        ='".$_POST['Remarks']."', 
                                                                             `IsActive`        ='".$_POST['IsActive']."' where `ApiCode`='".$_GET['Code']."'"); 
                      if(sizeof($id)>0){
                            $Successmessage = "Updated successfully";
                      }
                    }                                                                                                                     
             }
             
      ?>
<script>
$(document).ready(function () {
    $("#MobileNumber").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#ErrMobileNumber").html("Digits Only").fadeIn().fadeIn("fast");
            return false;
        }
    });
   $("#ApiName").blur(function () {
        if(IsNonEmpty("ApiName","ErrApiName","Please Enter Api Name")){
          IsAlphabet("ApiName","ErrApiName","Please Enter Alphabet Characters Only");                        
        }
   }); 
   $("#ApiUrl").blur(function () {
        IsNonEmpty("ApiUrl","ErrApiUrl","Please Enter Api Url");
   });
   $("#MobileNumber").blur(function () {
       if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
          IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid mobile number");
       }
   });
   $("#MessageText").blur(function () {
        IsNonEmpty("MessageText","ErrMessageText","Please Enter Message Text");
   });
});
function SubmitProfile() { 
     ErrorCount=0;                                                                                                               
     $('#ErrApiName').html("");            
     $('#ErrApiUrl').html("");            
     $('#ErrMobileNumber').html("");
     $('#ErrMessageText').html("");  
     
     if(IsNonEmpty("ApiName","ErrApiName","Please Enter Api Name")){
      IsAlphabet("ApiName","ErrApiName","Please enter Alphabet Characters Only");
     }
     
     IsNonEmpty("ApiUrl","ErrApiUrl","Please Enter Api Url");
     
     if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){                                    
        IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid Mobile Number");
     }
     
     IsNonEmpty("MessageText","ErrMessageText","Please Enter Message Text");
   
     return (ErrorCount==0) ? true : false;     
}                   
</script>

        <!-- Sidebar -->
<style>
label{
    font-weight: normal;
}
</style>              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title"></h4>
                    </div>
                    <form method="POST" action="" id="frms" enctype="multipart/form-data" onsubmit="return SubmitProfile();">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Mobile SMS Api</div>
                                </div>
                                <div class="card-body"> 
                                        <div class="form-group form-show-validation row">
                                            <label for="ApiName" class="col-sm-3" style="font-weight:normal">Api Code</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $sql[0]['ApiCode'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="ApiName" class="col-sm-3" style="font-weight:normal">Api Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="ApiName" name="ApiName" value="<?php echo (isset($_POST['ApiName']) ? $_POST['ApiName'] :$sql[0]['ApiName']);?>"Placeholder="Api Name">
                                                <span class="errorstring" id="ErrApiName"><?php echo isset($ErrApiName)? $ErrApiName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="ApiUrl" class="col-sm-3" style="font-weight:normal">Api Url <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="ApiUrl" name="ApiUrl" value="<?php echo (isset($_POST['ApiUrl']) ? $_POST['ApiUrl'] :$sql[0]['ApiUrl']);?>"Placeholder="Api Url">
                                                <span class="errorstring" id="ErrApiUrl"><?php echo isset($ErrApiUrl)? $ErrApiUrl : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">                                                                  
                                            <label for="MobileNumber" class="col-sm-3 text-left" style="font-weight:normal">Mobile Number <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="MobileNumber" maxlength="10" name="MobileNumber" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :$sql[0]['MobileNumber']);?>" Placeholder="Mobile Number">
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MessageText" class="col-sm-3 text-left" style="font-weight:normal">Message Text <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="MessageText" name="MessageText" value="<?php echo (isset($_POST['MessageText']) ? $_POST['MessageText'] :$sql[0]['MessageText']);?>" Placeholder="Message Text">
                                                <span class="errorstring" id="ErrMessageText"><?php echo isset($ErrMessageText)? $ErrMessageText : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Method" class="col-sm-3 text-left" style="font-weight:normal">Method</label>
                                            <div class="col-sm-5 text-left">
                                                <select id="Method" name="Method" class="form-control">                             
                                                    <option value="GET" <?php echo (isset($_POST[ 'Method'])) ? (($_POST[ 'Method']=="GET") ? " selected='selected' " : "") : (($sql[0][ 'Method']=="GET") ? " selected='selected' " : "");?>>GET</option>
                                                    <option value="POST" <?php echo (isset($_POST[ 'Method'])) ? (($_POST[ 'Method']=="POST") ? " selected='selected' " : "") : (($sql[0][ 'Method']=="POST") ? " selected='selected' " : "");?>>POST</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="TimeOut" class="col-sm-3 text-left" style="font-weight:normal">Time Out</label>
                                            <div class="col-sm-5 text-left">
                                                <select id="TimeOut" name="TimeOut" class="form-control">                             
                                                    <option value="10" <?php echo (isset($_POST[ 'TimeOut'])) ? (($_POST[ 'TimeOut']=="10") ? " selected='selected' " : "") : (($sql[0][ 'TimedOut']=="10") ? " selected='selected' " : "");?>>10 Sec</option>
                                                    <option value="20" <?php echo (isset($_POST[ 'TimeOut'])) ? (($_POST[ 'TimeOut']=="20") ? " selected='selected' " : "") : (($sql[0][ 'TimedOut']=="20") ? " selected='selected' " : "");?>>20 Sec</option>
                                                    <option value="20" <?php echo (isset($_POST[ 'TimeOut'])) ? (($_POST[ 'TimeOut']=="20") ? " selected='selected' " : "") : (($sql[0][ 'TimedOut']=="20") ? " selected='selected' " : "");?>>20 Sec</option>
                                                    <option value="60" <?php echo (isset($_POST[ 'TimeOut'])) ? (($_POST[ 'TimeOut']=="60") ? " selected='selected' " : "") : (($sql[0][ 'TimedOut']=="60") ? " selected='selected' " : "");?>>60 Sec</option>
                                                    <option value="180" <?php echo (isset($_POST[ 'TimeOut'])) ? (($_POST[ 'TimeOut']=="180") ? " selected='selected' " : "") : (($sql[0][ 'TimedOut']=="180") ? " selected='selected' " : "");?>>180 Sec</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Remarks" class="col-sm-3 text-left" style="font-weight:normal">Remarks</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" id="Remarks" name="Remarks" placeholder="Remarks"><?php echo (isset($_POST['Remarks']) ? $_POST['Remarks'] :$sql[0]['Remarks']);?></textarea>
                                                <span class="errorstring" id="ErrRemarks"><?php echo isset($ErrRemarks)? $ErrRemarks : "";?></span>
                                            </div>                                                                                                       
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">IsActive <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="IsActive" name="IsActive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($sql[0][ 'IsActive']=="1") ? " selected='selected' " : "");?>>Active</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($sql[0][ 'IsActive']=="0") ? " selected='selected' " : "");?>>Deactive</option>
                                                </select>
                                                <span class="errorstring" id="ErrIsActive"><?php echo isset($ErrIsActive)? $ErrIsActive : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $Successmessage;?> </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                      </div>
                     <div class="row">
                        <div class="col-md-12"> 
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                            <a href="dashboard.php?action=SMS/ManageMobileSMS&Status=All" class="btn btn-outline-warning">Cancel</a>
                                            <button type="submit" class="btn btn-warning" name="BtnSubmit" id="BtnSubmit">Update</button>
                                            </div>                                        
                                        </div>                                                                             
                                    </div>
                               
                            </div>                                                                                             
                        </div>
                        
                         </form>
                    </div>
                </div>
            </div>
