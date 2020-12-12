<?php
    if (isset($_POST['submitpassword'])) {
        
        $error=0;
        $getpassword =$mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
        
        if (!(($_POST['CNPassword']==$_POST['CCNPassword']))) {
            $error++;
            $errormsg = "New and Confirm Password does not match";  
        }
        
        if (strlen(trim($_POST['CNPassword']))<8) {
            $error++;
            $errormsg = "New Password must be 8 characters";  
        }
        
        if ($error==0) {
           $mysql->execute("update `_tbl_Members` set `MemberTxnPassword`='".$_POST['CNPassword']."' where MemberID='".$_SESSION['User']['MemberID']."'");  
            
            unset($_POST);
            ?>
            <script>
              $(document).ready(function() {
            
                    swal("Transaction Password Saved sucessfully!", {
                        icon : "success" 
                    });
                 });
            </script>
            <?php
        }  else {
             ?>
             <script>
              $(document).ready(function() {
            
                    swal("<?php echo $errormsg;?>", {
                        icon : "error" 
                    });
                 });
            </script>
             <?php
        }  
}                                   
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/SaveTxnPassword">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/SaveTxnPassword">Create Transaction Password</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Transaction Password</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row"> 
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="email2">New Transaction Password</label>
                                    <div class="input-group">
                                        <input class="form-control" id="CNPassword" name="CNPassword"  value="<?php echo isset($_POST['CNPassword']) ? $_POST['CNPassword'] : "";?>" placeholder="New Transaction Password" type="password">
                                        <div class="input-group-append">
                                            <span onclick="showHidePwd('CNPassword',$(this))" class="input-group-text" id="basic-addon1"><i class="icon-eye"></i> </span>
                                        </div>                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirm New Transaction Password</label>
                                    <div class="input-group">
                                        <input class="form-control" id="CCNPassword" name="CCNPassword" value="<?php echo isset($_POST['CCNPassword']) ? $_POST['CCNPassword'] : "";?>"  placeholder="Confirm New Transaction Password" type="password">
                                        <div class="input-group-append">
                                            <span onclick="showHidePwd('CCNPassword',$(this))" class="input-group-text" id="basic-addon1"><i class="icon-eye"></i> </span>
                                        </div>                                    
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <input class="btn btn-primary" id="password"  value="Save Transaction Password"  name="submitpassword" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <script>
  function showHidePwd(pwd,btn) {
  var x = document.getElementById(pwd);
  if (x.type === "password") {
    x.type = "text";
    btn.html('<i class="icon-eye"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="icon-eye"></i>');
  }
}
</script>