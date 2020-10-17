
<style>
.fileupload_cancelbutton{
    position: absolute;
    cursor: pointer;
    left: 102px;
}

</style>
<?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="4") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Type<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
                <option value="Apartments" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Apartments") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Apartments") ? " selected='selected' " : "");?>>Apartments</option>
                <option value="Builder Floors" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Builder Floors") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Builder Floors") ? " selected='selected' " : "");?>>Builder Floors</option>
                <?php if($pageContent[0]['subcateid']=="4"){ ?>
                    <option value="Farm House" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Farm House") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Farm House") ? " selected='selected' " : "");?>>Farm Houses</option> 
                <?php } ?>
                <option value="Houses & Villas" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Houses & Villas") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Houses & Villas") ? " selected='selected' " : "");?>>Houses & Villas</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Bedrooms</label>
        <select name="BedRooms" id="BedRooms" class="form-control">
            <option value="1" <?php echo (isset($_POST[ 'BedRooms'])) ? (($_POST[ 'BedRooms']=="1") ? " selected='selected' " : "") : (($pageContent[0]['BedRooms']=="1") ? " selected='selected' " : "");?>>1</option>
            <option value="2" <?php echo (isset($_POST[ 'BedRooms'])) ? (($_POST[ 'BedRooms']=="2") ? " selected='selected' " : "") : (($pageContent[0]['BedRooms']=="2") ? " selected='selected' " : "");?>>2</option>
            <option value="3" <?php echo (isset($_POST[ 'BedRooms'])) ? (($_POST[ 'BedRooms']=="3") ? " selected='selected' " : "") : (($pageContent[0]['BedRooms']=="3") ? " selected='selected' " : "");?>>3</option>
            <option value="4" <?php echo (isset($_POST[ 'BedRooms'])) ? (($_POST[ 'BedRooms']=="4") ? " selected='selected' " : "") : (($pageContent[0]['BedRooms']=="4") ? " selected='selected' " : "");?>>4</option>
            <option value="4+" <?php echo (isset($_POST[ 'BedRooms'])) ? (($_POST[ 'BedRooms']=="4+") ? " selected='selected' " : "") : (($pageContent[0]['BedRooms']=="4+") ? " selected='selected' " : "");?>>4+</option>
        </select> 
        <div class="errorstring" id="ErrBedRooms"><?php echo isset($ErrBedRooms)? $ErrBedRooms : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Bathrooms</label>
        <select name="BathRooms" id="BathRooms" class="form-control">
            <option value="1" <?php echo (isset($_POST[ 'BathRooms'])) ? (($_POST[ 'BathRooms']=="1") ? " selected='selected' " : "") : (($pageContent[0]['BathRooms']=="1") ? " selected='selected' " : "");?>>1</option>
            <option value="2" <?php echo (isset($_POST[ 'BathRooms'])) ? (($_POST[ 'BathRooms']=="2") ? " selected='selected' " : "") : (($pageContent[0]['BathRooms']=="2") ? " selected='selected' " : "");?>>2</option>
            <option value="3" <?php echo (isset($_POST[ 'BathRooms'])) ? (($_POST[ 'BathRooms']=="3") ? " selected='selected' " : "") : (($pageContent[0]['BathRooms']=="3") ? " selected='selected' " : "");?>>3</option>
            <option value="4" <?php echo (isset($_POST[ 'BathRooms'])) ? (($_POST[ 'BathRooms']=="4") ? " selected='selected' " : "") : (($pageContent[0]['BathRooms']=="4") ? " selected='selected' " : "");?>>4</option>
            <option value="4+" <?php echo (isset($_POST[ 'BathRooms'])) ? (($_POST[ 'BathRooms']=="4+") ? " selected='selected' " : "") : (($pageContent[0]['BathRooms']=="4+") ? " selected='selected' " : "");?>>4+</option>
        </select> 
        <div class="errorstring" id="ErrBathRooms"><?php echo isset($ErrBathRooms)? $ErrBathRooms : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="23"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>SubType<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
                <option value="Guest Houses" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Guest Houses") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Guest Houses") ? " selected='selected' " : "");?>>Guest Houses</option>
                <option value="PG"  <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="PG") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="PG") ? " selected='selected' " : "");?>>PG</option>
                <option value="Roommate"  <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Roommate") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Roommate") ? " selected='selected' " : "");?>>Roommate</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>    
