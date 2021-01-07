<?php
    include_once("header.php");
    $data=$mysql->select("select * from _tbl_products where md5(ProductID)='".$_GET['ad']."'");  
?>
<div class="main-panel" style="width:100% !important;height:auto !important;">
        <div class="container">
            <div class="page-inner">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
                <div class="page-header">
                    <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                        <li class="nav-home">
                            <a href="<?php echo country_url;?>">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo country_url;?>" >Home</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo country_url;?>mypage" >Dashboard</a>
                        </li>
                         <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo country_url;?>products" >View Product</a>
                        </li>
                    </ul>
                </div>           
                <div class="row">                                                     
                    <div class="col-md-6">
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4><?php echo $data[0]['ProductName'];?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <img src='https://www.klx.co.in/assets/products/<?php echo $data[0]['ProductImage'];?>' style='height:200px;border:1px solid #ccc;border-bottom:none;'>  <br><br>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4"><p>Product Price  </p></div>
                                                <div class="col-md-8"><h3 class="mb-0 fw-bold" style="text-align: left;margin-top: 3px;"><i class="fas fa-rupee-sign"></i> <?php echo $data[0]['ProductPrice'];?></h3></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4"><p>Selling Price  </p></div>
                                                <div class="col-md-8"><h3 class="mb-0 fw-bold" style="text-align: left;margin-top: 3px;"><i class="fas fa-rupee-sign"></i> <?php echo $data[0]['SellingPrice'];?></h3></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4"><p>Referal Income  </p></div>
                                                <div class="col-md-8"><h3 class="mb-0 fw-bold" style="text-align: left;margin-top: 3px;"><i class="fas fa-rupee-sign"></i> <?php echo $data[0]['ReferalIncome'];?></h3></div>
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                    <h2>Description</h2>
                                    <p><?php echo $data[0]['Description'];?></p>
                                    <p>
                                        Created On: <span style='color:#666;font-weight:normall;'><?php echo $data[0]["CreatedOn"];?></span>&nbsp;&nbsp;<br>
                                    </p>       
                                    </div>        
                                    <div>
                                      <a class="dropdown-item" href="<?php echo country_url;?>edit/pe<?php echo md5($data[0]['ProductID']);?>" draggable="false">Edit</a>
                                      <a class="dropdown-item" href="javascript:void(0)" class="btn btn-danger" style="background: red;color: #fff;border-radius: 10px;" onclick="CallConfirmation('<?php echo $data[0]['ProductID'];?>');" draggable="false">Delete Product</a>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once("footer.php"); ?>
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
 
 function DeleteProduct(ProductID) {
     var param = $("#ProductFrm_"+ProductID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "https://www.klx.co.in/webservice.php?action=DeleteUserProduct",param,function(data) {   
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='https://www.klx.co.in/assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='https://www.klx.co.in/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
                                              
    });
}

</script>