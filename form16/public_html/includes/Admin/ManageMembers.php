<?php 
    if( $_GET['Status']=="All"){
        $sql= $mysql->select("select * from `_tbl_Members` order by `MemberID` desc ");
        $title="All Members";
    }
    if( $_GET['Status']=="Active"){
        $sql= $mysql->select("select * from `_tbl_Members` where IsActive='1' order by `MemberID` desc ");
        $title="Active Members";
    }
    if( $_GET['Status']=="Inactive"){
        $sql= $mysql->select("select * from `_tbl_Members` where IsActive='0' order by `MemberID` desc ");
        $title="Inactive Members";
    }
    if( $_GET['Status']=="Verified"){
        $sql= $mysql->select("select * from `_tbl_Members` where IsMobileNumberVerified='1' order by `MemberID` desc ");
        $title="Verified Members";
    }
    if( $_GET['Status']=="Ordered"){
        $sql= $mysql->select("SELECT * FROM _tbl_Members WHERE memberid IN (SELECT FormByID FROM _tbl_form_16 GROUP BY FormByID) order by `MemberID` desc ");
        $title="Ordered Members";
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=ManageMembers&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=ManageMembers&Status=Active"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=ManageMembers&Status=Inactive"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Inactive</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=ManageMembers&Status=Verified"><?php if($_GET['Status']=="Verified") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Verified</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=ManageMembers&Status=Ordered"><?php if($_GET['Status']=="Ordered") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Ordered</small></a>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <?php echo $title; ?>
                                <a href="dashboard.php?action=CreateMemberFrAdmin" style="float:right;color:#fff" class="btn btn-warning btn-sm">Create Member</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Created</th>
                                            <th>Member Name</th>                                                                                           
                                            <th>Mobile Number</th> 
                                            <th>Created By</th> 
                                            <th>No of Forms</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $member){ ?>
                                    <?php $form = $mysql->select("SELECT COUNT(id) AS cnt FROM _tbl_form_16 where FormByID='".$member['MemberID']."'");?>
                                        <tr>
                                            <td><span class="<?php echo ($member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($member['CreatedOn']));?></td>
                                            <td><?php echo $member['MemberName'];?></td>
                                            <td><?php echo $member['MobileNumber'];?><?php if($member['IsMobileNumberVerified']==1){ ?> <img src="../assets/icon_verified.png"><?php } else {?> <img class="imageGrey" src="../assets/icon_verified.png"><?php } ?></td>
                                            <td><?php if($member['IsCustomer']==0){
                                                      echo "Member";
                                                      }if($member['IsCustomer']==1){
                                                      echo "Agent";
                                                      }
                                                      if($member['IsCustomer']==2){
                                                         echo "Staff";
                                                      }
                                                      if($member['IsCustomer']==3){
                                                         echo "Admin";
                                                      }  ?></td>                                                          
                                            
                                                                                                 
                                            <td style="text-align: right"><?php echo $form[0]['cnt'];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=EditMember&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ViewMember&MCode=<?php echo $member['MemberCode'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=CreateMemberForm16&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Create Form</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ManageForm16ByMember&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">View Forms</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberSMSLog&MCode=<?php echo $member['MemberCode'];?>" draggable="false">SMS Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberEmailLog&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Email Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberLoginLog&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Login Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberOrders&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Orders</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberInvoices&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Invoices</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberPayments&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Payments</a>
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