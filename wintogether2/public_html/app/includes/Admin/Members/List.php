<?php
 
      $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$_GET['Package']."'");

    $title = "All Downline Members";
    $error = "No downline members found";
  
    if($_GET['Filter']=="All"){   
        $Members = $mysql->select("
        SELECT * FROM _tbl_Members LEFT JOIN
            _tbl_Settings_Packages ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where _tbl_Settings_Packages.PackageID='".$_GET['Package']."'");
        $subtitle = "All Members";
    }
    if($_GET['Filter']=="Active"){   
        $Members = $mysql->select("
        SELECT * FROM _tbl_Members LEFT JOIN
            _tbl_Settings_Packages ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where _tbl_Settings_Packages.PackageID='".$_GET['Package']."' and _tbl_Members.IsActive='1'");
        $subtitle = "Active Members";
    }
    if($_GET['Filter']=="Blocked"){   
        $Members = $mysql->select("
        SELECT * FROM _tbl_Members LEFT JOIN
            _tbl_Settings_Packages ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where _tbl_Settings_Packages.PackageID='".$_GET['Package']."' and _tbl_Members.IsActive='0'");
        $subtitle = "Blocked Members";
    }
    $title = "All Epins";
    $error = "No EPins found";
                                                                                                        
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
                    <div class="row"> 
                        <div class="col-md-6">
                            <h4 class="card-title">Manage Members</h4>
                            <span><?php echo $title."   - ".$package[0]['PackageName'];?></span><br>
                            <span><?php echo $subtitle;?></span>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="dashboard.php?action=Members/List&Package=<?php echo $_GET['Package'];?>&Filter=All" <?php echo ($_GET['Filter']=="All") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>>All</a>&nbsp;|&nbsp;
                            <a href="dashboard.php?action=Members/List&Package=<?php echo $_GET['Package'];?>&Filter=Active" <?php echo ($_GET['Filter']=="Active") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>>Active</a>&nbsp;|&nbsp;
                            <a href="dashboard.php?action=Members/List&Package=<?php echo $_GET['Package'];?>&Filter=Blocked" <?php echo ($_GET['Filter']=="Blocked") ? ' style="text-decoration:underline;font-weight:bold" ' : '';?>>Blocked</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                
                                <tr>
                                                <th class="border-top-0"></th>
                                                <th class="border-top-0"><b>Member Code</b></th>
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Member Email</b></th>
                                                <th class="border-top-0"><b>Sponsor Code</b></th>
                                                <th class="border-top-0"><b>Upline Code</b></th>
                                                <th class="border-top-0"><b>Left</b></th>
                                                <th class="border-top-0"><b>Right</b></th>
                                                <th class="border-top-0"><b>Orders</b></th>
                                                <th class="border-top-0"><b></b></th>
                                            </tr>
                               
                            </thead>
                            <tbody>
                                <?php if (sizeof($Members)==0) { ?>
                                <tr>
                                    <td colspan="9" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($Members as $Member){ ?>
                                <tr>
                                   <!--<td><?php //echo getImage($Member['Thumb'],$Member['Sex']);?></td>-->
                                   <td style="width:40px"><img src="assets/img/<?php echo $Member['FileName'];?>" style="height:32px;"></td>
                                                <td>
                                                    <span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span><?php echo $Member['MemberCode'];?>
                                                    </td>
                                                <td><?php echo $Member['MemberName'];?></td>
                                                <td><?php echo $Member['MemberEmail'];?></td>
                                                <td><?php echo $Member['SponsorCode'];?></td>
                                                <td><?php echo $Member['UplineCode'];?></td>
                                                <td style="text-align: right">
                                                <?php echo $memberTree->getTotalLeftCount($Member['MemberCode']);?><br>
                                                 <span style="font-size:10px">PV:<?php echo $memberTree->PV;?></span>
                                                 <span style="font-size:10px">BV:0</span>
                                                </td>
                                                <td style="text-align: right">
                                                <?php echo $memberTree->getTotalRightCount($Member['MemberCode']);?><br>
                                                 <span style="font-size:10px">PV:<?php echo $memberTree->PV;?></span><br>
                                                 <span style="font-size:10px">BV:0</span>
                                                </td>
                                                <td style="text-align: right;"><?php echo sizeof($mysql->select("select * from _tbl_orders where MemberID='".$Member['MemberID']."'"));?></td>
                                                <td style="text-align: right;">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Members/ViewMember&cp=Members/GenealogyTree&MCode=<?php echo $Member['MemberCode'];?>" draggable="false">View Tree</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Members/EditMember&MCode=<?php echo $Member['MemberCode'];?>" draggable="false">Edit Member</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $Member['MemberCode'];?>" draggable="false">View Member</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Members/ManageOrders&MCode=<?php echo $Member['MemberCode'];?>" draggable="false">View Orders</a>
                                                    </div>
                                                </div>     
                                                </td> 
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