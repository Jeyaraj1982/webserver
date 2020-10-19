<?php include_once("header.php");?>
      <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">My Stakings</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Stakings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small> </small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary">
                                    <div class="card-body text-bg ">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>0</h3>
                                                <h6 class="">Active Staking(s)</h6></div>
                                            <div class="col-12">
                                                <div class="progress">
                                                    <div class="progress-bar bg-priary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-success bg-success text-bg bg-image bg-overlay-success">
                                    <div class="card-body text-bg">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>0</h3>
                                                <h6>Inactive Staking(s)</h6></div>
                                            <div class="col-12">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-warning bg-success text-bg bg-image bg-overlay-warning">
                                    <div class="card-body text-bg">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>0</h3>
                                                <h6>Fixed Staking(s)</h6></div>
                                            <div class="col-12">
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-danger bg-success text-bg bg-image bg-overlay-danger">
                                    <div class="card-body text-bg">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>0</h3>
                                                <h6>Regular Staking(s)</h6></div>
                                            <div class="col-12">
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                        <div class="row">
<div class="col-12">
  <div class="card">
      <div class="card-body wizard-content">
        <h4 class="card-title text-orange"><i class="ti-list"></i>&nbsp;&nbsp; Staking(s)</h4>
          
          <div class="no-wrap table-bordered table-hover table-responsive"><table class="table m-b-0">
                                    <thead>
                                        <tr>
                                            <th >Sl No</th>
                                            <th >DATE</th>
                                            <th >Transaction ID</th>
                                            <th >Volume</th>
                                            <th >Mode</th>
                                            <th >Maturity / Expiry</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="checkall-target">
                                                   
                                    </tbody>
                                    
                                </table>
                                </div>
                                <nav aria-label="Page navigation example float-right" class="m-t-20">
                                    
                                        </nav>
                                
      </div>
  </div>
</div>
</div>
<script src="https://gcchub.org/panel/assets/libs/block-ui/jquery.blockUI.js"></script>
<script src="https://gcchub.org/panel/assets/extra-libs/block-ui/block-ui.js"></script>
<a class="btn" id="open-mod" alt="default" data-toggle="modal" data-target="#responsive-modal" data-backdrop="static" data-keyboard="false" class="model_img img-fluid" style="display: none !important; font-size: 0px;">&nbsp;</a>
                                <div id="responsive-modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>One of your staking <span class="text-danger">not having transaction id</span></h3>
    
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                                            </div>
                                                                                    </div>
                                    </div>
                                </div>
            </div>
            


         <?php include_once("footer.php"); ?>



 
