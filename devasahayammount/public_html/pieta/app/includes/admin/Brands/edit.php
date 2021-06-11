<?php
$data=$mysql->select("select * from _tbl_brands where md5(BrandID)='".$_GET['id']."'");  
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupBrandName = $mysql->select("select * from _tbl_brands where BrandName='".$_POST['BrandName']."' and BrandID<>'".$data[0]['BrandID']."'");
            if(sizeof($dupBrandName)>0){
                $ErrBrandName ="Brand Name Already Exist";
                $ErrorCount++;
            }
           
            if($ErrorCount==0){
                     
                     $mysql->execute("update _tbl_brands set `BrandName` ='".$_POST['BrandName']."',
                                                             `IsActive`  ='".$_POST['IsActive']."' where BrandID='".$data[0]['BrandID']."'");                                   
             ?>
            <script>
                  $(document).ready(function() {
                        swal("updated successfully", {
                            icon : "success" 
                        });
                     });
                </script> 
       <?php     }
        
    }                     
                
  $data=$mysql->select("select * from _tbl_brands where md5(BrandID)='".$_GET['id']."'");   
 $pc= $mysql->Select("SELECT COUNT(ProductID) AS cnt FROM _tbl_products where BrandID='".$data[0]['BrandID']."'"); 
?>
<script>
$(document).ready(function () {
    $("#BrandName").blur(function () {
        if(IsNonEmpty("BrandName","ErrBrandName","Please Enter Brand Name")){
           IsAlphaNumeric("BrandName","ErrBrandName","Please Enter Alpha Numerics Character"); 
        }
    });
});

</script>
      
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add Brand</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitBrand();" id="addBrand" enctype="multipart/form-data">
                                   <input type="hidden" value="<?php echo $pc[0]['cnt'];?>" name="ProductCount" id="ProductCount">
                                   <div class="card-body">
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Brand Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Enter Brand Name" value="<?php echo (isset($_POST['BrandName']) ? $_POST['BrandName'] :$data[0]['BrandName']);?>">
                                            <span class="errorstring" id="ErrBrandName"><?php echo isset($ErrBrandName)? $ErrBrandName : "";?></span>
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Is Active</label>
                                            <select class="form-control" name="IsActive" id="IsActive">
                                                <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
                                            </select>                                                                                                       
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update Brand</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Update Brand</button>
                                                <a href="dashboard.php?action=Brands/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
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

function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrBrandName').html("");
        
        if(IsNonEmpty("BrandName","ErrBrandName","Please Enter Brand Name")){
           IsAlphaNumeric("BrandName","ErrBrandName","Please Enter Alpha Numerics Character"); 
        }
        
        if(ErrorCount==0) {
            if($('#IsActive').val()=="0" && $('#ProductCount').val()>0){
                Errormsg = "<span style='color:red'> Brand have Products</span>";
            }else{
                Errormsg ="";
            }
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to update brand?<br>'
                                +''+Errormsg+''
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UpdateBrand()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function UpdateBrand() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

