<h2>Alumni Users</h2>
 <div style="text-align: right;padding:5px;padding-bottom:10px">
    <a href="export.php" target="_blank" style="color:green;font-weight:bold;text-decoration: none;"><img src="icon_excel.gif" align="absmiddle">&nbsp;Export Data</a> 
 </div>
 <table style="width:100%;border:1px solid #ccc;" cellpadding="5" cellspacing="0">
    <tr style="font-size:13px;font-weight:Bold;background:#f1f1f1">
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Student Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Completed Year</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Branch Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Email ID</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Phone Number</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">DateTime</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">&nbsp;</td>
    </tr>
    <?php
    $i=0;
        $alumnidetails = $mysql->select("select * from alumini order by id desc");
        foreach($alumnidetails as $a) {
            $i++;
            ?>
               <tr style="background: <?php echo ($i%2==0) ? '#f1f1f1' : '#fff';?>">
        <td style="border-right:1px solid #ccc;"><?php echo $a['studentname'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['yearofcompletion'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['branchname'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['emailid'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['phonenumber'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['postedon'];?></td>
        <td style="border-right:1px solid #ccc;"><a href="dashboard.php?action=alumnidetails&id=<?php echo $a['id'];?>">View</a></td>
    </tr> 
            <?php
        }
    ?>
 </table>