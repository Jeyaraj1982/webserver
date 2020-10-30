<?php 
$page="ManageOccupationTypes";
include_once("views/Admin/Settings/Masters/settings_header.php");
?>
<?php   
    if (isset($_POST['BtnUpdateOccupationType'])) {
        
        $response = $webservice->getData("Admin","EditOccupationType",$_POST);
        if ($response['status']=="success") {
            echo $response['message'];
        } else {
            $errormessage = $response['message']; 
        }
    }
    $response     = $webservice->getData("Admin","GetMasterAllViewInfo");
    $OccupationType = $response['data']['ViewInfo'];
?>
<script>
 function SubmitNewOccupationType() {
                        $('#ErrOccupationType').html("");
                         
                         ErrorCount=0;
        
                        IsNonEmpty("OccupationType","ErrOccupationType","Please Enter Valid Occupation Type");
                        IsAlphabet("OccupationType","ErrOccupationType","Please Enter Alphabet Charactors only");
                        
                        if (ErrorCount==0) {
                            return true;
                        } else{
                            return false;
                        }
                 }
    
</script>
<div class="col-sm-10 rightwidget">
<form method="post" action="" onsubmit="return SubmitNewOccupationType();">
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
          <h4 class="card-title">Masters</h4>
          <h4 class="card-title">Edit Occupation Type</h4>
           <div class="form-group row">
                          <label for="OccupationTypeCode" class="col-sm-3 col-form-label">OccupationType Code<span id="star">*</span></label>
                          <div class="col-sm-2">
                            <input type="text" readonly="readonly" style="width:80px;background:#f1f1f1" maxlength="10" class="form-control" id="OccupationTypeCode" name="OccupationTypeCode" value="<?php echo $OccupationType['SoftCode'];?>" placeholder="Occupation Type Code">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="OccupationType" class="col-sm-3 col-form-label">OccupationType<span id="star">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="OccupationType" maxlength="100" name="OccupationType" value="<?php echo (isset($_POST['OccupationType']) ? $_POST['OccupationType'] : $OccupationType['CodeValue']);?>" placeholder="Occupation Type">
                            <span class="errorstring" id="ErrOccupationType"><?php echo isset($ErrOccupationType)? $ErrOccupationType : "";?></span>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="IsActive" class="col-sm-3 col-form-label">Is Active</label>
                          <div class="col-sm-9">
                                <select name="IsActive" class="form-control" style="width:80px">
                                    <option value="1" <?php echo ($OccupationType['IsActive']==1) ? " selected='selected' " : "";?>>Yes</option>
                                    <option value="0" <?php echo ($OccupationType['IsActive']==0) ? " selected='selected' " : "";?>>No</option>
                                </select>
                          </div>
                        </div>
                        <div class="form-group row"><div class="col-sm-12"><?php if(sizeof($successmessage)>0){ echo  $successmessage ; } else {echo  $errormessage;}?></div></div>
                        <div class="form-group row">
                        <div class="col-sm-3">
                        <button type="submit" name="BtnUpdateOccupationType" class="btn btn-primary mr-2" style="font-family: roboto;">Update OccupationType</button></div>
                        <div class="col-sm-6" align="left" style="padding-top:5px;text-decoration: underline; color: skyblue;"><a href="../../ManageOccupationTypes"><small>List of Occupation Types</small></a></div>
                        </div>
                </div>
              </div>
            </div>
        </form>
</div>

<?php include_once("views/Admin/Settings/Masters/settings_footer.php");?>                    