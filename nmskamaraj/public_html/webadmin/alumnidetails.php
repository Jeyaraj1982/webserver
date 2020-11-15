<h2>Alumni User Details</h2>
<?php $alumnidetails = $mysql->select("select * from alumini where id=".$_REQUEST['id']); ?>
<br>
 <table style="width:100%;border:1px solid #ccc;border-bottom:none" cellpadding="5" cellspacing="0">
    <tr>
        <td style="width:120px;border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Student Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['studentname'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Completed Year</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['yearofcompletion'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Branch Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['branchname'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Email ID</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['emailid'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Phone Number</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['phonenumber'];?></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Address</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $alumnidetails[0]['address'];?></td>
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
<a href="dashboard.php?action=alumni">Back</a>