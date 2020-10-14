<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        All E-Pins
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th>E-pin</th>
                                                <th>E-Pin Password</th>
                                                <th>E-Pin Value</th>
                                                <th>Generated On</th>
                                                <th>Sold for</th>
                                                <th>Sold On</th>
                                                <th>Used for</th>
                                                <th>Used On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($_POST['btnFilter'])) {
                                                    if ($_POST['Package']==2) {
                                                        $Epins= $mysql->select("select * from  _tbl_epins where PinPackageID='2' order by PinID Desc");
                                                    }
                                                    if ($_POST['Package']==3) {
                                                        $Epins= $mysql->select("select * from  _tbl_epins where PinPackageID='3' order by PinID Desc");   
                                                    } 
                                                } else {
                                                    $Epins= $mysql->select("select * from  _tbl_epins order by PinID Desc");
                                                }
                                            ?>
                                            <?php foreach ($Epins as $Epin){ ?>
                                                <tr>
                                                    <td><?php echo $Epin['PinCode'];?></td>
                                                    <td><?php echo $Epin['EPinPassword'];?></td>
                                                    <td><?php echo $Epin['PinValue'];?></td>
                                                    <td><?php echo $Epin['GeneratedOn'];?></td>
                                                    <td><?php echo $Epin['SoldMemberName'];?><br><span style="color:#139c36;font-size:11px;"><?php echo $Epin['SoldMemberCode'];?></span></td>
                                                    <td><?php echo $Epin['SoldOn'];?></td>
                                                    <td><?php echo $Epin['UsedMemberName'];?><br><span style="color:#139c36;font-size:11px;"><?php echo $Epin['UsedMemberCode'];?></span></td>
                                                    <td><?php echo $Epin['UsedOn'];?></td>
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
    </div>
</div>
 <script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 

