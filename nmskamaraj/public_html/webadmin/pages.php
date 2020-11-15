<h2>News</h2>
<?php
     
 ?> 
 <table style="width:100%;border:1px solid #ccc;" cellpadding="5" cellspacing="0">
    <tr style="font-size:13px;font-weight:Bold;background:#f1f1f1">
   
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">Title</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;width:60px;">&nbsp;</td>
    </tr>
    <?php
    $i=0;
        $alumnidetails = $mysql->select("select * from pages order by pageid");
        foreach($alumnidetails as $a) {
            $i++;
            ?>
    <tr style="background: <?php echo ($i%2==0) ? '#f1f1f1' : '#fff';?>">
        <td style="border-right:1px solid #ccc;"><?php echo $a['pageref'];?></td>
        <td style="border-right:1px solid #ccc;text-align: center"><a href="dashboard.php?action=pagedetails&id=<?php echo $a['pageref'];?>">Edit</a></td>
    </tr> 
            <?php
        }
    ?>
 </table> 