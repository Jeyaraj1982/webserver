 <?php 
    if($_GET['status']=="All"){ 
        $Services = $mysql->select("select * from _queen_services order by ServiceID desc");
        $title="All Services";
    }if($_GET['status']=="Active"){
        $Services = $mysql->select("select * from _queen_services where IsActive='1' order by ServiceID desc");
        $title="Active Services";
    }if($_GET['status']=="Deactive"){
        $Services = $mysql->select("select * from _queen_services where IsActive='0' order by ServiceID desc");
        $title="Blocked Services";
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
                                        Manage Services
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Services/add" class="btn btn-primary btn-xs">Add Service</a><br>
                                    <a href="dashboard.php?action=Services/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Services/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Services/list&status=Deactive" <?php if($_GET['status']=="Deactive"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Blocked</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Service Code</th>
                                                <th scope="col">Service Name</th>
                                                <th scope="col" style="text-align:right">Fees (<i class="fas fa-rupee-sign"></i>)</th>
                                                <th scope="col" style="text-align:right">Charges (<i class="fas fa-rupee-sign"></i>)</th>
												<?php if($_GET['status']=="All"){ ?><th scope="col">Status</th><?php } ?>
                                                <th scope="col"></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Services as $Service){ ?>
                                       <tr>
                                                <td><?php echo $Service['ServiceCode'];?></td>
                                                <td><?php echo $Service['ServiceName'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Service['FeeAmount'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Service['ServiceCharge'],2);?></td>
												<?php if($_GET['status']=="All"){ ?><td><?php if($Service['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></td><?php } ?>
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Services/edit&id=<?php echo md5($Service['ServiceID']);?>" draggable="false">Edit</a>
															</div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($Services)=="0"){ ?>
                                            <tr>
												<?php if($_GET['status']=="All"){ ?>
                                                <td style="text-align: center;" colspan="6">No Services found</td>
												<?php } else { ?>
												<td style="text-align: center;" colspan="5">No Services found</td>
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
