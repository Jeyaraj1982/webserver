 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Login History</span></div>
 <Br>
 <?php
    $loginEntries = $mysql->select("select * from _tbl_Members_LoginHistory where MemberID='".$userData['MemberID']."' order by MemberLoginID desc limit 0,10");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Date</th>
    <th style="text-align: left;width:120px;">IP address</th>
    <th style="text-align: left;width:120px">Country</th>
    <th style="text-align: left;">City</th>
</tr>
<?php foreach($loginEntries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['LoginDateTime']);?></td>
    <td style="text-align: left;"><?php echo $entry['IPAddress'];?></td>
    <td style="text-align: left;"><?php echo $entry['CountryName'];?></td>
    <td style="text-align: left;"><?php echo $entry['CityName'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 