<?php include_once("header.php");?>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">DTH Recharge Transactions</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DTH Recharge Transactions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                 <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="tablesaw-bar tablesaw-mode-stack"><h4 class="card-title text-orange">Recent Recharge Transactions</h4></div>
                            <div class="table-responsive">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>Txn Date</b></th>
                                                <th class="border-top-0"><b>Operator</b></th>
                                                <th class="border-top-0"><b>Number</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                                <th class="border-top-0"><b>Operator ID</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Recharges = $mysqldb->select("Select * From _tbl_recharge_transactions where MemberID='".$_SESSION['User']['MemberID']."' and OperatorType='DTH' order by RcTxnID DESC");?>
                                          <?php foreach ($Recharges as $Recharge){ ?>
                                            <tr>
                                                <td><?php echo $Recharge['TxnDate'];?></td>
                                                <td><?php echo $Recharge['OperatorName'];?></td>
                                                <td><?php echo $Recharge['RCNumber'];?></td>
                                                <td><?php echo  number_format($Recharge['RCAmount'],2);?></td>
                                                <td><?php echo $Recharge['Status'];?></td>
                                                <td><?php echo $Recharge['OperatorID'];?></td>
                                            </tr>
                                         <?php }?>
                                          <?php 
                                            $Transactioncount=$mysqldb->select("select count(RcTxnID) as count FROM _tbl_recharge_transactions where MemberID='".$_SESSION['User']['MemberID']."' and OperatorType='DTH'");
                                            ?>
                                         <?php if($Transactioncount[0]['count']=="0"){?>
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">No Datas Found</td>
                                                </tr>
                                         <?php }?>  
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                 </div>
            </div>

            <script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <!-- start - This is for export functionality only -->
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
            <script>
                //=============================================//
                //    File export                              //
                //=============================================//
                $('#file_export').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
            </script>
        </div>

        <?php include_once("footer.php"); ?>