<?php 
     $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
     $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : "2021-01-01";
     $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
     $active=0;
        if($_GET['status']=="new") {
            $active=1;
            $invoiceList = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='1' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="New Order";
        }if($_GET['status']=="confirm") {
            $active=1;
            $invoiceList = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='3' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="Confirm Order";
        }if($_GET['status']=="cancel") {
            $active=1;
            $invoiceList = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='2' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="Cancel Order";
        }if($_GET['status']=="processing") {
            $active=1;
            $invoiceList = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='4' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="Processing Order";
        }if($_GET['status']=="dispatched") {
            $invoiceList = $mysql->select("SELECT * FROM  _tbl_orders where OrderStatus='5' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="Dispatched Order";
            $active=1;
        }if($_GET['status']=="delivered") {
            $active=1;
            $invoiceList = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='6' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="Delivered Order";
        }if($_GET['status']=="undelivered") {
            $active=1;
            $invoiceList = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='7' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="Delivered Failed Order";
        }
        if($_GET['status']=="paid") {
            $active=1;
            $invoiceList = $mysql->select("SELECT * FROM _tbl_orders where OrderStatus='6' and IsPaid='1' and (date(OrderDate)>=date('".$fromDate."') and date(OrderDate)<=date('".$toDate."') ) order by OrderID desc");
            $title="Paid Order";
        }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row" style="margin-bottom: 10px;"> 
                <div class="col-md-12" style="text-align:right;">
                    <a href="dashboard.php?action=Order/list&status=new" <?php if($_GET['status']=="new") { ?> class="btn btn-primary btn-sm" <?php } ?>>New</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Order/list&status=confirm" <?php if($_GET['status']=="confirm") { ?> class="btn btn-primary btn-sm" <?php } ?>>Confirm</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Order/list&status=cancel" <?php if($_GET['status']=="cancel") { ?> class="btn btn-primary btn-sm" <?php } ?>>Cancel</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Order/list&status=processing" <?php if($_GET['status']=="processing") { ?> class="btn btn-primary btn-sm" <?php } ?>>Processing</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Order/list&status=dispatched" <?php if($_GET['status']=="dispatched") { ?> class="btn btn-primary btn-sm" <?php } ?>>Dispatched</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Order/list&status=delivered" <?php if($_GET['status']=="delivered") { ?> class="btn btn-primary btn-sm" <?php } ?>>Delivered</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Order/list&status=undelivered" <?php if($_GET['status']=="undelivered") { ?> class="btn btn-primary btn-sm" <?php } ?>>Delivered Failed</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Order/list&status=paid" <?php if($_GET['status']=="paid") { ?> class="btn btn-primary btn-sm" <?php } ?>>Paid</a>
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-title">
                                        Manage Orders<br>
                                        <span style="font-size:15px"><?php echo $title;?></span> 
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
                                        <input type="submit" value="View Orders" class="btn btn-primary" name="viewinvoice">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Create Date</th>
                                                <th>Customer Name</th>
                                                <th style="text-align:right">Order Total ( <i class="fas fa-rupee-sign"></i> )</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>                          
                                        
                                        <?php foreach($invoiceList as $invoiceDetails){
                                        $invoiceDate = date("d M, Y, H:i", strtotime($invoiceDetails["OrderDate"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $invoiceDetails["OrderCode"];?></td>
                                                <td><?php echo $invoiceDate;?></td>
                                                <td><?php echo $invoiceDetails["CustomerName"];?></td>
                                                <td style="text-align:right"><?php echo $invoiceDetails["OrderTotal"];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Order/view&Order=<?php echo md5("Jeyaraj".$invoiceDetails["OrderID"]);?>" draggable="false">View</a>
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($invoiceList)=="0"){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Orders Found</td>
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