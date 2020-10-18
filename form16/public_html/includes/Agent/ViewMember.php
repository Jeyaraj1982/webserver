
<?php 
  $sql= $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
?>
 
        
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title"> </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Customer</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <div class="form-group form-show-validation row">
                                                    <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name </label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberName'];?></div>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number </label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MobileNumber'];?></div>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created On </label>
                                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo date("d M, Y H:i",strtotime($sql[0]['CreatedOn']));?></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                            <div class="card-title">Forms</div>
                                                    <label><a href="dashboard.php?action=ManageForm16ByAgent&Status=All&MCode=<?php echo $sql[0]['MemberCode'];?>">All</a> </label> <br>
                                                    <label><a href="dashboard.php?action=ManageForm16ByAgent&Status=Submitted&MCode=<?php echo $sql[0]['MemberCode'];?>">Submitted</a> </label> <br>
                                                    <label><a href="dashboard.php?action=ManageForm16ByAgent&Status=Accepted&MCode=<?php echo $sql[0]['MemberCode'];?>">Accepted</a> </label> <br>
                                                    <label><a href="dashboard.php?action=ManageForm16ByAgent&Status=InProccessed&MCode=<?php echo $sql[0]['MemberCode'];?>">InProccessed</a> </label> <br>
                                                    <label><a href="dashboard.php?action=ManageForm16ByAgent&Status=Completed&MCode=<?php echo $sql[0]['MemberCode'];?>">Completed</a> </label> <br>
                                                    <label><a href="dashboard.php?action=ManageForm16ByAgent&Status=Rejected&MCode=<?php echo $sql[0]['MemberCode'];?>">Rejected</a> </label> <br>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="dashboard.php?action=ManageCustomer&Status=All" id="show-signup" class="link">Back</a>
                                                    <a href="dashboard.php?action=ManageForm16ByAgent&MCode=<?php echo $sql[0]['MemberCode'];?>&Status=All" id="show-signup" class="link"  style="float:right;">View Forms&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                    <a href="dashboard.php?action=CreateCustomerForm16&MCode=<?php echo $sql[0]['MemberCode'];?>&Status=All" id="show-signup" class="link" style="float:right;">Create Form16&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>
         
         
         
     