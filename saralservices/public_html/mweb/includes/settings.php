<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Settings</h5>
</div> 
<div class="row">
<?php if ($_SESSION['User']['IsDealer']==1) { ?>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings_myprofile" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_myprofile.png" class="theme-1-icon">
            <br>My<br>Profile
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=settings_change_password" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_changepassword.png" class="theme-1-icon">
            <br>Change<br>Password
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings_changepin" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_settings.png" class="theme-1-icon">
            <br>Change<br>Pin
        </a>
    </div> 
<?php } else{ ?>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings_myprofile" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_myprofile.png" class="theme-1-icon">
            <br>My<br>Profile
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=settings_change_password" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_changepassword.png" class="theme-1-icon">
            <br>Change<br>Password
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings_changepin" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_settings.png" class="theme-1-icon">
            <br>Change<br>Pin
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings_mysettings" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_settings.png" class="theme-1-icon">
            <br>My<br>Settings
        </a>
    </div>    
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings_mychargesandcommission" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_settings.png" class="theme-1-icon">
            <br>My<br>Charges
        </a>
    </div>
 <?php } ?>  
</div>
<div class="row">
    <div class="col-12" style="text-align: center;">
          <button type="button" class="btn btn-black btn-sm" onclick="location.href='dashboard.php';" style="background:#6c757d !important;">Back</button>
    </div>
</div>