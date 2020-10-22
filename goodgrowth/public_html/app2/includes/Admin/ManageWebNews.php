 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Manage Web News</span></div>
 <Br>
 <div class="LMenu" style="text-align:right">
    <a href="dashboard.php?action=CreateWebNews">+ Create News</a>
 </div>
  
 <?php
    $loginEntries = $mysql->select("select * from _tbl_Web_News");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Date</th>
    <th style="text-align: left">News Title</th>
    <th style="text-align: left;width:150px">Published</th>
    <th style="text-align: left;width:100px;">Status</th>
    <th style="text-align: left;width:50px;"> </th>
</tr>
<?php foreach($loginEntries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['Created']);?></td>
    <td style="text-align: left;"><?php echo $entry['NewsTitle'];?></td>
    <td style="text-align: left;"><?php echo  $entry['IsPublish']=="1" ? $entry['Published'] : " "; ;?></td>
    <td style="text-align: left;"><?php echo $entry['IsPublish']=="1" ? "Published" : "Not Publish";?></td>
    <td style="text-align: left;"><a href="dashboard.php?action=EditWebNews&ID=<?php echo $entry['NewsID'];?>">Edit</a></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 