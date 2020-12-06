 
 <?php
 $style = "";
 $Prototypes = $mysql->select("select * from _tblPrototype where ProjectID in (select p.ProjectID from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID and pa.UserID='".$_SESSION['User']['UserID']."' group by pa.ProjectID)     order by PrototypeID desc");  
       
    ?>
  <div style="text-align:right;padding-bottom:10px;padding-right:5px;">
    <a href="dashboard.php?action=newPrototype">Add Prototype</a> 
  </div>  
<table style="width:100%;" cellspacing="0" cellpadding="5">
    <tr style="background:#eee;font-weight:bold;">
        <td style="width:40px;text-align:right">ID</td>
        <td style="width:60px;">Project</td>
        <td style="width:80px;">Posted By</td>
        <td style="width:145px;">Posted On</td>
         <td>Title</td>
        <td style="width:145px;">Completed On</td>
        <td style="width:145px;">Completed By</td>
       
        <td></td>
    </tr>
    <?php foreach($Prototypes as $Prototype) { ?>
         <tr style="background:#<?php echo $Prototype['PrototypeStatus']==1 ? 'fff' : 'ebffdd';?>">
             <td style="text-align:right"><?php echo $Prototype['PrototypeID'];?></td>
             <td><?php echo $Prototype['ProjectName'];?></td>
             <td><?php echo $Prototype['PrototypePostedByName'];?></td>
             <td><?php echo date("M d, Y H:i",strtotime($Prototype['PrototypeCreatedOn']));?></td>
             <td><?php echo $Prototype['PrototypeTitle'];?></td>
             <td><?php echo $Prototype['PrototypeStatus']==2 ? date("M d, Y",strtotime($Prototype['CompletedOn'])) : "";?></td>
             <td><?php echo $Prototype['CompletedByName'];?></td>
             <td><a href="dashboard.php?action=viewPrototype&Prototype=<?php echo $Prototype['PrototypeID'];?>">View</a></td>
         </tr>
    <?php } ?>
</table> 