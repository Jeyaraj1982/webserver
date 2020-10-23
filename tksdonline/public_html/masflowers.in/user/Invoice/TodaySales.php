<?php 
     if($_GET['status']=="totalsales"){ 
        $invoiceList = $mysql->select("SELECT * FROM invoice_order where date(order_date)='".date("Y-m-d")."' order by order_id desc");
        $title="Today Sales";
    }if($_GET['status']=="totalcash"){ 
        $invoiceList = $mysql->select("SELECT * FROM invoice_order where date(order_date)='".date("Y-m-d")."' and TransactionMode='Cash' order by order_id desc");
        $title="Today Cash";
    }if($_GET['status']=="totalbank"){ 
        $invoiceList = $mysql->select("SELECT * FROM invoice_order where date(order_date)='".date("Y-m-d")."' and TransactionMode='Net Banking' order by order_id desc");
        $title="Today Bank";
    }
    if($_GET['status']=="totalpayable"){ 
        $invoiceList = $mysql->select("SELECT * FROM invoice_order where date(order_date)='".date("Y-m-d")."' and order_total_amount_due!='0.00' order by order_id desc");
        $title="Today Payable";
    }
?>
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
                                        Manage Today Sales<br>
                                        <span style="font-size:14px"><?php echo $title;?></span>
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Invoice/TodaySales&status=totalsales" <?php if($_GET['status']=="totalsales"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Total Sales</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Invoice/TodaySales&status=totalcash" <?php if($_GET['status']=="totalcash"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Total Cash</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Invoice/TodaySales&status=totalbank" <?php if($_GET['status']=="totalbank"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Total Bank</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Invoice/TodaySales&status=totalpayable" <?php if($_GET['status']=="totalpayable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Total Payable</a>&nbsp;|&nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Invoice No.</th>
                                                <th>Create Date</th>
                                                <th>Customer Name</th>
                                                <th>Invoice Total</th>
                                                <th>Amount Paid</th>
                                                <th>Amount Due</th>
                                                <th>Cash</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($invoiceList as $invoiceDetails){
                                        $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $invoiceDetails["order_code"];?></td>
                                                <td><?php echo $invoiceDate;?></td>
                                                <td><?php echo $invoiceDetails["order_receiver_name"];?></td>
                                                <td><?php echo $invoiceDetails["order_total_after_tax"];?></td>
                                                <td><?php echo number_format($invoiceDetails["order_amount_paid"],2);?></td>
                                                <td><?php echo number_format($invoiceDetails["order_total_amount_due"],2);?></td>
                                                <td><?php echo number_format($invoiceDetails["TotalCashReceived"],2);?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($invoiceList)=="0"){ ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center;">No Invoices Found</td>
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
 