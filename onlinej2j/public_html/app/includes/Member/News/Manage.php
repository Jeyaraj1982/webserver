<?php 
    if( $_GET['Status']=="All"){
       // $sql= $mysql->select("select * from `_tbl_Members` where `IsDealer`='1' order by `MemberID` desc ");
        //$title="All Dealers";
    } elseif( $_GET['Status']=="Active"){
        //$sql= $mysql->select("select * from `_tbl_Members` where `IsDealer`='1' and IsActive='1' order by `MemberID` desc ");
        //$title="Active Dealers";
    } elseif( $_GET['Status']=="Inactive"){
       // $sql= $mysql->select("select * from `_tbl_Members` where `IsDealer`='1' and IsActive='0' order by `MemberID` desc ");
        //$title="Inactive Dealers";
    } else {
         $sql= $mysql->select("select * from `_tbl_news` where (NewsFor='Retailers' or NewsFor='All') and IsPublish='1' and `NewsFor`='Retailers' order by NewsID desc");
          $title="All News ";
    }
?>                               
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
                <!--<div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=Dealers/Manage&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Dealers/Manage&Status=Active"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Dealers/Manage&Status=Inactive"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Inactive</small></a>&nbsp;|&nbsp;
                </div> 
                -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <?php echo $title; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Published</th>
                                            <th>News Title</th>                                                                                           
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $member){ ?>
                                 
                                        <tr>
                                            <td><span class="<?php echo ($member['IsPublish']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($member['CreatedOn']));?></td>
                                            <td><?php echo $member['NewsTitle'];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=News/View&d=<?php echo md5("J!".$member['NewsID']);?>" draggable="false">View News</a>
                                                    </div>
                                                </div>
                                            </td>
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
