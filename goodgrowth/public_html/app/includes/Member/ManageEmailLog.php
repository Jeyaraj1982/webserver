 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Manage Sent Emails Log</span></div>
 <Br>
 <?php
    $Entries = $mysql->select("select * from _tbl_Log_Emails where  MemberID='".$userData['MemberID']."' order by EmailID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:120px"> Date</th>
    <th style="text-align: left;width:120px">Member Code</th>
    <th style="text-align: left;width:130px">Email ID</th>
    <th style="text-align: left;">Status</th>
    <th style="text-align: left;">Category</th>
    <th style="text-align: left;width:50px">&nbsp;</th>
</tr>
<?php foreach($Entries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['MessagedOn']);?></td>
    <td style="text-align: left;"><?php echo $entry['MemberCode'];?></td>
    <td style="text-align: left;"><?php echo $entry['MailTo'];?></td>
    <td style="text-align: left;"><?php echo $entry['Mailed']==1 ? "Sent" : "<span style='color:red;'>Failed: ".$entry['ErrorMsg']."</span>";?></td>
    <td style="text-align: left;"><?php echo $entry['Category'];?></td>
    <td style="text-align: left;"><!--<a class="hlink" href="dashboard.php?action=InvoiceView&Invoce=<?php echo $entry['InvoiceNo']; ?>">View</a>--></td>
    
</tr>
<?php } ?>
</tbody>
</table>
 </div> 

