<?php 
if (!(isset($_GET['status']))) {
    $_GET['status']=1;
}
$Orders = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='".$_GET['status']."' order by OrderID desc");
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
                                        <?php echo Order::OrderStatus($_GET['status']);?>
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                               
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="text-align:right;">
                                <a href="dashboard.php?action=Order/list&status=1">Placed</a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Order/list&status=2">Cancelled</a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Order/list&status=3">Processing</a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Order/list&status=4">Dispatched</a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Order/list&status=5">Delivered</a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Order/list&status=6">Returned</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th style="text-align: right;">Value</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Orders as $Order){ ?>
                                            <tr>
                                                <td><?php echo $Order["OrderCode"];?></td>
                                                <td><?php echo date("M d, Y, H:i", strtotime($Order["OrderDate"]));?></td>
                                                <td><?php echo $Order["CustomerName"];?></td>
                                                <td><?php echo Order::OrderStatus($Order["OrderStatus"]);?></td>
                                                <td style="text-align: right"><?php echo $Order["OrderTotal"];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Order/view&Order=<?php echo md5("Jeyaraj".$Order["OrderID"]);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Order["OrderID"];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                         <!--   <?php if($Order["order_total_after_tax"]!=$Order["order_amount_paid"]){ ?><a class="dropdown-item" href="dashboard.php?action=Invoice/CreateReceipt&invoice_id=<?php echo md5($Order["order_id"]);?>" draggable="false">Create Receipts</a><?php }?>-->
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($invoiceList)=="0"){ ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No Invoices Found</td>
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
    $.post( "http://masflowers.in/admin/webservice.php?action=DeleteInvoice",param,function(data) {
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