
<style>
.fileupload_cancelbutton{
    position: absolute;
    cursor: pointer;
    left: 102px;
}

</style>
      
<div class="row mb-2">
 <?php if($_GET['subc']=="2"){ ?>
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
     
  
    <div class="col-sm-12">
        <label>Model<span style="color: red;">*</span></label>
        <div id="div_Model">
            <select name="Model" class="form-control" id="Model" onchange="getVarient($(this).val())">
            <option value="0" selected="selected">Select Model</option> 
            </select> 
        </div>
         <div class="errorstring" id="ErrModel"><?php echo isset($ErrModel)? $ErrModel : "";?></div>
    </div>
 

     <?php } ?>
      <div class="col-sm-12">
     <?php if($_GET['subc']=="14"){ ?>
        <label>Type<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
            <option value="Mobile" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Mobile</option>
            <option value="Tablets" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Tablets</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
     <?php } ?>
     <?php if($_GET['subc']=="89"){ ?>
     <label>Type<span style="color: red;">*</span></label>
        <select name="MType" id="MType" class="form-control">
            <option value="iPads" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>iPads</option>
            <option value="Samsung" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Samsung</option>
            <option value="Other Tablets" <?php echo $_POST[ 'MType'] ? " selected='selected' " : "";?>>Other Tablets</option>
        </select> 
        <div class="errorstring" id="ErrMType"><?php echo isset($ErrMType)? $ErrMType : "";?></div>
     <?php } ?>
    </div>
</div>
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
