 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>My Points</span></div>
 <Br>
 <?php
    $Entries = $mysql->select("select * from _tbl_Member_Points where MemberID='".$userData['MemberID']."' order by PointsID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Txn Date</th>
    <th style="text-align: left;width:120px;">Member Code</th>
    <th style="text-align: right;width:120px;">Earned Points</th>
    <th style="text-align: right;">left</th>
</tr>
<?php foreach($Entries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['PointsUpdated']);?></td>
    <td style="text-align: left;"><?php echo $entry['DirectMemberCode'];?></td>
    <td style="text-align: right;"><?php echo $entry['EarnPoint'];?></td>
    <td style="text-align: right;">Direct Member <?php echo $entry['DirectMemberCode'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 