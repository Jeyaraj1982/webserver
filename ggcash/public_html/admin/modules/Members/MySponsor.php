 <?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">My Sponsor Information</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Sponsor Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                 <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary p-0">
                        <div class="card-body text-bg">
                            <div class="d-flex flex-row">
                                <div class="align-self-center display-6"><i class="ti-user"></i></div>
                                <div class="p-10 align-self-center">
                                    <h4 class="m-b-0">Sponsor Name</h4>
                                </div>
                                <div class="ml-auto align-self-center">
                                    <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['SponsorName'];?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card border-left border-success bg-success text-bg bg-image bg-overlay-success p-0">
                        <div class="card-body text-bg">
                            <div class="d-flex flex-row">
                                <div class="display-6 align-self-center"><i class="ti-user"></i></div>
                                <div class="p-10 align-self-center">
                                    <h4 class="m-b-0">Sponsor Code</h4>
                                </div>
                                <div class="ml-auto align-self-center">
                                    <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['SponsorCode'];?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>
     </div>
                <script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

                <?php include_once("footer.php"); ?>