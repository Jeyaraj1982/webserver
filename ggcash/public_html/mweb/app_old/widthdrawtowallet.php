<?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">WithDraw</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">With Draw</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                         

<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body">
                                         <?php
                                          
 
  
    
 //$mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
                                     
                       if (isset($_POST['btnWithDraw'])) {
                            $amt = getEarningAvailableBalance($_SESSION['User']['MemberID']);
                            
                           $mysqldb->insert("_tbl_earnings",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                "MemberCode"=>$_SESSION['User']['MemberCode'],
                                                                "Particulars"=>"Moved to wallet",
                                                                "TxnDate"=>date("Y-m-d H:i:s"),
                                                                "Credits"=>"0",
                                                                "Debits"=>$amt,
                                                                "AvailableBalance"=>"0.00",
                                                                "details"=>" "));
                           $mysqldb->insert("_tbl_wallet_transactions",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                           "TxnDate"=>date("Y-m-d H:i:s"),
                                                                           "Particulars"=>"From Earning Balance",
                                                                           "Credits"=>$amt,
                                                                           "Debits"=>"0",
                                                                           "AvailableBalance"=>(getAvailableBalance($_SESSION['User']['MemberID'])+$amt)));
                                                                           
                           echo number_format($amt,2)." Moved to wallet successfully";
                                                      ?>
                                                      <style>
                                                      #da {display:none}
                                                      </style>
                                                      <?php                                           
                       }        
                                         ?>
  
                                         <form id='da' action="" method="post" onsubmit="return submitamount();">
                                <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                                   <br><Br>
                                  <div class="form-actions">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Earning Balance</label>
                                                    <select name="BankName" id="BankName" class="form-control">
                                                       
                                                        <option value=""><?php echo number_format(getEarningAvailableBalance($_SESSION['User']['MemberID']),2);?></option>
                                                        
                                                    </select>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                                 
                                            </div>
                                <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default" name="btnWithDraw">Move to my wallet</button>
                                        </div>
                                    </div>
                                    </form>
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



 
