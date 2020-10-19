<?php include_once("header.php");?>
      <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Accounts summary</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Accounts summary</li>
                                </ol>
                            </nav>
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
                                                <span class="text-orange display-6"><i class="mdi mdi-bank text-primary"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <h5 class="font-normal text-right">Available Balance</h5>
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
                                                <span class="text-orange display-6"><i class="mdi mdi-account-convert text-warning"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <h5 class="font-normal text-right">Convert to Staking Balance</h5>
                                                <a href=""><h4 class="text-bg text-right">CONVERT NOW</h4></a>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-warning " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="row p-t-20">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-orange"><i class="ti-search"></i> Search Account Summary</h4>
                                <form name="SearchAccountSummary" id="SearchAccountSummary" method="post"  >
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>From Date </label>
                                                <div class="form-group">
                                                    <input type="date" name="date" id="date" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>To Date </label>
                                                <div class="form-group">
                                                    <input type="date" name="to_date" id="to_date" class="form-control" value="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Description </label>
                                                <div class="form-group">
                                                    <select name="description" id="description" class="form-control">
                    <option value="">-- Select --</option>
                    <option value="INT-TRANSFER">INT-TRANSFER</option>
                    <option value="Withdrawal">Withdrawal</option>
                    <option value="Introduction Bonus">Affiliate Incentive</option>
                    <option value="Matching Bonus">Group Incentive</option>
                    <option value="Re-Topup">Re-Topup</option>
                    <option value="ROI Output">ROI Output</option>
                  </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Credit/Debit </label>
                                                <div class="form-group">
                                                    <select name="crdeit_debit" id="crdeit_debit" class="form-control" required>
                    <option value="">-- Select --</option>  
                    <option value="credit">Credit</option>
                    <option value="debit">Debit</option>  
                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-danger text-white">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body">
                                                                <h4 class=" text-orange p-b-20"><i class="mdi mdi-bank"></i> Available Balance Account Summary</h4>
                                
                                <div class="tablesaw-bar tablesaw-mode-stack"></div><table class="tablesaw no-wrap table-bordered table-hover table tablesaw-stack" data-tablesaw="" id="tablesaw-4030">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border">DATE</th>
                                            <th scope="col" class="border">DESCRIPTION</th>
                                            <th scope="col" class="border">VOLUME</th>
                                            <th scope="col" class="border">AVAILABLE BALANCE</th>
                                            
                                        </tr>
                                    </thead>
                                     
                                </table>
 
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



 
