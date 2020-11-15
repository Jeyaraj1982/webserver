<?php
session_start();
           if (isset($_POST['loginbtn']))  {
           
                include_once("mysql.php");
                $mysql = new MySql();
                $userdata = $mysql->select("select * from usertable where username='".$_POST['username']."' and password='".$_POST['password']."' ");
                
                if (sizeof($userdata)>0) {
                    $_SESSION['user']=$userdata[0];
                    echo "<script>location.href='dashboard.php';</script>";
                }  else {
                    echo "<script>alert('login failed');</script>" ;
                }
           }
?>
<title>Web Admin</title>
<body style="background:url('background.jpg') repeat-y">
<div style="text-align:left"><img src="logo.png"></div>

<br><br><br><br>
<form action="" method="post">
<table align="center" cellpadding="3" cellspacing="0" style="color:blue;font-size:12px;font-family:arial;font-weight:bold;">
    <tr>
        <td>User Name</td>
        <td><input type="text" name="username" autocomplete="off"></td>
    </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" autocomplete="off"></td>
    </tr>
    <tr>
        <td align="right" colspan="2"><input type="submit" value="Login" name="loginbtn"></td>
    </tr>
</table>    

</form>
</body>