<?php
    $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$_GET['Package']."'");
    if (isset($_GET['filter']) && $_GET['filter']=="all") {
        $records=$mysql->select("select *,_tbl_Settings_Packages.FileName from (SELECT * FROM _tblEpins where PackageID='".$_GET['Package']."' and  CreatedByID='".$_SESSION['User']['AdminID']."' or OwnToID='".$_SESSION['User']['AdminID']."') as t1
                                 left join  _tbl_Settings_Packages
                                 on _tbl_Settings_Packages.PackageID=t1.PackageID");
        $title = "All ".EPINS;
        $error = "No ".EPINS." found";
    } elseif (isset($_GET['filter']) && $_GET['filter']=="used") {
        $records=$mysql->select("select *,_tbl_Settings_Packages.FileName from (SELECT * FROM _tblEpins where PackageID='".$_GET['Package']."' and  (CreatedByID='".$_SESSION['User']['AdminID']."' or OwnToID='".$_SESSION['User']['AdminID']."' ) and `UsedForID`!='0' ) as t1 
                                 left join  _tbl_Settings_Packages
                                 on _tbl_Settings_Packages.PackageID=t1.PackageID");
        $title = "Used ".EPINS;
        $error = "No Unused ".EPINS." found";
    } elseif (isset($_GET['filter']) && $_GET['filter']=="unused") {
        $records=$mysql->select("select *,_tbl_Settings_Packages.FileName from (SELECT * FROM _tblEpins where PackageID='".$_GET['Package']."' and  (CreatedByID='".$_SESSION['User']['AdminID']."' or OwnToID='".$_SESSION['User']['AdminID']."') and `UsedForID`='0' ) as t1 
                                 left join  _tbl_Settings_Packages
                                 on _tbl_Settings_Packages.PackageID=t1.PackageID");
        $title = "Unused ".EPINS;
        $error = "No Used ".EPINS." found";
    } else {
        $records=$mysql->select("select *,_tbl_Settings_Packages.FileName from (SELECT * FROM _tblEpins where PackageID='".$_GET['Package']."' and  CreatedByID='".$_SESSION['User']['AdminID']."' or OwnToID='".$_SESSION['User']['AdminID']."' ) as t1 
                                 left join  _tbl_Settings_Packages
                                 on _tbl_Settings_Packages.PackageID=t1.PackageID");
        $title = "All ".EPINS;
        $error = "No ".EPINS." found";
    }                                                                                                         
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins"><?php echo EPINS;?></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins">My <?php echo EPINS;?> Summary</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=all"><small>All</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=unused" ><small>Unused</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=EPins/List&Package=<?php echo $_GET['Package'];?>&filter=used"><small>Used</small></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My <?php echo EPINS;?> Summary</h4>
                    <span><?php echo $title."   - ".$package[0]['PackageName'];?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><label>Created</label></th>
                                    <th><label><?php echo EPINS;?></label></th>
                                    <th><label><?php echo EPINS;?> Password</label></th>
                                    <th><label>Used Member</label></th>
                                    <th><label>Member Name</label></th>
                                    <th><label>Used On</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="7" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($records as $Transaction){ ?>
                                <tr>
                                    <td><img src="assets/img/<?php echo $Transaction['FileName'];?>" style="width: 48px;"></td>
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