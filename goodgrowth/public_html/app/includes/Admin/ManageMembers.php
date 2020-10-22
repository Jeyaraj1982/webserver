 <div style="padding:10px;border:1px solid #eee;background:#fff;width:1000px;overflow:auto">
 <div class="heading1"><span>Manage Members</span></div>
 <Br>
 <?php
    $loginEntries = $mysql->select("select * from _tbl_Members where ReferedBy>0 order by MemberID desc");
 ?>
 <a href="dashboard.php?action=PlanWiseCompletd">Plan wise Completed List</a><br><br>
  <table class= "listTable"  cellspacing="0" style="width:1300px">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:70px">Member Code</th>
    <th style="text-align: left;">First Name</th>
    <th style="text-align: left;width:130px">Last Name</th>
    <th style="text-align: left;width:120px;">Nick Name</th>
    <th style="text-align: left;width:80px;">Mobile Number</th>
    <th style="text-align: left;width:100px;">Created On</th>
    <th style="text-align: left;width:100px;">G3</th>
    <th style="text-align: left;width:100px;">GOLDWAY</th>
    <th style="text-align: left;width:100px;">MYGOLD</th>
    <th style="text-align: left;width:100px;">SUPERGOLD</th>
    <th style="text-align: left;width:100px;">GOLDEAGLE</th>
    <th style="text-align: left;width:100px;">GOLDFINISH</th>
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
    <td style="text-align: left;"><?php echo ($entry['G3Completed']==1) ? "<img src='assets/images/tick_16.png'>" : "<img src='assets/images/cancel_16.png'>";?></td>
    <td style="text-align: left;"><?php echo ($entry['GoodwayCompleted']==1) ? "<img src='assets/images/tick_16.png'>" : "<img src='assets/images/cancel_16.png'>";?></td>
    <td style="text-align: left;"><?php echo ($entry['MyGoldCompleted']==1) ? "<img src='assets/images/tick_16.png'>" : "<img src='assets/images/cancel_16.png'>";?></td>
    <td style="text-align: left;"><?php echo ($entry['SuperGoldCompleted']==1) ? "<img src='assets/images/tick_16.png'>" : "<img src='assets/images/cancel_16.png'>";?></td>
    <td style="text-align: left;"><?php echo ($entry['GoldEagleCompleted']==1) ? "<img src='assets/images/tick_16.png'>" : "<img src='assets/images/cancel_16.png'>";?></td>
    <td style="text-align: left;"><?php echo ($entry['GoldFinishCompleted']==1) ? "<img src='assets/images/tick_16.png'>" : "<img src='assets/images/cancel_16.png'>";?></td>
    <td style="text-align: left;"><a class="hlink" href="dashboard.php?action=MemberView&MemberCode=<?php echo $entry['MemberCode']; ?>">View</a></td>
    
</tr>
<?php } ?>
</tbody>
</table>
 </div> 

