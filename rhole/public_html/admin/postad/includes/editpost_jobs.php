<style>
.fileupload_cancelbutton{
    position: absolute;
    cursor: pointer;
    left: 102px;
}

</style>

<div class="row mb-2">
    <div class="col-sm-12">
        <label>Salary Period<span style="color: red;">*</span></label>
        <select name="SalaryPeriod" id="SalaryPeriod" class="form-control">
            <option value="Hourly" <?php echo (isset($_POST[ 'SalaryPeriod'])) ? (($_POST[ 'SalaryPeriod']=="Hourly") ? " selected='selected' " : "") : (($pageContent[0]['SalaryPeriod']=="Hourly") ? " selected='selected' " : "");?>>Hourly</option>
            <option value="Monthly" <?php echo (isset($_POST[ 'SalaryPeriod'])) ? (($_POST[ 'SalaryPeriod']=="Monthly") ? " selected='selected' " : "") : (($pageContent[0]['SalaryPeriod']=="Monthly") ? " selected='selected' " : "");?>>Monthly</option>
            <option value="Weekly" <?php echo (isset($_POST[ 'SalaryPeriod'])) ? (($_POST[ 'SalaryPeriod']=="Weekly") ? " selected='selected' " : "") : (($pageContent[0]['SalaryPeriod']=="Weekly") ? " selected='selected' " : "");?>>Weekly</option>
            <option value="Yearly" <?php echo (isset($_POST[ 'SalaryPeriod'])) ? (($_POST[ 'SalaryPeriod']=="Yearly") ? " selected='selected' " : "") : (($pageContent[0]['SalaryPeriod']=="Yearly") ? " selected='selected' " : "");?>>Yearly</option>
        </select> 
        <div class="errorstring" id="ErrSalaryPeriod"><?php echo isset($ErrSalaryPeriod)? $ErrSalaryPeriod : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Position Type<span style="color: red;">*</span></label>
        <select name="PositionType" id="PositionType" class="form-control">
            <option value="Contract" <?php echo (isset($_POST[ 'PositionType'])) ? (($_POST[ 'PositionType']=="Contract") ? " selected='selected' " : "") : (($pageContent[0]['PositionType']=="Contract") ? " selected='selected' " : "");?>>Contract</option>
            <option value="Full-time" <?php echo (isset($_POST[ 'PositionType'])) ? (($_POST[ 'PositionType']=="Full-time") ? " selected='selected' " : "") : (($pageContent[0]['PositionType']=="Full-time") ? " selected='selected' " : "");?>>Full-time</option>
            <option value="Part-time" <?php echo (isset($_POST[ 'PositionType'])) ? (($_POST[ 'PositionType']=="Part-time") ? " selected='selected' " : "") : (($pageContent[0]['PositionType']=="Part-time") ? " selected='selected' " : "");?>>Part-time</option>
            <option value="Temprory" <?php echo (isset($_POST[ 'PositionType'])) ? (($_POST[ 'PositionType']=="Temprory") ? " selected='selected' " : "") : (($pageContent[0]['PositionType']=="Temprory") ? " selected='selected' " : "");?>>Temprory</option>
        </select> 
        <div class="errorstring" id="ErrPositionType"><?php echo isset($ErrPositionType)? $ErrPositionType : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Salary From</label>
        <input type="text" name="SalaryFrom" id="SalaryFrom" value="<?php echo isset($_POST['SalaryFrom']) ? $_POST['SalaryFrom'] : $pageContent[0]['SalaryFrom']; ?>" class="form-control">  
        <div class="errorstring" id="ErrSalaryFrom"><?php echo isset($ErrSalaryFrom)? $ErrSalaryFrom : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Salary To</label>
        <input type="text" name="SalaryTo" id="SalaryTo" value="<?php echo isset($_POST['SalaryTo']) ? $_POST['SalaryTo'] : $pageContent[0]['salaryTo']; ?>" class="form-control">    
        <div class="errorstring" id="ErrSalaryTo"><?php echo isset($ErrSalaryTo)? $ErrSalaryTo : "";?></div>
    </div>
</div>
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
