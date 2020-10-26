<?php 
    if( $_GET['Status']=="All"){
        $sql= $mysql->select("select * from `_tbl_settings_mobilesms` order by `ApiID` desc ");
    }
    if( $_GET['Status']=="Active"){
        $sql= $mysql->select("select * from `_tbl_settings_mobilesms` where IsActive='1' order by `ApiID` desc ");
    }
    if( $_GET['Status']=="Deactive"){
        $sql= $mysql->select("select * from `_tbl_settings_mobilesms` where IsActive='0' order by `ApiID` desc ");
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title">Settings</h4></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=SMS/ManageMobileSMS&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=SMS/ManageMobileSMS&Status=Active"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=SMS/ManageMobileSMS&Status=Deactive"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Deactive</small></a>&nbsp;|&nbsp;
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                               Manage Mobile Api
                               <a href="dashboard.php?action=SMS/CreateSMSApi" style="float:right;color:#fff" class="btn btn-warning btn-sm">Create Api</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Api Code</th>
                                            <th>Api Name</th>
                                            <th>Api Url</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $api){ ?>
                                        <tr>
                                            <td><span class="<?php echo ($api['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $api['ApiCode'];?></td>
                                            <td><?php echo $api['ApiName'];?></td>
                                            <td><?php echo $api['ApiUrl'];?></td>
                                            <td><?php echo date("d M, Y H:i",strtotime($api['CreatedOn']));?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=SMS/EditSMSApi&Code=<?php echo $api['ApiCode'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=SMS/ViewSMSApi&Code=<?php echo $api['ApiCode'];?>" draggable="false">View</a>
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
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 1, "desc" ]]});});</script>