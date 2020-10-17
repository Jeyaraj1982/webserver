<?php  $data = $mysql->select("select * from _tbl_franchisee where userid='".$_GET['frid']."'");  ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Franchisee
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_POST['submitBtn'])) {
                                  
                                $mysql->insert("_tbl_franchisee_wallet",array("FranchiseeID"      => $_GET['frid'],
                                                                  "TxnDate"           => date("Y-m-d H:i:s"),
                                                                  "Particulars"       => $_POST['particulars'],
                                                                  "Credits"           => $_POST['Amount'],
                                                                  "Debits"            => "0",
                                                                  "Balance"           => $application->getBalance($_GET['frid'])+($_POST['Amount']),
                                                                  "PaymentID"         => "-2",
                                                                  "WithdrwaID"        => "0",
                                                                  "FranchiseeRemarks" => "",
                                                                  "AdminRemarks"      => $_POST['AdminRemarks']));
                                ?>
                                  <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Updated successfully.</label>
                                
                            </div>
                                <?php
                            }
                            ?>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Franchisee Name</label>
                                <div class="col-md-3"><?php echo $data[0]['FranchiseeName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email ID</label>
                                <div class="col-md-3"><?php echo $data[0]['EmailID'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Country Name</label>
                                <div class="col-md-3"><?php echo $data[0]['CountryName'];?>/<?php echo $data[0]['StateName'];?>/<?php echo $data[0]['DistrictName'];?></div>
                            </div>
                           
                            
                        </div>
                        <form action="" method="post">
                          <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Particulars</label>
                                <div class="col-md-3"><input type="text" name="particulars" class="form-control" style="border:1px solid #ccc"></div>
                            </div>
                             <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Amount</label>
                                <div class="col-md-3"><input type="text" name="Amount" class="form-control" style="border:1px solid #ccc"></div>
                            </div> <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Admin Remarks</label>
                                <div class="col-md-3"><input type="text" name="AdminRemarks" class="form-control" style="border:1px solid #ccc"></div>
                            </div>
                               <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right"> </label>
                                <div class="col-md-3"><input type="submit" name="submitBtn" class="btn btn-success" value="Add Credits"></div>
                            </div>
                          </form>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/list&f=a">Back</a> 
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>