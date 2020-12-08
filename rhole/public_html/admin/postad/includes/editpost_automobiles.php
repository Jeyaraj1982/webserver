
<style>
.fileupload_cancelbutton{
    position: absolute;
    cursor: pointer;
    left: 102px;
}

</style>
<?php if($pageContent[0]['subcateid']=="60" || $pageContent[0]['subcateid']=="61" || $pageContent[0]['subcateid']=="65" || $pageContent[0]['subcateid']=="96"  || $pageContent[0]['subcateid']=="66" ){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
     <label>Brand Name<span style="color: red;">*</span></label>
        <select name="Brand" id="Brand" class="form-control" onchange="getModel($(this).val())">
            <option value="0" selected="selected">Select Brand</option> 
            <?php foreach(JPostads::getBrandNames($pageContent[0]['subcateid']) as $Brandname) {?>
            <option value="<?php echo $Brandname['brandid'];?>" <?php echo (isset($_POST[ 'Brand'])) ? (($_POST[ 'Brand']==$Brandname['brandid']) ? " selected='selected' " : "") : (($pageContent[0]['brandid']==$Brandname['brandid']) ? " selected='selected' " : "");?>><?php echo $Brandname['brandname'];?></option>
            <?php } ?>                                          
        </select> 
        <div class="errorstring" id="ErrBrand"><?php echo isset($ErrBrand)? $ErrBrand : "";?></div> 
    </div>
</div>                                                                                                 
<?php if ($pageContent[0]['subcateid']!="96") { ?>
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
<?php if($pageContent[0]['subcateid']=="63" ){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Type</label>                                                                          
        <select name="MType" id="MType" class="form-control">
            <option value="Wheels & Tyres" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Wheels & Tyres") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Wheels & Tyres") ? " selected='selected' " : "");?>>Wheels & Tyres</option>
            <option value="Audio & Other Accessories" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Audio & Other Accessories") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Audio & Other Accessories") ? " selected='selected' " : "");?>>Audio & Other Accessories</option>
            <option value="Other & Spare Parts" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="Other & Spare Parts") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Other & Spare Parts") ? " selected='selected' " : "");?>>Other & Spare Parts</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
    </div>
</div>                                                                                                      
<?php } ?>
<?php if($pageContent[0]['subcateid']=="62" || $pageContent[0]['subcateid']=="65"  || $pageContent[0]['subcateid']=="66" ){ ?>
<?php if($pageContent[0]['subcateid']=="62" ) { ?>
    <div class="row mb-2">
    <div class="col-sm-12">
        <label>Type</label>                                                                          
        <select name="MType" id="MType" class="form-control" onchange="getBrand($(this).val())">
            <option value="0"  >Select Vechile Type</option>
            <option value="123" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="123") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="123") ? " selected='selected' " : "");?>>Buses</option>
            <option value="124" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="124") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="124") ? " selected='selected' " : "");?>>Trucks</option>
            <option value="125" <?php echo (isset($_POST[ 'MType'])) ? (($_POST[ 'MType']=="125") ? " selected='selected' " : "") : (($pageContent[0]['Mtype']=="Buses") ? " selected='selected' " : "");?>>Others</option>
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
        <input type="text" name="Year" id="Year" value="<?php echo isset($_POST['Year']) ? $_POST['Year'] : $pageContent[0]['Year']; ?>" class="form-control">  
        <div class="errorstring" id="ErrYear"><?php echo isset($ErrYear)? $ErrYear : "";?></div>
    </div>                                                                                                        
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>KM Driven<span style="color: red;">*</span></label>
        <input type="text" name="KMDriven" id="KMDriven" value="<?php echo isset($_POST['KMDriven']) ? $_POST['KMDriven'] : $pageContent[0]['KMDriven']; ?>" class="form-control">  
        <div class="errorstring" id="ErrKMDriven"><?php echo isset($ErrYear)? $ErrKMDriven : "";?></div>
    </div>
</div>
<?php } ?>

