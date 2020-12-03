<?php  $data = $mysql->select("select * from _tbl_franchisee where userid='".$_GET['frid']."'");  ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Franchisee
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Franchisee Name</label>
                                <div class="col-md-3"><?php echo $data[0]['FranchiseeName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email ID</label>
                                <div class="col-md-3"><?php echo $data[0]['EmailID'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Password</label>
                                <div class="col-md-3"><?php echo $data[0]['Password'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Country Name</label>
                                <div class="col-md-3"><?php echo $data[0]['CountryName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">State Name</label>
                                <div class="col-md-3"><?php echo $data[0]['StateName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">District Name</label>
                                <div class="col-md-3"><?php echo $data[0]['DistrictName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">IsActive</label>
                                <div class="col-md-3"><?php if($data[0]['IsActive']==1){ echo "Active" ;}else { "Deactive";};?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Created On</label>
                                <div class="col-md-3"><?php echo $data[0]['CreatedOn'];?></div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/list&f=a">Back</a> 
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>