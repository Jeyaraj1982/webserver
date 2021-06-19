<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>My Profile</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
<?php
    $data = $mysql->select("select * from _tbl_master_advocates where AdvocateID='".$_SESSION['User']['AdvocateID']."'");
    $DistrictNames = $mysql->select("select * from _tbl_master_districtnames order by DistrictName");
    $AreaNames = $mysql->select("select * from _tbl_master_area order by AreaName");
?>
    <div class="row" id="frmD">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <?php if (strlen(trim($data[0]['ProfilePhoto']))>0) { ?>
                                    <img src="<?php echo $data[0]['ProfilePhoto'];?>" style="height:180px;border: 1px solid #ccc;background: #fff;border-radius: 10px;"><br>
                                <?php } else { ?>
                                    <img src="assets/app/noimage.jpg" style="height:180px;border: 1px solid #ccc;background: #fff;border-radius: 10px;"><br>
                                <?php } ?>
                            </div>
                        </div>
                            <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Name</label>
                                <input class="form-control" value="<?php echo $data[0]['AdvocateName'];?>" disabled="disabled">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Qualifications</label>
                                <input class="form-control"   value="<?php echo $data[0]['Qualification'];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Address Line</label>
                                <input class="form-control" value="<?php echo $data[0]['AddressLine'];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">District Name</label>
                                <select class="form-select"   disabled="disabled">
                                    <?php foreach($DistrictNames as $Districtname) { ?>
                                        <?php if (isset($_POST['DistrictNameID'])) { ?>
                                            <option value="<?php echo $Districtname['DistrictNameID'];?>" <?php echo $_POST['DistrictNameID']==$Districtname['DistrictNameID'] ? ' selected="selected" ' : '';?> ><?php echo $Districtname['DistrictName'];?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $Districtname['DistrictNameID'];?>" <?php echo $data[0]['DistrictNameID']==$Districtname['DistrictNameID'] ? ' selected="selected" ' : '';?> ><?php echo $Districtname['DistrictName'];?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                               <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Area Name</label>
                                <select class="form-select"  disabled="disabled">
                                    <?php foreach($AreaNames as $Areaname) { ?>
                                        <?php if (isset($_POST['DistrictNameID'])) { ?>
                                            <option value="<?php echo $Areaname['AreaID'];?>"  <?php echo $_POST['AreaNameID']==$Areaname['AreaID'] ? ' selected="selected" ' : '';?>><?php echo $Areaname['AreaName'];?></option>
                                        <?php } else {?>
                                            <option value="<?php echo $Areaname['AreaID'];?>"  <?php echo $data[0]['AreaNameID']==$Areaname['AreaID'] ? ' selected="selected" ' : '';?>><?php echo $Areaname['AreaName'];?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                               <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Place Name</label>
                                <input class="form-control"  value="<?php echo  $data[0]['PlaceName'];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername">Mobile Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control" type="text"  aria-describedby="inputGroupPrepend"  value="<?php echo  $data[0]['MobileNumber'];?>" disabled="disabled">
                                </div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Phone Number (1)</label>
                                <input class="form-control"   value="<?php echo $data[0]['PhoneNumber1'];?>" disabled="disabled">
                            </div>
                               <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Phone Number (2)</label>
                                <input class="form-control"   value="<?php echo $data[0]['PhoneNumber2'];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                           <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input class="form-control"  type="text"    value="<?php echo   $data[0]['EmailID'];?>" disabled="disabled">
                                <div id="ErrEmailID" style="color:red"><?php echo isset($EmailID) ? $EmailID : "";?></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustomUsername">Whatsapp Number</label>
                                <div class="input-group"><span class="input-group-text" id="inputGroupPrepend" style="font-size:13px">+91</span>
                                    <input class="form-control"  type="text"  aria-describedby="inputGroupPrepend"  value="<?php echo   $data[0]['WhatsappNumber'];?>" disabled="disabled">
                                </div>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Telegram ID</label>
                                <input class="form-control"   type="text"   value="<?php echo  $data[0]['TelegramID'];?>" disabled="disabled">
                            </div>
                        </div>
                        <!--
                        <div class="row g-3  mb-3">
                          
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Doc Attachment (1)</label>
                                <?php if (strlen(trim($data[0]['Attachment1']))>0) { ?>
                                    <br><img src="assets/app/paper.png" style="height:72px;margin-bottom:7px;">
                                    <br><a href="<?php echo $data[0]['Attachment1'];?>">Download</a><br>
                                <?php } ?>
                            </div>
                             <div class="col-md-4">
                                <label class="form-label" for="validationCustom03">Doc Attachment (2)</label>
                                 <?php if (strlen(trim($data[0]['Attachment2']))>0) { ?>
                                    <br><img src="assets/app/paper.png" style="height:72px;margin-bottom:7px;">
                                    <br><a href="<?php echo $data[0]['Attachment2'];?>">Download</a><br>
                                <?php } ?>
                            </div>
                        </div>
                        -->
                        <div class="row g-3  mb-5">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Login User Name</label>
                                <input class="form-control"  value="<?php echo    $data[0]['LoginName'];?>" disabled="disabled">
                                <div id="ErrLoginName" style="color:red"><?php echo isset($LoginName) ? $LoginName : "";?></div>
                            </div>
                           
                        </div>
                         
                          
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <a href="dashboard.php" class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
  