<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupmobile = $mysql->select("select * from _tbl_franchisee where MobileNumber='".$_POST['MobileNumber']."'");
            if(sizeof($dupmobile)==0){
                $ErrMobileNumber="Franchisee Not Found in this Mobile Number";  
                $ErrorCount++;  
            }
            if($ErrorCount==0){ 
                $data = $mysql->select("select * from _tbl_franchisee where MobileNumber='".$_POST['MobileNumber']."'");
                ?>
                <script>
                    $(document).ready(function () {
                        $("#ResultDiv").show();
                        $("#FirstDiv").hide();
                    });
                </script>   
           <?php  }
    }
    if (isset($_POST['submitcredits'])) {
        $id = $mysql->insert("_tbl_franchisee_credits",array("FranchiseeID"  => $_POST['FranchiseeID'],
                                                             "Particulars"   => "Add Credits From Admin",
                                                             "Credits"       => $_POST['Credits'],
                                                             "Debits"        => "0",
                                                             "RequestOn"     => date("Y-m-d H:i:s")));
               $mysql->execute("update _tbl_franchisee_credits set Balance='".getTotalBalanceCredits($_POST['FranchiseeID'])."' where CreditsID  ='".$id."' and FranchiseeID='".$_POST['FranchiseeID']."'");
          if($id>0){ ?>
            <script>
                 $(document).ready(function () {
                     SuccessPopup();
                 });
            </script>
          <?php
    }    
    }     
?>
<script>
$(document).ready(function () {
    $("#MobileNumber").blur(function () {
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
    });
    $("#Credits").blur(function () {
        if(IsNonEmpty("Credits","ErrCredits","Please Enter Credits")){
           IsNumeric("Credits","ErrCredits","Please Enter Numeric Characters Only"); 
        }
    });
});
function SubmitFranchisee() {
        ErrorCount=0;    
        $('#ErrMobileNumber').html("");
            IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
                return (ErrorCount==0) ? true : false;
         }
function SubmitCredits() {
        ErrorCount=0;    
        $('#ErrCredits').html("");
            if(IsNonEmpty("Credits","ErrCredits","Please Enter Credits")){
           IsNumeric("Credits","ErrCredits","Please Enter Numeric Characters Only"); 
        }
                return (ErrorCount==0) ? true : false;
         }
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row" id="FirstDiv">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Credits</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitFranchisee();" id="addProduct" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number<span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">                                    
                                            <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>                                                                        
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit">Submit</button>&nbsp;
                                        <a href="dashboard.php" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                        </form>                                               
                    </div>
                </div>
            </div> 
            <div class="row" id="ResultDiv" style="display: none;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Credits</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitCredits();" id="addProduct" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['FranchiseeName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Credits<span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="Credits" name="Credits"placeholder="Enter Credits" value="<?php echo (isset($_POST['Credits']) ? $_POST['Credits'] :"");?>">                                    
                                        <input type="hidden" class="form-control" id="FranchiseeID" name="FranchiseeID" value="<?php echo $data[0]['FranchiseeID'];?>">                                    
                                        <span class="errorstring" id="ErrCredits"><?php echo isset($ErrCredits)? $ErrCredits : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>                                                                        
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-warning" type="submit" name="submitcredits" id="submitcredits">Submit</button>&nbsp;
                                        <a href="dashboard.php" class="btn btn-warning btn-border">Back</a>
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
function SuccessPopup(){
    html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>Credits Added Successfully<br></div></div>";
        html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Franchisee/AddCredits' class='btn btn-outline-success'>Continue</a></div>"; 
    
    $("#xconfrimation_text").html(html);
    $('#ConfirmationPopup').modal("show");
    
}
</script>
