<style>
.fileupload_cancelbutton{
    position: absolute;
    cursor: pointer;
    left: 102px;
}
</style>
<?php if($_GET['subc']=="60" ||    $_GET['subc']=="66" ||    $_GET['subc']=="65" || $_GET['subc']=="61" || $_GET['subc']=="96" ){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
     <label>Brand Name<span style="color: red;">*</span></label>
        <select name="Brand" id="Brand" class="form-control" onchange="getModel($(this).val())">
            <option value="0" selected="selected">Select Brand</option> 
            <?php foreach(JPostads::getBrandNames($_GET['subc']) as $Brandname) {?>
            <option value="<?php echo $Brandname['brandid'];?>" <?php echo ($_POST['Brand']==$Brandname['brandid']) ? " selected='selected' " : "";?>> <?php echo $Brandname['brandname'];?></option>
            <?php } ?>      
        </select> 
        <div class="errorstring" id="ErrBrand"><?php echo isset($ErrBrand)? $ErrBrand : "";?></div> 
    </div>      
</div>                                  
<?php if ($_GET['subc']!="96") { ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Model<span style="color: red;">*</span></label>
        <div id="div_Model">
            <select name="Model" class="form-control" id="Model" onchange="getVarient($(this).val())">
            <option value="0" selected="selected">Select Model</option> 
            </select> 
        </div>
         <div class="errorstring" id="ErrModel"><?php echo isset($ErrModel)? $ErrModel : "";?></div>
    </div>
</div>
<!--
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Varient<span style="color: red;">*</span></label>
        <div id="div_Varient">
            <select name="Varient" class="form-control" id="Varient">
            <option value="0" selected="selected">Select varient</option> 
            </select> 
        </div>
         <div class="errorstring" id="ErrVarient"><?php echo isset($ErrVarient)? $ErrVarient : "";?></div>
    </div>
</div> -->                                               
<?php } ?>
<?php } ?>
<?php if($_GET['subc']=="63" ) { ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Type</label>                                                                          
        <select name="MType" id="MType" class="form-control">
            <option value="Wheels & Tyres" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Wheels & Tyres</option>
            <option value="Audio & Other Accessories" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Audio & Other Accessories</option>
            <option value="Other & Spare Parts" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Other & Spare Parts</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>                                                                                                      
<?php } ?>
<?php if($_GET['subc']=="62" || $_GET['subc']=="65"  || $_GET['subc']=="66" ) { ?>

    <?php if($_GET['subc']=="62" ) { ?>
    <div class="row mb-2">
    <div class="col-sm-12">
        <label>Type</label>                                                                          
        <select name="MType" id="MType" class="form-control" onchange="getBrand($(this).val())">
            <option value="0"  >Select Vechile Type</option>
            <option value="123" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Buses</option>
            <option value="124" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Trucks</option>
            <option value="125" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Others</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>
    <div class="row mb-2">
    <div class="col-sm-12">
           <label>Brand Name<span style="color: red;">*</span></label>
        <div id="div_Brand">
            <select name="Brand" class="form-control" id="Brand" >
            <option value="0" selected="selected">Select Brand</option> 
            </select> 
        </div> 
        <div class="errorstring" id="ErrBrand"><?php echo isset($ErrBrand)? $ErrBrand : "";?></div> 
    </div> 
</div>
    <?php } ?>

<div class="row mb-2">
    <div class="col-sm-12">
        <label>Year<span style="color: red;">*</span></label>
      <!--  <input type="text" name="Year" id="Year" value="<?php echo isset($_POST['Year']) ? $_POST['Year'] : ""; ?>" class="form-control">  -->
        <select name="Year" class="form-control">
            <?php for($i=date("Y");$i>1960;$i--) { ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select>
        <div class="errorstring" id="ErrYear"><?php echo isset($ErrYear)? $ErrYear : "";?></div>
    </div>                                                                                                        
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>KM Driven<span style="color: red;">*</span></label>
        <input type="text" name="KMDriven" id="KMDriven" value="<?php echo isset($_POST['KMDriven']) ? $_POST['KMDriven'] : ""; ?>" class="form-control">  
        <div class="errorstring" id="ErrKMDriven"><?php echo isset($ErrYear)? $ErrKMDriven : "";?></div>
    </div>
</div>
<?php } ?>

<?php if($_GET['subc']=="60" || $_GET['subc']=="61" ){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Year<span style="color: red;">*</span></label>
        
           <select name="Year" class="form-control">
            <?php for($i=date("Y");$i>1960;$i--) { ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select>  
        <div class="errorstring" id="ErrYear"><?php echo isset($ErrYear)? $ErrYear : "";?></div>
    </div>                                                                                                        
</div>
<?php if($_GET['subc']=="60"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">                                                      
        <label>Fuel<span style="color: red;">*</span></label>
        <select name="Fuel" id="Fuel" class="form-control">
            <option value="Petrol" <?php echo $_POST[ 'Fuel'] ? " selected='selected' " : "";?>>Petrol</option>
            <option value="CNG & Hybrids" <?php echo $_POST[ 'Fuel'] ? " selected='selected' " : "";?>>CNG & Hybrids</option>
            <option value="Diesel" <?php echo $_POST[ 'Fuel'] ? " selected='selected' " : "";?>>Diesel</option>
            <option value="Electric" <?php echo $_POST[ 'Fuel'] ? " selected='selected' " : "";?>>Electric</option>
            <option value="LPG" <?php echo $_POST[ 'Fuel'] ? " selected='selected' " : "";?>>LPG</option>
        </select> 
        <div class="errorstring" id="ErrFuel"><?php echo isset($ErrFuel)? $ErrFuel : "";?></div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-sm-12">
        <label>Transmission<span style="color: red;">*</span></label>
        <select name="Transmission" id="Transmission" class="form-control">
            <option value="Automatic" <?php echo $_POST[ 'Transmission'] ? " selected='selected' " : "";?>>Automatic</option>
            <option value="Manual" <?php echo $_POST[ 'Transmission'] ? " selected='selected' " : "";?>>Manual</option>
        </select> 
        <div class="errorstring" id="ErrTransmission"><?php echo isset($ErrTransmission)? $ErrTransmission : "";?></div>
    </div>
</div>
<?php } ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>KM Driven<span style="color: red;">*</span></label>
        <input type="text" name="KMDriven" id="KMDriven" value="<?php echo isset($_POST['KMDriven']) ? $_POST['KMDriven'] : ""; ?>" class="form-control">  
        <span style="color: #9d9b9b;font-size: 12px;">eg.4500</span>
    </div>
</div>

<div class="row mb-2">
    <div class="col-sm-12">
        <label>No. of Owners<span style="color: red;">*</span></label>
        <select name="NoofOwners" id="NoofOwners" class="form-control">
            <option value="First" <?php echo $_POST[ 'NoofOwners'] ? " selected='selected' " : "";?>>First</option>
            <option value="Second" <?php echo $_POST[ 'NoofOwners'] ? " selected='selected' " : "";?>>Second</option>
            <option value="Third" <?php echo $_POST[ 'NoofOwners'] ? " selected='selected' " : "";?>>Third</option>
            <option value="Fourth" <?php echo $_POST[ 'NoofOwners'] ? " selected='selected' " : "";?>>Fourth</option>
            <option value="Morethan Four" <?php echo $_POST[ 'NoofOwners'] ? " selected='selected' " : "";?>>Morethan Four</option>
        </select> 
        <div class="errorstring" id="ErrFuel"><?php echo isset($ErrFuel)? $ErrFuel : "";?></div>
    </div>
</div>
<?php   

}?>
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
