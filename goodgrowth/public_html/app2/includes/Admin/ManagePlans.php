 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Plans</span></div>
 <Br>
 <?php
    $PlanEntries = $mysql->select("select * from _tbl_Plans order by PlanID");
 ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: left;padding:5px;width:100px">Plan Name</th>
    <th style="text-align: left;padding:5px;">Amount</th>
</tr>
<?php foreach($PlanEntries as $entry) {?>
<tr class="logip">
    <td style="text-align: Left;"><?php echo $entry['PlanString'];?></td>
    <td style="text-align: Left;">Rs. <?php echo number_format($entry['PlanAmount'],2);?></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 