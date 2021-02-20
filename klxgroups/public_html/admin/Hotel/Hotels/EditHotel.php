<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 
    
    $data= $mysql->Select("select * from _tbl_hotels where md5(HotelID)='".$_GET['Hotel']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
        
      
        if($ErrorCount==0){
            
            if(strlen($_FILES["uploadimage1"]["name"])>0) {
                $target_dir = "../assets/hotel/";
                $file =  $_FILES["uploadimage1"]["name"];
                $target_file = $target_dir .$file;
                if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                        
                } 
                
            } else {
                $file = $data[0]['HotelThumb'];
            } 
                
            $mysql->execute("update _tbl_hotels set `HotelCityNameID`        = '".$_POST['HotelCityNameID']."',
                                                      `HotelName`      = '".$_POST['HotelName']."',
                                                      `HotelDescription`   = '".$_POST['HotelDescription']."',
                                                      `IsActive` = '".$_POST['IsActive']."',
                                                      `HotelThumb`             = '".$file."' where md5(HotelID)='".$_GET['Hotel']."'");
            $successmessage ="Updated Successfully";
        }else {
            $successmessage ="Error updating ";
        }
    }
    $data= $mysql->Select("select * from _tbl_hotels where md5(HotelID)='".$_GET['Hotel']."'");
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
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter Sub Tour Type Name")){
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
        $('#ErrDescription').html("");
        
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter Sub Tour Type Name")){
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
                                    <div class="card-title">Edit Hotel Information</div>
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
                                                <?php $TourTypes = $mysql->select("select * from _tbl_hotel_citynames where IsActive='1' order by CityName");?>
                                                <?php foreach($TourTypes as $TourType){ ?>
                                                    <option value="<?php echo $TourType['HotelCityNameID'];?>" <?php echo ($data[0]['HotelCityNameID']==$TourType['HotelCityNameID']) ? " selected='selected' " : "";?>> <?php echo $TourType['CityName'];?></option>
                                                <?php }?>
                                                
                                        <?php } ?>        
                                                
                                                </select>
                                                <span class="errorstring" id="ErrTourType"><?php echo isset($ErrTourType)? $ErrTourType : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Hotel Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="HotelName" name="HotelName" placeholder="Enter Hotel Name" value="<?php echo (isset($_POST['HotelName']) ? $_POST['HotelName'] : $data[0]['HotelName']);?>">
                                                <span class="errorstring" id="ErrSubTourTypeName"><?php echo isset($ErrSubTourTypeName)? $ErrSubTourTypeName : "";?></span>
                                            </div>
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="HotelDescription" name="HotelDescription" placeholder="Enter Description" value="<?php echo (isset($_POST['HotelDescription']) ? $_POST['HotelDescription'] : $data[0]['HotelDescription']);?>">
                                                <span class="errorstring" id="ErrSubTourTypeName"><?php echo isset($ErrSubTourTypeName)? $ErrSubTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="hidden" name="uploadimage1" id="uploadimage1">
                                                <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
                                                <div id="div_1">
                                                    <?php if(strlen($data[0]['HotelThumb'])>1) { ?>
                                                        <img src="../assets/hotel/<?php echo $data[0]['HotelThumb'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                                    <?php } ?>
                                                        <input type="file" name="uploadimage1" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                </div>
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                                <img src='../assets/loading.gif' style='width:0px'>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is Delete<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsActive" id="IsActive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>No</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>Yes</option>
                                                </select>                                                                                                       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update ">&nbsp;
                                                <a href="dashboard.php?action=Tours/viewsubtours&id=<?php echo md5($data[0]['TourTypeID']);?>" class="btn btn-warning btn-border">Back</a>
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