<?php 
    include_once("header.php");
    $Products = $mysql->select("select * from _tbl_products where IsAdmin='0' and UserID='".$_SESSION['USER']['userid']."'");
 ?>
<div class="main-panel"  style="width: 100%;height:auto !important">
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
                        <a href="<?php echo country_url;?>products" >My Products</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6"><h4 class="card-title">My Products</h4></div>
                        <div class="col-sm-6" style="text-align: right;">
							<button type="button" class="btn btn--outline-primary" onclick="location.href='<?php echo country_url;?>viewproductsummary'">View Summary</button>&nbsp;
							<button type="button" class="btn btn-primary" onclick="location.href='<?php echo country_url;?>addproduct'">Add product</button>
						</div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row row-projects">
                            <?php foreach ($Products as $Product) {
                                    $filename = ((strlen(trim($Product['ProductImage']))>4) && file_exists("assets/products/".$Product['ProductImage'])) ? "assets/products/".$Product['ProductImage'] : "assets/cms/".Jca::getAppSetting('noimage');
                            ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card adbox">
                                    <div class="p-2 text-center">
                                        <img class="card-img-top rounded adImage" src="<?php echo base_url;?><?php echo $filename;?>" alt="Product 7">
                                        <div class="row">
                                            <div class="col-sm-6" style="text-align: right;">
                                                <?php if($Product['IsDeleted']=="1"){ ?>
                                                   <div style="text-align: center !important;padding-top:10px;"> 
                                                        <a class="btn btn-danger  btn-sm" style="padding:2px 5px">Deleted</a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                <div class="card-body pt-2">
                                
                                    <h3 class="mb-0 fw-bold" style="text-align: left"><i class="fas fa-rupee-sign"></i> <?php echo $Product['SellingPrice'];?>
                                      <?php if($Product['IsDeleted']=="0"){ ?>
                                       <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:#fff;padding-right:0px;margin-right:0px;">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo country_url;?>edit/pe<?php echo md5($Product['ProductID']);?>" draggable="false">Edit</a>
                                            <a class="dropdown-item" href="<?php echo country_url;?>view/pv<?php echo  md5($Product['ProductID']);?>" draggable="false">View</a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="CallConfirmation('<?php echo $Product['ProductID'];?>');" draggable="false">Delete</a>
                                        </div>
                                    </div>
                                     <?php } ?>
                                    </h3>
                                    <p class="text-muted small mb-3" style="height:60px !important;text-align:left"><?php echo substr($Product['ProductName'],0,60);?> <?php echo strlen($Product['ProductName'])>60 ? "..." : "";?></p>
                                    <span style="float: right;"><?php echo date("M d",strtotime($Product['CreatedOn']));?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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