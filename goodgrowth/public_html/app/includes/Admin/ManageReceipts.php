 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Manage Receipts</span></div>
 <Br>
 <?php
    $Entries = $mysql->select("select * from _tbl_Accounts_Receipts order by ReceiptID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:120px">Invoice Date</th>
    <th style="text-align: left;width:90px">Receipt No</th>
    <th style="text-align: left;width:90px">Member Code</th>
    <th style="text-align: left;width:120px">Member Name</th>
    <th style="text-align: left;">Invoice Description</th>
    <th style="text-align: left;width:120px;">Receipt Amount</th>
    <th style="text-align: left;width:50px">&nbsp;</th>
</tr>
<?php foreach($Entries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['TxnDate']);?></td>
    <td style="text-align: left;"><?php echo $entry['ReceiptNo'];?></td>
    <td style="text-align: left;"><?php echo $entry['MemberCode'];?></td>
    <td style="text-align: left;"><?php echo $entry['MemberName'];?></td>
    <td style="text-align: left;"><?php echo $entry['Particulars'];?></td>
    <td style="text-align: right;padding-right:20px;"><?php echo convertcash($entry['ReceiptAmount']);?></td>
    <td style="text-align: left;"><a class="hlink" target="blank" href="downloadpdf.php?Receipt=<?php echo $entry['ReceiptNo']; ?>"><img src="assets/images/download.png"></a></td>
    
</tr>
<?php } ?>
</tbody>
</table>
 </div> 

