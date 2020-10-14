<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
	    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		    <div>
			    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				<a href="dashboard.php?action=Members/CreateMember" class="btn btn-secondary btn-round">Create Member</a>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5" style="display:none">
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
    
    <div class="row">
	    <div class="col-md-12">
		    <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
							    <?php      
                                    $error = "No direct downline members found";
                                    $Members = $mysql->select("SELECT * FROM _tbl_Members 
                                                                LEFT JOIN _tbl_Settings_Packages 
                                                                ON _tbl_Members.CurrentPackageID=_tbl_Settings_Packages.PackageID where 
                                                                `_tbl_Members`.`MemberCode` in (SELECT `ChildCode` FROM  `_tblPlacements` WHERE `PlacedByCode`='".$_SESSION['User']['MemberCode']."'  ORDER BY `PlacementID` DESC) 
                                                                order by `_tbl_Members`.`MemberID` Desc ");
                                ?>
                                   <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th><b>Member Code</b></th>
                                                <th><b>Member Name</b></th>
                                                <th><b>Sponsor Code</b></th>
                                                <th><b>Upline Code</b></th>
                                                <th><b>Created</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (sizeof($Members)==0) { ?>
                                            <tr>
                                                <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php 
                                                $i=1;
                                                foreach ($Members as $Member) {
                                                    if ($i<=2) {
                                            ?>
                                            <tr>
                                                <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberCode'];?></td>
                                                <td><?php echo $Member['MemberName'];?></td>
                                                <td><?php echo $Member['SponsorCode'];?></td>
                                                <td><?php echo $Member['UplineCode'];?></td>
                                                <td><?php echo date("Y-m-d",strtotime($Member['CreatedOn']));?></td>
                                            </tr>
                                        <?php } }?> 
                                    </tbody>
                                </table>
                                <p align="right">
                                    <?php if (sizeof($Members)>2) { ?>
                                        <a href="dashboard.php?action=Members/MyAllMembers">More Members</a>
                                    <?php } ?>
                                </p>
                            </div>
                </div>
			</div>
		</div>
    </div>                
</div>
