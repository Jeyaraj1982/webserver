<?php $projcts=$mysql->select("select p.* from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID  and pa.UserID='".$_SESSION['User']['UserID']."'  group by pa.ProjectID"); ?>
<?php $users=$mysql->select("select * from _tblUser"); ?>
<?php

if (isset($_POST['verifyBtn'])) {
    
}
 $style = "";
        if (isset($_POST['Projectwisebtn'])) {
          $issues = $mysql->select("select * from _tblIssues where ProjectID='".$_POST['ProjectID']."' order by IssueID desc");  
          $fissues = $mysql->select("select * from _tblIssues where  where IssueStatus=1 and ProjectID='".$_POST['ProjectID']."' order by IssueID desc");  
          
        } else if (isset($_POST['UserWisebtn'])) {
          $issues = $mysql->select("select * from _tblIssues where IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
          $fissues = $mysql->select("select * from _tblIssues where  where IssueStatus=1 and IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
        
        } else if (isset($_POST['ProjectUserWisebtn'])) {
          $issues = $mysql->select("select * from _tblIssues where ProjectID='".$_POST['ProjectID']."' and IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
          $fissues = $mysql->select("select * from _tblIssues where  where IssueStatus=1 and ProjectID='".$_POST['ProjectID']."' and IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
        
        } else {
            
            $style="background:#E8FFE5";
        
            if ($_GET['ftype']=="open") {
                $issues = $mysql->select("select * from _tblIssues where  ProjectID in (select p.ProjectID from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID and pa.UserID='".$_SESSION['User']['UserID']."' group by pa.ProjectID)  and IssueStatus=1    order by IssueID desc");
            } else if ($_GET['ftype']=="closed") {
                $issues = $mysql->select("select * from _tblIssues where  ProjectID in (select p.ProjectID from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID and pa.UserID='".$_SESSION['User']['UserID']."' group by pa.ProjectID)  and IssueStatus=2    order by IssueID desc");
            } else {
                $issues = $mysql->select("select * from _tblIssues where ProjectID in (select p.ProjectID from _tblProjectAssign as pa, _tblProjects p where pa.ProjectID=p.ProjectID and pa.UserID='".$_SESSION['User']['UserID']."' group by pa.ProjectID)   order by IssueID desc");    
            }
        
        }
    ?>
    <form action=""  method="post">
<table>
    <tr>
        <td style="">
            
            <fieldset style="<?php echo $style;?>">
                <legend>All Issues</legend>
                <a href="dashboard.php?action=listAIssue">All Issues</a>&nbsp;&nbsp;|
                <a href="dashboard.php?action=listAIssue&ftype=open">Open Issues</a>&nbsp;&nbsp;|
                <a href="dashboard.php?action=listAIssue&ftype=closed">Closed Issues</a>&nbsp;&nbsp;
            </fieldset>
        </td>
        <td>
                <fieldset style="background:<?php echo $_POST['Projectwisebtn'] ? "#E8FFE5" : "#fff";?>">
                    <legend>Project Wise</legend>
                    <select name="ProjectID" style="padding:0 20px 1px 3px">
                        <?php foreach($projcts as $p){ ?>
                            <option value="<?php echo $p['ProjectID'];?>"><?php echo $p['ProjectName'];?></option>                
                        <?php } ?>
                    </select>
                    <input type="submit" name="Projectwisebtn" value="View">
                </fieldset>
        </td>
        <!--<td>
            <fieldset style="background:<?php echo $_POST['UserWisebtn'] ? "#E8FFE5" : "#fff";?>;">
                <legend>User Wise</legend>
                <select name="EmployeeID" style="padding:0 20px 1px 3px">
                    <?php foreach($users as $p){ ?>
                        <option value="<?php echo $p['UserID'];?>"><?php echo $p['EmployeeName'];?></option>                
                    <?php } ?>
                </select>
                <input type="submit" value="View" name="UserWisebtn">
            </fieldset>
        </td> -->
        
        
           <td >
           <!-- <fieldset style="background:<?php echo $_POST['ProjectUserWisebtn'] ? "#E8FFE5" : "#fff";?>;">
                <legend>Project + User Wise</legend>
                <select name="ProjectID" style="padding:0 20px 1px 3px">
            <?php foreach($projcts as $p){ ?>
                <option value="<?php echo $p['ProjectID'];?>"><?php echo $p['ProjectName'];?></option>                
            <?php } ?>
            </select>
              <select name="EmployeeID" style="padding:0 20px 1px 3px">
               <?php foreach($users as $p){ ?>
                <option value="<?php echo $p['UserID'];?>"><?php echo $p['EmployeeName'];?></option>                
            <?php } ?>
            </select>
                <input type="submit" value="View" name="ProjectUserWisebtn">
            </fieldset>
        </td>  -->
     <!--      <td>
            <fieldset>
                <legend>Project + Date Wise</legend>
                 <select name="ProjectID">
            <?php foreach($projcts as $p){ ?>
                <option value="<?php echo $p['ProjectID'];?>"><?php echo $p['ProjectName'];?></option>                
            <?php } ?>
            </select>
                <input type="submit" value="View">
            </fieldset>
        </td>
           <td>
            <fieldset>
                <legend>User + Date Wise</legend>
                 <select name="UserID">
               <?php foreach($users as $p){ ?>
                <option value="<?php echo $p['UserID'];?>"><?php echo $p['EmployeeName'];?></option>                
            <?php } ?>
            </select>
                <input type="submit" value="View">
            </fieldset>
        </td>
           <td>
            <fieldset>
                <legend>Project + User + Date Wise</legend>
                 <select name="ProjectID">
            <?php foreach($projcts as $p){ ?>
                <option value="<?php echo $p['ProjectID'];?>"><?php echo $p['ProjectName'];?></option>                
            <?php } ?>
            </select>
              <select name="UserID">
               <?php foreach($users as $p){ ?>
                <option value="<?php echo $p['UserID'];?>"><?php echo $p['EmployeeName'];?></option>                
            <?php } ?>
            </select>
                <input type="submit" value="View">
            </fieldset>
        </td> -->
        <td style="">
        <h1 style="padding-top:10px;padding-left:10px;">Total : <?php echo sizeof($issues);?></h1>
        </td>
    </tr>
</table>
  </form>
  
     
<table style="width:100%;" cellspacing="0" cellpadding="5">
     <tr style="background:#09B909;color:#fff;font-weight:bold;">
        <td style="width:40px;text-align:right" rowspan="2">ID</td>
        <td style="width:60px;" rowspan="2">Project</td>
        <td style="width:80px;" rowspan="2">Posted By</td>
        <td style="width:145px;" rowspan="2">Posted On</td>
        <td rowspan="2">Title</td>
        <td style="width:50px;" rowspan="2">Status</td>
       
        <td style="width:60px;" rowspan="2">Developer</td>
        <td style="width:100px;" rowspan="2">Closed</td>
        <td colspan="4" style="text-align: center;">Verified By</td>
        <td  rowspan="2"></td>    
    </tr>
    <tr style="background:#09B909;color:#fff;font-weight:bold;">
        
        <td style="width:60px;">User A</td>
        <td style="width:100px;">User A On</td>
        <td style="width:60px;">User B</td>
        <td style="width:100px;">User B On</td>
        
    </tr>
   
    <?php foreach($issues as $issue) { ?>
         <tr style="background:#<?php echo $issue['IssueStatus']==1 ? 'fff' : 'ebffdd';?>">
             <td style="text-align:right"><?php echo $issue['IssueID'];?></td>
             <td><?php echo $issue['ProjectName'];?></td>
             <td><?php echo $issue['IssuePostedByName'];?></td>
             <td><?php echo date("M d, Y H:i",strtotime($issue['IssueCreatedOn']));?></td>
             <td><?php echo $issue['IssueTitle'];?></td>
             <td style="text-align: center"><?php echo $issue['IssueStatus']==1 ? "Open" : "Closed";?></td>
             
             <td><?php echo $issue['DeveloperName'];?></td>
             <td><?php echo $issue['IssueStatus']>1 ? date("M d, Y",strtotime($issue['ClosedOn'])) : "";?></td>
             
             <?php
                 if ($issue['IssueStatus']==2 && $issue['VerifiedA']==0) {
                  ?>
                  <td colspan="2" style="text-align: center;vertical-align: center;">
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $issue['IssueID'];?>" name="IssueID" >
                    <input type="submit" value="Verified" name="verifyBtn" >
                  </form>
                  </td>
                  <?php   
                 }  else {
             ?>
             <td><?php echo $issue['VerifiedA'];?></td>
             <td><?php echo is_null($issue['VerifiedAOn']) ? "" : date("M d, Y",strtotime($issue['VerifiedAOn']));?></td>
             <?php } ?>
             <td><?php echo $issue['VerifiedB'];?></td>
             <td><?php echo is_null($issue['VerifiedBOn']) ? "" : date("M d, Y",strtotime($issue['VerifiedBOn']));?></td>
             
             <td><a href="dashboard.php?action=viewPIssue&Issue=<?php echo $issue['IssueID'];?>">View</a></td>
         </tr>
         <tr>
            <td colspan="13"><hr style="border:none;border-bottom:1px solid #ccc"></td>
         </tr>
    <?php } ?> 
    
    
    
    <tr>
        <td colspan="13" style="background:#fff;text-align:center;font-weight:bold;">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="13" style="background:orange;text-align:center;font-weight:bold;">Archived</td>
    </tr>
    
    <?php
 $style = "";
        if (isset($_POST['Projectwisebtn'])) {
          $issues = $mysql->select("select * from _tblIssues where IssueStatus<0 and ProjectID='".$_POST['ProjectID']."' order by IssueID desc");  
          $fissues = $mysql->select("select * from _tblIssues where    IssueStatus<0 and ProjectID='".$_POST['ProjectID']."' order by IssueID desc");  
          
        } else if (isset($_POST['UserWisebtn'])) {
          $issues = $mysql->select("select * from _tblIssues where IssueStatus<0 and IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
          $fissues = $mysql->select("select * from _tblIssues where   IssueStatus=1 and IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
        
        } else if (isset($_POST['ProjectUserWisebtn'])) {
          $issues = $mysql->select("select * from _tblIssues where IssueStatus<0 and ProjectID='".$_POST['ProjectID']."' and IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
          $fissues = $mysql->select("select * from _tblIssues where    IssueStatus<0 and ProjectID='".$_POST['ProjectID']."' and IssuePostedBy='".$_POST['EmployeeID']."' order by IssueID desc");  
        
        } else {
            
            $style="background:#fff";
         
                $issues = $mysql->select("select * from _tblIssues where IssueStatus<0   order by IssueID desc");
            
             
        
        }
    ?>
     <?php foreach($issues as $issue) { ?>
         <tr style="background:#<?php echo $issue['IssueStatus']<0 ? 'fff' : 'ebffdd';?>">
             <td style="text-align:right"><?php echo $issue['IssueID'];?></td>
             <td><?php echo $issue['ProjectName'];?></td>
             <td><?php echo $issue['IssuePostedByName'];?></td>
             <td><?php echo date("M d, Y H:i",strtotime($issue['IssueCreatedOn']));?></td>
             <td><?php echo $issue['IssueTitle'];?></td>
             <td style="text-align: center">Open</td>
             
             <td><?php echo $issue['DeveloperName'];?></td>
             <td><?php echo $issue['IssueStatus']>1 ? date("M d, Y",strtotime($issue['ClosedOn'])) : "";?></td>
             
             <td><?php echo $issue['VerifiedA'];?></td>
             <td><?php echo is_null($issue['VerifiedAOn']) ? "" : date("M d, Y",strtotime($issue['VerifiedAOn']));?></td>
              <td></td>
              <td></td>
             <td><a href="dashboard.php?action=viewPIssue&Issue=<?php echo $issue['IssueID'];?>">View</a></td>
         </tr>
    <?php } ?>
    
    
    
    
    
    
 
</table> 