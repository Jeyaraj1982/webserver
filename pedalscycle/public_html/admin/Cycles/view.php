<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Product Information</div>
                                </div>
                                    <div class="card-body">
                                          
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ProductName'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Short Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ShortDescription'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Description'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Price</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ProductPrice'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Offer Price</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['OfferPrice'];?></div>
                                        </div>                                                 
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Rating</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ProductRating'];?></div>
                                        </div>
                                                                   
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsPublish</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($data[0]['IsPublish']=="1"){ echo "Yes";}else { echo "No";} ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Added On</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddedOn'];?></div>
                                        </div>
                                        
                                          <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"> </label>
                                            <div class="col-lg-9 col-md-9 col-sm-4 mt-sm-2 text-left"> 
                                            <form action="" method="post">
                                            <?php
                                                if (isset($_POST['btnFeatured'])) {
                                                 $mysql->execute("update _tbl_products set IsFeatured='1' where ProductID='".$data[0]['ProductID']."'")   ;
                                                } 
                                                if (isset($_POST['btnUnFeatured'])) {
                                                 $mysql->execute("update _tbl_products set IsFeatured='0' where ProductID='".$data[0]['ProductID']."'")   ;
                                                }
                                                
                                                 if (isset($_POST['IsUpcomming'])) {
                                                 $mysql->execute("update _tbl_products set IsUpcomming='1' where ProductID='".$data[0]['ProductID']."'")   ;
                                                } 
                                                if (isset($_POST['IsUnUpcomming'])) {
                                                 $mysql->execute("update _tbl_products set IsUpcomming='0' where ProductID='".$data[0]['ProductID']."'")   ;
                                                } 
                                                
                                                if (isset($_POST['IsPopular'])) {
                                                 $mysql->execute("update _tbl_products set IsPopular='1' where ProductID='".$data[0]['ProductID']."'")   ;
                                                } 
                                                if (isset($_POST['IsUnPopular'])) {
                                                 $mysql->execute("update _tbl_products set IsPopular='0' where ProductID='".$data[0]['ProductID']."'")   ;
                                                } 
                                                
                                                 if (isset($_POST['IsNew'])) {
                                                 $mysql->execute("update _tbl_products set IsNew='1' where ProductID='".$data[0]['ProductID']."'")   ;
                                                } 
                                                if (isset($_POST['IsUnNew'])) {
                                                 $mysql->execute("update _tbl_products set IsNew='0' where ProductID='".$data[0]['ProductID']."'")   ;
                                                }
                                                
                                                $data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
                                            ?>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                            
                                                
                                              
                                                <?php if ($data[0]['IsNew']==0) {?>     
                                                <input type="submit" value="New Products" name="IsNew" class="btn btn-gray btn-sm">&nbsp;&nbsp;
                                                <?php } else { ?>                             
                                                <button type="submit"  name="IsUnNew" class="btn btn-primary btn-sm"><i class="fas fa-check"></i>&nbsp;&nbsp;New Products</button>&nbsp;&nbsp;
                                                <?php } ?> 
                                                
                                                <?php if ($data[0]['IsPopular']==0) {?>     
                                                <input type="submit" value="Popular Products" name="IsPopular" class="btn btn-gray btn-sm">&nbsp;&nbsp;
                                                <?php } else { ?>                             
                                                <button type="submit"  name="IsUnPopular" class="btn btn-primary btn-sm"><i class="fas fa-check"></i>&nbsp;&nbsp;Popular Products</button>&nbsp;&nbsp;
                                                <?php } ?>
                                               <br><br> 
                                                 <?php if ($data[0]['IsFeatured']==0) {?>     
                                                <input type="submit" value="Featured Products" name="btnFeatured" class="btn btn-gray btn-sm">&nbsp;&nbsp;
                                                <?php } else { ?>                             
                                                <button type="submit"  name="btnUnFeatured" class="btn btn-primary btn-sm"><i class="fas fa-check"></i>&nbsp;&nbsp;Featured Products</button>&nbsp;&nbsp;
                                                <?php } ?>
                                                
                                                
                                                  <?php if ($data[0]['IsUpcomming']==0) {?> 
                                                <input type="submit" value="Upcomming Products" name="IsUpcomming" class="btn btn-gray btn-sm">&nbsp;&nbsp;
                                                <?php } else { ?>                             
                                                <button type="submit"  name="IsUnUpcomming" class="btn btn-primary btn-sm"><i class="fas fa-check"></i>&nbsp;&nbsp;Upcomming Products</button>&nbsp;&nbsp;
                                                <?php } ?>
                                                
                                                
                                                
                                               </form>
                                               </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">                                  
                                                <a href="dashboard.php?action=Cycles/list" class="btn btn-warning">Back</a>
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
                                               
                                                $target_dir = "../assets/products/";
                                                $image = strtolower(time()."_".$_FILES['file']["name"]);
                                              
                                                if (move_uploaded_file($_FILES['file']["tmp_name"], $target_dir .$image)) {
                                                    $mysql->insert("_tbl_products_images",array("ProductID"=>$data[0]['ProductID'],
                                                                                               "ImageName"=>$image,
                                                                                               "ImageOrder"=>sizeof($mysql->select("select * from _tbl_products_image where IsDelete='0' ProductID='".$data[0]['ProductID']."'"))+1,
                                                                                               "IsDelete"=>"0"));
                                                        }
                                            }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="file" name="file"><br>
                                            
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
                                    ?>
                                        <div class="col-sm-3">
                                            <img src="../assets/products/<?php echo $image['ImageName'];?>" style="width:100%">
                                            <?php
                                                list($width, $height) = getimagesize("../assets/products/".$image['ImageName']);
                                                //echo $width."px x ".$height."px";
                                            ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="ImageID" value="<?php echo $image['ImageID'];?>">
                                                <select name="ImageOrder" class="form-control">
                                                    <option value="0">Select Order</option>            
                                                    <?php for($i=1;$i<=sizeof($images);$i++) { ?>
                                                            <option value="<?php echo $i;?>" <?php echo ($i==$image['ImageOrder']) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                                            <?php
                                                        }
                                                    ?>
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
                    
                     
                     
                    <div class="row" style="display: none;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Enquiry
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Requested</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">City</th>                                 
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Date</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Enquiries = $mysql->select("select * from _tbl_tour_enquiry where PackageID='".$data[0]['PackageID']."'");   ?>
                                        <?php foreach($Enquiries as $Enquiry){ ?>
                                            <?php $DateCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$Enquiry['PackageID']."' and DateandCostID='".$Enquiry['PackageDateandCostID']."'");   ?>
                                            <tr>
                                                <td><?php echo date("M,d Y", strtotime($Enquiry['CreatedOn']));?></td>
                                                <td><?php echo $Enquiry['FullName'];?></td>
                                                <td><?php echo $Enquiry['CurrentCity'];?></td>
                                                <td><?php echo $Enquiry['MobileNumber'];?></td>
                                                <td><?php echo date("M,d Y", strtotime($DateCosts[0]['TourDate']));?></td>
                                                <td><a href="javascript:void(0)"  onclick="ViewEnquiryDetails('<?php echo md5($Enquiry['EnquiryID']);?>')">View</a></td>
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

