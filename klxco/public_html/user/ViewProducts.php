 <?php 
    if($_GET['status']=="All"){ 
        $products = $mysql->select("select * from _tbl_products where IsAdmin='0' and md5(UserID)='".$_GET['d']."' order by ProductID Desc");
        $title="All Products";
    }if($_GET['status']=="Active"){
        $products = $mysql->select("select * from _tbl_products where IsActive='1' and IsAdmin='0' and md5(UserID)='".$_GET['d']."' order by ProductID Desc");
        $title="Active Products";
    }if($_GET['status']=="Disable"){
        $products = $mysql->select("select * from _tbl_products where IsActive='0' and IsAdmin='0' and md5(UserID)='".$_GET['d']."' order by ProductID Desc");
        $title="Disable Products";
    }
    $user = $mysql->select("select * from _jusertable where md5(userid)='".$_GET['d']."'");
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
                                    <a href="dashboard.php?action=user/ViewProducts&status=All&d=<?php echo $_GET['d'];?>" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All Products</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=user/ViewProducts&status=Active&d=<?php echo $_GET['d'];?>" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active Products</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=user/ViewProducts&status=Disable&d=<?php echo $_GET['d'];?>" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable Products</a>
                                </div>
                            </div>
                        </div>  
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3">Person Name</label>
                                <div class="col-md-9">: <?php echo $user[0]['personname'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3">Email Address</label>
                                <div class="col-md-9">: <?php echo $user[0]['email'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3">Mobile Number</label>
                                <div class="col-md-9">: <?php echo $user[0]['mobile'];?></div>
                            </div>
                        </div>                                     
                        <div class="row row-projects">
                            <?php foreach($products as $product){ 
                              $q = $mysql->select("select * from _tbl_share_products_link where ProductID='".$product['ProductID']."'");
                            ?>
                                    <div class="col-sm-4 col-lg-4">
                                        <div class="card">
                                            <div class="p-2">
                                                <img class="card-img-top rounded" src="../assets/products/<?php echo $product['ProductImage'];?>" alt="Product 1">
                                            </div>
                                            <div class="card-body pt-2">
                                                <h4 class="mb-1 fw-bold"><?php echo $product['ProductName'];?></h4>
                                                <p class="text-muted small mb-2">Product Price: <i class="fas fa-rupee-sign"></i><?php echo number_format($product['ProductPrice'],2);?></p>
                                                <p class="text-muted small mb-2">Selling Price: <i class="fas fa-rupee-sign"></i><?php echo number_format($product['SellingPrice'],2);?></p>
                                                <p class="text-muted small mb-2">Referal Income: <i class="fas fa-rupee-sign"></i><?php echo $product['ReferalIncome'];?></p>
                                                <?php if($product['IsDeleted']=="1"){ ?>
                                                    <div style="text-align: center;"><span style="background:#db0707;padding:2px 10px 4px 10px;color:white;border: 1px solid #db0707;border-radius: 5px;cursor: pointer;">Deleted</span></div>
                                                <?php } ?>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                    <i class="icon-options-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <!--<a class="dropdown-item" href="dashboard.php?action=Products/edit&id=<?php echo md5($product['ProductID']);?>" draggable="false">Edit</a>-->
                                                    <a class="dropdown-item" href="dashboard.php?action=Products/view&fr=u&id=<?php echo md5($product['ProductID']);?>" draggable="false">View</a>
                                                    <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $product['ProductID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                                </div>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                            <?php } ?>
                                    
                                </div>
                        <?php if(sizeof($products)==0){   ?>
                            <div class="card-body" style="text-align: center;">
                                No products found   
                            </div>
                        <?php  } ?>
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
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='../assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
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
