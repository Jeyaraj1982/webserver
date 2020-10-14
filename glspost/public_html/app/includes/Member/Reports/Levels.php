<?php


$d = $mysql->select("Select * from _tbl_Settings_Params where ParamCode='MaximumDownLine'");
$h = $mysql->select("Select * from _tbl_Settings_Params where ParamCode='MaximumHorizontal'");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Reports/Levels">Reports</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Reports/Levels">Level</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Levels</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th style="width:150px;text-align:right;">Required<br>Members</th>
                                    <th style="width:150px;text-align:right;">Placed<br>Members</th>
                                    <th style="width:150px;text-align:right;">Level<br>Income</th>
                                    <th style="width:150px;text-align:right;">Level<br>Status</th>
                                    <th style="width:153px;text-align:right;"> </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                    for($i=1;$i<=$d[0]['ParamValue'];$i++) {
                                        $required = calculate_level_members($i,$h[0]['ParamValue']);
                                        $placed = sizeof(getPlacedMembers($i,$_SESSION['User']['MemberCode']));
                               ?>
                               <tr>
                                <td><?php echo $i;?></td>
                                    <td style="text-align: right"><?php echo $required;?></td>
                                    <td style="text-align: right"><?php echo $placed;?></td>
                                    <td style="text-align: right"><?php echo $placed*getIncome($i);?></td>
                                    <td style="text-align: right"><?php echo $required==$placed ? "<span style='color:green;font-weight:bold;'>Completed</span>" : "<span style='color:orange'>InComplete</span>";?></td>
                                    <td style="text-align: right"><a href="dashboard.php?action=Reports/LevelMembers&Level=<?php echo $i;?>">View Members</a> </td>
                                </tr>
                               <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>