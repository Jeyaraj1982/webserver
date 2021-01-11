<?php
  $Members = $mysql->select("SELECT * FROM _tbl_Members WHERE MemberCode IN (SELECT MemberCode FROM _tbl_Members_bank_info)");
                                                                                                        
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Report/WithBankDetailsMem">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Report/WithBankDetailsMem">Manage With Bank Details Members</a></li>
        </ul>
    </div>
    <!--<div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=all"><small>All</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=unused" ><small>Unused</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=used"><small>Used</small></a>
        </div>
    </div>-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage With Bank Details Members</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                <tr>
                                    <th class="border-top-0"><b>Member Code</b></th>
                                    <th class="border-top-0"><b>Member Name</b></th>
                                    <th class="border-top-0"><b>Sponsor Code</b></th>
                                    <th class="border-top-0"><b>Upline Code</b></th>
                                    <th class="border-top-0" style="text-align: right;"><b>Available Balance</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Members)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($Members as $Member){ ?>
                                <tr>
                                    <td>
                                        <span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span><?php echo $Member['MemberCode'];?>
                                        <br>
                                        <span style="font-size:10px">
                                        <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $Member['MemberCode'];?>">View Member</a>
                                        </span>
                                    </td>
                                    <td><?php echo $Member['MemberName'];?></td>
                                    <td><?php echo $Member['SponsorCode'];?></td>
                                    <td><?php echo $Member['UplineCode'];?></td>
                                    <td style="text-align: right"><?php echo number_format(getUtilityhWalletBalance($Member['MemberCode']),2);?></td>
                                         
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
 /*   $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });  */
</script>