<?php if($pageContent[0]['subcateid']=="60" || $pageContent[0]['subcateid']=="61" ){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Year<span style="color: red;">*</span></label>
        <input type="text" name="Year" id="Year" value="<?php echo isset($_POST['Year']) ? $_POST['Year'] : $pageContent[0]['Year']; ?>" class="form-control">  
        <div class="errorstring" id="ErrYear"><?php echo isset($ErrYear)? $ErrYear : "";?></div>
    </div>                                                                                                        
</div>
<?php if($pageContent[0]['subcateid']=="60"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Fuel<span style="color: red;">*</span></label>
        <select name="Fuel" id="Fuel" class="form-control">
            <option value="CNG & Hybrids" <?php echo (isset($_POST[ 'Fuel'])) ? (($_POST[ 'Fuel']=="CNG & Hybrids") ? " selected='selected' " : "") : (($pageContent[0]['Fuel']=="CNG & Hybrids") ? " selected='selected' " : "");?>>CNG & Hybrids</option>
            <option value="Diesel" <?php echo (isset($_POST[ 'Fuel'])) ? (($_POST[ 'Fuel']=="Diesel") ? " selected='selected' " : "") : (($pageContent[0]['Fuel']=="Diesel") ? " selected='selected' " : "");?>>Diesel</option>
            <option value="Electric"  <?php echo (isset($_POST[ 'Fuel'])) ? (($_POST[ 'Fuel']=="Electric") ? " selected='selected' " : "") : (($pageContent[0]['Fuel']=="Electric") ? " selected='selected' " : "");?>>Electric</option>
            <option value="Petrol"  <?php echo (isset($_POST[ 'Fuel'])) ? (($_POST[ 'Fuel']=="Petrol") ? " selected='selected' " : "") : (($pageContent[0]['Fuel']=="Petrol") ? " selected='selected' " : "");?>>Petrol</option>
        </select> 
        <div class="errorstring" id="ErrFuel"><?php echo isset($ErrFuel)? $ErrFuel : "";?></div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-sm-12">
        <label>Transmission<span style="color: red;">*</span></label>
        <select name="Transmission" id="Transmission" class="form-control">
            <option value="Automatic" <?php echo (isset($_POST[ 'Transmission'])) ? (($_POST[ 'Transmission']=="Automatic") ? " selected='selected' " : "") : (($pageContent[0]['Transmission']=="Automatic") ? " selected='selected' " : "");?>>Automatic</option>
            <option value="Manual" <?php echo (isset($_POST[ 'Transmission'])) ? (($_POST[ 'Transmission']=="Manual") ? " selected='selected' " : "") : (($pageContent[0]['Transmission']=="Manual") ? " selected='selected' " : "");?>>Manual</option>
        </select> 
        <div class="errorstring" id="ErrTransmission"><?php echo isset($ErrTransmission)? $ErrTransmission : "";?></div>
    </div>
</div>
<?php } ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>KM Driven<span style="color: red;">*</span></label>
        <input type="text" name="KMDriven" id="KMDriven" value="<?php echo isset($_POST['KMDriven']) ? $_POST['KMDriven'] : $pageContent[0]['KMDriven']; ?>" class="form-control">  
        <div class="errorstring" id="ErrKMDriven"><?php echo isset($ErrYear)? $ErrKMDriven : "";?></div>
    </div>
</div>
<?php if($pageContent[0]['subcateid']=="60"){ ?>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>No. of Owners<span style="color: red;">*</span></label>
        <select name="NoofOwners" id="NoofOwners" class="form-control">
            <option value="First" <?php echo (isset($_POST[ 'NoofOwners'])) ? (($_POST[ 'NoofOwners']=="First") ? " selected='selected' " : "") : (($pageContent[0]['NoofOwners']=="First") ? " selected='selected' " : "");?>>First</option>
            <option value="Second" <?php echo (isset($_POST[ 'NoofOwners'])) ? (($_POST[ 'NoofOwners']=="Second") ? " selected='selected' " : "") : (($pageContent[0]['NoofOwners']=="Second") ? " selected='selected' " : "");?>>Second</option>
            <option value="Third" <?php echo (isset($_POST[ 'NoofOwners'])) ? (($_POST[ 'NoofOwners']=="Third") ? " selected='selected' " : "") : (($pageContent[0]['NoofOwners']=="Third") ? " selected='selected' " : "");?>>Third</option>
            <option value="Fourth" <?php echo (isset($_POST[ 'NoofOwners'])) ? (($_POST[ 'NoofOwners']=="Fourth") ? " selected='selected' " : "") : (($pageContent[0]['NoofOwners']=="Fourth") ? " selected='selected' " : "");?>>Fourth</option>
            <option value="More than Four" <?php echo (isset($_POST[ 'NoofOwners'])) ? (($_POST[ 'NoofOwners']=="More than Four") ? " selected='selected' " : "") : (($pageContent[0]['NoofOwners']=="More than Four") ? " selected='selected' " : "");?>>More than Four</option>
        </select> 
    </div>
</div>
<?php } }?>
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
            <input class="form-control" type="text" name="amount" id="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] :  $pageContent[0]['amount']; ?>">
        </div>
        <div class="errorstring" id="Erramount"><?php echo isset($Erramount)? $Erramount : "";?></div>
    </div>
</div>
<script>
$(document).ready(function(){
            getModel('<?php echo $pageContent[0]['brandid'] ;?>','<?php echo $pageContent[0]['Model'];?>');
         });
<?php if($pageContent[0]['subcateid']=="62" ) { ?>
$(document).ready(function(){
            getBrand('<?php echo $pageContent[0]['Mtype'] ;?>','<?php echo $pageContent[0]['brandid'];?>');
         });
<?php } ?>      
</script>
