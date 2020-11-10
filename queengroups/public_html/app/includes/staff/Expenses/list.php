 <?php 
    if($_GET['status']=="All"){ 
        $Expenses = $mysql->select("select * from _queen_expenses where StaffID='".$_SESSION['User']['StaffID']."' order by ExpenseID desc");
        $title="All Expenses";
    }if($_GET['status']=="Active"){
        $Expenses = $mysql->select("select * from _queen_expenses where StaffID='".$_SESSION['User']['StaffID']."' and IsActive='1' order by ExpenseID desc");
        $title="Active Expenses";
    }if($_GET['status']=="Deactive"){
        $Expenses = $mysql->select("select * from _queen_expenses where StaffID='".$_SESSION['User']['StaffID']."' and IsActive='0' order by ExpenseID desc");
        $title="Blocked Expenses";
    }
?>
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
                                        Manage Expenses
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Expenses/add" class="btn btn-primary btn-xs">Add Expense</a><br>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Expense Type</th>
                                                <th scope="col">Short Description</th>
                                                <th scope="col" style="text-align:right">Expense Amount</th>
                                                <th scope="col"></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Expenses as $Expense){ ?>
                                       <tr>
                                                <td><?php echo $Expense['ExpenseType'];?></td>
                                                <td><?php echo $Expense['ShortDescription'];?></td>
                                                <td style="text-align:right"><?php echo number_format($Expense['ExpenseAmount'],2);?></td>
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Expenses/view&id=<?php echo md5($Expense['ExpenseID']);?>" draggable="false">View</a>
															</div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($Expenses)=="0"){ ?>
                                            <tr>
												<td style="text-align: center;" colspan="5">No Expenses found</td>
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
