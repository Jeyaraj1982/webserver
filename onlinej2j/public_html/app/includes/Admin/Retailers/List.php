<?php 
    
    if( $_GET['Status']=="All"){
        $sql= $mysql->select("select * from `_tbl_Members` where `IsMember`='1' order by `MemberID` desc ");
        $title="All Retailers";
    } elseif( $_GET['Status']=="Active"){
        $sql= $mysql->select("select * from `_tbl_Members` where `IsMember`='1'  and   IsActive='1' order by `MemberID` desc ");
        $title="Active Retailers";
    } elseif( $_GET['Status']=="Inactive"){
        $sql= $mysql->select("select * from `_tbl_Members` where `IsMember`='1'  and   IsActive='0' order by `MemberID` desc ");
        $title="Inactive Retailers";
    } else {
        $sql= $mysql->select("select * from `_tbl_Members` where `IsMember`='1' order by `MemberID` desc ");
        $title="All Retailers";
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=Retailers/List&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Retailers/List&Status=Active"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Retailers/List&Status=Inactive"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Inactive</small></a>&nbsp;|&nbsp;
                </div> 
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
                                            <th>Created</th>
                                            <th>Retailer Name</th>                                                                                           
                                            <th>Mobile Number</th> 
                                            <th>Balance</th> 
                                            <th>Dealer Name</th>                                                                                           
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $member){ ?>
                                    <?php $form = $mysql->select("SELECT * FROM _tbl_Members where MapedTo='".$member['MemberID']."'");?>
                                        <tr>
                                            <td><span class="<?php echo ($member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($member['CreatedOn']));?></td>
                                            <td><?php echo $member['MemberName'];?></td>
                                            <td><?php echo $member['MobileNumber'];?></td>
                                            <td style="text-align: right"><?php echo number_format($app->getBalance($member['MemberID']),2);?></td>
                                            <td><?php echo $member['MapedToName'];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="height: 250px;overflow: auto;">
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/View&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/Edit&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/Transactions&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Account Summary</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/IMPSLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Money Transfer</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/TNEB&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">TNEB Transactions</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/Contacts&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Retailer's Contats</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/MoveTo&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Move To</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/SMSLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">SMS Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/EmailLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Email Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/LoginLog&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Login Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/IFSCLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">IFSC Fetch Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/TNEBLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">TNEB Fetch Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/MobOperatorLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Mobile Operator Fetch Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/MobOfferLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Mobile Offer Fetch Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/MobROfferLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Mobile R-Offer Fetch Log</a>
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