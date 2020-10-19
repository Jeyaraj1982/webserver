<?php
 
    $records=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` ");
  
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins">EPins</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/MyPins">My Epin Summary</a></li>
        </ul>
    </div>
   <!-- <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=EPins/MyPins&filter=all"><small>All</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=EPins/MyPins&filter=pending" ><small>Unused</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=EPins/MyPins&filter=approved"><small>Used</small></a>
        </div>
    </div>-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Epin Summary</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><label>Package Name</label></th>
                                    <th><label>Total EPins</label></th>
                                    <th><label>Used</label></th>
                                    <th><label>UnUsed</label></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($records as $r){ ?>
                                <tr>
                                    <td><img src="assets/img/<?php echo $r['FileName'];?>" style="height:48px;"></td>
                                    <td><?php 

                                    echo $r['PackageName'];?></td>
                                    <td>
                                        <?php 
                                     
                                            $cnt = $mysql->select("SELECT * FROM `_tblEpins` where `PackageID` ='".$r['PackageID']."'");

                                            echo sizeof($cnt);
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $cnt = $mysql->select("SELECT * FROM `_tblEpins` where PackageID ='".$r['PackageID']."' AND IsUsed>0");
                                            echo sizeof($cnt)
                                        ?>
                                    </td>
                                    <td>
                                                                                <?php 
                                            $cnt = $mysql->select("SELECT * FROM `_tblEpins` where PackageID ='".$r['PackageID']."' AND IsUsed ='0'");
                                            echo sizeof($cnt)
                                        ?>

                                    </td>
                                    <td>
                                        <a href="dashboard.php?action=EPins/List&Package=<?php echo $r['PackageID'];?>">View Pins</a>
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