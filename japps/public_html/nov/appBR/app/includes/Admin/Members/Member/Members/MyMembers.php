<?php      
    $title= "My Direct Downline Members";
    $error = "No direct downline members found";
      $Members = $mysql->select("SELECT * FROM _tbl_Members 
                               LEFT JOIN _tbl_Settings_Packages 
                               ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where   `_tbl_Members`.`MemberCode` in (SELECT `ChildCode` FROM  `_tblPlacements` WHERE `PlacedByCode`='".$data[0]['MemberCode']."'  ORDER BY `PlacementID` DESC)");
?>
 
 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Direct Sponsors</h4>
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
                                     <th><b>Left</b></th>
                                     <th><b>Right</b></th>
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
                                    <td style="text-align: right"><?php echo $memberTree->getTotalLeftCount($Member['MemberCode']);?></td>
                                    <td style="text-align: right"><?php echo $memberTree->getTotalRightCount($Member['MemberCode']);?></td>
                                    <td><a href="dashboard.php?action=Members/ViewMember&cp=Members/GenealogyTree&MCode=<?php echo $_GET['MCode'];?>&Code=<?php echo $Member['MemberCode'];?>">View Tree</a></td>
                                </tr>
                                <?php }?> 
                            </tbody>
                        </table>
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