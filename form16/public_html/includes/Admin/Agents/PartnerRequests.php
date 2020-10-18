<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="dashboard.php?action=Agents/ViewCustomers&Status=All&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Agents/ViewCustomers&Status=Active&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="Active") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Active</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Agents/ViewCustomers&Status=Inactive&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="Inactive") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Inactive</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Agents/ViewCustomers&Status=Verified&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="Verified") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Verified</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Agents/ViewCustomers&Status=Ordered&ACode=<?php echo $_GET['ACode'];?>"><?php if($_GET['Status']=="Ordered") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Ordered</small></a>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <?php echo $title; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Requested</th>
                                            <th>PartnerName</th>
                                            <th>PartnerBusinessName</th>                                                                                           
                                            <th>Email ID</th>
                                            <th>Mobile Number</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php
                                    $sql = $mysql->select("select * from _tbl_partner_join_requests order by PartnerReqID desc");
                                      foreach($sql as $member){ ?>
                                    <?php $form = $mysql->select("SELECT COUNT(id) AS cnt FROM _tbl_form_16 where FormByID='".$member['MemberID']."'");?>
                                        <tr>
                                            <td><?php echo $member['RequestedOn'];?></td>
                                            <td><?php echo $member['PartnerName'];?></td>
                                            <td><?php echo $member['PartnerBusinessName'];?></td>
                                            <td><?php echo $member['Email'];?></td>
                                            <td><?php echo $member['MobileNumber'];?></td>
                                            <td>
                                            <!--
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=ViewMember&MCode=<?php echo $member['MemberCode'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=CreateCustomerForm16&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Create Form</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ManageForm16ByAgent&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">View Forms</a>
                                                    </div>
                                                </div>
                                                -->
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