<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_hotel_citynames where HotelCityNameID='".$_GET['City']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            
            
           
                $mysql->execute("update _tbl_hotel_citynames set `CityName`    ='".$_POST['CityName']."',
                                                      `IsActive`       ='".$_POST['IsAcive']."' 
                                                       where HotelCityNameID='".$data[0]['HotelCityNameID']."'");
                                                    
                $successmessage ="Updated Successfully";
        } 
     
    $data= $mysql->Select("select * from _tbl_hotel_citynames where HotelCityNameID='".$_GET['City']."'");
?>
<script>
$(document).ready(function () {
    $("#CityName").blur(function () {
        if(IsNonEmpty("CityName","ErrTourTypeName","Please Enter Product Name")){
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
                                    <div class="card-title">Edit City Name</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">City Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="CityName" name="CityName" placeholder="Enter Taxi Name" value="<?php echo (isset($_POST['CityName']) ? $_POST['CityName'] : $data[0]['CityName']);?>">
                                                <span class="errorstring" id="ErrTourTypeName"><?php echo isset($ErrTourTypeName)? $ErrTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is Delete<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsAcive" id="IsAcive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsAcive'])) ? (($_POST[ 'IsAcive']=="1") ? " selected='selected' " : "") : (($data[0]['IsAcive']=="1") ? " selected='selected' " : "");?>>No</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsAcive'])) ? (($_POST[ 'IsAcive']=="0") ? " selected='selected' " : "") : (($data[0]['IsAcive']=="0") ? " selected='selected' " : "");?>>Yes</option>

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
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update City Name">&nbsp;
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