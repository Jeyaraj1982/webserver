<?php 
if (isset($_GET['filter']) && $_GET['filter']=="all") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsAPI='1'" );
 $title="All Agents";
} elseif (isset($_GET['filter']) && $_GET['filter']=="active") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsAPI='1' and IsActive='1' " );
 $title="Active  Agents";
} elseif (isset($_GET['filter']) && $_GET['filter']=="deactive") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsAPI='1' and IsActive='0'" );
 $title="Deactive Agents";
} else {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsAPI='1'" );
 $title="All  Agents";
}
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/List">Agents</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/List">Manage API Agents</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=ApiUsers/New" style="color:orange" ><small>New Users</small></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard.php?action=ApiUsers/List&filter=active" ><small>Active</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=ApiUsers/List&filter=deactive"><small>Deactive</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=ApiUsers/List&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Manage Api Agents</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Shop Name</b></th>
                                        <th><b>Mobile Number</b></th>
                                        <th><b>Balance</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Bill</b></th>
                                        <th><b>MAB</b></th>
                                        <th><b>IMPS</b></th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['MemberName'];?></td>
                                        <td style="text-align: center"><?php echo $Request['MobileNumber'];?></td>
                                       <td style="text-align: right"><?php echo number_format($application->getBalance($Request['MemberID']),2);?></td>
                                        <td style="text-align: center"><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                        <td style="text-align: center"><?php echo $Request['BillCharge']==1 ? '<i class="la flaticon-check"></i>' : '<i class="la flaticon-cross-1"></i>'; ?></td>
                                        <td style="text-align: center"><?php echo $Request['MAB_Enabled']==1 ? '<i class="la flaticon-check"></i>' : '<i class="la flaticon-cross-1"></i>'; ?></td>
                                        <td style="text-align: center"><?php echo $Request['MoneyTransfer']==1 ? '<i class="la flaticon-check"></i>' : '<i class="la flaticon-cross-1"></i>'; ?></td>
                                         <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=ApiUsers/View&Point&User=<?php echo $Request['MemberID'];?>">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ApiUsers/Edit&User=<?php echo $Request['MemberID'];?>">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ApiUsers/AccountSumary&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">Account Summary</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ApiUsers/TransactionSummary&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">Transaction Report</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ApiUsers/TNPoliceTransaction&filter=all&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">TN Police  Transaction</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ApiUsers/MoveTo&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">Move To</a>
                                                    </div>
                                                </div>
                                            </td>                                                                                                            
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="8" style="text-align: center;">No Datas Found</td>
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 