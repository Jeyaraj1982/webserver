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
                                        Account Summary
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Txn On</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col" style="text-align: right;">Credits</th>
                                                <th scope="col" style="text-align: right;">Debits</th>
                                                <th scope="col" style="text-align: right;">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $credits = $mysql->select("select * from _tbl_franchisee_credits where FranchiseeID='".$_SESSION['User']['FranchiseeID']."' order by CreditsID desc");?>
                                        <?php foreach($credits as $credit){ ?>
                                            <tr>
                                                <td><?php echo date("M-d-Y H:i",strtotime($credit['RequestOn']));?></td>
                                                <td><?php echo $credit['Particulars'];?></td>
                                                <td style="text-align: right;"><?php echo $credit['Credits'];?></td>
                                                <td style="text-align: right;"><?php echo $credit['Debits'];?></td>
                                                <td style="text-align: right;"><?php echo $credit['Balance'];?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($credits)==0){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Summary Found</td>
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



