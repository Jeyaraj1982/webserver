<h2>News</h2>
<?php
     
 ?> 
 <table style="width:100%;border:1px solid #ccc;" cellpadding="5" cellspacing="0">
    <tr style="font-size:13px;font-weight:Bold;background:#f1f1f1">
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;width:130px;">Created On</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Title</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;width:100px">&nbsp;</td>
    </tr>
    <?php
    $i=0;
        $alumnidetails = $mysql->select("select * from news order by newsid desc");
        foreach($alumnidetails as $a) {
            $i++;
            ?>
    <tr style="background: <?php echo ($i%2==0) ? '#f1f1f1' : '#fff';?>">
        <td style="border-right:1px solid #ccc;"><?php echo $a['postedon'];?></td>
        <td style="border-right:1px solid #ccc;"><?php echo $a['newstitle'];?></td>
        <td style="border-right:1px solid #ccc;"><a href="dashboard.php?action=newsdetails&id=<?php echo $a['newsid'];?>">View</a></td>
    </tr> 
            <?php
        }
    ?>
 </table> 