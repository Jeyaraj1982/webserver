<?php
 
      $records=$mysql->select("SELECT * FROM `_tbl_payout_banktransfer` order by BankTransferID Desc");

   // $title = "Package Summary";
   // $error = "No Records found";
    
                                                                                                        
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Payout Transactions</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Bank Transfer</a></li>
        </ul>
    </div>
     
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bank Transfer Report</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>        
                                
                                <tr>
                                                <th class="border-top-0"></th>
                                                <th class="border-top-0"><b>MemberID</b></th>
                                                <th class="border-top-0"><b>MemberName</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>AccountName</b></th>
                                                <th class="border-top-0"><b>AccountNumber</b></th>
                                                <th class="border-top-0"><b>AccountIFSCode</b></th>
                                                <th class="border-top-0"><b>ModeOfPayment</b></th>
                                                <th class="border-top-0"><b>PaymentRemarks</b></th>
                                                <th class="border-top-0"><b>BankTransactionID</b></th>
                                                <th class="border-top-0"><b>PaymentTransferOn</b></th>
                                                <th class="border-top-0"><b>IsProcessed</b></th>
                                                <th class="border-top-0"><b>ProcessedOn</b></th>
                                            </tr>
                               
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($records as $record){ ?>
                                <tr>
                                    
                                                <td style="text-align: right;">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Payout/viewbanktransfer&id=<?php echo $record['BankTransferID'];?>" draggable="false">View</a>
                                                        </div>
                                                    </div>     
                                                </td>
                                                <td><?php echo $record['MemberCode'];?></td>
                                                <td><?php echo $record['MemberName'];?></td>
                                                <td><?php echo $record['Amount'];?></td>
                                                <td><?php echo $record['AccountName'];?></td>
                                                <td><?php echo $record['AccountNumber'];?></td>
                                                <td><?php echo $record['AccountIFSCode'];?></td>
                                                <td><?php echo $record['ModeOfPayment'];?></td>
                                                <td><?php echo $record['PaymentRemarks'];?></td>
                                                <td><?php echo $record['BankTransactionID'];?></td>
                                                <td><?php echo $record['PaymentTransferOn'];?></td>
                                                <td><?php 
                                                          if($record['IsProcessed']=="1"){ 
                                                            echo "Paid";
                                                          }if($record['IsProcessed']=="2"){ 
                                                            echo "Reversed";
                                                          }if($record['IsProcessed']=="0") { 
                                                            echo  "Unpaid";
                                                          } ?>
                                                </td>
                                                <td><?php echo $record['ProcessedOn'];?></td>
                                                <!--<td><a href="dashboard.php?action=Payout/Transaction&date=<?php echo $record['PayoutDate'];?>">View Details</a></td>-->
                                                 
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
<script>
    $(document).ready(function() {
        //$('#basic-datatables').DataTable({});
    });
</script>