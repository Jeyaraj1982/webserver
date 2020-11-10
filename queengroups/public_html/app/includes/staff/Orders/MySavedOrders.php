<?php 
     $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
     $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
     if($fromDate!="" && $toDate!=""){
        $Orders = $mysql->select("SELECT * FROM _queen_temp_orders where StaffID='".$_SESSION['User']['StaffID']."' and (date(OrderOn)>=date('".$fromDate."') and date(OrderOn)<=date('".$toDate."') ) order by OrderID desc");
     }else {
        $Orders = $mysql->select("SELECT * FROM _queen_temp_orders where StaffID='".$_SESSION['User']['StaffID']."' order by OrderID desc"); 
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
                                        Manage Orders
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Orders/New" class="btn btn-primary btn-xs">Create Order</a>
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
                                                <th>Order ID.</th>
                                                <th>Order On</th>
                                                <th>Staff ID</th>
                                                <th>Staff Name</th>
                                                <th>Agent ID</th>
                                                <th>Agent Name</th>
                                                <th style="text-align:right">Order Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Orders as $Order){
                                        $OrderDate = date("d M, Y, H:i", strtotime($Order["OrderOn"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $Order["OrderCode"];?></td>
                                                <td><?php echo $OrderDate;?></td>
                                                <td><?php echo $Order["StaffCode"];?></td>
                                                <td><?php echo $Order["StaffName"];?></td>
                                                <td><?php echo $Order["AgentCode"];?></td>
                                                <td><?php echo $Order["AgentName"];?></td>
                                                <td style="text-align:right"><?php echo number_format($Order["OrderTotal"],2);?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Orders/viewsavedOrders&id=<?php echo md5($Order["OrderID"]);?>" draggable="false">View</a>
                                                            <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Order["OrderID"];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Orders)=="0"){ ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Orders Found</td>
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
    $.post( "http://japps.online/demo/admin/webservice.php?action=DeleteSavedInvoice",param,function(data) {
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