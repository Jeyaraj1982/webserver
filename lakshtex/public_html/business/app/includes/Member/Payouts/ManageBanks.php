<?php
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."'");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Requests">Payouts</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/ManageBanks">Manage Bank Accounts</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Bank Accounts</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Bank Name</th>
                                    <th>IFS Code</th>
                                    <th>Saved</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="5" style="text-align:center;">No records found</td>
                                </tr>
                                <?php } ?>
                                <?php foreach($records as $r) {?>
                                <tr>
                                    <td><?php echo $r['AccountName'];?></td>
                                    <td><?php echo $r['AccountNumber'];?></td>
                                    <td><?php echo $r['BankName'];?></td>
                                    <td><?php echo $r['IFSCode'];?></td>
                                    <td><?php echo $r['CreatedOn'];?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="dashboard.php?action=Payouts/AddBank">back</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 