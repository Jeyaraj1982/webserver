<h2>Contact Details</h2>
<?php $alumnidetails = $mysql->select("select * from contacts where id=".$_REQUEST['id']); ?>
<br>
 <table style="width:100%;border:1px solid #ccc;border-bottom:none" cellpadding="5" cellspacing="0">
    <tr>
        <td style="width:120px;border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['contactname'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Email ID</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['emailid'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Subject</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['subject'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Comments</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['comments'];?></td>
    </tr>  
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Joined On</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['postedon'];?></td>
    </tr>   
</table>
<br><Br>
<a href="dashboard.php?action=contacts">Back</a>