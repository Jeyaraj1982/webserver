<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                My Receipts
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Invoice Number</th> 
                                            <th>Receipt Date</th> 
                                            <th>Member Code</th> 
                                            <th>Invoice Value</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                        <?php 
                                              $sql= $mysql->select("select * from `_tbl_Receipts` where `MemberCode`='".$_SESSION['User']['MemberCode']."'  order by `ReceiptID` desc ");
                                             foreach($sql as $receipts){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $receipts['InoviceNumber'];?></td>
                                            <td><?php echo date("d M, Y H:i",strtotime($receipts['ReceiptDate']));?></td>
                                            <td><?php echo $receipts['MemberCode'];?></td>
                                            <td><?php echo $receipts['ReceiptAmount'];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Accounts/ViewReceipts&Code=<?php echo $receipts['ReceiptNumber'];?>" draggable="false">View</a>
                                                    </div>
                                                </div>
                                            </td>
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
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 1, "desc" ]]});});</script>