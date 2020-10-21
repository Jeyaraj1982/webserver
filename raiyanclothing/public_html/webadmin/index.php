<?php
    session_start();
?>
<style>
    div,table,li,ul,td,a,span {font-size:13px;font-family:'Trebuchet MS'}
    body{margin:0px } 
    .hlink {color:#fff;font-weight:bold;text-decoration: none;}
    .hlink:hover{text-decoration: underline;}
    input[type="password"],input[type="text"],select,textarea {background:#fff;border:1px solid #FF8E9F;padding:5px;font-size:13px;font-family:'Trebuchet MS';color:#666}
    .submitBtn{cursor:pointer;border:none;background:#F32847;color:#fff;font-size:13px;font-family:'Trebuchet MS';font-weight:bold;padding:5px 10px}
    .submitBtn:hover{background:#EA5268}
    h2{background:#F32847;padding:10px;color:#fff;font-size:15px;margin:0px;margin-bottom:10px;}
    .delete {text-decoration:none;color:#444}
    .deletedisable{color:#ccc}
    .delete:hover{text-decoration: underline;color:#222}
    .listhref {text-decoration: none;color:#F32847}
    .listhref:hover {text-decoration:none;}
</style>
<?php
    function successMessage($message) {
        return "<div style='margin: 5px; padding: 6px 14px; background: rgb(232, 255, 232) none repeat scroll 0px 0px; border: 1px solid rgb(144, 238, 144); color: rgb(71, 198, 71);font-weight:bold'>".$message."</div>";
    }
    
     function errorMessage($message) {
        return "<div style='margin: 5px; padding: 6px 14px; background:#FFE5E5 none repeat scroll 0px 0px; border: 1px solid #F7605D; color:#F7605D;font-weight:bold'>".$message."</div>";
    }
?>
<title>Raiyan Clothing</title>
<?php
    include_once("../config.php");
?>
<table style="width:100%;height:100%;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="width:180px;background:#F32847;vertical-align: top;;padding:5px;">
        <div style="background:#fff;padding:10px"><img src="../images/logo.png" style="width:160px"></div>
        </td>
        <td style="vertical-align: top;">
        <h2>Administrator Login</h2>

        <div style="margin:20px;">
        <?php
            if (isset($_POST['login'])) {
                if ($_POST['username']=="raiyanadmin" && $_POST['password']=="myoldbusiness") {
                    $_SESSION['islogged']=true;
                    echo "<script>location.href='dashboard.php';</script>";
                } else {
                    $msg = "Invalid Login Details";
                }
            }
        ?>
        <form action="" method="post">
            <table cellpadding="4" cellspacing="0">
                <tr>
                    <td><input type="text" name="username" placeholder="User Name" style="width:200px"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password" style="width:200px"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="login" class="submitBtn" name="login" style="padding:3px 20px">
                    <?php
                        if (isset($msg)) {
                            echo "&nbsp;&nbsp;<span style='color:red'>".$msg."</span>";
                        }
                    ?>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </td>
    
    </tr>

</table>