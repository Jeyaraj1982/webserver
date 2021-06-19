 <div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
            <?php
                if ($_GET['redirect']=="AddHirings") {
                    $title="Add Hirings";
                }
                
                 if ($_GET['redirect']=="AddDocuments") {
                    $title="Add Document";
                }
                
                 if ($_GET['redirect']=="AddNotes") {
                    $title="Add Notes";
                }
                
                if ($_GET['redirect']=="AddExpenses") {
                    $title="Add Expenses";
                } 
                
                if ($_GET['redirect']=="AddPayments") {
                    $title="Add Payments";
                }
                 if ($_GET['redirect']=="AddPayments") {
                    $title="Add TimeSheet";
                }
            ?>
                <h3><?php echo $title;?></h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
    
    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        
        if (strlen(trim($_POST['CaseNumber']))==0) {
            $CaseNumber = "Please enter case number";
            $error++;
        }
        $CaseDetails = $mysql->select("select * from _tbl_cases_register where CaseNumber='".$_POST['CaseNumber']."' or CNRNumber='".$_POST['CaseNumber']."'");
        if (sizeof($CaseDetails)==0) {
            $CaseNumber = "case not found";
            $error++; 
        }
     
        if ($error==0) {
            
           ?>
           <script>
            location.href='dashboard.php?action=Dashboard/<?php echo $_GET['redirect'];?>&case=<?php echo md5($CaseDetails[0]['CreatedOn'].$CaseDetails[0]['CaseID']);?>';
           </script>
           <?php
           exit; 
        }  else {
            ?>
               <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to find case number.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
    }
?>
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" >
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Case Number / CNR Number</label>
                                <input class="form-control" id="CaseNumber" name="CaseNumber" type="text" placeholder="Case Number / CNR Number" value="<?php echo isset($_POST['CaseNumber']) ? $_POST['CaseNumber'] : "";?>">
                                <div id="ErrCaseNumber" style="color:red"><?php echo isset($CaseNumber) ? $CaseNumber : "";?></div>
                            </div>   
                            
                           
                                           
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                  
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Go!</button>
                            </div>
                        </div>
                    </form>
                  

                </div>
            </div>
        </div>
    </div>
</div>
                              