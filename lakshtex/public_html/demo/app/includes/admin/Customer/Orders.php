<?php 
     $data= $mysql->Select("select * from _tbl_customer where md5(CustomerID)='".$_GET['id']."'");
		if($_GET['status']=="new") {
            $invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='1' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
            $title="New Order";
        }if($_GET['status']=="confirm") {
			$invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='2' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
			$title="Confirm Order";
		}if($_GET['status']=="cancel") {
			$invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='3' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
			$title="Cancel Order";
		}if($_GET['status']=="processing") {
			$invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='4' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
			$title="Processing Order";
		}if($_GET['status']=="dispatched") {
			$invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='5' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
			$title="Dispatched Order";
		}if($_GET['status']=="delivered") {
            $invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='6' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
            $title="Delivered Order";
        }if($_GET['status']=="undelivered") {
            $invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='7' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
            $title="Delivered Failed Order";
        }
        if($_GET['status']=="paid") {
			$invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='6' and IsPaid='1' and CustomerID='".$data[0]['CustomerID']."' order by order_id desc");
			$title="Paid Order";
		}
?>
<style>
.form-group{
    padding:0px !important;
}
.form-text {
    display: block;
    margin-top: 0px;
}
</style>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row" style="margin-bottom: 10px;"> 
                <div class="col-md-12" style="text-align:right;">
                    <a href="dashboard.php?action=Customer/Orders&status=new&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="new") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>New</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Customer/Orders&status=confirm&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="confirm") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>Confirm</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Customer/Orders&status=cancel&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="cancel") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>Cancel</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Customer/Orders&status=processing&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="processing") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>Processing</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Customer/Orders&status=dispatched&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="dispatched") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>Dispatched</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Customer/Orders&status=delivered&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="delivered") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>Delivered</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Customer/Orders&status=undelivered&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="undelivered") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>Delivered Failed</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="dashboard.php?action=Customer/Orders&status=paid&id=<?php echo md5($data[0]['CustomerID']);?>" <?php if($_GET['status']=="paid") { ?> style="text-decoration:underline;font-weight:bold" <?php } ?>>Paid</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Customer Details</div>
                            <span style="font-size:12px">Created <?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></span>
                        </div>
                        <div class="card-body">
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group form-show-validation row"> 
                                        <label for="email" class="col-md-2 mt-sm-2 text-right">Customer Name</label>
                                        <label class="col-md-10 mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CustomerName'];?></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                        <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MobileNumber'];?></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6">
                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                        <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['EmailID'];?></small>
                                        </label>
                                    </div>  
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group form-show-validation row"> 
                                        <label for="email" class="col-md-2 mt-sm-2 text-right">Is Active</label>
                                        <label class="col-md-10 mt-sm-2 ">
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=Customer/list&status=All" class="btn btn-warning btn-border">Back</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>
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
                                                            <a class="dropdown-item" href="dashboard.php?action=Order/view&id=<?php echo $invoiceDetails["OrderCode"];?>" draggable="false">View</a>
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