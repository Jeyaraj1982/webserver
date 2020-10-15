<?php
    $News =$mysql->select("select * from `_tbl_news`");
    $title = "All Latest News";
    $error = "No news found";
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/ManageNews">News</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=News/ManageNews">Manage News</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage News</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><label>News Title</label></th>
                                    <th><label>News On</label></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($News)==0) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($News as $n){ ?>
                                <tr>
                                    <td><?php  echo $n['NewsTitle'];?></td>
                                    <td><?php  echo $n['CreatedOn'];?></td>
                                    <td style="text-align:right;">
                                        <a href="dashboard.php?action=News/ViewNews&Nid=<?php echo $n['NewsID'];?>">View News</a>
                                    </td>
                                </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 