<?php  $data = $mysql->select("select * from _jusertable where userid='".$_GET['d']."'"); ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Staff
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Name</label>
                                <div class="col-md-9"><?php echo $data[0]['personname'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email ID</label>
                                <div class="col-md-9"><?php echo $data[0]['email'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                <div class="col-md-9"><?php echo $data[0]['email'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Password</label>
                                <div class="col-md-9"><?php echo $data[0]['pwd'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Created On</label>
                                <div class="col-md-9"><?php echo $data[0]['createdon'];?></div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=staff/list">Back</a> 
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>