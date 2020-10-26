<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<div class="main-panel">
    <div class="container" style="margin-top:0px !important">
        <div class="page-inner">
            <?php if (isset($_POST['submitRequest'])) { ?>
                <script>$('#myModal').modal("show");</script>
            <?php
                $cuser= $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
                if ($cuser[0]['MemberPassword']==$_POST['Password']) {
                    
                    $mysql->execute("update _tbl_Members set MemberPassword='".$_POST['NPassword']."' where MemberID='".$_SESSION['User']['MemberID']."'");
                    $result['status']="success";
                } else {
                    $result['status']="failure";
                    $result['message']="invalid current password";
                }
                echo "<script>$('#myModal').modal('hide');</script>";
                if ($result['status']=="success") {
                    
            ?>
            <div class="row">
                <div class="col-md-12" style="padding: 0px;">
                    <div class="card" style="background: none;">
                    <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                        <br>
                    </div>
                    <div style="padding:20px;text-align:center;width:100%;">
                        Your new password changed.
                    </div>
                    <a href="dashboard.php?action=settings" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
                </div>
            </div>
        <?php } else {?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: none;">
                        <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                            <br>
                        </div>
                        <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                            <?php echo $result['message']; ?>
                        </div>
                         <a href="dashboard.php?action=settings" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
                <div class="row">
                    <div class="col-md-12" style="padding:5px;">
                        <div class="card" style="background: none;">
                            <div class="card-header">
                                <div class="card-title" style="text-align: center;">Change Password</div>
                            </div>
                            <div class="card-body" style="padding: 0px;">
                            <form action="" method="post" onsubmit="return checkInputs();">
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Current Password</label>
                                        <div class="input-group">
                                            <input type="password"  value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : "";?>" maxlength="10" name="Password" id="Password" class="form-control" placeholder="Current Password" >
                                            <span class="input-group-btn">
                                                <button  onclick="showHidePwd('Password',$(this))" class="btn btn-default reveal" type="button" style="background: #fff;border-radius: 0px;"><i class="icon-eye"></i></button>
                                            </span>
                                        </div>
                                        <div class="errorstring" id="ErrPassword"> </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">New Password</label>
                                        <div class="input-group">
                                            <input type="password"  value="<?php echo isset($_POST['NPassword']) ? $_POST['NPassword'] : "";?>" maxlength="10" name="NPassword" id="NPassword" class="form-control" placeholder="New Password" >
                                            <span class="input-group-btn">
                                                <button  onclick="showHidePwd('NPassword',$(this))" class="btn btn-default reveal" type="button" style="background: #fff;border-radius: 0px;"><i class="icon-eye"></i></button>
                                            </span>
                                        </div>
                                        <div class="errorstring" id="ErrNPassword"> </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Confirm New Password</label>
                                        <div class="input-group">
                                            <input type="password"  value="<?php echo isset($_POST['CPassword']) ? $_POST['CPassword'] : "";?>" maxlength="10" name="CPassword" id="CPassword" class="form-control" placeholder="Confirm Password" >
                                            <span class="input-group-btn">
                                                <button  onclick="showHidePwd('CPassword',$(this))" class="btn btn-default reveal" type="button" style="background: #fff;border-radius: 0px;"><i class="icon-eye"></i></button>
                                            </span>
                                        </div>
                                        <div class="errorstring" id="ErrCPassword"><?php echo isset($error)? $error : "";?> </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:20px;margin-bottom:10px;">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-black" onclick="location.href='dashboard.php?action=settings';" style="background:#6c757d !important;width:100%;">Back</button>
                                    </div>
                                    <div class="col-6" style="padding-left:0px;">
                                        <button type="submit" class="btn btn-danger" name="submitRequest" style="width: 100%;">Change Password</button>
                                    </div>
                                </div>
                            </form>    
                            </div>
                        </div>  
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
<script>

$(document).ready(function () {
    $("#Password").blur(function () {
        $('#ErrPassword').html("");
        var Password = $('#Password').val();
        if (Password.length==0) {
            $('#ErrPassword').html("Please Enter Current Password");
        }else {
            if (!(Password.length>=6)) {
                $('#ErrPassword').html("Invalid Current Password");
            }
        }
    });
    $("#NPassword").blur(function () {
        $('#ErrNPassword').html("");
        var NPassword = $('#NPassword').val();
        if (NPassword.length==0) {
            $('#ErrNPassword').html("Please Enter New Password");
        }else {
            if (!(NPassword.length>=6 && NPassword.length<=20)) {
                $('#ErrNPassword').html("Invalid New Password");
            }
        }
    });
    $("#CPassword").blur(function () {
        $('#ErrCPassword').html("");
        var CPassword = $('#CPassword').val();
        if (CPassword.length==0) {
            $('#ErrCPassword').html("Please Enter Confirm New Password");
        }else {
            if (!(CPassword.length>=6 && CPassword.length<=20)) {
                $('#ErrCPassword').html("Invalid Confirm New Password");
            }
        }
    });
    $("#CPassword").blur(function () {
        var CPassword = $('#CPassword').val();
        var NPassword = $('#NPassword').val();
        $('#ErrCPassword').html("");
        if (NPassword!=CPassword) {
        $('#ErrCPassword').html("New & Confirm Password must have same");
        }
    });
});

function checkInputs() {
     $('#ErrPassword').html(""); 
     $('#ErrNPassword').html(""); 
     $('#ErrCPassword').html(""); 
      var Error=0;     
      var Password = $('#Password').val();
        if (Password.length==0) {
            $('#ErrPassword').html("Please Enter Current Password");
            return false;
        }else {
            if (!(Password.length>=6)) {
                $('#ErrPassword').html("Invalid Current Password");
               return false;
            }
        }
    
     var NPassword = $('#NPassword').val();
        if (NPassword.length==0) {
            $('#ErrNPassword').html("Please Enter New Password");
            return false;
        }else {
            if (!(NPassword.length>=6 && NPassword.length<=20)) {
                $('#ErrNPassword').html("Invalid New Password");  
                return false;
            }
        }
        var CPassword = $('#CPassword').val();
        if (CPassword.length==0) {
            $('#ErrCPassword').html("Please Enter Confirm New Password");
            return false;
        }else {
            if (!(CPassword.length>=6 && CPassword.length<=20)) {
                $('#ErrCPassword').html("Invalid Confirm New Password");
                return false;
            }
        }
   
    
    if (NPassword!=CPassword) {
        $('#ErrCPassword').html("New & Confirm Password must have same");
        return false;
    }
     return true;
}
</script>