 <div style="padding:0px;text-align:center;margin-bottom:20px;">
                <h5>Settings</h5>
            </div> 
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=settings_mysettings" class="btn btn-icon glow mb-1" style="width:100%"  >
                        <img src="assets/img/logo_myplan.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                        <br>My<br>Settings
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=settings_myplan" class="btn btn-icon glow mb-1" style="width:100%"  >
                        <img src="assets/img/logo_myplan.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                        <br>My<br>Plan
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=settings_change_password" class="btn btn-icon   glow mb-1" style="width:100%">
                       <img src="assets/img/logo_changepassword.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                       <br>Change<br>Password
                    </a>
                </div>
            
            </div>
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
                    <a href="dashboard.php?action=settings_myprofile"  class="btn btn-icon  glow mb-1" style="width:100%" >
                        <img src="assets/img/logo_myprofile.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                        <br>My<br>Profile
                    </a>
                </div>
                
                 <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=settings_wallet" class="btn btn-icon glow mb-1" style="width:100%">
            <img src="assets/img/logo_walletcredit.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Wallet<br>Settings  
        </a>
    </div>
    
                <?php if($_SESSION[User]['IsAPI']=="1"){ ?>
                    <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
                    <a href="dashboard.php?action=settings_apikey"  class="btn btn-icon  glow mb-1" style="width:100%" >
                        <img src="assets/img/logo_myprofile.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                        <br>API<br>Key
                    </a>
                </div>
                <?php } ?>
            </div>
            <div class="row" style="text-align: center;">
                <div class="col-12" style="margin-top:10px;">
                     <button type="button" class="btn btn-outline-success  btn-sm" onclick="location.href='dashboard.php';" style="width:100%;">Back</button>
                </div>
            </div>
           