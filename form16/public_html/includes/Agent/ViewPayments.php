<?php 
        $sql= $mysql->select("select * from `_tbl_payments` where `AgentCode`='".$_SESSION['User']['AgentCode']."' order by `PaymentID` desc ");
        $title="Payments";
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <!--<a href="dashboard.php?action=Accounts/Invoices&Status=All"><?php if($_GET['Status']=="All") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;-->
                </div> 
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <?php echo $title; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Payment Date</th>
                                            <th>RefNumber</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $order){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($order['PaymentDate']));?></td>
                                            <td><?php echo $order['PaymentCode'];?></td>
                                            <td style="text-align: right"><?php echo number_format($order['Amount'],2);?></td>
                                            <td><?php if($order['IsSuccess']==1){ echo "Success";}else { echo "Failure";}?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=ViewPayment&Code=<?php echo md5($order['PaymentID']);?>" draggable="false">View</a>
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