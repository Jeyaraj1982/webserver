<?php
$data= $mysql->Select("select * from _queen_agent where MD5(AgentID)='".$_GET['id']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Agent Details</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Agent Code</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AgentCode'];?></div> 
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Agent Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AgentName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Sur Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['SurName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Mobile Number</label>
                                            <div class="col-sm-9"><?php echo $data[0]['MobileNumber'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Alternative Mobile No</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AlternativeMobileNumber'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Description</label>
                                            <div class="col-sm-9"><?php echo $data[0]['Description'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Is Active</label>
                                            <div class="col-sm-9"><?php if($data[0]['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></div> 
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Created On</label>
                                            <div class="col-sm-9"><?php echo date("d M Y, H:i", strtotime($data[0]['CreatedOn']));?></div> 
                                        </div>  
                                    </div>
                               </div> 
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <a href="dashboard.php?action=Agent/list&status=All" class="btn btn-warning btn-border">Back</a>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                     Completed Orders
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                <table class="table table-striped mt-3">
									 <thead>
                                            <tr>
                                                <th>Order On</th>
                                                <th style="text-align:right">Order Value</th>
												<th>Created</th>
												<th style="text-align:right">We Have</th>
                                                <th style="text-align:right">Payable</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
											$Orders = $mysql->select("SELECT * FROM _queen_orders where AgentID='".$data[0]['AgentID']."' order by OrderID desc");
											foreach($Orders as $Order){
											$OrderDate = date("d M, Y, H:i", strtotime($Order["OrderOn"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $OrderDate;?></td>
												<td style="text-align:right"><?php echo number_format($Order["OrderTotal"],2);?></td>
                                                <td><?php echo $Order["StaffName"];?></td>
                                                <td style="text-align:right">
                                                    <?php if(getTotalBalanceWallet($Order['AgentID'])>0){
                                                                echo number_format(getTotalBalanceWallet($Order['AgentID']),2);
                                                    }else{
                                                        echo "0.00";
                                                    }
                                                    ?> 
                                                </td>
                                                <td style="text-align:right">
                                                    <?php if(getTotalBalanceWallet($Order['AgentID'])<0){
                                                                $payable = (getTotalBalanceWallet($Order['AgentID']) * (-1)); 
                                                                echo number_format($payable,2);
                                                    }else{
                                                        echo "0.00";
                                                    }
                                                    ?> 
                                                </td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Orders/edit&id=<?php echo md5($Order["OrderID"]);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Orders/view&id=<?php echo md5($Order["OrderID"]);?>" draggable="false">View</a>
                                                            <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Order["OrderID"];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Orders)=="0"){ ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Orders Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                     Saved Orders
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Order On</th>
                                                <th style="text-align:right">Order Value</th>
												<th>Created</th>
												<th style="text-align:right">We Have</th>
                                                <th style="text-align:right">Payable</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php 
										$Orders = $mysql->select("SELECT * FROM _queen_temp_orders where AgentID='".$data[0]['AgentID']."' order by OrderID desc");
										foreach($Orders as $Order){
                                        $OrderDate = date("d M, Y, H:i", strtotime($Order["OrderOn"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $OrderDate;?></td>
												<td style="text-align:right"><?php echo number_format($Order["OrderTotal"],2);?></td>
                                                <td><?php echo $Order["StaffName"];?></td>
                                                <td style="text-align:right">
                                                    <?php if(getTotalBalanceWallet($Order['AgentID'])>0){
                                                                echo number_format(getTotalBalanceWallet($Order['AgentID']),2);
                                                    }else{
                                                        echo "0.00";
                                                    }
                                                    ?> 
                                                </td>
                                                <td style="text-align:right">
                                                    <?php if(getTotalBalanceWallet($Order['AgentID'])<0){
                                                                $payable = (getTotalBalanceWallet($Order['AgentID']) * (-1)); 
                                                                echo number_format($payable,2);
                                                    }else{
                                                        echo "0.00";
                                                    }
                                                    ?> 
                                                </td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Orders/editsavedOrders&id=<?php echo md5($Order["OrderID"]);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Orders/viewsavedOrders&id=<?php echo md5($Order["OrderID"]);?>" draggable="false">View</a>
                                                            <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Order["OrderID"];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Orders)=="0"){ ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Orders Found</td>
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
 