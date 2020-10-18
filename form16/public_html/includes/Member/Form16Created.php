<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align:center;">
                            <img src="assets/tick.jpg" style="width:200px"><br><br>          
                            <label for="fullname" class="placeholder" style="font-size:36px !important">Form submitted</label>
                            <div class="form-action" style="text-align: center;">
                                 <a href="dashboard.php?action=Paynow&req=<?php echo $_GET['req'];?>" class="btn btn-warning">Pay <?php echo OrderValue;?></a><br>
                                <a href="dashboard.php?action=ManageForm16&Status=All" id="show-signin" class="btn btn-danger btn-link btn-login">I pay later</a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>