
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        My Sponser Info
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group row">
                                   <div class="col-sm-3">Sponsor ID</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $_SESSION['User']['SponsorCode'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <div class="col-sm-3">Sponsor Name</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $_SESSION['User']['SponsorName'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 