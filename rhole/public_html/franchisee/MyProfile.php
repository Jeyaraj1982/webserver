<?php
   {
?>
<?php 
  $sql= $mysql->select("select * from `_tbl_franchisee` where  `userid`='".$_SESSION['FRANCHISEE']['userid']."'");
?>

        <!-- Sidebar -->

        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Profile </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Profile</div>
                                </div>
                                <form id="exampleValidation">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['FranchiseeName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['EmailID'];?></div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="dashboard.php?action=EditProfile" id="show-signup" class="link">Edit</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>                                                                                             
                        </div>
                    </div>
                </div>
            </div>
<?php include_once("footer.php");}?>