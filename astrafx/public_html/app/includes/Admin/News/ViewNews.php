<?php
    $data = $mysql->select("select * from `_tbl_news` where `NewsID`='".$_GET['Nid']."'");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/ViewNews">News</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/ViewNews">View News</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">News Information</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">News Title</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['NewsTitle'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Description</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['NewsDescription'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Created</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CreatedOn'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">IsPublish</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['IsPublish']==1 ? "Yes " : " No"; ?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </form>
                
                </div>
                
            </div>
        </div>
       
    </div>
    <div style="text-align: right;">
            <a href="dashboard.php?action=News/EditNews&Nid=<?php echo $data[0]['NewsID'];?>">Edit News</a>
        </div>
</div>
 