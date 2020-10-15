<?php
    include_once("../config.php");
    if (isset($_POST['loginBtn'])) {
        if ($_POST['username']=="admin" && $_POST['password']=="kejupwd") {
            $_SESSION['admin']=1;
            echo "<script>location.href='dashboard.php';</script>";
        } else {
            $error="Invalid login details";
        }
    }
?>
<br><Br>
<div style="width:300px;margin:0px auto;line-height:26px;font-family:arial">
<form action="" method="post">
User Name<br>
<input type="text" name="username" style="border:1px solid #ccc;width:100%;padding:5px;"><br>
Password<br>
<input type="password" name="password"  style="border:1px solid #ccc;width:100%;padding:5px;"><br><br>
<input type="submit" value="login" name="loginBtn" style="padding:5px 30px;">
<?php if (isset($error)) {?>
<span style="color:red"><br><?php echo $error;?></span>
<?php } ?>
</form>
</div>