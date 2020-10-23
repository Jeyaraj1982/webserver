<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Change Password</h5>
</div> 
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
        $cuser= $mysql->select("select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
        if ($cuser[0]['MemberPassword']==$_POST['Password']) {
            
            $mysql->execute("update _tbl_member set MemberPassword='".$_POST['NPassword']."' where MemberID='".$_SESSION['User']['MemberID']."'");
            $result['status']="success";
        } else {
            $result['status']="failure";
            $result['message']="invalid current password";
        }
        echo "<script>$('#myModal').modal('hide');</script>";
        if ($result['status']=="success" || $result['status']=="requested") {
            
        ?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <br>
                </div>
                <div style="padding:20px;text-align:center;width:100%;">
                    Your new password changed.
                </div>
                <a href="dashboard.php?action=settings" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } else {?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <?php echo $result['number']; ?><br>
                    Rs. <?php echo $result['amount']; ?><br>
                </div>
                <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                    Transaction failed<br>
                    <?php echo $result['message']; ?>
                </div>
                <a href="dashboard.php?action=settings" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return checkInputs();">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Current Password</label>
                    <input type="password"  value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : "";?>" maxlength="10" name="Password" id="Password" class="form-control" placeholder="Current Password" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">New Password</label>
                    <input type="password"  value="<?php echo isset($_POST['NPassword']) ? $_POST['NPassword'] : "";?>" maxlength="10" name="NPassword" id="NPassword" class="form-control" placeholder="New Password" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Confirm New Password</label>
                    <input type="password"  value="<?php echo isset($_POST['CPassword']) ? $_POST['CPassword'] : "";?>" maxlength="10" name="CPassword" id="CPassword" class="form-control" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group">
                    <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Change Password<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
            </form>         
        </div>
    <?php } ?>
<script>
function checkInputs() {
    
    var Password = $('#Password').val();
    if (!(Password.length>=3)) {
        $('#error_msg').html("Invalid Current Password");
        return false;
    }
    
    var NPassword = $('#NPassword').val();
    if (!(NPassword.length>=6)) {
        $('#error_msg').html("New Password requires minimum 6 characters");
        return false;
    }
    
    var CPassword = $('#CPassword').val();
    if (!(CPassword.length>=6)) {
        $('#error_msg').html("Invalid Confirm New Password");
        return false;
    }
    
    if (NPassword!=CPassword) {
        $('#error_msg').html("New & Confirm Password must have same");
        return false;
    }
    return true;    
}
</script>