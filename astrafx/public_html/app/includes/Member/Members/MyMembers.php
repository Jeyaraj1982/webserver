<?php      
    $title= "My Direct Downline Members";
    $error = "No direct downline members found";
    /* $Members = $mysql->select("
        SELECT * FROM _tbl_Members LEFT JOIN
        _tbl_Settings_Packages ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where   `_tbl_Members`.`MemberCode` in (select `UserForCode` from  `_tblEpins` where `OwnToCode`='".$_SESSION['User']['MemberCode']."' and `UsedForID`>0 order by `UsedOn` Desc )");*/
       
    $Members = $mysql->select("SELECT * FROM _tbl_Members 
                               LEFT JOIN _tbl_Settings_Packages 
                               ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where Date(`_tbl_Members`.`CreatedOn`)>=Date('".$_POST['From']."') and Date(`_tbl_Members`.`CreatedOn`)<=Date('".$_POST['To']."')  and  `_tbl_Members`.`MemberCode` in (SELECT `ChildCode` FROM  `_tblPlacements` WHERE `PlacedByCode`='".$_SESSION['User']['MemberCode']."'  ORDER BY `PlacementID` DESC)");

                               ?>

<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyMembers">My Direct Referrals</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Direct Referrals</h4>
                </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>From</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-1">To</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewMembers" class="btn btn-primary">View Referrals</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                     <th><b>Member Code</b></th>
                                     <th><b>Name</b></th>
                                     <th><b>Sponsor Code</b></th>
                                     <th><b>Upline Code</b></th>
                                    <!-- <th><b>Left</b></th>
                                     <th><b>Right</b></th> -->
                                     <th><b>Created</b></th>
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
                                    <!--<td><img src="assets/img/<?php echo $Member['FileName'];?>" style="height:32px;"></td>-->
                                    <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberCode'];?></td>
                                    <td><?php echo $Member['MemberName'];?></td>
                                    <td><?php echo $Member['SponsorCode'];?></td>
                                    <td><?php echo $Member['UplineCode'];?></td>
                                    <td><?php echo date("M d, Y",strtotime($Member['CreatedOn']));?></td>
                                  <!--  <td style="text-align: right"><?php //echo $memberTree->getTotalLeftCount($Member['MemberCode']);?></td>
                                    <td style="text-align: right"><?php //echo $memberTree->getTotalRightCount($Member['MemberCode']);?></td>  -->
                                    <td><a href="dashboard.php?action=Members/GenealogyTree&Code=<?php echo $Member['MemberCode'];?>">View Tree</a></td>
                                </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<script>
    $('#From').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD'
        });

</script>