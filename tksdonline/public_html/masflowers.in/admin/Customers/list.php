 <?php 
    if($_GET['status']=="All"){ 
        $Customers = $mysql->select("select * from _tbl_sales_customers order by CustomerID Desc");
        $title="All Customers";
    }if($_GET['status']=="Active"){
        $Customers = $mysql->select("select * from _tbl_sales_customers where IsActive='1' order by CustomerID Desc");
        $title="Active Customers";
    }if($_GET['status']=="Blocked"){
        $Customers = $mysql->select("select * from _tbl_sales_customers where IsActive='0' order by CustomerID Desc");
        $title="Disable Customers";
    }if($_GET['status']=="Unpaid"){
        $Customers = $mysql->select("SELECT * FROM _tbl_sales_customers WHERE EXISTS (SELECT * FROM invoice_order WHERE _tbl_sales_customers.CustomerID = invoice_order.user_id and invoice_order.order_total_amount_due!='0.00')  order by CustomerID Desc");
        $title="Unpaid Customers";
    }if($_GET['status']=="Paid"){
        $Customers = $mysql->select("SELECT * FROM _tbl_sales_customers WHERE NOT EXISTS (SELECT * FROM invoice_order WHERE _tbl_sales_customers.CustomerID = invoice_order.user_id) order by CustomerID Desc");
        $title="Paid Customers";
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
                                        Manage Customers <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Customers/add" class="btn btn-primary btn-xs">Add Customer</a><br>
                                    <a href="dashboard.php?action=Customers/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All Customers</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customers/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active Customers</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customers/list&status=Blocked" <?php if($_GET['status']=="Blocked"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Blocked Customers</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customers/list&status=Unpaid" <?php if($_GET['status']=="Unpaid"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Unpaid Customers</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customers/list&status=Paid" <?php if($_GET['status']=="Paid"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Paid Customers</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Customer Code</th>
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
                                                <td><?php echo $Customer['CustomerCode'];?></td>
                                                <td><?php echo $Customer['CustomerName'];?><br><?php echo $Customer['CustomerNameTamil'];?></td>
                                                <td><?php echo $Customer['ShopName'];?><br><?php echo $Customer['ShopNameTamil'];?></td>
                                                <td><?php echo $Customer['MobileNumber'];?></td>                                                                                                                                                                                                                                                       
                                                <td style="text-align: right"><?php echo number_format(getTotalInvoice($Customer['CustomerID']),2); ?></td>                                                                                                                                                                                                                                                       
                                                <td style="text-align: right"><?php echo number_format(getTotalPaid($Customer['CustomerID']),2); ?></td>                                                                                                                                                                                                                                                       
                                                <td style="text-align: right"><?php echo number_format(getTotalBalance($Customer['CustomerID']),2); ?></td>                                                                                                                                                                                                                                                       
                                                <td style="text-align: right">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Customers/edit&id=<?php echo md5($Customer['CustomerID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Customers/view&id=<?php echo md5($Customer['CustomerID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Customers/invoices&id=<?php echo md5($Customer['CustomerID']);?>" draggable="false">Invoices</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Customers/receipts&id=<?php echo md5($Customer['CustomerID']);?>" draggable="false">Receipts</a>
                                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Customer['CustomerID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } if(sizeof($Customers)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="6">No Customers found</td>
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
 
 function CallConfirmation(CustomerID){
    var txt = '<form action="" method="POST" id="CustomerFrm_'+CustomerID+'">'
                    +'<input type="hidden" value="'+CustomerID+'" id="CustomerID" Name="CustomerID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete Customer?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteCustomer(\''+CustomerID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteCustomer(Customerid) {
     var param = $( "#CustomerFrm_"+Customerid).serialize();
    $("#confrimation_text").html(loading);
    $.post( "http://masflowers.in/admin/webservice.php?action=DeleteCustomer",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='http://japps.online/tour/admin/assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='http://japps.online/tour/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Customers/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
</script>
