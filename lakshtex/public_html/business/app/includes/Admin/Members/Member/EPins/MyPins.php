<?php
 
    $records=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` ");
  
?>
 
   
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Epin Summary</h4>
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
                                    <td style="text-align: right;">
                                        <?php 
                                     
                                            $scnt = $mysql->select("SELECT * FROM `_tblEpins` where `PackageID` ='".$r['PackageID']."' and (CreatedByID='".$data[0]['MemberID']."' or OwnToID='".$data[0]['MemberID']."')");

                                            echo sizeof($scnt);
                                        ?>
                                    </td>
                                    <td style="text-align: right;">
                                        <?php 
                                            $cnt = $mysql->select("SELECT * FROM `_tblEpins` where PackageID ='".$r['PackageID']."' AND IsUsed>0 and (CreatedByID='".$data[0]['MemberID']."' or OwnToID='".$data[0]['MemberID']."')");
                                            echo sizeof($cnt)
                                        ?>
                                    </td>
                                    <td style="text-align: right;">
                                                                                <?php 
                                            $cnt = $mysql->select("SELECT * FROM `_tblEpins` where PackageID ='".$r['PackageID']."' AND IsUsed ='0' and (CreatedByID='".$data[0]['MemberID']."' or OwnToID='".$data[0]['MemberID']."')");
                                            echo sizeof($cnt)
                                        ?>

                                    </td>
                                    <td style="text-align: right;">
                                        <?php if (sizeof($scnt)>0) {?>
                                        <a href="dashboard.php?action=Members/ViewMember&cp=EPins/List&Package=<?php echo $r['PackageID'];?>&MCode=<?php echo $_GET['MCode'];?>">View Pins</a>
                                        <?php } ?>
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
 
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>