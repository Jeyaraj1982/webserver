<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupBrandName = $mysql->select("select * from _tbl_brands where BrandName='".$_POST['BrandName']."'");
            if(sizeof($dupBrandName)>0){
                $ErrBrandName ="Brand Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _tbl_brands")) + 1;
                   $BrandCode ="BRND0000".$random;
               
              $id = $mysql->insert("_tbl_brands",array("BrandCode"          => $BrandCode,
                                                         "BrandName"          => $_POST['BrandName'],
                                                         "AddedOn"              => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){
                unset($_POST);
                    $link="Brands/list&status=All";
                ?>
                <script>
                 $(document).ready(function() {
                    successpopup('<?php echo $link;?>');
                 }); 
            </script>
       <?php     }
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error Add Brands", "warning")
             });
            </script>
           <?php   }
                                         
                
    }
    
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
                                   <div class="card-body">
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Brand Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Enter Brand Name" value="<?php echo (isset($_POST['BrandName']) ? $_POST['BrandName'] :"");?>">
                                            <span class="errorstring" id="ErrBrandName"><?php echo isset($ErrBrandName)? $ErrBrandName : "";?></span>
                                        </div> 
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Brand</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Brand</button>
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
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to add brand?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddBrand()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function AddBrand() {
    $( "#btnsubmit" ).trigger( "click" );
}
function successpopup(link){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'<img src="http://japps.online/demo/admin/assets/tick.jpg" style="width:30%"><br><span>Brand Added Successfully</span>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action='+link+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
</script>

