<?php 
$data = $mysql->select("select * from _jusertable where userid='".$_GET['d']."'");
 $obj = new CommonController();
     
    if (isset($_POST['save'])) {
        
        $Error=0;
        $dupEmail = $mysql->select("select * from _jusertable where email='".$_POST['email']."' and isstaff='1' and userid<>'".$data[0]['userid']."'");
        if(sizeof($dupEmail)>0){
           $Erremail="Email ID Already Exists" ;
           $Error++;
        }
        $dupMobile = $mysql->select("select * from _jusertable where mobile='".$_POST['mobile']."' and isstaff='1' and userid<>'".$data[0]['userid']."'");
        if(sizeof($dupMobile)>0){
           $Errmobile="Mobile Number Already Exists" ;
           $Error++;
        }
        if($Error==0){
            $mysql->execute("update `_jusertable` set `personname`  ='".$_POST['personname']."',
                                                      `email`       ='".$_POST['email']."',
                                                      `mobile`      ='".$_POST['mobile']."',
                                                      `pwd`         ='".$_POST['pwd']."' where `userid`='".$data[0]['userid']."'"); 
            
            $msg = $obj->printSuccess("Staff Updated successfully");
        }  else {
                  $msg = $obj->printError("Error Uapdate Staff");
        }  
    }
    $data = $mysql->select("select * from _jusertable where userid='".$_GET['d']."'");
?>
<script>
$(document).ready(function () {
    $("#personname").blur(function () {
        IsNonEmpty("personname","Errpersonname","Please Enter Name");
    });
    $("#email").blur(function () {
        if(IsNonEmpty("email","Erremail","Please Enter Email ID")){
           IsEmail("email","Erremail","Please Enter Valid Email ID");
        }
    });
    $("#mobile").blur(function () {
        if(IsNonEmpty("mobile","Errmobile","Please Enter Mobile Number")){
           IsMobileNumber("mobile","Errmobile","Please Enter Valid Mobile Number");
        }
    });
    $("#pwd").blur(function () {
        IsNonEmpty("pwd","Errpwd","Please Enter Password");
    });
});
function submitstaff() {
        ErrorCount=0;    
        $('#Errpersonname').html("");
        $('#Erremail').html("");
        $('#ErrCurrentPassword').html("");
        
        IsNonEmpty("personname","Errpersonname","Please Enter Name");
        if(IsNonEmpty("email","Erremail","Please Enter Email ID")){
           IsEmail("email","Erremail","Please Enter Valid Email ID");
        }
        if(IsNonEmpty("mobile","Errmobile","Please Enter Mobile Number")){
           IsMobileNumber("mobile","Errmobile","Please Enter Valid Mobile Number");
        }                                                      
        IsNonEmpty("pwd","Errpwd","Please Enter Password");   
                
                return (ErrorCount==0) ? true : false;
         }
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                               Edit Staff
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" onsubmit="return submitstaff();">
                            <div class="card-body">
                                <?php echo isset($msg)? $msg : "";?>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-2 text-left">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="personname" id="personname" placeholder="Enter Name" style="width:100%;" value="<?php echo isset($_POST['personname']) ? $_POST['personname'] : $data[0]['personname']; ?>" autocomplete="off" class="form-control">
                                        <span class="errorstring" id="Errpersonname"><?php echo isset($Errpersonname)? $Errpersonname : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-2 text-left">Email ID</label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" id="email" style="width:100%;" placeholder="Enter Email ID" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $data[0]['email']; ?>" autocomplete="off" class="form-control">
                                        <span class="errorstring" id="Erremail"><?php echo isset($Erremail)? $Erremail : "";?></span>    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-2 text-left">Mobile No.</label>
                                    <div class="col-md-9">
                                        <input type="text" name="mobile" id="mobile" style="width:100%;" maxlength="10" Placeholder="Enter Mobile Number" value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : $data[0]['mobile']; ?>" autocomplete="off" class="form-control">
                                        <span class="errorstring" id="Errmobile"><?php echo isset($Errmobile)? $Errmobile : "";?></span>       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Title" class="col-md-2 text-left">Password</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="password" name="pwd" id="pwd" placeholder="Enter Password" value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : $data[0]['pwd'];?>" class="form-control" autocomplete="off">
                                            <span class="input-group-btn">
                                                <button  onclick="showHidePwd('pwd',$(this))" class="btn btn-default reveal" type="button" style="background: #e9ecef;border-radius: 0px;"><i class="icon-eye"></i></button>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="Errpwd"><?php echo isset($Errpwd)? $Errpwd : "";?></span>       
                                    </div>
                                </div>
                               <div class="form-group row">
                                    <div class="col-md-12" style="text-align: center;color:red"><?php echo $error;?></div>
                               </div>     
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">                                                                                                       
                                        <button type="submit" class="btn btn-success" name="save">Update</button>
                                        <button type="button" class="btn btn-warning" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=staff/list'">Cancel</button>
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
<script>$('#success').hide(3000);</script>  