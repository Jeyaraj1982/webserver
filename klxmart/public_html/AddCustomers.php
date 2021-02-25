<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
            
         $ErrorCount = 0;   
         $dupMobile = $mysql->select("select * from _tbl_customer where MobileNumber='".$_POST['MobileNumber']."'");
         if(sizeof($dupMobile)>0){
            $ErrorCount++;
            $ErrMobileNumber = "This Mobile Number already in use";
         }
            
           if ($ErrorCount==0)  {
               $random = sizeof($mysql->select("select * from _tbl_customer")) + 1;
               $UserCode ="CSTMR0000".$random;
               $id=$mysql->insert("_tbl_customer",array("CustomerCode"=>$UserCode,"CustomerName"=>$_POST['CustomerName'],"MobileNumber"=>$_POST['MobileNumber'],"Password"=>$_POST['Password'],"CreatedOn"=>date("Y-m-d H:i:s"),"CreatedBy"=>$_SESSION['User']['CustomerID'],"ManualCreate"=>"1"));
               if($id>0){
                   $mysql->execute("update _tbl_customer set Referral='".getCode($id)."' where CustomerID='".$id."'");
                   unset($_POST);
               }
           }
        }
      ?> 
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="ChangePassword.php">Change Password</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="well">
						<h2 class="heading" id="hed">Create Customer</h2>
                        <?php if (isset($ErrorCount) && $ErrorCount==0) {?>
                            <div class="form-group row">
                                <div class="alert alert-success alert-dismissible">
                                    Customer Created Successfully<button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            </div>
                        <?php } ?>
						<form action="" method="post" enctype="multipart/form-data" onsubmit="return SubmitFrm();">
							<div class="form-group" style="margin-bottom:0px">
								<label class="control-label" for="input-password">Customer Name<span class="required" style="color:red">*</span></label>
								<input type="text" id="CustomerName" name="CustomerName" value="<?php echo (isset($_POST['CustomerName']) ? $_POST['CustomerName'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrCustomerName"><?php echo isset($ErrCustomerName)? $ErrCustomerName : "";?></span><br>
							</div>
                            <div class="form-group" style="margin-bottom:0px">
                                <label class="control-label" for="input-password">Mobile Number<span class="required" style="color:red">*</span></label>
                                <input type="text" id="MobileNumber" name="MobileNumber" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" class="form-control" />
                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span><br>
                            </div>
							<div class="form-group" style="margin-bottom:0px">
								<label class="control-label" for="input-password">Password<span class="required" style="color:red">*</span></label>
								<input type="password" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span><br>
							</div>
							<div class="form-group" style="margin-bottom:0px">
								<label class="control-label" for="input-password">Confirm NewPassword<span class="required" style="color:red">*</span></label>
								<input type="password" id="confirmnewpassword" name="confirmnewpassword" value="<?php echo (isset($_POST['confirmnewpassword']) ? $_POST['confirmnewpassword'] :"");?>" class="form-control" />
								<span class="errorstring" id="Errconfirmnewpassword"><?php echo isset($Errconfirmnewpassword)? $Errconfirmnewpassword : "";?></span><br>
							</div>	
							<div class="form-group">
								<span class="errorstring" style="text-align: center"><?php echo isset($successmessage)? $successmessage : "";?></span>
							</div>
                            <a href="MyPage.php"><input type="button" value="Back" class="btn btn-outline-primary" /></a>
							<input type="submit" value="Create Customer" class="btn btn-primary"  name="btnsubmit" />
                        </form>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
    $("#CustomerName").blur(function () {
        IsNonEmpty("CustomerName","ErrCustomerName","Please Enter Customer Name");
    });
    $("#MobileNumber").blur(function () {
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please EnterMobileNumber");
    });
    
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
    });
     
    $("#confirmnewpassword").blur(function () {
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password");
    });
});
function SubmitFrm() {
        ErrorCount=0;    
        $('#ErrPassword').html("");
        $('#Errconfirmnewpassword').html("");
        $('#ErrCurrentPassword').html("");
        $('#ErrCustomerName').html("");
        $('#ErrMobileNumber').html("");
        
         IsNonEmpty("CustomerName","ErrCustomerName","Please Enter Customer Name");
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter MobileNumber");
        //IsNonEmpty("CurrentPassword","ErrCurrentPassword","Please Enter Current Password");
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password"); 
        var password = document.getElementById("Password").value;
                var confirmPassword = document.getElementById("confirmnewpassword").value;
                if (password != confirmPassword) {
                    ErrorCount++;
                    $('#Errconfirmnewpassword').html("Passwords do not match.");
                }
                return (ErrorCount==0) ? true : false;
         }
</script>