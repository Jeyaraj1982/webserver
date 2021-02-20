<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 
    
    $data= $mysql->Select("select * from _tbl_hotels where md5(HotelID)='".$_GET['Hotel']."'");
     
?>
 

         
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">  Hotel Information</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">City Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                 <select class="form-control" id="HotelCityNameID" name="HotelCityNameID" disabled="disabled">   
                                                    <option value="0" <?php echo ($_POST['TourType']=="0") ? " selected='selected' " : "";?>>Select Tour Type</option>                                                                                     
                                                <?php $TourTypes = $mysql->select("select * from _tbl_hotel_citynames where IsActive='1' order by CityName");?>
                                                <?php foreach($TourTypes as $TourType){ ?>
                                                    <option value="<?php echo $TourType['HotelCityNameID'];?>" <?php echo (isset($_POST[ 'HotelCityNameID'])) ? (($_POST[ 'HotelCityNameID']==$TourType['HotelCityNameID']) ? " selected='selected' " : "") : (($data[0]['HotelCityNameID']==$TourType['HotelCityNameID']) ? " selected='selected' " : "");?>><?php echo $TourType['CityName'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrTourType"><?php echo isset($ErrTourType)? $ErrTourType : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Hotel Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="HotelName" name="HotelName" disabled="disabled" placeholder="Enter Hotel Name" value="<?php echo (isset($_POST['HotelName']) ? $_POST['HotelName'] : $data[0]['HotelName']);?>">
                                                <span class="errorstring" id="ErrSubTourTypeName"><?php echo isset($ErrSubTourTypeName)? $ErrSubTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="HotelDescription" disabled="disabled" name="HotelDescription" placeholder="Enter  Description" value="<?php echo (isset($_POST['HotelDescription']) ? $_POST['HotelDescription'] : $data[0]['HotelDescription']);?>">
                                                <span class="errorstring" id="ErrPriceStartingFrom"><?php echo isset($ErrPriceStartingFrom)? $ErrPriceStartingFrom : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"><span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="hidden" name="uploadimage1" id="uploadimage1" value="<?php echo $data[0]['Image'];?>">
                                                <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
                                                <div id="div_1">
                                                    <?php if(strlen($data[0]['HotelThumb'])>1) { ?>
                                                        <img src="../<?php echo "assets/hotel/".$data[0]['HotelThumb'];?>" style='width: 100%;margin-top: 5px;'>
                                                    <?php } ?>
                                                       
                                                </div>
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                                <img src='../assets/loading.gif' style='width:0px'>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                             
                                                <a href="dashboard.php?action=Hotel/Hotels/ManageHotels&id=<?php echo md5($data[0]['TourTypeID']);?>" class="btn btn-warning btn-border">Back</a>
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