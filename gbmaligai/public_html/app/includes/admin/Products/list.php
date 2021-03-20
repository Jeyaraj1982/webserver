 <?php 
    if($_GET['status']=="All"){ 
        $products = $mysql->select("select * from _tbl_products order by ProductID Desc");
        $title="All Products";
    }if($_GET['status']=="Active"){
        $products = $mysql->select("select * from _tbl_products where IsActive='1' order by ProductID Desc");
        $title="Active Products";
    }if($_GET['status']=="Disable"){
        $products = $mysql->select("select * from _tbl_products where IsActive='0' order by ProductID Desc");
        $title="Disable Products";
    }/*if($_GET['status']=="Unsold"){
        $products = $mysql->select("SELECT * FROM _tbl_products WHERE NOT EXISTS (SELECT * FROM invoice_order_item WHERE _tbl_products.ProductID = invoice_order_item.order_id)  order by ProductID Desc");
        $title="Unsold Products";
    }
    if($_GET['status']=="Mostsold"){
        $products = $mysql->select("SELECT * FROM _tbl_products WHERE (SELECT  order_id,  COUNT (*) FROM invoice_order_item GROUP BY order_id)  order by ProductID Desc");
        $title="Mostsold Products";
    }   */
?>
<div class="main-panel">                                                                                                                                                                      
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Manage Products
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Products/add" class="btn btn-primary btn-xs">Add Product</a><br>
                                    <a href="dashboard.php?action=Products/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All Products</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Products/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active Products</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Products/list&status=Disable" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable Products</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"> </th>
                                                <th scope="col">Product Code</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($products as $product) { 
                                            $img = $mysql->select("select * from _tbl_products_images where ProductID='".$product['ProductID']."' and ImageOrder=1 and IsDelete='0'");
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php if (sizeof($img)>0) {?>
                                                      <img src="../uploads/products/<?php echo $product['ProductID'];?>/<?php echo $img[0]['ImageName'];?>" style="height:75px;text-align:center;margin:5px">
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $product['ProductCode'];?></td>
                                                <td><?php echo $product['ProductName'];?></td>
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Products/edit&id=<?php echo md5($product['ProductID']);?>" draggable="false">Edit</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Products/view&id=<?php echo md5($product['ProductID']);?>" draggable="false">View</a>
                                                                <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $product['ProductID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($products)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="5">No Products found</td>
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
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(ProductID){
    var text = '<form action="" method="POST" id="ProductFrm_'+ProductID+'">'
                    +'<input type="hidden" value="'+ProductID+'" id="ProductID" Name="ProductID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete product?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteProduct(\''+ProductID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteProduct(productid) {
     var param = $( "#ProductFrm_"+productid).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DeleteProduct",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Products/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}

</script>
