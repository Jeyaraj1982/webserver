<?php include_once("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Project Management System</title>
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
<style>
    span, div, td, tr, p, ul, li, a {font-family:'Titillium Web'}
    a {color:#D83908;text-decoration: none;}
    a:hover {text-decoration:underline;}
</style>
  <script src="assets/jquery.min.js" type="text/javascript"></script>

   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
   <style>
   input[type="text"] {font-family:'Titillium Web';padding:5px;border:1px solid #ccc;padding-left:10px}
   input[type="password"] {font-family:'Titillium Web';padding:5px;border:1px solid #ccc;padding-left:10px}
input[type="submit"] {-moz-box-shadow:inset 0px 1px 0px 0px #cf866c;-webkit-box-shadow:inset 0px 1px 0px 0px #cf866c;box-shadow:inset 0px 1px 0px 0px #cf866c;background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d0451b), color-stop(1, #bc3315));background:-moz-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-webkit-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-o-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-ms-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:linear-gradient(to bottom, #d0451b 5%, #bc3315 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d0451b', endColorstr='#bc3315',GradientType=0);background-color:#d0451b;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;border:1px solid #942911;display:inline-block;cursor:pointer;color:#ffffff;font-family:Arial;font-size:12px;padding:2px 24px 3px;text-decoration:none;text-shadow:0px 1px 0px #854629;}
input[type="submit"]:hover {background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc3315), color-stop(1, #d0451b));background:-moz-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-webkit-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-o-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-ms-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:linear-gradient(to bottom, #bc3315 5%, #d0451b 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc3315', endColorstr='#d0451b',GradientType=0);background-color:#bc3315;}
input[type="submit"]:active {position:relative;top:1px;}  
</style>
</head>
<body>

<?php

           
if (isset($_POST['loginbtn'])) {
   $data = $mysql->select("select * from `_tblUser` where `EmailAddress`='".$_POST['iuongo_emailaddress']."' and `Password`='".$_POST['iuongo_password']."'");
   if (sizeof($data)>0) {
       $_SESSION['User']=$data[0];
       echo "<script>location.href='dashboard.php';</script>";
   } else {
       
      $msg = "Invalid Login";
   }
}
?>



<br><br><Br>
<br><br><Br>
<form action="" method="post">
	<table align="center" cellpadding="3" cellspacing="0">
		<tr>	
			<td style="padding-bottom:0px;">Email Address</td>
            </tr>
            <tr>
			<td style="padding-top:0px"><input type="text" name="iuongo_emailaddress" Placeholder="Email Address" style="width:300px"></td>
		</tr>
		<tr>
			<td style="padding-bottom:0px;">Password</td>
              </tr>
            <tr>
			<td  style="padding-top:0px"><input type="password" name="iuongo_password" Placeholder="Password" style="width:300px"></td>
		</tr>
        <?php
            if (isset($msg)) {
                ?>
                <tr>
                  
                    <td style="color:red;font-size:13px"><?php echo $msg;?></td>
                </tr>
                <?php
            }
        ?>
		<tr>
		 
			<td  style="padding-top:10px"><input type="submit" value="Login" name="loginbtn"></td>
		</tr>
	</table>

</form>

</body>
</html>
