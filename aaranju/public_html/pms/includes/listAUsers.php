<b>List Users</b><br><br>
<table style="width:100%;font-size:12px;font-family:Arial;" cellspacing="0" cellpadding="5">
    <tr style="background:#eee;font-weight:bold;">
        <td>Employee Name</td>
        <td>Email Address</td>
        <td>Password</td>
        <td>Created On</td>
        <td>IsAdmin</td>
        <td>IsTester</td>
        <td>IsDeveloper</td>
        <td></td>
    </tr>
    <?php
        $issues = $mysql->select("select * from _tblUser");
    ?>
    <?php foreach($issues as $issue) { ?>
         <tr>
             <td><?php echo $issue['EmployeeName'];?></td>
             <td><?php echo $issue['EmailAddress'];?></td>
             <td><?php echo $issue['Password'];?></td>
             <td><?php echo $issue['CreatedOn'];?></td>
             <td><?php echo $issue['IsAdmin']==1 ? "Yes" : "No";?></td>
             <td><?php echo $issue['IsTester']==1 ? "Yes" : "No";?></td>
             <td><?php echo $issue['IsDeveloper']==1 ? "Yes" : "No";?></td>
             <td></td>
         </tr>
    <?php } ?>
</table> 