<?php include_once("footer.php");?>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="confrimation_text">    
         
    </div>
  </div>
</div>
<script>
 var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
 function AddDayandEventDetails(PackageID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=AddDayandEventDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
 function SaveDayandEventDetails() {
         var param = $( "#DayandEventFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitDayandEventDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
    function EditDayandEventDetails(DayandEventID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=EditDayandEventDetails&DayandEventID='+DayandEventID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    
    function UpdateDayandEventDetails() {
        var param = $( "#EditDayandEventFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitUpdateDayandEventDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                 
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
 function AddDateandCostDetails(PackageID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=AddDateandCostDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
 function SaveDateandCostDetails() {
         var param = $( "#DateandCostFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitDateandCostDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
 
 function EditDateandCostDetails(DateandCostID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=EditDateandCostDetails&DateandCostID='+DateandCostID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    
    function UpdateDateandCostDetails() {
        var param = $( "#EditDateandCostFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitUpdateDateandCostDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                 
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
    function ViewEnquiryDetails(EnquiryID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=ViewEnquiryDetails&EnquiryID='+EnquiryID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    function ViewEnquiryByDate(DateandCostID,rowid) {   
        $("#EnquiryDetails").html(loading);
        $.ajax({url:'webservice.php?action=ViewEnquiryByDate&DateandCostID='+DateandCostID+'&rowid='+rowid,success:function(data){
            $("#EnquiryDetails_"+rowid).last().after(data);
        }});                                                               
    }                                                                                                             
     
     function CallConfirmationDeleteDateCost(DateandCostID){
        var txt = '<form action="" method="POST" id="DateandCostFrm'+DateandCostID+'">'
                        +'<input type="hidden" value="'+DateandCostID+'" id="DateandCostID" Name="DateandCostID">'
                        +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:center">'
                            +'CONFIRMATION'
                        +'</div>'
                   +'</div>'
                   +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:left">'
                        +'Are you sure want to delete date and cost?'
                        +'</div>'
                    +'</div>'
                    +'<div style="padding:20px;text-align:center">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="DeleteDateandCost(\''+DateandCostID+'\')" >Yes, Confirm</button>'
                     +'</div></form>';  
            $('#confrimation_text').html(txt);                                       
            $('#ConfirmationPopup').modal("show");
    } 
    function DeleteDateandCost(DateandCostID) {
     var param = $( "#DateandCostFrm"+DateandCostID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteDateandCost",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }                                                                                                 
        $("#confrimation_text").html(html);
        
    });
}
function CallConfirmationDeleteDayEvent(DayandEventID){
        var txt = '<form action="" method="POST" id="DayandEventDeleteFrm'+DayandEventID+'">'
                        +'<input type="hidden" value="'+DayandEventID+'" id="DayandEventID" Name="DayandEventID">'
                        +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:center">'
                            +'CONFIRMATION'
                        +'</div>'
                   +'</div>'
                   +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:left">'
                        +'Are you sure want to delete day and event?'
                        +'</div>'
                    +'</div>'
                    +'<div style="padding:20px;text-align:center">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="DeleteDayandEvent(\''+DayandEventID+'\')" >Yes, Confirm</button>'
                     +'</div></form>';  
            $('#confrimation_text').html(txt);                                       
            $('#ConfirmationPopup').modal("show");
    } 
    function DeleteDayandEvent(DayandEventID) {
     var param = $( "#DayandEventDeleteFrm"+DayandEventID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteDayandEvent",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }                                                                                                 
        $("#confrimation_text").html(html);
        
    });
} 
function AddAdditionalDetails() {
         var param = $( "#additionparamsFrm").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitAdditionalDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                                        
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a data-dismiss='modal' class='btn btn-primary' style='color:white'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
 
 </script>