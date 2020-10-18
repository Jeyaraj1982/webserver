
        <!-- Sidebar -->
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Update Wallet</div>
                                </div>
                                <?php
  // print_r($_POST);
    
?>   

                                <form method="POST" action="dashboard.php?action=UpdateWallet" >
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Wallet Amount <span class="required-label">*</span></label>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select name="noofforms" id="noofforms" class="form-control">
                                                    <option value="25">25 Forms Rs. 2475</option>
                                                    <option value="50">50 Forms Rs. 4950</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        
                                      
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                                <a href="dashboard.php" class="btn btn-outline-danger">Cancel</a>
                                                <input class="btn btn-warning" type="submit" name="UpdateWallet" value="Buy Now">
                                                
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            