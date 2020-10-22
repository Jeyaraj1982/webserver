 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Member Earned Points (Member-wise)</span></div>
 <div class="LMenu" style="text-align:right">
    <a href="dashboard.php?action=ManagePoints">Transactions</a>&nbsp;|&nbsp;
    <a href="dashboard.php?action=MemberwisePoints">Member-wise</a>
 </div>
 <Br>
 <?php
    $Entries = $mysql->select("select MemberCode, Sum(EarnPoint) as EarnPoint from _tbl_Member_Points  group by MemberID order by MemberID");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Member Code</th>
    <th style="text-align: right;width:120px;">Earned Points</th>
    <th>&nbsp;</th>
</tr>
<?php foreach($Entries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
    <td style="text-align: right;"><?php echo $entry['EarnPoint'];?></td>
    <td>&nbsp;</td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 