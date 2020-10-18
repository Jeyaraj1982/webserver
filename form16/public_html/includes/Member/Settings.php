<?php

    $data = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_SESSION['User']['MemberCode']."'");
    if (isset($_POST['btnsubmit'])) {
        if ($data[0]['RequiredSecondAuthentication']=="1") {
            $mysql->execute("update `_tbl_Members` set `RequiredSecondAuthentication`='0' where `MemberCode`='".$_SESSION['User']['MemberCode']."'"); 
            $text = "Second Authentication Disabled";
        } else {
            $mysql->execute("update `_tbl_Members` set `RequiredSecondAuthentication`='1' where `MemberCode`='".$_SESSION['User']['MemberCode']."'"); 
            $text = "Second Authentication Enabled";
        }
    $data = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$_SESSION['User']['MemberCode']."'");
?>
<script>
$( document ).ready(function() {swal("Good job!", "<?php echo $text;?>", {icon : "success",buttons: {confirm: {className : 'btn btn-warning'}},});});
</script>
<?php } ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Settings</div>
                        </div>
                        <form method="POST" action="">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">
                                        Second Authentication for login is 
                                        <?php 
                                            if ($data[0]['RequiredSecondAuthentication']=="1") {
                                                $txt= "Disable";
                                                echo "Enabled.";
                                            } else {
                                                $txt= "Enable";
                                                echo "Disabled.";
                                            }
                                        ?>
                                    </label>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: right;">
                                            <a href="dashboard.php" class="btn btn-outline-warning">Cancel</a>
                                            <input class="btn btn-warning" type="submit" name="btnsubmit" value="<?php echo $txt;?>">
                                        </div>                                        
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