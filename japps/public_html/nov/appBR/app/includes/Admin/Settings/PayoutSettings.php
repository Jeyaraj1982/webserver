<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/ChangePassword">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/Payoutettings">Payout Settings</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <?php include_once("includes/".UserRole."/Settings/sub_menu.php"); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-orange"><i class="ti-user"></i>Payout Configurations</h4>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <span style="color:green;">&nbsp;</span>
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-8 col-xs-6 b-r"> 
                            <strong>Package ROI Settlement Days (Every Week)</strong><br>
                            <input type="text" name="PayoutCharges"  readonly="readonly" id="PayoutCharges" class="form-control" value="Mon, Tue, Wed, Thu">
                        </div>
                        <div class="col-md-4 col-xs-6 b-r"> 
                            <strong>Report Day</strong><br>
                            <input type="text" name="PayoutCharges"  readonly="readonly" id="PayoutCharges" class="form-control" value="Ist, 16th">
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-8 col-xs-6 b-r">
                            <strong>Referal ROI Settlement Days (Every Week)</strong><br>
                            <input type="text" name="PayoutCharges"  readonly="readonly" id="PayoutCharges" class="form-control" value="Mon, Tue, Wed, Thu">
                        </div>
                        <div class="col-md-4 col-xs-6 b-r"> 
                            <strong>Report Day</strong><br>
                            <input type="text" name="PayoutCharges"  readonly="readonly" id="PayoutCharges" class="form-control" value="Sat">
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-8 col-xs-6 b-r"> 
                            <strong>Binary Settlement Days (Every Week)</strong><br>
                            <input type="text" name="PayoutCharges" readonly="readonly" id="PayoutCharges" class="form-control" value="Sun, Mon, Tue, Wed, Thu, Fri, Sat">
                        </div>
                        <div class="col-md-4 col-xs-6 b-r"> 
                            <strong>Report Day</strong><br>
                            <input type="text" name="PayoutCharges"  readonly="readonly" id="PayoutCharges" class="form-control" value="Sat">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>           