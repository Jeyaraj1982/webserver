<?php 

if ($_POST['updateBtn']) {
     $sql= $mysql->select("select * from `_tbl_operators` where OperatorID='".$_POST['OperatorID']."'");
     $mysql->execute("update _tbl_operators set APIID='".$_POST['APIID']."' where OperatorID='".$_POST['OperatorID']."'");
     $msg = $sql[0]['OperatorName']." has been updated.";
     ?>
      <script>
              $(document).ready(function() {
                    swal("<?php echo $msg;?>", {
                        icon : "success" 
                    });
                 });
            </script>
     <?php
}
       $sql= $mysql->select("select * from `_tbl_operators` order by `OperatorID`  ");
       $sqlApi= $mysql->select("select * from `_tblAPI` order by `APIID`  ");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
         
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Operators
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped" style="width:95%;">
                                    
                                    <tbody>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr style="height:auto;">
                                            <td style="height:auto;padding:5px !important;width:200px" ><?php echo $log['OperatorName'];?></td>
                                            <td style="height:auto;padding:5px !important">
                                                <form action="" method="post">
                                                <input type="hidden" value="<?php echo $log['OperatorID'];?>" name="OperatorID">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                              <select name="APIID" class="form-control" style="padding:6px 5px;">
                                                    <option value="0">Off</option>
                                                 <?php  foreach($sqlApi as $api){ ?>
                                                    <option value="<?php echo $api['APIID'];?>" <?php echo ($api['APIID']==$log['APIID']) ? " selected='selected' " : "";?>><?php echo $api['APIName'];?></option>
                                                 <?php } ?>
                                                </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="submit" value="Update" name="updateBtn" class="btn btn-success btn-sm">
                                                        </div>
                                                    </div>
                                                
                                                </form>
                                            </td>
                                            
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
    </div>
</div>
