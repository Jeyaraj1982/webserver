 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Manage Members</span></div>
 <Br>
 <?php
    $loginEntries = $mysql->select("select * from _tbl_Members where ReferedBy>0 order by MemberID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:90px">Member Code</th>
    <th style="text-align: left;">First Name</th>
    <th style="text-align: left;width:120px">Last Name</th>
    <th style="text-align: left;width:120px;">Nick Name</th>
    <th style="text-align: left;width:100px;">Mobile Number</th>
    <th style="text-align: left;width:120px;">Created On</th>
    <th style="text-align: left;width:50px">&nbsp;</th>
</tr>
<?php foreach($loginEntries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
    <td style="text-align: left;"><?php echo $entry['FirstName'];?></td>
    <td style="text-align: left;"><?php echo $entry['LastName'];?></td>
    <td style="text-align: left;"><?php echo $entry['NickName'];?></td>
    <td style="text-align: left;"><?php echo $entry['MobileNumber'];?></td>
    <td style="text-align: left;"><?php echo putDateTime($entry['CreatedOn']);?></td>
    <td style="text-align: left;"><a class="hlink" href="dashboard.php?action=MemberView&MemberCode=<?php echo $entry['MemberCode']; ?>">View</a></td>
    
</tr>
<?php } ?>
</tbody>
</table>
 </div> 

