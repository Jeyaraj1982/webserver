<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>New Bench Name</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if (strlen(trim($_POST['BenchName']))==0) {
            $BenchName = "Please enter Bench Name";
            $error++;
        }
         
        if ($_POST['HighCourtID']==0) {
            $HighCourtID = "Please enter high court";
            $error++;
        }
        
        
        $duplicate = $mysql->select("select * from _tbl_master_highcourts_bench where BenchName='".trim($_POST['BenchName'])."'");
        if (sizeof($duplicate)>0) {
            $BenchName = "Bench Name already exists";
            $error++;  
        }
        
        if ($error==0) {
            $highcourt=$mysql->select("select * from _tbl_master_highcourts where HighCourtID='".$_POST['HighCourtID']."'");
            
            $mysql->insert("_tbl_master_highcourts_bench",array("BenchName" => trim($_POST['BenchName']),
                                                             "HighCourtID"      => $highcourt[0]['HighCourtID'],
                                                             "HighCourtName"      => $highcourt[0]['CourtName'],
                                                             "Remarks"      => trim($_POST['Remarks']),
                                                             "CreatedOn"      =>date("Y-m-d H:i:s"),
                                                             "IsActive"     => "1"));
            echo $mysql->error;
        
            unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>Bench Name created.</p>
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
                    
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to create Bench Name.</p>
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
                    <form action="" method="post" id="create_benchname" name="create_benchname" onsubmit="return formvalidation('create_benchname');">
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Bench Name</label>
                                <input class="form-control" id="BenchName" name="BenchName" type="text" placeholder="Bench Name"  value="<?php echo isset($_POST['BenchName']) ? $_POST['BenchName'] : "";?>">
                                <div id="ErrBenchName" style="color:red"><?php echo isset($BenchName) ? $BenchName : "";?></div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                         <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">High Court</label>
                                <?php $highcourts = $mysql->select("select * from _tbl_master_highcourts where IsActive=1 order by CourtName"); ?>
                                <select class="form-select" id="HighCourtID" name="HighCourtID">
                                    <option value="0">Select High Court</option>
                                <?php
                                
                                    foreach($highcourts as $highcourt) {   
                                ?>
                                <option value="<?php echo $highcourt['HighCourtID'];?>" <?php echo ($_POST['HighCourtID']==$highcourt['HighCourtID']) ? " selected='selected' " : "";?> ><?php echo $highcourt['CourtName'];?></option>
                                 
                                 <?php } ?>
                                    
                                
                                </select>
                                <div id="ErrHighCourtID" style="color:red"><?php echo isset($HighCourtID) ? $HighCourtID : "";?></div>
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
                                <a href="dashboard.php?action=HighCourtBenchNames/list" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Create Bench Name</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!--<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Vertically centered</button>-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to create bench name.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Tooltips and popovers modal-->