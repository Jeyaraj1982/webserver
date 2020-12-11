<?php
    $Members =$mysql->select("select * from `_tbl_Members`");
    $title = "All Members";
    $error = "No members found";
    $Members = $mysql->select("SELECT * FROM _tbl_Members LEFT JOIN _tbl_Settings_Packages ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID");

    $records=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` ");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Manage Members</a></li>
        </ul>
    </div>
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
                                    <th></th>
                                    <th><label>Package Name</label></th>
                                    <th><label>All Members</label></th>
                                    <th><label>Active Members</label></th>
                                    <th><label>Blocked Members</label></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($records as $r){ ?>
                                <tr>
                                    <td style="width: 60px"><img src="assets/img/<?php echo $r['FileName'];?>" style="height:48px;"></td>
                                    <td><?php  echo $r['PackageName'];?></td>
                                    <td style="text-align:right;">
                                        <?php 
                                            $cnt = $mysql->select("SELECT * FROM `_tbl_Members` where `CurrentPackageID` ='".$r['PackageID']."' ");
                                            echo sizeof($cnt);
                                        ?>
                                    </td>
                                    <td style="text-align:right;">
                                        <?php 
                                            $cnt = $mysql->select("SELECT * FROM `_tbl_Members` where `CurrentPackageID` ='".$r['PackageID']."' and IsActive='1'");
                                            echo sizeof($cnt);
                                        ?>
                                    </td>
                                    <td style="text-align:right;">
                                        <?php 
                                            $cnt = $mysql->select("SELECT * FROM `_tbl_Members` where `CurrentPackageID` ='".$r['PackageID']."' and IsActive='0'");
                                            echo sizeof($cnt);
                                        ?>
                                    </td>
                                    <td style="text-align:right;">
                                        <a href="dashboard.php?action=Members/List&Package=<?php echo $r['PackageID'];?>&Filter=All">View Members</a>
                                        <?php } ?>
                                    </td>
                                </tr>
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