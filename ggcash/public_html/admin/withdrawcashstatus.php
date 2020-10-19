<?php include_once("header.php");?>
              <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Withdraw Status</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Withdraw Status</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-bg">
                                                <span class="text-white display-6"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-primary"></i></span>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2>0</h2>
                                                <h6>Processed Withdrawal(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-left border-success bg-success text-bg bg-image bg-overlay-success">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-bg">
                                                <span class="text-white display-6"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-success"></i></span>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2>0</h2>
                                                <h6>Pending Withdrawal(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card border-left border-warning bg-success text-bg bg-image bg-overlay-warning">
                                    <div class="card-body">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="text-bg">
                                                <span class="text-white display-6"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-warning"></i></span>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <h2>0</h2>
                                                <h6>Deleted Withdrawal(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<h4 class="card-title">Withdraw Status</h4>
<div class="table-responsive">
<table id="file_export" class="table table-bordered table-hover ">
<thead>
    <tr>
        <th>DATE</th>
        <th>AMOUNT</th>
        <th>STATUS</th>
    </tr>
</thead>
<tbody>
        
</tbody>

</table>
<nav aria-label="Page navigation example float-right">
                                                                                    </nav>
</div>
</div>
</div>
</div>
</div>

<script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
            </div>
            



            


         <?php include_once("footer.php"); ?>



 
