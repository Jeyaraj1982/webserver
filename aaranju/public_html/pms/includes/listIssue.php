 
<table style="width:100%; " cellspacing="0" cellpadding="5">
    <tr style="background:#eee;font-weight:bold;">
        <td colspan="8"></td>
        <td colspan="4" style="text-align: center;">Verified By</td>
        <td></td>    
    </tr>
    <tr style="background:#eee;font-weight:bold;">
        <td style="width:40px;text-align:right">ID</td>
        <td style="width:80px;">Project</td>
        <td style="width:80px;">Posted By</td>
        <td style="width:145px;">Posted On</td>
        <td>Title</td>
        <td style="width:50px;">Status</td>
        <td style="width:100px;">Developer</td>
        <td style="width:145px;">Closed</td>
        <td style="width:80px;">User A</td>
        <td style="width:80px;">User A On</td>
        <td style="width:80px;">User B</td>
        <td style="width:80px;">User B On</td>
        <td></td>
    </tr>
    <?php
        $issues = $mysql->select("select * from _tblIssues where IssuePostedBy='".$_SESSION['User']['UserID']."' order by IssueID");
    ?>
    <?php foreach($issues as $issue) { ?>
         <tr  style="background:#<?php echo $issue['IssueStatus']==1 ? 'fff' : 'ebffdd';?>">
             <td style="text-align:right"><?php echo $issue['IssueID'];?></td>
             <td><?php echo $issue['ProjectName'];?></td>
             <td><?php echo $issue['IssuePostedByName'];?></td>
             <td><?php echo date("M d, Y H:i",strtotime($issue['IssueCreatedOn']));?></td>
             <td><?php echo $issue['IssueTitle'];?></td>
             <td style="text-align: center"><?php echo $issue['IssueStatus']==1 ? "Open" : "Closed";?></td>
             <td><?php echo $issue['DeveloperName'];?></td>
             <td><?php echo $issue['IssueStatus']>1 ? date("M d, Y",strtotime($issue['ClosedOn'])) : "";?></td>
               <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td><a href="dashboard.php?action=viewPIssue&Issue=<?php echo $issue['IssueID'];?>">View</a></td>
         </tr>
    <?php } ?>
</table> 