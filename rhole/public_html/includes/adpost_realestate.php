
<style>
.fileupload_cancelbutton{
    position: absolute;
    cursor: pointer;
    left: 102px;
}

</style>
<?php if($_GET['subc']=="20" || $_GET['subc']=="4") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Type<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
                <option value="Apartments" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Apartments</option>
                <option value="Builder Floors" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Builder Floors</option>
                <?php if($_GET['subc']=="4"){ ?>
                    <option value="Houses & Villas" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Farm Houses</option> 
                <?php } ?>
                <option value="Houses & Villas" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Houses & Villas</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Bedrooms</label>
        <select name="BedRooms" id="BedRooms" class="form-control">
            <option value="1" <?php echo $_POST['BedRooms'] ? " selected='selected' " : "";?>>1</option>
            <option value="2" <?php echo $_POST['BedRooms'] ? " selected='selected' " : "";?>>2</option>
            <option value="3" <?php echo $_POST['BedRooms'] ? " selected='selected' " : "";?>>3</option>
            <option value="4" <?php echo $_POST['BedRooms'] ? " selected='selected' " : "";?>>4</option>
            <option value="4+" <?php echo $_POST['BedRooms'] ? " selected='selected' " : "";?>>4+</option>
        </select> 
        <div class="errorstring" id="ErrBedRooms"><?php echo isset($ErrBedRooms)? $ErrBedRooms : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Bathrooms</label>
        <select name="BathRooms" id="BathRooms" class="form-control">
            <option value="1" <?php echo $_POST['BathRooms'] ? " selected='selected' " : "";?>>1</option>
            <option value="2" <?php echo $_POST['BathRooms'] ? " selected='selected' " : "";?>>2</option>
            <option value="3" <?php echo $_POST['BathRooms'] ? " selected='selected' " : "";?>>3</option>
            <option value="4" <?php echo $_POST['BathRooms'] ? " selected='selected' " : "";?>>4</option>
            <option value="4+" <?php echo $_POST['BathRooms'] ? " selected='selected' " : "";?>>4+</option>
        </select> 
        <div class="errorstring" id="ErrBathRooms"><?php echo isset($ErrBathRooms)? $ErrBathRooms : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="23"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>SubType<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
                <option value="Guest Houses" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Guest Houses</option>
                <option value="PG" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>PG</option>
                <option value="Roommate" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Roommate</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>    
<?php } ?>
<?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22"|| $_GET['subc']=="23") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Furnishing</label>
        <select name="Furnishing" id="Furnishing" class="form-control">
            <option value="Furnished" <?php echo $_POST['Furnishing'] ? " selected='selected' " : "";?>>Furnished</option>
            <option value="Semi-Furnished" <?php echo $_POST['Furnishing'] ? " selected='selected' " : "";?>>Semi-Furnished</option>
            <option value="Unfurnished" <?php echo $_POST['Furnishing'] ? " selected='selected' " : "";?>>Unfurnished</option>
        </select> 
        <div class="errorstring" id="ErrFurnishing"><?php echo isset($ErrFurnishing)? $ErrFurnishing : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="24"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Type<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
                <option value="For Rent" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>For Rent</option>
                <option value="For Sale" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>For Sale</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>    
<?php } ?>

<?php if($_GET['subc']=="4" || $_GET['subc']=="22"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Construction Status</label>
        <select name="ConstructionStatus" id="" class="form-control">
            <option value="New Launch" <?php echo $_POST['ConstructionStatus'] ? " selected='selected' " : "";?>>New Launch</option>
            <option value="Ready to Move" <?php echo $_POST['ConstructionStatus'] ? " selected='selected' " : "";?>>Ready to Move</option>
            <option value="Under Construction" <?php echo $_POST['ConstructionStatus'] ? " selected='selected' " : "";?>>Under Construction</option>
        </select> 
        <div class="errorstring" id="ErrConstructionStatus"><?php echo isset($ErrConstructionStatus)? $ErrListedBy : "";?></div>
    </div>
</div>    
<?php } ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Listed By</label>
        <select name="ListedBy" id="ListedBy" class="form-control">
            <option value="Builder" <?php echo $_POST['ListedBy'] ? " selected='selected' " : "";?>>Builder</option>
            <option value="Dealer" <?php echo $_POST['ListedBy'] ? " selected='selected' " : "";?>>Dealer</option>
            <option value="Owner" <?php echo $_POST['ListedBy'] ? " selected='selected' " : "";?>>Owner</option>
        </select> 
        <div class="errorstring" id="ErrListedBy"><?php echo isset($ErrListedBy)? $ErrListedBy : "";?></div>
    </div>
