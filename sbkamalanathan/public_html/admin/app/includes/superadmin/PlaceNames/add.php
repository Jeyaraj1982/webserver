<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>New Place Name</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if ($_POST['StateNameID']=="0") {
            $StateNameID = "Please select State Name";
            $error++;
        } else {
            if ($_POST['DistrictNameID']=="0") {
                $DistrictNameID = "Please select District Name";
                $error++;
            }
        }
        
        if (strlen(trim($_POST['PlaceName']))==0) {
            $PlaceName = "Please enter Place Name";
            $error++;
        }
        
        $duplicate = $mysql->select("select * from _tbl_master_placenames where PlaceName='".trim($_POST['PlaceName'])."'");
        if (sizeof($duplicate)>0) {
            $PlaceName = "Place Name already exists";
            $error++;  
        }
        
        if ($error==0) {
            $statenames    = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_POST['StateNameID']."'");
            $districtnames = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrictNameID']."'");
            $mysql->insert("_tbl_master_placenames",array("PlaceName"      => trim($_POST['PlaceName']),
                                                          "StateNameID"    => trim($statenames[0]['StateNameID']),
                                                          "StateName"      => trim($statenames[0]['StateName']),
                                                          "DistrictNameID" => trim($districtnames[0]['DistrictNameID']),
                                                          "DistrictName"   => trim($districtnames[0]['DistrictName']),
                                                          "Remarks"        => trim($_POST['Remarks']),
                                                          "IsActive"       => "1"));
            unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Place Name created.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }  else {
            ?>
               <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to create Place Name.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
    }
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_placename" name="create_placename" onsubmit="return formvalidation('create_placename');">
                    <script>
                        function getDistrictNamesList(_StateNameID,DivID) {
                            _StateNameID = $('#'+_StateNameID).val();
                            $.ajax({url:'webservice.php?action=getDistrictNamesList&rand='+Math.random()+'&DivID='+DivID+'&StateNameID='+_StateNameID,success:function(data){
                                $('#ajax_getDistrictNames_'+DivID).html(data);
                            }});
                        }
                    </script>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="validationCustom01">State Name</label>
                            <?php $statenames = $mysql->select("select * from _tbl_master_statenames where IsActive='1' order by StateName"); ?>
                            <select class="form-select" id="StateNameID" name="StateNameID" onchange="getDistrictNamesList('StateNameID','DistrictNameID')">
                                <option value="0">Select State</option>
                                <?php foreach($statenames as $statename) {?>
                                <option value="<?php echo $statename['StateNameID'];?>" <?php echo ($statename['StateNameID']==$_POST['StateNameID']) ? " selected='selected' " : ""; ?>><?php echo $statename['StateName'];?></option>
                                <?php } ?>
                            </select>
                            <div id="ErrStateNameID" style="color:red"><?php echo isset($StateNameID) ? $StateNameID : "";?></div>
                            <span id="ajax_getDistrictNames_DistrictNameID"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationCustom01">District Name</label>
                                <select class="form-select" id="DistrictNameID" name="DistrictNameID">
                                    <option value="0">Select District</option>
                                </select>
                                <div id="ErrDistrictNameID" style="color:red"><?php echo isset($DistrictNameID) ? $DistrictNameID : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-8">
                                <label class="form-label" for="validationCustom01">Place Name</label>
                                <input class="form-control" id="PlaceName" name="PlaceName" type="text" placeholder="Place Name"  value="<?php echo isset($_POST['PlaceName']) ? $_POST['PlaceName'] : "";?>">
                                <div id="ErrPlaceName" style="color:red"><?php echo isset($PlaceName) ? $PlaceName : "";?></div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="validationCustom03">Remarks</label>
                                <input class="form-control" name="Remarks" id="Remarks" type="text" placeholder="Remarks"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>">
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                                <a href="dashboard.php?action=PlaceNames/list" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Create Place Name</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
 
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to create place name.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Tooltips and popovers modal-->