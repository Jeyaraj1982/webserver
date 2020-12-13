<?php
    session_start();
    define("SITEPATH","https://accounts.j2jsoftwaresolutions.com"); 
    include_once("controllers/class.DatabaseController.php");
    $mysql = new MySqldatabase("localhost","j2jsoftw_j2jsoftware","mysqlPwd@123","j2jsoftw_accounts"); 
    if (isset($_GET['loginid'])) {
        $loginData = $mysql->select("select * from _customers_login_logs where SessionUpdate='0' and LoginReference='".$_GET['loginid']."'");
        
        if (sizeof($loginData)==1) {
           $mysql->execute("update _customers_login_logs set SessionUpdate='1' where LoginReference='".$_GET['loginid']."'");
           $userData = $mysql->select("select * from _customers where CustomerID='".$loginData[0]['CustomerID']."'") ;
           $_SESSION['USER']=$userData[0];
           sleep(5);
           echo "<script>location.href='http://accounts.j2jsoftwaresolutions.com';</script>";
        } else {
            ?>
            <script>
                alert("login failed");
                location.href="./";
            </script>
            <?php
            exit;
        }
    }
?>