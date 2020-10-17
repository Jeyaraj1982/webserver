<?php
 { 
  $sql= $mysql->select("select * from `_tbl_franchisee` where  `userid`='".$_SESSION['FRANCHISEE']['userid']."'");
if (isset($_POST['BtnSubmit'])) {
            $Error=0;
          if (!(strlen(trim($_POST['Name']))>0)) {
                $ErrName ="Please Enter Your Name";
                $Error++;
             }
             
            
             if (!(strlen(trim($_POST['EmailID']))>0)) {
                $ErrEmailID = "Please Enter Your Email";
                $Error++;
             } 
             
             $dataE = $mysql->select("select * from `_tbl_franchisee` where  `EmailID`='".$_POST['EmailID']."' and `userid`<>'".$sql[0]['userid']."'");
             if (sizeof($dataE)>0) {
                 $ErrEmailID = "EmailID Already Exists";
                 $Error++;
             }
             if($Error==0){
                 $mysql->execute("update `_tbl_franchisee` set `FranchiseeName`='".$_POST['Name']."',
                                                            `EmailID`='".$_POST['EmailID']."'
                                                             where `AdminID`='".$sql[0]['AdminID']."'");
                  $successmessage ="Updated successfully";   
                
             } 
       }
      ?>
<script>
$(document).ready(function () {
    $("#PinCode").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#ErrPinCode").html("Digits Only").fadeIn().fadeIn("fast");
            return false;
        }
    });
   $("#Name").blur(function () {
        if(IsNonEmpty("Name","ErrName","Please Enter Name")){
          IsAlphabet("Name","ErrName","Please Enter Alphabet Characters Only");
        }
   });
  
   $("#EmailID").blur(function () {
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
          IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
       }
   });
    
});
function SubmitProfile() { 
     ErrorCount=0;                                                                                                               
     $('#ErrName').html("");            
     $('#ErrEmailID').html("");
     $('#ErrAddressLine1').html("");
     $('#ErrPinCode').html("");
     $('#ErrCityName').html("");
     if(IsNonEmpty("Name","ErrName","Please Enter Name")){
      IsAlphabet("Name","ErrName","Please enter Alphabet Characters Only");
     }
     
     if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
        IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
     }
   return (ErrorCount==0) ? true : false;
}                   
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Profile</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Profile</div>
                        </div>
                        <form method="POST" action="" onsubmit="return SubmitProfile();">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] : $sql[0]['FranchiseeName']);?>">
                                        <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="PanCard" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter Email ID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] : $sql[0]['EmailID']);?>">
                                        <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning" name="BtnSubmit">Update</button>
                                        <a href="dashboard.php?action=MyProfile.php" class="btn btn-danger">Cancel</a>
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>
<?php } ?>