<?php include_once("header.php");?>
            
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Withdraw fund from E-Wallet 
                                   
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Example Tooltip">
                                    <i class="fa fa-star"></i>
                                </button>
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Buttons
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                        Inbox
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Book
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="nav-link-icon lnr-picture"></i>
                                                    <span>
                                                        Picture
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a disabled="" class="nav-link disabled">
                                                    <i class="nav-link-icon lnr-file-empty"></i>
                                                    <span>
                                                        File Disabled
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    </div>
                    </div>        
                    <div class="tab-content">
                       
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Amount to be withdraw *</div>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">RS</span></div>
                                                        <input type="text" name="Amount" id="Amount" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Transaction Password *</div>
                                                    <div class="col-sm-9">
                                                       <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <a href="#" class="btn btn-secondary">Forget Password</a>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Select Payment Methods *</div>
                                                    <div class="col-sm-9">
                                                        <div class="custom-radio custom-control">
                                                            <input type="radio" id="exampleCustomRadio" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="exampleCustomRadio">Bank Account</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button class="mb-2 mr-2 btn btn-gradient-primary">Submit withdrawal Request</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>