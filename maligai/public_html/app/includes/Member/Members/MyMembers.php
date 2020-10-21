<?php      
    $title= "My Direct Downline Members";
    $error = "No direct downline members found";
    /* $Members = $mysql->select("
        SELECT * FROM _tbl_Members LEFT JOIN
        _tbl_Settings_Packages ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where   `_tbl_Members`.`MemberCode` in (select `UserForCode` from  `_tblEpins` where `OwnToCode`='".$_SESSION['User']['MemberCode']."' and `UsedForID`>0 order by `UsedOn` Desc )");*/
       
    $Members = $mysql->select("SELECT * FROM _tbl_Members 
                               LEFT JOIN _tbl_Settings_Packages 
                               ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where   `_tbl_Members`.`MemberCode` in (SELECT `ChildCode` FROM  `_tblPlacements` WHERE `PlacedByCode`='".$_SESSION['User']['MemberCode']."'  ORDER BY `PlacementID` DESC)");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyMembers">My Members</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Members</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                     <th> </th>
                                     <th><b>Member Code</b></th>
                                     <th><b>Member Name</b></th>
                                     <th><b>Sponsor Code</b></th>
                                     <th><b>Upline Code</b></th>
                                     <th><b>&nbsp;</b></th>
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
                                    <td><img src="assets/img/<?php echo $Member['FileName'];?>" style="height:32px;"></td>
                                    <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberCode'];?></td>
                                    <td><?php echo $Member['MemberName'];?></td>
                                    <td><?php echo $Member['SponsorCode'];?></td>
                                    <td><?php echo $Member['UplineCode'];?></td>
                                    <td style="text-align: right"><a href="dashboard.php?action=Members/Genealogy&Code=<?php echo $Member['MemberCode'];?>">View Tree</a></td>
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