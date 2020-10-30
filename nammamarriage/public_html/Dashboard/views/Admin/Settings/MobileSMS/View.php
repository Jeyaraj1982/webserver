<?php
    $response = $webservice->getData("Admin","SettingsMobileApiDetailsForView");
    $Api= $response['data']['ViewMobileApiDetails'];
?> 

<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mail Api</h4>
                </div>
              </div>
</div>
<form method="post" action="" onsubmit="return SubmitNewApi();">            
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View Api</h4>                           
                  <form class="form-sample">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Api Code</div>
                          <div class="col-sm-2"><small style="color:#737373;"><?php echo $Api['ApiCode'];?></small></div>
                        </div>
                      </div>
                      </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Api Name</div>
                          <div class="col-sm-8"><small style="color:#737373;"><?php echo $Api['ApiName'];?></small></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Api Url</div>
                          <div class="col-sm-8"><small style="color:#737373;"><?php echo $Api['ApiUrl'];?></small></div>
                        </div>
                      </div>
                    </div>
                    <h4 class="card-title">Manage param</h4>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Description</label>
                          <label class="col-sm-2 col-form-label">Param Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Mobile Number</div>
                          <div class="col-sm-3"><small style="color:#737373;"><?php echo $Api['MobileNumber'];?></small></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Message Text</div>
                          <div class="col-sm-3"><small style="color:#737373;"><?php echo $Api['MessageText'];?></small></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Method</div>
                          <div class="col-sm-2"><small style="color:#737373;"><?php echo $Api['Method'];?></small></div>
                      </div>                                          
                    </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Time out</div>
                          <div class="col-sm-2"><small style="color:#737373;"><?php echo $Api['TimedOut'];?></small></div>
                        </div>
                      </div>                                          
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2">Remarks</label>
                          <div class="col-sm-8"><small style="color:#737373;"><?php echo $Api['Remarks'];?></small></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-2">Status</div>
                          <div class="col-sm-3"><small style="color:#737373;">
                              <?php if($Api['IsActive']==1){
                                  echo "Active";
                              }                                  
                              else{
                                  echo "Deactive";
                              }
                              ?>
                              </small>
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="Form-group row">
                          <div class="col-sm-2" >Created On</div>
                          <div class="col-sm-3"><small style="color:#737373;"><?php echo PutDateTime($Api['CreatedOn']);?></small></div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div class="col-sm-8"><a href="#" >Transaction Report</a></div>
                        </div>
                      </div>
                    </div>
                   <div class="form-group row">
                       <div class="col-sm-2"><a href="../MobileSms" style="text-decoration: underline;">List of Api</a></div>
                   </div>
                </form>
             </div>                                        
          </div>
</div>
</form>                                                  