<?php } ?>
<?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="21" || $pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="22"|| $pageContent[0]['subcateid']=="23") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Furnishing</label>
        <select name="Furnishing" id="Furnishing" class="form-control">
            <option value="Furnished" <?php echo (isset($_POST[ 'Furnishing'])) ? (($_POST[ 'Furnishing']=="Furnished") ? " selected='selected' " : "") : (($pageContent[0]['Furnishing']=="Furnished") ? " selected='selected' " : "");?>>Furnished</option>
            <option value="Semi-Furnished"<?php echo (isset($_POST[ 'Furnishing'])) ? (($_POST[ 'Furnishing']=="Semi-Furnished") ? " selected='selected' " : "") : (($pageContent[0]['Furnishing']=="Semi-Furnished") ? " selected='selected' " : "");?>>Semi-Furnished</option>
            <option value="Unfurnished" <?php echo (isset($_POST[ 'Furnishing'])) ? (($_POST[ 'Furnishing']=="Unfurnished") ? " selected='selected' " : "") : (($pageContent[0]['Furnishing']=="Unfurnished") ? " selected='selected' " : "");?>>Unfurnished</option>
        </select> 
        <div class="errorstring" id="ErrFurnishing"><?php echo isset($ErrFurnishing)? $ErrFurnishing : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="24"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Type<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
                <option value="For Rent" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="For Rent") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="For Rent") ? " selected='selected' " : "");?>>For Rent</option>
                <option value="For Sale" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="For sale") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="For Sale") ? " selected='selected' " : "");?>>For Sale</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>    
<?php } ?>

<?php if($pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="22"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Construction Status</label>
        <select name="ConstructionStatus" id="ConstructionStatus" class="form-control">
            <option value="New Launch" <?php echo (isset($_POST[ 'ConstructionStatus'])) ? (($_POST[ 'ConstructionStatus']=="New Launch") ? " selected='selected' " : "") : (($pageContent[0]['ConstructionStatus']=="New Launch") ? " selected='selected' " : "");?>>New Launch</option>
            <option value="Ready to Move" <?php echo (isset($_POST[ 'ConstructionStatus'])) ? (($_POST[ 'ConstructionStatus']=="Ready To Move") ? " selected='selected' " : "") : (($pageContent[0]['ConstructionStatus']=="Ready To Move") ? " selected='selected' " : "");?>>Ready to Move</option>
            <option value="Under Construction"  <?php echo (isset($_POST[ 'ConstructionStatus'])) ? (($_POST[ 'ConstructionStatus']=="Under Construction") ? " selected='selected' " : "") : (($pageContent[0]['ConstructionStatus']=="Under Construction") ? " selected='selected' " : "");?>>Under Construction</option>
        </select> 
        <div class="errorstring" id="ErrConstructionStatus"><?php echo isset($ErrConstructionStatus)? $ErrListedBy : "";?></div>
    </div>
</div>    
<?php } ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Listed By</label>
        <select name="ListedBy" id="ListedBy" class="form-control">
            <option value="Builder"<?php echo (isset($_POST[ 'ListedBy'])) ? (($_POST[ 'ListedBy']=="Builder") ? " selected='selected' " : "") : (($pageContent[0]['ListedBy']=="Builder") ? " selected='selected' " : "");?>>Builder</option>
            <option value="Dealer"<?php echo (isset($_POST[ 'ListedBy'])) ? (($_POST[ 'ListedBy']=="Dealer") ? " selected='selected' " : "") : (($pageContent[0]['ListedBy']=="Dealer") ? " selected='selected' " : "");?>>Dealer</option>
            <option value="Owner"<?php echo (isset($_POST[ 'ListedBy'])) ? (($_POST[ 'ListedBy']=="Owner") ? " selected='selected' " : "") : (($pageContent[0]['ListedBy']=="Owner") ? " selected='selected' " : "");?>>Owner</option>
        </select> 
        <div class="errorstring" id="ErrListedBy"><?php echo isset($ErrListedBy)? $ErrListedBy : "";?></div>
    </div>
