<?php include_once("header.php");?>
      <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Utility Wallet Summary</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Utility Wallet summary</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
      <div class="col-lg-4 col-sm-12"> </div>
                            <div class="col-lg-4 col-sm-12"></div>
    <div class="col-lg-4 col-sm-12">
                                <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary p-15">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-orange display-6"><i class="mdi mdi-bank text-primary"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <h5 class="font-normal text-right">Utility Wallet Balance</h5>
                                                <h3 class="text-bg text-right"><?php echo number_format(getUtilityhWalletBalance($_SESSION['User']['MemberID']),2);?> </h3>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-primary " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- 
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
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                -->
<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body">
                                                                
                            <h4 class=" text-orange p-b-20"><i class="mdi mdi-bank"></i> Utitlity Wallet Summary</h4>
                            <!--<a href="widthdrawtowallet.php" style="float:right;" class="btn btn-primary waves-effect waves-light">Withdraw to wallet </a>-->
                                
                                <div class="tablesaw-bar tablesaw-mode-stack"></div>
                                <table class="tablesaw no-wrap table-bordered table-hover table tablesaw-stack" data-tablesaw="" id="tablesaw-4030">
                                    <thead>                                                         
                                        <tr>
                                            <th scope="col" class="border"  style="width:120px"><label>Transaction date</label></th>
                                            <th scope="col" class="border"><label>Particulars</label></th>
                                            <th scope="col" class="border" style="width:100px"><label>Credits</label></th>
                                            <th scope="col" class="border" style="width:100px"><label>Debits</label></th>
                                            <th scope="col" class="border" style="width:100px"><label>Available Balance</label></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $Transactions=$mysqldb->select("SELECT * FROM _tbl_wallet_utility where MemberID='".$_SESSION['User']['MemberID']."' order by TxnID desc"); ?>
                                        <?php foreach ($Transactions as $Transaction){ ?>
                                            <tr>
                                                <td><?php echo $Transaction['TxnDate'];?></td>
                                                <td><?php echo $Transaction['Particulars'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Transaction['Debits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($Transaction['AvailableBalance'],2);?></td>
                                            </tr>
                                         <?php }?> 
                                          <?php if(sizeof($Transactions)=="0"){?>
                                                <tr>
                                                    <td colspan="5" style="text-align: center;">No Transactions Found</td>
                                                </tr>
                                         <?php }?>
                                    </tbody>
                                     
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



 
