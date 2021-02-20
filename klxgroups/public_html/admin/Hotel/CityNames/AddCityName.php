<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
             
                
                     

                  
                     
                     $id = $mysql->insert("_tbl_hotel_citynames",array("CityName"  => $_POST['CityName'],
                                                            
                                                            "IsActive"         => "1"));
                     if(sizeof($id)>0){
                        unset($_POST);
                        $successmessage ="Taxi Type Added Successfully";
                     }
                   
        
         
    }
    
?>
<script>
$(document).ready(function () {
    $("#CityName").blur(function () {
        if(IsNonEmpty("CityName","ErrTourTypeName","Please Enter City Name")){
           IsAlphaNumeric("CityName","ErrTourTypeName","Please Enter Alpha Numerics Character"); 
        }
    });
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrTourTypeName').html("");
        
        if(IsNonEmpty("CityName","ErrTourTypeName","Please Enter City Name")){
           IsAlphaNumeric("CityName","ErrTourTypeName","Please Enter Alpha Numerics Character"); 
        }
                return (ErrorCount==0) ? true : false;
         }
</script>

         
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add Taxi Type</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">City Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="CityName" name="CityName" placeholder="Enter CityName" value="<?php echo (isset($_POST['CityName']) ? $_POST['CityName'] :"");?>">
                                                <span class="errorstring" id="ErrTourTypeName"><?php echo isset($ErrTourTypeName)? $ErrTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add City Name">&nbsp;
                                                <a href="dashboard.php?action=Hotel/CityNames/CityNames" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php include_once("footer.php");?>