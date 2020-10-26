<?php
    $data = $mysql->select("select * from _tbl_news where md5(concat('J!',NewsID))='".$_GET['d']."'");
    $viewed = $mysql->select("select * from _tbl_news_log left join _tbl_Members on _tbl_Members.MemberID=_tbl_news_log.MemberID where _tbl_news_log.NewsID='".$data[0]['NewsID']."' order by _tbl_news_log.NewsViewedID desc");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                 Manage News
                                 <br><span style="color:#888;font-size:12px"><?php echo $data[0]['CreatedOn'];?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="col-sm-12">
                                        <label style="font-weight:bold"><?php echo $data[0]['NewsTitle'];?></label>
                                        
                                    </div>
                            </div>
                             <div class="row">
                                    <div class="col-sm-12">
                                       <label>&nbsp;</label> 
                                       <div>
                                             <?php echo $data[0]['NewsDescription'];?>
                                       </div>
                                    </div>
                            </div>
                             
                            <div class="row">
                                    <div class="col-sm-12">
                                       <label>Status</label> 
                                       <div id="summernote">
                                             <?php echo $data[0]['IsPublish']==1 ? "Published":"Unpublish";?>
                                       </div>
                                    </div>
                            </div>  
                             <div class="row">
                                    <div class="col-sm-12">
                                    <br><Br>
                                       <a href="dashboard.php?action=News/Edit&d=<?php echo $_GET['d'];?>">Edit</a>
                                    </div>
                            </div> 
                        </div>
                    </div>                                                                                             
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Viewer's History
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Viewed On</th> 
                                            <th>User Name</th>
                                            <th>Role</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($viewed as $member){ ?>
                                 
                                        <tr>
                                            <td><?php echo $member['ViewedOn'];?></td>
                                            <td><?php echo $member['MemberName'];?></td>
                                            <td><?php echo $member['IsMember']=="1" ? "Retailer" : "Dealer";?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    
    </script>