</div>
<?php if($_GET['subc']=="24"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Plot Area<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="PlotArea" id="PlotArea"  maxlength="74" value="<?php echo isset($_POST['PlotArea']) ? $_POST['PlotArea'] : ""; ?>">
        <div class="errorstring" id="ErrPlotArea"><?php echo isset($ErrPlotArea)? $ErrPlotArea : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Super Builtup Area (ft)<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="SuperBuildUpArea" id="SuperBuildUpArea"  maxlength="74" value="<?php echo isset($_POST['SuperBuildUpArea']) ? $_POST['SuperBuildUpArea'] : ""; ?>">
        <div class="errorstring" id="ErrSuperBuildUpArea"><?php echo isset($ErrSuperBuildUpArea)? $ErrSuperBuildUpArea : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Carpet Area (ft)<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="CarpetArea" id="CarpetArea"  maxlength="74" value="<?php echo isset($_POST['CarpetArea']) ? $_POST['CarpetArea'] : ""; ?>">
        <div class="errorstring" id="ErrCarpetArea"><?php echo isset($ErrCarpetArea)? $ErrCarpetArea : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="20"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Bachelors Allowed</label>
        <select name="BachelorsAllowed" id="BachelorsAllowed" class="form-control">
            <option value="Yes" <?php echo $_POST['BachelorsAllowed'] ? " selected='selected' " : "";?>>Yes</option>
            <option value="No" <?php echo $_POST['BachelorsAllowed'] ? " selected='selected' " : "";?>>No</option>
        </select> 
        <div class="errorstring" id="ErrBachelorsAllowed"><?php echo isset($ErrBachelorsAllowed)? $ErrBachelorsAllowed : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Maintenance (Monthly)</label>
        <input type="text" class="form-control" name="Maintenance" id="Maintenance" value="<?php echo isset($_POST['Maintenance']) ? $_POST['Maintenance'] : ""; ?>">
        <div class="errorstring" id="ErrMaintenance"><?php echo isset($ErrMaintenance)? $ErrMaintenance : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="20" || $_GET['subc']=="4") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Total Floors</label>
        <input type="text" class="form-control" name="TotalFloors" id="TotalFloors" value="<?php echo isset($_POST['TotalFloors']) ? $_POST['TotalFloors'] : ""; ?>">
        <div class="errorstring" id="ErrTotalFloors"><?php echo isset($ErrTotalFloors)? $ErrTotalFloors : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Floor No</label>
        <input type="text" class="form-control" name="FloorNo" id="FloorNo" value="<?php echo isset($_POST['FloorNo']) ? $_POST['FloorNo'] : ""; ?>">
        <div class="errorstring" id="ErrFloorNo"><?php echo isset($ErrFloorNo)? $ErrFloorNo : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22" || $_GET['subc']=="23") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Car Parking</label>
        <select name="CarParking" id="CarParking" class="form-control">
            <option value="0" <?php echo $_POST['CarParking'] ? " selected='selected' " : "";?>>0</option>
            <option value="1" <?php echo $_POST['CarParking'] ? " selected='selected' " : "";?>>1</option>
            <option value="2" <?php echo $_POST['CarParking'] ? " selected='selected' " : "";?>>2</option>
            <option value="3" <?php echo $_POST['CarParking'] ? " selected='selected' " : "";?>>3</option>
            <option value="3+" <?php echo $_POST['CarParking'] ? " selected='selected' " : "";?>>3+</option>
        </select> 
        <div class="errorstring" id="ErrCarParking"><?php echo isset($ErrCarParking)? $ErrCarParking : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="23") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Meals Included</label>
        <select name="MealsIncluded" id="MealsIncluded" class="form-control">
            <option value="Yes" <?php echo $_POST['MealsIncluded'] ? " selected='selected' " : "";?>>Yes</option>
            <option value="No" <?php echo $_POST['MealsIncluded'] ? " selected='selected' " : "";?>>No</option>
        </select> 
        <div class="errorstring" id="ErrMealsIncluded"><?php echo isset($ErrMealsIncluded)? $ErrMealsIncluded : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="20" || $_GET['subc']=="4" || $_GET['subc']=="24") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Facing</label>
        <select name="Facing" id="Facing" class="form-control">
            <option value="East" <?php echo $_POST['Facing']=="East" ? " selected='selected' " : "";?>>East</option>
            <option value="North" <?php echo $_POST['Facing']=="North" ? " selected='selected' " : "";?>>North</option>
            <option value="North-East" <?php echo $_POST['Facing']=="North-East" ? " selected='selected' " : "";?>>North-East</option>
            <option value="North-West" <?php echo $_POST['Facing']=="North-West" ? " selected='selected' " : "";?>>North-West</option>
            <option value="South" <?php echo $_POST['Facing']=="South" ? " selected='selected' " : "";?>>South</option>
            <option value="South-East" <?php echo $_POST['Facing']=="South-East" ? " selected='selected' " : "";?>>South-East</option>
            <option value="South-West" <?php echo $_POST['Facing']=="South-West" ? " selected='selected' " : "";?>>South-West</option>
            <option value="West" <?php echo $_POST['Facing']=="East" ? " selected='selected' " : "";?>>West</option>
            <option value="No Preferred" <?php echo $_POST['Facing']=="No Preferred" ? " selected='selected' " : "";?>>No Preferred</option>
        </select> 
        <div class="errorstring" id="ErrFacing"><?php echo isset($ErrFacing)? $ErrFacing : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']=="21" || $_GET['subc']=="22") {?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Washrooms</label>
        <input type="text" class="form-control" name="Washrooms" id="Washrooms"  maxlength="74" value="<?php echo isset($_POST['Washrooms']) ? $_POST['Washrooms'] : ""; ?>">
        <div class="errorstring" id="ErrWashrooms"><?php echo isset($ErrWashrooms)? $ErrWashrooms : "";?></div>
    </div>
</div>
<?php } ?>
<?php if($_GET['subc']<>"23") {?>
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
        <input type="text" class="form-control" name="title" id="title"  maxlength="74" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ""; ?>">
        <div class="errorstring" id="Errtitle"><?php echo isset($Errtitle)? $Errtitle : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Description<span style="color: red;">*</span></label>
        <textarea class="form-control" style="height:170px;" name="content" id="content"><?php echo isset($_POST['content']) ? $_POST['content'] : ""; ?></textarea>
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
            <input class="form-control" type="text" name="amount" id="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ""; ?>">
        </div>
        <div class="errorstring" id="Erramount"><?php echo isset($Erramount)? $Erramount : "";?></div>
    </div>
</div>
