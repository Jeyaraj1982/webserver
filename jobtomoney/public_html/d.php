<?php
session_start();    
date_default_timezone_set('Asia/Calcutta');
include_once("controller/class.DatabaseController.php");
$mysql = new MySqldatabase("localhost","jobtomon_user","mysqlPwd@123","jobtomon_database");
if (!(isset($_SESSION['WINAMT']))) {
    echo "Error";
    exit;
}

function getBalance($id) {
    global $mysql;
    $d = $mysql->select("select sum(cramount-dramount) as bal from _acc_txn where userid=".$id);
    return isset($d[0]['bal']) ? $d[0]['bal'] : "0.00";    
}

//if (trim($_SESSION['WINAMT'])>=0) {
//if (intval(trim($_SESSION['WINAMT']))>0) {
//if (strlen(trim($_SESSION['WINAMT']))<=4) {
if (is_numeric($_SESSION['WINAMT'])==1) {
    $mysql->execute("update _bids set bidrate='".trim($_SESSION['WINAMT'])."' where bidid='".$_SESSION['WINAMTRC']."'");
    $mysql->insert("_acc_txn",array("userid"        => $_SESSION['USER']['userid'],
                                    "txndate"       => date("Y-m-d H:i:s"),
                                    "particulars"   => "Earn/Scratch 2 Win/".trim($_SESSION['WINAMT']),
                                    "actualamt"     => trim($_SESSION['WINAMT']),
                                    "cramount"      => trim($_SESSION['WINAMT']),
                                    "dramount"      => "0",
                                    "IsEarning"     => "1",
                                    "transactionid" => "0",
                                    "abalance"=>getBalance($_SESSION['USER']['userid'])  + trim($_SESSION['WINAMT']),
                                    "paymentstatus"=>"S2W"));
} else {
    $mysql->execute("update _bids set bidrate='0',`remarks`='".trim($_SESSION['WINAMT'])."' where bidid='".$_SESSION['WINAMTRC']."'");           
    $mysql->insert("_acc_txn",array("userid"        => $_SESSION['USER']['userid'],
                                    "txndate"       => date("Y-m-d H:i:s"),
                                    "particulars"   => "Earn/Scratch 2 Win/".trim($_SESSION['WINAMT']),
                                    "actualamt"     => "0",
                                    "cramount"      => "0",
                                    "dramount"      => "0",
                                    "IsEarning"     => "2",
                                    "transactionid" => "0",
                                    "abalance"=>getBalance($_SESSION['USER']['userid']),
                                    "paymentstatus"=>"S2W"));
}
?>
<div style="text-align: center;font-size: 14px;line-height: 35px;">
<div style="font-size:25px;padding-bottom:40px;color:Green;font-weight:bold;text-align:center">Congratulation!!!</div>
<?php if ($_SESSION['WINAMT']>0) {?>
    You have won Rs. <?php echo $_SESSION['WINAMT'];?> <br>
    Rs. <?php echo number_format($_SESSION['WINAMT'],2);?> has credited your wallet. <br>
    Your available balance Rs. <?php echo number_format(getBalance($_SESSION['USER']['userid']),2);?> 
<?php } else { ?>
        You won <?php echo $_SESSION['WINAMT'];?> <br>    
<?php } ?>
</div>
<br><br>
<?php
    $_SESSION['WINAMT']="xxx";
    unset($_SESSION['WINAMT']);
    empty($_SESSION['WINAMT']);
    $_SESSION['WINAMTRC']="xxx";
    unset($_SESSION['WINAMTRC']);
    empty($_SESSION['WINAMTRC']);
?>