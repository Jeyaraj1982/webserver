<?php
$data=$mysql->select("select * from _tbl_lookingfor_jobs where LookingForJobID='".$_GET['id']."'");
?>
 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Looking Job Candidate's Information</div>    <br>
                                 
                            </div>
                        <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Candidate Name</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CandidateName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Email'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tel Number</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['TelNumber'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Job Position 1</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['JobPosition1'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Job Position 2</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['JobPosition2'];?></div>
                                </div>
                                  <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Interested Country 1</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['InterestedCountry1'];?></div>
                                </div>
                                  <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Interested Country 2</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['InterestedCountry2'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">SubmittedOn</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['SubmittedOn'];?></div>
                                </div>
                                 <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Attachment</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><a href="../uploads/<?php echo $data[0]['CVFile'];?>" target="_blank">Download</a></div>
                                </div>
                                 
                            </div>                                                                        
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                            <a href="dashboard.php?action=LookingForJob/list" class="btn btn-warning btn-border">Back</a>
                                         
                                    </div> 
                                                                           
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>