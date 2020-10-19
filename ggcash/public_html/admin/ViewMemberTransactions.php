<?php include_once("header.php");?>  
<?php
 $Transactions  = $mysqldb->select("SELECT * FROM _tbl_wallet_transactions where MemberID='".$_GET['code']."'");
 $Member  = $mysqldb->select("SELECT * FROM _tbl_Members where MemberID='".$_GET['code']."'");     
  ?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">Transaction History</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Transaction History</li>
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
                            <div class="card-body border-top">
                                <div class="row m-b-0">
                                    <div class="col-md-4"> <strong>Member Name</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $Member[0]['MemberName'];?></p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>   
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
<div class="card">
<div class="card-body">
    <div class="table-responsive">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>Transaction Date</b></th>
                                                <th class="border-top-0"><b>Particulars</b></th>
                                                <th class="border-top-0"><b>Credits</b></th>
                                                <th class="border-top-0"><b>Debits</b></th>
                                                <th class="border-top-0" style="text-align:right"><b>Available Balance</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Transactions as $Transaction){ ?>
                                            <tr>
                                                <td><?php echo $Transaction['TxnDate'];?></td>
                                                <td><?php echo $Transaction['Particulars'];?></td>
                                                <td><?php echo $Transaction['Credits'];?></td>
                                                <td><?php echo $Transaction['Debits'];?></td>
                                                <td style="text-align:right"><?php echo "0.00";?></td>
                                            </tr>
                                         <?php }?>    
                                        </tbody>
                                    </table>
                                </div>
</div>
</div>                                                            
</div>
</div>
</div>







         <?php include_once("footer.php"); ?>



 
 