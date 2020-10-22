<?php
$news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'");
?>
<div style="text-align:right;padding-bottom:5px;" ><a class="hlink" href="dashboard.php?action=NewsList">view all news</a></div>
<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span><?php echo $news[0]['NewsTitle'];?></span><br><br>
        <div style="font-size:10px;color:#999"><?php echo $news[0]['Published'];?></div>
    </div>
    <Br>
    <div>
    <?php echo $news[0]['NewsDetails'];?>
    </div> 
</div> 