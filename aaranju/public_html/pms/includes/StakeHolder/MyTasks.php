<div style="width:1200px;margin:0px auto"> 
 <?php
 $style = "";
 $Prototypes = $mysql->select("select * from _tblPStakeHolderTask where TaskPostedBy='".$_SESSION['User']['UserID']."'  order by TaskID desc");  
       
    ?>
  <div style="text-align:right;padding-bottom:10px;padding-right:5px;">
    <a href="dashboard.php?action=StakeHolder/CreatTask">Create Task</a> 
  </div>  
<table style="width:100%;" cellspacing="0" cellpadding="5">
    <tr style="background:#eee;font-weight:bold;">
        <td>Title</td>
        <td style="width:80px">Status</td>
        <td style="width:120px">Hours Worked</td>
        <td style="width:145px;">Work initiated</td>
        <td style="width:145px;">Last updated</td>
        <td style="width:145px;">Work completed</td>
        <td style="width:50px"></td>
    </tr>
    <?php foreach($Prototypes as $Prototype) { ?>
         <tr style="background:#<?php echo $Prototype['TaskStatus']==1 ? 'fff' : 'ebffdd';?>">
             <td><?php echo $Prototype['TaskTitle'];?></td>
              <td><?php 
                if ($Prototype['TaskStatus']==1) {
                    echo "New";
                }
                if ($Prototype['TaskStatus']==2) {
                    echo "Working";
                }
                if ($Prototype['TaskStatus']==3) {
                    echo "Completed";
                }
                 ?>
             </td>
             <td><?php echo getTotalTimeWorked($Prototype['TaskID']);?></td>
             <td><?php echo date("M d, Y H:i",strtotime($Prototype['TaskCreatedOn']));?></td>
             <td><?php 
                if ($Prototype['LastUpdatedOn']!=null) {
             echo date("M d, Y H:i",strtotime($Prototype['LastUpdatedOn']));
                }
             ?></td>
             <td><?php
             if ($Prototype['TaskStatus']==3) {
              echo date("M d, Y H:i",strtotime($Prototype['CompletedOn']));
             }?></td>
             <td style="text-align: right"><a href="dashboard.php?action=StakeHolder/ViewTask&Task=<?php echo $Prototype['TaskID'];?>">View</a></td>
         </tr>
    <?php } ?>
</table> 
</div>