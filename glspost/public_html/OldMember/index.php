<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login Boxed - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="../css/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
.errorstring{
    color:red;
    
}
</style>
<body>
 <div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-plum-plate bg-animation">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100 mx-auto">
                        <div class="modal-content">
                        <?php include_once("../config.php"); ?>
                        <?php
                             if (isset($_SESSION['User']) && $_SESSION['User']['MemberID']>0) {
                                echo "<script>location.href='Dashboard.php';</script>";
                            } 
                            if (isset($_POST['btnLogin'])) {
                                $d=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$_POST['MemberCode']."' and `MemberPassword`='".$_POST['Password']."'");
                                if (sizeof($d)>0) {
                                      $_SESSION['User']=$d[0];
                                      echo "<script>location.href='Dashboard.php';</script>";
                                } else {
                                    $error = "Invalid username or password";
                                }
                            }
                        ?>
                        <script>
                            function submitLogin() {

                               $('#ErrMemberCode').html("");
                               $('#ErrPassword').html("");

                                ErrorCount = 0;
                                IsNonEmpty("MemberCode", "ErrMemberCode", "Please Enter Valid Member Code");
                                IsNonEmpty("Password", "ErrPassword", "Please Enter Valid Password");

                                if (ErrorCount == 0) {
                                    return true;
                                } else {
                                     return false;
                                }
                            }
                        </script>
                        <form method="post" onsubmit="return submitLogin()">
                            <div class="modal-body">
                                <div class="h5 modal-title text-center">
                                    <h4 class="mt-2"><div>Member Login</div><span>Registered Member Login here.</span>   </h4>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input type="password" class="form-control" name="MemberCode" id="MemberCode" placeholder="Member ID here..." value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : '';?>">
                                            <span class="errorstring" id="ErrMemberCode"><?php echo isset($ErrMemberCode)? $ErrMemberCode : "";?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <input type="password" class="form-control" name="Password" id="Password" placeholder="Password here..." value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '';?>">
                                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="color:red">
                                    <?php  echo $error;?>
                                </div>
                                <div class="divider"></div>
                                <h6 class="mb-0">No account? <a href="javascript:void(0);" class="text-primary">Join  now</a></h6>
                            </div>
                            <div class="modal-footer clearfix">
                                <div class="float-left"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a></div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary btn-lg" name="btnLogin">Login to Dashboard</button>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright &copy; ArchitectUI 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/scripts/main.js"></script>
     <script src="../assets/scripts/app.js"></script>
</body>

</html>