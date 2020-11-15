<h2>Contacts</h2>
<?php
     
 ?> 
 <table style="width:100%;border:1px solid #ccc;" cellpadding="5" cellspacing="0">
    <tr style="font-size:13px;font-weight:Bold;background:#f1f1f1">
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Name</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Email</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Subject</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">RequestedOn</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">&nbsp;</td>
    </tr>
    <?php
    $i=0;
        $alumnidetails = $mysql->select("select * from contacts order by id desc");
        foreach($alumnidetails as $a) {
            $i++;
            ?>
               <tr style="background: <?php echo ($i%2==0) ? '#f1f1f1' : '#fff';?>">
        <td style="border-right:1px solid #ccc;"><?php echo $a['contactname'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['emailid'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['subject'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['postedon'];?></td>
        <td style="border-right:1px solid #ccc;"><a href="dashboard.php?action=contactdetails&id=<?php echo $a['id'];?>">View</a></td>
    </tr> 
            <?php
        }
    ?>
 </table> 