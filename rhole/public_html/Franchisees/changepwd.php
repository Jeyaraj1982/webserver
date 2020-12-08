<?php include_once("../config.php"); ?>
<link rel="stylesheet" href="https://www.klx.co.in/assets/css/bootstrap.min.css">
  <style>
 .mytd {border:1px solid #f1f1f1;padding:3px;color:#444}
 .mytd form{height:0px;}
 .mytdhead{font-weight:bold;text-align:center;color:#222;background:#ccc;padding:5px;font-size:12px;}
 .trodd{background:#fff;}
 .treven{background:#f6f6f6}
 .trodd:hover{background:#e9e9e9;cursor:pointer}
 .treven:hover{background:#e9e9e9;cursor:pointer}
</style>

 <body style="margin:0px;">
    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                        <?php
                    
    $obj = new CommonController(); 
    
    if(isset($_POST{"save"})) {
        
        if ($obj->isEmptyField($_POST['currpwd']) || $obj->isEmptyField($_POST['newpwd']) || $obj->isEmptyField($_POST['confirmpwd'])) {  
            echo $obj->printError("All Fields are Required;");
        } else {
            if ($_SESSION['USER']['Password']==trim($_POST['currpwd'])) {
                if ((trim($_POST['newpwd'])==trim($_POST['confirmpwd'])) && (strlen(trim($_POST['newpwd']))>8) ) {
                    $mysql->execute("update _tbl_franchisee set Password='".trim($_POST['newpwd'])."' where userid=".$_SESSION['USER']['userid']);
                    $_SESSION['USER']['Password']= trim($_POST['newpwd']);
                    echo $obj->printSuccess("Successfully Changed Password");
                } else {
                    echo $obj->printError("New Password & Confirm Password should be same and length greather than 8 Characters");
                }
            } else {
                echo $obj->printError("Invalid Current Password");
            }
        }   
    }     
?>
<form action="" method="post">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Enter Current Password</label>
                                    <input type="password" name="currpwd" class="form-control">
                                </div>
                            </div>   
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <label >Enter New Password</label>
                                    <input type="password" name="newpwd" class="form-control">
                                </div>
                            </div>    
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <label >Enter Confirm New Password</label>
                                    <input type="password" name="confirmpwd" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <input type="submit" name="save" class="btn btn-primary" value="Change Password" bgcolor="grey">
                                </div>
                            </div>  
</form>
                        </div>
                    </div>
                </div>
            </div>
      

</body>
