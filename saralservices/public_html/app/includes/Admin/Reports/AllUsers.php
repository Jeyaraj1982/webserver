<?php 
    if( $_GET['Status']=="All"){
        $sql= $mysql->select("select * from `_tbl_Members`  where MemberID>1  order by `MemberID` desc ");
        $title="All Users";
    } elseif( $_GET['Status']=="Active"){
        $sql= $mysql->select("select * from `_tbl_Members` where  MemberID>1 and  IsActive='1' order by `MemberID` desc ");
        $title="Active Users";
    } elseif( $_GET['Status']=="Inactive"){
        $sql= $mysql->select("select * from `_tbl_Members` where  MemberID>1 and  IsActive='0' order by `MemberID` desc ");
        $title="Inactive Users";
    }  else {
        $sql= $mysql->select("select * from `_tbl_Members` where  MemberID>1   order by `MemberID` desc ");
        $title="All Users";
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=Reports/AllUsers&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Reports/AllUsers&Status=Active"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Reports/AllUsers&Status=Inactive"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Inactive</small></a>&nbsp;|&nbsp;
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
                                            <th>Name</th>                                                                                           
                                            <th>Role</th>                                                                                           
                                            <th>Mobile Number</th> 
                                           
                                            <th>Balance</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $member){ ?>
                                     
                                        <tr>
                                            <td><span class="<?php echo ($member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($member['CreatedOn']));?></td>
                                            <td><?php echo $member['MemberName'];?></td>
                                            <td><?php 
                                             if ($member['IsDealer']==1) {
                                                 echo "Dealer";
                                             } else {
                                                 echo "Member"; 
                                             }
                                             
                                             
                                             ?></td>
                                            <td><?php echo $member['MobileNumber'];?></td>
                                         
                                            <td style="text-align: right"><?php echo  number_format($app->getBalance($member['MemberID']),2);?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/Edit&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/View&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/SMSLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">SMS Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/EmailLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Email Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/LoginLog&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Login Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/Create&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Create Retailer</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/Manage&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">View Retailers</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/Transactions&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Account Summary</a>
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