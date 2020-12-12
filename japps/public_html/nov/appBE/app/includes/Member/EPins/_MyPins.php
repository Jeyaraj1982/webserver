<?php
if (isset($_GET['filter']) && $_GET['filter']=="all") {
    $records=$mysql->select("SELECT * FROM _tblEpins where CreatedByID='".$_SESSION['User']['MemberID']."' or OwnToID='".$_SESSION['User']['MemberID']."'  ");
    $title = "All Epins";
    $error = "No EPins found";
} elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='1' order by RequestID Desc");
    $title = "Unused Epins";
    $error = "No Unused EPins found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."' and `IsRejected`='1' order by RequestID Desc");
    $title = "Used E-Pins";
    $error = "No Used EPins found";
} else {
    $records=$mysql->select("SELECT * FROM _tblEpins where CreatedByID='".$_SESSION['User']['MemberID']."'or OwnToID='".$_SESSION['User']['MemberID']."'  ");
    $title = "All Epins";
    $error = "No EPins found";
}
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins">EPins</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins">My Epin Summary</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=EPins/MyPins&filter=all"><small>All</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=EPins/MyPins&filter=pending" ><small>Unused</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=EPins/MyPins&filter=approved"><small>Used</small></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Epin Summary</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><label>Created date</label></th>
                                    <th><label>E-Pin</label></th>
                                    <th><label>Pin Password</label></th>
                                    <th><label>Used Member</label></th>
                                    <th><label>Used Member Name</label></th>
                                    <th><label>Used On</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($records as $Transaction){ ?>
                                <tr>
                                    <td><?php echo $Transaction['CreatedOn'];?></td>
                                    <td><?php echo $Transaction['EPIN'];?></td>
                                    <td><?php echo $Transaction['PINPassword'];?></td>
                                    <td><?php echo $Transaction['UserForCode'];?></td>
                                    <td><?php echo $Transaction['UsedForName'];?></td>
                                    <td><?php echo $Transaction['UsedOn'];?></td>
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>