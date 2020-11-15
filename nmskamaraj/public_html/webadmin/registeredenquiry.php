<h2>Registered Enquiry</h2>
 
 <table style="width:100%;border:1px solid #ccc;" cellpadding="5" cellspacing="0">
    <tr style="font-size:13px;font-weight:Bold;background:#f1f1f1">
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Registered Date</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Applicant Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Mobile Number</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">&nbsp;</td>
    </tr>
    <?php
    $i=0;
        $alumnidetails = $mysql->select("select * from register order by RegID desc");
        foreach($alumnidetails as $a) {
            $i++;
            ?>
               <tr style="background: <?php echo ($i%2==0) ? '#f1f1f1' : '#fff';?>">
         <td style="border-right:1px solid #ccc;"><?php echo $a['CreatedOn'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['ApplicantName'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['ApplicantMobile'];?></td>
        <td style="border-right:1px solid #ccc;"><a href="dashboard.php?action=regenquirydetails&id=<?php echo $a['RegID'];?>">View</a></td>
    </tr> 
            <?php
        }
    ?>
 </table>