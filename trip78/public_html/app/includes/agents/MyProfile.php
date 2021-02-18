<?php
  $data = $mysql->select("select * from `_tbl_tour_agents` where `AgentID`='".$_SESSION['User']['AgentID']."'");
?>
<style>
.form-group{
    padding:0px !important;
}
.form-text {
    display: block;
    margin-top: 0px;
}
</style>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">My Profile Information</div>
                            <span style="font-size:12px">Created <?php echo date("M d, Y",strtotime($data[0]['AddedOn']));?></span>
                        </div>
                            <div class="card-body">
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="form-group form-show-validation row"> 
                                            <label for="email" class="col-md-2 mt-sm-2 text-right">Name</label>
                                            <label class="col-md-10 mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AgentName'];?></small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation row">
                                            <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                            <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo "+91-". $data[0]['MobileNumber'];?></small>
                                            </label>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation row">
                                            <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                            <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['EmailID'];?></small>
                                            </label>
                                        </div>  
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="form-group form-show-validation row"> 
                                            <label for="email" class="col-md-2 mt-sm-2 text-right">Address Line1</label>
                                            <label class="col-md-10 mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine1'];?></small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="form-group form-show-validation row"> 
                                            <label for="email" class="col-md-2 mt-sm-2 text-right">Address Line2</label>
                                            <label class="col-md-10 mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine2'];?></small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation row">
                                            <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">City Name</label>
                                            <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CityName'];?></small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation row">
                                            <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Country Name</label>
                                            <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CountryName'];?></small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation row">
                                            <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">State Name</label>
                                            <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['StateName'];?></small>
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation row">
                                            <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">District Name</label>
                                            <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DistrictName'];?></small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="form-group form-show-validation row">
                                            <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Login Name</label>
                                            <label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                                <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['LoginName'];?></small>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" onclick="location.href='dashboard.php'" class="btn btn-outline-warning">Back</button>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>