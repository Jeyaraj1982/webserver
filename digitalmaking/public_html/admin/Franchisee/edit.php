<?php
$data= $mysql->select("select * from _tbl_franchisee where FranchiseeID='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            if($ErrorCount==0){
                  $dupmobile = $mysql->select("select * from _tbl_franchisee where MobileNumber='".$_POST['MobileNumber']."' and FranchiseeID<>'".$data[0]['FranchiseeID']."'");
                    if(sizeof($dupmobile)>0){
                        $ErrMobileNumber="Mobile Number Already Exists";  
                        $ErrorCount++;  
                    } 
                   $mysql->execute("update _tbl_franchisee set `FranchiseeName`    ='".$_POST['Name']."',
                                                                `MobileNumber`  ='".$_POST['MobileNumber']."',
                                                                `Password`  ='".$_POST['Password']."',
                                                                `IsActive`  ='".$_POST['IsActive']."'
                                                                where FranchiseeID='".$data[0]['FranchiseeID']."'");
                              if(sizeof($id)>0){ ?>
                                 <script>
                                 $(document).ready(function () {
                                     SuccessPopup('<?php echo $data[0]['FranchiseeID'];?>');
                                 });
                                 </script>                                                                
                                 <?php  unset($_POST);  }
                  } else {
                        $successmessage ="Error Update Franchisee";
                  }
    }
        
  $data= $mysql->select("select * from _tbl_franchisee where FranchiseeID='".$_GET['id']."'");      
?>
<script>
$(document).ready(function () {
    $("#Name").blur(function () {
        if(IsNonEmpty("Name","ErrName","Please Enter Name")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#MobileNumber").blur(function () {
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
    });
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
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
                                    <div class="card-title">Edit Franchisee</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Your Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] : $data[0]['FranchiseeName']);?>">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :$data[0]['MobileNumber']);?>">                                    
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Password<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <div class="input-group">
                                                    <input name="Password" id="Password" placeholder="Password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : $data[0]['Password'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="password">
                                                    <div class="input-group-append">
                                                        <span onclick="showHidePwd('Password',$(this))" class="input-group-text" id="basic-addon1"><i class="icon-eye"></i> </span>
                                                    </div>                                    
                                                </div>
                                                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsActive<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsActive" id="IsActive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']== "1") ? " selected='selected' " : "") : (($data[0][ 'IsActive']== "1") ? " selected='selected' " : "");?>>Yes</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']== "0") ? " selected='selected' " : "") : (($data[0][ 'IsActive']== "0") ? " selected='selected' " : "");?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>                                                                        
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" value="Save" style="display: none;"></button>
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update</button>&nbsp;
                                                <a href="dashboard.php?action=Franchisee/List" class="btn btn-warning btn-border">Back</a>
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
        $('#ErrName').html("");
        $('#ErrMobileNumber').html("");
        $('#ErrPassword').html("");
        
            if(IsNonEmpty("Name","ErrName","Please Enter Name")){
               IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Character"); 
            }
            IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
            IsNonEmpty("Password","ErrPassword","Please Enter Password");
    if(ErrorCount==0){
        var text = '<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'                               
                                +'Are you sure want to update franchisee<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UpdateFranchisee()" >Yes, Confirm</button>'
                     +'</div>';
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
        return true;
    }else{
        return false;
    }
}
function UpdateFranchisee(){
    $('#btnsubmit').trigger("click");       
}
function SuccessPopup(FranchiseeID){
    html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>Updated Successfully<br></div></div>";
        html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Franchisee/edit&id="+FranchiseeID+"' class='btn btn-outline-success'>Continue</a></div>"; 
    
    $("#xconfrimation_text").html(html);
    $('#ConfirmationPopup').modal("show");
    
}
</script>
