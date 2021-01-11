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
                                        Earning History<br>
                                        <span style="font-size:12px;">Total Earned: Rs. <?php echo number_format(getOverallBalance($_SESSION['User']['MemberCode']),2);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" id="basic-datatables" style="width: 100%;border-top:1px solid #ebedf2;">
                                    <thead>
                                        <tr>
                                            <th>Date Time</th>
                                            <th>Stage</th>
                                            <th>Member Code</th>
                                            <th>Member Name</th>
                                            <th>Stage Income</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                         $earings = $mysql->select("select * from `_tbl_earnings` where `MemberCode`='".$_SESSION['User']['MemberCode']."' order by EarningId Desc");
                                         foreach($earings as $e) {
                                             ?>
                                             <tr>
                                                <td><?php echo $e['PlacedOn'];?></td>
                                                <td style="text-align:center"><?php echo $e['LevelNumber'];?></td>
                                                <td><?php echo $e['PlacedMemberCode'];?></td>
                                                <td><?php echo $e['PlacedMemberName'];?></td>
                                                <td style="text-align:right"><?php echo number_format($e['LevelIncome'],2);?></td>
                                             </tr>
                                             <?php
                                         }
                                     ?>
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

