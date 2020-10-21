<?php
 
      $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$_GET['Package']."'");

    $title = "All Downline Members";
    $error = "No downline members found";
    $Members = $mysql->select("
    SELECT * FROM _tbl_Members where IsActive='0'");
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
            <li class="nav-item"><a href="dashboard.php?action=Members/InActiveMembers">InActive Members</a></li>
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
                    <span><?php echo $title."   - ".$package[0]['PackageName'];?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>                                                                 
                                
                                <tr>
                                                <th class="border-top-0"><b>Member Code</b></th>
                                                <th class="border-top-0"><b>Member Name</b></th>
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
                                   <!--<td><?php //echo getImage($Member['Thumb'],$Member['Sex']);?></td>-->
                                                <td>
                                                    <span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span><?php echo $Member['MemberCode'];?>
                                                    <br>
                                                    <span style="font-size:10px">
                                                    <a href="dashboard.php?action=Members/ViewInactiveMember&MCode=<?php echo $Member['MemberCode'];?>">View Member</a>
                                                    </span>
                                                </td>
                                                <td><?php echo $Member['MemberName'];?></td>
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