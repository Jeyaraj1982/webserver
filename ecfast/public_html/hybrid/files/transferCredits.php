<h2>Transfer Credits</h2>

<?php
 

if (isset($_POST['btnTransfer'])) {
   
    $toID = $mysql->select("select * from _users where emailid='".$_POST['userid']."'");
    
    $adminBalance = getVirtualBalance($_SESSION['USER']['userid']);
    $mysql->insert("_virtualtbltransaction",array("userid"      => $_SESSION['USER']['userid'],
                                                  "txnon"       => date("Y-m-d H:i:s"),
                                                  "rechargeno"  => "BALANCEUPDATE",
                                                  "operator"    => $_POST['operator'],
                                                  "rechargeamt" => $_POST['rechargeamt'],
                                                  "operatorid"  => $_POST['narration'],
                                                  "apiresponse" => "CREDIT To ".$_POST['userid'],
                                                  "remarks"     => $_POST['adminRef'],
                                                  "oldbalance"  => $adminBalance,
                                                  "newbalance"  => $adminBalance-$_POST['rechargeamt'],
                                                  "txnstatus"   => "SUCCESS",
                                                  "apiurl"      => " ",
                                                  "revtxnid"    => " ",
                                                  "creditamt"   => '0',
                                                  "debitamt"    => $_POST['rechargeamt'],
                                                  "usertxnid"   => 0));
     
     // $userBalance = getVirtualBalance($toID[0]['userid']);
      $userBalance = getVirtualBalanceOperatorWise($toID[0]['userid'],trim($_POST['operator']));
      $mysql->insert("_tbltransaction",array("userid"      => $toID[0]['userid'],
                                                  "txnon"       => date("Y-m-d H:i:s"),
                                                  "rechargeno"  => "BALANCEUPDATE",
                                                  "operator"    => $_POST['operator'],
                                                  "rechargeamt" => $_POST['rechargeamt'],
                                                  "operatorid"  => $_POST['narration'],
                                                  "apiresponse" => "CREDIT From Admin",
                                                  "remarks"     => $_POST['adminRef'],
                                                  "oldbalance"  => $userBalance,
                                                  "newbalance"  => $userBalance+$_POST['rechargeamt'],
                                                  "txnstatus"   => "SUCCESS",
                                                  "apiurl"      => " ",
                                                  "revtxnid"    => " ",
                                                  "creditamt"   => $_POST['rechargeamt'],
                                                  "debitamt"    => '0',
                                                  "usertxnid"   => 0));
      echo "Successfully Transfered";
}
     $users = $mysql->select("select * from _users where isunder=".$_SESSION['USER']['userid']);
     $operators = $mysql->select("select * from _operators order by optorder asc");
 ?>
 <form action="" method="post">
 <table cellpadding="5" cellspacing="0" style="font-size:12px;">
    <tr>
        <td>User</td>
        <td>
            <select name="userid" style="width:250px;padding:3px;border:1px solid #ccc;">
                 <?php foreach($users as $user) {?>
                    <option value="<?php echo $user['emailid'];?>"><?php echo $user['emailid'];?></option>
                 <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Operator</td>
        <td>
            <select name="operator" style="width:250px;padding:3px;border:1px solid #ccc;">
                 <?php foreach($operators as $operator) {?>
                    <option value="<?php echo $operator['operatorname'];?>"><?php echo $operator['operatorname'];?></option>
                 <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Credit</td>
        <td><input type="text" name="rechargeamt" placeholder="0.00" style="text-align:right;width:100px;padding:3px;border:1px solid #ccc;"></td>
    </tr>
    <tr>
        <td>Narration</td>
        <td><input type="text" name="narration" style="width:100px;padding:3px;border:1px solid #ccc;"></td>
    </tr>   
    <tr>
        <td>Admin Referance</td>
        <td><input type="text" name="adminRef" style="width:100px;padding:3px;border:1px solid #ccc;"></td>
    </tr>  
    <tr>
        <td>
        <input type="submit" value="Transfer Now" name="btnTransfer">
        </td>
    </tr>
 </table>
 </form>