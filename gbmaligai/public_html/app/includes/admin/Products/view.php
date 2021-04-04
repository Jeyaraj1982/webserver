<?php
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-weight:bold;"><?php echo $data[0]['ProductName'];?></div>
                            <span>Product Code: <?php echo $data[0]['ProductCode'];?></span>
                        </div>
                        <div class="card-body" style="padding-top:0px">
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <div class="form-group form-show-validation row">
                                        <div class="col-sm-12" style="padding-left:0px;color:#666"><?php echo $data[0]['ShortDescription'];?></div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <div class="col-sm-4" style="padding-left: 0px;">
                                            <label for="name" style="font-weight:bold">Category Name</label>
                                            <div style="color:#666"><?php echo $data[0]['CategoryName'];?></div>    
                                        </div>
                                        <div class="col-sm-4" style="padding-left: 0px;padding-right: 0px;">
                                            <label for="name" style="font-weight:bold">Sub CategoryName</label> 
                                            <div style="color:#666"><?php echo $data[0]['SubCategoryName'];?></div> 
                                        </div>
                                        <div class="col-sm-4" style="padding-left: 0px;">
                                            <label for="name" style="font-weight:bold">Brand Name</label>
                                            <div style="color:#666"><?php echo $data[0]['BrandName'];?></div>    
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <div class="col-sm-4" style="padding-left: 0px;">
                                            <label for="name" style="font-weight:bold">Is Active</label>
                                            <div style="color:#666"><?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></div> 
                                        </div>  
                                    </div>  
                                    <?php if (JAPP::REFERAL_PROGRAM) { ?> 
                                    <div class="form-group form-show-validation row">
                                        <div class="col-sm-12" style="padding-left: 0px;">
                                            <label for="name">Refferal Commission</label>
                                            <div><?php echo $data[0]['Commission'];?></div> 
                                        </div>
                                        <div class="col-sm-12" style="padding-left: 0px;">
                                            <label for="name">Refferal Commission Level 2</label>
                                            <div><?php echo $data[0]['CommissionL2'];?>&nbsp;</div> 
                                        </div>
                                        <div class="col-sm-12" style="padding-left: 0px;">
                                            <label for="name">Refferal Commission Level 3</label>
                                            <div><?php echo $data[0]['CommissionL3'];?>&nbsp;</div> 
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group form-show-validation row">
                                        <label for="name">Detail Description</label>
                                        <div class="col-sm-12" style="padding-left:0px;color:#666"><?php echo $data[0]['DetailDescription'];?></div> 
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning btn-border">Back</a>
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
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Thumbnails 
                                    </div>
                                </div>      
                                <div class="col-md-6" style="text-align: right;">
                                <?php
                                    if (isset($_POST['UploadThumb'])) {
                                        
                                        $target_dir = "../uploads/products/";
                                        
                                        if (!(is_dir($target_dir."/".$data[0]['ProductID']))) {
                                            mkdir($target_dir."/".$data[0]['ProductID']);
                                        }
                                        $target_dir .= "/".$data[0]['ProductID']."/";
                                        
                                        $filename = $_FILES['file']["name"];
                                        
                                        $ext = explode(".",strtolower(trim($_FILES['file']["name"])));
                                        if ($ext[sizeof($ext)-1]=="png" || $ext[sizeof($ext)-1]=="jpg" || $ext[sizeof($ext)-1]=="jpeg" ) {
                                            $filename = parseStringForPhysicalPath($data[0]['ProductName']).".".$ext[sizeof($ext)-1];
                                        } 
                                        
                                        $image = str_replace(" ","",strtolower(time()."_".$data[0]['ProductID']."_".$filename));
                                        
                                        if (move_uploaded_file($_FILES['file']["tmp_name"], $target_dir .$image)) {
                                            $mysql->insert("_tbl_products_images",array("ProductID"  => $data[0]['ProductID'],
                                                                                        "ImageName"  => $image,
                                                                                        "ImageOrder" => sizeof($mysql->select("select * from _tbl_product_additional_image where IsDelete='0' ProductID='".$data[0]['ProductID']."'"))+1,
                                                                                        "IsDelete"   => "0"));
                                        }
                                    }
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" name="file"><br>
                                    Image Size: 1:1 (eg: 300 Height x 300 Width)
                                    <button type="submit" name="UploadThumb" class="btn btn-primary btn-xs">Add Thumb</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                    if (isset($_POST['btnRemove'])) {
                                        $mysql->execute("update _tbl_products_images set IsDelete='1' where ImageID='".$_POST['ImageID']."'");
                                    }
                                    
                                    if (isset($_POST['btnUpdateOrder'])) {
                                        $mysql->execute("update _tbl_products_images set ImageOrder='".$_POST['ImageOrder']."' where ImageID='".$_POST['ImageID']."'");
                                    }
                                    
                                    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$data[0]['ProductID']."' order by ImageOrder");
                                    
                                    foreach($images  as $image) {
                                        list($width, $height) = getimagesize("../uploads/products/".$data[0]['ProductID']."/".$image['ImageName']);
                                ?>
                                <div class="col-sm-3">
                                    <img src="../uploads/products/<?php echo $data[0]['ProductID'];?>/<?php echo $image['ImageName'];?>" style="width:100%"><br>
                                    <?php echo $width."px x ".$height."px"; ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="ImageID" value="<?php echo $image['ImageID'];?>">
                                        <select name="ImageOrder" class="form-control">
                                            <option value="0">Select Order</option>            
                                            <?php for($i=1;$i<=sizeof($images);$i++) { ?>
                                            <option value="<?php echo $i;?>" <?php echo ($i==$image['ImageOrder']) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                        <input type="submit" value="Update Order" name="btnUpdateOrder" class="btn btn-primary btn-sm">
                                        <input type="submit" value="Remove Image" name="btnRemove" class="btn btn-danger btn-sm">
                                    </form>
                                </div>
                                <?php } ?>
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
                    <div class="col-md-6">
                        <div class="card-title">
                            Price Tags
                        </div>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <button type="button" onclick="PriceTag_New('<?php echo $data[0]['ProductID'];?>')" class="btn btn-primary btn-xs">Add Price</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="tbl_priceTag"></div>
            </div>
        </div>
    </div>
</div>
                <div class="row" style="display: none;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-title">
                                            Additional Features
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <button type="button" onclick="AddDateandCostDetails('<?php echo md5($data[0]['PackageID']);?>')" class="btn btn-primary btn-xs">Add Date and Cost</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Feature Title</th>
                                            <th scope="col">Feature Description</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $DateCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$data[0]['PackageID']."' order by DateandCostID");   ?>
                                    <?php foreach($DateCosts as $datecost){ ?>
                                    <?php $Enquiry = $mysql->Select("SELECT COUNT(EnquiryID) AS cnt FROM _tbl_tour_enquiry where PackageDateandCostID='".$datecost['DateandCostID']."'"); ?>
                                        <tr id="EnquiryDetails_<?php echo $datecost['DateandCostID'];?>">
                                            <td><?php echo date("M,d Y", strtotime($datecost['TourDate']));?></td>
                                            <td style="text-align:right"><?php echo "RS ".number_format($datecost['PackagePrice'],2);?></td>
                                            <td style="text-align:right"><?php echo "RS ".number_format($datecost['OfferPrice'],2);?></td>
                                            <td style="text-align:right"><?php echo "RS ".number_format($datecost['SavePrice'],2);?></td>
                                            <td style="text-align: right"><?php echo $Enquiry[0]['cnt'];?></td>
                                            <td style="text-align: right">                                                   
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>                                                                                                        
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" draggable="false" href="javascript:void(0)" onclick="EditDateandCostDetails('<?php echo md5($datecost['DateandCostID']);?>')">Edit</a>
                                                        <?php if($Enquiry[0]['cnt']!="0"){  ?>
                                                            <a class="dropdown-item" draggable="false" href="javascript:void(0)" onclick="ViewEnquiryByDate('<?php echo md5($datecost['DateandCostID']);?>','<?php echo $datecost['DateandCostID'];?>')">View Enquiry</a>
                                                        <?php } if($Enquiry[0]['cnt']=="0"){  ?>
                                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmationDeleteDateCost(<?php echo $datecost['DateandCostID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                        <?php }  ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                            <div style="height:120px;overflow: auto;">
                                                <table>
                                                        <tr>
                                                            <th scope="col">Requested</th>
                                                            <th scope="col">Full Name</th>
                                                            <th scope="col">City</th>
                                                            <th scope="col">Mobile Number</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Package Cost</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    <?php $Enquiries = $mysql->select("select * from _tbl_tour_enquiry where PackageDateandCostID='".$datecost['DateandCostID']."'");   ?>
                                                    <?php foreach($Enquiries as $Enquiry){ ?>
                                                        <?php $DateCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$Enquiry['PackageID']."' and DateandCostID='".$Enquiry['PackageDateandCostID']."'");   ?>
                                                        <tr>
                                                            <td><?php echo date("M,d Y", strtotime($Enquiry['CreatedOn']));?></td>
                                                            <td><?php echo $Enquiry['FullName'];?></td>                                             
                                                            <td><?php echo $Enquiry['CurrentCity'];?></td>
                                                            <td><?php echo $Enquiry['MobileNumber'];?></td>
                                                            <td><?php echo date("M,d Y", strtotime($DateCosts[0]['TourDate']));?></td>
                                                            <td style="text-align:right"><?php echo number_format($DateCosts[0]['SavePrice'],2);?></td>
                                                            <td><a href="javascript:void(0)"  onclick="ViewEnquiryDetails('<?php echo md5($Enquiry['EnquiryID']);?>')">View</a></td>
                                                        </tr>
                                                    <?php } ?>        
                                                </table>
                                            </div>
                                            </td>
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
    <div class="modal-content" id="confrimation_text">    
    </div>
  </div>
</div>

<script>
    var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
    
    $( document ).ready(function() {
        PriceTag_List();
    });
    
    function doPriceTagValidate(formid,action) {
        
        $('#ErrMessage').html('');
        
        var UnitsTxt = $('#Units').val();
        if (UnitsTxt=="") {
           $('#ErrMessage').html('Please enter Units');  
           return false;
        }
        
        var _UnitID = parseInt($('#UnitID').val());
        if (_UnitID==0) {
           $('#ErrMessage').html('Please select measurements');  
           return false;
        }
        
        <?php   if (BrandSize) { ?>
        var _BrandSizeID = parseInt($('#BrandSizeID').val());
        if (_BrandSizeID==0) {
           $('#ErrMessage').html('Please select size');  
           return false;
        }
        <?php } ?>
        
        var _MRP = parseFloat($('#MRP').val());
        if (!(_MRP>0)) {
           $('#ErrMessage').html('Please enter MRP');  
           return false;
        }
        
        var _SellingPrice = parseFloat($('#SellingPrice').val());
        if (!(_SellingPrice>0)) {
           $('#ErrMessage').html('Please enter selling price');  
           return false;
        }
        
        if (!(_MRP>=_SellingPrice)) {
            $('#ErrMessage').html('Selling price must bellow MRP');  
            return false;
        }
        
        var param = $( "#form_newprice_"+formid).serialize();
        var _action = (action=="save") ? "PriceTag_Save" : "PriceTag_Update";
        
        $.post( "webservice.php?action="+_action,param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            $('#tbl_priceTag').html(obj.Content);
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a  data-dismiss='modal' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }                                                                                                 
        $("#confrimation_text").html(html);
        }); 
    }
    
    function PriceTag_New(ProductID) {
        $("#confrimation_text").html(loading);
        $('#ConfirmationPopup').modal("show");
        $.ajax({url:'webservice.php?action=PriceTag_New&rand='+ProductID,success:function(data){
            $("#confrimation_text").html(data);
        }});
    }
    
    function PriceTag_Edit(TagID) {
        $("#confrimation_text").html(loading);
        $('#ConfirmationPopup').modal("show");
        $.ajax({url:'webservice.php?action=PriceTag_Edit&TagID='+TagID,success:function(data){
            $("#confrimation_text").html(data);
        }});
    } 
    
    function PriceTag_List() {
        $("#tbl_priceTag").html(loading);
        $.ajax({url:'webservice.php?action=PriceTag_List&ProductID=<?php echo $data[0]['ProductID'];?>',success:function(data){
            $("#tbl_priceTag").html(data);
        }});
    }
    
    function CallConfirmationDeletePrice(PriceTagID){
        var txt = '<form action="" method="POST" id="DeleteForm_'+PriceTagID+'">'
                        +'<input type="hidden" value="'+PriceTagID+'" id="PriceTagID" Name="PriceTagID">'
                        +'<div class="form-group row">'
                            +'<div class="col-sm-12" style="text-align:center">'
                                +'CONFIRMATION'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group row">'
                            +'<div class="col-sm-12" style="text-align:left">'
                                +'Are you sure want to delete?'
                            +'</div>'
                        +'</div>'
                        +'<div style="padding:20px;text-align:center">'
                            +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                            +'<button type="button" class="btn btn-success" onclick="PriceTag_Delete(\''+PriceTagID+'\')" >Yes, Confirm</button>'
                        +'</div></form>';  
        $('#confrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    } 
    
    function PriceTag_Delete(PriceTagID) {
        var param = $( "#DeleteForm_"+PriceTagID).serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=PriceTag_Delete",param,function(data) {
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
            } else {
                $('#tbl_priceTag').html(obj.Content);
                html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                html += "<div style='padding:20px;text-align:center'>" + "<a   data-dismiss='modal'  class='btn btn-outline-danger'>Continue</a></div>"; 
                $('#ConfirmationPopup').modal("show");
            }                                                                                                 
            $("#confrimation_text").html(html);
        });
    } 
</script>