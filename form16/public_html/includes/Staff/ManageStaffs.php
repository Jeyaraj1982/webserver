<?php 
    if( $_GET['Status']=="All"){
        $sql= $mysql->select("select * from `_tbl_Admin` where `IsAdmin`='0' order by `AdminID` desc ");
        $title="All Staffs";
    }
    if( $_GET['Status']=="Active"){
        $sql= $mysql->select("select * from `_tbl_Admin` where IsActive='1' and `IsAdmin`='0' order by `AdminID` desc ");
        $title="Active Staffs";
    }
    if( $_GET['Status']=="Inactive"){
        $sql= $mysql->select("select * from `_tbl_Admin` where IsActive='0' and `IsAdmin`='0' order by `AdminID` desc ");
        $title="Inactive Staffs";
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><a href="dashboard.php?action=CreateStaff" class="btn btn-warning">Add</a></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=ManageStaffs&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=ManageStaffs&Status=Active"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=ManageStaffs&Status=Inactive"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Inactive</small></a>&nbsp;|&nbsp;
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <?php echo $title; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Created</th>
                                            <th>Staff Name</th>                                                                                           
                                            <th>Mobile Number</th>
                                            <th>Email ID</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $staff){ ?>
                                        <tr>
                                            <td><span class="<?php echo ($staff['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($staff['CreatedOn']));?></td>
                                            <td><?php echo $staff['AdminName'];?></td>
                                            <td><?php echo $staff['MobileNumber'];?></td>
                                            <td><?php echo $staff['EmailID'];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=EditStaff&ACode=<?php echo $staff['AdminCode'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ViewStaff&ACode=<?php echo $staff['AdminCode'];?>" draggable="false">View</a>
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