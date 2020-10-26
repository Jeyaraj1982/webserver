  <?php
    $nsql= $mysql->select("select * from `_tbl_news` where (NewsFor='Retailers' or NewsFor='All') and IsPublish='1' and NewsID not in (select NewsID from _tbl_news_log where MemberID='".$_SESSION['User']['MemberID']."') and NewsID='".$_GET['nid']."' ");
?>
    <div class="main-panel">
        <div class="container" style="margin-top:0px !important">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12" style="padding: 5px;">
                        <div class="card" style="background: none;">
                            <div class="card-body" style="padding:0px">
                                <div class="row" style="margin-bottom:5px;background: #f4f3f3;">
                                    <div class="col-md-12"> 
                                        <div style="padding:10px">
                                            <div class="card-title" style="margin-bottom:-7px "><?php echo strip_tags($nsql[0]['NewsTitle']);?></div>
                                            <span style="font-size:10px;color:#5e5c5c;"><?php echo date("M d, Y",strtotime($n['CreatedOn'])); ?><br></span>
                                            <label style="text-transform:none ;"><?php echo strip_tags($nsql[0]['NewsDescription']);?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="button" class="btn btn-black btn-sm" onclick="location.href='dashboard.php?action=manage_news';" style="background:#6c757d !important;">Back</button>
                                    </div>                                        
                                </div>       
                            </div>
                        </div>  
                    </div>   
                </div>
            </div>
        </div>
    </div>
