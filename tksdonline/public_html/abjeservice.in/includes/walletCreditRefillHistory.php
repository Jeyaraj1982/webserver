<?php $txnpage="Datewise";?>
<h3 style="text-align: center;padding:10px;"><?php echo $optttitle;?>Wallet Credit Transaction Report</h3>
 
      <?php
        $data = $mysql->select("select * from _tbl_member_credit_walletupdate where MemberID='".$_SESSION['User']['MemberID']."' order by WalletReqID desc");
      ?>
<table class="table table-striped ">
    <tr>
        <td>Txn Date</td>
        <td>Amount</td>
        <td>Paid On</td>
    </tr>
<?php foreach($data as $d) {?>
    <tr>
        <td><?php echo $d['TxnDate'];?></td>
        <td><?php echo $d['TransferAmount'];?></td>
        <td><?php echo $d['PaidOn'];?></td>
    </tr>
<?php } ?>
     
</table> 
  