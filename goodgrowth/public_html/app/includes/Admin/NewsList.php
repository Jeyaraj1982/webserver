 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>News</span></div>
 <Br>
 <?php
    $loginEntries = $mysql->select("select * from _tbl_News where IsPublish='1' order by NewsID desc");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Date</th>
    <th style="text-align: left">News Title</th>
    <th style="text-align: left;width:50px"></th>
</tr>
<?php foreach($loginEntries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['Created']);?></td>
    <td style="text-align: left;"><?php echo $entry['NewsTitle'];?></td>
    <td style="text-align: left;"><a class="hlink" href="dashboard.php?action=News&ID=<?php echo $entry['NewsID'];?>">view</a></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 