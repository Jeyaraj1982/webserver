<div class="panel-header bg-primary-gradient" style="background: none !important;">
    <div class="page-inner py-3">
	    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		    <div>
			    <h2 class="text-white pb-2 fw-bold text-purple">Dashboard</h2>
			</div>
			<!--<div class="ml-md-auto py-2 py-md-0">
				<a href="dashboard.php?action=Members/CreateMember" class="btn btn-secondary btn-round">Create Member</a>
			</div>-->
		</div>
	</div>
</div>
<?php 
  $bankinfo = $mysql->select("select * from _tbl_Members_bank_info where MemberCode='".$_SESSION['User']['MemberCode']."'");
  if(sizeof($bankinfo)==0){
?>
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="border:1px solid #fbfcd9;background:#fffef7;border-radius:5px" >
                    <img src="assets/images/exclamatory.png" style="width: 23px;">&nbsp; Please update your bank account information<br>
                    <span style="font-size: 12px;"><a href="dashboard.php?action=Settings/AddMyBankDetails" style="text-decoration:none;">Update bank account information</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="page-inner mt--5">
    <?php $h = $mysql->select("Select * from _tbl_Settings_Params where ParamCode='MaximumHorizontal'"); ?>
    <div class="row">
        <?php
            $required = calculate_level_members(1,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(1,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 1</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(2,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(2,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 2</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(3,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(3,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 3</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(4,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(4,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 4</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(5,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(5,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 5</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(6,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(6,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 6</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(7,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(7,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 7</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(8,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(8,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 8</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(9,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(9,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level 9</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(10,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(10,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-3">
            <div class="card">
                <div class="card-body p-3 text-center">          
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 10</div>
                    <div class="text-muted mb-3"><?php echo $required==$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
        <?php
            $required = $placed = 0;
            $required = calculate_level_members(11,$h[0]['ParamValue']);
            $placed = sizeof(getPlacedMembers(11,$_SESSION['User']['MemberCode']));
        ?>
        <div class="col-6 col-sm-4 col-lg-3">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $placed;?></div>
                    <div class="text-muted mb-3">Level - 11</div>
                    <div class="text-muted mb-3"><?php echo $required<=$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></div>
                </div>
            </div>
        </div>
    </div>
    <?php      
    $error = "No downline members found";
        $Members = $mysql->select("SELECT * FROM _tbl_Members 
                                        LEFT JOIN _tbl_Settings_Packages 
                                        ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where 
                                        `_tbl_Members`.`MemberCode` in (SELECT `ChildCode` FROM  `_tblPlacements` WHERE `PlacedByCode`='".$_SESSION['User']['MemberCode']."'  ORDER BY `PlacementID` DESC) 
                                        order by `_tbl_Members`.`MemberID` Desc ");
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="padding-bottom:0px;">
                    <h3>Recently Joined Members</h3>
                    <div class="table-responsive">
                        <table style="width:100%" >
                            <thead>
                                <tr>
                                    <th><b>Member Code</b></th>
                                    <th><b>Member Name</b></th>
                                    <th><b>Sponsor Code</b></th>
                                    <th><b>Upline Code</b></th>
                                    <th><b>Created</b></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (sizeof($Members)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                            <?php } ?>
                            <?php foreach ($Members as $Member) { ?>
                                <tr>
                                    <td style="font-size:12px;border-bottom:1px solid #ddd;text-align:left"><?php echo $Member['MemberCode'];?></td>
                                    <td style="font-size:12px;border-bottom:1px solid #ddd;text-align:left"><?php echo $Member['MemberName'];?></td>
                                    <td style="font-size:12px;border-bottom:1px solid #ddd;text-align:left"><?php echo $Member['SponsorCode'];?></td>
                                    <td style="font-size:12px;border-bottom:1px solid #ddd;text-align:left"><?php echo $Member['UplineCode'];?></td>
                                    <td style="font-size:12px;border-bottom:1px solid #ddd;text-align:left"><?php echo date("M d, Y",strtotime($Member['CreatedOn']));?></td>
                                    <td style="font-size:12px;border-bottom:1px solid #ddd;text-align:left"><a href="dashboard.php?action=Members/GenealogyTree&Code=<?php echo $Member['MemberCode'];?>">View Tree</a></td>
                                </tr>
                            <?php  }?> 
                            </tbody>
                        </table>
                        <?php if (sizeof($Members)>2) { ?>
                            <p align="right" style="padding-top:10px;font-size:12px;">
                                <a href="dashboard.php?action=Members/MyAllMembers">More Members</a>
                            </p>
                        <?php } ?>
                    </div>
                </div>
			</div>
		</div>
    </div>                
</div>

