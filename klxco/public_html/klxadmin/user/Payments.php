<?php 
  $obj = new CommonController();
      
         
$user = new JUsertable();
$pageContent = $user->getUser($_GET['d']);
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Transaction
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Person Name</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email Address</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['mobile'];?></div>
                            </div>
                            <br><br>
                            <h4>Payments</h4>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>Txn Date</td>
                                            <td>Txn Amount</td>
                                            <td>Status</td>
                                            <td>Payment For</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = $mysql->select("select * from _tblPayments where ClientID='".$_GET['d']."'");
                                        foreach ($sql as $r){ 
                                       ?>
                                     <tr>
                                        <td><?php echo $r['TxnDate'];?></td>
                                        <td style="text-align: right"><?php echo number_format($r['TxnAmount'],2);?></td>
                                        <td><?php if($r['TxnStatus']=="Success"){ echo $r['TxnStatus'];} else { echo "failure";}?></td>
                                        <td><?php echo $r['PaymentFor'];?></td>
                                     </tr>   
                                    <?php } ?>
                                     <?php if(sizeof($sql)==0) { ?>
                                          <tr><td>No Transaction Found</td></tr>  
                                            
                                       <?php }   ?>
                                    </tbody>
                                </table>                                                
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=user/listuser&f=a'">Cancel</button>
                                </div>                                        
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

