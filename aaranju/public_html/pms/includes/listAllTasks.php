 
 <?php
 $style = "";
 $Prototypes = $mysql->select("select * from _tbltasklist      order by TaskID desc");  
       
    ?>
  <div style="text-align:right;padding-bottom:10px;padding-right:5px;">
   <!-- <a href="dashboard.php?action=newPrototype">Add Prototype</a> -->
  </div>  
<table style="width:100%;" cellspacing="0" cellpadding="5">
    <tr style="background:#eee;font-weight:bold;">
        <td style="width:40px;text-align:right">ID</td>
        <td style="width:60px;">Project</td>
        <td style="width:80px;">Posted By</td>
        <td style="width:145px;">Posted On</td>
         <td>Title</td>
         <td>Assigned</td>
         <td>Assigned On</td>
         
        <td style="width:145px;">Completed On</td>
        <td style="width:145px;">Completed By</td>
       
        <td></td>
    </tr>
    <?php foreach($Prototypes as $Prototype) { ?>
         <tr style="background:#<?php echo $Prototype['TaskStatus']==1 ? 'fff' : 'ebffdd';?>">
             <td style="text-align:right"><?php echo $Prototype['TaskID'];?></td>
             <td><?php echo $Prototype['ProjectName'];?></td>
             <td><?php echo $Prototype['TaskPostedByName'];?></td>
             <td><?php echo date("M d, Y H:i",strtotime($Prototype['TaskCreatedOn']));?></td>
             <td><?php echo $Prototype['TaskTitle'];?></td>
             
             <td><?php echo $Prototype['TaskAssignedByName'];?></td>
             <td><?php 
             if ($Prototype['TaskAssignedTo']>0) {
             echo date("M d, Y H:i",strtotime($Prototype['TaskAssignedOn']));
             }?></td>
             
             
             <td><?php echo $Prototype['TaskStatus']==3 ? date("M d, Y",strtotime($Prototype['CompletedOn'])) : "";?></td>
             <td><?php echo $Prototype['CompletedByName'];?></td>
             <td><a href="dashboard.php?action=viewTask&Task=<?php echo $Prototype['TaskID'];?>">View</a></td>
         </tr>
    <?php } ?>
</table> 