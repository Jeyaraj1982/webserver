<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyUpline">Member</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/MyUpline">My Upline Information</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">My Upline Information</div>
                </div>
                <div class="card-body">
                    <h4 class="m-b-0">Sponsor Name</h4>
                    <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['UplineName'];?></h5>
                     <br><Br><br>
                    <h4 class="m-b-0">Sponsor Code</h4>
                    <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['UplineCode'];?></h5>
                </div>
            </div>
        </div>
    </div>
</div>    