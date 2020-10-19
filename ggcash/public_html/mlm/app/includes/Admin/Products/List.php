<?php 
    $Products = $mysql->select("select * from `_tbl_Members_Products`"); 
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/List">Products</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/List">Manage Products</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-title">Manage Products</div>
                        </div>
                        <div class="col-md-8" style="text-align: right;">
                            <button type="button" onclick="location.href='dashboard.php?action=Products/New'"class="btn btn-purple btn-xs">Add Product</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th style="text-align: right;">Product Price</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($Products as $Product) {?>
                                    <tr>
                                        <td><?php echo $Product['ProductID'];?></td>
                                        <td><?php echo $Product['ProductName'];?></td>
                                        <td style="text-align: right"><?php echo number_format($Product['MRP'],2);?></td>
                                        <td style="text-align: right"><a href="dashboard.php?action=Products/Edit&PID=<?php echo $Product['ProductID'];?>">Edit</a>&nbsp;|&nbsp;<a href="dashboard.php?action=Products/View&PID=<?php echo $Product['ProductID'];?>">View</a>&nbsp;|&nbsp;<span onclick='CallConfirmation(<?php echo $Product['ProductID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if( sizeof($Products)==0) { ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center;">No Products found</td>
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
<script>
 /*   $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });  */
</script>
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
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/images/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(ProductID){
    var txt = '<form action="" method="POST" id="ProductFrm_'+ProductID+'">'
                    +'<input type="hidden" value="'+ProductID+'" id="ProductID" Name="ProductID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete product?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-purple" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-purple" onclick="DeleteProduct(\''+ProductID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteProduct(productid) {
     var param = $( "#ProductFrm_"+productid).serialize();
    $("#confrimation_text").html(loading);
    $.post( "includes/Admin/webservice.php?action=DeleteProduct",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                                         
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/images/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/images/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Products/List' class='btn btn-outline-purple'>Continue</a></div>"; 
        }
        $('#ConfirmationPopup').modal("show");
        $("#confrimation_text").html(html);
        
    });
}
</script>