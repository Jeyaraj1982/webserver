<h2 style="text-align: left;font-family: arial;">Disable Account</h2>     
<div style="border-bottom:1px solid #D4E3F6;"></div><br>  

<?php
$data = $mysql->select("select * from _clients where id=".$_POST['acno']);
if (sizeof($data)==1) {
    $param = explode("-",$data[0]['emailid']);
    if ($param[0]!="disabled") {
    $sql = "update _clients set emailid=CONCAT('disabled-',emailid), mobileno=CONCAT('disabled-',mobileno) where id=".$_POST['acno'];
    $mysql->execute($sql);
    echo "Account ID : ".$_POST['acno']." has beed disabled.";
    } else {
        echo "This Account Already Disabled.<br>Your Account ID : ".$_POST['acno'];
    }
    
} else {
    echo "Invalid Account ID.<br>Your Account ID : ".$_POST['acno'];
}
?>
<br><div style="border-bottom:1px solid #D4E3F6;"></div>