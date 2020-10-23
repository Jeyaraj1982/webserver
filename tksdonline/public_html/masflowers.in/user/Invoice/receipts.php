<?php 
     $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : "";
     $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : "";
     if($fromDate!="" && $toDate!=""){
        $receipts = $mysql->select("SELECT * FROM receipt where (date(receipt_date)>=date('".$fromDate."') and date(receipt_date)<=date('".$toDate."') ) order by ReceiptID desc");
     }else {
        $receipts = $mysql->select("SELECT * FROM receipt order by ReceiptID desc"); 
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
                                        Manage Receipts
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">                                                              
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">          
                                            <label>From Date</label>
                                            <input type="text" class="form-control" id="fdate" name="fdate" value="<?php echo $fromDate;?>" placeholder="From Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <label>To Date</label>
                                            <input type="text" class="form-control" id="tdate" name="tdate" value="<?php echo  $toDate;?>" placeholder="To Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" value="View Receipts" class="btn btn-primary" name="viewreceipts">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Receipt No.</th>
                                                <th>Create Date</th>
                                                <th>Customer Name</th>
                                                <th>Invoice Amount</th>
                                                <th>Receipt Amount</th>
                                                <th>Payable Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>                                                                   
                                        <?php foreach($receipts as $receipt){
                                              $invoiceList = $mysql->select("SELECT * FROM invoice_order WHERE order_id = '".$receipt['order_id']."'");
                                              $receiptDate = date("d/M/Y, H:i:s", strtotime($receipt["receipt_date"]));
                                         ?>
                                            <tr>                                                                      
                                                <td><?php echo $receipt["receipt_code"];?></td>
                                                <td><?php echo $receiptDate;?></td>
                                                <td><?php echo $invoiceList[0]["order_receiver_name"];?></td>
                                                <td><?php echo number_format($invoiceList[0]["order_total_after_tax"],2);?></td>
                                                <td><?php echo number_format($receipt["receipt_amount"],2);?></td>
                                                <td><?php echo number_format($receipt["invoice_due_amount"],2);?></td>
                                                <td>
                                                    <a href="dashboard.php?action=Invoice/viewreceipt&receipt_id=<?php echo md5($receipt["ReceiptID"]);?>" title="Print Invoice">View</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($receipts)=="0"){ ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No Receipts Found</td>
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
<script>
$(document).ready(function() {
$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});
</script>