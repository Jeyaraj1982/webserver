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
            <option value="Hourly" <?php echo $_POST[ 'SalaryPeriod'] ? " selected='selected' " : "";?>>Hourly</option>
            <option value="Monthly" <?php echo $_POST[ 'SalaryPeriod'] ? " selected='selected' " : "";?>>Monthly</option>
            <option value="Weekly" <?php echo $_POST[ 'SalaryPeriod'] ? " selected='selected' " : "";?>>Weekly</option>
            <option value="Yearly" <?php echo $_POST[ 'SalaryPeriod'] ? " selected='selected' " : "";?>>Yearly</option>
        </select> 
        <div class="errorstring" id="ErrSalaryPeriod"><?php echo isset($ErrSalaryPeriod)? $ErrSalaryPeriod : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Position Type<span style="color: red;">*</span></label>
        <select name="PositionType" id="PositionType" class="form-control">
            <option value="Contract" <?php echo $_POST[ 'PositionType'] ? " selected='selected' " : "";?>>Contract</option>
            <option value="Full-time" <?php echo $_POST[ 'PositionType'] ? " selected='selected' " : "";?>>Full-time</option>
            <option value="Part-time" <?php echo $_POST[ 'PositionType'] ? " selected='selected' " : "";?>>Part-time</option>
            <option value="Temprory" <?php echo $_POST[ 'PositionType'] ? " selected='selected' " : "";?>>Temprory</option>
        </select> 
        <div class="errorstring" id="ErrPositionType"><?php echo isset($ErrPositionType)? $ErrPositionType : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Salary From</label>
        <input type="text" name="SalaryFrom" id="SalaryFrom" value="<?php echo isset($_POST['SalaryFrom']) ? $_POST['SalaryFrom'] : ""; ?>" class="form-control">  
        <div class="errorstring" id="ErrSalaryFrom"><?php echo isset($ErrSalaryFrom)? $ErrSalaryFrom : "";?></div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
        <label>Salary To</label>
        <input type="text" name="SalaryTo" id="SalaryTo" value="<?php echo isset($_POST['SalaryTo']) ? $_POST['SalaryTo'] : ""; ?>" class="form-control">    
        <div class="errorstring" id="ErrSalaryTo"><?php echo isset($ErrSalaryTo)? $ErrSalaryTo : "";?></div>
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
