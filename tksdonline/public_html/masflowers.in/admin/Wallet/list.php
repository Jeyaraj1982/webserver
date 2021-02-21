 
<div class="main-panel">                                                                                                                                                                      
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Wallet Summary
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <th scope="col">Customer Name</th>
											<th scope="col">Credits</th>
											<th scope="col">Debits</th>
											<th scope="col">Available Balance</th>
											<th scope="col">Created On</th>
											<th scope="col"> </th>
                                        </thead>
                                        <tbody>
                                        <?php $wallets=$mysql->select("select * from _tbl_wallet");
											foreach($wallets as $wallet){
												$customer = $mysql->select("select * from _tbl_sales_customers where CustomerID='".$wallet['CustomerID']."'");
										?>
                                            <tr>
                                                <td><?php echo $customer[0]['CustomerName'];?></td>
                                                <td style="text-align: right"><?php echo number_format($wallet['Credits'],2);?></td>                                               
                                                <td style="text-align: right"><?php echo number_format($wallet['Debits'],2);?></td>                                               
                                                <td style="text-align: right"><?php echo number_format($wallet['AvailableBalance'],2);?></td>                                               
                                                <td style="text-align:right"><?php echo $wallet['RefillOn'];?></td>
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Wallet/view&id=<?php echo $wallet['RefillID'];?>" draggable="false">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($wallets)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="6">No transactions found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 