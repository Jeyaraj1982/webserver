<?php
include_once("header.php");               
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_sales_admin where md5(AdminID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
        
            $cstmrname = $mysql->select("select * from _tbl_sales_admin where AdminName='".$_POST['UserName']."' and AdminID<>'".$data[0]['AdminID']."'");
            if(sizeof($cstmrname)>0){
                $ErrUserName ="User Name Already Exist";
                $ErrorCount++;
            }
            $dupmob = $mysql->select("select * from _tbl_sales_admin where UserName='".$_POST['LoginName']."' and AdminID<>'".$data[0]['AdminID']."'");
            if(sizeof($dupmob)>0){
                $ErrLoginName ="Login Name Already Exist";
                $ErrorCount++;                                                                    
            }
            
            
            if($ErrorCount==0){
                                                                    
               $mysql->execute("update _tbl_sales_admin set `AdminName`      ='".$_POST['UserName']."',
                                                                `UserName`   ='".$_POST['LoginName']."',
                                                                `Password`   ='".$_POST['Password']."',
                                                                `IsActive`   ='".$_POST['IsActive']."' where AdminID='".$data[0]['AdminID']."'");
           
                $successmessage ="<span style='color:green'>Updated Successfully</span>";
      
              } else {
                $successmessage =  "<span style='color:red'>Sorry, there was an error update User.</span>";
              }
                                         
                
    }
    
?>
<script>
$(document).ready(function () {
    $("#UserName").blur(function () {
        if(IsNonEmpty("UserName","ErrUserName","Please Enter User Name")){
           IsAlphaNumeric("UserName","ErrUserName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#LoginName").blur(function () {
        IsNonEmpty("LoginName","ErrLoginName","Please Enter Login Name");
    });
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
    });
});
function SubmitUser() {
        ErrorCount=0;    
        $('#ErrUserName').html("");
        $('#ErrLoginName').html("");
        $('#ErrPassword').html("");
        
        if(IsNonEmpty("UserName","ErrUserName","Please Enter User Name")){
           IsAlphaNumeric("UserName","ErrUserName","Please Enter Alpha Numerics Character"); 
        }
        IsNonEmpty("LoginName","ErrLoginName","Please Enter Login Name");
        IsNonEmpty("Password","ErrPassword","Please Enter Password");                                                                                                           
        return (ErrorCount==0) ? true : false;
}
</script>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit User</div>
                                </div>
                                <form method="POST" action="" onsubmit="return SubmitUser();" enctype="multipart/form-data">
                                    <div class="card-body">
                                       <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">User Name <span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Enter User Name In English" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] : $data[0]['AdminName']);?>">
                                                <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Login Name <span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="LoginName" name="LoginName" placeholder="Enter Login Name" value="<?php echo (isset($_POST['LoginName']) ? $_POST['LoginName'] : $data[0]['UserName']);?>">
                                                <span class="errorstring" id="ErrLoginName"><?php echo isset($ErrLoginName)? $ErrLoginName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Password <span style="color: red;">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Password" name="Password" placeholder="Enter Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] : $data[0]['Password']);?>">
                                                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is Active</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsActive" id="IsActive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
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
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update User">&nbsp;
                                                <a href="dashboard.php?action=Users/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include_once("footer.php");?>