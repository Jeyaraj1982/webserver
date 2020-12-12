<?php
    if($_GET['filter']=="all"){
       $Orders = $mysql->select("SELECT * FROM _tbl_orders where StoreID='".$_SESSION['User']['SupportingCenterAdminID']."' order by OrderID Desc");
    }                                                                                              
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/list">Orders</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/list">Manage Orders</a></li>
        </ul>
    </div>
    <!--<div class="row">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Orders/list&filter=all" <?php if($_GET['filter']=="all"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>All</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                             <h4 class="card-title">Manage Orders</h4>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                             <button type="button" class="btn btn-primary btn-sm" onclick="location.href='dashboard.php?action=Orders/New'">Add</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Member Name</th>
                                    <th scope="col">Invoice Number</th>
                                    <th scope="col" style="text-align: right;">Invoice Amount</th>
                                    <th scope="col">Invoice Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($Orders as $Order){ ?>
                                <tr>
                                    <td><?php echo $Order['MemberCode'];?></td>
                                    <td><?php echo $Order['MemberName'];?></td>
                                    <td><?php echo $Order['InvoiceNumber'];?></td>
                                    <td style="text-align:right"><?php echo number_format($Order['InvoiceAmount'],2);?></td>
                                    <td><?php echo date("d M,Y", strtotime($Order['InvoiceDate']));?></td>
                                    <td  style="text-align: right;">
                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php?action=Orders/view&id=<?php echo $Order['OrderID'];?>" draggable="false">View</a>
                                            <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Order['OrderID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                        </div>
                                    </div>     
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php if (sizeof($Orders)==0) { ?>
                            <tr>
                                <td colspan="6" style="text-align:center;">No Record Found</td>
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
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
 function CallConfirmation(OrderID){
    var text = '<form action="" method="POST" id="DeleteOrderFrm'+OrderID+'">'
                    +'<input type="hidden" value="'+OrderID+'" id="OrderID" Name="OrderID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete Order?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteOrder(\''+OrderID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteOrder(OrderID) {
     var param = $( "#DeleteOrderFrm"+OrderID).serialize();
    //$("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteOrder",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/imge/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Orders/list&filter=all' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>