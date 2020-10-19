<?php include_once("header.php");?>
     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Add Bank</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Bank</li>
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
                                          
 
  
    
 $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");

                       if (isset($_POST['btnAddBank'])) {
                                                 /*  $id=$mysqldb->insert("_tbl_wallet_transactions",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                             "Particulars"=>'Add To Wallet',                    
                                                                             "Credits"=>$_POST['amount'],                    
                                                                             "Debits"=>0,                    
                                                                             "TxnDate"=>date("Y-m-d H:i:s")));   */
                   $id=$mysqldb->insert("_tbl_member_bank_details",array("MemberID"     =>$_SESSION['User']['MemberID'],
                                                                         "BankName"     => $_POST['BankName'],
                                                                         "AccountNumber"=>$_POST['AccountNumber'],
                                                                         "IFSCode"      =>$_POST['IFSCode'],
                                                                         "AccountName"  =>$_POST['AccountName'],
                                                                         "CreatedOn"    =>date("Y-m-d H:i:s"))); 
                                         echo "<span style='color:green'>Bank Details added successfully.</span>";
                                         unset($_POST);
         
                                         }                                                                                           
                                        
                                         ?>
                                         <form action="" method="post">
                                <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                                   <br><Br>
                                  <div class="form-actions">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Bank Name</label>
                                                    <select name="BankName" id="BankName" class="form-control">
                                                        <?php $BankDetails =$mysqldb->select("select * from _tbl_bank_names order by BankName");
                                                                foreach($BankDetails as $BankDetail){
                                                         ?>
                                                        <option value="<?php echo $BankDetail['BankName'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                              <div class="form-group user-test" id="user-exists">
                                                    <label>Account Number</label>
                                                    <input type="text" name="AccountNumber" id="AccountNumber" value="<?php echo (isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Account Number">
                                                    <span class="errorstring" id="ErrAccountNumber"><?php echo isset($ErrAccountNumber)? $ErrAccountNumber : "";?></span>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                              </div>
                                              <div class="form-group user-test" id="user-exists">
                                                    <label>IFSCode</label>
                                                    <input type="text" name="IFSCode" id="IFSCode" value="<?php echo (isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter IFSCode">
                                                    <span class="errorstring" id="ErrIFSCode"><?php echo isset($ErrIFSCode)? $ErrIFSCode : "";?></span>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                              </div>
                                              <div class="form-group user-test" id="user-exists">
                                                    <label>Account Holder's Name</label>
                                                    <input type="text" name="AccountName" id="AccountName" value="<?php echo (isset($_POST['AccountName']) ? $_POST['AccountName'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Account Name">
                                                    <span class="errorstring" id="ErrAccountName"><?php echo isset($ErrAccountName)? $ErrAccountName : "";?></span>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                              </div>
                                  </div>
                                <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default" name="btnAddBank">Submit</button>
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



 
