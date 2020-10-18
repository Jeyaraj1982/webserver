<?php
    include_once("config.php");
?>
<title>LAPU SYSTEM [HYBRID MODULE]</title>
<style type="text/css">

.button_example{
border:1px solid #fff; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 5px 20px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
 background-color: #ff5db1; background-image: -webkit-gradient(linear, left top, left bottom, from(#ff5db1), to(#ef007c));
 background-image: -webkit-linear-gradient(top, #ff5db1, #ef007c);
 background-image: -moz-linear-gradient(top, #ff5db1, #ef007c);
 background-image: -ms-linear-gradient(top, #ff5db1, #ef007c);
 background-image: -o-linear-gradient(top, #ff5db1, #ef007c);
 background-image: linear-gradient(to bottom, #ff5db1, #ef007c);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ff5db1, endColorstr=#ef007c);
}

.button_example:hover{
 border:1px solid #fff;
 background-color: #ff2a98; background-image: -webkit-gradient(linear, left top, left bottom, from(#ff2a98), to(#bc0062));
 background-image: -webkit-linear-gradient(top, #ff2a98, #bc0062);
 background-image: -moz-linear-gradient(top, #ff2a98, #bc0062);
 background-image: -ms-linear-gradient(top, #ff2a98, #bc0062);
 background-image: -o-linear-gradient(top, #ff2a98, #bc0062);
 background-image: linear-gradient(to bottom, #ff2a98, #bc0062);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ff2a98, endColorstr=#bc0062);
}
</style>
<body style="background:#FF009D;margin:0px">
<br><BR><Br><br><BR><Br><br><BR><Br>
<?php
    if (isset($_POST['btnLogin'])) {
        
        if ($_POST['role']=="R") {
            $sql = " and isreseller=1 ";
        } else if ($_POST['role']=="A") {
            $sql = " and isadmin=1 ";
        } else {
            $sql = " and isuser=1 "; 
        }
        $user = $mysql->select("select * from _users where domainname='".$_SERVER['SERVER_NAME']."' and emailid='".$_POST['username']."' and password='".$_POST['password']."' ".$sql);
       
        if (sizeof($user)>0  ) {
            $_SESSION['USER']=$user[0];
            echo "<script>location.href='dashboard.php';</script>";
        }else{
            $msg = "Invalid Login Details";
        }
    }
?>
<form action="" method="post">
<table align="center">
    <tr>
        <td colspan="2" style="color: rgb(255, 255, 255); font-weight: bold; text-align: center; padding: 10px; font-family: 'Trebuchet MS'; font-size: 22px; background: rgb(219, 0, 131) none repeat scroll 0% 0%; border: 1px solid rgb(255, 255, 255);">HYBRID LAPU NETWORK SYSTEM</td> 
    </tr>
    <tr>                                                  
        <td colspan="2" style="padding:0px;">&nbsp;</td>
    </tr>
    <tr>
        <td rowspan="4">
            <img src="assets/images/banner.png" height="122">
        </td>
        <td><input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?>" placeholder="Email ID" style="border:1px solid #C90279;padding:3px;font-size:13px;font-family:'Trebuchet MS';color:#555;width:200px;padding-left:10px;"></td>
    </tr>
    <tr>
        <td><input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '';?>" placeholder="Password" style="border:1px solid #C90279;padding:3px;font-size:13px;font-family:'Trebuchet MS';color:#555;width:200px;padding-left:10px;"></td>
    </tr>
     <tr>
        <td><select name="role" style="border:1px solid #C90279;padding:3px;font-size:13px;font-family:'Trebuchet MS';color:#555;width:200px;padding-left:8px;">
                <option value="R" value="<?php echo ($_POST['role']=="R") ? " selected='selected' " : '';?>" >API Resellers</option>
                <option value="U" value="<?php echo ($_POST['role']=="U") ? " selected='selected' " : '';?>">API Users</option>
                
            </select>
        </td>
    </tr>
    <tr>
        <td align="right" style="padding-top:5px;"><input name="btnLogin" type="submit" value=" Login " class="button_example"></td>
    </tr>
    <?php
        if (isset($msg)) {
            ?>
            <tr>
                <td colspan="2" style="text-align:right;color:orange;font-size:13px;font-family:'Trebuchet MS';"><?php echo $msg;?></td>
            </tr>
            <?php
        }
    ?>
</table> 
<div style="padding:10px;text-align:center;color:#f1f1f1;font-family:arial;font-size:11px">Licenced To <?php echo $_SERVER['SERVER_NAME']; ?></div>                                             
</form>
</body>