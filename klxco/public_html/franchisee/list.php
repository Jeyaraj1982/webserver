
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Manage Franchisee
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=franchisee/add" class="btn btn-primary btn-xs">Add Franchisee</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td class="mytdhead" style="width:50px;">Franchisee ID</td>
                                            <td class="mytdhead" >Franchisee Name</td>
                                            <td class="mytdhead" >Email ID</td>
                                            <td class="mytdhead" style="width:110px;">Created On</td>
                                            <td class="mytdhead">&nbsp;</td>  
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php foreach(JFranchiseetable::getFranchisee() as $r){   
                                        if ($r['CountryID']!=-1) {
                                          ?>
                                        <tr>
                                           <td class="mytd"><?php echo $r["userid"];?></td>
                                           <td class="mytd"><?php echo $r["FranchiseeName"];?></td>
                                           <td class="mytd"><?php echo $r["EmailID"];?></td>           
                                           <td class="mytd"><?php echo $r["CreatedOn"];?></td>
                                           <td class="mytd">
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/edit&frid=<?php echo $r["userid"];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/view&frid=<?php echo $r["userid"];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/addCommission&frid=<?php echo $r["userid"];?>" draggable="false">Add Commission</a>
                                                        <a class="dropdown-item" href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/debitAmount&frid=<?php echo $r["userid"];?>" draggable="false">Debit Amount</a>
                                                        <a class="dropdown-item" href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/bankaccount&frid=<?php echo $r["userid"];?>" draggable="false">Bank Account</a>
                                                        <a class="dropdown-item" href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/wallettransaction&frid=<?php echo $r["userid"];?>" draggable="false">Wallet Transactions</a>
                                                        <a class="dropdown-item" href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/walletrequests&frid=<?php echo $r["userid"];?>&filter=All" draggable="false">Wallet Withdrawal Requests</a>
                                                    </div>
                                                </div>  
                                        </tr>
                                        <?php } } ?>
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

