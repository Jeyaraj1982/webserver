 <style>
.mytr:hover{background:#f6f6f6;cursor:pointer}
</style>
<script src="./../../assets/js/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="./../../assets/css/demo.css">
<body style="margin:0px;">
<div class="titleBar">List of User</div>  
<table>
    <tr>
        <td>Username</td>
        <td>email id</td>
        <td>Phone No</td>
        <td>Posted on</td>
    </tr>
 
<?php 
include_once("../../config.php");
    if (!(CommonController::isLogin())){
        echo CommonController::printError("Login Session Expired. Please Login Again");
        exit;
    } 
    
    echo "<table  cellspacing='0' cellspadding='5' border='1' style='font-size:13px;font-family:Trebuchet MS;color:#222;width:100%'>";
   
    foreach (JUsertable::getUser() as $r)
    {
        ?>
    <tr class='mytr'>
    
  
        <td><?php echo $r["personname"];?></td>
        <td><?php echo $r["email"];?></td>
        <td><?php echo $r["mobile"]; ?></td>
        <td><?php echo $r["createdon"]; ?></td>
    </tr>
    
          
           <?php
    }
     echo"</table>"           
?>
</body>

