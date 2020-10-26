
    <div class="main-panel">
        <div class="container" style="margin-top:0px !important">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12" style="padding: 5px;">
                        <div class="card" style="background: none;">
                            <div class="card-header">
                                <div class="row" style="margin-left:-36px">
                                    <div class="col-3"><button type="button" class="btn btn-black btn-sm" onclick="location.href='dashboard.php';" style="background:#6c757d !important;">Back</button></div>
                                    <div class="col-9"><div class="card-title" style="text-align: center;">News</div></div>
                                </div>
                            </div>
                            <div class="card-body" style="padding:0px">
                            <?php
                                 $nsql= $mysql->select("select * from `_tbl_news` where (NewsFor='Retailers' or NewsFor='All') and IsPublish='1' and NewsID not in (select NewsID from _tbl_news_log where MemberID='".$_SESSION['User']['MemberID']."')  order by `NewsID` desc ");
                                 foreach($nsql as $n) {
                             ?>
                                <div class="row" onclick="location.href='dashboard.php?action=view_news&nid=<?php echo $n['NewsID'];?>';"> 
                                    <div class="col-md-12" style="background: #f4f3f3;border-radius: 10px !important;">
                                        <div style="padding:10px">
                                            <div style="font-size:12px;font-weight:bold;color:#222"><?php echo strip_tags($n['NewsTitle']);?> </div>
                                            <div style="font-size:12px;color: #555;font-weight: normal;"><?php echo strip_tags($n['NewsDescription']);?></div>
                                            <span style="font-size:10px;color:#aaa5a5"><?php echo date("M d, Y",strtotime($n['CreatedOn'])); ?></span>
                                        </div> 
                                    </div> 
                                </div> <br>
                             <?php } ?>
                        </div>  
                    </div>   
                </div>
            </div>
        </div>
    </div>
