 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Manage Sent SMS Log</span></div>
 <Br>
 <?php
    $Entries = $mysql->select("select * from _tbl_Log_MobileSMS where  MemberID='".$userData['MemberID']."' order by SMSID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:120px"> Date</th>
    <th style="text-align: left;width:120px">Member Code</th>
    <th style="text-align: left;width:130px">Mobile Number</th>
    <th style="text-align: left;">Messsage</th>
    <th style="text-align: left;width:50px">&nbsp;</th>
</tr>
<?php foreach($Entries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['MessagedOn']);?></td>
    <td style="text-align: left;"><?php echo $entry['Membercode'];?></td>
    <td style="text-align: left;"><?php echo $entry['SmsTo'];?></td>
    <td style="text-align: left;"><?php echo $entry['Message'];?></td>
    <td style="text-align: left;"><!--<a class="hlink" href="dashboard.php?action=InvoiceView&Invoce=<?php echo $entry['InvoiceNo']; ?>">View</a>--></td>
    
</tr>
<?php } ?>
</tbody>
</table>
 </div> 

