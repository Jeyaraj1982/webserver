<?php
 
      $records=$mysql->select("SELECT * FROM `_tbl_payout_log` order by PayoutLogID Desc");

    $title = "Package Summary";
    $error = "No Records found";
    
                                                                                                        
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Payout Transactions</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Payout Summary</a></li>
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
                    <h4 class="card-title">Manage Members</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                
                                <tr>
                                                <th class="border-top-0"><b>Payout Date</b></th>
                                                <th class="border-top-0"><b>Started</b></th>
                                                <th class="border-top-0"><b>Ended</b></th>
                                            </tr>
                               
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($records as $record){ ?>
                                <tr>
                                    
 
                                                <td><?php echo $record['PayoutDate'];?></td>
                                                <td><?php echo $record['CreatedOn'];?></td>
                                                <td><?php echo $record['EndedOn'];?></td>
                                                <td><a href="dashboard.php?action=Payout/Transaction&date=<?php echo $record['PayoutDate'];?>">View Details</a></td>
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
        //$('#basic-datatables').DataTable({});
    });
</script>