<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12" style="text-align: right;">
                    <a href="Dashboard.php?action=myepins">All Pins</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="Dashboard.php?action=usedepins">Used Pins</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="Dashboard.php?action=unusedepins">Un-Used Pins</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        My E-Pins (Used)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" style="width: 100%;border-top:1px solid #ebedf2;" id="basic-datatables">
                                    <thead>
                                        <tr>
                                            <th>E-pin</th>
                                            <th>Pin Password</th>
                                            <th>Generated</th>
                                            <th>Purchased</th>
                                            <th>Used Member</th>
                                            <th>Used Member Name</th>
                                            <th>Used On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $Epins= $mysql->select("select * from  _tbl_epins where IsUsed='1' and SoldMemberID='".$_SESSION['User']['MemberID']."'  and `PinPackageID`='1' order by PinID Desc");?>
                                        <?php foreach ($Epins as $Epin){ ?>
                                        <tr>
                                            <td><?php echo $Epin['PinCode'];?></td>
                                            <td><?php echo $Epin['EPinPassword'];?></td>
                                             <td ><?php
                                                if ($Epin['SoldMemberCode']==$Epin['CreatedByCode']) {
                                                  echo  $Epin['GeneratedOn'] ;    
                                                }
                                             ?></td>
                                            <td style="text-align:right">
                                            <?php 
                                            if ($Epin['SoldMemberCode']!=$Epin['CreatedByCode']) {
                                                  echo  $Epin['SoldOn'] ; 
                                            }
                                            ?></td>
                                            <td><?php echo $Epin['UsedMemberCode'];?></td>
                                            <td><?php echo $Epin['UsedMemberName'];?></td>
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