<?php
$news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'");
?>
<div class="content">
    <div class="hpanel">
        <div class="panel-heading hbuilt">
           <?php echo $news[0]['NewsTitle'];?>
        </div>
        <div class="panel-body list">
            <?php echo $news[0]['Published'];?>
            <div>
                <?php echo $news[0]['NewsDetails'];?>
            </div>  
        </div>
    </div>
</div>
