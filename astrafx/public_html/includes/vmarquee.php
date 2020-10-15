<h3>Latest News</h3>
<marquee style="font-size:20px;height:350px" direction="up" scrollAmount="3" onmouseover="stop()" onmouseout="start()" >
<?php
    $news = $mysql->select("select * from _tbl_news where IsPublish='1'");
    foreach($news as $n) {
        ?>
        <a href="<?php echo BaseUrl;?>/news.php?Nid=<?php echo $n['NewsID'];?>" style="color:#333"><?php echo $n['NewsTitle']; ?></a><Br>
        <div style="font-size:12px;color:#555">
            <?php echo $n['NewsDescription'];?>
        </div>
        <hr>
        <?php
        
    }
?>
 
</marquee>
 