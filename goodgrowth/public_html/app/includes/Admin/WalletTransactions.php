 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Wallet Transactions</span></div>
 <Br>
 <?php
    $loginEntries = $mysql->select("select * from _tbl_Wallet_Transactions where MemberID='".$userData['MemberID']."' order by WalletTransactionID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Date</th>
    <th style="text-align: left;">Particulars</th>
    <th style="text-align: right;width:120px">ActualAmount</th>
    <th style="text-align: right;width:120px">CreditAmount</th>
    <th style="text-align: right;width:120px">DebitAmount</th>
    <th style="text-align: right;width:120px">BalanceAmount</th>
</tr>
<?php foreach($loginEntries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['TxnDate']);?></td>
    <td style="text-align: left;"><?php echo $entry['Particulars'];?></td>
    <td style="text-align: right;"><?php echo number_format($entry['ActualAmount'],2);?></td>
    <td style="text-align: right;"><?php echo number_format($entry['CreditAmount'],2);?></td>
    <td style="text-align: right;"><?php echo number_format($entry['DebitAmount'],2);?></td>
    <td style="text-align: right;"><?php echo number_format($entry['BalanceAmount'],2);?></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 