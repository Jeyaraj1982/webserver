<?php
    if($_GET['filter']=="all"){
       $Products = $mysql->select("SELECT * FROM _tbl_products where StoreID='".$_SESSION['User']['SupportingCenterAdminID']."' order by ProductID Desc");
    }
    if($_GET['filter']=="active"){ 
         $Products = $mysql->select("SELECT * FROM _tbl_products where IsBlock='0' and IsActive='1' and StoreID='".$_SESSION['User']['SupportingCenterAdminID']."'  order by ProductID Desc");  
    }
    if($_GET['filter']=="deactive"){ 
         $Products = $mysql->select("SELECT * FROM _tbl_products where IsBlock='0' and IsActive='0' and StoreID='".$_SESSION['User']['SupportingCenterAdminID']."'  order by ProductID Desc");  
    }
    if($_GET['filter']=="Blocked"){ 
         $Products = $mysql->select("SELECT * FROM _tbl_products where IsBlock='1' and StoreID='".$_SESSION['User']['SupportingCenterAdminID']."'  order by ProductID Desc");  
    }                                                                                              
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/list">Products</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/list">Manage Products</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: right;padding-bottom:15px;">
            <a href="dashboard.php?action=Products/list&filter=all" <?php if($_GET['filter']=="all"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>All</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="dashboard.php?action=Products/list&filter=active" <?php if($_GET['filter']=="active"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>Active</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="dashboard.php?action=Products/list&filter=deactive" <?php if($_GET['filter']=="deactive"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>Deactive</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="dashboard.php?action=Products/list&filter=Blocked" <?php if($_GET['filter']=="Blocked"){ ?> style="text-decoration: underline;font-weight:bold" <?php } ?>>Blocked By Admin</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                             <h4 class="card-title">Manage Products</h4>
                             <span><?php echo ucfirst($_GET['filter']);?></span>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                             <button type="button" class="btn btn-primary btn-sm" onclick="location.href='dashboard.php?action=Products/add'">Add Product</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         
                        <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col" style="padding-left:0px !important">Name</th>
                                                <th scope="col" style="text-align: right;padding-right:0px !important">Price</th>
                                                <th scope="col" style="text-align: right;padding-right:0px !important">Offer Price</th>
                                                <th scope="col" style="text-align: center;">Created On</th>
                                                <?php if($_GET['filter']=="all"){ ?>
                                                <th scope="col" style="padding-right:0px !important">Status</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($Products as $Product){ ?>
                                            <tr>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><img src="<?php echo "assets/products/".$Product['ProductImage'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><?php echo $Product['ProductName'];?></td>
                                                <td style="padding-right:0px !important;text-align:right"><?php echo number_format($Product['ProductPrice'],2);?></td>
                                                <td style="padding-right:0px !important;text-align:right"><?php echo number_format($Product['OfferPrice'],2);?></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important;text-align:center"><?php echo date("M-d-Y H:i",strtotime($Product['AddedOn']));?></td>
                                                <?php if($_GET['filter']=="all"){ ?><td><?php if($Product['IsBlock']=="0"){ echo ($Product['IsActive']==1) ? 'Active' : 'Deactive'; } else { echo "Blocked";}?></td><?php } ?>
                                                <td  style="padding-right:10px !important;padding-left:0px !important;text-align: right;">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Products/edit&id=<?php echo $Product['ProductID'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Products/view&id=<?php echo $Product['ProductID'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Product['ProductID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                    </div>
                                                </div>     
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (sizeof($Products)==0) { ?>
                                        <tr>
                                            <?php if($_GET['filter']=="all"){ ?>
                                                <td colspan="7" style="text-align:center;">No Record Found</td>
                                            <?php } else { ?>
                                                <td colspan="6" style="text-align:center;">No Record Found</td>
                                            <?php } ?>
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
 function CallConfirmation(ProductID){
    var text = '<form action="" method="POST" id="DeleteProductFrm'+ProductID+'">'
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
 
 function DeleteProduct(ProductID) {
     var param = $( "#DeleteProductFrm"+ProductID).serialize();
    //$("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteProduct",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/imge/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Products/list&filter=all' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>