</div>
<?php if($pageContent[0]['subcateid']=="24"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Plot Area<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="PlotArea" id="PlotArea"  maxlength="74" value="<?php echo isset($_POST['PlotArea']) ? $_POST['PlotArea'] : $pageContent[0]['PlotArea']; ?>">
        <div class="errorstring" id="ErrPlotArea"><?php echo isset($ErrPlotArea)? $ErrPlotArea : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Length</label>
        <input type="text" class="form-control" name="Length" id="Length"  maxlength="74" value="<?php echo isset($_POST['Length']) ? $_POST['Length'] : $pageContent[0]['Length']; ?>">
        <div class="errorstring" id="ErrLength"><?php echo isset($ErrLength)? $ErrLength : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Breadth</label>
        <input type="text" class="form-control" name="Breadth" id="Breadth"  maxlength="74" value="<?php echo isset($_POST['Breadth']) ? $_POST['Breadth'] : $pageContent[0]['Breadth']; ?>">
        <div class="errorstring" id="ErrBreadth"><?php echo isset($ErrBreadth)? $ErrBreadth : "";?></div>
    </div>
</div>    
<?php } ?>
<?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="21" || $pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="22") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Super Builtup Area (ft)<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="SuperBuildUpArea" id="SuperBuildUpArea"  maxlength="74" value="<?php echo isset($_POST['SuperBuildUpArea']) ? $_POST['SuperBuildUpArea'] : $pageContent[0]['SuperBuildUpArea']; ?>">
        <div class="errorstring" id="ErrSuperBuildUpArea"><?php echo isset($ErrSuperBuildUpArea)? $ErrSuperBuildUpArea : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Carpet Area (ft)<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="CarpetArea" id="CarpetArea"  maxlength="74" value="<?php echo isset($_POST['CarpetArea']) ? $_POST['CarpetArea'] : $pageContent[0]['CarpetArea']; ?>">
        <div class="errorstring" id="ErrCarpetArea"><?php echo isset($ErrCarpetArea)? $ErrCarpetArea : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="20"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Bachelors Allowed</label>
        <select name="BachelorsAllowed" id="BachelorsAllowed" class="form-control">
            <option value="Yes" <?php echo (isset($_POST[ 'BachelorsAllowed'])) ? (($_POST[ 'ListedBy']=="Yes") ? " selected='selected' " : "") : (($pageContent[0]['BachelorsAllowed']=="Yes") ? " selected='selected' " : "");?>>Yes</option>
            <option value="No" <?php echo (isset($_POST[ 'BachelorsAllowed'])) ? (($_POST[ 'ListedBy']=="No") ? " selected='selected' " : "") : (($pageContent[0]['BachelorsAllowed']=="No") ? " selected='selected' " : "");?>>No</option>
        </select> 
        <div class="errorstring" id="ErrBachelorsAllowed"><?php echo isset($ErrBachelorsAllowed)? $ErrBachelorsAllowed : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="21" || $pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="22") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Maintenance (Monthly)</label>
        <input type="text" class="form-control" name="Maintenance" id="Maintenance" value="<?php echo isset($_POST['Maintenance']) ? $_POST['Maintenance'] : $pageContent[0]['Maintenance']; ?>">
        <div class="errorstring" id="ErrMaintenance"><?php echo isset($ErrMaintenance)? $ErrMaintenance : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="4") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Total Floors</label>
        <input type="text" class="form-control" name="TotalFloors" id="TotalFloors" value="<?php echo isset($_POST['TotalFloors']) ? $_POST['TotalFloors'] : $pageContent[0]['TotalFloors']; ?>">
        <div class="errorstring" id="ErrTotalFloors"><?php echo isset($ErrTotalFloors)? $ErrTotalFloors : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Floor No</label>
        <input type="text" class="form-control" name="FloorNo" id="FloorNo" value="<?php echo isset($_POST['FloorNo']) ? $_POST['FloorNo'] : $pageContent[0]['FloorNo']; ?>">
        <div class="errorstring" id="ErrFloorNo"><?php echo isset($ErrFloorNo)? $ErrFloorNo : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="21" || $pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="22" || $pageContent[0]['subcateid']=="23") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Car Parking</label>
        <select name="CarParking" id="CarParking" class="form-control">
            <option value="1" <?php echo (isset($_POST[ 'CarParking'])) ? (($_POST[ 'CarParking']=="1") ? " selected='selected' " : "") : (($pageContent[0]['CarParking']=="1") ? " selected='selected' " : "");?>>1</option>
            <option value="2" <?php echo (isset($_POST[ 'CarParking'])) ? (($_POST[ 'CarParking']=="2") ? " selected='selected' " : "") : (($pageContent[0]['CarParking']=="2") ? " selected='selected' " : "");?>>2</option>
            <option value="3" <?php echo (isset($_POST[ 'CarParking'])) ? (($_POST[ 'CarParking']=="3") ? " selected='selected' " : "") : (($pageContent[0]['CarParking']=="3") ? " selected='selected' " : "");?>>3</option>
            <option value="3+" <?php echo (isset($_POST[ 'CarParking'])) ? (($_POST[ 'CarParking']=="3+") ? " selected='selected' " : "") : (($pageContent[0]['CarParking']=="3+") ? " selected='selected' " : "");?>>3+</option>
        </select> 
        <div class="errorstring" id="ErrCarParking"><?php echo isset($ErrCarParking)? $ErrCarParking : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="23") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Meals Included</label>
        <select name="MealsIncluded" id="MealsIncluded" class="form-control">
            <option value="Yes" <?php echo (isset($_POST[ 'MealsIncluded'])) ? (($_POST[ 'MealsIncluded']=="Yes") ? " selected='selected' " : "") : (($pageContent[0]['MealsIncluded']=="Yes") ? " selected='selected' " : "");?>>Yes</option>
            <option value="No" <?php echo (isset($_POST[ 'MealsIncluded'])) ? (($_POST[ 'MealsIncluded']=="No") ? " selected='selected' " : "") : (($pageContent[0]['MealsIncluded']=="No") ? " selected='selected' " : "");?>>No</option>
        </select> 
        <div class="errorstring" id="ErrMealsIncluded"><?php echo isset($ErrMealsIncluded)? $ErrMealsIncluded : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="24") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Facing</label>
        <select name="Facing" id="Facing" class="form-control">
            <option value="East" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="East") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="East") ? " selected='selected' " : "");?>>East</option>
            <option value="North" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="North") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="North") ? " selected='selected' " : "");?>>North</option>
            <option value="North-East" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="North-East") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="North-East") ? " selected='selected' " : "");?>>North-East</option>
            <option value="North-West" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="North-West") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="North-West") ? " selected='selected' " : "");?>>North-West</option>
            <option value="South" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="South") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="South") ? " selected='selected' " : "");?>>South</option>
            <option value="South-East" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="South-East") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="South-East") ? " selected='selected' " : "");?>>South-East</option>
            <option value="South-West" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="South-West") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="South-West") ? " selected='selected' " : "");?>>South-West</option>
            <option value="West" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="West") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="West") ? " selected='selected' " : "");?>>West</option>
            <option value="No Preferred" <?php echo (isset($_POST[ 'Facing'])) ? (($_POST[ 'Facing']=="No Preferred") ? " selected='selected' " : "") : (($pageContent[0]['Facing']=="No Preferred") ? " selected='selected' " : "");?>>No Preferred</option>
        </select> 
        <div class="errorstring" id="ErrFacing"><?php echo isset($ErrFacing)? $ErrFacing : "";?></div>
    </div>                                                                                                     
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']=="21" || $pageContent[0]['subcateid']=="22") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Washrooms</label>
        <input type="text" class="form-control" name="Washrooms" id="Washrooms"  maxlength="74" value="<?php echo isset($_POST['Washrooms']) ? $_POST['Washrooms'] : $pageContent[0]['Washrooms']; ?>">
        <div class="errorstring" id="ErrWashrooms"><?php echo isset($ErrWashrooms)? $ErrWashrooms : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($pageContent[0]['subcateid']<>"23") {?>
<!--<div class="row mb-2">
    <div class="col-sm-12">
        <label>Project Name</label>
        <input type="text" class="form-control" name="ProjectName" id="ProjectName"  maxlength="74" value="<?php echo isset($_POST['ProjectName']) ? $_POST['ProjectName'] : ""; ?>">
        <div class="errorstring" id="ErrProjectName"><?php echo isset($Errtitle)? $ErrProjectName : "";?></div>
    </div>
</div>  -->
<?php } ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Ad Title<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="title" id="title"  maxlength="74" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $pageContent[0]['title']; ?>">
        <div class="errorstring" id="Errtitle"><?php echo isset($Errtitle)? $Errtitle : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Description<span style="color: red;">*</span></label>
        <textarea class="form-control" style="height:170px;" name="content" id="content"><?php echo isset($_POST['content']) ? $_POST['content'] : $pageContent[0]['content']; ?></textarea>
        <div class="errorstring" id="Errcontent"><?php echo isset($Errcontent)? $Errcontent : "";?></div>
    </div>
</div> 
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Amount<span style="color: red;">*</span></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="font-size: 12px;font-weight: bold;">INR</span>
            </div>
            <input class="form-control" type="text" name="amount" id="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : $pageContent[0]['amount']; ?>">
        </div>
        <div class="errorstring" id="Erramount"><?php echo isset($Erramount)? $Erramount : "";?></div>
    </div>
</div>
