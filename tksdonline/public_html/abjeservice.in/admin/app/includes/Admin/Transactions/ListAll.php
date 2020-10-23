<?php 
 
 $Requests  = $mysql->select("SELECT * FROM _tbl_member " );
 $title="All  ";

  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/List">Agents</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/List">Manage Agents</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Users/New" style="color:orange" ><small>New Users</small></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard.php?action=Users/List&filter=active" ><small>Active</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Users/List&filter=deactive"><small>Deactive</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Users/List&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Manage Agents</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Shop Name</b></th>
                                        <th><b>Mobile Number</b></th>
                                        <th><b>Distributor</b></th>
                                        <th><b>Balance</b></th>
                                        <th><b>Status</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $balance = 0;
                                     foreach ($Requests as $Request){
                                    
                                     ?>
                                    <tr>
                                        <td><?php echo $Request['MemberName'];?><br>
                                        <!--    <a href="dashboard.php?action=Users/Edit&User=<?php echo $Request['MemberID'];?>">Edit</a>&nbsp;|&nbsp;
                                            <a href="dashboard.php?action=Users/View&Point&User=<?php echo $Request['MemberID'];?>">View</a>&nbsp;|&nbsp;
                                            Bill Charge: <?php echo $Request['BillCharge']==1 ? '<i class="la flaticon-check"></i>' : '<i class="la flaticon-cross-1"></i>'; ?> -->
                                        </td>
                                        <td style="text-align: center"><?php echo $Request['MobileNumber'];?></td>
                                        <td style="text-align: left"><?php echo $Request['MapedToName'];?></td>
                                       <td style="text-align: right"><?php 
                                       $n = $application->getBalance($Request['MemberID']);
                                       
                                       
                                       $balance +=  $n;
                                       echo  number_format($n,2);?></td>
                                        <td style="text-align: center"><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: right;font-weight:bold"><?php echo  number_format($balance,2);?></td>
                                        <td></td>
                                    </tr>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No Datas Found</td>
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
</div>
  