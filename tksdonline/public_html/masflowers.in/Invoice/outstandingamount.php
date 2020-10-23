<?php 
 if($_GET['wise']=="date"){ 
     $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
     $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
        $invoiceList = $mysql->select("SELECT * FROM invoice_order where order_total_amount_due<>'0.00' and (date(receipt_date)>=date('".$fromDate."') and date(receipt_date)<=date('".$toDate."') ) order by order_id desc");
 } else {
     $Customers = $mysql->select("select * from _tbl_sales_customers where IsActive='1' order by CustomerID Desc");
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
                                        Out Standing Amount <br>
                                        <?php if($_GET['wise']=="date"){ ?>
                                            <span style="font-size:14px">Date wise</span>
                                        <?php } else { ?>
                                            <span style="font-size:14px">Customer wise</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">                                                                             
                                    <?php if($_GET['wise']=="date"){ ?>
                                          <a href="dashboard.php?action=Invoice/outstandingamount&wise=date" class="btn btn-warning btn-xs">Date wise</a>&nbsp;
                                          <a href="dashboard.php?action=Invoice/outstandingamount&wise=customer" class="btn btn-outline-warning btn-xs">Customer wise</a>
                                    <?php } ?>
                                    <?php if($_GET['wise']=="customer"){ ?>
                                          <a href="dashboard.php?action=Invoice/outstandingamount&wise=date" class="btn btn-outline-warning btn-xs">Date wise</a>&nbsp;
                                          <a href="dashboard.php?action=Invoice/outstandingamount&wise=customer" class="btn btn-warning btn-xs">Customer wise</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if($_GET['wise']=="date"){ ?>
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
                                            <input type="submit" value="View Report" class="btn btn-primary" name="viewinvoice">
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                            <div class="table-responsive">
                            <?php if($_GET['wise']=="date"){ ?>
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Invoice No.</th>
                                                <th>Create Date</th>
                                                <th>Customer Name</th>
                                                <th>Invoice Total</th>
                                                <th>Outstanding Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($invoiceList as $invoiceDetails){
                                        $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $invoiceDetails["order_id"];?></td>
                                                <td><?php echo $invoiceDate;?></td>
                                                <td><?php echo $invoiceDetails["order_receiver_name"];?></td>
                                                <td><?php echo $invoiceDetails["order_total_after_tax"];?></td>
                                                <td><?php echo $invoiceDetails["order_total_amount_due"];?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($invoiceList)=="0"){ ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No Outstanding Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            <?php } else { ?>
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Shop Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Total Invoiced</th>
                                                <th scope="col">Total Paid</th>
                                                <th scope="col">Balance Payable</th>
                                                <th scope="col"> </th>                                                  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Customers as $Customer){ ?>
                                            <tr>
                                                <td><?php echo $Customer['CustomerName'];?><br><?php echo $Customer['CustomerNameTamil'];?></td>
                                                <td><?php echo $Customer['ShopName'];?><br><?php echo $Customer['ShopNameTamil'];?></td>
                                                <td><?php echo $Customer['MobileNumber'];?></td>                                                                                                                                                                                                                                                       
                                                <td style="text-align: right"><?php echo number_format(getTotalInvoice($Customer['CustomerID']),2); ?></td>                                                                                                                                                                                                                                                       
                                                <td style="text-align: right"><?php echo number_format(getTotalPaid($Customer['CustomerID']),2); ?></td>                                                                                                                                                                                                                                                       
                                                <td style="text-align: right"><?php echo number_format(getTotalBalance($Customer['CustomerID']),2); ?></td>                                                                                                                                                                                                                                                       
                                            </tr>
                                        <?php } if(sizeof($Customers)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="6">No Customers found</td>
                                            </tr>
                                        <?php } ?>
                                        
                                        </tbody>
                                    </table>
                            <?php } ?>
                            </div>
                        </div>                                                                                                                                            
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
  

<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='http://japps.online/tour/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(InvoiceID){
    var txt = '<form action="" method="POST" id="InvoiceFrm_'+InvoiceID+'">'
                    +'<input type="hidden" value="'+InvoiceID+'" id="InvoiceID" Name="InvoiceID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'                                      
                    +'Are you sure want to delete Invoice?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteInvoice(\''+InvoiceID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteInvoice(Invoiceid) {
     var param = $( "#InvoiceFrm_"+Invoiceid).serialize();
    $("#confrimation_text").html(loading);
    $.post( "http://japps.online/demo/admin/webservice.php?action=DeleteInvoice",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='http://japps.online/tour/admin/assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='http://japps.online/tour/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Invoice/list' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
$(document).ready(function() {
$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});
</script>