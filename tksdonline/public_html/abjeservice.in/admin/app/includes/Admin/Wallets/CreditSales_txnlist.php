<?php
    $backurl  = isset($_GET['back']) ? $_GET['back'] : "CreditSales";
    $data = $mysql->select("select * from _tbl_admin_credits where AdminID='".$_SESSION['User']['AdminID']."' and CreditID='".$_GET['txn']."'");  
    $summary = $mysql->select("select * from `_tbl_admin_credit_txn` where CreditID='".$data[0]['CreditID']."' order by CreditTxnID desc");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/CreditSales_txnlist">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=TWallet/CreditSales_txnlist">Credit Sales Txn</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Credit Sales Txn</h4>
                </div>                            
                <div class="card-body">
                     <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Nick Name</label>
                                <div style="color:#999"><?php echo $data[0]['NickName'];?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Summary</label>
                                <div style="color:#999"><?php echo $data[0]['summary']."/Rs. ".number_format($data[0]['TxnAmount'],2);?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Payable Amount</label>
                                <div style="color:#999"><?php echo number_format($data[0]['PayableAmount'],2);?></div>
                            </div>
                        </div>
                    </div>
                    <?php if (sizeof($summary)>0) { ?>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <tr>
                                <td>Date</td>
                                <td>Paid</td>
                                <td>Balance</td>
                            </tr>
                            <?php foreach($summary as $s) { ?>
                            <tr>
                                <td>
                                    <?php echo date("Y-m-d",strtotime($s['PaidOn']));?><br>
                                    <?php echo date("H:i",strtotime($s['PaidOn']));?>
                                </td>
                                <td>
                                    <?php echo number_format($s['PaidAmount'],2);?>
                                </td>
                                <td>
                                    <?php echo number_format($s['BalanceAmount'],2);?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>                        
                    </div>
                 <?php } ?>
                <?php if ($data[0]['PayableAmount']>0) {?>
                <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <a href="dashboard.php?action=Wallets/Credit_Sales_Paynow&paynow=<?php echo $data[0]['CreditID'];?>" class="btn btn-success  glow position-relative" style="width: 120px !important;">Paynow</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  /*  $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });          */
</script> 