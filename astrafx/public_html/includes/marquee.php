<div style="padding:10px;background:#00081F;color:#fff">
<marquee style="color:#fff;font-size:20px" onmouseover="stop()" onmouseout="start()" scrollAmount=3 >
<?php
    $news = $mysql->select("select * from _tbl_news where IsPublish='1'");
    foreach($news as $n) {
        ?>
        <a href="<?php echo BaseUrl;?>/news.php?Nid=<?php echo $n['NewsID'];?>" style="color:white"><?php echo $n['NewsTitle']; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <?php
        
    }
?>
 
</marquee>
</div> 