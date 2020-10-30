<?php
    $page="MyReceipts";
    $response = $webservice->getData("Member","GetOrderInvoiceReceiptDetails",array("Request"=>"Receipt"));
?>
<?php include_once("accounts_header.php");?>
<form method="post" action="">
    <div class="col-sm-9" style="margin-top: -8px;">
        <h4 class="card-title">My Receipts</h4>
        <?php if (sizeof($response['data'])>0) {   ?>
        <div class="table-responsive" style="width: 120%;">
        <table id="myTable" class="table table-striped" style="width:100%;border-bottom:1px solid #ccc;">
            <thead>  
                <tr>
                    <th>Receipt Number</th> 
                    <th>Receipt Date</th> 
                    <th>Invoice Number</th> 
                    <th style="text-align:right">Receipt Value</th> 
                    <th></th>
                </tr>  
            </thead>
            <tbody>  
            <?php foreach($response['data'] as $Receipt) {
            ?>
                <tr>
                    <td><?php echo $Receipt['ReceiptNumber'];?></td>
                    <td><?php echo PutDateTime($Receipt['ReceiptDate']);?></td>
                    <td><?php echo $Receipt['InvoiceNumber'];?></td>
                    <td style="text-align:right"><?php echo number_format($Receipt['ReceiptAmount'],2);?></td>
                    <td><a href="<?php echo GetUrl("MyAccounts/ViewReceipts/". $Receipt['ReceiptNumber'].".htm");?>">View</a></td>
                </tr>
            <?php } ?>            
            </tbody>                        
        </table>
    </div>
    <?php } else {?>
        <div style="padding:40px;padding-bottom:100px;text-align:center;color:#aaa">
            <img src="<?php echo ImageUrl;?>receipt.svg" style="height:128px"><Br><Br>
            No receipts found at this time<br><br>
        </div>
    <?php } ?>
    </div>
</form>                
<?php include_once("accounts_footer.php");?>                    

 