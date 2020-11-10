 <?php 
    if($_GET['status']=="All"){ 
        $Agents = $mysql->select("select * from _queen_agent where IsAgent='1' order by AgentID desc");
        $title="All Agents";
    }if($_GET['status']=="Active"){
        $Agents = $mysql->select("select * from _queen_agent where IsAgent='1' and IsActive='1' order by AgentID desc");
        $title="Active Agents";
    }if($_GET['status']=="Deactive"){
        $Agents = $mysql->select("select * from _queen_agent where IsAgent='1' and IsActive='0' order by AgentID desc");
        $title="Blocked Agents";
    }
?>
<div class="main-panel">                                                                                                                                                                      
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Manage Agents
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Agent/add" class="btn btn-primary btn-xs">Add Agent</a><br>
                                    <a href="dashboard.php?action=Agent/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Agent/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Agent/list&status=Deactive" <?php if($_GET['status']=="Deactive"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Blocked</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Agent Code</th>
                                                <th scope="col">Agent Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <?php if($_GET['status']=="All"){ ?><th scope="col">Status</th><?php } ?>
												<th scope="col">Created On</th>
												<th></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                                                                   
                                        <?php foreach($Agents as $Agent){ ?>
                                       <tr>
                                                <td><?php echo $Agent['AgentCode'];?></td>
                                                <td><?php echo $Agent['AgentName'];?><br><span style="font-size: 11px;color: #55576A;"><?php echo $Agent['SurName'];?></span></td>
                                                <td><?php echo $Agent['MobileNumber'];?></td>
                                                <?php if($_GET['status']=="All"){ ?><td><?php if($Agent['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></td><?php } ?>
                                                <td><?php echo date("d M, Y, H:i",strtotime($Agent['CreatedOn']));?></td>
												<td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Agent/edit&id=<?php echo md5($Agent['AgentID']);?>" draggable="false">Edit</a>
															</div>
                                                        </div>
                                                    </td>
                                            </tr> 
                                        <?php } if(sizeof($Agents)=="0"){ ?>
                                            <tr>
												<?php if($_GET['status']=="All"){ ?>
                                                <td style="text-align: center;" colspan="6">No Agents found</td>
												<?php } else { ?>
												<td style="text-align: center;" colspan="5">No Agents found</td>
												<?php } ?>
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
