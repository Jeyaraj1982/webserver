<?php 
if (isset($_GET['filter']) && $_GET['filter']=="all") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsDistributor='1' order by MemberName" );
 $title="All Distributors";
} elseif (isset($_GET['filter']) && $_GET['filter']=="active") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsDistributor='1' and IsActive='1' order by MemberName " );
 $title="Active  Distributors";
} elseif (isset($_GET['filter']) && $_GET['filter']=="deactive") {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member where IsDistributor='1' and IsActive='0' order by MemberName" );
 $title="Deactive Distributors";
} else {
 $Requests  = $mysql->select("SELECT * FROM _tbl_member  where IsDistributor='1' order by MemberName" );
 $title="All  Distributors";
}
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/List">Distributors</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/List">Manage Distributors</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Distributors/New" style="color:orange" ><small>New Distributor</small></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard.php?action=Distributors/List&filter=active" ><small>Active</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Distributors/List&filter=deactive"><small>Deactive</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Distributors/List&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Manage Distributors</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                     <th></th>
                                        <th><b>Shop Name</b></th>
                                        <th><b>No of agents</b></th>
                                        <th><b>Balance</b></th>
                                        <th><b>Sub Agent Balance</b></th>
                                        <th><b>Status</b></th>
                                         <th><b>Bill</b></th>
                                        <th><b>MAB</b></th>
                                        <th><b>IMPS</b></th>
                                       
                                    </tr>
                                </thead>                    
                                <tbody>
                                    <?php
                                    $atotal =0;
                                    $satotal = 0;
                                     foreach ($Requests as $Request){ 
                                        $mem = $mysql->select("select MemberID from _tbl_member where MapedTo='".$Request['MemberID']."'");
                                        $bal =   $application->getBalance($Request['MemberID']);
                                        $atotal+= $bal;
                                        $t = 0;
                                        foreach($mem as $m) {
                                               $t+=$application->getBalance($m['MemberID']);
                                        }
                                        $satotal+=$t;
                                        ?>
                                    <tr>
                                    <td style="text-align: right;">
                                        
                                        <div class="dropdown">
                                                <button class="btn-dropdown" data-toggle="dropdown" style="border:none;background:none">
                                                    <i class="icon-options-vertical"></i>
                                                </button>
                                                <div class="dropdown-arrow"></div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="dashboard.php?action=Distributors/Edit&Distributor=<?php echo $Request['MemberID'];?>" class="dropdown-item">Edit</a>
                                                    <a href="dashboard.php?action=Distributors/View&Point&Distributor=<?php echo $Request['MemberID'];?>" class="dropdown-item">View</a>
                                                    <a href="dashboard.php?action=Distributors/ViewUsers&Distributor=<?php echo $Request['MemberID'];?>" class="dropdown-item">View Agents</a>
                                                    <a href="dashboard.php?action=Distributors/CreditSheet&Distributor=<?php echo $Request['MemberID'];?>" class="dropdown-item">Credit List</a>
                                                    <a href="dashboard.php?action=Distributors/DebitSheet&Distributor=<?php echo $Request['MemberID'];?>" class="dropdown-item">Debit  List</a>
                                                     <a class="dropdown-item" href="dashboard.php?action=Users/AccountSumary&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">Account Summary</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Users/TransactionSummary&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">Transaction Report</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Users/TNPoliceTransaction&filter=all&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">TN Police  Transaction</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Users/ListOfContacts&d=<?php echo md5("j!j".$Request['MemberID']);?>" draggable="false">View Contacts</a>
                                                </div>
                                            </div>
                                            
                                                
                                         
                                        </td>
                                        <td>
                                            <b><?php echo $Request['MemberName'];?></b><br>
                                         <?php echo $Request['MobileNumber'];?>
                                        </td>
                                        <td style="text-align: right;"><?php echo sizeof($mem); ?></td>
                                        <td style="text-align: right"><?php echo number_format($bal,2);?></td>
                                        <td style="text-align: right"><?php echo number_format($t,2);?></td>
                                        <td style="text-align: center"><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                          <td style="text-align: center"><?php echo $Request['BillCharge']==1 ? '<i class="la flaticon-check"></i>' : '<i class="la flaticon-cross-1"></i>'; ?></td>
                                        <td style="text-align: center"><?php echo $Request['MAB_Enabled']==1 ? '<i class="la flaticon-check"></i>' : '<i class="la flaticon-cross-1"></i>'; ?></td>
                                        <td style="text-align: center"><?php echo $Request['MoneyTransfer']==1 ? '<i class="la flaticon-check"></i>' : '<i class="la flaticon-cross-1"></i>'; ?></td>
                                        
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="9" style="text-align: center;">No Datas Found</td>
                                    </tr>
                             <?php } else {  ?>  
                             <tr style="font-weight:bold;">
                                <td colspan="3"></td>
                                        <td style="text-align: right" ><?php echo number_format($atotal,2);?></td>
                                        <td style="text-align: right"><?php echo number_format($satotal,2);?></td>
                                  <td colspan="4"></td>
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
    //$(document).ready(function() {
      //  $('#basic-datatables').DataTable({});
    //});
</script> 