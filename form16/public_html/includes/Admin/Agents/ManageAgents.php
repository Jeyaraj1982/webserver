<?php 
    if( $_GET['Status']=="All"){
        $sql= $mysql->select("select * from `_tbl_Agents` order by `AgentID` desc ");
        $title="All Agents";
    }
    if( $_GET['Status']=="Active"){
        $sql= $mysql->select("select * from `_tbl_Agents` where IsActive='1'  order by `AgentID` desc ");
        $title="Active Agents";
    }
    if( $_GET['Status']=="Inactive"){
        $sql= $mysql->select("select * from `_tbl_Agents` where IsActive='0'  order by `AgentID` desc ");
        $title="Inactive Agents";
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=Agents/ManageAgents&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Agents/ManageAgents&Status=Active"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Agents/ManageAgents&Status=Inactive"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Inactive</small></a>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <?php echo $title; ?>
                                <a href="dashboard.php?action=Agents/CreateAgent" style="float:right;color:#fff" class="btn btn-warning btn-sm">Create Agent</a>
                            </div>
                        </div>                    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Agent Name</th> 
                                            <th>Created</th>                                                                                          
                                            <th>Mobile Number</th>
                                            <th>Total Forms</th>
                                            <th>Completed Forms</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $staff){ ?>
                                    <?php $form = $mysql->select("SELECT COUNT(id) AS cnt FROM _tbl_form_16 where AgentID='".$staff['AgentID']."'");?>
                                    <?php $Cform = $mysql->select("SELECT COUNT(id) AS cnt FROM _tbl_form_16 where AgentID='".$staff['AgentID']."' and Completed='1'");?>
                                        <tr>
                                            <td><span class="<?php echo ($staff['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $staff['AgentName'];?></td>
                                            <td><?php echo date("d M, Y H:i",strtotime($staff['CreatedOn']));?></td>
                                            <td><?php echo $staff['MobileNumber'];?></td>
                                            <td><?php echo $form[0]['cnt'];?></td>
                                            <td><?php echo $Cform[0]['cnt'];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Agents/EditAgent&ACode=<?php echo $staff['AgentCode'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Agents/ViewAgent&ACode=<?php echo $staff['AgentCode'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Agents/SMSLog&ACode=<?php echo $staff['AgentCode'];?>" draggable="false">SMS Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Agents/EmailLog&ACode=<?php echo $staff['AgentCode'];?>" draggable="false">Email Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Agents/LoginLog&ACode=<?php echo $staff['AgentCode'];?>&Status=All" draggable="false">Login Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Agents/ViewCustomers&ACode=<?php echo $staff['AgentCode'];?>&Status=All" draggable="false">View Customers</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Agents/ManageForms&ACode=<?php echo $staff['AgentID'];?>&Status=All" draggable="false">View Forms</a>
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