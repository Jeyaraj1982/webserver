<?php $news = $mysql->select("select * from _tbl_noticeboard order by NewsID Desc");?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Notice Board
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach($news as $n) {?>
                            <div class="card-body">
                                <div class="form-group row">
                                   <div class="col-sm-9">
                                        <h5 class="card-title"><?php echo $n['NewsTitle'];?></h5>
                                        <?php echo strip_tags(str_replace("</pre>","",str_replace('<pre class="tw-data-text tw-text-large tw-ta" data-placeholder="Translation" id="tw-target-text" style="text-align:left" dir="ltr">',"",$n['NewsText'])));?>
                                   </div>
                                   <div class="col-sm-3" style="background:#f1f1f1;">
                                        <a href="NewsEdit.php?News=<?php echo $n['NewsID'];?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
                                        <a href="NewsView.php?News=<?php echo $n['NewsID'];?>">View</a> <br><br>
                                        <b>Created</b><br>
                                        <?php echo $n['CreatedOn'];?><br><br>
                                        <b>Is Published</b><br>
                                        <?php echo ($n['IsPublish']==1) ? "Yes" : "No";?>
                                   </div>
                                </div>
                            </div>
                            <hr style="border-bottom:2px solid #e5e5e5">
                        <?php } ?>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 

