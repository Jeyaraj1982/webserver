<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
   
            if($ErrorCount==0){
                
                $target_dir = "../assets/food/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;

                  if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {

                   
                    $id = $mysql->insert("_tbl_foods_hotels",array("HotelCityNameID"      => $_POST['HotelCityNameID'],
                                                               "HotelName"    => $_POST['HotelName'],
                                                               "HotelDescription" => $_POST['HotelDescription'],
                                                               "IsActive" => "1",
                                                               "HotelThumb"           => $file));
                     if(sizeof($id)>0){
                        unset($_POST);
                        $successmessage ="Hotel Added Successfully";
                     }
                  }else {
                        $successmessage ="Error Adding Hotel";
                  }
            }
    }
    
?>
<script>
$(document).ready(function () {
    $("#TourType").blur(function () {
       var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
        }else{
            $('#ErrTourType').html("");
        }
    });
    $("#SubTourTypeName").blur(function () {
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter SubTour Type Name")){
           IsAlphaNumeric("SubTourTypeName","ErrSubTourTypeName","Please Enter Alpha Numerics Character"); 
        }
    });
    
    $("#Description").blur(function () {
        IsNonEmpty("Description","ErrDescription","Please Enter Product Description");
    });
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrTourType').html("");
        $('#ErrSubTourTypeName').html("");
        $('#ErrPriceStartingFrom').html("");                                                                             
        
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter SubTour Type Name")){
           IsAlphaNumeric("SubTourTypeName","ErrSubTourTypeName","Please Enter Alpha Numerics Character"); 
        }
        
        IsNonEmpty("Description","ErrDescription","Please Enter Product Description");   
        var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
            ErrorCount++;      
        }else{
            $('#ErrTourType').html("");
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
                                    <div class="card-title">Add Food Hotel</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">City Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="HotelCityNameID" name="HotelCityNameID">  
                                       <?php        if (isset($_GET['id'])) {
                                                    $t= $mysql->Select("select * from _tbl_hotel_citynames where md5(TourTypeID)='".$_GET['id']."'");
                                                    ?>
                                                          <option value="<?php echo  $t[0]['TourTypeID'];?>"  > <?php echo $t[0]['TourTypeName'];?></option>
                                                    <?php
                                       } else {
                                                ?>         
                                                 
                                                    <option value="0" <?php echo ($_POST['TourType']=="0") ? " selected='selected' " : "";?>>Select City Name</option>                                                                                     
                                                <?php $TourTypes = $mysql->select("select * from _tbl_foods_citynames where IsActive='1' order by CityName");?>
                                                <?php foreach($TourTypes as $TourType){ ?>
                                                    <option value="<?php echo $TourType['HotelCityNameID'];?>" <?php echo ($_POST['HotelCityNameID']==$TourType['HotelCityNameID']) ? " selected='selected' " : "";?>> <?php echo $TourType['CityName'];?></option>
                                                <?php }?>
                                                
                                        <?php } ?>        
                                                
                                                </select>
                                                <span class="errorstring" id="ErrTourType"><?php echo isset($ErrTourType)? $ErrTourType : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Hotel Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="HotelName" name="HotelName" placeholder="Enter Hotel Name" value="<?php echo (isset($_POST['HotelName']) ? $_POST['HotelName'] :"");?>">
                                                <span class="errorstring" id="ErrSubTourTypeName"><?php echo isset($ErrSubTourTypeName)? $ErrSubTourTypeName : "";?></span>
                                            </div>
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="HotelDescription" name="HotelDescription" placeholder="Enter Description" value="<?php echo (isset($_POST['HotelDescription']) ? $_POST['HotelDescription'] :"");?>">
                                                <span class="errorstring" id="ErrSubTourTypeName"><?php echo isset($ErrSubTourTypeName)? $ErrSubTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Hostel">&nbsp;
                                                <a href="dashboard.php?action=Food/Hotels/ManageHotels" class="btn btn-warning btn-border">Back</a>
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