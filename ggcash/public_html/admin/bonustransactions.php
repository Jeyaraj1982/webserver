<?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Bonus Balance Transactions</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bonus Balance Transactions</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small> </small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
<div class="col-lg-4 col-sm-12">
                                <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary p-15">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-orange display-6"><i class="mdi mdi-format-bold text-primary"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <h5 class="font-normal text-right">Bonus Balance</h5>
                                                <h3 class="text-bg text-right">0.00 </h3>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-primary " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="card border-left border-success bg-success text-bg bg-image bg-overlay-success p-15">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-orange display-6"><i class="mdi mdi-account-convert text-success"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <h5 class="font-normal text-right">Convert to Bonus Balance</h5>
                                                <a href=""><h4 class="text-bg text-right">CONVERT NOW</h4></a>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="card border-left border-warning bg-success text-bg bg-image bg-overlay-warning p-15">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-orange display-6"><i class="mdi mdi-transfer text-warning"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <h5 class="font-normal text-right">Bonus Balance Transfer</h5>
                                                <a href=""><h4 class="text-bg text-right">TRANSFER NOW</h4></a>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-warning " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>        

<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bonus Transactions</h4>

                                <div class="tablesaw-bar tablesaw-mode-stack"></div><table class="tablesaw no-wrap table-bordered table-hover table tablesaw-stack" data-tablesaw="" id="tablesaw-4030">
                                    <thead>
                                        <tr>
              <th scope="col" class="border">Date</th>
              <th scope="col" class="border">Sender/Receiver</th>
              <th scope="col" class="border">Volume</th>
              <th scope="col" class="border">Balance</th>
              <th scope="col" class="border">Details</th>
            </tr>
        </thead>
                                    <tbody id="checkall-target">
                                          <tr><td colspan="5" style="text-align: center;">No results found</td></tr>
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example float-right">
                                    
                                        </nav>
                            </div>
                        </div>
</div>
</div>

<script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script>
//=============================================//
//    File export                              //
//=============================================//
$('#file_export').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
</script>            </div>
            
            


         <?php include_once("footer.php"); ?>



 
