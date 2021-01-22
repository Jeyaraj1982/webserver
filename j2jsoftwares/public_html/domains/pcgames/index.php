<?php 
    include_once("header.php");
?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php 
                                $sql = $mysql->select("Select * from _tbl_game_details order by GameID DESC");
                                foreach($sql as $game){
                            ?>
                            <div class="col-sm-3" style="height:260px;margin-bottom:10px;text-align:center">
                                <img src="uploads/GameImage/<?php echo $game['GameImage'];?>" style="width:150px;height:200px;border-radius:5px;border:1px solid #666"><br>
                                <div style="padding-top:10px;color:#333;font-size:12px;"><?php echo $game['GameName'];?></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>